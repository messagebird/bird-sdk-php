<?php

// HAND-WRITTEN example source for the WhatsApp methods. Each `bird:snippet`
// region is the single source of truth for that key (the op's x-snippet-key):
// the surfacegen PHP writer injects it as the @example on the generated
// method, and the docs pipeline extracts it for the API-reference code tabs.
// The scenarios mirror the other SDKs' whatsapp examples. `send` is hand-
// written on the Whatsapp parent, so its region here is authored for docs use
// rather than injected.

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\WhatsAppGroupCreate;
use MessageBird\Wire\Model\WhatsAppGroupJoinRequestDecision;
use MessageBird\Wire\Model\WhatsAppGroupPinnedMessageCreate;
use MessageBird\Wire\Model\WhatsAppGroupUpdate;
use MessageBird\Wire\Model\WhatsAppKeywordRuleCreate;
use MessageBird\Wire\Model\WhatsAppKeywordRuleUpdate;
use MessageBird\Wire\Model\WhatsAppMessageTemplateComponent;
use MessageBird\Wire\Model\WhatsAppMessageTemplateComponentParameter;
use MessageBird\Wire\Model\WhatsAppReactionUpsert;
use MessageBird\Wire\Model\WhatsAppReadReceiptRequest;
use MessageBird\Wire\Model\WhatsAppSuppressionCreate;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$message = $bird->whatsapp->send(
    to: '+15551234567',
    template: 'bird_otp',
    language: 'en',
    components: [
        (new WhatsAppMessageTemplateComponent())
            ->setType('body')
            ->setParameters([
                (new WhatsAppMessageTemplateComponentParameter())->setType('text')->setText('123456'),
            ]),
    ],
);
echo $message->getId(), ' ', $message->getStatus();

$message = $bird->whatsapp->get('wamid_01krdgeqcxet5s7t44vh8rt9mg');
echo $message->getStatus();

foreach ($bird->whatsapp->list(['status' => ['delivered']]) as $message) {
    echo $message->getId(), ' ', $message->getStatus(), "\n";
}

$events = $bird->whatsapp->listEvents('wamid_01krdgeqcxet5s7t44vh8rt9mg');
foreach ($events->getData() ?? [] as $event) {
    echo $event->getType(), ' ', $event->getId(), "\n";
}

$summary = $bird->whatsapp->stats->summary([
    'from' => '2026-08-01',
    'to' => '2026-08-31',
    'timezone' => 'Europe/Amsterdam',
]);
echo $summary->getDelivery()?->getAccepted(), ' ', $summary->getDelivery()?->getDelivered();

$daily = $bird->whatsapp->stats->daily(['from' => '2026-08-01', 'to' => '2026-08-31']);
foreach ($daily->getData() ?? [] as $point) {
    echo $point->getBucket(), ' ', $point->getDelivery()?->getAccepted(), PHP_EOL;
}

$hourly = $bird->whatsapp->stats->hourly(['from' => '2026-08-30T00:00:00Z', 'to' => '2026-08-31T00:00:00Z']);
foreach ($hourly->getData() ?? [] as $point) {
    echo $point->getBucket(), ' ', $point->getDelivery()?->getAccepted(), PHP_EOL;
}

$byErrorCode = $bird->whatsapp->stats->byErrorCode(['from' => '2026-08-01', 'to' => '2026-08-31']);
foreach ($byErrorCode->getData() ?? [] as $row) {
    echo $row->getErrorCode(), ' ', $row->getCount(), PHP_EOL;
}

$byTemplate = $bird->whatsapp->stats->byTemplate(['from' => '2026-08-01', 'to' => '2026-08-31']);
foreach ($byTemplate->getData() ?? [] as $row) {
    echo $row->getTemplateId(), ' ', $row->getDelivery()?->getAccepted(), PHP_EOL;
}

