<?php

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\SuppressionCreate;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

foreach ($bird->suppressions->list() as $suppression) {
    echo $suppression->getEmail(), ' ', $suppression->getReason(), PHP_EOL;
}

$suppression = $bird->suppressions->get('sup_abc123');
echo $suppression->getReason(), ' ', $suppression->getAppliesTo();

// Adding is idempotent: an address with a manual suppression returns that record.
$suppression = $bird->suppressions->add(
    (new SuppressionCreate())->setEmail('blocked@example.com'),
);
echo $suppression->getId();

// An API key cannot remove a `complaint` record; those come off in the dashboard.
$bird->suppressions->remove('sup_abc123');
