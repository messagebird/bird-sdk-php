<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class Voice
{
    public readonly VoiceLegs $legs;
    public readonly VoiceCalls $calls;

    public readonly VoiceTrunks $trunks;

    public readonly VoiceNumbers $numbers;

    public readonly VoiceCallerIds $callerIds;

    public readonly VoiceDestinations $destinations;

    public readonly VoiceSessionCredentials $sessionCredentials;


    public function __construct(Bird $client)
    {
        $this->legs = new VoiceLegs($client);
        $this->trunks = new VoiceTrunks($client);
        $this->numbers = new VoiceNumbers($client);
        $this->callerIds = new VoiceCallerIds($client);
        $this->destinations = new VoiceDestinations($client);
        $this->sessionCredentials = new VoiceSessionCredentials($client);
        $this->calls = new VoiceCalls($client);
    }
}
