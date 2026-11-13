<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Exception\ApiException;
use MessageBird\Exception\ConnectionException;
use MessageBird\Tests\Support\SequenceClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * The operation's success is a 302 to a pre-authorized storage URL. That target
 * carries its own credential and refuses a second auth mechanism, so the hop
 * must be taken by a request carrying none.
 */
final class VoiceLegsRecordingsAudioTest extends TestCase
{
    private const WAV = 'RIFF';
    private const STORAGE = 'https://storage.test/recording.wav?X-Amz-Signature=abc';

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

    public function testFollowsTheRedirectWithoutCredentials(): void
    {
        [$bird, $client] = $this->bird(
            $this->redirect(),
            $this->response(200, self::WAV, ['Content-Type' => 'audio/wav']),
        );

        $audio = $bird->voice->legs->recordings->audio('vcl_1', 'vrc_1');

        self::assertSame(self::WAV, $audio->data);
        self::assertSame('audio/wav', $audio->contentType);
        self::assertSame(\strlen(self::WAV), $audio->contentLength);
        self::assertCount(2, $client->requests);
        self::assertSame('/v1/voice/legs/vcl_1/recordings/vrc_1/audio', $client->requests[0]->getUri()->getPath());
        self::assertSame('Bearer bk_test', $client->requests[0]->getHeaderLine('Authorization'));
        self::assertSame(self::STORAGE, (string) $client->requests[1]->getUri());
        self::assertFalse($client->requests[1]->hasHeader('Authorization'));
    }

    public function testRefusedLinkNamesTheRecovery(): void
    {
        [$bird] = $this->bird($this->redirect(), $this->response(403, '<Error/>'));

        $this->expectException(ConnectionException::class);
        $this->expectExceptionMessageMatches('/audio again/');
        $bird->voice->legs->recordings->audio('vcl_1', 'vrc_1');
    }

    // A leg that is still recording is the API's own 425, which the caller
    // needs as an API error to tell "wait" from "gone".
    public function testSurfacesStillRecording(): void
    {
        [$bird] = $this->bird($this->response(
            425,
            '{"error":{"type":"too_early_error","code":"E21083"}}',
            ['Content-Type' => 'application/json'],
        ));

        $this->expectException(ApiException::class);
        $bird->voice->legs->recordings->audio('vcl_1', 'vrc_1');
    }
}
