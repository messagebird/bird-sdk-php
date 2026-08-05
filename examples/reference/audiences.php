<?php

// HAND-WRITTEN example source for the GENERATED audiences methods. Each
// `bird:snippet` region is the single source of truth for that key: the
// surfacegen PHP writer injects it (unmarked) as the @example on the generated
// method, and the docs pipeline extracts it for the API-reference code tabs.
// The scenarios mirror the other SDKs' audiences examples.

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\AudienceContactsAddRequest;
use MessageBird\Wire\Model\AudienceContactsRemoveRequest;
use MessageBird\Wire\Model\AudienceCreateRequest;
use MessageBird\Wire\Model\AudienceUpdateRequest;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$audience = $bird->audiences->create(
    (new AudienceCreateRequest())->setName('Newsletter subscribers'),
);
echo $audience->getId(); // "adn_…"

$audience = $bird->audiences->get('adn_01krdgeqcxet5s7t44vh8rt9mg');
echo $audience->getName();

$bird->audiences->update(
    'adn_01krdgeqcxet5s7t44vh8rt9mg',
    (new AudienceUpdateRequest())->setName('Renamed'),
);

$bird->audiences->delete('adn_01krdgeqcxet5s7t44vh8rt9mg');

foreach ($bird->audiences->list() as $audience) {
    echo $audience->getId(), ' ', $audience->getName(), "\n";
}

foreach ($bird->audiences->listContacts('adn_01krdgeqcxet5s7t44vh8rt9mg') as $member) {
    echo $member->getContact()?->getId(), ' ', $member->getJoinedAt()?->format(DATE_ATOM), "\n";
}

$bird->audiences->addContacts(
    'adn_01krdgeqcxet5s7t44vh8rt9mg',
    (new AudienceContactsAddRequest())->setContactIds(['con_01krdgeqcxet5s7t44vh8rt9mg']),
);

$bird->audiences->removeContacts(
    'adn_01krdgeqcxet5s7t44vh8rt9mg',
    (new AudienceContactsRemoveRequest())->setContactIds(['con_01krdgeqcxet5s7t44vh8rt9mg']),
);

$bird->audiences->removeContact(
    'adn_01krdgeqcxet5s7t44vh8rt9mg',
    'con_01krdgeqcxet5s7t44vh8rt9mg',
);
