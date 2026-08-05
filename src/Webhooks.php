<?php

declare(strict_types=1);

namespace MessageBird;

use MessageBird\Exception\WebhookVerificationError;
use StandardWebhooks\Exception\WebhookVerificationException;
use StandardWebhooks\Webhook as StandardWebhook;

/**
 * Verifies a delivered webhook's Standard Webhooks signature and returns the
 * decoded event. Pure crypto — it never touches the transport, so it carries no
 * core dependency. Reached as `$bird->webhooks`; mirrors the TS SDK's
 * `bird.webhooks.unwrap`.
 */
final class Webhooks
{
    public function __construct(
        #[\SensitiveParameter] private readonly ?string $secret = null,
    ) {
    }

    /**
     * Verify a raw webhook body against its headers and return the decoded event.
     *
     * Pass the RAW request body exactly as received — the Standard Webhooks
     * signature is computed over the raw bytes, so parsing and re-serializing
     * before verifying is the classic webhook bug. The secret comes from the
     * client's webhook secret; pass $secret to override per call. Unknown event
     * types come back as-is (switch on `$event['type']`) so a newer server event
     * can't break an older SDK.
     *
     * @param array<string, string|list<string>> $headers inbound request headers, including `webhook-id`, `webhook-timestamp`, `webhook-signature`
     *
     * @return array<string, mixed> the verified, decoded event, discriminated on its `type`
     *
     * @throws WebhookVerificationError on a bad signature, a stale timestamp, or missing/malformed headers
     *
     * @example Verify a delivery and dispatch on the event type
     * // Pass the RAW request body; set the secret via new Bird(..., webhookSecret: …).
     * $event = $bird->webhooks->unwrap($rawBody, getallheaders());
     * echo $event['type']; // e.g. "email.delivered" — narrow on the type
     */
    public function unwrap(string $payload, array $headers, ?string $secret = null): array
    {
        $secret ??= $this->secret;
        if ($secret === null) {
            throw new \InvalidArgumentException('no webhook secret: pass webhookSecret to new Bird(...), or $secret to unwrap()');
        }
        // Header names are case-insensitive (RFC 7230) but the verifier matches
        // `webhook-id` exactly, and getallheaders() — what the example above tells
        // callers to pass — hands back `Webhook-Id` under PHP-FPM and Apache. So the
        // documented usage failed with "Missing required headers" until this.
        $normalized = [];
        foreach ($headers as $name => $value) {
            $normalized[strtolower((string) $name)] = $value;
        }

        try {
            $event = (new StandardWebhook($secret))->verify($payload, $normalized);
        } catch (WebhookVerificationException $e) {
            throw new WebhookVerificationError($e->getMessage(), 0, $e);
        }
        if (!is_array($event)) {
            throw new WebhookVerificationError('verified webhook payload was not a JSON object');
        }

        return $event;
    }
}
