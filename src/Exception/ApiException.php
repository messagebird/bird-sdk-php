<?php

declare(strict_types=1);

namespace MessageBird\Exception;

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
    public function __construct(
        string $message,
        public readonly int $status,
        public readonly ?string $type = null,
        // Not $code: \Exception already reserves $code (int).
        public readonly ?string $errorCode = null,
    ) {
        parent::__construct($message);
    }

    public static function fromResponse(int $status, string $body): self
    {
        $type = null;
        $errorCode = null;
        $message = "HTTP {$status}";

        $decoded = json_decode($body, true);
        if (is_array($decoded) && isset($decoded['error']) && is_array($decoded['error'])) {
            $error = $decoded['error'];
            $type = isset($error['type']) && is_string($error['type']) ? $error['type'] : null;
            $errorCode = isset($error['code']) && is_string($error['code']) ? $error['code'] : null;
            if (isset($error['message']) && is_string($error['message'])) {
                $message = $error['message'];
            }
        }

        return new self($message, $status, $type, $errorCode);
    }
}
