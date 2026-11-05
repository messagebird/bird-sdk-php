<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$document = Yaml::parseFile($argv[1]);
$resolve = static function (array $value) use ($document): array {
    $seen = [];
    while (isset($value['$ref'])) {
        $reference = $value['$ref'];
        if (!str_starts_with($reference, '#/') || isset($seen[$reference])) {
            throw new RuntimeException('Cannot resolve parameter reference: ' . $reference);
        }
        $seen[$reference] = true;
        $target = $document;
        foreach (explode('/', substr($reference, 2)) as $part) {
            $key = str_replace(['~1', '~0'], ['/', '~'], $part);
            if (!is_array($target) || !array_key_exists($key, $target)) {
                throw new RuntimeException('Missing parameter reference: ' . $reference);
            }
            $target = $target[$key];
        }
        unset($value['$ref']);
        $value = array_replace($target, $value);
    }

    return $value;
};

foreach ($document['paths'] as &$path) {
    foreach ($path as $method => &$operation) {
        $parameters = $method === 'parameters' ? $operation : ($operation['parameters'] ?? null);
        if ($parameters === null) {
            continue;
        }
        foreach ($parameters as &$parameter) {
            $parameter = $resolve($parameter);
            if (isset($parameter['schema'])) {
                $parameter['schema'] = $resolve($parameter['schema']);
            }
        }
        unset($parameter);
        if ($method === 'parameters') {
            $operation = $parameters;
        } else {
            $operation['parameters'] = $parameters;
        }
    }
    unset($operation);
}
unset($path);

// Jane ignores nullable beside a reference to an untyped value. Resolve only
// that representation; typed/model references must retain their class identity.
$inlineNullableUntypedRefs = static function (array $schema) use (&$inlineNullableUntypedRefs, $resolve): array {
    if (isset($schema['$ref']) && ($schema['nullable'] ?? false) === true) {
        // Jane's 3.0 reference documentation comes from the target, even when
        // inlining is needed to preserve the nullable arbitrary-JSON value.
        $reference = $schema;
        unset($reference['description']);
        $resolved = $resolve($reference);
        $typed = false;
        foreach (['type', 'properties', 'items', 'additionalProperties', 'allOf', 'oneOf', 'anyOf', 'enum'] as $key) {
            $typed = $typed || array_key_exists($key, $resolved);
        }
        if (!$typed) {
            $schema = $resolved;
        }
    }
    foreach (['properties', 'patternProperties', '$defs', 'definitions', 'dependentSchemas'] as $key) {
        foreach ($schema[$key] ?? [] as $name => $child) {
            if (is_array($child)) {
                $schema[$key][$name] = $inlineNullableUntypedRefs($child);
            }
        }
    }
    foreach (['items', 'additionalProperties', 'not', 'if', 'then', 'else', 'propertyNames', 'contains'] as $key) {
        if (isset($schema[$key]) && is_array($schema[$key])) {
            $schema[$key] = $inlineNullableUntypedRefs($schema[$key]);
        }
    }
    foreach (['allOf', 'oneOf', 'anyOf', 'prefixItems'] as $key) {
        foreach ($schema[$key] ?? [] as $index => $child) {
            if (is_array($child)) {
                $schema[$key][$index] = $inlineNullableUntypedRefs($child);
            }
        }
    }

    return $schema;
};
// Only enter schemas through OpenAPI schema-bearing objects. Examples, defaults,
// extensions and arbitrary payloads may contain the same keys as real schemas.
$prepareSchemaCarrier = static function (array $node) use (&$prepareSchemaCarrier, $inlineNullableUntypedRefs): array {
    if (isset($node['schema']) && is_array($node['schema'])) {
        $node['schema'] = $inlineNullableUntypedRefs($node['schema']);
    }
    foreach ($node['content'] ?? [] as $media => $value) {
        if (isset($value['schema']) && is_array($value['schema'])) {
            $node['content'][$media]['schema'] = $inlineNullableUntypedRefs($value['schema']);
        }
    }
    foreach ($node['headers'] ?? [] as $name => $header) {
        if (is_array($header)) {
            $node['headers'][$name] = $prepareSchemaCarrier($header);
        }
    }

    return $node;
};
// Jane does not apply an allOf arm's required list to properties inherited from another arm.
$propertiesOf = static function (array $schema, int $depth = 0) use (&$propertiesOf, $resolve): array {
    if ($depth > 64) {
        throw new RuntimeException('Cyclic or excessively deep schema inheritance');
    }
    $schema = $resolve($schema);
    $properties = $schema['properties'] ?? [];
    foreach ($schema['allOf'] ?? [] as $arm) {
        $properties = array_replace($properties, $propertiesOf($arm, $depth + 1));
    }

    return $properties;
};

