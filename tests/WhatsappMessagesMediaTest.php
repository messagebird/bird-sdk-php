<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Exception\ApiException;
use MessageBird\Exception\ConnectionException;
use MessageBird\Tests\Support\SequenceClient;
use MessageBird\WhatsAppMedia;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * The operation's success is a 302 to a pre-authorized storage URL. That target
 * carries its own credential and refuses a second auth mechanism, so the hop
 * must be taken by a request carrying none — which is what these pin.
 */
final class WhatsappMessagesMediaTest extends TestCase
{
    private const PNG = "\x89PNG\r\n\x1a\n";
    private const STORAGE = 'https://storage.test/blob.png?X-Amz-Signature=abc';

    /**
     * @param array<string, string> $headers
     */
    private function response(int $status, string $body = '', array $headers = []): ResponseInterface
    {
        $response = Psr17FactoryDiscovery::findResponseFactory()->createResponse($status)
            ->withBody(Psr17FactoryDiscovery::findStreamFactory()->createStream($body));
        foreach ($headers as $name => $value) {
            $response = $response->withHeader($name, $value);
        }

        return $response;
    }

    /**
     * @return array{Bird, SequenceClient}
     */
    private function bird(ResponseInterface ...$responses): array
    {
        $client = new SequenceClient(...$responses);

        return [new Bird('bk_test', 'https://api.example.test', $client), $client];
    }

    private function redirect(): ResponseInterface
    {
        return $this->response(302, '', ['Location' => self::STORAGE]);
    }

    private function stored(int $status = 200, string $body = self::PNG, ?string $type = 'image/png'): ResponseInterface
    {
        return $this->response($status, $body, $type === null ? [] : ['Content-Type' => $type]);
    }

    public function testFollowsTheRedirect(): void
    {
        [$bird, $client] = $this->bird($this->redirect(), $this->stored());

        $media = $bird->whatsapp->messages->media('wam_1', 'waf_1');

        self::assertInstanceOf(WhatsAppMedia::class, $media);
        self::assertSame(self::PNG, $media->data);
        self::assertSame('image/png', $media->contentType);
        self::assertSame(\strlen(self::PNG), $media->contentLength);
        self::assertCount(2, $client->requests);
        self::assertSame('/v1/whatsapp/messages/wam_1/media/waf_1', $client->requests[0]->getUri()->getPath());
        self::assertSame(self::STORAGE, (string) $client->requests[1]->getUri());
    }

    // The assertion the whole two-leg design exists for.
    public function testSendsNoCredentialsToStorage(): void
    {
        [$bird, $client] = $this->bird($this->redirect(), $this->stored());

        $bird->whatsapp->messages->media('wam_1', 'waf_1');

        // The API leg must carry the key, or this passes on a client that never
        // authenticates anything.
        self::assertSame('Bearer bk_test', $client->requests[0]->getHeaderLine('Authorization'));

        $storage = $client->requests[1];
        self::assertFalse($storage->hasHeader('Authorization'));
        foreach (array_keys($storage->getHeaders()) as $name) {
            self::assertStringStartsNotWith('bird-', strtolower((string) $name));
        }
    }

    /**
     * A 200 is either an edge answering directly or a PSR-18 client that
     * followed the redirect itself, which PSR-18 leaves to the client. It is
     * also the only arm the conformance corpus can script — vector.schema.json's
     * scripted responses carry only status and body, so no 302 with a Location.
     */
    public function testAcceptsADirect2xx(): void
    {
        [$bird, $client] = $this->bird($this->stored());

        $media = $bird->whatsapp->messages->media('wam_1', 'waf_1');

        self::assertSame(self::PNG, $media->data);
        self::assertSame('image/png', $media->contentType);
        self::assertCount(1, $client->requests);
    }

    public function testFallsBackToOctetStream(): void
    {
        [$bird] = $this->bird($this->redirect(), $this->stored(type: null));

        self::assertSame('application/octet-stream', $bird->whatsapp->messages->media('wam_1', 'waf_1')->contentType);
    }

    public function testRefusedLinkNamesTheRecovery(): void
    {
        [$bird] = $this->bird($this->redirect(), $this->stored(403, '<Error/>', null));

        // A storage refusal is not a Bird API failure: mapping it as one would
        // report the caller's own key as lacking permission.
        $this->expectException(ConnectionException::class);
        $this->expectExceptionMessageMatches('/media again/');
        $bird->whatsapp->messages->media('wam_1', 'waf_1');
    }

    public function testRedirectWithoutLocation(): void
    {
        [$bird] = $this->bird($this->response(302));

        $this->expectException(ConnectionException::class);
        $this->expectExceptionMessageMatches('/Location/');
        $bird->whatsapp->messages->media('wam_1', 'waf_1');
    }

    // The API leg keeps the core's error mapping: an expired media object is a
    // Bird 410, not a storage failure, and must not be flattened into one.
    public function testSurfacesAnApiError(): void
    {
        [$bird] = $this->bird($this->response(410, '{"error":{"type":"not_found_error","code":"E00404"}}'));

        $this->expectException(ApiException::class);
        $bird->whatsapp->messages->media('wam_1', 'waf_1');
    }
}
