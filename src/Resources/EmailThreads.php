<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * Email threads. Its own operations are generated on EmailThreadsBase; this
 * parent adds the nested `$bird->email->threads->messages`.
 */
final class EmailThreads extends EmailThreadsBase
{
    public readonly EmailThreadsMessages $messages;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->messages = new EmailThreadsMessages($client);
    }
}
