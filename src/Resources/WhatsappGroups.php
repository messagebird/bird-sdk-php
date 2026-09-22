<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * The workspace's WhatsApp groups. A group's own lifecycle is generated on
 * WhatsappGroupsBase; this parent adds the four nested resources hung off a
 * group, reached as `$bird->whatsapp->groups->pins` and its siblings.
 */
final class WhatsappGroups extends WhatsappGroupsBase
{
    public readonly WhatsappGroupsInviteLink $inviteLink;
    public readonly WhatsappGroupsJoinRequests $joinRequests;
    public readonly WhatsappGroupsParticipants $participants;
    public readonly WhatsappGroupsPins $pins;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->inviteLink = new WhatsappGroupsInviteLink($client);
        $this->joinRequests = new WhatsappGroupsJoinRequests($client);
        $this->participants = new WhatsappGroupsParticipants($client);
        $this->pins = new WhatsappGroupsPins($client);
    }
}
