<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class EmailMailboxes extends EmailMailboxesBase
{
    public readonly EmailMailboxesForwardingAddress $forwardingAddress;
    public readonly EmailMailboxesMessages $messages;
    public readonly EmailMailboxesScheduledMessages $scheduledMessages;
    public readonly EmailMailboxesReceiveRules $receiveRules;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->forwardingAddress = new EmailMailboxesForwardingAddress($client);
        $this->scheduledMessages = new EmailMailboxesScheduledMessages($client);
        $this->messages = new EmailMailboxesMessages($client);
        $this->receiveRules = new EmailMailboxesReceiveRules($client);
    }
}
