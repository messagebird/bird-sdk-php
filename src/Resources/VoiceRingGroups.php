<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class VoiceRingGroups extends VoiceRingGroupsBase
{
    public readonly VoiceRingGroupsMembers $members;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->members = new VoiceRingGroupsMembers($client);
    }
}
