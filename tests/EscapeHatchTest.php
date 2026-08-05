<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Tests\Support\RecordingClient;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * The verb-method escape hatch is the long tail of endpoints not on the typed
 * facade. This pins that it builds the right request, decodes the response, and
 * refuses any path that would carry the bearer token off the configured origin.
 */
final class EscapeHatchTest extends TestCase
{
    /**
     * @return array{Bird, RecordingClient}
     */
    private function birdRecording(string $json = '{}', int $status = 200): array
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $recording = new RecordingClient(
            $responseFactory->createResponse($status)->withBody($streamFactory->createStream($json)),
        );

        return [new Bird('bk_test', 'https://api.example.test', $recording), $recording];
    }

    public function testGetBuildsRequestAndReturnsDecodedJson(): void
    {
        [$bird, $recording] = $this->birdRecording('{"id":"abc","kind":"widget"}');

        $result = $bird->get('/v1/widgets/abc', query: ['expand' => 'all']);

        $request = $recording->lastRequest;
        self::assertNotNull($request);
        self::assertSame('GET', $request->getMethod());
        self::assertSame('/v1/widgets/abc', $request->getUri()->getPath());
        self::assertSame('expand=all', $request->getUri()->getQuery());
        self::assertSame('', $request->getHeaderLine('Idempotency-Key'));
        self::assertSame(['id' => 'abc', 'kind' => 'widget'], $result);
    }

    public function testPostSendsBodyAndCarriesIdempotencyKey(): void
    {
        [$bird, $recording] = $this->birdRecording('{"ok":true}');

        $bird->post('/v1/widgets', body: ['name' => 'gadget']);

        $request = $recording->lastRequest;
        self::assertNotNull($request);
        self::assertSame('POST', $request->getMethod());
        self::assertSame('/v1/widgets', $request->getUri()->getPath());
        self::assertSame(['name' => 'gadget'], json_decode((string) $request->getBody(), true));
        self::assertNotSame('', $request->getHeaderLine('Idempotency-Key'));
    }

    /**
     * @return iterable<string, array{string}>
     */
    public static function offOriginPaths(): iterable
    {
        yield 'protocol-relative host' => ['//evil.example'];
        yield 'absolute url' => ['https://evil.example/v1/x'];
        yield 'bare relative' => ['v1/widgets'];
        yield 'empty' => [''];
    }

    #[DataProvider('offOriginPaths')]
    public function testRejectsPathsThatLeaveTheOrigin(string $path): void
    {
        [$bird, $recording] = $this->birdRecording();

        try {
            $bird->get($path);
            self::fail('expected the origin check to reject ' . var_export($path, true));
        } catch (\InvalidArgumentException) {
            self::assertNull($recording->lastRequest, 'no request may be sent for an off-origin path');
        }
    }
}
