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

    public readonly VoiceSettingsResource $settings;

    public readonly VoiceVerifiedNumbers $verifiedNumbers;

    public readonly VoiceDestinations $destinations;

    public readonly VoiceSessionCredentials $sessionCredentials;


    public function __construct(Bird $client)
    {
        $this->legs = new VoiceLegs($client);
        $this->trunks = new VoiceTrunks($client);
        $this->numbers = new VoiceNumbers($client);
        $this->settings = new VoiceSettingsResource($client);
        $this->verifiedNumbers = new VoiceVerifiedNumbers($client);
        $this->destinations = new VoiceDestinations($client);
        $this->sessionCredentials = new VoiceSessionCredentials($client);
        $this->calls = new VoiceCalls($client);
    }
}
