<?php

namespace MessageBird\Wire\Model;

class SMSTemplate
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
     * The template's permanent handle. Pass it (or the id) as the template reference when sending. Handles beginning with `bird_` are reserved for Bird's built-in templates.
     * 
     *
     * @var string|null
     */
    protected $slug;
    /**
     * The template's display name, shown wherever the template is listed. Nothing resolves through it, so it is safe to show wherever a human reads the template.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * What the template is for. Null when unset.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Whether the template is one of our built-in templates (`system`) or one your workspace created (`workspace`).
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
     * This is a summary. It answers whether the template is usable at all, not
     * whether every language is: a template with one language live is `active` even
     * while another is still drafted or refused. Read `languages` for per-language
     * state, which is what says which language is where and why.
     * 
     * Which of the five a template can reach follows its channel's review model. A
     * channel whose content a third party reviews reaches all five; one whose
     * content goes live on publish moves between `draft`, `active` and `inactive`.
     * 
     * Open enum: treat a value you do not recognize as a new one rather than as
     * an error.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Content classification applied to messages sent from this template.
     *
     * @var string|null
     */
    protected $category;
    /**
     * The template body in its default language, shown for preview. Variable placeholders appear inline (for example `{{ code }}`). Name a `language` on the send to have another one served.
     * 
     *
     * @var string|null
     */
    protected $body;
    /**
     * The typed slots this template fills in from the values you supply in `parameters` when sending. Every language of a template declares the same slots, so this list holds for whichever one a send resolves to.
     * 
     *
     * @var list<TemplateVariable>|null
     */
    protected $variables;
    /**
     * The language a send uses when it names none, and the last resort when `on_missing_language` is `fallback` and the language asked for is not available.
     * 
     *
     * @var string|null
     */
    protected $defaultLanguage;
    /**
     * The languages a send can resolve right now, as BCP-47 tags. The set may shrink for reasons other than editing, so read it rather than assuming it matches what you last saw.
     * 
     *
     * @var list<string>|null
     */
    protected $availableLanguages;
    /**
     * Where each of the template's languages stands, keyed by BCP-47 language tag. Content is not here: `body` previews the default language, and a send resolves the one it needs.
     * 
     *
     * @var array<string, SMSTemplateLanguageState>|null
     */
    protected $languages;
    /**
     * What a send does when it asks for a language this template does not carry. Defaults to `fallback` on SMS.
     * 
     *
     * @var string|null
     */
    protected $onMissingLanguage;
    /**
     * Whether a send has to name a language. When true, a send that names none is rejected instead of being served the default language.
     * 
     *
     * @var bool|null
     */
    protected $languageSourceRequired;
    /**
     * The current editable draft version, or null for a built-in `system` template, which has no draft.
     * 
     *
     * @var string|null
     */
    protected $draftVersionId;
    /**
     * The version a send resolves to, or null for a built-in `system` template, which Bird ships ready to send rather than versioning.
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
     * The draft's revision counter. Null for a built-in `system` template, which is unversioned.
     * 
     *
     * @var int|null
     */
    protected $revision;
    /**
     * When this template was last submitted. Null for a built-in `system` template: Bird ships it ready to send, so there is nothing submitted to date.
     * 
     *
     * @var \DateTime|null
     */
    protected $lastSubmittedAt;
    /**
     * When the template was created. Null for a built-in `system` template, which Bird ships rather than stores.
     * 
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the template was last modified. Null for a built-in `system` template, which Bird ships rather than stores.
     * 
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
     * The template's permanent handle. Pass it (or the id) as the template reference when sending. Handles beginning with `bird_` are reserved for Bird's built-in templates.
     * 
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The template's permanent handle. Pass it (or the id) as the template reference when sending. Handles beginning with `bird_` are reserved for Bird's built-in templates.
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
     * The template's display name, shown wherever the template is listed. Nothing resolves through it, so it is safe to show wherever a human reads the template.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The template's display name, shown wherever the template is listed. Nothing resolves through it, so it is safe to show wherever a human reads the template.
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
     * What the template is for. Null when unset.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * What the template is for. Null when unset.
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
     * This is a summary. It answers whether the template is usable at all, not
     * whether every language is: a template with one language live is `active` even
     * while another is still drafted or refused. Read `languages` for per-language
     * state, which is what says which language is where and why.
     * 
     * Which of the five a template can reach follows its channel's review model. A
     * channel whose content a third party reviews reaches all five; one whose
     * content goes live on publish moves between `draft`, `active` and `inactive`.
     * 
     * Open enum: treat a value you do not recognize as a new one rather than as
     * an error.
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
    
    This is a summary. It answers whether the template is usable at all, not
    whether every language is: a template with one language live is `active` even
    while another is still drafted or refused. Read `languages` for per-language
    state, which is what says which language is where and why.
    
    Which of the five a template can reach follows its channel's review model. A
    channel whose content a third party reviews reaches all five; one whose
    content goes live on publish moves between `draft`, `active` and `inactive`.
    
    Open enum: treat a value you do not recognize as a new one rather than as
    an error.
    
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
     * The template body in its default language, shown for preview. Variable placeholders appear inline (for example `{{ code }}`). Name a `language` on the send to have another one served.
     * 
     *
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }
    /**
     * The template body in its default language, shown for preview. Variable placeholders appear inline (for example `{{ code }}`). Name a `language` on the send to have another one served.
     *
     * @param string|null $body
     *
     * @return self
     */
    public function setBody(?string $body): self
    {
        $this->initialized['body'] = true;
        $this->body = $body;
        return $this;
    }
    /**
     * The typed slots this template fills in from the values you supply in `parameters` when sending. Every language of a template declares the same slots, so this list holds for whichever one a send resolves to.
     * 
     *
     * @return list<TemplateVariable>|null
     */
    public function getVariables(): ?array
    {
        return $this->variables;
    }
    /**
     * The typed slots this template fills in from the values you supply in `parameters` when sending. Every language of a template declares the same slots, so this list holds for whichever one a send resolves to.
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
     * The language a send uses when it names none, and the last resort when `on_missing_language` is `fallback` and the language asked for is not available.
     * 
     *
     * @return string|null
     */
    public function getDefaultLanguage(): ?string
    {
        return $this->defaultLanguage;
    }
    /**
     * The language a send uses when it names none, and the last resort when `on_missing_language` is `fallback` and the language asked for is not available.
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
     * The languages a send can resolve right now, as BCP-47 tags. The set may shrink for reasons other than editing, so read it rather than assuming it matches what you last saw.
     * 
     *
     * @return list<string>|null
     */
    public function getAvailableLanguages(): ?array
    {
        return $this->availableLanguages;
    }
    /**
     * The languages a send can resolve right now, as BCP-47 tags. The set may shrink for reasons other than editing, so read it rather than assuming it matches what you last saw.
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
     * Where each of the template's languages stands, keyed by BCP-47 language tag. Content is not here: `body` previews the default language, and a send resolves the one it needs.
     * 
     *
     * @return array<string, SMSTemplateLanguageState>|null
     */
    public function getLanguages(): ?iterable
    {
        return $this->languages;
    }
    /**
     * Where each of the template's languages stands, keyed by BCP-47 language tag. Content is not here: `body` previews the default language, and a send resolves the one it needs.
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
     * What a send does when it asks for a language this template does not carry. Defaults to `fallback` on SMS.
     * 
     *
     * @return string|null
     */
    public function getOnMissingLanguage(): ?string
    {
        return $this->onMissingLanguage;
    }
    /**
     * What a send does when it asks for a language this template does not carry. Defaults to `fallback` on SMS.
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
     * Whether a send has to name a language. When true, a send that names none is rejected instead of being served the default language.
     * 
     *
     * @return bool|null
     */
    public function getLanguageSourceRequired(): ?bool
    {
        return $this->languageSourceRequired;
    }
    /**
     * Whether a send has to name a language. When true, a send that names none is rejected instead of being served the default language.
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
     * The current editable draft version, or null for a built-in `system` template, which has no draft.
     * 
     *
     * @return string|null
     */
    public function getDraftVersionId(): ?string
    {
        return $this->draftVersionId;
    }
    /**
     * The current editable draft version, or null for a built-in `system` template, which has no draft.
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
     * The version a send resolves to, or null for a built-in `system` template, which Bird ships ready to send rather than versioning.
     * 
     *
     * @return string|null
     */
    public function getLiveVersionId(): ?string
    {
        return $this->liveVersionId;
    }
    /**
     * The version a send resolves to, or null for a built-in `system` template, which Bird ships ready to send rather than versioning.
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
     * The draft's revision counter. Null for a built-in `system` template, which is unversioned.
     * 
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * The draft's revision counter. Null for a built-in `system` template, which is unversioned.
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
     * When this template was last submitted. Null for a built-in `system` template: Bird ships it ready to send, so there is nothing submitted to date.
     * 
     *
     * @return \DateTime|null
     */
    public function getLastSubmittedAt(): ?\DateTime
    {
        return $this->lastSubmittedAt;
    }
    /**
     * When this template was last submitted. Null for a built-in `system` template: Bird ships it ready to send, so there is nothing submitted to date.
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
     * When the template was created. Null for a built-in `system` template, which Bird ships rather than stores.
     * 
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the template was created. Null for a built-in `system` template, which Bird ships rather than stores.
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
     * When the template was last modified. Null for a built-in `system` template, which Bird ships rather than stores.
     * 
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When the template was last modified. Null for a built-in `system` template, which Bird ships rather than stores.
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