$byTemplateCategory = $bird->whatsapp->stats->byTemplateCategory(['from' => '2026-08-01', 'to' => '2026-08-31']);
foreach ($byTemplateCategory->getData() ?? [] as $row) {
    echo $row->getCategory(), ' ', $row->getDelivery()?->getAccepted(), PHP_EOL;
}

$byTag = $bird->whatsapp->stats->byTag(['from' => '2026-08-01', 'to' => '2026-08-31']);
foreach ($byTag->getData() ?? [] as $row) {
    echo $row->getTag(), ' ', $row->getDelivery()?->getAccepted(), PHP_EOL;
}

$byPhoneNumber = $bird->whatsapp->stats->byPhoneNumber(['from' => '2026-08-01', 'to' => '2026-08-31']);
foreach ($byPhoneNumber->getData() ?? [] as $row) {
    echo $row->getPhoneNumber(), ' ', $row->getDelivery()?->getAccepted(), PHP_EOL;
}

$byCountry = $bird->whatsapp->stats->byCountry(['from' => '2026-08-01', 'to' => '2026-08-31']);
foreach ($byCountry->getData() ?? [] as $row) {
    echo $row->getCountry(), ' ', $row->getDelivery()?->getAccepted(), PHP_EOL;
}

$inbound = $bird->whatsapp->stats->inbound->summary(['from' => '2026-05-01', 'to' => '2026-05-31']);
echo $inbound->getReceived();

