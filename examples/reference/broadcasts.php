<?php

// HAND-WRITTEN example source for the broadcasts methods. Each
// `bird:snippet` region is the single source of truth for that key: the
// surfacegen PHP writer injects it (unmarked) as the @example on the generated
// method, and the docs pipeline extracts it for the API-reference code tabs.
// The scenarios mirror the other SDKs' broadcasts examples.

declare(strict_types=1);

use MessageBird\Bird;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$broadcast = $bird->broadcasts->create(
    from: 'newsletter@example.com',
    audienceId: 'adn_01krdgeqcxet5s7t44vh8rt9mg',
    template: 'emt_01krdgeqcxet5s7t44vh8rt9mg',
);
echo $broadcast->getId(), ' ', $broadcast->getStatus(); // "eb_…" "draft"

$broadcast = $bird->broadcasts->get('eb_01krdgeqcxet5s7t44vh8rt9mg');
echo $broadcast->getStatus(), ' ', $broadcast->getSentCount(), ' ', $broadcast->getDeliveredCount();

$broadcast = $bird->broadcasts->update(
    'eb_01krdgeqcxet5s7t44vh8rt9mg',
    ['template' => ['id' => 'emt_01krdgeqcxet5s7t44vh8rt9mg']],
);
echo $broadcast->getStatus();

$bird->broadcasts->delete('eb_01krdgeqcxet5s7t44vh8rt9mg');

foreach ($bird->broadcasts->list(['status' => ['sent']]) as $broadcast) {
    echo $broadcast->getId(), ' ', $broadcast->getStatus(), PHP_EOL;
}

$broadcast = $bird->broadcasts->send('eb_01krdgeqcxet5s7t44vh8rt9mg');
echo $broadcast->getStatus(); // "accepted"

$broadcast = $bird->broadcasts->cancel('eb_01krdgeqcxet5s7t44vh8rt9mg');
echo $broadcast->getStatus(); // "canceling" or "canceled"

$quota = $bird->broadcasts->sendQuota('eb_01krdgeqcxet5s7t44vh8rt9mg');
if ($quota->getAllowed() < $quota->getRecipients()) {
    echo $quota->getLimitedBy(), ' allowance covers only ', $quota->getAllowed();
}

$counts = $bird->broadcasts->counts('eb_01krdgeqcxet5s7t44vh8rt9mg');
echo $counts->getTotal(), ' ', $counts->getAddressable(), ' ', $counts->getSendable();

foreach ($bird->broadcasts->listRecipients('eb_01krdgeqcxet5s7t44vh8rt9mg') as $recipient) {
    echo $recipient->getRecipient(), ' ', $recipient->getStatus(), PHP_EOL;
}

$events = $bird->broadcasts->listEvents('eb_01krdgeqcxet5s7t44vh8rt9mg', ['type' => 'email.bounced']);
foreach ($events as $event) {
    echo $event->getType(), ' ', $event->getRecipientId(), ' ', $event->getBounceType(), PHP_EOL;
}

$links = $bird->broadcasts->listClickedLinks('eb_01krdgeqcxet5s7t44vh8rt9mg');
foreach ($links->getData() ?? [] as $link) {
    echo $link->getUrl(), ' ', $link->getClickCount(), ' ', $link->getRecipientCount(), PHP_EOL;
}
