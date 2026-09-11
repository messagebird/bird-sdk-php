<?php

namespace MessageBird\Wire\Model;

class EmailTemplate
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
     * The draft's revision counter. Send it back on the next update to detect concurrent edits. Null for a built-in `system` template, which is unversioned.
     *
     * @var int|null
     */
    protected $revision;
    /**
     * Every language this template has, keyed by language tag in BCP-47 form
     * such as `en` or `pt-BR`, each with its state. One read tells you which
     * languages are live and which have unpublished edits, without fetching any
     * content.
     * 
     * Content is not here: read a version's languages for that, one language at
     * a time.
     * 
     *
     * @var array<string, EmailTemplateLanguageState>|null
     */
    protected $languages;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $defaultLanguage;
    /**
     * The languages this template currently supports for sending, as BCP-47 tags. Empty until the template is published, because sends serve published content. The set may shrink for reasons other than editing, so read it rather than assuming it matches what was published. A built-in `system` template has no publish step and always reports its one language.
     * 
     *
     * @var list<string>|null
     */
    protected $availableLanguages;
    /**
     * What a send does when it asks for a language this template does not carry. Defaults to `fallback` on email.
     * 
     *
     * @var string|null
     */
    protected $onMissingLanguage;
    /**
     * Whether a send has to name a language. When true, a send that names none is rejected instead of being served the default language, and the template cannot be used for a broadcast, which has no way to name one.
     * 
     *
     * @var bool|null
     */
    protected $languageSourceRequired;
    /**
     * When this template was last submitted. Null if it never has been. Submitting is the only thing that moves this timestamp: rolling back changes which version is live without counting as a submit, so this keeps reporting the last real submit. Read it alongside `languages`, which says where each language stands.
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
     * The draft's revision counter. Send it back on the next update to detect concurrent edits. Null for a built-in `system` template, which is unversioned.
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * The draft's revision counter. Send it back on the next update to detect concurrent edits. Null for a built-in `system` template, which is unversioned.
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
     * Every language this template has, keyed by language tag in BCP-47 form
     * such as `en` or `pt-BR`, each with its state. One read tells you which
     * languages are live and which have unpublished edits, without fetching any
     * content.
     * 
     * Content is not here: read a version's languages for that, one language at
     * a time.
     * 
     *
     * @return array<string, EmailTemplateLanguageState>|null
     */
    public function getLanguages(): ?iterable
    {
        return $this->languages;
    }
    /**
    * Every language this template has, keyed by language tag in BCP-47 form
    such as `en` or `pt-BR`, each with its state. One read tells you which
    languages are live and which have unpublished edits, without fetching any
    content.
    
    Content is not here: read a version's languages for that, one language at
    a time.
    
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
     * The languages this template currently supports for sending, as BCP-47 tags. Empty until the template is published, because sends serve published content. The set may shrink for reasons other than editing, so read it rather than assuming it matches what was published. A built-in `system` template has no publish step and always reports its one language.
     * 
     *
     * @return list<string>|null
     */
    public function getAvailableLanguages(): ?array
    {
        return $this->availableLanguages;
    }
    /**
     * The languages this template currently supports for sending, as BCP-47 tags. Empty until the template is published, because sends serve published content. The set may shrink for reasons other than editing, so read it rather than assuming it matches what was published. A built-in `system` template has no publish step and always reports its one language.
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
     * What a send does when it asks for a language this template does not carry. Defaults to `fallback` on email.
     * 
     *
     * @return string|null
     */
    public function getOnMissingLanguage(): ?string
    {
        return $this->onMissingLanguage;
    }
    /**
     * What a send does when it asks for a language this template does not carry. Defaults to `fallback` on email.
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
     * Whether a send has to name a language. When true, a send that names none is rejected instead of being served the default language, and the template cannot be used for a broadcast, which has no way to name one.
     * 
     *
     * @return bool|null
     */
    public function getLanguageSourceRequired(): ?bool
    {
        return $this->languageSourceRequired;
    }
    /**
     * Whether a send has to name a language. When true, a send that names none is rejected instead of being served the default language, and the template cannot be used for a broadcast, which has no way to name one.
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
     * When this template was last submitted. Null if it never has been. Submitting is the only thing that moves this timestamp: rolling back changes which version is live without counting as a submit, so this keeps reporting the last real submit. Read it alongside `languages`, which says where each language stands.
     * 
     *
     * @return \DateTime|null
     */
    public function getLastSubmittedAt(): ?\DateTime
    {
        return $this->lastSubmittedAt;
    }
    /**
     * When this template was last submitted. Null if it never has been. Submitting is the only thing that moves this timestamp: rolling back changes which version is live without counting as a submit, so this keeps reporting the last real submit. Read it alongside `languages`, which says where each language stands.
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
