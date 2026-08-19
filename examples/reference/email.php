<?php

// HAND-WRITTEN example source for the GENERATED email methods. Each
// `bird:snippet` region is the single source of truth for that key: the
// surfacegen PHP writer injects it (unmarked) as the @example on the generated
// method, and the docs pipeline extracts it for the API-reference code tabs.
// The scenarios mirror the other SDKs' email examples, covering the family and
// its stats / mailboxes / threads sub-resources.
//
// An address (from/to/cc/bcc/reply_to) accepts any of: a plain string
// ("jane@x.com"), an RFC 5322 mailbox string ("Jane <jane@x.com>"), an
// ["email" => ..., "name" => ...] array, or an EmailAddress model. The core
// serializer normalizes every form to the same wire object.
//
// Every stats read takes its window as an untyped query array: jane emits no
// query type, so `from`/`to`/`sort`/`limit` are plain keys here.

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Exception\ApiException;
use MessageBird\Exception\ConnectionException;
use MessageBird\RequestOptions;
use MessageBird\Wire\Model\EmailAddress;
use MessageBird\Wire\Model\EmailLabelsUpdate;
use MessageBird\Wire\Model\EmailMessageSendRequest;
use MessageBird\Wire\Model\EmailMessageSendRequestTemplate;
use MessageBird\Wire\Model\EmailThreadMessageReplyRequest;
use MessageBird\Wire\Model\EmailThreadUpdateRequest;
use MessageBird\Wire\Model\MailboxCreate;
use MessageBird\Wire\Model\MailboxUpdate;
use MessageBird\Wire\Model\ReceiveRuleCreate;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$message = $bird->email->send(
    from: 'Bird <onboarding@messagebird.dev>',
    to: ['delivered@messagebird.dev'],
    subject: 'Hello from Bird',
    html: '<p>My first Bird email.</p>',
);
echo $message->getId(), ' ', $message->getStatus();

$message = $bird->email->send(
    from: 'Bird <onboarding@messagebird.dev>',
    to: ['delivered@messagebird.dev'],
    category: 'transactional',
    template: (new EmailMessageSendRequestTemplate())
        ->setSlug('welcome-email')
        ->setParameters(['first_name' => 'Jane']),
);
echo $message->getId(), ' ', $message->getStatus();

$message = $bird->email->send(
    from: 'Bird <onboarding@messagebird.dev>',
    to: ['bounce+signup-flow@messagebird.dev'],
    subject: 'Sandbox bounce test',
    html: '<p>This message will hard-bounce.</p>',
);
echo $message->getId(), ' ', $message->getStatus();

$batch = $bird->email->sendBatch([
    (new EmailMessageSendRequest())
        ->setFrom((new EmailAddress())->setEmail('onboarding@messagebird.dev')->setName('Bird'))
        ->setTo([(new EmailAddress())->setEmail('delivered@messagebird.dev')])
        ->setSubject('Hello from Bird')
        ->setHtml('<p>My first Bird email.</p>'),
    (new EmailMessageSendRequest())
        ->setFrom((new EmailAddress())->setEmail('onboarding@messagebird.dev')->setName('Bird'))
        ->setTo([(new EmailAddress())->setEmail('someone-else@messagebird.dev')])
        ->setSubject('Hello again from Bird')
        ->setText('My second Bird email.'),
]);
foreach ($batch->getData() ?? [] as $item) {
    echo $item->getId(), ' ', $item->getStatus(), "\n";
}

$message = $bird->email->get('em_01krdgeqcxet5s7t44vh8rt9mg');
echo $message->getStatus();

foreach ($bird->email->list(['status' => 'delivered']) as $message) {
    echo $message->getId(), "\n";
}

$page = $bird->email->list(['status' => 'delivered'])->fetch();
foreach ($page->data as $message) {
    echo $message->getId(), "\n";
}
$next = $page->nextCursor; // pass back as starting_after to fetch the next page

$bird->email->cancel('em_01krdgeqcxet5s7t44vh8rt9mg');

$summary = $bird->email->stats->summary(['from' => '2026-05-01', 'to' => '2026-05-31']);
echo $summary->getSendsAccepted(), ' ', $summary->getDelivery()?->getDelivered();

