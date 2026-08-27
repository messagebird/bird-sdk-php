<?php

// HAND-WRITTEN example source for the GENERATED contacts methods. Each
// `bird:snippet` region is the single source of truth for that key: the
// surfacegen PHP writer injects it (unmarked) as the @example on the generated
// method, and the docs pipeline extracts it for the API-reference code tabs.
// The scenarios mirror the other SDKs' contacts examples.

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\ContactCreateRequest;
use MessageBird\Wire\Model\ContactUpdateRequest;
use MessageBird\Wire\Model\ContactUpsertRequest;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$contact = $bird->contacts->create(
    (new ContactCreateRequest())
        ->setEmail('jane@acme.com')
        ->setFirstName('Jane'),
);
echo $contact->getId(); // "con_…"

$contact = $bird->contacts->update(
    'con_01krdgeqcxet5s7t44vh8rt9mg',
    (new ContactUpdateRequest())->setFirstName('Jane'),
);
echo $contact->getFirstName();

$contact = $bird->contacts->get('con_01krdgeqcxet5s7t44vh8rt9mg');
echo $contact->getEmail(), ' ', $contact->getFirstName();

$bird->contacts->delete('con_01krdgeqcxet5s7t44vh8rt9mg');

$result = $bird->contacts->batch(
    (new ContactUpsertRequest())->setContacts([
        (new ContactCreateRequest())->setEmail('jane@acme.com')->setFirstName('Jane'),
    ]),
);
printf("%d contacts upserted\n", count($result->getData() ?? []));

foreach ($bird->contacts->list(['q' => 'acme.com']) as $contact) {
    echo $contact->getId(), ' ', $contact->getEmail(), "\n";
}

foreach ($bird->contacts->preferences->list('con_01krdgeqcxet5s7t44vh8rt9mg') as $preference) {
    echo $preference->getChannel(), ' ', $preference->getStatus(), "\n";
}
