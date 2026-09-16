<?php

namespace MessageBird\Wire\Model;

class SMSTemplateSummary
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
     * The workspace that owns the template. Null for a built-in `system` template.
     *
     * @var string|null
     */
    protected $workspaceId;
    /**
     * The immutable handle used to address and send the template.
     *
     * @var string|null
     */
    protected $slug;
    /**
     * The template's display name.
     *
     * @var string|null
     */
    protected $name;
    /**
     * What the template is for. Null if it has no description.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Whether the template is one of our built-in templates (`system`) or one your workspace created (`workspace`).
     * 
     *
     * @var string|null
     */
    protected $scope;
    /**
     * Where the template stands as a whole. The same five states on every channel.
     * 
     * - `draft`: nothing has ever gone live.
     * - `pending`: nothing is live and at least one language is in review.
     * - `active`: at least one language is live, so something can be sent.
     * - `rejected`: it was reviewed and every language was refused.
     * - `inactive`: nothing is live and nothing is in review, so content was withdrawn or was blocked before anything went live.
     * 
     * A template with one language live is `active` even while another is still
     * drafted or refused. Read `languages` for the state of each language and its
     * reason.
     * 
     * Which values a channel reports follows its review model. A channel whose
     * content a third party reviews uses all five. On email and SMS, where content
     * goes live on publish, a template is `draft`, `active` or `inactive`, and
     * `pending` and `rejected` are reserved for the review stage coming to both, so
     * a template reaching either is not a breaking change.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Why messages use this template. Use `authentication` for one-time codes, `marketing` for promotions, and `transactional` for service messages.
     * 
     *
     * @var string|null
     */
    protected $category;
    /**
     * The permanent editable draft version. Null for a built-in template.
     *
     * @var string|null
     */
    protected $draftVersionId;
    /**
     * The version sends resolve to, or null before first publication.
     *
     * @var string|null
     */
    protected $liveVersionId;
    /**
     * Deprecated. Use `live_version_id`, which carries the same value.
     *
     * @deprecated
     *
     * @var string|null
     */
    protected $publishedVersionId;
    /**
     * Each language and its live or draft state, keyed by canonical BCP-47 tag.
     *
     * @var array<string, SMSTemplateLanguageState>|null
     */
    protected $languages;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $defaultLanguage;
    /**
     * Languages the live version can currently send. Empty before first publication.
     *
     * @var list<string>|null
     */
    protected $availableLanguages;
    /**
     * When the template was last published. Null before first publication and for built-in templates.
     *
     * @var \DateTime|null
     */
    protected $lastSubmittedAt;
    /**
     * When the template was created. Null for built-in templates.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the template was last modified. Null for built-in templates.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
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
     * The workspace that owns the template. Null for a built-in `system` template.
     *
     * @return string|null
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }
    /**
     * The workspace that owns the template. Null for a built-in `system` template.
     *
     * @param string|null $workspaceId
     *
     * @return self
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;
        return $this;
    }
    /**
     * The immutable handle used to address and send the template.
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The immutable handle used to address and send the template.
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
     * The template's display name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The template's display name.
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
     * What the template is for. Null if it has no description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * What the template is for. Null if it has no description.
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
     * Whether the template is one of our built-in templates (`system`) or one your workspace created (`workspace`).
     * 
     *
     * @return string|null
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }
    /**
     * Whether the template is one of our built-in templates (`system`) or one your workspace created (`workspace`).
     *
     * @param string|null $scope
     *
     * @return self
     */
    public function setScope(?string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
    /**
     * Where the template stands as a whole. The same five states on every channel.
     * 
     * - `draft`: nothing has ever gone live.
     * - `pending`: nothing is live and at least one language is in review.
     * - `active`: at least one language is live, so something can be sent.
     * - `rejected`: it was reviewed and every language was refused.
     * - `inactive`: nothing is live and nothing is in review, so content was withdrawn or was blocked before anything went live.
     * 
     * A template with one language live is `active` even while another is still
     * drafted or refused. Read `languages` for the state of each language and its
     * reason.
     * 
     * Which values a channel reports follows its review model. A channel whose
     * content a third party reviews uses all five. On email and SMS, where content
     * goes live on publish, a template is `draft`, `active` or `inactive`, and
     * `pending` and `rejected` are reserved for the review stage coming to both, so
     * a template reaching either is not a breaking change.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Where the template stands as a whole. The same five states on every channel.
    
    - `draft`: nothing has ever gone live.
    - `pending`: nothing is live and at least one language is in review.
    - `active`: at least one language is live, so something can be sent.
    - `rejected`: it was reviewed and every language was refused.
    - `inactive`: nothing is live and nothing is in review, so content was withdrawn or was blocked before anything went live.
    
    A template with one language live is `active` even while another is still
    drafted or refused. Read `languages` for the state of each language and its
    reason.
    
    Which values a channel reports follows its review model. A channel whose
    content a third party reviews uses all five. On email and SMS, where content
    goes live on publish, a template is `draft`, `active` or `inactive`, and
    `pending` and `rejected` are reserved for the review stage coming to both, so
    a template reaching either is not a breaking change.
    
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
     * Why messages use this template. Use `authentication` for one-time codes, `marketing` for promotions, and `transactional` for service messages.
     * 
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Why messages use this template. Use `authentication` for one-time codes, `marketing` for promotions, and `transactional` for service messages.
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
     * The permanent editable draft version. Null for a built-in template.
     *
     * @return string|null
     */
    public function getDraftVersionId(): ?string
    {
        return $this->draftVersionId;
    }
    /**
     * The permanent editable draft version. Null for a built-in template.
     *
     * @param string|null $draftVersionId
     *
     * @return self
     */
    public function setDraftVersionId(?string $draftVersionId): self
    {
        $this->initialized['draftVersionId'] = true;
        $this->draftVersionId = $draftVersionId;
        return $this;
    }
    /**
     * The version sends resolve to, or null before first publication.
     *
     * @return string|null
     */
    public function getLiveVersionId(): ?string
    {
        return $this->liveVersionId;
    }
    /**
     * The version sends resolve to, or null before first publication.
     *
     * @param string|null $liveVersionId
     *
     * @return self
     */
    public function setLiveVersionId(?string $liveVersionId): self
    {
        $this->initialized['liveVersionId'] = true;
        $this->liveVersionId = $liveVersionId;
        return $this;
    }
    /**
     * Deprecated. Use `live_version_id`, which carries the same value.
     *
     * @deprecated
     *
     * @return string|null
     */
    public function getPublishedVersionId(): ?string
    {
        return $this->publishedVersionId;
    }
    /**
     * Deprecated. Use `live_version_id`, which carries the same value.
     *
     * @param string|null $publishedVersionId
     *
     * @deprecated
     *
     * @return self
     */
    public function setPublishedVersionId(?string $publishedVersionId): self
    {
        $this->initialized['publishedVersionId'] = true;
        $this->publishedVersionId = $publishedVersionId;
        return $this;
    }
    /**
     * Each language and its live or draft state, keyed by canonical BCP-47 tag.
     *
     * @return array<string, SMSTemplateLanguageState>|null
     */
    public function getLanguages(): ?iterable
    {
        return $this->languages;
    }
    /**
     * Each language and its live or draft state, keyed by canonical BCP-47 tag.
     *
     * @param array<string, SMSTemplateLanguageState>|null $languages
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
     * Languages the live version can currently send. Empty before first publication.
     *
     * @return list<string>|null
     */
    public function getAvailableLanguages(): ?array
    {
        return $this->availableLanguages;
    }
    /**
     * Languages the live version can currently send. Empty before first publication.
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
     * When the template was last published. Null before first publication and for built-in templates.
     *
     * @return \DateTime|null
     */
    public function getLastSubmittedAt(): ?\DateTime
    {
        return $this->lastSubmittedAt;
    }
    /**
     * When the template was last published. Null before first publication and for built-in templates.
     *
     * @param \DateTime|null $lastSubmittedAt
     *
     * @return self
     */
    public function setLastSubmittedAt(?\DateTime $lastSubmittedAt): self
    {
        $this->initialized['lastSubmittedAt'] = true;
        $this->lastSubmittedAt = $lastSubmittedAt;
        return $this;
    }
    /**
     * When the template was created. Null for built-in templates.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the template was created. Null for built-in templates.
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
     * When the template was last modified. Null for built-in templates.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When the template was last modified. Null for built-in templates.
     *
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
