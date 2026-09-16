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

$output = json_encode($document, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";
if (file_put_contents($argv[2], $output) === false) {
    throw new RuntimeException('Cannot write Jane compatibility input');
}
