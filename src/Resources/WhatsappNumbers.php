<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * The WhatsApp numbers this workspace can send from. The number reads are
 * generated on WhatsappNumbersBase; this parent adds the nested resource
 * reached as `$bird->whatsapp->numbers->profile`, the business profile
 * WhatsApp shows to people a number messages.
 */
final class WhatsappNumbers extends WhatsappNumbersBase
{
    public readonly WhatsappNumbersProfile $profile;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->profile = new WhatsappNumbersProfile($client);
    }
}
