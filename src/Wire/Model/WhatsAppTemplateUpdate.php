<?php

namespace MessageBird\Wire\Model;

/**
 * Partial update of a template's metadata and language policies. Only the fields you send are changed; the rest are left as they stand. The slug can change only before the first submission.
 */
class WhatsAppTemplateUpdate
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
     * A new workspace-unique handle. Editable only before the first submission. After a change, the old slug no longer resolves; the template ID stays the same.
     * 
     *
     * @var string|null
     */
    protected $slug;
    /**
     * The template's display name. Editable at any time; it is not what a send references.
     *
     * @var string|null
     */
    protected $name;
    /**
     * What the template is for. Send `null` to clear it.
     *
     * @var string|null
     */
    protected $description;
    /**
     * The language a send falls back to, and the one language the template is required to carry. Repointing it at a language the draft does not hold is refused, the same way removing the current default is: add the language first.
     * 
     *
     * @var string|null
     */
    protected $defaultLanguage;
    /**
     * How a send behaves when it asks for a language this template does not carry. Omitting it leaves the template's current setting alone. The `fail` default belongs to a create, and a partial update never reapplies it.
     * 
     *
     * @var string|null
     */
    protected $onMissingLanguage;
    /**
     * Whether a send has to name a language.
     *
     * @var bool|null
     */
    protected $languageSourceRequired;
    /**
     * A new workspace-unique handle. Editable only before the first submission. After a change, the old slug no longer resolves; the template ID stays the same.
     * 
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * A new workspace-unique handle. Editable only before the first submission. After a change, the old slug no longer resolves; the template ID stays the same.
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
     * The template's display name. Editable at any time; it is not what a send references.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The template's display name. Editable at any time; it is not what a send references.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * What the template is for. Send `null` to clear it.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * What the template is for. Send `null` to clear it.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * The language a send falls back to, and the one language the template is required to carry. Repointing it at a language the draft does not hold is refused, the same way removing the current default is: add the language first.
     * 
     *
     * @return string|null
     */
    public function getDefaultLanguage(): ?string
    {
        return $this->defaultLanguage;
    }
    /**
     * The language a send falls back to, and the one language the template is required to carry. Repointing it at a language the draft does not hold is refused, the same way removing the current default is: add the language first.
     *
     * @param string|null $defaultLanguage
     *
     * @return self
     */
    public function setDefaultLanguage(?string $defaultLanguage): self
    {
        $this->initialized['defaultLanguage'] = true;
        $this->defaultLanguage = $defaultLanguage;
        return $this;
    }
    /**
     * How a send behaves when it asks for a language this template does not carry. Omitting it leaves the template's current setting alone. The `fail` default belongs to a create, and a partial update never reapplies it.
     * 
     *
     * @return string|null
     */
    public function getOnMissingLanguage(): ?string
    {
        return $this->onMissingLanguage;
    }
    /**
     * How a send behaves when it asks for a language this template does not carry. Omitting it leaves the template's current setting alone. The `fail` default belongs to a create, and a partial update never reapplies it.
     *
     * @param string|null $onMissingLanguage
     *
     * @return self
     */
    public function setOnMissingLanguage(?string $onMissingLanguage): self
    {
        $this->initialized['onMissingLanguage'] = true;
        $this->onMissingLanguage = $onMissingLanguage;
        return $this;
    }
    /**
     * Whether a send has to name a language.
     *
     * @return bool|null
     */
    public function getLanguageSourceRequired(): ?bool
    {
        return $this->languageSourceRequired;
    }
    /**
     * Whether a send has to name a language.
     *
     * @param bool|null $languageSourceRequired
     *
     * @return self
     */
    public function setLanguageSourceRequired(?bool $languageSourceRequired): self
    {
        $this->initialized['languageSourceRequired'] = true;
        $this->languageSourceRequired = $languageSourceRequired;
        return $this;
    }
}
