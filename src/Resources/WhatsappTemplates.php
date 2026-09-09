<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * The workspace's WhatsApp template registry. The registry reads are generated
 * on WhatsappTemplatesBase; this parent adds the nested resource reached as
 * `$bird->whatsapp->templates->versions`, where a template's content lives.
 */
final class WhatsappTemplates extends WhatsappTemplatesBase
{
    public readonly WhatsappTemplatesVersions $versions;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->versions = new WhatsappTemplatesVersions($client);
    }
}
