<?php

namespace MessageBird\Wire\Model;

class SMSTemplateVersion
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
     * @var string|null
     */
    protected $templateId;
    /**
     * Sequential publication number. Null for the draft; a built-in template reports 1.
     *
     * @var int|null
     */
    protected $versionNumber;
    /**
     * Whether the version is the editable draft or published. Published workspace versions are immutable and remain `published` after a later version goes live. A built-in template's synthetic published version projects the current catalogue entry.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * The version revision. A draft revision advances with each metadata or content change. Published workspace versions are frozen; a built-in template's synthetic version reports 0.
     * 
     *
     * @var int|null
     */
    protected $revision;
    /**
     * Variables inferred from the version's text. Every language in a publishable SMS version uses the same set. Built-in templates may apply additional typed constraints described by each variable.
     * 
     *
     * @var list<TemplateVariable>|null
     */
    protected $variables;
    /**
     * Full content for each language, keyed by canonical BCP-47 tag.
     *
     * @var array<string, SMSTemplateVersionLanguage>|null
     */
    protected $languages;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $defaultLanguage;
    /**
     * When the version was created. Null for a built-in template's synthetic version.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the version was published. Null for the draft and for a built-in template's synthetic version.
     *
     * @var \DateTime|null
     */
    protected $publishedAt;
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
     * @return string|null
     */
    public function getTemplateId(): ?string
    {
        return $this->templateId;
    }
    /**
     * @param string|null $templateId
     *
     * @return self
     */
    public function setTemplateId(?string $templateId): self
    {
        $this->initialized['templateId'] = true;
        $this->templateId = $templateId;
        return $this;
    }
    /**
     * Sequential publication number. Null for the draft; a built-in template reports 1.
     *
     * @return int|null
     */
    public function getVersionNumber(): ?int
    {
        return $this->versionNumber;
    }
    /**
     * Sequential publication number. Null for the draft; a built-in template reports 1.
     *
     * @param int|null $versionNumber
     *
     * @return self
     */
    public function setVersionNumber(?int $versionNumber): self
    {
        $this->initialized['versionNumber'] = true;
        $this->versionNumber = $versionNumber;
        return $this;
    }
    /**
     * Whether the version is the editable draft or published. Published workspace versions are immutable and remain `published` after a later version goes live. A built-in template's synthetic published version projects the current catalogue entry.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Whether the version is the editable draft or published. Published workspace versions are immutable and remain `published` after a later version goes live. A built-in template's synthetic published version projects the current catalogue entry.
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * The version revision. A draft revision advances with each metadata or content change. Published workspace versions are frozen; a built-in template's synthetic version reports 0.
     * 
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * The version revision. A draft revision advances with each metadata or content change. Published workspace versions are frozen; a built-in template's synthetic version reports 0.
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
     * Variables inferred from the version's text. Every language in a publishable SMS version uses the same set. Built-in templates may apply additional typed constraints described by each variable.
     * 
     *
     * @return list<TemplateVariable>|null
     */
    public function getVariables(): ?array
    {
        return $this->variables;
    }
    /**
     * Variables inferred from the version's text. Every language in a publishable SMS version uses the same set. Built-in templates may apply additional typed constraints described by each variable.
     *
     * @param list<TemplateVariable>|null $variables
     *
     * @return self
     */
    public function setVariables(?array $variables): self
    {
        $this->initialized['variables'] = true;
        $this->variables = $variables;
        return $this;
    }
    /**
     * Full content for each language, keyed by canonical BCP-47 tag.
     *
     * @return array<string, SMSTemplateVersionLanguage>|null
     */
    public function getLanguages(): ?iterable
    {
        return $this->languages;
    }
    /**
     * Full content for each language, keyed by canonical BCP-47 tag.
     *
     * @param array<string, SMSTemplateVersionLanguage>|null $languages
     *
     * @return self
     */
    public function setLanguages(?iterable $languages): self
    {
        $this->initialized['languages'] = true;
        $this->languages = $languages;
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
     * When the version was created. Null for a built-in template's synthetic version.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the version was created. Null for a built-in template's synthetic version.
     *
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * When the version was published. Null for the draft and for a built-in template's synthetic version.
     *
     * @return \DateTime|null
     */
    public function getPublishedAt(): ?\DateTime
    {
        return $this->publishedAt;
    }
    /**
     * When the version was published. Null for the draft and for a built-in template's synthetic version.
     *
     * @param \DateTime|null $publishedAt
     *
     * @return self
     */
    public function setPublishedAt(?\DateTime $publishedAt): self
    {
        $this->initialized['publishedAt'] = true;
        $this->publishedAt = $publishedAt;
        return $this;
    }
}
