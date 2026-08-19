<?php

// HAND-WRITTEN example source for the client itself: construction options and
// the verb-method escape hatch. Each `bird:snippet` region is the source of
// truth for that key; the docs pipeline injects it into the PHP SDK guide
// (docs/sdks/php). Type-checked by phpstan so a wrong option or verb signature
// fails at author time. These client-level snippets document the hand-written client.

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\EmailDefaults;

$bird = new Bird(
    getenv('BIRD_API_KEY') ?: '',
    region: 'eu1',                                          // optional; overrides the region inferred from the key prefix
    maxRetries: 2,                                          // retry budget for transient failures (default 2)
    email: new EmailDefaults(from: 'hello@acme.com'),       // optional channel defaults, such as a default sender
    webhookSecret: getenv('BIRD_WEBHOOK_SECRET') ?: null,   // signing secret for $bird->webhooks->unwrap()
);

// The verb methods (get/post/put/patch/delete) run through the same auth,
// retries, idempotency, and base-URL handling as the typed methods; pass a
// path and, for writes, a body array.
$messages = $bird->get('/v1/sms/messages', query: ['limit' => 10]);
$created = $bird->post('/v1/sms/messages', body: [
    'from' => '+15557654321',
    'to' => '+15551234567',
    'text' => 'Your code is 123456.',
    'category' => 'authentication',
]);
