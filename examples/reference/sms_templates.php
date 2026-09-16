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

foreach ($bird->smsTemplates->list(['scope' => 'system']) as $template) {
    echo $template->getId(), ' ', $template->getSlug(), "\n";
}

$template = $bird->smsTemplates->get('bird_otp_verification');
echo $template->getDefaultLanguage(), ' ', $template->getLiveVersionId();

foreach ($bird->smsTemplates->versions->list('bird_otp_verification') as $version) {
    echo $version->getId(), ' ', $version->getVersionNumber(), "\n";
}

$version = $bird->smsTemplates->versions->get(
    'bird_otp_verification',
    'smv_01ky4x8e4genzb7way45txfkm1',
);
echo $version->getId(), ' ', count($version->getLanguages() ?? []);

$languages = $bird->smsTemplates->versions->languages->list(
    'bird_otp_verification',
    'smv_01ky4x8e4genzb7way45txfkm1',
);
foreach ($languages->getData() ?? [] as $language) {
    echo $language->getLanguage(), ' ', $language->getRevision(), "\n";
}

$language = $bird->smsTemplates->versions->languages->get(
    'bird_otp_verification',
    'smv_01ky4x8e4genzb7way45txfkm1',
    'en',
);
echo $language->getLanguage(), ' ', $language->getText();
