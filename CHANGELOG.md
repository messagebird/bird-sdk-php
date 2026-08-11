# Changelog

All notable changes to `messagebird/sdk` are documented here. Versions are assigned by the surface changeset tooling; do not hand-edit this file.

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
