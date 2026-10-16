<?php

namespace MessageBird\Wire\Model;

/**
 * The contact's name. `formatted_name` is what the card shows, and WhatsApp additionally requires at least one of the parts below it, so a card carrying only a formatted name is rejected.
 */
class WhatsAppContactCardSendName extends WhatsAppContactNameSend
{
}
