<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Exception\ApiException;
use MessageBird\Exception\ConnectionException;
use MessageBird\Tests\Support\BodyRecordingClient;
use MessageBird\Tests\Support\SequenceClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * The retry loop lives in the core: a transient failure (429, 5xx except 501, or
 * a transport error) is retried with backoff, a non-retryable status is not, the
 * budget is bounded, and — the invariant the conformance retry vectors assert —
 * the one idempotency key is reused across every attempt.
 */
final class RetryTest extends TestCase
{
    /**
     * @param array<string, string> $headers
     */
    private function response(int $status, string $body = '{}', array $headers = []): ResponseInterface
    {
        $response = Psr17FactoryDiscovery::findResponseFactory()->createResponse($status)
            ->withBody(Psr17FactoryDiscovery::findStreamFactory()->createStream($body));
        foreach ($headers as $name => $value) {
            $response = $response->withHeader($name, $value);
        }

        return $response;
    }

    private function bird(ClientInterface $client, int $maxRetries = 2): Bird
    {
        return new Bird('bk_test', 'https://api.example.test', $client, maxRetries: $maxRetries);
    }

    private function transportError(): ClientExceptionInterface
    {
        return new class ('connection refused') extends \RuntimeException implements ClientExceptionInterface {};
    }

    public function testRetriesRetryableStatusThenSucceedsWithStableIdempotencyKey(): void
    {
        $client = new SequenceClient($this->response(503), $this->response(200, '{"id":"c_1"}'));

        $this->bird($client)->post('/v1/contacts', body: ['name' => 'Jane']);

        self::assertCount(2, $client->requests);
        $keys = array_map(fn (RequestInterface $r) => $r->getHeaderLine('Idempotency-Key'), $client->requests);
        self::assertNotSame('', $keys[0]);
        self::assertSame($keys[0], $keys[1], 'the idempotency key must be identical across retries');
    }

    public function testDoesNotRetryNonRetryableStatus(): void
    {
        $client = new SequenceClient($this->response(400, '{"error":"bad"}'));

        try {
            $this->bird($client)->get('/v1/contacts/c_1');
            self::fail('expected ApiException');
        } catch (ApiException) {
            self::assertCount(1, $client->requests, 'a 400 must not be retried');
        }
    }

    public function testStopsAfterMaxRetries(): void
    {
        $client = new SequenceClient($this->response(429), $this->response(429));

        try {
            $this->bird($client, maxRetries: 1)->get('/v1/contacts');
            self::fail('expected ApiException after the retry budget is spent');
        } catch (ApiException) {
            self::assertCount(2, $client->requests, 'one initial attempt plus one retry');
        }
    }

    public function testRetriesTransportErrorThenSucceeds(): void
    {
        $client = new SequenceClient($this->transportError(), $this->response(200));

        $this->bird($client)->get('/v1/contacts');

        self::assertCount(2, $client->requests);
    }

    public function testExhaustedTransportErrorThrowsConnectionException(): void
    {
        $client = new SequenceClient($this->transportError());

        $this->expectException(ConnectionException::class);
        $this->bird($client, maxRetries: 0)->get('/v1/contacts');
    }

    public function testRetryAfterHeaderIsHonoured(): void
    {
        // Retry-After: 0 keeps the test instant while still exercising the header path.
        $client = new SequenceClient($this->response(503, '{}', ['Retry-After' => '0']), $this->response(200));

        $this->bird($client)->get('/v1/contacts');

        self::assertCount(2, $client->requests);
    }

    public function testHonoursHttpDateRetryAfterWhoseDeltaIsZero(): void
    {
        // An HTTP-date carries whole seconds, so the header and the loop's clock
        // read have to land in the same second for the delta to be exactly zero —
        // align just past a boundary rather than racing it.
        $now = microtime(true);
        usleep((int) ((ceil($now) - $now) * 1_000_000) + 20_000);

        $client = new SequenceClient(
            $this->response(503, '{}', ['Retry-After' => gmdate('D, d M Y H:i:s \G\M\T')]),
            $this->response(200),
        );

        $started = microtime(true);
        $this->bird($client)->get('/v1/contacts');

        self::assertCount(2, $client->requests);
        // The wait is the only observable, and the exponential fallback floors at
        // INITIAL_RETRY_DELAY (0.5s).
        self::assertLessThan(
            0.4,
            microtime(true) - $started,
            'a zero HTTP-date delta must retry at once, not fall back to exponential backoff',
        );
    }

    public function testRewindsRequestBodySoEveryAttemptSendsIt(): void
    {
        $client = new BodyRecordingClient($this->response(503), $this->response(200, '{"id":"c_1"}'));

        $this->bird($client)->post('/v1/contacts', body: ['name' => 'Jane']);

        self::assertCount(2, $client->bodies);
        self::assertStringContainsString('Jane', $client->bodies[1]);
        self::assertSame($client->bodies[0], $client->bodies[1], 'the retried attempt must re-send the identical body, not an empty stream');
    }

    public function testClosesAbandonedResponseBodyBeforeRetrying(): void
    {
        $failing = $this->response(503);
        $abandonedBody = $failing->getBody();
        $client = new SequenceClient($failing, $this->response(200));

        $this->bird($client)->get('/v1/contacts');

        self::assertFalse($abandonedBody->isReadable(), 'the abandoned retryable-error body must be closed before the backoff');
    }
}
