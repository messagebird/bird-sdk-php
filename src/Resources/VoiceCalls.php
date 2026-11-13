<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class VoiceCalls extends VoiceCallsBase
{
    public readonly VoiceCallsRecordings $recordings;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->recordings = new VoiceCallsRecordings($client);
    }
}
