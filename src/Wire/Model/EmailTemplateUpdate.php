<?php

namespace MessageBird\Wire\Model;

class EmailTemplateUpdate
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
     * The draft revision you last read (from the template's `revision` field). A stale value returns a conflict so you can reload and retry.
     * 
     *
     * @var int|null
     */
    protected $revision;
    /**
     * New display name, in free text. The slug stays fixed at creation, so renaming the template does not break whatever refers to it by slug or id.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * What the template is for, in your own words. Send `null` to clear it.
     *
     * @var string|null
     */
    protected $description;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $defaultLanguage;
    /**
     * What a send does when it asks for a language this template does not carry.
     * 
     *
     * @var string|null
     */
    protected $onMissingLanguage;
    /**
     * Whether a send has to name a language. Turning it on rejects a send that names none instead of serving the default language. A broadcast must select a template language when this is set.
     * 
     *
     * @var bool|null
     */
    protected $languageSourceRequired;
    /**
     * The draft revision you last read (from the template's `revision` field). A stale value returns a conflict so you can reload and retry.
     * 
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * The draft revision you last read (from the template's `revision` field). A stale value returns a conflict so you can reload and retry.
     *
     * @param int|null $revision
     *
     * @return self
     */
    public function setRevision(?int $revision): self
    {
        $this->initialized['revision'] = true;
        $this->revision = $revision;
        return $this;
    }
    /**
     * New display name, in free text. The slug stays fixed at creation, so renaming the template does not break whatever refers to it by slug or id.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * New display name, in free text. The slug stays fixed at creation, so renaming the template does not break whatever refers to it by slug or id.
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
     * What the template is for, in your own words. Send `null` to clear it.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * What the template is for, in your own words. Send `null` to clear it.
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
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @return string|null
     */
    public function getDefaultLanguage(): ?string
    {
        return $this->defaultLanguage;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
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
     * What a send does when it asks for a language this template does not carry.
     * 
     *
     * @return string|null
     */
    public function getOnMissingLanguage(): ?string
    {
        return $this->onMissingLanguage;
    }
    /**
     * What a send does when it asks for a language this template does not carry.
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
     * Whether a send has to name a language. Turning it on rejects a send that names none instead of serving the default language. A broadcast must select a template language when this is set.
     * 
     *
     * @return bool|null
     */
    public function getLanguageSourceRequired(): ?bool
    {
        return $this->languageSourceRequired;
    }
    /**
     * Whether a send has to name a language. Turning it on rejects a send that names none instead of serving the default language. A broadcast must select a template language when this is set.
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
