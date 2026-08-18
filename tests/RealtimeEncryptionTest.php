<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Core\RealtimeCrypto;
use MessageBird\RealtimeOptions;
use MessageBird\RequestOptions;
use MessageBird\Tests\Support\RecordingClient;
use MessageBird\Wire\Model\RealtimeBatchEvent;
use MessageBird\Wire\Model\RealtimeBatchPublish;
use MessageBird\Wire\Model\RealtimePublish;
use PHPUnit\Framework\TestCase;

/**
 * End-to-end encrypted channels (`private-encrypted-`). Half of this replays the
 * cross-SDK vector file verbatim — the wire contract every SDK and the browser
 * client must agree on, byte for byte — and half pins the SDK behavior around it:
 * a publish is sealed before the request is built, and everything else is
 * untouched.
 */
final class RealtimeEncryptionTest extends TestCase
{
    private const MASTER_KEY = 'AQIDBAUGBwgJCgsMDQ4PEBESExQVFhcYGRobHB0eHyA=';

    /** @return array<string, list<array<string, mixed>>> */
    private static function vectors(): array
    {
        $raw = file_get_contents(__DIR__ . '/realtime-encryption-vectors.json');
        self::assertNotFalse($raw, 'the shared vector file must be readable');

        return json_decode($raw, true, flags: JSON_THROW_ON_ERROR);
    }

    private function recording(string $body = '{"data":[]}'): RecordingClient
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();

