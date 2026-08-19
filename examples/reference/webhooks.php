<?php

// HAND-WRITTEN example source for webhook verification. The `bird:snippet`
// region is the source of truth for its key; the docs pipeline injects it into
// the PHP SDK guide (docs/sdks/php). Type-checked by phpstan.

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Exception\WebhookVerificationError;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '', webhookSecret: getenv('BIRD_WEBHOOK_SECRET') ?: null);

// Pass the raw request body because parsing changes the bytes used to compute
// the signature.
$rawBody = file_get_contents('php://input') ?: '';
try {
    $event = $bird->webhooks->unwrap($rawBody, getallheaders());
    // $event is the decoded payload as an array; branch on $event['type'].
    echo $event['type'];
} catch (WebhookVerificationError) {
    http_response_code(400); // bad signature, stale timestamp, or missing/malformed headers
}
