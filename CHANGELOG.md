# Changelog

All notable changes to `messagebird/sdk` are documented here. Versions are assigned by the surface changeset tooling; do not hand-edit this file.

## 0.25.0

- Mailbox `retention_tier` now accepts `90d` and `1y` on create and update, gated by the organization's plan; a tier the plan does not include is rejected with `E17048`.

## 0.24.0

- **Breaking:** `new Webhooks($bird, $secret)` takes the client first; a receiver verifies through `new Bird(webhookSecret: $secret)` — no API key required.
- The client is constructible with only the webhook secret — no API key — for receiver-only deployments; an API call on such a client fails with a missing-API-key error before any request is sent.
- `webhooks` now manages endpoints: list, get, create, update, delete, send a test event, inspect delivery attempts, and rotate the signing secret.

## 0.23.1

- SMS segment docs: the UCS2 limit is 70 UTF-16 code units, not 70 characters, so 35 non-BMP emoji fill one segment.

## 0.23.0

- Add the `workspace` resource: `get()` returns the workspace the credential is scoped to, including its id, name, owning organization's id, and notification and logo settings.

## 0.22.0

- A `404` from checking or advancing a verification now says that no verification matched the recipient: either none exists for the exact recipient given, or the most recent one is already resolved as verified, expired, or out of attempts. It also says when to create another — create one when the recipient has no verification, or the last one expired or ran out of attempts, and not when the recipient already passed. The error code is unchanged, so match it exactly as before; a `404` is not evidence the recipient failed to verify, so treat your own record of an earlier `success: true` as the outcome.

## 0.21.0

- A WhatsApp message carrying contact cards a contact shared now reads them back on `contact_cards`, where it previously reported `unsupported` with type `contacts`.
- `undelivered` now documents as a final status, `validity_period` as bounding the carrier's delivery attempts rather than ours, and `scheduled` and `canceled` as reserved for send-later scheduling. `category` no longer describes per-country compliance rules that are not implemented.

## 0.20.1

- Sending a WhatsApp template: the `parameters` field now documents which button types take no value, so no component is sent for them.

## 0.20.0

- Add the `preferences` resource — list, get, create, and delete stated messaging preferences — plus `contacts->preferences->list`, and the `Preference`/`PreferenceList`/`PreferenceWriteResult` wire models for API responses. Webhook `unwrap` still returns the verified event as an array; the models type API calls, not webhook payloads.

## 0.19.2

- `refresh_cursor` fetches the items that sort before a response's first row in the current sort order. Those are the items added since the response only when new items sort first, so a list sorted another way is refreshed by re-fetching it.

## 0.19.1

- `Number.kind` documentation now distinguishes workspace-owned subscriptions from Bird-managed shared numbers.

## 0.19.0

- Voice call records carry a `tags` array, and the voice call list takes a repeatable `tag` filter (`name` or `name:value`). On the CLI that is `bird voice list --tag campaign:spring --tag queue`.

## 0.18.0

- The `operation` field on the SMS keyword-rule models accepts two more values: `info`, a new operation that answers INFO separately from HELP, and `confirm`, which the API already accepted but did not document.

## 0.17.0

- **Breaking:** the API now rejects a request that carries a query parameter an operation does not declare, with a 422 `E01029`, instead of silently ignoring it. This affects `extra_query`/`default_query` on `bird.Client`/`bird.AsyncClient` (Python), the `query` option on `bird.request` (Node), the `$query` argument on generated resource methods (PHP), and a query string written into the path passed to `Client.Get` and its sibling verb methods (Go): an unrecognized key that previously had no effect now fails the call. Check any code passing one of these against the operation's documented query parameters.
- Listing WhatsApp messages now takes `to` and `from` filters (`from_` in Python, where `from` is reserved), each matching an E.164 phone number or a business-scoped user ID. The `phone_number` filter is deprecated; use the new pair instead.

## 0.16.1

- `VoiceCallActor`'s `type` now documents its known values: `user`, `oauth_token`, `api_key`, `system`, `sso`, and `service_account`. The enum stays open, so treat an unrecognized value as a newer type rather than an error.

