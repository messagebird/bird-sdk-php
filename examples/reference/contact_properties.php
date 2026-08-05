<?php

// HAND-WRITTEN example source for the GENERATED contactProperties methods.
// Each `bird:snippet` region is the single source of truth for that key: the
// surfacegen PHP writer injects it (unmarked) as the @example on the generated
// method, and the docs pipeline extracts it for the API-reference code tabs.
// The scenarios mirror the other SDKs' contact-property examples.
//
// `fallback_value` is deliberately untyped in the wire model: the API accepts a
// string, number, or bool depending on the property's own `type`.

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\ContactPropertyCreateRequest;
use MessageBird\Wire\Model\ContactPropertyUpdateRequest;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$property = $bird->contactProperties->create(
    (new ContactPropertyCreateRequest())->setKey('plan')->setType('string'),
);
echo $property->getId(); // "cp_…"

$property = $bird->contactProperties->get('cp_01krdgeqcxet5s7t44vh8rt9mg');
echo $property->getKey(), ' ', $property->getType();

$bird->contactProperties->update(
    'cp_01krdgeqcxet5s7t44vh8rt9mg',
    (new ContactPropertyUpdateRequest())->setFallbackValue('free'),
);

foreach ($bird->contactProperties->list() as $property) {
    echo $property->getKey(), ' ', $property->getType(), "\n";
}

$property = $bird->contactProperties->archive('cp_01krdgeqcxet5s7t44vh8rt9mg');
echo $property->getKey(), ' ', var_export($property->getArchived(), true);

$bird->contactProperties->unarchive('cp_01krdgeqcxet5s7t44vh8rt9mg');
