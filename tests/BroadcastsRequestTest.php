<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
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
}
