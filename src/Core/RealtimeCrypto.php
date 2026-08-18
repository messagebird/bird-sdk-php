<?php

declare(strict_types=1);

namespace MessageBird\Core;

use MessageBird\Exception\BirdException;

/**
 * Crypto for Realtime end-to-end encrypted channels (`private-encrypted-…`).
 *
 * The wire contract: a channel's key is SHA-256(channel_name || master_key),
 * carried to subscribers as the base64 `shared_secret` in the channel-auth
 * response; an event's payload is an XSalsa20-Poly1305 secretbox over the
 * JSON-serialized data, published as `{nonce, ciphertext}` (both base64). The
 * master key is the customer's alone — it never leaves the process.
 *
 * Hashing and HMAC are core PHP; the box cipher comes from ext-sodium, which is
 * bundled but can be disabled at build time, so sealing checks for it and names
 * it rather than failing on an undefined function.
 *
 * @internal not part of the public surface; the seam is `$bird->realtime`
 */
final class RealtimeCrypto
{
    public const ENCRYPTED_CHANNEL_PREFIX = 'private-encrypted-';

    private const MASTER_KEY_BYTES = 32;
    private const NONCE_BYTES = 24;

    public static function isEncryptedChannel(string $channel): bool
    {
        return str_starts_with($channel, self::ENCRYPTED_CHANNEL_PREFIX);
    }

    /**
     * Decode the configured master key to its 32 raw bytes. Validated here so a
     * bad key fails naming the option that carries it, rather than surfacing as
     * a cipher-internals error at publish time.
     */
    public static function decodeMasterKey(?string $masterKey): string
    {
        if ($masterKey === null || $masterKey === '') {
            throw new \InvalidArgumentException(
                'a private-encrypted- channel needs the encryption master key: pass realtime: new RealtimeOptions(key: ..., secret: ..., encryptionMasterKey: ...) to the Bird constructor — generate one as 32 random bytes, base64-encoded',
            );
        }

        $decoded = base64_decode($masterKey, true);
        if ($decoded === false || \strlen($decoded) !== self::MASTER_KEY_BYTES) {
            throw new \InvalidArgumentException(
                'RealtimeOptions encryptionMasterKey must be 32 bytes, base64-encoded',
            );
        }

        return $decoded;
    }

    /** SHA-256(channel_name || master_key) — the channel's secretbox key. */
    public static function deriveSharedSecret(string $channel, string $masterKey): string
    {
        return hash('sha256', $channel . $masterKey, true);
    }

    /**
     * Seal an event payload for one encrypted channel: JSON-serialize it, then
     * box it under the channel's derived key.
     *
     * @return array{nonce: string, ciphertext: string}
     */
    public static function sealPayload(string $channel, mixed $data, string $masterKey, ?string $nonce = null): array
    {
        return self::seal($channel, self::serializePayload($data), $masterKey, $nonce);
    }

    /**
     * Box a serialized payload, returning the envelope published as the event's
     * data. $nonce is the seam the shared vectors need, which pin a fixed one;
     * left null every envelope gets 24 fresh random bytes, as it must.
     *
     * @return array{nonce: string, ciphertext: string}
     */
    public static function seal(string $channel, string $plaintext, string $masterKey, ?string $nonce = null): array
    {
        if (!\function_exists('sodium_crypto_secretbox')) {
            throw new BirdException(
                'publishing to a private-encrypted- channel needs the sodium extension: this PHP build has ext-sodium disabled, so enable it (it ships with PHP 8.2+) or publish to an unencrypted channel',
            );
        }

        $nonce ??= random_bytes(self::NONCE_BYTES);
        $key = self::deriveSharedSecret($channel, $masterKey);

        return [
            'nonce' => base64_encode($nonce),
            'ciphertext' => base64_encode(sodium_crypto_secretbox($plaintext, $nonce, $key)),
        ];
    }

    /**
     * The bytes that get sealed. An object or array goes through the wire
     * serializer, not json_encode: a jane model's fields are protected, so
     * json_encode would seal a payload built from SDK models as `{}` while the
     * unencrypted path serialized it correctly.
     */
    private static function serializePayload(mixed $data): string
    {
        if (\is_object($data) || \is_array($data)) {
            return (new Serializer())->encode($data);
        }

        return json_encode($data, JSON_THROW_ON_ERROR);
    }
}
