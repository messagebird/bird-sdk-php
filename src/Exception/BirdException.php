<?php

declare(strict_types=1);

namespace MessageBird\Exception;

/**
 * Base of the SDK's typed error tree. Every error the SDK raises is a
 * BirdException, so `catch (BirdException)` catches them all.
 */
class BirdException extends \RuntimeException
{
}