        return new RecordingClient(
            $responseFactory->createResponse(200)->withBody($streamFactory->createStream($body)),
        );
    }

    private function bird(RecordingClient $recording, ?string $masterKey = self::MASTER_KEY): Bird
    {
        return new Bird('bk_test', 'https://api.example.test', $recording, realtime: new RealtimeOptions(
            key: 'rk_live',
            secret: 'rs_live',
            encryptionMasterKey: $masterKey,
        ));
    }

    /** @return array<string, mixed> the decoded JSON body of the recorded request */
    private function lastBody(RecordingClient $recording): array
    {
        return json_decode((string) $recording->lastRequest?->getBody(), true, flags: JSON_THROW_ON_ERROR);
    }

    public function testDeriveSharedSecretVectors(): void
    {
        foreach (self::vectors()['derive_shared_secret'] as $vector) {
            $secret = RealtimeCrypto::deriveSharedSecret(
                $vector['channel'],
                RealtimeCrypto::decodeMasterKey($vector['master_key']),
            );
            self::assertSame($vector['shared_secret'], base64_encode($secret), $vector['id']);
        }
    }

    public function testEncryptVectors(): void
    {
        foreach (self::vectors()['encrypt'] as $vector) {
            $envelope = RealtimeCrypto::seal(
                $vector['channel'],
                $vector['plaintext'],
                RealtimeCrypto::decodeMasterKey($vector['master_key']),
                base64_decode($vector['nonce'], true),
            );
            self::assertSame($vector['nonce'], $envelope['nonce'], $vector['id']);
            self::assertSame($vector['ciphertext'], $envelope['ciphertext'], $vector['id']);
        }
    }

    public function testDecryptVectors(): void
    {
        foreach (self::vectors()['decrypt'] as $vector) {
            $opened = sodium_crypto_secretbox_open(
                base64_decode($vector['ciphertext'], true),
                base64_decode($vector['nonce'], true),
                RealtimeCrypto::deriveSharedSecret(
                    $vector['channel'],
                    RealtimeCrypto::decodeMasterKey($vector['master_key']),
                ),
            );
            if ($vector['result'] === 'valid') {
                self::assertSame($vector['plaintext'], $opened, $vector['id']);

                continue;
            }
            self::assertFalse($opened, $vector['id']);
        }
    }

    public function testAuthorizeChannelVectors(): void
    {
        foreach (self::vectors()['authorize_channel'] as $vector) {
            $bird = new Bird('bk_test', 'https://api.example.test', $this->recording(), realtime: new RealtimeOptions(
                key: $vector['key'],
                secret: $vector['secret'],
                encryptionMasterKey: $vector['master_key'] ?? null,
            ));

            $auth = $bird->realtime->authorizeChannel(
                $vector['connection_id'],
                $vector['channel'],
                $vector['member_data'] ?? null,
            );

            self::assertSame($vector['auth'], $auth['auth'], $vector['id']);
            self::assertSame($vector['member_data'] ?? null, $auth['member_data'] ?? null, $vector['id']);
            self::assertSame($vector['shared_secret'] ?? null, $auth['shared_secret'] ?? null, $vector['id']);
        }
    }

    public function testAuthorizeChannelWithoutAppCredentialsThrows(): void
    {
        $bird = new Bird('bk_test', 'https://api.example.test', $this->recording());

        $this->expectException(\InvalidArgumentException::class);
        $bird->realtime->authorizeChannel('26896.319537', 'private-room-1');
    }

    public function testAuthorizeChannelOnAnEncryptedChannelNeedsTheMasterKey(): void
    {
        $bird = $this->bird($this->recording(), masterKey: null);

        $this->expectExceptionMessageMatches('/encryptionMasterKey/');
        $bird->realtime->authorizeChannel('26896.319537', 'private-encrypted-orders');
    }

    public function testEncryptedPublishSealsBeforeTheTransport(): void
    {
        $recording = $this->recording();
        $params = (new RealtimePublish())
            ->setEvent('order.updated')
            ->setChannels(['private-encrypted-orders'])
            ->setData(['order_id' => 'ord_123']);

        $this->bird($recording)->realtime->publish('rap_1', $params);

        $body = $this->lastBody($recording);
        self::assertSame(['private-encrypted-orders'], $body['channels']);
        self::assertSame(['nonce', 'ciphertext'], array_keys($body['data']));
        self::assertSame(
            '{"order_id":"ord_123"}',
            sodium_crypto_secretbox_open(
                base64_decode($body['data']['ciphertext'], true),
                base64_decode($body['data']['nonce'], true),
                RealtimeCrypto::deriveSharedSecret('private-encrypted-orders', base64_decode(self::MASTER_KEY, true)),
            ),
        );
        self::assertSame(['order_id' => 'ord_123'], $params->getData(), 'the caller keeps their plaintext request object');
    }

    public function testEachEncryptedPublishUsesAFreshNonce(): void
    {
        $params = (new RealtimePublish())->setEvent('e')->setChannels(['private-encrypted-orders'])->setData(['n' => 1]);

        $nonces = [];
        for ($i = 0; $i < 3; ++$i) {
            $recording = $this->recording();
            $this->bird($recording)->realtime->publish('rap_1', $params);
            $nonces[] = $this->lastBody($recording)['data']['nonce'];
        }

        self::assertCount(3, array_unique($nonces));
    }

    public function testPlainChannelPublishIsUnchangedAndNeedsNoMasterKey(): void
    {
        $recording = $this->recording();
        $bird = $this->bird($recording, masterKey: null);

        $bird->realtime->publish('rap_1', (new RealtimePublish())
            ->setEvent('message.created')
            ->setChannels(['room-42', 'presence-room-1'])
            ->setData(['text' => 'Hello, room!']));

        self::assertSame(['text' => 'Hello, room!'], $this->lastBody($recording)['data']);
    }

    public function testEncryptedPublishRejectsMoreThanOneChannel(): void
    {
        $recording = $this->recording();
        $bird = $this->bird($recording);

        $this->expectException(\InvalidArgumentException::class);
        try {
            $bird->realtime->publish('rap_1', (new RealtimePublish())
                ->setEvent('e')
                ->setChannels(['private-encrypted-orders', 'room-42'])
                ->setData(['a' => 1]));
        } finally {
            self::assertNull($recording->lastRequest, 'a fan-out publish must not reach the wire');
        }
    }

    public function testEncryptedPublishWithoutAMasterKeyThrows(): void
    {
        $recording = $this->recording();
        $bird = $this->bird($recording, masterKey: null);

        $this->expectExceptionMessageMatches('/encryptionMasterKey/');
        try {
            $bird->realtime->publish('rap_1', (new RealtimePublish())
                ->setEvent('e')
                ->setChannels(['private-encrypted-orders'])
                ->setData(['a' => 1]));
        } finally {
            self::assertNull($recording->lastRequest, 'an unsealed payload must not reach the wire');
        }
    }

    public function testAMasterKeyThatIsNot32BytesThrows(): void
    {
        $recording = $this->recording();
        $bird = $this->bird($recording, masterKey: base64_encode('too short'));

        $this->expectExceptionMessageMatches('/32 bytes/');
        $bird->realtime->publish('rap_1', (new RealtimePublish())
            ->setEvent('e')
            ->setChannels(['private-encrypted-orders'])
            ->setData(['a' => 1]));
    }

    public function testPerCallOptionsCanBringASecondAppsMasterKey(): void
    {
        $recording = $this->recording();
        $otherKey = 'oKGio6SlpqeoqaqrrK2ur7CxsrO0tba3uLm6u7y9vr8=';

        $this->bird($recording)->realtime->publish(
            'rap_2',
            (new RealtimePublish())->setEvent('e')->setChannels(['private-encrypted-orders'])->setData(['a' => 1]),
            new RequestOptions(realtime: new RealtimeOptions(key: 'k2', secret: 's2', encryptionMasterKey: $otherKey)),
        );

        $body = $this->lastBody($recording);
        self::assertSame(
            '{"a":1}',
            sodium_crypto_secretbox_open(
                base64_decode($body['data']['ciphertext'], true),
                base64_decode($body['data']['nonce'], true),
                RealtimeCrypto::deriveSharedSecret('private-encrypted-orders', base64_decode($otherKey, true)),
            ),
        );
    }

    public function testBatchSealsOnlyTheEncryptedEvents(): void
    {
        $recording = $this->recording();
        $params = (new RealtimeBatchPublish())->setEvents([
            (new RealtimeBatchEvent())->setEvent('e1')->setChannel('room-1')->setData(['text' => 'hi']),
            (new RealtimeBatchEvent())->setEvent('e2')->setChannel('private-encrypted-orders')->setData(['id' => 42]),
            (new RealtimeBatchEvent())->setEvent('e3')->setChannel('private-encrypted-cache-prices')->setData(['eur' => 9]),
        ]);

        $this->bird($recording)->realtime->publishBatch('rap_1', $params);

        $events = $this->lastBody($recording)['events'];
        self::assertSame(['text' => 'hi'], $events[0]['data']);
        foreach ([[1, 'private-encrypted-orders', '{"id":42}'], [2, 'private-encrypted-cache-prices', '{"eur":9}']] as [$i, $channel, $plaintext]) {
            self::assertSame($plaintext, sodium_crypto_secretbox_open(
                base64_decode($events[$i]['data']['ciphertext'], true),
                base64_decode($events[$i]['data']['nonce'], true),
                RealtimeCrypto::deriveSharedSecret($channel, base64_decode(self::MASTER_KEY, true)),
            ), $channel);
        }
        self::assertSame(['id' => 42], $params->getEvents()[1]->getData(), 'the caller keeps their plaintext events');
    }

    public function testAPlainBatchNeedsNoMasterKey(): void
    {
        $recording = $this->recording();
        $bird = $this->bird($recording, masterKey: null);

        $bird->realtime->publishBatch('rap_1', (new RealtimeBatchPublish())->setEvents([
            (new RealtimeBatchEvent())->setEvent('e1')->setChannel('room-1')->setData(['text' => 'hi']),
        ]));

        self::assertSame(['text' => 'hi'], $this->lastBody($recording)['events'][0]['data']);
    }
}
