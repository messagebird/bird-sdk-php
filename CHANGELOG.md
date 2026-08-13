# Changelog

All notable changes to `messagebird/sdk` are documented here. Versions are assigned by the surface changeset tooling; do not hand-edit this file.

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
