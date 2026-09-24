<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class VoiceTrunks extends VoiceTrunksBase
{
    public readonly VoiceTrunksGateways $gateways;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->gateways = new VoiceTrunksGateways($client);
    }
}