## 0.16.0

- Add the `verify.verification.failed` webhook event, which fires when no planned channel could deliver a verification's passcode, plus the `undeliverable` session reason and the `not_billable` attempt reason that say why it could not.

## 0.15.0

- Email broadcasts report `started_at` and `canceled_at`: when sending began, and when cancellation was requested.

## 0.14.0

- Email click events now carry `link_name`, the name of the clicked link when the message named it.
- Numbers are now available on the public API. Search a country's available numbers, order one, list and read the numbers your workspace holds, and release a dedicated number you no longer want.
- **Breaking:** a voice call's `cost` is its own call-cost type rather than the shared money type, so a caller that names the money type for that field changes it to the call-cost type — reading `cost.amount` and `cost.currency_code` needs no change. The money type is gone from the package, having been reachable only through that field.
- A voice call's `cost` gains `outbound_amount`, `inbound_amount` and `call_handling_amount`, naming the components behind the total so a call charged for more than one thing can report which amount is which. Each reads `null` until that component is priced. Every amount on a voice call's cost now renders at six decimal places, the scale the reference documents.
- A WhatsApp message that failed because WhatsApp could not fetch the media URL, or refused the file it found there, now reports `media_rejected` on `last_error.code` instead of `undeliverable`, with WhatsApp's own reason in `last_error.description`.
- Email events now report the recipient's mailbox provider and provider region (for example `gmail`, `NA`), when the receiving mail system could be classified.
- A runnable lookup quickstart now ships with the SDK, covering both `lookup->phoneNumber()` and `lookup->email()` and the rule that decides what a paid property actually returned: read its status before its value, because only `ok` carries one and only `ok` is billed.
- A sending domain's inbound MX records now report `optional` as `true` until you enable receiving on that domain, so the records you must publish to send are no longer listed alongside ones that would reroute the domain's existing mail.
- The numbers reference and examples describe a number as allocated to a workspace, the same word the API reference and the dashboard use.
- The numbers methods document what each one does to a carrier and to your balance — that a search can go stale before an order lands, that an order may settle after the call returns, and that a release is irreversible.
- The WhatsApp send examples now fill the template body placeholder that bird_otp declares, so the example they show is one the API accepts rather than a 422 WhatsAppTemplateParameterMismatch.
- A voice call's `actor.type` can be `service_account`, meaning the call was placed by an integration acting for the workspace rather than by a user or an API key. Documented on the actor's `id` and `type`, and on the call's own `actor` field, which previously described only users and API keys.
- Sending a WhatsApp message from a number whose setup has not finished now returns a `422` `WhatsAppSenderNotConnected`, rather than an unknown-number error or an accepted send that later fails.

## 0.13.0

- Add $bird->sms->stats and $bird->smsSuppressions: SMS statistics (outbound, inbound breakdowns) and the suppression list, plus sms->listEvents for a message's timeline.
- Add $bird->smsKeywordRules: read Bird's SMS keyword catalogue and manage a workspace's own overrides of it.
- Add end-to-end encrypted channels: `publish` and `publishBatch` seal `private-encrypted-` payloads under `RealtimeOptions(encryptionMasterKey:)` (needs ext-sodium), and the new `authorizeChannel` signs channel subscriptions, adding the channel's `shared_secret` on encrypted channels.
- A sending domain read now says what to do next. `next` carries the steps that get the domain verified, in the order to take them: an `external` step for a DNS record only you can publish, then the operation that re-checks it. An empty list means nothing is asked of you on that axis, and `capabilities` still reports what each capability needs before the domain can send or receive.
- Email defaults now cover `ipPoolId`, applied to every send that does not name a pool.
- Optional fields on a WhatsApp message's content — a media caption, a location's name and address — are omitted when unset rather than returned as null.
- Getting or listing a WhatsApp message now returns the free-form `text`, `image`, `video`, `audio`, `sticker`, `document` or `location` content it carried.
- The `whatsapp.received` webhook event is now available, delivering an inbound WhatsApp message's content as it arrives.
- `whatsapp->send` now accepts free-form `$text`, `$image`, `$video`, `$audio`, `$sticker`, `$document` and `$location` content, `$from` for the business number every send but a Bird-managed template requires, and per-message `$tags` and `$metadata`. `$template` is now optional, since a send may carry free-form content instead.
- **Breaking:** `whatsapp->send` takes the new content parameters before `$options`, so a call passing `$options` positionally must name it (`options: $options`).
- Method, parameter and field documentation now states what each call does and what each value accepts, including its default, its units, and the fields it depends on.

