<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * One template's submissions. A version is where content lives; the template
 * above it carries only the handle. This parent adds the nested resource
 * reached as `$bird->whatsapp->templates->versions->languages`.
 */
final class WhatsappTemplatesVersions extends WhatsappTemplatesVersionsBase
{
    public readonly WhatsappTemplatesVersionsLanguages $languages;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->languages = new WhatsappTemplatesVersionsLanguages($client);
    }
}
