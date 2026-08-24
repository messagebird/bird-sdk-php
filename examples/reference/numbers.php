<?php

// HAND-WRITTEN example source for the GENERATED numbers methods.
// Each `bird:snippet` region is the single source of truth for that key: the
// surfacegen PHP writer injects it (unmarked) as the @example on the generated
// method, and the docs pipeline extracts it for the API-reference code tabs.
// The scenarios mirror the other SDKs' numbers examples.

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\NumbersOrderCreate;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

// The search is always country-scoped, so country_code is required.
$page = $bird->numbers->available->list([
    'country_code' => 'GB',
    'capabilities' => ['sms', 'voice'],
]);
foreach ($page as $candidate) {
    echo $candidate->getNumber(), ' ', $candidate->getNumberType(), "\n";
}

// A number a carrier supplies is only on sale while the carrier still has it,
// so a 404 here means someone else took it.
$candidate = $bird->numbers->available->get('+447700900201');
echo $candidate->getCountryCode(), "\n";

$order = $bird->numbers->orders->create(
    (new NumbersOrderCreate())->setNumber('+447700900201'),
);
// Most orders finish inside the request. One that has to wait on a carrier
// comes back without a number_id. Poll it until it is completed or failed.
if ($order->getStatus() === 'completed') {
    echo 'allocated as ', $order->getNumberId(), "\n";
} else {
    echo 'still ', $order->getStatus(), '; poll ', $order->getId(), "\n";
}

$order = $bird->numbers->orders->get('nor_01krdgeqcxet5s7t44vh8rt9mg');
// failure_reason says what went wrong, and only ever on a failed order.
echo $order->getStatus(), ' ', $order->getFailureReason() ?? '', "\n";

$page = $bird->numbers->orders->list(['status' => 'failed']);
foreach ($page as $order) {
    echo $order->getNumber(), ' ', $order->getFailureReason() ?? '', "\n";
}

$page = $bird->numbers->list(['country_code' => 'GB']);
foreach ($page as $allocated) {
    // kind tells a number you bought from one Bird manages for several workspaces.
    echo $allocated->getNumber(), ' ', $allocated->getKind(), ' ', $allocated->getStatus(), "\n";
}

$allocated = $bird->numbers->get('nda_01krdgeqcxet5s7t44vh8rt9mg');
// A country that asks for ownership paperwork answers here; most answer null.
echo $allocated->getStatus(), "\n";

// Releasing stops the monthly charge and the number stops working for you.
// Only a dedicated number can be released; a shared one answers E14002.
$bird->numbers->release('nda_01krdgeqcxet5s7t44vh8rt9mg');
