<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\RequestOptions;
use MessageBird\Tests\Support\RecordingClient;
use PHPUnit\Framework\TestCase;

/**
 * PHP cannot tell an empty map from an empty list, so a broadcast write with
 * nothing set would go out as `[]` and come back a 400. The facade objectifies
 * it; `Serializer` deliberately does not, so the escape hatch keeps its lists.
 */
final class BroadcastsRequestTest extends TestCase
{
    /**
     * @return array{Bird, RecordingClient}
     */
    private function makeClient(string $body = '{"id":"eb_01krdgeqcxet5s7t44vh8rt9mg"}'): array
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $response = $responseFactory->createResponse(200)->withBody($streamFactory->createStream($body));
        $recording = new RecordingClient($response);

        return [new Bird('bk_test', 'https://api.example.test', $recording), $recording];
    }

    public function testSendWithoutScheduleSendsAnEmptyObject(): void
    {
        [$bird, $recording] = $this->makeClient();

        $bird->broadcasts->send('eb_01krdgeqcxet5s7t44vh8rt9mg');

        self::assertSame('{}', (string) $recording->lastRequest?->getBody());
    }

    public function testUpdateWithNoChangesSendsAnEmptyObject(): void
    {
        [$bird, $recording] = $this->makeClient();

        $bird->broadcasts->update('eb_01krdgeqcxet5s7t44vh8rt9mg', []);

        self::assertSame('{}', (string) $recording->lastRequest?->getBody());
    }

    public function testCreateWithNoFieldsSendsAnEmptyObject(): void
    {
        [$bird, $recording] = $this->makeClient();

        $bird->broadcasts->create();

        self::assertSame('{}', (string) $recording->lastRequest?->getBody());
    }

    public function testEmptyHeadersAndMetadataStaySeparateFromAnEmptyTagList(): void
    {
        [$bird, $recording] = $this->makeClient();

        $bird->broadcasts->update('eb_01krdgeqcxet5s7t44vh8rt9mg', [
            'headers' => [],
            'metadata' => [],
            'tags' => [],
        ]);

        self::assertSame('{"headers":{},"metadata":{},"tags":[]}', (string) $recording->lastRequest?->getBody());
    }

    public function testValidateClearsParametersWithAnEmptyArray(): void
    {
        [$bird, $recording] = $this->makeClient('{"resolution":{"template_id":"emt_01krdgeqcxet5s7t44vh8rt9mg","observed_version_id":"emv_01krdgeqcxet5s7t44vh8rt9mh","requested_language":"fr-CA","effective_language":"fr-CA","requirements_fingerprint":"contract-fingerprint"},"problems":[],"ready_for_admission":true,"unused_parameters":[]}');

        $bird->broadcasts->validate('eb_01krdgeqcxet5s7t44vh8rt9mg', [
            'template' => ['language' => 'fr-CA', 'parameters' => []],
        ]);

        self::assertSame('{"template":{"language":"fr-CA","parameters":{}}}', (string) $recording->lastRequest?->getBody());
    }
    public function testParameterOverridesKeepEveryMapObjectShaped(): void
    {
        [$bird, $recording] = $this->makeClient();
        $bird->broadcasts->update('eb_01krdgeqcxet5s7t44vh8rt9mg', [
            'template' => ['parameter_overrides' => ['it' => ['count' => 9007199254740995, 'empty' => ''], 'es' => []]],
        ]);
        self::assertSame('{"template":{"parameter_overrides":{"it":{"count":9007199254740995,"empty":""},"es":{}}}}', (string) $recording->lastRequest?->getBody());

        [$bird, $recording] = $this->makeClient();
        $bird->broadcasts->update('eb_01krdgeqcxet5s7t44vh8rt9mg', ['template' => ['parameter_overrides' => []]]);
        self::assertSame('{"template":{"parameter_overrides":{}}}', (string) $recording->lastRequest?->getBody());

        $overrides = new \stdClass();
        $overrides->es = [];
        $overrides->it = ['greeting' => 'Ciao'];
        [$bird, $recording] = $this->makeClient();
        $bird->broadcasts->update('eb_01krdgeqcxet5s7t44vh8rt9mg', ['template' => ['parameter_overrides' => $overrides]]);
        self::assertSame('{"template":{"parameter_overrides":{"es":{},"it":{"greeting":"Ciao"}}}}', (string) $recording->lastRequest?->getBody());

        [$bird, $recording] = $this->makeClient();
        $bird->broadcasts->create(template: 'emt_01krdgeqcxet5s7t44vh8rt9mg', parameterOverrides: $overrides);
        self::assertSame('{"template":{"id":"emt_01krdgeqcxet5s7t44vh8rt9mg","parameter_overrides":{"es":{},"it":{"greeting":"Ciao"}}}}', (string) $recording->lastRequest?->getBody());
    }

    public function testMemberTestRequiresCallerIntentKey(): void
    {
        foreach ([null, new RequestOptions(idempotencyKey: '')] as $options) {
            [$bird, $recording] = $this->makeClient('{"id":"em_1"}');
            try {
                $bird->broadcasts->test('eb_01krdgeqcxet5s7t44vh8rt9mg', ['to' => 'member@example.com', 'preview_fingerprint' => 'matching'], $options);
                self::fail('Expected caller intent key error');
            } catch (\InvalidArgumentException $error) {
                self::assertStringContainsString('idempotency', $error->getMessage());
            }
            self::assertNull($recording->lastRequest);
        }
    }
}
