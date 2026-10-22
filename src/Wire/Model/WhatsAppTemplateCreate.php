<?php

namespace MessageBird\Wire\Model;

/**
 * Parameters for creating a WhatsApp template, optionally seeding its first draft.
 */
class WhatsAppTemplateCreate
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
     * The WhatsApp Business Account to author this template on. A template belongs to one account at Meta and is reviewed, approved and sent under it, so every create names the account explicitly. It must be an account connected to this workspace.
     * 
     *
     * @var string|null
     */
    protected $waba;
    /**
     * The template's workspace-unique handle, and what a send references. Editable only before the first submission. The `bird_` prefix is reserved for our built-in templates and is rejected. Meta's own template name is derived from this handle, so the handle itself is validated against the charset Meta accepts.
     * 
     *
     * @var string|null
     */
    protected $slug;
    /**
     * The template's display name, shown wherever the template is listed. Free text, changeable at any time. Defaults to the slug when omitted.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * What the template is for. Free text.
     *
     * @var string|null
     */
    protected $description;
    /**
     * The category Meta reviews the template under. Required, because Meta demands one on every template it holds and it determines what a send costs. There is no default. Meta can recategorize a template after review; the per-language summary reports what it actually holds.
     * 
     *
     * @var string|null
     */
    protected $category;
    /**
     * The language a send uses when it names none, and the last resort when a requested language is unavailable. When `languages` is supplied it must be one of its keys.
     * 
     *
     * @var string|null
     */
    protected $defaultLanguage;
    /**
     * How a send behaves when it asks for a language this template does not carry. Defaults to `fail`: a WhatsApp send that silently fell back would deliver approved copy the recipient did not expect, at a price the sender did not choose.
     * 
     *
     * @var string|null
     */
    protected $onMissingLanguage;
    /**
     * Whether a send has to name a language. Set it to have a send that names none rejected, leaving the default language for sends that ask for it.
     * 
     *
     * @var bool|null
     */
    protected $languageSourceRequired = false;
    /**
     * Optional seed for the template's first draft, keyed by BCP-47 language
     * tag. Supplying it opens the draft and writes every language in one
     * transaction: any invalid entry fails the whole create, leaving no
     * template behind. Tags are canonicalised, so `pt-br` lands as `pt-BR`, and
     * two keys canonicalising to one tag are rejected.
     * 
     * Omit it to create the template with no draft, and add content later
     * through the version and language paths. Nothing here reaches Meta:
     * content is submitted, never created.
     * 
     *
     * @var array<string, WhatsAppTemplateLanguageUpsert>|null
     */
    protected $languages;
    /**
     * The WhatsApp Business Account to author this template on. A template belongs to one account at Meta and is reviewed, approved and sent under it, so every create names the account explicitly. It must be an account connected to this workspace.
     * 
     *
     * @return string|null
     */
    public function getWaba(): ?string
    {
        return $this->waba;
    }
    /**
     * The WhatsApp Business Account to author this template on. A template belongs to one account at Meta and is reviewed, approved and sent under it, so every create names the account explicitly. It must be an account connected to this workspace.
     *
     * @param string|null $waba
     *
     * @return self
     */
    public function setWaba(?string $waba): self
    {
        $this->initialized['waba'] = true;
        $this->waba = $waba;
        return $this;
    }
    /**
     * The template's workspace-unique handle, and what a send references. Editable only before the first submission. The `bird_` prefix is reserved for our built-in templates and is rejected. Meta's own template name is derived from this handle, so the handle itself is validated against the charset Meta accepts.
     * 
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The template's workspace-unique handle, and what a send references. Editable only before the first submission. The `bird_` prefix is reserved for our built-in templates and is rejected. Meta's own template name is derived from this handle, so the handle itself is validated against the charset Meta accepts.
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
     * The template's display name, shown wherever the template is listed. Free text, changeable at any time. Defaults to the slug when omitted.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The template's display name, shown wherever the template is listed. Free text, changeable at any time. Defaults to the slug when omitted.
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
     * What the template is for. Free text.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * What the template is for. Free text.
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
     * The category Meta reviews the template under. Required, because Meta demands one on every template it holds and it determines what a send costs. There is no default. Meta can recategorize a template after review; the per-language summary reports what it actually holds.
     * 
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * The category Meta reviews the template under. Required, because Meta demands one on every template it holds and it determines what a send costs. There is no default. Meta can recategorize a template after review; the per-language summary reports what it actually holds.
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
     * The language a send uses when it names none, and the last resort when a requested language is unavailable. When `languages` is supplied it must be one of its keys.
     * 
     *
     * @return string|null
     */
    public function getDefaultLanguage(): ?string
    {
        return $this->defaultLanguage;
    }
    /**
     * The language a send uses when it names none, and the last resort when a requested language is unavailable. When `languages` is supplied it must be one of its keys.
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
     * How a send behaves when it asks for a language this template does not carry. Defaults to `fail`: a WhatsApp send that silently fell back would deliver approved copy the recipient did not expect, at a price the sender did not choose.
     * 
     *
     * @return string|null
     */
    public function getOnMissingLanguage(): ?string
    {
        return $this->onMissingLanguage;
    }
    /**
     * How a send behaves when it asks for a language this template does not carry. Defaults to `fail`: a WhatsApp send that silently fell back would deliver approved copy the recipient did not expect, at a price the sender did not choose.
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
     * Whether a send has to name a language. Set it to have a send that names none rejected, leaving the default language for sends that ask for it.
     * 
     *
     * @return bool|null
     */
    public function getLanguageSourceRequired(): ?bool
    {
        return $this->languageSourceRequired;
    }
    /**
     * Whether a send has to name a language. Set it to have a send that names none rejected, leaving the default language for sends that ask for it.
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
    /**
     * Optional seed for the template's first draft, keyed by BCP-47 language
     * tag. Supplying it opens the draft and writes every language in one
     * transaction: any invalid entry fails the whole create, leaving no
     * template behind. Tags are canonicalised, so `pt-br` lands as `pt-BR`, and
     * two keys canonicalising to one tag are rejected.
     * 
     * Omit it to create the template with no draft, and add content later
     * through the version and language paths. Nothing here reaches Meta:
     * content is submitted, never created.
     * 
     *
     * @return array<string, WhatsAppTemplateLanguageUpsert>|null
     */
    public function getLanguages(): ?iterable
    {
        return $this->languages;
    }
    /**
    * Optional seed for the template's first draft, keyed by BCP-47 language
    tag. Supplying it opens the draft and writes every language in one
    transaction: any invalid entry fails the whole create, leaving no
    template behind. Tags are canonicalised, so `pt-br` lands as `pt-BR`, and
    two keys canonicalising to one tag are rejected.
    
    Omit it to create the template with no draft, and add content later
    through the version and language paths. Nothing here reaches Meta:
    content is submitted, never created.
    
    *
    * @param array<string, WhatsAppTemplateLanguageUpsert>|null $languages
    *
    * @return self
    */
    public function setLanguages(?iterable $languages): self
    {
        $this->initialized['languages'] = true;
        $this->languages = $languages;
        return $this;
    }
}
