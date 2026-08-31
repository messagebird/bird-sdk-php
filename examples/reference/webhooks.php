<?php

// HAND-WRITTEN example source for webhook verification. The `bird:snippet`
// region is the source of truth for its key; the docs pipeline injects it into
// the PHP SDK guide (docs/sdks/php). Type-checked by phpstan.

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Exception\WebhookVerificationError;
use MessageBird\Wire\Model\WebhookEndpointCreate;
use MessageBird\Wire\Model\WebhookEndpointUpdate;
use MessageBird\Wire\Model\WebhookTestRequest;

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

$created = $bird->webhooks->create(
    (new WebhookEndpointCreate())
        ->setUrl('https://acme.com/hooks/bird')
        ->setEvents(['email.delivered', 'email.bounced'])
        ->setDescription('Delivery pipeline'),
);
echo $created->getId(), ' ', $created->getSecret();

foreach ($bird->webhooks->list() as $endpoint) {
    echo $endpoint->getId(), ' ', $endpoint->getUrl(), PHP_EOL;
}

$endpoint = $bird->webhooks->get('whk_01krdgeqcxet5s7t44vh8rt9mg');
echo $endpoint->getUrl();

$endpoint = $bird->webhooks->update(
    'whk_01krdgeqcxet5s7t44vh8rt9mg',
    (new WebhookEndpointUpdate())->setEvents(['email.delivered']),
);
echo implode(',', $endpoint->getEvents() ?? []);

$result = $bird->webhooks->test(
    'whk_01krdgeqcxet5s7t44vh8rt9mg',
    (new WebhookTestRequest())->setEventType('email.delivered'),
);
echo $result->getStatus();

$attempts = $bird->webhooks->attempts('whk_01krdgeqcxet5s7t44vh8rt9mg');
foreach ($attempts->getData() ?? [] as $attempt) {
    echo $attempt->getStatus(), PHP_EOL;
}

$rotated = $bird->webhooks->rotateSecret('whk_01krdgeqcxet5s7t44vh8rt9mg');
echo $rotated->getSecret();

$bird->webhooks->delete('whk_01krdgeqcxet5s7t44vh8rt9mg');
