<?php

namespace MessageBird\Wire\Model;

/**
 * The account the copy is created on, plus optional overrides. Everything else is inherited from the source.
 */
class WhatsAppTemplateDuplicate
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
     * The WhatsApp Business Account the copy is created on. A template belongs to one account at Meta. Meta reviews, approves, and sends it under that account. The copy therefore names its account rather than taking the source's. A built-in template's account is not one you can submit against. It must be an account connected to this workspace.
     * 
     *
     * @var string|null
     */
    protected $waba;
    /**
     * The copy's handle. The server assigns one when omitted. A `bird_` slug is rejected, and one already in use is a conflict.
     * 
     *
     * @var string|null
     */
    protected $slug;
    /**
     * The copy's display name. Inherited from the source when omitted.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The languages the copy carries, when it should carry only some of them. Every entry must be a language the source holds. A copy narrows the set it inherits, it never adds to it. Omitted, the copy takes all of the source's languages.
     * 
     *
     * @var list<string>|null
     */
    protected $includeLanguages;
    /**
     * The copy's default language, which must be one of the languages the copy carries. Omitted, the copy keeps the source's default when `include_languages` still carries it. Otherwise it takes the first of the copy's languages sorted by canonical tag, which is the order the copy stores them in, not the order `include_languages` listed them.
     * 
     *
     * @var string|null
     */
    protected $defaultLanguage;
    /**
     * The WhatsApp Business Account the copy is created on. A template belongs to one account at Meta. Meta reviews, approves, and sends it under that account. The copy therefore names its account rather than taking the source's. A built-in template's account is not one you can submit against. It must be an account connected to this workspace.
     * 
     *
     * @return string|null
     */
    public function getWaba(): ?string
    {
        return $this->waba;
    }
    /**
     * The WhatsApp Business Account the copy is created on. A template belongs to one account at Meta. Meta reviews, approves, and sends it under that account. The copy therefore names its account rather than taking the source's. A built-in template's account is not one you can submit against. It must be an account connected to this workspace.
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
     * The copy's handle. The server assigns one when omitted. A `bird_` slug is rejected, and one already in use is a conflict.
     * 
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The copy's handle. The server assigns one when omitted. A `bird_` slug is rejected, and one already in use is a conflict.
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
     * The copy's display name. Inherited from the source when omitted.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The copy's display name. Inherited from the source when omitted.
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
     * The languages the copy carries, when it should carry only some of them. Every entry must be a language the source holds. A copy narrows the set it inherits, it never adds to it. Omitted, the copy takes all of the source's languages.
     * 
     *
     * @return list<string>|null
     */
    public function getIncludeLanguages(): ?array
    {
        return $this->includeLanguages;
    }
    /**
     * The languages the copy carries, when it should carry only some of them. Every entry must be a language the source holds. A copy narrows the set it inherits, it never adds to it. Omitted, the copy takes all of the source's languages.
     *
     * @param list<string>|null $includeLanguages
     *
     * @return self
     */
    public function setIncludeLanguages(?array $includeLanguages): self
    {
        $this->initialized['includeLanguages'] = true;
        $this->includeLanguages = $includeLanguages;
        return $this;
    }
    /**
     * The copy's default language, which must be one of the languages the copy carries. Omitted, the copy keeps the source's default when `include_languages` still carries it. Otherwise it takes the first of the copy's languages sorted by canonical tag, which is the order the copy stores them in, not the order `include_languages` listed them.
     * 
     *
     * @return string|null
     */
    public function getDefaultLanguage(): ?string
    {
        return $this->defaultLanguage;
    }
    /**
     * The copy's default language, which must be one of the languages the copy carries. Omitted, the copy keeps the source's default when `include_languages` still carries it. Otherwise it takes the first of the copy's languages sorted by canonical tag, which is the order the copy stores them in, not the order `include_languages` listed them.
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
}
