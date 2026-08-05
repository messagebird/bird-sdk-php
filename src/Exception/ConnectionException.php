<?php

declare(strict_types=1);

namespace MessageBird\Exception;

/**
 * A transport-level failure — the PSR-18 client could not complete the request
 * (connection refused, DNS, timeout) — raised once retries are exhausted. Sits
 * under BirdException so `catch (BirdException)` covers it alongside API errors,
 * mirroring the connection-error type in the Go/Python/TS SDKs.
 */
final class ConnectionException extends BirdException
{
}