## 0.12.0

- An error now carries the recovery the API sends with it: `ApiException` exposes `remediation`, `next` — the steps to take, each stating a `kind` of `operation`, `external`, `wait` or `terminal` — and `unmetGates`. Read `getKind()` before `getOperation()`, since only an `operation` step carries one, and treat a `kind` you do not recognise as display-only.

## 0.11.0

- **Breaking:** an SMS template is referenced by its `slug`, not its `name`. On a send, `template.name` becomes `template.slug` (unchanged if you pass an id). On a template read, `slug` is the handle you send by and `name` is now the display label the old `description` carried, so `description` reads null for Bird's built-in templates.
- An SMS template read now reports what a send will do with languages, the way email and WhatsApp already did: `default_language`, `languages`, `on_missing_language` and `language_source_required`. Its `published_version_id` is now `live_version_id`, and its status vocabulary drops `approved`, which was never returned, for `inactive`.
- **Breaking:** the contacts list `phone_number` filter now takes a list of numbers rather than one, matching any of up to 50 in a single request; pass an existing single number as a one-element list, and set `limit` to at least the number of values you pass.
- **Breaking:** the recovery steps on an error are `NextAction` rather than `ErrorNextAction`, and each one states a `kind` of `operation`, `external`, `wait` or `terminal`. Rename the type at your call site, and read `kind` before `operation`: only an `operation` step carries one. Treat a `kind` you do not recognise as display-only.
- Schedule an email from the SDK instead of dropping to raw HTTP for that one call: `scheduledAt:` holds a send until a future instant.
- Telegram is a known verification channel, so a verification can be created with `telegram` in `options.channels` and a passcode can be delivered over it.
- Document sending a stored email template, with a per-language example on email.send.
- Serializing a WhatsAppEvent now includes its type, which was silently dropped from the output array.
- SMS sends normalize the recipient to canonical E.164 and echo that form back; an unroutable recipient returns the new SMSInvalidRecipient error.

## 0.10.0

- Adds the lookup resource: $bird->lookup->email() and $bird->lookup->phoneNumber().
- The contacts documentation now names `phone_number`, the identifier the API accepts, where it previously named `phone` — including the batch `match_on` value, which is rejected as `phone`.

## 0.9.0

- **Breaking:** a contact's phone identifier is now named `phone_number`, matching the rest of the API. It replaces `phone` in create, update, batch-upsert and read bodies; the `GET /v1/contacts` filter becomes `?phone_number=`; the `identifier` filter value and the batch `match_on` / `matched_on` values become `phone_number` — they name the field, so they move with it. On the TCR brand surface, a brand's own `phone` becomes `phone_number` as well. The CLI's `bird contacts create|update` take `--phone-number`, and `bird contacts list` filters on `--phone-number`. Qualified compounds are unchanged: `mobile_phone`, `primary_phone` and `business_contact_phone` keep their names.
- Add `options.smart_encoding` to an SMS send (`--smart-encoding` on the CLI): it replaces characters outside the GSM-7 alphabet (curly quotes, dashes, ellipses, fullwidth forms, non-breaking spaces) with their closest equivalent, which lowers the segment count and the cost on a body that would otherwise send as `UCS2`. Off unless you ask for it, and all-or-nothing: a body still holding an emoji or a non-Latin script afterwards is sent exactly as you supplied it. The message reports the settings that were applied, and its `text` reflects the body as sent.
- **Breaking:** a verification's email recipient is now named `email`, replacing `email_address` — rename it at the call site on a verification's `to`, and in any handler reading the `to` of a `verify.*` webhook payload. Phone recipients are unchanged: `phone_number` keeps its name. The old spelling is not accepted: a request sending `email_address` is rejected as an unknown property.

