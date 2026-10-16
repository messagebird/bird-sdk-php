<?php

namespace MessageBird\Wire\Model;

/**
 * The Meta business portfolio that owns a WhatsApp Business Account. Bird holds no resource of its own for a portfolio, which is why the identifier is named `meta_id`: it is meaningful only against Meta's own tools, and it is not a Bird identifier.
 */
class WhatsAppBusinessAccountPortfolio extends WhatsAppBusinessPortfolio
{
}
