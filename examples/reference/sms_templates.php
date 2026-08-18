<?php

// HAND-WRITTEN example source for the GENERATED SMS-template methods. Each
// `bird:snippet` region is the single source of truth for that key (the op's
// x-snippet-key): the surfacegen PHP writer injects it as the @example on the
// generated method, and the docs pipeline extracts it for the API-reference
// code tabs. Read a template's variables before sending with it (see sms.send
// with template:).

declare(strict_types=1);

use MessageBird\Bird;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$templates = $bird->smsTemplates->list(['scope' => 'system']);
foreach ($templates->getData() ?? [] as $template) {
    echo $template->getId(), ' ', $template->getSlug(), "\n";
}

$template = $bird->smsTemplates->get('bird_otp_verification');
echo $template->getBody();