$series = $bird->email->stats->daily(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($series->getData() ?? [] as $row) {
    echo $row->getBucket(), ' ', $row->getDelivery()?->getDelivered(), "\n";
}

$series = $bird->email->stats->hourly(['from' => '2026-05-01', 'to' => '2026-05-02']);
foreach ($series->getData() ?? [] as $row) {
    echo $row->getBucket(), ' ', $row->getDelivery()?->getDelivered(), "\n";
}

$stats = $bird->email->stats->byTag([
    'from' => '2026-05-01',
    'to' => '2026-05-31',
    'sort' => 'delivered',
    'limit' => 10,
]);
foreach ($stats->getData() ?? [] as $row) {
    echo $row->getTag(), ' ', $row->getDelivery()?->getDelivered(), "\n";
}

$stats = $bird->email->stats->byCategory(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($stats->getData() ?? [] as $row) {
    echo $row->getCategory(), ' ', $row->getDelivery()?->getDelivered(), "\n";
}

$stats = $bird->email->stats->bySendingIp([
    'from' => '2026-05-01',
    'to' => '2026-05-31',
    'sort' => 'bounces.block',
    'limit' => 20,
]);
foreach ($stats->getData() ?? [] as $row) {
    echo $row->getSendingIp(), ' ', $row->getDelivery()?->getDelivered(), "\n";
}

$stats = $bird->email->stats->bySendingDomain([
    'from' => '2026-05-01',
    'to' => '2026-05-31',
    'sort' => 'delivery_rate',
    'limit' => 25,
]);
foreach ($stats->getData() ?? [] as $row) {
    echo $row->getSendingDomain(), ' ', $row->getDelivery()?->getDeliveryRate(), "\n";
}

$stats = $bird->email->stats->byRecipientDomain([
    'from' => '2026-05-01',
    'to' => '2026-05-31',
    'sort' => 'bounce_rate',
    'limit' => 25,
]);
foreach ($stats->getData() ?? [] as $row) {
    echo $row->getRecipientDomain(), ' ', $row->getDelivery()?->getBounceRate(), "\n";
}

$stats = $bird->email->stats->byMailboxProvider([
    'from' => '2026-05-01',
    'to' => '2026-05-31',
    'limit' => 25,
]);
foreach ($stats->getData() ?? [] as $row) {
    echo $row->getMailboxProvider(), ' ', $row->getDelivery()?->getDelivered(), "\n";
}

$stats = $bird->email->stats->byMailboxProviderRegion([
    'from' => '2026-05-01',
    'to' => '2026-05-31',
    'limit' => 25,
]);
foreach ($stats->getData() ?? [] as $row) {
    echo $row->getMailboxProvider(), ' ', $row->getMailboxProviderRegion(), ' ', $row->getDelivery()?->getDelivered(), "\n";
}

$stats = $bird->email->stats->byTemplate([
    'from' => '2026-05-01',
    'to' => '2026-05-31',
    'sort' => 'open_rate',
    'limit' => 25,
]);
foreach ($stats->getData() ?? [] as $row) {
    echo $row->getTemplateId(), ' ', $row->getEngagement()?->getOpenRate(), "\n";
}

$stats = $bird->email->stats->byLocation([
    'from' => '2026-05-01',
    'to' => '2026-05-31',
    'limit' => 25,
]);
foreach ($stats->getData() ?? [] as $row) {
    echo $row->getCountry(), ' ', $row->getEngagement()?->getUniqueOpens(), "\n";
}

$stats = $bird->email->stats->byClient([
    'from' => '2026-05-01',
    'to' => '2026-05-31',
    'limit' => 25,
]);
foreach ($stats->getData() ?? [] as $row) {
    echo $row->getEmailClient(), ' ', $row->getEngagement()?->getUniqueOpens(), "\n";
}

$stats = $bird->email->stats->byBounceCode([
    'from' => '2026-05-01',
    'to' => '2026-05-31',
    'sort' => 'bounced',
    'limit' => 25,
]);
foreach ($stats->getData() ?? [] as $row) {
    echo $row->getSmtpErrorCode(), ' ', $row->getBounced(), "\n";
}

$stats = $bird->email->stats->byComplaintType(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($stats->getData() ?? [] as $row) {
    echo $row->getFeedbackType(), ' ', $row->getComplained(), "\n";
}

$stats = $bird->email->stats->byBroadcast([
    'from' => '2026-05-01',
    'to' => '2026-05-31',
    'sort' => 'click_rate',
    'limit' => 25,
]);
foreach ($stats->getData() ?? [] as $row) {
    echo $row->getBroadcastId(), ' ', $row->getEngagement()?->getClickRate(), "\n";
}

$mailbox = $bird->email->mailboxes->create(
    (new MailboxCreate())
        ->setDisplayName('Acme Support'),
);
echo $mailbox->getId(), ' ', $mailbox->getAddress();

$mailbox = $bird->email->mailboxes->get('mbx_01krdgeqcxet5s7t44vh8rt9mg');
echo $mailbox->getAddress(), ' ', $mailbox->getState();

foreach ($bird->email->mailboxes->list() as $mailbox) {
    echo $mailbox->getId(), ' ', $mailbox->getAddress(), "\n";
}

$bird->email->mailboxes->update(
    'mbx_01krdgeqcxet5s7t44vh8rt9mg',
    (new MailboxUpdate())->setDisplayName('Acme Help'),
);

$bird->email->mailboxes->delete('mbx_01krdgeqcxet5s7t44vh8rt9mg');

$mailbox = $bird->email->mailboxes->restore('mbx_01krdgeqcxet5s7t44vh8rt9mg');
echo $mailbox->getState();

$mailbox = $bird->email->mailboxes->resume('mbx_01krdgeqcxet5s7t44vh8rt9mg');
echo $mailbox->getState();

$stats = $bird->email->mailboxes->stats(
    'mbx_01krdgeqcxet5s7t44vh8rt9mg',
    ['from' => '2026-05-01', 'to' => '2026-05-31'],
);
echo $stats->getSummary()?->getReceived();

$labels = $bird->email->mailboxes->labels('mbx_01krdgeqcxet5s7t44vh8rt9mg');
foreach ($labels->getData() ?? [] as $label) {
    echo $label->getName(), "\n";
}

$rule = $bird->email->mailboxes->receiveRules->create(
    'mbx_01krdgeqcxet5s7t44vh8rt9mg',
    (new ReceiveRuleCreate())
        ->setAction('block')
        ->setEntry('spam@example.com')
        ->setNote('Repeated spam'),
);
echo $rule->getId();

foreach ($bird->email->mailboxes->receiveRules->list('mbx_01krdgeqcxet5s7t44vh8rt9mg') as $rule) {
    echo $rule->getAction(), ' ', $rule->getEntry(), "\n";
}

$bird->email->mailboxes->receiveRules->delete(
    'mbx_01krdgeqcxet5s7t44vh8rt9mg',
    'rul_01krdgeqcxet5s7t44vh8rt9mg',
);

foreach ($bird->email->threads->list(['mailbox_id' => 'mbx_01krdgeqcxet5s7t44vh8rt9mg']) as $thread) {
    echo $thread->getId(), ' ', $thread->getSubject(), "\n";
}

$thread = $bird->email->threads->get('thr_01krdgeqcxet5s7t44vh8rt9mg');
echo $thread->getSubject(), ' ', $thread->getMessageCount();

$bird->email->threads->update(
    'thr_01krdgeqcxet5s7t44vh8rt9mg',
    (new EmailThreadUpdateRequest())
        ->setLabels((new EmailLabelsUpdate())->setAdd(['escalated']))
        ->setContactId('con_01krdgeqcxet5s7t44vh8rt9mg'),
);

$bird->email->threads->delete('thr_01krdgeqcxet5s7t44vh8rt9mg');

foreach ($bird->email->threads->messages->list('thr_01krdgeqcxet5s7t44vh8rt9mg') as $message) {
    echo $message->getId(), ' ', $message->getDirection(), "\n";
}

$message = $bird->email->threads->messages->get(
    'thr_01krdgeqcxet5s7t44vh8rt9mg',
    'rem_01krdgeqcxet5s7t44vh8rt9mg',
);
echo $message->getFrom(), ' ', $message->getSubject();

$body = $bird->email->threads->messages->body(
    'thr_01krdgeqcxet5s7t44vh8rt9mg',
    'rem_01krdgeqcxet5s7t44vh8rt9mg',
);
echo $body->getText() ?? $body->getHtml();

$attachments = $bird->email->threads->messages->attachments(
    'thr_01krdgeqcxet5s7t44vh8rt9mg',
    'rem_01krdgeqcxet5s7t44vh8rt9mg',
);
foreach ($attachments->getData() ?? [] as $attachment) {
    echo $attachment->getFilename(), "\n";
}

$reply = $bird->email->threads->messages->reply(
    'thr_01krdgeqcxet5s7t44vh8rt9mg',
    'rem_01krdgeqcxet5s7t44vh8rt9mg',
    (new EmailThreadMessageReplyRequest())
        ->setText('Thanks, looking into it now.')
        ->setReplyAll(true),
);
echo $reply->getId();

try {
    $bird->email->send(
        from: 'Bird <onboarding@messagebird.dev>',
        to: ['delivered@messagebird.dev'],
        subject: 'Hello from Bird',
        html: '<p>My first Bird email.</p>',
    );
} catch (ApiException $e) {
    // The server returned an error response. $status is the HTTP status, $type
    // the coarse category, $errorCode the stable E##### code.
    echo $e->status, ' ', $e->errorCode ?? $e->type ?? 'error';
} catch (ConnectionException $e) {
    // All retry attempts failed, so no HTTP response is available.
    echo 'transport error: ', $e->getMessage();
}

$bird->email->send(
    from: 'Bird <onboarding@messagebird.dev>',
    to: ['delivered@messagebird.dev'],
    subject: 'Hello from Bird',
    html: '<p>My first Bird email.</p>',
    options: new RequestOptions(idempotencyKey: 'order-1234', maxRetries: 0),
);
