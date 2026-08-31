<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use MessageBird\Bird;
use MessageBird\Exception\MissingApiKeyException;
use MessageBird\Exception\WebhookVerificationError;
use MessageBird\Webhooks;
use PHPUnit\Framework\TestCase;
use StandardWebhooks\Webhook as StandardWebhook;

/**
 * $bird->webhooks->unwrap verifies a delivered payload's Standard Webhooks
 * signature over the RAW body and returns the decoded event; a bad signature,
 * a missing header, or an absent secret is rejected.
 */
final class WebhooksTest extends TestCase
{
    private const SECRET = 'MfKQ9r8GKYqrTwjUPD8ILPZIo2LaLaSw'; // base64, the Standard Webhooks form

    private function webhooks(?string $secret = null): Webhooks
    {
        return new Webhooks(new Bird('bk_test', 'https://api.example.test'), $secret);
    }

    /**
     * @param array<string, string> ...$_
     *
     * @return array{string, array<string, string>}
     */
    private function signed(string $payload): array
    {
        $id = 'msg_2h4k';
        $ts = time();
        $sig = (new StandardWebhook(self::SECRET))->sign($id, $ts, $payload);

        return [$payload, ['webhook-id' => $id, 'webhook-timestamp' => (string) $ts, 'webhook-signature' => $sig]];
    }

    public function testUnwrapVerifiesAndReturnsEvent(): void
    {
        $payload = '{"type":"email.delivered","data":{"email_id":"em_1","recipient":"a@b.com"}}';
        [$body, $headers] = $this->signed($payload);

        $event = $this->webhooks(self::SECRET)->unwrap($body, $headers);

        self::assertSame('email.delivered', $event['type']);
        self::assertSame('em_1', $event['data']['email_id']);
    }

    public function testUnwrapRejectsTamperedPayload(): void
    {
        [$body, $headers] = $this->signed('{"type":"email.delivered","data":{}}');

        $this->expectException(WebhookVerificationError::class);
        $this->webhooks(self::SECRET)->unwrap($body . ' tampered', $headers);
    }

    public function testUnwrapRejectsMissingHeaders(): void
    {
        $this->expectException(WebhookVerificationError::class);
        $this->webhooks(self::SECRET)->unwrap('{"type":"x"}', []);
    }

    public function testMissingSecretThrows(): void
    {
        [$body, $headers] = $this->signed('{"type":"x"}');

        $this->expectException(\InvalidArgumentException::class);
        $this->webhooks()->unwrap($body, $headers);
    }

    public function testPerCallSecretOverride(): void
    {
        $payload = '{"type":"sms.delivered","data":{}}';
        [$body, $headers] = $this->signed($payload);

        // Client has no secret; the per-call secret is used.
        $event = $this->webhooks()->unwrap($body, $headers, self::SECRET);
        self::assertSame('sms.delivered', $event['type']);
    }

    public function testBirdWiresWebhooks(): void
    {
        $bird = new Bird('bk_test', 'https://api.example.test', webhookSecret: self::SECRET);
        self::assertInstanceOf(Webhooks::class, $bird->webhooks);
    }

    public function testReceiverOnlyClientUnwrapsWithoutApiKey(): void
    {
        $payload = '{"type":"email.delivered","data":{"email_id":"em_1"}}';
        [$body, $headers] = $this->signed($payload);

        $receiver = new Bird(webhookSecret: self::SECRET);
        $event = $receiver->webhooks->unwrap($body, $headers);

        self::assertSame('email.delivered', $event['type']);
    }

    public function testReceiverOnlyClientRejectsApiCalls(): void
    {
        $receiver = new Bird(webhookSecret: self::SECRET);

        $this->expectException(MissingApiKeyException::class);
        $receiver->get('/v1/workspace');
    }

    public function testClientRequiresApiKeyOrWebhookSecret(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Bird();
    }

    public function testEmptyApiKeyCountsAsAbsent(): void
    {
        $payload = '{"type":"email.delivered","data":{"email_id":"em_1"}}';
        [$body, $headers] = $this->signed($payload);

        // The documented pattern getenv('BIRD_API_KEY') ?: '' passes '' when unset.
        $receiver = new Bird('', webhookSecret: self::SECRET);
        $event = $receiver->webhooks->unwrap($body, $headers);

        self::assertSame('email.delivered', $event['type']);
    }

    public function testEmptyApiKeyAloneThrows(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Bird('');
    }
}
