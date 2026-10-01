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

// Jane prunes classes behind untyped allOf wrappers even when their refs are reachable.
$roots = [];
$visited = [];
$visit = static function (array $node) use (&$visit, &$roots, &$visited, $resolve, $propertiesOf): void {
    if (isset($node['allOf']) && count($node['allOf']) === 1 && isset($node['allOf'][0]['$ref'])) {
        $ref = $node['allOf'][0]['$ref'];
        $target = $resolve($node['allOf'][0]);
        if (!isset($target['type']) && isset($target['allOf']) && $propertiesOf($target) !== []) {
            $roots[$ref] = true;
        }
    }
    if (isset($node['$ref']) && !isset($visited[$node['$ref']])) {
        $visited[$node['$ref']] = true;
        $visit($resolve($node));
    }
    foreach ($node as $value) {
        if (is_array($value)) {
            $visit($value);
        }
    }
};
$paths = require __DIR__ . '/surface-paths.php';
foreach ($document['paths'] as $name => $path) {
    foreach ($paths as $pattern) {
        if (preg_match('#' . $pattern . '#', $name)) {
            $visit($path);
            break;
        }
    }
}
foreach (array_keys($roots) as $index => $ref) {
    $document['paths']['/__parity/schemas/' . $index] = [
        'get' => [
            'operationId' => 'paritySchema' . $index,
            'responses' => ['200' => [
                'description' => 'Reachable wire schema retained for generator comparison.',
                'content' => ['application/json' => ['schema' => ['$ref' => $ref]]],
            ]],
        ],
    ];
}

// Jane emits an empty PHP type for a union of untyped unions; its wire value is mixed.
$normalize = static function (array &$node) use (&$normalize, $resolve): void {
    if (isset($node['anyOf']) && count($node['anyOf']) > 1) {
        $nestedUnions = true;
        foreach ($node['anyOf'] as $arm) {
            $target = $resolve($arm);
            if (isset($target['type']) || (!isset($target['oneOf']) && !isset($target['anyOf']))) {
                $nestedUnions = false;
                break;
            }
        }
        if ($nestedUnions) {
            unset($node['anyOf']);
        }
    }
    foreach ($node as &$value) {
        if (is_array($value)) {
            $normalize($value);
        }
    }
    unset($value);
};
$normalize($document);

$output = json_encode($document, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";
if (file_put_contents($argv[2], $output) === false) {
    throw new RuntimeException('Cannot write Jane compatibility input');
}
