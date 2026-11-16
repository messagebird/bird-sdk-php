<?php

declare(strict_types=1);

namespace MessageBird;

/** Leave an optional argument out of the request, distinct from an explicit null. */
enum Omit
{
    case Value;
}
