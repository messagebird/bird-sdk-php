<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageSendRequestTemplate extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * The template to send, by its slug (for example `bird_otp`).
     *
     * @var string|null
     */
    protected $slug;
    /**
     * Language code of the template variant to send (for example `en` or `pt_BR`). May be omitted when the template has a single language; when it is stocked in several, omitting the language returns a `422` that names the available codes. The accepted message echoes the resolved language.
     * 
     *
     * @var string|null
     */
    protected $language;
    /**
     * The values that fill the template's placeholders: one entry per content block that has placeholders, each carrying its `parameters`. A positional template takes its parameters in `{{n}}` order; a template with named parameters requires each parameter's `name` to match one the template declares. Either way, sending parameters that do not match what the template declares returns a `422` `WhatsAppTemplateParameterMismatch`.
     * 
     *
     * @var list<WhatsAppMessageTemplateComponent>|null
     */
    protected $components;
    /**
     * The template to send, by its slug (for example `bird_otp`).
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The template to send, by its slug (for example `bird_otp`).
     *
     * @param string|null $slug
     *
     * @return self
     */
    public function setSlug(?string $slug): self
    {
        $this->initialized['slug'] = true;
        $this->slug = $slug;
        return $this;
    }
    /**
     * Language code of the template variant to send (for example `en` or `pt_BR`). May be omitted when the template has a single language; when it is stocked in several, omitting the language returns a `422` that names the available codes. The accepted message echoes the resolved language.
     * 
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * Language code of the template variant to send (for example `en` or `pt_BR`). May be omitted when the template has a single language; when it is stocked in several, omitting the language returns a `422` that names the available codes. The accepted message echoes the resolved language.
     *
     * @param string|null $language
     *
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->initialized['language'] = true;
        $this->language = $language;
        return $this;
    }
    /**
     * The values that fill the template's placeholders: one entry per content block that has placeholders, each carrying its `parameters`. A positional template takes its parameters in `{{n}}` order; a template with named parameters requires each parameter's `name` to match one the template declares. Either way, sending parameters that do not match what the template declares returns a `422` `WhatsAppTemplateParameterMismatch`.
     * 
     *
     * @return list<WhatsAppMessageTemplateComponent>|null
     */
    public function getComponents(): ?array
    {
        return $this->components;
    }
    /**
     * The values that fill the template's placeholders: one entry per content block that has placeholders, each carrying its `parameters`. A positional template takes its parameters in `{{n}}` order; a template with named parameters requires each parameter's `name` to match one the template declares. Either way, sending parameters that do not match what the template declares returns a `422` `WhatsAppTemplateParameterMismatch`.
     *
     * @param list<WhatsAppMessageTemplateComponent>|null $components
     *
     * @return self
     */
    public function setComponents(?array $components): self
    {
        $this->initialized['components'] = true;
        $this->components = $components;
        return $this;
    }
}
