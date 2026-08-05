<?php

// HAND-WRITTEN example source for the GENERATED domains methods. Each
// `bird:snippet` region is the single source of truth for that key: the
// surfacegen PHP writer injects it (unmarked) as the @example on the generated
// method, and the docs pipeline extracts it for the API-reference code tabs.
// The scenarios mirror the other SDKs' domains examples.
//
// A new domain lands in `pending`: publish the returned `dns_records` at your
// DNS provider, then re-run the check with `domains.verify`.

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\DomainCreate;
use MessageBird\Wire\Model\DomainSettings;
use MessageBird\Wire\Model\DomainUpdate;
use MessageBird\Wire\Model\DomainUpdateTracking;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$domain = $bird->domains->create(
    (new DomainCreate())->setDomain('mail.acme.com'),
);
echo $domain->getId(), ' ', $domain->getStatus(); // "dom_…", "pending"

$domain = $bird->domains->get('dom_01krdgeqcxet5s7t44vh8rt9mg');
echo $domain->getDomain();

foreach ($bird->domains->list() as $domain) {
    echo $domain->getId(), ' ', $domain->getStatus(), "\n";
}

$bird->domains->update(
    'dom_01krdgeqcxet5s7t44vh8rt9mg',
    (new DomainUpdate())
        ->setSettings((new DomainSettings())->setClickTracking(true)->setOpenTracking(true))
        ->setTracking((new DomainUpdateTracking())->setName('links')),
);

$domain = $bird->domains->verify('dom_01krdgeqcxet5s7t44vh8rt9mg');
echo $domain->getStatus(); // "verified" once DNS is in place

$bird->domains->delete('dom_01krdgeqcxet5s7t44vh8rt9mg');
