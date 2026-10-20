<?php

// HAND-WRITTEN example source for the GENERATED compliance methods.
// Each `bird:snippet` region is the single source of truth for that key: the
// surfacegen PHP writer injects it (unmarked) as the @example on the generated
// method, and the docs pipeline extracts it for the API-reference code tabs.
// The scenarios mirror the other SDKs' compliance examples.

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\ComplianceAnswer;
use MessageBird\Wire\Model\ComplianceSubmissionCreate;
use MessageBird\Wire\Model\ComplianceSubmissionResupply;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$requirement = $bird->complianceRequirements->get([
    'subject_kind' => 'number',
    'subject_id' => 'nda_01krdgeqcxet5s7t44vh8rt9mg',
    'country_code' => 'US',
]);
foreach ($requirement->getFields() ?? [] as $field) {
    echo $field->getKey(), ' ', $field->getState(), "\n";
}

$submission = $bird->complianceSubmissions->create(
    (new ComplianceSubmissionCreate())
        ->setSubjectKind('number')
        ->setSubjectId('nda_01krdgeqcxet5s7t44vh8rt9mg')
        ->setProgram('local')
        ->setCountryCode('US')
        ->setAnswers([
            (new ComplianceAnswer())->setKey('legal_entity_name')->setValue('Goldcrest Communications Inc'),
            (new ComplianceAnswer())->setKey('business_registration_number')->setValue('90012768'),
        ]),
);
// There is no draft: the answers are filed for review as of this call.
echo $submission->getId(), "\n";

$submission = $bird->complianceSubmissions->get('csb_01krdgeqcxet5s7t44vh8rt9mg');
foreach ($submission->getItems() ?? [] as $item) {
    echo $item->getKey(), ' ', $item->getState(), ' ', $item->getReason() ?? '', "\n";
}

$submission = $bird->complianceSubmissions->resupply(
    'csb_01krdgeqcxet5s7t44vh8rt9mg',
    (new ComplianceSubmissionResupply())->setAnswers([
        (new ComplianceAnswer())->setKey('business_registration_number')->setValue('90012769'),
    ]),
);
echo $submission->getSatisfied() ? 'satisfied' : 'outstanding', "\n";

foreach ($bird->complianceAttachments->list() as $attachment) {
    echo $attachment->getId(), ' ', $attachment->getFilename(), ' ', $attachment->getStatus(), "\n";
}

// Once a registration cites the attachment, this returns a 409.
$bird->complianceAttachments->delete('tca_01krdgeqcxet5s7t44vh8rt9mg');

foreach ($bird->complianceIdentities->list() as $identity) {
    echo $identity->getId(), ' ', $identity->getName(), "\n";
}

$identity = $bird->complianceIdentities->get('cid_01krdgeqcxet5s7t44vh8rt9mg');
echo $identity->getName(), "\n";

$bird->complianceIdentities->create((new \MessageBird\Wire\Model\ComplianceIdentityCreate())->setName('Goldcrest'));

$bird->complianceIdentities->update('cid_01krdgeqcxet5s7t44vh8rt9mg', (new \MessageBird\Wire\Model\ComplianceIdentityUpdate())->setName('Goldcrest SAS'));

$bird->complianceIdentities->delete('cid_01krdgeqcxet5s7t44vh8rt9mg');

foreach ($bird->smsSenders->list() as $sender) {
    echo $sender->getId(), PHP_EOL;
}

$bird->smsSenders->get('snd_01krdgeqcxet5s7t44vh8rt9mg');

$bird->smsSenders->create((new \MessageBird\Wire\Model\SMSSenderCreate())->setType('alpha')->setSender('GOLDCREST'));

$bird->smsSenderRequirements->list('snd_01krdgeqcxet5s7t44vh8rt9mg');

$bird->smsSenderRegistrations->create('snd_01krdgeqcxet5s7t44vh8rt9mg', (new \MessageBird\Wire\Model\SMSCountryRegistrationCreate())->setCountryCode('NL'));

// Use a delegated user OAuth token with org:billing:read in its issuing region.
$bird = new Bird(getenv('BIRD_OAUTH_ACCESS_TOKEN') ?: '', region: 'eu1');
$bird->billingPrices->resolve(['product_slug' => 'sms_sender_registration', 'dimensions' => ['country_code' => 'NL', 'sender_type' => 'alphanumeric']]);

// Use a delegated user OAuth token with org:billing:read in its issuing region.
$bird = new Bird(getenv('BIRD_OAUTH_ACCESS_TOKEN') ?: '', region: 'eu1');
$bird->billingWallets->list();
$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$contents = file_get_contents('proof-of-address.pdf');
if ($contents === false) {
    exit("Cannot read proof-of-address.pdf\n");
}
$attachment = $bird->complianceAttachments->create(
    $contents,
    'proof-of-address.pdf',
    'Utility bill for the registered address',
);
// Cite this id as the answer's attachment_id in a submission.
echo $attachment->getId(), ' ', $attachment->getContentType(), "\n";

$file = $bird->complianceAttachments->get('tca_01krdgeqcxet5s7t44vh8rt9mg');
if (file_put_contents($file->filename ?? 'attachment', $file->data) !== \strlen($file->data)) {
    throw new \RuntimeException('Cannot save the attachment');
}
echo $file->contentType, ' ', \strlen($file->data), "\n";

$form = $bird->complianceDocumentTemplates->get('cmt_01krdgeqcxet5s7t44vh8rt9mg');
// Complete the form, then upload it with $bird->complianceAttachments->create().
if (file_put_contents($form->filename ?? 'form', $form->data) !== \strlen($form->data)) {
    throw new \RuntimeException('Cannot save the form');
}
echo $form->contentType, "\n";
