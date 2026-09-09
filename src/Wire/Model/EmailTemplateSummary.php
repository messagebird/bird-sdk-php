<?php

namespace MessageBird\Wire\Model;

class EmailTemplateSummary
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
     * The workspace that owns the template. Null for a built-in `system` template, which no workspace owns.
     *
     * @var string|null
     */
    protected $workspaceId;
    /**
     * The name you send the template by. You can use either the slug or the id when you send. It never changes after the template is created. A built-in `system` template's slug always starts with `bird_`.
     *
     * @var string|null
     */
    protected $slug;
    /**
     * The template's display name, shown wherever the template is listed. You can change it any time. It defaults to the slug if you do not set one.
     *
     * @var string|null
     */
    protected $name;
    /**
     * What the template is for, in your own words. Null if you have not set one.
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
     * Whether the template is for `transactional` email or `marketing` email.
     *
     * @var string|null
     */
    protected $category;
    /**
     * The authoring format the template is written in, fixed at creation. `html` is finished markup you provide, optionally personalized with Liquid.
     *
     * @var string|null
     */
    protected $source;
    /**
     * The visual theme a built-in template is designed in, or null for a template your workspace authored (which has no theme).
     *
     * @var string|null
     */
    protected $theme;
    /**
     * The current editable draft version. Null for a built-in `system` template, which has no draft.
     *
     * @var string|null
     */
    protected $draftVersionId;
    /**
     * The version a send resolves to, or null if the template has never been published.
     *
     * @var string|null
     */
    protected $liveVersionId;
    /**
     * Deprecated: use `live_version_id` instead, which carries the same value.
     * 
     *
     * @deprecated
     *
     * @var string|null
     */
    protected $publishedVersionId;
    /**
     * The live version's sequential number (1, 2, 3…), the same one version history reports, or null if the template has never been published. A built-in `system` template is permanently published as version 1. A rollback moves it backwards, because it names the version that is live rather than how many exist.
     * 
     *
     * @var int|null
     */
    protected $liveVersionNumber;
    /**
     * The languages this template currently supports for sending, as BCP-47 tags. Empty until the template is published, because sends serve published content. This set may shrink for reasons other than editing, so read it rather than assuming it matches what was published.
     * 
     *
     * @var list<string>|null
     */
    protected $availableLanguages;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $defaultLanguage;
    /**
     * Every language this template has, keyed by language tag, each with its state. Enough to show which templates need attention in a list without a request per row.
     * 
     *
     * @var array<string, EmailTemplateLanguageState>|null
     */
    protected $languages;
    /**
     * When this template was last submitted. Null if it never has been. Only submitting moves this timestamp, so a rollback keeps reporting the last real submit.
     * 
     *
     * @var \DateTime|null
     */
    protected $lastSubmittedAt;
    /**
     * When the template was created. Null for a built-in `system` template.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the template was last modified. Null for a built-in `system` template.
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
     * The workspace that owns the template. Null for a built-in `system` template, which no workspace owns.
     *
     * @return string|null
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }
    /**
     * The workspace that owns the template. Null for a built-in `system` template, which no workspace owns.
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
     * The name you send the template by. You can use either the slug or the id when you send. It never changes after the template is created. A built-in `system` template's slug always starts with `bird_`.
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The name you send the template by. You can use either the slug or the id when you send. It never changes after the template is created. A built-in `system` template's slug always starts with `bird_`.
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
     * The template's display name, shown wherever the template is listed. You can change it any time. It defaults to the slug if you do not set one.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The template's display name, shown wherever the template is listed. You can change it any time. It defaults to the slug if you do not set one.
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
     * What the template is for, in your own words. Null if you have not set one.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * What the template is for, in your own words. Null if you have not set one.
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
     * Whether the template is for `transactional` email or `marketing` email.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Whether the template is for `transactional` email or `marketing` email.
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
     * The authoring format the template is written in, fixed at creation. `html` is finished markup you provide, optionally personalized with Liquid.
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
    /**
     * The authoring format the template is written in, fixed at creation. `html` is finished markup you provide, optionally personalized with Liquid.
     *
     * @param string|null $source
     *
     * @return self
     */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;
        return $this;
    }
    /**
     * The visual theme a built-in template is designed in, or null for a template your workspace authored (which has no theme).
     *
     * @return string|null
     */
    public function getTheme(): ?string
    {
        return $this->theme;
    }
    /**
     * The visual theme a built-in template is designed in, or null for a template your workspace authored (which has no theme).
     *
     * @param string|null $theme
     *
     * @return self
     */
    public function setTheme(?string $theme): self
    {
        $this->initialized['theme'] = true;
        $this->theme = $theme;
        return $this;
    }
    /**
     * The current editable draft version. Null for a built-in `system` template, which has no draft.
     *
     * @return string|null
     */
    public function getDraftVersionId(): ?string
    {
        return $this->draftVersionId;
    }
    /**
     * The current editable draft version. Null for a built-in `system` template, which has no draft.
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
     * The version a send resolves to, or null if the template has never been published.
     *
     * @return string|null
     */
    public function getLiveVersionId(): ?string
    {
        return $this->liveVersionId;
    }
    /**
     * The version a send resolves to, or null if the template has never been published.
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
     * Deprecated: use `live_version_id` instead, which carries the same value.
     * 
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
     * Deprecated: use `live_version_id` instead, which carries the same value.
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
     * The live version's sequential number (1, 2, 3…), the same one version history reports, or null if the template has never been published. A built-in `system` template is permanently published as version 1. A rollback moves it backwards, because it names the version that is live rather than how many exist.
     * 
     *
     * @return int|null
     */
    public function getLiveVersionNumber(): ?int
    {
        return $this->liveVersionNumber;
    }
    /**
     * The live version's sequential number (1, 2, 3…), the same one version history reports, or null if the template has never been published. A built-in `system` template is permanently published as version 1. A rollback moves it backwards, because it names the version that is live rather than how many exist.
     *
     * @param int|null $liveVersionNumber
     *
     * @return self
     */
    public function setLiveVersionNumber(?int $liveVersionNumber): self
    {
        $this->initialized['liveVersionNumber'] = true;
        $this->liveVersionNumber = $liveVersionNumber;
        return $this;
    }
    /**
     * The languages this template currently supports for sending, as BCP-47 tags. Empty until the template is published, because sends serve published content. This set may shrink for reasons other than editing, so read it rather than assuming it matches what was published.
     * 
     *
     * @return list<string>|null
     */
    public function getAvailableLanguages(): ?array
    {
        return $this->availableLanguages;
    }
    /**
     * The languages this template currently supports for sending, as BCP-47 tags. Empty until the template is published, because sends serve published content. This set may shrink for reasons other than editing, so read it rather than assuming it matches what was published.
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
     * Every language this template has, keyed by language tag, each with its state. Enough to show which templates need attention in a list without a request per row.
     * 
     *
     * @return array<string, EmailTemplateLanguageState>|null
     */
    public function getLanguages(): ?iterable
    {
        return $this->languages;
    }
    /**
     * Every language this template has, keyed by language tag, each with its state. Enough to show which templates need attention in a list without a request per row.
     *
     * @param array<string, EmailTemplateLanguageState>|null $languages
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
     * When this template was last submitted. Null if it never has been. Only submitting moves this timestamp, so a rollback keeps reporting the last real submit.
     * 
     *
     * @return \DateTime|null
     */
    public function getLastSubmittedAt(): ?\DateTime
    {
        return $this->lastSubmittedAt;
    }
    /**
     * When this template was last submitted. Null if it never has been. Only submitting moves this timestamp, so a rollback keeps reporting the last real submit.
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
     * When the template was created. Null for a built-in `system` template.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the template was created. Null for a built-in `system` template.
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
     * When the template was last modified. Null for a built-in `system` template.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When the template was last modified. Null for a built-in `system` template.
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
