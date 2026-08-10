# Bird PHP SDK

The official PHP SDK for the [Bird](https://bird.com) API: email, SMS, WhatsApp, verification, and Realtime, over one typed client.

## Requirements

PHP 8.2 or newer. Any [PSR-18](https://www.php-fig.org/psr/psr-18/) HTTP client (Guzzle, Symfony HttpClient, …) is discovered automatically — you do not need to configure one.

## Install

```bash
composer require messagebird/sdk
```

## Quickstart

```php
use MessageBird\Bird;

$bird = new Bird(getenv('BIRD_API_KEY'));

$message = $bird->email->send(
    from: 'Bird <onboarding@messagebird.dev>',
    to: ['delivered@messagebird.dev'],
    subject: 'Hello from Bird',
    html: '<p>My first Bird email.</p>',
);

echo $message->getId(), ' ', $message->getStatus();
```

The API key resolves the region automatically (`bk_{region}_…`). Pass a `$baseUrl` to target a specific endpoint, or your own PSR-18 client to override transport — see [Configuration](#configuration).

Runnable versions of these live in [`examples/`](examples/): `quickstart-email.php`, `quickstart-whatsapp.php`.

## Client-wide email defaults

Set common send fields once, on the client, instead of on every call. Any field left unset on a `send()` / `sendBatch()` falls back to the default; a value passed to the send always wins.

```php
use MessageBird\Bird;
use MessageBird\EmailDefaults;

$bird = new Bird(getenv('BIRD_API_KEY'), email: new EmailDefaults(
    from: 'Bird <onboarding@messagebird.dev>',
    replyTo: ['support@messagebird.dev'],
    category: 'transactional',
));

// `from` and `category` are filled from the defaults; both stay optional here.
$bird->email->send(to: ['delivered@messagebird.dev'], subject: 'Hi', html: '<p>Hi.</p>');
```

## Email

```php
// Send
$message = $bird->email->send(
    from: 'Bird <onboarding@messagebird.dev>',
    to: ['delivered@messagebird.dev'],
    subject: 'Hello from Bird',
    html: '<p>My first Bird email.</p>',
);

// Send a batch — one result per message, in submission order
use MessageBird\Wire\Model\EmailMessageSendRequest;

$batch = $bird->email->sendBatch([
    (new EmailMessageSendRequest())->setFrom('onboarding@messagebird.dev')
        ->setTo(['delivered@messagebird.dev'])->setSubject('Hi')->setHtml('<p>Hi.</p>'),
]);

// Fetch
$message = $bird->email->get('eml_01krdgeqcxet5s7t44vh8rt9mg');

// List — iterating the page auto-paginates across cursors
foreach ($bird->email->list(['status' => 'delivered']) as $message) {
    echo $message->getId(), "\n";
}

// Or read one page at a time and advance manually with the cursor
$page = $bird->email->list(['status' => 'delivered'])->fetch();
$page->data;        // this page's messages
$page->nextCursor;  // pass back as starting_after; null on the last page
```

An address (`from`/`to`/`cc`/`bcc`/`replyTo`) accepts a plain string (`"jane@x.com"`), an RFC 5322 mailbox (`"Jane <jane@x.com>"`), an `['email' => …, 'name' => …]` array, or an `EmailAddress` model — all normalize to the same wire object.

## SMS

```php
// Send — free-text (with a category) or a stored template
$message = $bird->sms->send(
    to: '+15551234567',
    text: 'Your verification code is 123456.',
    category: 'authentication',
);

// Send by template (id `smt_…` or name), filling its variables
$bird->sms->send(to: '+15551234567', template: 'bird_otp', parameters: ['code' => '123456']);

// Fetch / list (auto-paginates)
$message = $bird->sms->get('sms_01krdgeqcxet5s7t44vh8rt9mg');
foreach ($bird->sms->list(['direction' => 'outbound']) as $message) {
    echo $message->getId(), ' ', $message->getStatus(), "\n";
}
```

## WhatsApp

```php
// Send a template message
$message = $bird->whatsapp->send(
    to: '+15551234567',
    template: 'bird_otp',
    language: 'en',
);

// Fetch / list, and read one message's delivery timeline
$message = $bird->whatsapp->get('wamid_01krdgeqcxet5s7t44vh8rt9mg');
$events = $bird->whatsapp->listEvents('wamid_01krdgeqcxet5s7t44vh8rt9mg');
foreach ($events->getData() ?? [] as $event) {
    echo $event->getType(), "\n";
}
```

## Verify

A two-step flow: start a verification (Bird sends a one-time passcode), then check the code the recipient submits.

```php
use MessageBird\Wire\Model\VerificationCheckRequest;
use MessageBird\Wire\Model\VerificationCreateRequest;
use MessageBird\Wire\Model\VerificationTo;

$verification = $bird->verify->verifications->create(
    (new VerificationCreateRequest())->setTo((new VerificationTo())->setPhoneNumber('+15551234567')),
);

$result = $bird->verify->verifications->check(
    (new VerificationCheckRequest())
        ->setTo((new VerificationTo())->setPhoneNumber('+15551234567'))
        ->setCode('123456'),
);
echo $result->getSuccess() ? 'verified' : 'failed';
```

## Realtime

Publish events to a Realtime app's channels and inspect its live channels and members. Every call authenticates with the app's own key/secret (shown once at creation) **on top of** the workspace API key — set them as client config, or pass a per-call override to reach a second app. Each method takes the app id (`rap_…`) first.

```php
use MessageBird\Bird;
use MessageBird\RealtimeOptions;
use MessageBird\Wire\Model\RealtimePublish;

$bird = new Bird(getenv('BIRD_API_KEY'), realtime: new RealtimeOptions(
    key: getenv('BIRD_REALTIME_KEY'),
    secret: getenv('BIRD_REALTIME_SECRET'),
));

$bird->realtime->publish('rap_...', (new RealtimePublish())
    ->setEvent('message.created')
    ->setChannels(['room-42'])
    ->setData(['text' => 'Hello, room!']));

foreach ($bird->realtime->channels->list('rap_...', ['prefix' => 'room-'])->getData() ?? [] as $channel) {
    echo $channel->getName(), ' ', $channel->getMemberCount(), "\n";
}

$bird->realtime->members->disconnect('rap_...', 'usr_...');
```

## Webhooks

Verify a delivered webhook's [Standard Webhooks](https://www.standardwebhooks.com/) signature and get the decoded event. Set the signing secret on the client (or pass it per call), and **pass the raw request body** — the signature is over the raw bytes, so parsing before verifying is the classic webhook bug.

```php
use MessageBird\Bird;
use MessageBird\Exception\WebhookVerificationError;

$bird = new Bird(getenv('BIRD_API_KEY'), webhookSecret: getenv('BIRD_WEBHOOK_SECRET'));

// In your web handler — $rawBody is the unparsed request body.
try {
    $event = $bird->webhooks->unwrap($rawBody, getallheaders());
    switch ($event['type']) {
        case 'email.delivered':
            markDelivered($event['data']['email_id'], $event['data']['recipient']);
            break;
        case 'email.bounced':
        case 'email.complained':
            suppress($event['data']['recipient']);
            break;
        default:
            // unknown future event types — an older SDK won't break on a new one
    }
} catch (WebhookVerificationError $e) {
    http_response_code(400); // bad signature, stale timestamp, or missing/malformed headers
}
```

## Retries

Transient failures — a 429, a 5xx (except 501), or a PSR-18 transport error — are retried with jittered exponential backoff that honors `Retry-After`. A single idempotency key is generated once per call and reused across attempts, so a retried write never double-applies. The budget defaults to 2 retries; override it per client or per call:

```php
$bird = new Bird(getenv('BIRD_API_KEY'), maxRetries: 4);

use MessageBird\RequestOptions;
$bird->email->send(to: ['a@b.com'], subject: 'Hi', html: '<p>Hi.</p>',
    options: new RequestOptions(maxRetries: 0));
```

A per-request **timeout** is the injected PSR-18 client's responsibility (PSR-18 has no portable timeout) — configure it on the client you pass to `Bird`, e.g. a Guzzle client with a `timeout`.

## Errors

Every failure is a `MessageBird\Exception\BirdException`:

- `ApiException` — the server returned a 4xx/5xx. Carries `$status` (HTTP code), `$type`, and `$errorCode` from the error body.
- `ConnectionException` — the transport failed past the retry budget.

```php
use MessageBird\Exception\ApiException;
use MessageBird\Exception\BirdException;

try {
    $bird->email->send(to: ['a@b.com'], subject: 'Hi', html: '<p>Hi.</p>');
} catch (ApiException $e) {
    echo $e->status, ' ', $e->errorCode ?? '', ' ', $e->getMessage();
} catch (BirdException $e) {
    // transport error, or any other SDK-level failure
}
```

## Escape hatch

Every operation the API exposes is reachable even before it has a typed method, via the verb methods on the client — `get`, `post`, `put`, `patch`, `delete`. They take a leading-slash path on the configured origin (a path that would move the request off-origin is rejected before the key is attached) and return the decoded response.

```php
$data = $bird->get('/v1/email/messages', query: ['status' => 'delivered']);
$bird->post('/v1/some/new/endpoint', body: ['field' => 'value']);
```

## Configuration

```php
new Bird(
    apiKey: 'bk_live_…',   // resolves the region from the bk_{region}_ prefix
    baseUrl: null,          // override the resolved endpoint
    httpClient: null,       // any PSR-18 client; discovered when null
    region: null,           // resolve a region for a key without a prefix
    email: null,            // EmailDefaults (see above)
    maxRetries: 2,          // retry budget for transient failures
);
```

## License

MIT
