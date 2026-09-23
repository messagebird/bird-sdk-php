<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class Voice
{
    public readonly VoiceLegs $legs;
    public readonly VoiceCalls $calls;

    public function __construct(Bird $client)
    {
        $this->legs = new VoiceLegs($client);
        $this->calls = new VoiceCalls($client);
    }
}
