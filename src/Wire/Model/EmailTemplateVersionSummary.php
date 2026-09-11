<?php

namespace MessageBird\Wire\Model;

class EmailTemplateVersionSummary
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
     * Sequential published-version number (1, 2, 3…). Null while the version is a draft.
     *
     * @var int|null
     */
    protected $versionNumber;
    /**
     * Whether this version is still being edited or has been published. It records
     * the version's publication history: a version that a later one replaced stays
     * `published`. The template's `live_version_id` names the version a send
     * resolves to now.
     * 
     * `archived` is reserved and no version carries it yet. Version retirement will
     * produce it, so it is declared here ahead of that feature: a client written
     * against this list today keeps working when the first archived version arrives,
     * rather than the value's arrival being a breaking change.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * The version's revision counter.
     *
     * @var int|null
     */
    protected $revision;
    /**
     * Every variable this version's content uses. You supply a value for each of them when you send.
     * 
     * The list combines all the languages, because languages do not have to use the same variables: if the English body uses `discount_code` and the French body uses `shipping_date`, both appear here. Send a value for every variable in the list rather than only the ones you expect the language you are sending to use. A language that does not use a variable ignores the value you sent for it, and a variable the sent language does use but you left out is rejected with a `422` naming it.
     * 
     * Variables under the reserved `bird.` namespace are not listed here. We fill those in ourselves from the recipient's contact record.
     * 
     *
     * @var list<TemplateVariable>|null
     */
    protected $variables;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $defaultLanguage;
    /**
     * The languages this version holds, as BCP-47 tags: the keys its `languages` map would return, without the content itself.
     * 
     *
     * @var list<string>|null
     */
    protected $availableLanguages;
    /**
     * When this version was created.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When this version was published, or null if it has not been published.
     *
     * @var \DateTime|null
     */
    protected $publishedAt;
    /**
     * Who last saved this version: a member's own session, an OAuth token delegated from one, or a workspace API key. Publishing freezes a version, so on a published one this is whoever published it. Null means no actor is on record: a built-in template, which is code-defined rather than stored, or a version last saved by an API key before this field existed. Every other version has one, even when its display_name could not be resolved (a member whose account is gone, say).
     * 
     *
     * @var EmailTemplateVersionSummaryUpdatedBy|null
     */
    protected $updatedBy;
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
     * Sequential published-version number (1, 2, 3…). Null while the version is a draft.
     *
     * @return int|null
     */
    public function getVersionNumber(): ?int
    {
        return $this->versionNumber;
    }
    /**
     * Sequential published-version number (1, 2, 3…). Null while the version is a draft.
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
     * Whether this version is still being edited or has been published. It records
     * the version's publication history: a version that a later one replaced stays
     * `published`. The template's `live_version_id` names the version a send
     * resolves to now.
     * 
     * `archived` is reserved and no version carries it yet. Version retirement will
     * produce it, so it is declared here ahead of that feature: a client written
     * against this list today keeps working when the first archived version arrives,
     * rather than the value's arrival being a breaking change.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Whether this version is still being edited or has been published. It records
    the version's publication history: a version that a later one replaced stays
    `published`. The template's `live_version_id` names the version a send
    resolves to now.
    
    `archived` is reserved and no version carries it yet. Version retirement will
    produce it, so it is declared here ahead of that feature: a client written
    against this list today keeps working when the first archived version arrives,
    rather than the value's arrival being a breaking change.
    
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
     * The version's revision counter.
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * The version's revision counter.
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
     * Every variable this version's content uses. You supply a value for each of them when you send.
     * 
     * The list combines all the languages, because languages do not have to use the same variables: if the English body uses `discount_code` and the French body uses `shipping_date`, both appear here. Send a value for every variable in the list rather than only the ones you expect the language you are sending to use. A language that does not use a variable ignores the value you sent for it, and a variable the sent language does use but you left out is rejected with a `422` naming it.
     * 
     * Variables under the reserved `bird.` namespace are not listed here. We fill those in ourselves from the recipient's contact record.
     * 
     *
     * @return list<TemplateVariable>|null
     */
    public function getVariables(): ?array
    {
        return $this->variables;
    }
    /**
    * Every variable this version's content uses. You supply a value for each of them when you send.
    
    The list combines all the languages, because languages do not have to use the same variables: if the English body uses `discount_code` and the French body uses `shipping_date`, both appear here. Send a value for every variable in the list rather than only the ones you expect the language you are sending to use. A language that does not use a variable ignores the value you sent for it, and a variable the sent language does use but you left out is rejected with a `422` naming it.
    
    Variables under the reserved `bird.` namespace are not listed here. We fill those in ourselves from the recipient's contact record.
    
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
     * The languages this version holds, as BCP-47 tags: the keys its `languages` map would return, without the content itself.
     * 
     *
     * @return list<string>|null
     */
    public function getAvailableLanguages(): ?array
    {
        return $this->availableLanguages;
    }
    /**
     * The languages this version holds, as BCP-47 tags: the keys its `languages` map would return, without the content itself.
     *
     * @param list<string>|null $availableLanguages
     *
     * @return self
     */
    public function setAvailableLanguages(?array $availableLanguages): self
    {
        $this->initialized['availableLanguages'] = true;
        $this->availableLanguages = $availableLanguages;
        return $this;
    }
    /**
     * When this version was created.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When this version was created.
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
     * When this version was published, or null if it has not been published.
     *
     * @return \DateTime|null
     */
    public function getPublishedAt(): ?\DateTime
    {
        return $this->publishedAt;
    }
    /**
     * When this version was published, or null if it has not been published.
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
    /**
     * Who last saved this version: a member's own session, an OAuth token delegated from one, or a workspace API key. Publishing freezes a version, so on a published one this is whoever published it. Null means no actor is on record: a built-in template, which is code-defined rather than stored, or a version last saved by an API key before this field existed. Every other version has one, even when its display_name could not be resolved (a member whose account is gone, say).
     * 
     *
     * @return EmailTemplateVersionSummaryUpdatedBy|null
     */
    public function getUpdatedBy(): ?EmailTemplateVersionSummaryUpdatedBy
    {
        return $this->updatedBy;
    }
    /**
     * Who last saved this version: a member's own session, an OAuth token delegated from one, or a workspace API key. Publishing freezes a version, so on a published one this is whoever published it. Null means no actor is on record: a built-in template, which is code-defined rather than stored, or a version last saved by an API key before this field existed. Every other version has one, even when its display_name could not be resolved (a member whose account is gone, say).
     *
     * @param EmailTemplateVersionSummaryUpdatedBy|null $updatedBy
     *
     * @return self
     */
    public function setUpdatedBy(?EmailTemplateVersionSummaryUpdatedBy $updatedBy): self
    {
        $this->initialized['updatedBy'] = true;
        $this->updatedBy = $updatedBy;
        return $this;
    }
}
