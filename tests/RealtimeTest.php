<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\RealtimeOptions;
use MessageBird\RequestOptions;
use MessageBird\Tests\Support\RecordingClient;
use MessageBird\Wire\Model\RealtimeBatchEvent;
use MessageBird\Wire\Model\RealtimeBatchPublish;
use MessageBird\Wire\Model\RealtimeMemberPublish;
use MessageBird\Wire\Model\RealtimePublish;
use PHPUnit\Framework\TestCase;

/**
 * Realtime authenticates with app credentials sent as X-Realtime-Key/Secret on
 * top of the workspace key: config-level credentials reach every request, a
 * per-call RealtimeOptions overrides them, and a call with no credentials at all
 * fails before it hits the wire.
 */
final class RealtimeTest extends TestCase
{
    private function recording(string $body = '{}'): RecordingClient
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();

        return new RecordingClient(
            $responseFactory->createResponse(200)->withBody($streamFactory->createStream($body)),
        );
    }

    private function bird(RecordingClient $recording, ?RealtimeOptions $realtime = null): Bird
    {
        return new Bird('bk_test', 'https://api.example.test', $recording, realtime: $realtime);
    }

    public function testPublishSendsAppCredentialsAndPath(): void
    {
        $recording = $this->recording('{"data":[]}');
        $bird = $this->bird($recording, new RealtimeOptions(key: 'rk_live', secret: 'rs_live'));

        $bird->realtime->publish('rap_1', (new RealtimePublish())->setEvent('e')->setChannels(['c']));

        $request = $recording->lastRequest;
        self::assertNotNull($request);
        self::assertSame('POST', $request->getMethod());
        self::assertSame('/v1/realtime/apps/rap_1/events', $request->getUri()->getPath());
        self::assertSame('rk_live', $request->getHeaderLine('X-Realtime-Key'));
        self::assertSame('rs_live', $request->getHeaderLine('X-Realtime-Secret'));
        self::assertSame('Bearer bk_test', $request->getHeaderLine('Authorization'));
    }

    public function testPublishBatchPath(): void
    {
        $recording = $this->recording('{"data":[]}');
        $bird = $this->bird($recording, new RealtimeOptions(key: 'k', secret: 's'));

        $bird->realtime->publishBatch('rap_1', (new RealtimeBatchPublish())->setEvents([
            (new RealtimeBatchEvent())->setEvent('e')->setChannel('c'),
        ]));

        self::assertSame('/v1/realtime/apps/rap_1/batch-events', $recording->lastRequest?->getUri()->getPath());
    }

    public function testChannelReadsAndDisconnectPaths(): void
    {
        $recording = $this->recording('{"data":[]}');
        $bird = $this->bird($recording, new RealtimeOptions(key: 'k', secret: 's'));

        $bird->realtime->channels->list('rap_1');
        self::assertSame('/v1/realtime/apps/rap_1/channels', $recording->lastRequest?->getUri()->getPath());

        $bird->realtime->channels->get('rap_1', 'room-42');
        self::assertSame('/v1/realtime/apps/rap_1/channels/room-42', $recording->lastRequest?->getUri()->getPath());

        $bird->realtime->channels->members('rap_1', 'room-42');
        self::assertSame('/v1/realtime/apps/rap_1/channels/room-42/members', $recording->lastRequest?->getUri()->getPath());

        $bird->realtime->members->disconnect('rap_1', 'usr_1');
        $request = $recording->lastRequest;
        self::assertSame('POST', $request?->getMethod());
        self::assertSame('/v1/realtime/apps/rap_1/members/usr_1/disconnect', $request?->getUri()->getPath());
    }

    public function testMemberSendPathAndBody(): void
    {
        $recording = $this->recording();
        $bird = $this->bird($recording, new RealtimeOptions(key: 'k', secret: 's'));

        $bird->realtime->members->send('rap_1', 'usr_1', (new RealtimeMemberPublish())->setEvent('order-shipped')->setData(['order_id' => 'ord_123']));

        $request = $recording->lastRequest;
        self::assertSame('POST', $request?->getMethod());
        self::assertSame('/v1/realtime/apps/rap_1/members/usr_1/events', $request?->getUri()->getPath());
        self::assertSame('k', $request?->getHeaderLine('X-Realtime-Key'));
        $body = json_decode((string) $request?->getBody(), true);
        self::assertSame('order-shipped', $body['event']);
        self::assertSame(['order_id' => 'ord_123'], $body['data']);
    }

    public function testPerCallCredentialsOverrideClientConfig(): void
    {
        $recording = $this->recording('{"data":[]}');
        $bird = $this->bird($recording, new RealtimeOptions(key: 'config', secret: 'config'));

        $bird->realtime->publish('rap_1', (new RealtimePublish())->setEvent('e')->setChannels(['c']), new RequestOptions(realtime: new RealtimeOptions(key: 'percall', secret: 'percall')));

        self::assertSame('percall', $recording->lastRequest?->getHeaderLine('X-Realtime-Key'));
    }

    public function testMissingCredentialsThrowBeforeRequest(): void
    {
        $recording = $this->recording();
        $bird = $this->bird($recording);

        $this->expectException(\InvalidArgumentException::class);
        try {
            $bird->realtime->publish('rap_1', (new RealtimePublish())->setEvent('e'));
        } finally {
            self::assertNull($recording->lastRequest, 'must not reach the wire without credentials');
        }
    }

    public function testEmptyCredentialsThrowBeforeRequest(): void
    {
        // The getenv(...) ?: '' idiom yields '' when unset; empty must fail like
        // missing, not reach the wire as an opaque 401 (parity with Go/TS/Python).
        $recording = $this->recording();
        $bird = $this->bird($recording, new RealtimeOptions(key: '', secret: ''));

        $this->expectException(\InvalidArgumentException::class);
        try {
            $bird->realtime->publish('rap_1', (new RealtimePublish())->setEvent('e')->setChannels(['c']));
        } finally {
            self::assertNull($recording->lastRequest, 'empty credentials must not reach the wire');
        }
    }

    public function testChannelNamesAreUrlEncoded(): void
    {
        $recording = $this->recording('{}');
        $bird = $this->bird($recording, new RealtimeOptions(key: 'k', secret: 's'));

        $bird->realtime->channels->get('rap_1', 'presence:room 1');

        self::assertSame('/v1/realtime/apps/rap_1/channels/presence%3Aroom%201', $recording->lastRequest?->getUri()->getPath());
    }

    /**
     * The app secret must reach ONLY the operations that declare the schemes. A
     * shared header path once put it on every request, so this pins the scope.
     */
    public function testCredentialsAreNotSentOnAnUnrelatedResource(): void
    {
        $recording = $this->recording('{"data":[],"next_cursor":null}');
        $bird = $this->bird($recording, new RealtimeOptions(key: 'k', secret: 's'));

        iterator_to_array($bird->contacts->list());

        $request = $recording->lastRequest;
        self::assertSame('', $request?->getHeaderLine('X-Realtime-Key'));
        self::assertSame('', $request?->getHeaderLine('X-Realtime-Secret'));
        self::assertSame('Bearer bk_test', $request?->getHeaderLine('Authorization'));
    }
}
