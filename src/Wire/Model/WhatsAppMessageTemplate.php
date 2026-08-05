<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageTemplate extends \ArrayObject
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
     * The template's stable handle (for example `bird_otp`).
     *
     * @var string|null
     */
    protected $slug;
    /**
     * Content classification applied to messages sent from this template.
     *
     * @var string|null
     */
    protected $category;
    /**
     * The canonical BCP-47 tag of the template variant that was sent.
     *
     * @var string|null
     */
    protected $language;
    /**
     * The values that filled the template's placeholders. Empty for an authentication template, whose content is never returned.
     * 
     *
     * @var list<WhatsAppMessageTemplateComponent>|null
     */
    protected $components;
    /**
     * The template's stable handle (for example `bird_otp`).
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The template's stable handle (for example `bird_otp`).
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
     * Content classification applied to messages sent from this template.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Content classification applied to messages sent from this template.
     *
     * @param string|null $category
     *
     * @return self
     */
    public function setCategory(?string $category): self
    {
        $this->initialized['category'] = true;
        $this->category = $category;
        return $this;
    }
    /**
     * The canonical BCP-47 tag of the template variant that was sent.
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * The canonical BCP-47 tag of the template variant that was sent.
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
     * The values that filled the template's placeholders. Empty for an authentication template, whose content is never returned.
     * 
     *
     * @return list<WhatsAppMessageTemplateComponent>|null
     */
    public function getComponents(): ?array
    {
        return $this->components;
    }
    /**
     * The values that filled the template's placeholders. Empty for an authentication template, whose content is never returned.
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
