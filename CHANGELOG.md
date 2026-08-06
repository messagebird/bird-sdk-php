# Changelog

All notable changes to `messagebird/sdk` are documented here. Versions are assigned by the surface changeset tooling; do not hand-edit this file.

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
