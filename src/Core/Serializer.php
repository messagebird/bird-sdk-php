<?php

declare(strict_types=1);

namespace MessageBird\Core;

use MessageBird\Wire\Normalizer\JaneObjectNormalizer;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

/**
 * Wraps the generated jane wire layer's serializer. The assembly is a fixed
 * two-normalizer stack (ArrayDenormalizer + the dispatching JaneObjectNormalizer)
 * that handles every generated model, so it does not grow as resources are added.
 * The models' `$initialized` tracking gives missing/null/present three-way
 * serialization on writes.
 */
final class Serializer
{
    private readonly SymfonySerializer $inner;

    public function __construct()
    {
        $this->inner = new SymfonySerializer(
            [new ArrayDenormalizer(), new JaneObjectNormalizer()],
            [new JsonEncoder(new JsonEncode(), new JsonDecode(['json_decode_associative' => true]))],
        );
    }

    /**
     * @param object|array<mixed> $model a wire model, or a list of them for a batch body
     */
    public function encode(object|array $model): string
    {
        return $this->inner->encode($this->completeObjects($model), 'json');
    }

    /**
     * jane writes a union / `mixed` field's value into the normalized array
     * unchanged (its per-model normalizer does not recurse), so a wire model
     * passed to such a field — an email `from`/`to` address — would reach the JSON
     * encoder as a raw object and emit `{}`. Completing the normalization here
     * makes an address model serialize to its fields, so a string, an
     * `['email' => …]` array, and an `EmailAddress` object are all valid. Only
     * already-present nested objects are touched, so the missing/null/present
     * three-way semantics are unaffected.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    private function completeObjects(mixed $value): mixed
    {
        // A caller's own empty-object marker. It is what this method returns for a
        // model that normalizes to nothing, and the only way a request body can say
        // "an empty JSON object" where PHP would otherwise write an empty list, so
        // it passes through rather than going to a normalizer that has no case for it.
        // Only when it is empty: the escape-hatch verbs take an object body, so a
        // wire model nested under a non-empty one still needs completing or it
        // encodes as `{}` from its protected properties.
        if ($value instanceof \stdClass) {
            $properties = get_object_vars($value);

            return $properties === [] ? $value : (object) $this->completeObjects($properties);
        }
        if (is_object($value)) {
            $normalized = $this->completeObjects($this->inner->normalize($value, 'json'));

            // A model with nothing set normalizes to an empty PHP array, which
            // json_encode writes as `[]` — a JSON array where the API is reading an
            // object, so every "update with no fields" and "create with defaults"
            // call went out malformed. An empty BATCH stays a list: only a value the
            // caller passed as an object is re-objectified here.
            return $normalized === [] ? new \stdClass() : $normalized;
        }
        if (is_array($value)) {
            return array_map(fn ($item) => $this->completeObjects($item), $value);
        }

        return $value;
    }

    /**
     * @template T of object
     *
     * @param class-string<T> $class
     *
     * @return T
     */
    public function decode(string $json, string $class): object
    {
        return $this->inner->deserialize($json, $class, 'json');
    }

    /**
     * Denormalize an already-decoded array into a wire model. The error path
     * decodes the envelope itself, tolerating a body that is not the shape the
     * API documents, and needs to type only the nested recovery steps.
     *
     * @template T of object
     *
     * @param array<mixed>    $data
     * @param class-string<T> $class
     *
     * @return T
     */
    public function denormalize(array $data, string $class): object
    {
        return $this->inner->denormalize($data, $class, 'json');
    }
}