## 0.8.0

- **Breaking:** `carrier` and `mcc_mnc` are omitted from `sms.sent`, `sms.delivered` and `sms.received` webhook payloads when the carrier reports none, instead of arriving as `null`; `subject` on `sms.received` behaves the same way. They are now optional rather than required, so a typed field changes to a pointer or an optional — check for absence where you checked for `null`. This matches how the message resource has always reported the same fields.
- `sms.accepted` now carries `segments`, the segment breakdown the send is billed on, so a webhook-only integration can explain the `cost` on the same event instead of fetching the message to reconcile a charge.
- Subscribe to `sms.received` to be pushed inbound SMS instead of polling for it. The payload carries the message body, its segment breakdown, both numbers, and the sending operator where the carrier reports one; a `STOP` arrives as an ordinary received message and is yours to act on.

## 0.7.1

- A verification attempt can now report `delivery_timeout` as its failure reason, meaning no delivery confirmation arrived before the channel's timeout and the verification failed over to the next channel.

## 0.7.0

- An SMS error `code` is documented as an open enum: Bird adds reasons over time, so match it with a fallback branch rather than treating the listed values as the complete set.
- The `sms.expired` webhook payload now carries `error`, the same failure detail the other terminal SMS events carry: a Bird-stable `code`, a `description`, and the provider's `carrier_error_code` when it sent one.
- **Breaking:** An email template reads the recipient's contact record through `bird.contact.<attribute>` and the unsubscribe link through `bird.unsubscribe_url`. Rewrite a template that uses any other spelling for those values and republish it.
- **Breaking:** A send by template must supply a value for every parameter its template uses, and a parameter name must be a single word. A send that omits one is rejected rather than delivered with a blank in place of the value.
- **Breaking:** A `marketing` template has to place `bird.unsubscribe_url` in its body to publish, in every language it carries. The token stands on its own: no filters, not inside an `{% if %}` or `{% for %}` block, and not in the subject. Where a language has both an HTML and a text body, the HTML one has to carry it.
- `bird` is now the only name you cannot use for a parameter, so `contact`, `unsubscribe_url` and `first_name` are all available.
- Listing calls now accepts in-flight and final statuses together in one `status` filter and returns them as a single page, where mixing them used to be rejected.
- **Breaking:** a WhatsApp template parameter's `text` is now optional and should be read as nullable. It carries a value only on a `text` parameter, and a parameter of any other kind carries its value in the field named for that kind.
- Template parameters can now describe more than text. `type` accepts `image`, `video`, `gif`, `document` and `location` alongside `text`: `image`, `video`, `gif` and `document` carry a media header's file in `url`, and `location` carries a location header's point in `location`. A parameter's kind names only the field its value travels in — a coupon button's code is a plain string, so it is still a `text` parameter (`{"type":"text","text":"LUCAS25"}`), the same shape the code was authored under. A `carousel` component carries its values per card, in `cards[]`, one entry per card in the order the template was approved with.
- Three WhatsApp field descriptions now match what the API does. Omitting a template send's `language` sends the template's default language rather than returning a `422`; `received` is documented as an inbound message's status rather than as reserved; and a WhatsApp message's `cost` explains that an inbound message is never priced.

## 0.6.0