$inlineUntypedUnions = static function (array $node, int $depth = 0) use (&$inlineUntypedUnions, $resolve): array {
    if ($depth > 64) {
        throw new RuntimeException('Cyclic or excessively deep schema union');
    }
    foreach ($node['anyOf'] ?? [] as $index => $arm) {
        if (!isset($arm['$ref'])) {
            continue;
        }
        $target = $resolve($arm);
        if (!isset($target['type']) && (isset($target['oneOf']) || isset($target['anyOf']))) {
            // Jane skips typeless anyOf references and emits an empty PHP union.
            $node['anyOf'][$index] = $target;
        }
    }
    foreach ($node as $key => $value) {
        if (is_array($value)) {
            $node[$key] = $inlineUntypedUnions($value, $depth + 1);
        }
    }

    return $node;
};
$document = $inlineUntypedUnions($document);

foreach ($document['components']['schemas'] as &$schema) {
    if (!isset($schema['allOf'])) {
        continue;
    }
    $properties = $propertiesOf($schema);
    foreach ($schema['allOf'] as &$arm) {
        foreach ($arm['required'] ?? [] as $name) {
            if (!isset($arm['properties'][$name]) && isset($properties[$name])) {
                $arm['properties'][$name] = $properties[$name];
            }
        }
    }
    unset($arm);
}
unset($schema);

$original = Yaml::parseFile($argv[3]);
$originalSchemas = $original['components']['schemas'];
$baseModel = static function (array $schema, array $seen = []) use (&$baseModel, $originalSchemas): bool {
    if (isset($schema['properties'])) {
        return true;
    }
    if (isset($schema['$ref'])) {
        $reference = $schema['$ref'];
        $prefix = '#/components/schemas/';
        if (!str_starts_with($reference, $prefix) || isset($seen[$reference])) {
            return false;
        }
        $seen[$reference] = true;
        return $baseModel($originalSchemas[substr($reference, strlen($prefix))] ?? [], $seen);
    }
    foreach ($schema['allOf'] ?? [] as $arm) {
        if ($baseModel($arm, $seen)) {
            return true;
        }
    }
    return false;
};
$wrapperBases = [];
$collisions = [];
$walkProperties = static function (array $schema, string $owner, array $seen = []) use (&$walkProperties, &$wrapperBases, &$collisions, $originalSchemas, $baseModel): void {
    foreach ($schema['properties'] ?? [] as $field => $property) {
        $name = $owner . str_replace(' ', '', ucwords(str_replace(['_', '-'], ' ', $field)));
        $nextSeen = $seen;
        while (isset($property['$ref']) && str_starts_with($property['$ref'], '#/components/schemas/')) {
            if (isset($nextSeen[$property['$ref']])) {
                continue 2;
            }
            $nextSeen[$property['$ref']] = true;
            $name = substr($property['$ref'], strlen('#/components/schemas/'));
            $property = $originalSchemas[$name] ?? [];
        }
        $all = $property['allOf'] ?? [];
        if (count($all) === 1 && !isset($property['properties']) && count($all[0]) === 1 && isset($all[0]['$ref'])) {
            $reference = $all[0]['$ref'];
            $prefix = '#/components/schemas/';
            if (str_starts_with($reference, $prefix)) {
                $base = substr($reference, strlen($prefix));
                if ($baseModel($originalSchemas[$base] ?? [])) {
                    if ($name === $base) {
                        $name .= 'Wrapper';
                        while (isset($originalSchemas[$name])) {
                            $name .= 'Wrapper';
                        }
                        $collisions[$owner][$field] = $name;
                    }
                    $wrapperBases[$name] = $base;
                }
            }
        }
        $walkProperties($property, $name, $nextSeen);
    }
    foreach (['items', 'additionalProperties'] as $nested) {
        if (isset($schema[$nested]) && is_array($schema[$nested])) {
            $walkProperties($schema[$nested], $owner, $seen);
        }
    }
    foreach ($schema['allOf'] ?? [] as $arm) {
        if (!isset($arm['$ref'])) {
            $walkProperties($arm, $owner, $seen);
        }
    }
};
foreach ($originalSchemas as $name => $schema) {
    $walkProperties($schema, $name);
}
$wrapperOpen = static function (string $name, array $seen = []) use (&$wrapperOpen, $wrapperBases, $originalSchemas): bool {
    if (isset($seen[$name])) {
        throw new RuntimeException('Circular wrapper inheritance');
    }
    $seen[$name] = true;
    if (isset($wrapperBases[$name])) {
        return $wrapperOpen($wrapperBases[$name], $seen);
    }
    return ($originalSchemas[$name]['additionalProperties'] ?? true) !== false;
};
$prepareWrappers = static function (array $schema, string $owner) use (&$prepareWrappers, &$document, $collisions, $wrapperBases, $wrapperOpen): array {
    if (isset($wrapperBases[$owner])) {
        $schema['additionalProperties'] = $wrapperOpen($owner);
    }
    foreach ($schema['properties'] ?? [] as $field => $property) {
        $name = $owner . str_replace(' ', '', ucwords(str_replace(['_', '-'], ' ', $field)));
        if (isset($collisions[$owner][$field])) {
            $name = $collisions[$owner][$field];
            $property['additionalProperties'] = $wrapperOpen($name);
            $document['components']['schemas'][$name] = $property;
            $schema['properties'][$field] = ['$ref' => '#/components/schemas/' . $name];
        } elseif (!isset($property['$ref'])) {
            $schema['properties'][$field] = $prepareWrappers($property, $name);
        }
    }
    foreach ($schema['allOf'] ?? [] as $index => $arm) {
        if (!isset($arm['$ref'])) {
            $schema['allOf'][$index] = $prepareWrappers($arm, $owner);
        }
    }
    return $schema;
};
foreach ($document['components']['schemas'] as $name => $schema) {
    $document['components']['schemas'][$name] = $prepareWrappers($schema, $name);
}
foreach (array_unique($wrapperBases) as $base) {
    if (!isset($document['components']['schemas'][$base]['type'])) {
        $document['components']['schemas'][$base]['type'] = 'object';
    }
    // Keep composed bases model-typed without closing their additional properties.
    if (isset($document['components']['schemas'][$base]['allOf']) && !isset($document['components']['schemas'][$base]['properties'])) {
        $document['components']['schemas'][$base]['properties'] = new \stdClass();
    }
}
// Jane guesses property-less object compositions as maps before trying allOf.
// Referenced allOf arms must retain their object type for class discovery.
$armReferences = [];
$collectArms = static function (array $node) use (&$collectArms, &$armReferences): void {
    foreach ($node['allOf'] ?? [] as $arm) {
        if (is_array($arm) && isset($arm['$ref'])) {
            $armReferences[$arm['$ref']] = true;
        }
    }
    foreach ($node as $value) {
        if (is_array($value)) {
            $collectArms($value);
        }
    }
};
$collectArms($document);
foreach ($document['components']['schemas'] as $name => &$schema) {
    if (($schema['type'] ?? null) === 'object' && isset($schema['allOf']) && !isset($schema['properties'])
        && !array_key_exists('additionalProperties', $schema)) {
        if (isset($armReferences['#/components/schemas/' . $name])) {
            $schema['properties'] = (object) [];
        } else {
            unset($schema['type']);
        }
    }
}
unset($schema);
$document['x-sdk-wrapper-bases'] = $wrapperBases;

