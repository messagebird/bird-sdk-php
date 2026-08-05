<?php

declare(strict_types=1);

namespace MessageBird\Exception;

/**
 * A delivered webhook failed Standard Webhooks verification — a bad signature, a
 * stale timestamp, or missing/malformed headers. Sits under BirdException so
 * `catch (BirdException)` covers it, mirroring the webhook-verification error in
 * the TS/other SDKs.
 */
final class WebhookVerificationError extends BirdException
{
}
