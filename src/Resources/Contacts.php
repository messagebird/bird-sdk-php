<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * The contacts collection. list, get, create, update, delete, and batch are
 * generated on ContactsBase; this parent adds the nested read reached as
 * `$bird->contacts->preferences`.
 */
final class Contacts extends ContactsBase
{
    public readonly ContactsPreferences $preferences;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->preferences = new ContactsPreferences($client);
    }
}
