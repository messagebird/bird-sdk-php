<?php

declare(strict_types=1);

namespace MessageBird\Exception;

/** A request model is missing a required field before transport begins. */
final class RequestValidationException extends BirdException
{
}
