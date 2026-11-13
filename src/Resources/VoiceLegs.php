<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class VoiceLegs extends VoiceLegsBase
{
    public readonly VoiceLegsRecordings $recordings;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->recordings = new VoiceLegsRecordings($client);
    }
}
