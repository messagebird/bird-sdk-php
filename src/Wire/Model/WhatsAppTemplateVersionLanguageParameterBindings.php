<?php

namespace MessageBird\Wire\Model;

/**
 * Liquid over the send's `template.parameters`, keyed by the name of the value it fills. A placeholder's name is its own, such as `order_id`, or its number, such as `1`. A value with no placeholder has a fixed name: `header_url` (or `header_url_1`, `header_url_2` and so on for a carousel card), `header_filename`, `header_location` and `code`. A numbered url suffix is `button_url` (or `button_url_1`, `button_url_2` for a card). A value is a Liquid string, except `header_location`'s, which is an object of four. A value no key binds is filled by the input of the same name. Bindings never reach WhatsApp.
 */
class WhatsAppTemplateVersionLanguageParameterBindings extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
}
