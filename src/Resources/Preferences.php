<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\RequestOptions;
use MessageBird\Wire\Model\Preference;
use MessageBird\Wire\Model\PreferenceWriteResult;

/**
 * The cross-channel stated-preference store: consent grants and opt-outs keyed
 * by channel + handle (+ optional sender scope). list and get are generated on
 * PreferencesBase; this parent hand-writes `create` (consented_at is a
 * date-time the generated writers don't assemble) and `delete` (a refusal
 * comes back as a 200 body, not a 204, so it cannot be void).
 */
final class Preferences extends PreferencesBase
{
    /**
     * Record a messaging preference statement and return the write result.
     *
     * The write is an ordered upsert keyed on channel + handle (+ sender_scope):
     * a statement dated before the key's current one is refused rather than
     * applied, which is why the result — not the bare Preference — comes back
     * either way. Returns the same PreferenceWriteResult shape whether the key
     * was fresh (201) or already had a record (200).
     *
     * @param string $channel one of `email`, `sms`, `whatsapp`
     * @param string $status  `granted` records consent; `revoked` records an opt-out
     * @param string|null $coverage how much traffic the statement covers (`all` or `non_transactional`); defaults server-side to `non_transactional`
     * @param string|null $senderScope limit the statement to one sender instead of the whole channel; not supported on email
     * @param string|null $source free-form note on where the statement came from
     * @param \DateTimeInterface|null $consentedAt when the person consented, required evidence when granting over a stored opt-out; serialized as RFC 3339
     */
    public function create(
        string $channel,
        string $handle,
        string $status,
        ?string $coverage = null,
        ?string $senderScope = null,
        ?string $source = null,
        ?\DateTimeInterface $consentedAt = null,
        ?RequestOptions $options = null,
    ): PreferenceWriteResult {
        // Built as a plain array rather than the generated PreferenceCreate model:
        // that model's normalizer formats a date via `format('Y-m-d\TH:i:sP')`,
        // which PHP renders as "+00:00" for UTC. RFC 3339 allows that, but every
        // other surface writes "Z" for a UTC instant, so a shared corpus vector
        // pins the literal and this hand override formats it to match instead of
        // going through the generated writer.
        $body = [
            'channel' => $channel,
            'handle' => $handle,
            'status' => $status,
        ];
        if ($coverage !== null) {
            $body['coverage'] = $coverage;
        }
        if ($senderScope !== null) {
            $body['sender_scope'] = $senderScope;
        }
        if ($source !== null) {
            $body['source'] = $source;
        }
        if ($consentedAt !== null) {
            $body['consented_at'] = self::formatRfc3339($consentedAt);
        }

        $result = $this->single('POST', '/v1/preferences', PreferenceWriteResult::class, $body, null, $options);

        return $this->typePreference($result);
    }

    /**
     * RFC 3339, with "Z" for a UTC offset instead of PHP's default "+00:00" —
     * the form every other surface writes for the same instant. Fractional
     * seconds are included only when non-zero and trimmed of trailing zeros:
     * `consented_at` causally orders a grant against an opt-out at whatever
     * precision the caller supplied, so truncating it to the whole second
     * could turn a later grant into an equal-or-earlier one and get it
     * refused. A zero fraction stays byte-identical to the pre-fix literal,
     * which a conformance vector pins.
     */
    private static function formatRfc3339(\DateTimeInterface $value): string
    {
        $offset = $value->getOffset() === 0 ? 'Z' : $value->format('P');

        return $value->format('Y-m-d\TH:i:s') . self::formatFraction($value) . $offset;
    }

    /**
     * The leading dot plus trimmed microseconds, or "" when the value carries
     * no sub-second component.
     */
    private static function formatFraction(\DateTimeInterface $value): string
    {
        $micros = $value->format('u');
        if ($micros === '000000') {
            return '';
        }

        return '.' . rtrim($micros, '0');
    }

    /**
     * The generated normalizer leaves `preference` as a raw array: its
     * declared type is `mixed` because the model's normalizer does not
     * recurse into it, unlike a top-level response. Every other SDK returns
     * a typed Preference here, so denormalize the fragment through the same
     * serializer `single()` used for the envelope and swap it back in, giving
     * `getPreference()` a real Preference (or null) rather than a raw array.
     */
    private function typePreference(PreferenceWriteResult $result): PreferenceWriteResult
    {
        $preference = $result->getPreference();
        if (\is_array($preference)) {
            $result->setPreference($this->denormalize($preference, Preference::class));
        }

        return $result;
    }

    /**
     * Delete a recorded preference and return the write result.
     *
     * The delete is conditional: it answers 200, not 204, and `applied: false`
     * means a newer statement survived the request, which `preference` then
     * carries. A void return here would read that refusal as success, so the
     * generated void delete does not fit and this hand method returns the
     * result instead.
     */
    public function delete(string $preferenceId, ?RequestOptions $options = null): PreferenceWriteResult
    {
        $result = $this->single('DELETE', '/v1/preferences/' . rawurlencode($preferenceId), PreferenceWriteResult::class, null, null, $options);

        return $this->typePreference($result);
    }
}