// Run after inheritance preparation, which can copy properties from the original
// reference targets back into the staged document.
foreach ($document['components']['schemas'] as $name => $schema) {
    $document['components']['schemas'][$name] = $inlineNullableUntypedRefs($schema);
}
foreach (['parameters', 'headers', 'requestBodies', 'responses'] as $key) {
    foreach ($document['components'][$key] ?? [] as $name => $value) {
        $document['components'][$key][$name] = $prepareSchemaCarrier($value);
    }
}
foreach ($document['paths'] as &$path) {
    foreach ($path['parameters'] ?? [] as $index => $parameter) {
        $path['parameters'][$index] = $prepareSchemaCarrier($parameter);
    }
    foreach (['get', 'put', 'post', 'delete', 'options', 'head', 'patch', 'trace'] as $method) {
        if (!isset($path[$method])) {
            continue;
        }
        foreach ($path[$method]['parameters'] ?? [] as $index => $parameter) {
            $path[$method]['parameters'][$index] = $prepareSchemaCarrier($parameter);
        }
        if (isset($path[$method]['requestBody'])) {
            $path[$method]['requestBody'] = $prepareSchemaCarrier($path[$method]['requestBody']);
        }
        foreach ($path[$method]['responses'] ?? [] as $status => $response) {
            $path[$method]['responses'][$status] = $prepareSchemaCarrier($response);
        }
    }
}
unset($path);

$output = json_encode($document, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";
if (file_put_contents($argv[2], $output) === false) {
    throw new RuntimeException('Cannot write Jane compatibility input');
}
