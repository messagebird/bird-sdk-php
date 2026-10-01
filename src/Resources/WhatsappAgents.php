<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * The WhatsApp Business Agent on one of the workspace's numbers. The agent is
 * onboarded in the dashboard; this parent carries what is public about it, the
 * notifications reached as `$bird->whatsapp->agents->notifications`.
 */
final class WhatsappAgents extends Resource
{
    public readonly WhatsappAgentsNotifications $notifications;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->notifications = new WhatsappAgentsNotifications($client);
    }
}
