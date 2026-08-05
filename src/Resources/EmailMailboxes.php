<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * Email mailboxes. Its own operations are generated on EmailMailboxesBase; this
 * parent adds the nested `$bird->email->mailboxes->messages` and `->receiveRules`.
 */
final class EmailMailboxes extends EmailMailboxesBase
{
    public readonly EmailMailboxesMessages $messages;
    public readonly EmailMailboxesReceiveRules $receiveRules;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->messages = new EmailMailboxesMessages($client);
        $this->receiveRules = new EmailMailboxesReceiveRules($client);
    }
}