- Listing contacts gains an `identifier` filter (`email` or `phone`), and each contact now includes its `audiences`.
- **Breaking:** an SMS message's `text` is now optional — a message you sent always carries one, but a received message may not. Handle its absence rather than assuming every message has a body.
- Every `sms.*` webhook payload now carries `cost`, split into `transaction_amount` and `passthrough_amount` over one currency. The figure is as of that event, and the components are named so a subscriber merges them per component rather than replacing the object, since webhook delivery is not ordered.
- Verify gains a next-channel action: when a recipient reports the passcode never arrived, send a fresh one on the next channel in the verification's plan without waiting out the resend cooldown. Identify the verification by the same recipient you started it with, as with a check — there is still no id to store. Every passcode already sent stays valid, so a late arrival can still be checked. Available as `verify.verifications.nextChannel` / `NextChannel` / `next_channel` / `nextChannel` on the TypeScript, Go, Python, and PHP SDKs, `bird verify verifications next-channel` on the CLI, and the `verify_verifications_next_channel` MCP tool. A verification whose channel plan is exhausted answers `422 NoNextChannel`.
- Add a `voice` resource for reading the call log: list the workspace's calls with the dashboard's filters, and fetch one call at any point in its lifecycle.
- A voice call now reports `actor`, the API key or user that placed it. It is absent on calls that ended before Bird began recording it, and on any call your trunk admitted by source IP address, since that path carries no credential to identify a caller.
- A WhatsApp message's `cost` now names its components, matching SMS: `transaction_amount` is what Bird charged to send the message, and `passthrough_amount` is reserved for third-party fees. `amount` remains the total.
- The create-verification docs no longer name SMS as the phone channel: a phone recipient is verified over the phone channels enabled for its destination country, in that country's configured order.

## 0.5.0

- An SMS message's `cost` now names its components: `transaction_amount` is what Bird charged to carry the message, and `passthrough_amount` is reserved for third-party fees such as US 10DLC carrier surcharges. `amount` remains the total.

## 0.4.0

- Listing WhatsApp messages gains a `category` filter, matching the equivalent filter on SMS and email messages.

## 0.3.0

- Batch contact upsert result items echo what each entry supplied under a nested `entry` object (email, phone, externalId, null where absent, never the contact's current state) plus a top-level `matchedOn`, and the request's `matchOn` accepts `email`, `phone`, or `external_id` with automatic matching when omitted.
- Failed rows in a batch contact upsert carry the specific error `code` (for example `E04058`, ambiguous match, versus `E04055`, phone taken) alongside `type` and `message`, so a sync can branch on which conflict it hit.
- **Breaking (0.x):** `Contact::getChannels()` is removed: the field restated which identifiers are set under a reachability claim the platform cannot back. Read `getEmail()`/`getPhone()` presence directly.
- **Breaking (0.x):** `Contact::getEmail()` may now return null: a contact may be identified by an E.164 phone number instead of, or as well as, an email address. Contacts gain `getPhone()` and the contact list gains an exact `phone` filter.
- Filter WhatsApp messages by `direction`. The unfiltered list returns the whole conversation, so `direction` narrows it to what you sent or what the contact sent you.
- **Breaking:** every `$bird->realtime` method drops its `?RealtimeOptions $credentials` parameter. A call that overrode the app credentials positionally passes them on the request options instead: `new RequestOptions(realtime: new RealtimeOptions(key: …, secret: …))`. Credentials set on the client are unchanged.

## 0.2.0

- The WhatsApp template send accepts a template `id` (`wat_…`) in place of `slug`, and `language` now takes a BCP-47 tag such as `pt-BR`.
- WhatsApp send: the `to` field now accepts a business-scoped user ID as well as an E.164 phone number, so you can message a WhatsApp user whose phone number you do not have. One-time-passcode templates still require a phone number and return `422 WhatsAppRecipientNotSupportedForTemplate` when sent to a business-scoped user ID.

## 0.1.1

- Add the whole-program onboarding examples for SMS, WhatsApp, and Verify (`examples/onboarding-sms.php`, `onboarding-whatsapp.php`, `onboarding-verify-create.php`, `onboarding-verify-check.php`), alongside the existing email one.

## 0.1.0

- Initial release: a typed Composer package (messagebird/sdk) over the Bird API covering email, SMS, WhatsApp, verification, contacts, audiences, domains, and realtime, with the shared retry, idempotency, pagination, and Standard Webhooks model.
