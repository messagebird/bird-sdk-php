<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Tests\Support\RecordingClient;
use MessageBird\Wire\Model\Preference;
use PHPUnit\Framework\TestCase;

/**
 * Preferences::create and ::delete are hand-written overrides (see
 * src/Resources/Preferences.php). This pins two things the generated path
 * cannot: `consented_at` serializes to RFC 3339 at whatever sub-second
 * precision the caller supplied instead of silently truncating it, and the
 * write result's nested `preference` comes back as a typed Preference
 * instead of the raw array the generated normalizer leaves it as.
 */
final class PreferencesTest extends TestCase
{
    private function bird(RecordingClient $recording): Bird
    {
        return new Bird('bk_test', 'https://api.example.test', $recording);
    }

    private function recording(string $body): RecordingClient
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();

        return new RecordingClient(
            $responseFactory->createResponse(200)->withBody($streamFactory->createStream($body)),
        );
    }

    /**
     * @return array<string, mixed>
     */
    private function sentBody(RecordingClient $recording): array
    {
        $request = $recording->lastRequest;
        self::assertNotNull($request);

        return json_decode((string) $request->getBody(), true);
    }

    private const WRITE_RESULT_BODY = '{"applied":true,"transition_id":"prt_1","preference":null}';

    public function testConsentedAtWholeSecondUtcStaysByteIdentical(): void
    {
        $recording = $this->recording(self::WRITE_RESULT_BODY);
        $this->bird($recording)->preferences->create(
            channel: 'email',
            handle: 'recipient@example.com',
            status: 'granted',
            consentedAt: new \DateTimeImmutable('2026-08-20T14:03:10Z'),
        );

        // Byte-identical to the pre-fix literal: the record_grant_with_consent
        // conformance vector pins this exact whole-second form.
        self::assertSame('2026-08-20T14:03:10Z', $this->sentBody($recording)['consented_at']);
    }

    public function testConsentedAtMicrosecondsUtcIsPreservedAndTrimmed(): void
    {
        $recording = $this->recording(self::WRITE_RESULT_BODY);
        $this->bird($recording)->preferences->create(
            channel: 'email',
            handle: 'recipient@example.com',
            status: 'granted',
            consentedAt: new \DateTimeImmutable('2026-08-20T14:03:10.123456Z'),
        );

        self::assertSame('2026-08-20T14:03:10.123456Z', $this->sentBody($recording)['consented_at']);
    }

    public function testConsentedAtTrimsTrailingZeroMicroseconds(): void
    {
        $recording = $this->recording(self::WRITE_RESULT_BODY);
        $this->bird($recording)->preferences->create(
            channel: 'email',
            handle: 'recipient@example.com',
            status: 'granted',
            // 500000µs is a half second; trailing zeros should not survive.
            consentedAt: new \DateTimeImmutable('2026-08-20T14:03:10.500000Z'),
        );

        self::assertSame('2026-08-20T14:03:10.5Z', $this->sentBody($recording)['consented_at']);
    }

    public function testConsentedAtNonUtcOffsetWithFraction(): void
    {
        $recording = $this->recording(self::WRITE_RESULT_BODY);
        $this->bird($recording)->preferences->create(
            channel: 'email',
            handle: 'recipient@example.com',
            status: 'granted',
            consentedAt: new \DateTimeImmutable('2026-08-20T14:03:10.5+02:00'),
        );

        self::assertSame('2026-08-20T14:03:10.5+02:00', $this->sentBody($recording)['consented_at']);
    }

    public function testConsentedAtNonUtcOffsetWholeSecond(): void
    {
        $recording = $this->recording(self::WRITE_RESULT_BODY);
        $this->bird($recording)->preferences->create(
            channel: 'email',
            handle: 'recipient@example.com',
            status: 'granted',
            consentedAt: new \DateTimeImmutable('2026-08-20T14:03:10+02:00'),
        );

        self::assertSame('2026-08-20T14:03:10+02:00', $this->sentBody($recording)['consented_at']);
    }

    public function testDeleteRefusedByNewerStatementDecodesTypedPreference(): void
    {
        $recording = $this->recording(<<<'JSON'
            {
                "applied": false,
                "transition_id": "prt_01krdgeqcxet5s7t44vh8rt9mj",
                "preference": {
                    "id": "prf_01krdgeqcxet5s7t44vh8rt9mg",
                    "channel": "sms",
                    "handle": "+15550001234",
                    "sender_scope": null,
                    "topic_id": null,
                    "status": "revoked",
                    "coverage": "non_transactional",
                    "effective_at": "2026-07-08T12:05:00.000Z",
                    "origin": "keyword",
                    "contact_id": null,
                    "created_at": "2026-07-08T12:00:00.512Z",
                    "updated_at": "2026-07-08T12:05:00.000Z"
                }
            }
            JSON);

        $result = $this->bird($recording)->preferences->delete('prf_01krdgeqcxet5s7t44vh8rt9mg');

        self::assertFalse($result->getApplied());
        $preference = $result->getPreference();
        self::assertInstanceOf(Preference::class, $preference);
        self::assertSame('+15550001234', $preference->getHandle());
        self::assertSame('revoked', $preference->getStatus());
    }

    public function testDeleteAppliedWithNoSurvivingPreferenceStaysNull(): void
    {
        $recording = $this->recording(self::WRITE_RESULT_BODY);

        $result = $this->bird($recording)->preferences->delete('prf_01krdgeqcxet5s7t44vh8rt9mg');

        self::assertTrue($result->getApplied());
        self::assertNull($result->getPreference());
    }

    public function testCreateDecodesTypedPreferenceOnRefusal(): void
    {
        $recording = $this->recording(<<<'JSON'
            {
                "applied": false,
                "transition_id": "prt_1",
                "preference": {
                    "id": "prf_1",
                    "channel": "email",
                    "handle": "recipient@example.com",
                    "sender_scope": null,
                    "topic_id": null,
                    "status": "granted",
                    "coverage": "non_transactional",
                    "effective_at": "2026-07-08T12:05:00.000Z",
                    "origin": "api_key",
                    "contact_id": null,
                    "created_at": "2026-07-08T12:00:00.512Z",
                    "updated_at": "2026-07-08T12:05:00.000Z"
                }
            }
            JSON);

        $result = $this->bird($recording)->preferences->create(
            channel: 'email',
            handle: 'recipient@example.com',
            status: 'revoked',
        );

        $preference = $result->getPreference();
        self::assertInstanceOf(Preference::class, $preference);
        self::assertSame('recipient@example.com', $preference->getHandle());
    }
}
