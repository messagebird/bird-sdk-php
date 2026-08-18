<?php

declare(strict_types=1);

namespace MessageBird\Exception;

use MessageBird\Core\Serializer;
use MessageBird\Wire\Model\NextAction;
use MessageBird\Wire\Model\UnmetGate;

/**
 * An error the API returned. The error `type` is read from the response body,
 * never inferred from the HTTP status: a 400 whose body says `validation_error`
 * surfaces with that type, not a generic bad-request.
 *
 * This is the single error-mapping site (fromResponse). A future typed subtree
 * (rate-limit, validation) hangs off this class.
 */
final class ApiException extends BirdException
{
    /**
     * @param list<NextAction> $next       the recovery steps, in the order to take them.
     *                                     Read `getKind()` before `getOperation()`: only an
     *                                     `operation` step carries one, and a kind this
     *                                     version does not know is display-only.
     * @param list<UnmetGate>  $unmetGates the verification requirements blocking this
     *                                     action, each with the flow that resolves it
     */
    public function __construct(
        string $message,
        public readonly int $status,
        public readonly ?string $type = null,
        // Not $code: \Exception already reserves $code (int).
        public readonly ?string $errorCode = null,
        public readonly ?string $remediation = null,
        public readonly array $next = [],
        public readonly array $unmetGates = [],
    ) {
        parent::__construct($message);
    }

    public static function fromResponse(int $status, string $body): self
    {
        $type = null;
        $errorCode = null;
        $message = "HTTP {$status}";
        $remediation = null;
        $next = [];
        $unmetGates = [];

        $decoded = json_decode($body, true);
        if (is_array($decoded) && isset($decoded['error']) && is_array($decoded['error'])) {
            $error = $decoded['error'];
            $type = isset($error['type']) && is_string($error['type']) ? $error['type'] : null;
            $errorCode = isset($error['code']) && is_string($error['code']) ? $error['code'] : null;
            if (isset($error['message']) && is_string($error['message'])) {
                $message = $error['message'];
            }
            $remediation = isset($error['remediation']) && is_string($error['remediation']) ? $error['remediation'] : null;

            $serializer = new Serializer();
            $next = self::wireList($serializer, $error['next'] ?? null, NextAction::class);
            $unmetGates = self::wireList($serializer, $error['unmet_gates'] ?? null, UnmetGate::class);
        }

        return new self($message, $status, $type, $errorCode, $remediation, $next, $unmetGates);
    }

    /**
     * Type the nested recovery arrays through the generated wire normalizers, so
     * this layer holds no second hand-written copy of a shape the spec already
     * describes. Anything the server sends that does not denormalize is dropped
     * rather than raised: an error response must always arrive as its own error,
     * never as a parse failure standing in for it.
     *
     * @template T of object
     *
     * @param class-string<T> $class
     *
     * @return list<T>
     */
    private static function wireList(Serializer $serializer, mixed $raw, string $class): array
    {
        if (!is_array($raw)) {
            return [];
        }

        $models = [];
        foreach ($raw as $item) {
            if (!is_array($item)) {
                continue;
            }
            try {
                $models[] = $serializer->denormalize($item, $class);
            } catch (\Throwable) {
                continue;
            }
        }

        return $models;
    }
}
