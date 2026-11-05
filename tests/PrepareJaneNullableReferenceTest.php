<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;

final class PrepareJaneNullableReferenceTest extends TestCase
{
    public function testNullableUntypedReferencesPreserveSchemaAndLiteralData(): void
    {
        $reference = ['$ref' => '#/components/schemas/OpenAlias', 'nullable' => true];
        $literal = $reference + ['schema' => $reference, 'note' => 'payload, not schema'];
        $fixture = [
            'openapi' => '3.0.3',
            'info' => ['title' => 'Oracle preparation', 'version' => '1'],
            'paths' => ['/example' => ['post' => [
                'requestBody' => ['content' => ['application/json' => [
                    'schema' => $reference + ['maxLength' => 9],
                    'example' => $literal,
                ]]],
                'responses' => ['200' => ['description' => 'ok']],
            ]]],
            'components' => [
                'schemas' => [
                    'OpenValue' => ['description' => 'base', 'maxLength' => 99, 'x-source-note' => 'retained'],
                    'OpenAlias' => ['$ref' => '#/components/schemas/OpenValue'],
                    'TypedValue' => ['type' => 'string', 'maxLength' => 64],
                    'ModelValue' => ['type' => 'object', 'properties' => ['name' => ['type' => 'string']]],
                    'Envelope' => ['type' => 'object', 'properties' => [
                        'payload' => $reference + [
                            'maxLength' => 7, 'description' => 'local',
                            'example' => $literal, 'default' => $literal, 'x-literal' => $literal,
                        ],
                        'unchanged' => ['$ref' => '#/components/schemas/OpenAlias'],
                        'typed' => ['$ref' => '#/components/schemas/TypedValue', 'nullable' => true],
                        'model' => ['$ref' => '#/components/schemas/ModelValue', 'nullable' => true],
                        'local_type' => $reference + ['type' => 'string'],
                        'list' => ['type' => 'array', 'items' => $reference],
                        'map' => ['type' => 'object', 'additionalProperties' => $reference],
                    ]],
                    'Composed' => ['allOf' => [
                        ['$ref' => '#/components/schemas/Envelope'],
                        ['required' => ['payload']],
                    ]],
                ],
                'examples' => ['payload' => ['value' => $literal]],
            ],
        ];
        $temporary = sys_get_temp_dir() . '/bird-jane-prepare-' . bin2hex(random_bytes(8));
        self::assertTrue(mkdir($temporary));
        $inputPath = $temporary . '/input.yaml';
        $outputPath = $temporary . '/prepared.json';

        try {
            self::assertNotFalse(file_put_contents($inputPath, Yaml::dump($fixture, 20)));
            $argv = ['prepare-jane.php', $inputPath, $outputPath, $inputPath];
            require dirname(__DIR__) . '/scripts/prepare-jane.php';
            $prepared = json_decode((string) file_get_contents($outputPath), true, 512, JSON_THROW_ON_ERROR);
            $properties = $prepared['components']['schemas']['Envelope']['properties'];

            self::assertSame([
                'description' => 'base', 'maxLength' => 7, 'x-source-note' => 'retained',
                'nullable' => true, 'example' => $literal, 'default' => $literal, 'x-literal' => $literal,
            ], $properties['payload']);
            foreach (['unchanged', 'typed', 'model', 'local_type'] as $field) {
                self::assertSame($fixture['components']['schemas']['Envelope']['properties'][$field], $properties[$field]);
            }
            foreach ([$properties['list']['items'], $properties['map']['additionalProperties']] as $nested) {
                self::assertArrayNotHasKey('$ref', $nested);
                self::assertTrue($nested['nullable']);
                self::assertSame(99, $nested['maxLength']);
                self::assertSame('retained', $nested['x-source-note']);
            }
            self::assertSame($properties['payload'], $prepared['components']['schemas']['Composed']['allOf'][1]['properties']['payload']);
            $media = $prepared['paths']['/example']['post']['requestBody']['content']['application/json'];
            self::assertArrayNotHasKey('$ref', $media['schema']);
            self::assertSame(9, $media['schema']['maxLength']);
            self::assertTrue($media['schema']['nullable']);
            self::assertSame($literal, $media['example']);
            self::assertSame($literal, $prepared['components']['examples']['payload']['value']);
        } finally {
            @unlink($inputPath);
            @unlink($outputPath);
            @rmdir($temporary);
        }
    }
}
