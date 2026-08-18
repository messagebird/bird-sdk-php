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
     * @var string|null
     */
    protected $id;
    /**
     * The template to send, by its slug handle (for example `bird_otp`).
     *
     * @var string|null
     */
    protected $slug;
    /**
     * Which of the template's languages to send, as a BCP-47 tag (for example `en` or `pt-BR`); Meta's underscore form (`pt_BR`) is accepted and normalized. Omit it to send the template's default language, unless the template sets `language_source_required`, in which case a send naming no language is rejected. When the template does not carry the language you ask for, its own `on_missing_language` setting decides whether the closest available language is sent instead or the send is rejected. The accepted message echoes the canonical BCP-47 form of the language it resolved to.
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
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The template to send, by its slug handle (for example `bird_otp`).
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The template to send, by its slug handle (for example `bird_otp`).
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
     * Which of the template's languages to send, as a BCP-47 tag (for example `en` or `pt-BR`); Meta's underscore form (`pt_BR`) is accepted and normalized. Omit it to send the template's default language, unless the template sets `language_source_required`, in which case a send naming no language is rejected. When the template does not carry the language you ask for, its own `on_missing_language` setting decides whether the closest available language is sent instead or the send is rejected. The accepted message echoes the canonical BCP-47 form of the language it resolved to.
     * 
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * Which of the template's languages to send, as a BCP-47 tag (for example `en` or `pt-BR`); Meta's underscore form (`pt_BR`) is accepted and normalized. Omit it to send the template's default language, unless the template sets `language_source_required`, in which case a send naming no language is rejected. When the template does not carry the language you ask for, its own `on_missing_language` setting decides whether the closest available language is sent instead or the send is rejected. The accepted message echoes the canonical BCP-47 form of the language it resolved to.
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
