<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * The Verify product namespace. It has no operations of its own; the passcode
 * flow lives under `$bird->verify->verifications` (create / check).
 */
final class Verify extends Resource
{
    public readonly VerifyVerifications $verifications;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->verifications = new VerifyVerifications($client);
    }
}