$inboundDaily = $bird->whatsapp->stats->inbound->daily(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($inboundDaily->getData() ?? [] as $point) {
    echo $point->getBucket(), ' ', $point->getReceived(), PHP_EOL;
}

$inboundHourly = $bird->whatsapp->stats->inbound->hourly([
    'from' => '2026-05-30T00:00:00Z',
    'to' => '2026-05-31T00:00:00Z',
]);
foreach ($inboundHourly->getData() ?? [] as $point) {
    echo $point->getBucket(), ' ', $point->getReceived(), PHP_EOL;
}

$inboundByPhoneNumber = $bird->whatsapp->stats->inbound->byPhoneNumber(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($inboundByPhoneNumber->getData() ?? [] as $row) {
    echo $row->getPhoneNumber(), ' ', $row->getReceived(), PHP_EOL;
}

$media = $bird->whatsapp->messages->media('wam_01kya19eknftrs2s6p82asmvnh', 'waf_01kyb2m4xq7whs0d8n3prv6tez');
file_put_contents('photo.jpg', $media->data);
echo $media->contentType, ' ', $media->contentLength;

$ack = $bird->whatsapp->markRead(
    'wam_01krdgeqcxet5s7t44vh8rt9mg',
    (new WhatsAppReadReceiptRequest())->setTypingIndicator(true),
);
var_dump($ack->getTypingIndicator());

$reaction = $bird->whatsapp->reaction->set(
    'wam_01krdgeqcxet5s7t44vh8rt9mg',
    (new WhatsAppReactionUpsert())->setEmoji("\u{1F44D}"),
);
echo $reaction->getId(), ' ', $reaction->getEmoji();

$bird->whatsapp->reaction->remove('wam_01krdgeqcxet5s7t44vh8rt9mg');

foreach ($bird->whatsapp->reaction->listEvents('wam_01krdgeqcxet5s7t44vh8rt9mg') as $event) {
    echo $event->getId(), ' ', $event->getEmoji(), ' ', $event->getStatus(), "\n";
}

foreach ($bird->whatsapp->templates->list() as $template) {
    echo $template->getSlug(), ' ', $template->getStatus(), "\n";
}

$template = $bird->whatsapp->templates->get('bird_otp');
echo $template->getDefaultLanguage();

foreach ($bird->whatsapp->templates->versions->list('bird_otp') as $version) {
    echo $version->getId(), ' ', $version->getVersionNumber(), "\n";
}

$version = $bird->whatsapp->templates->versions->get('bird_otp', 'wav_01ky4x8e4genzb7way45txfkm1');
echo $version->getVersionNumber();

$languages = $bird->whatsapp->templates->versions->languages->list('bird_otp', 'wav_01ky4x8e4genzb7way45txfkm1');
foreach ($languages->getData() ?? [] as $language) {
    echo $language->getLanguage(), ' ', $language->getStatus(), "\n";
}

$language = $bird->whatsapp->templates->versions->languages->get('bird_otp', 'wav_01ky4x8e4genzb7way45txfkm1', 'nl-BE');
foreach ($language->getComponents() ?? [] as $component) {
    echo $component->getType(), "\n";
}

foreach ($bird->whatsapp->numbers->list(['status' => ['connected']]) as $number) {
    echo $number->getId(), ' ', $number->getPhoneNumber(), ' ', $number->getStatus(), "\n";
}

$number = $bird->whatsapp->numbers->get('wan_01krdgeqcxet5s7t44vh8rt9mg');
echo $number->getStatus(), ' ', $number->getQualityRating(), "\n";

$profile = $bird->whatsapp->numbers->profile->get('wan_01krdgeqcxet5s7t44vh8rt9mg');
echo $profile->getDisplayName(), ' ', $profile->getDescription(), "\n";

foreach ($bird->whatsapp->numbers->listEvents('wan_01krdgeqcxet5s7t44vh8rt9mg') as $event) {
    echo $event->getCreatedAt()?->format(DATE_ATOM), ' ', $event->getType(), "\n";
}

foreach ($bird->whatsapp->businessAccounts->list() as $account) {
    echo $account->getId(), ' ', $account->getName(), ' ', $account->getStatus(), "\n";
}

$account = $bird->whatsapp->businessAccounts->get('waa_01krdgeqcxet5s7t44vh8rt9mg');
echo $account->getAccountReviewStatus(), ' ', $account->getBusinessVerificationStatus(), "\n";

$group = $bird->whatsapp->groups->create(
    (new WhatsAppGroupCreate())
        ->setWhatsappNumberId('wan_01krdgeqcxet5s7t44vh8rt9mg')
        ->setSubject('Norwood Fleet — Tuesday route'),
);
echo $group->getId(), ' ', $group->getStatus(); // pending; read it back for the invite link

foreach ($bird->whatsapp->groups->list() as $group) {
    echo $group->getId(), ' ', $group->getSubject(), PHP_EOL;
}

$group = $bird->whatsapp->groups->get('wag_01krdgeqcxet5s7t44vh8rt9mg');
echo $group->getStatus(), ' ', $group->getInviteLink();

$group = $bird->whatsapp->groups->update(
    'wag_01krdgeqcxet5s7t44vh8rt9mg',
    (new WhatsAppGroupUpdate())->setSubject('Norwood Fleet — Wednesday route'),
);
echo $group->getLastOperation()?->getStatus(); // pending until WhatsApp reports back

$group = $bird->whatsapp->groups->delete('wag_01krdgeqcxet5s7t44vh8rt9mg');
echo $group->getLastOperation()?->getStatus(); // pending until WhatsApp confirms it

$link = $bird->whatsapp->groups->inviteLink->rotate('wag_01krdgeqcxet5s7t44vh8rt9mg');
echo $link->getInviteLink(); // every earlier link has stopped working

$group = $bird->whatsapp->groups->participants->remove(
    'wag_01krdgeqcxet5s7t44vh8rt9mg',
    'BR.1566655121691972',
);
echo count($group->getParticipants() ?? []);

foreach ($bird->whatsapp->groups->joinRequests->list('wag_01krdgeqcxet5s7t44vh8rt9mg') as $request) {
    echo $request->getId(), ' ', $request->getBsuid(), PHP_EOL;
}

$result = $bird->whatsapp->groups->joinRequests->approve(
    'wag_01krdgeqcxet5s7t44vh8rt9mg',
    (new WhatsAppGroupJoinRequestDecision())->setJoinRequestIds(['wgj_01krdgeqcxet5s7t44vh8rt9mg']),
);
echo count($result->getDecided() ?? []), ' ', count($result->getFailed() ?? []);

$result = $bird->whatsapp->groups->joinRequests->reject(
    'wag_01krdgeqcxet5s7t44vh8rt9mg',
    (new WhatsAppGroupJoinRequestDecision())->setJoinRequestIds(['wgj_01krdgeqcxet5s7t44vh8rt9mg']),
);
foreach ($result->getFailed() ?? [] as $failure) {
    echo $failure->getJoinRequestId(), ' ', $failure->getError()?->getDescription(), PHP_EOL;
}

$pin = $bird->whatsapp->groups->pins->create(
    'wag_01krdgeqcxet5s7t44vh8rt9mg',
    (new WhatsAppGroupPinnedMessageCreate())->setMessageId('wam_01kya19eknftrs2s6p82asmvnh'),
);
echo $pin->getPinnedUntil()?->format(DATE_ATOM);

$group = $bird->whatsapp->groups->pins->delete(
    'wag_01krdgeqcxet5s7t44vh8rt9mg',
    'wam_01kya19eknftrs2s6p82asmvnh',
);
echo count($group->getPinnedMessages() ?? []);

$rules = $bird->whatsapp->keywordRules->list(['operation' => 'opt_out']);
foreach ($rules->getData() ?? [] as $rule) {
    echo $rule->getScope(), ' ', implode(',', $rule->getEffectiveKeywords() ?? []), PHP_EOL;
}

// Bird's rules and yours share the wkr_ id space; getScope() tells them apart.
$rule = $bird->whatsapp->keywordRules->get('wkr_01m2kj8x4te9p0rr7e5w2n1abc');
echo $rule->getScope(), ' ', $rule->getReply();

$rule = $bird->whatsapp->keywordRules->create(
    (new WhatsAppKeywordRuleCreate())
        ->setOperation('opt_out')
        ->setCountry('US')
        ->setReply("You're off the list. ACME Courier won't message you again."),
);
// getEffectiveKeywords() is Bird's set plus any of your own.
echo $rule->getId(), ' ', implode(',', $rule->getEffectiveKeywords() ?? []);

// Omitting keywords leaves the set alone; an empty array clears your additions
// back to Bird's.
$rule = $bird->whatsapp->keywordRules->update(
    'wkr_01m2kj8x4te9p0rr7e5w2n1abc',
    (new WhatsAppKeywordRuleUpdate())->setKeywords(['no more texts', 'remove me']),
);
echo implode(',', $rule->getEffectiveKeywords() ?? []);

// The next rule in the ladder answers the scope, which is another rule of yours if you hold a less specific one; STOP never stops working.
$bird->whatsapp->keywordRules->delete('wkr_01m2kj8x4te9p0rr7e5w2n1abc');

// address is a prefix, so a partial value matches every address under it.
foreach ($bird->whatsapp->suppressions->list(['address' => '+1555']) as $suppression) {
    echo $suppression->getAddress(), ' ', $suppression->getWaba() ?? 'every account', PHP_EOL;
}

// Resolves a record that has already ended, which the list leaves out.
$suppression = $bird->whatsapp->suppressions->get('was_01krdgeqcxet5s7t44vh8rt9mg');
echo $suppression->getReason(), ' ', $suppression->getEndedAt()?->format(DATE_ATOM) ?? 'still in force';

// Omit setWaba to block the address for the whole workspace, whichever account
// sends. With it, your other accounts keep reaching them, and the same address
// for two accounts is two records.
$suppression = $bird->whatsapp->suppressions->add(
    (new WhatsAppSuppressionCreate())
        ->setAddress('+15550001234')
        ->setWaba('102290129340398'),
);
echo $suppression->getId(), ' ', $suppression->getAppliesTo();

// Only a manual suppression can be ended; a recipient's own opt-out is theirs
// to reverse. The record is kept and still reads back by id.
$bird->whatsapp->suppressions->remove('was_01krdgeqcxet5s7t44vh8rt9mg');
