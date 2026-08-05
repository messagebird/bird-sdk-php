<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Tests\Support\RecordingClient;
use PHPUnit\Framework\TestCase;

/**
 * An array query filter must be sent as a repeated key (status=a&status=b), the
 * form the API reads. PHP's http_build_query emits status[0]=a, which the API
 * silently ignores — a filter that looks applied but never reaches the server.
 */
final class QueryEncodingTest extends TestCase
{
    public function testArrayQueryParamsRepeatTheKeyInsteadOfIndexing(): void
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $recording = new RecordingClient(
            $responseFactory->createResponse(200)->withBody($streamFactory->createStream('{}')),
        );
        $bird = new Bird('bk_test', 'https://api.example.test', $recording);

        $bird->get('/v1/sms/messages', query: ['status' => ['delivered', 'failed'], 'tag' => 'env:prod']);

        $request = $recording->lastRequest;
        self::assertNotNull($request);
        $query = $request->getUri()->getQuery();

        self::assertStringContainsString('status=delivered', $query);
        self::assertStringContainsString('status=failed', $query);
        self::assertStringNotContainsString('status[0]', $query);
        self::assertStringNotContainsString('status%5B0%5D', $query);
        self::assertStringContainsString('tag=env%3Aprod', $query);
    }

    public function testScalarQueryParamIsEncodedOnce(): void
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $recording = new RecordingClient(
            $responseFactory->createResponse(200)->withBody($streamFactory->createStream('{}')),
        );
        $bird = new Bird('bk_test', 'https://api.example.test', $recording);

        $bird->get('/v1/sms/messages', query: ['limit' => 25]);

        $request = $recording->lastRequest;
        self::assertNotNull($request);
        self::assertSame('limit=25', $request->getUri()->getQuery());
    }
}
