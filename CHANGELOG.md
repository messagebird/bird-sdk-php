# Changelog

All notable changes to `messagebird/sdk` are documented here. Versions are assigned by the surface changeset tooling; do not hand-edit this file.

## 0.2.0

- The WhatsApp template send accepts a template `id` (`wat_…`) in place of `slug`, and `language` now takes a BCP-47 tag such as `pt-BR`.
- WhatsApp send: the `to` field now accepts a business-scoped user ID as well as an E.164 phone number, so you can message a WhatsApp user whose phone number you do not have. One-time-passcode templates still require a phone number and return `422 WhatsAppRecipientNotSupportedForTemplate` when sent to a business-scoped user ID.

## 0.1.1

- Add the whole-program onboarding examples for SMS, WhatsApp, and Verify (`examples/onboarding-sms.php`, `onboarding-whatsapp.php`, `onboarding-verify-create.php`, `onboarding-verify-check.php`), alongside the existing email one.

## 0.1.0

- Initial release: a typed Composer package (messagebird/sdk) over the Bird API covering email, SMS, WhatsApp, verification, contacts, audiences, domains, and realtime, with the shared retry, idempotency, pagination, and Standard Webhooks model.
