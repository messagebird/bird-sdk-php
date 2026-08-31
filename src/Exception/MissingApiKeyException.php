<?php

declare(strict_types=1);

namespace MessageBird\Exception;

/**
 * An API call on a client constructed without an API key (a receiver-only
 * client, which can still `unwrap` webhooks). Thrown before any request.
 */
class MissingApiKeyException extends BirdException
{
}
