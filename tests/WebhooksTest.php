<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use MessageBird\Bird;
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

        $event = (new Webhooks(self::SECRET))->unwrap($body, $headers);

        self::assertSame('email.delivered', $event['type']);
        self::assertSame('em_1', $event['data']['email_id']);
    }

    public function testUnwrapRejectsTamperedPayload(): void
    {
        [$body, $headers] = $this->signed('{"type":"email.delivered","data":{}}');

        $this->expectException(WebhookVerificationError::class);
        (new Webhooks(self::SECRET))->unwrap($body . ' tampered', $headers);
    }

    public function testUnwrapRejectsMissingHeaders(): void
    {
        $this->expectException(WebhookVerificationError::class);
        (new Webhooks(self::SECRET))->unwrap('{"type":"x"}', []);
    }

    public function testMissingSecretThrows(): void
    {
        [$body, $headers] = $this->signed('{"type":"x"}');

        $this->expectException(\InvalidArgumentException::class);
        (new Webhooks())->unwrap($body, $headers);
    }

    public function testPerCallSecretOverride(): void
    {
        $payload = '{"type":"sms.delivered","data":{}}';
        [$body, $headers] = $this->signed($payload);

        // Client has no secret; the per-call secret is used.
        $event = (new Webhooks())->unwrap($body, $headers, self::SECRET);
        self::assertSame('sms.delivered', $event['type']);
    }

    public function testBirdWiresWebhooks(): void
    {
        $bird = new Bird('bk_test', 'https://api.example.test', webhookSecret: self::SECRET);
        self::assertInstanceOf(Webhooks::class, $bird->webhooks);
    }
}
