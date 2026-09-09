<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplate
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
     * The template's handle, editable before the first submission. Address it by this handle, and reference it when sending. Handles beginning with `bird_` are reserved for our built-in templates.
     * 
     *
     * @var string|null
     */
    protected $slug;
    /**
     * Whether the slug can still be changed. False after the first submission and for built-in templates.
     *
     * @var bool|null
     */
    protected $slugEditable;
    /**
     * A display name for the template. Nothing resolves through it, so it is safe to show wherever a human reads the template.
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
     *
     * @var string|null
     */
    protected $scope;
    /**
     * The WhatsApp Business Account that holds this template's languages at Meta. Absent on a built-in template: those live on a WABA that Bird manages centrally rather than on your account, so it is not yours to reconcile against and is not disclosed.
     * 
     *
     * @var string|null
     */
    protected $waba;
    /**
     * Meta's content classification for a template.
     * 
     * - `authentication`: delivers one-time passcodes.
     * - `utility`: delivers transaction-triggered updates (receipts, order status).
     * - `marketing`: carries promotional content.
     * 
     * The category determines the sender number and price. This is an open enum.
     * Accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $category;
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
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $defaultLanguage;
    /**
     * What a send does when the language it asks for has no approved copy. Defaults to `fail` on WhatsApp, because every language is separately approved and separately priced: falling back silently would send content the recipient did not expect at a rate the sender did not choose.
     * 
     *
     * @var string|null
     */
    protected $onMissingLanguage;
    /**
     * When true, a send must name a language explicitly rather than letting the template resolve one.
     * 
     *
     * @var bool|null
     */
    protected $languageSourceRequired;
    /**
     * The languages a send can resolve right now: approved and not held back by Meta. It shrinks for reasons you did not cause: Meta pauses, disables, archives or limits a language and it leaves the set with nobody having edited anything. Read `languages` to see which languages exist and why one is missing.
     * 
     *
     * @var list<string>|null
     */
    protected $availableLanguages;
    /**
     * Where each of the template's languages stands, keyed by BCP-47 language tag. This is the summary of the version currently in service, so a template reading `active` can still hold a rejected or paused language: the aggregate says something is sendable, and this says which. Content is not here; it lives under a version.
     * 
     *
     * @var array<string, WhatsAppTemplateLanguageState>|null
     */
    protected $languages;
    /**
     * The open draft, or null when nobody is editing. Non-null is the answer to whether this template has unsubmitted work: a draft exists only because someone opened one.
     * 
     *
     * @var string|null
     */
    protected $draftVersionId;
    /**
     * The version Meta is serving. A version goes live as a unit the moment any of its languages is approved, superseding the one before it. Null until a first approval.
     * 
     *
     * @var string|null
     */
    protected $liveVersionId;
    /**
     * A submitted version still awaiting verdicts: what to poll. It stays set while any language is unresolved, including after a sibling's approval took the version live. Null when nothing is outstanding.
     * 
     *
     * @var string|null
     */
    protected $pendingVersionId;
    /**
     * When this template was last submitted. Null for a pre-approved built-in template.
     * 
     *
     * @var \DateTime|null
     */
    protected $lastSubmittedAt;
    /**
     * When the template was created. Null for a built-in template, which Bird ships rather than stores.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the template was last modified. Null for a built-in template, which Bird ships rather than stores.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * What to do next with this template, given the state it is in. Each entry names one
     * action and says why it is worth taking, so you can act on this response without
     * working out the order yourself. Present on reads that compute it: an empty list
     * means there is nothing to do, and the field is absent entirely on responses that
     * do not report next actions.
     * 
     * A `draft` template routes to opening its draft, a `pending` one to the version
     * under review, and a `rejected` or `inactive` one to a fresh draft. The template's
     * `status` is the aggregate over its languages, so an entry may send you to the
     * version to see where each language actually stands.
     * 
     *
     * @var list<NextAction>|null
     */
    protected $next;
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
     * The template's handle, editable before the first submission. Address it by this handle, and reference it when sending. Handles beginning with `bird_` are reserved for our built-in templates.
     * 
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The template's handle, editable before the first submission. Address it by this handle, and reference it when sending. Handles beginning with `bird_` are reserved for our built-in templates.
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
     * Whether the slug can still be changed. False after the first submission and for built-in templates.
     *
     * @return bool|null
     */
    public function getSlugEditable(): ?bool
    {
        return $this->slugEditable;
    }
    /**
     * Whether the slug can still be changed. False after the first submission and for built-in templates.
     *
     * @param bool|null $slugEditable
     *
     * @return self
     */
    public function setSlugEditable(?bool $slugEditable): self
    {
        $this->initialized['slugEditable'] = true;
        $this->slugEditable = $slugEditable;
        return $this;
    }
    /**
     * A display name for the template. Nothing resolves through it, so it is safe to show wherever a human reads the template.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * A display name for the template. Nothing resolves through it, so it is safe to show wherever a human reads the template.
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
     * The WhatsApp Business Account that holds this template's languages at Meta. Absent on a built-in template: those live on a WABA that Bird manages centrally rather than on your account, so it is not yours to reconcile against and is not disclosed.
     * 
     *
     * @return string|null
     */
    public function getWaba(): ?string
    {
        return $this->waba;
    }
    /**
     * The WhatsApp Business Account that holds this template's languages at Meta. Absent on a built-in template: those live on a WABA that Bird manages centrally rather than on your account, so it is not yours to reconcile against and is not disclosed.
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
     * Meta's content classification for a template.
     * 
     * - `authentication`: delivers one-time passcodes.
     * - `utility`: delivers transaction-triggered updates (receipts, order status).
     * - `marketing`: carries promotional content.
     * 
     * The category determines the sender number and price. This is an open enum.
     * Accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
    * Meta's content classification for a template.
    
    - `authentication`: delivers one-time passcodes.
    - `utility`: delivers transaction-triggered updates (receipts, order status).
    - `marketing`: carries promotional content.
    
    The category determines the sender number and price. This is an open enum.
    Accept unrecognized values.
    
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
     * What a send does when the language it asks for has no approved copy. Defaults to `fail` on WhatsApp, because every language is separately approved and separately priced: falling back silently would send content the recipient did not expect at a rate the sender did not choose.
     * 
     *
     * @return string|null
     */
    public function getOnMissingLanguage(): ?string
    {
        return $this->onMissingLanguage;
    }
    /**
     * What a send does when the language it asks for has no approved copy. Defaults to `fail` on WhatsApp, because every language is separately approved and separately priced: falling back silently would send content the recipient did not expect at a rate the sender did not choose.
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
     * When true, a send must name a language explicitly rather than letting the template resolve one.
     * 
     *
     * @return bool|null
     */
    public function getLanguageSourceRequired(): ?bool
    {
        return $this->languageSourceRequired;
    }
    /**
     * When true, a send must name a language explicitly rather than letting the template resolve one.
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
     * The languages a send can resolve right now: approved and not held back by Meta. It shrinks for reasons you did not cause: Meta pauses, disables, archives or limits a language and it leaves the set with nobody having edited anything. Read `languages` to see which languages exist and why one is missing.
     * 
     *
     * @return list<string>|null
     */
    public function getAvailableLanguages(): ?array
    {
        return $this->availableLanguages;
    }
    /**
     * The languages a send can resolve right now: approved and not held back by Meta. It shrinks for reasons you did not cause: Meta pauses, disables, archives or limits a language and it leaves the set with nobody having edited anything. Read `languages` to see which languages exist and why one is missing.
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
     * Where each of the template's languages stands, keyed by BCP-47 language tag. This is the summary of the version currently in service, so a template reading `active` can still hold a rejected or paused language: the aggregate says something is sendable, and this says which. Content is not here; it lives under a version.
     * 
     *
     * @return array<string, WhatsAppTemplateLanguageState>|null
     */
    public function getLanguages(): ?iterable
    {
        return $this->languages;
    }
    /**
     * Where each of the template's languages stands, keyed by BCP-47 language tag. This is the summary of the version currently in service, so a template reading `active` can still hold a rejected or paused language: the aggregate says something is sendable, and this says which. Content is not here; it lives under a version.
     *
     * @param array<string, WhatsAppTemplateLanguageState>|null $languages
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
     * The open draft, or null when nobody is editing. Non-null is the answer to whether this template has unsubmitted work: a draft exists only because someone opened one.
     * 
     *
     * @return string|null
     */
    public function getDraftVersionId(): ?string
    {
        return $this->draftVersionId;
    }
    /**
     * The open draft, or null when nobody is editing. Non-null is the answer to whether this template has unsubmitted work: a draft exists only because someone opened one.
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
     * The version Meta is serving. A version goes live as a unit the moment any of its languages is approved, superseding the one before it. Null until a first approval.
     * 
     *
     * @return string|null
     */
    public function getLiveVersionId(): ?string
    {
        return $this->liveVersionId;
    }
    /**
     * The version Meta is serving. A version goes live as a unit the moment any of its languages is approved, superseding the one before it. Null until a first approval.
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
     * A submitted version still awaiting verdicts: what to poll. It stays set while any language is unresolved, including after a sibling's approval took the version live. Null when nothing is outstanding.
     * 
     *
     * @return string|null
     */
    public function getPendingVersionId(): ?string
    {
        return $this->pendingVersionId;
    }
    /**
     * A submitted version still awaiting verdicts: what to poll. It stays set while any language is unresolved, including after a sibling's approval took the version live. Null when nothing is outstanding.
     *
     * @param string|null $pendingVersionId
     *
     * @return self
     */
    public function setPendingVersionId(?string $pendingVersionId): self
    {
        $this->initialized['pendingVersionId'] = true;
        $this->pendingVersionId = $pendingVersionId;
        return $this;
    }
    /**
     * When this template was last submitted. Null for a pre-approved built-in template.
     * 
     *
     * @return \DateTime|null
     */
    public function getLastSubmittedAt(): ?\DateTime
    {
        return $this->lastSubmittedAt;
    }
    /**
     * When this template was last submitted. Null for a pre-approved built-in template.
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
     * When the template was created. Null for a built-in template, which Bird ships rather than stores.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the template was created. Null for a built-in template, which Bird ships rather than stores.
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
     * When the template was last modified. Null for a built-in template, which Bird ships rather than stores.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When the template was last modified. Null for a built-in template, which Bird ships rather than stores.
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
    /**
     * What to do next with this template, given the state it is in. Each entry names one
     * action and says why it is worth taking, so you can act on this response without
     * working out the order yourself. Present on reads that compute it: an empty list
     * means there is nothing to do, and the field is absent entirely on responses that
     * do not report next actions.
     * 
     * A `draft` template routes to opening its draft, a `pending` one to the version
     * under review, and a `rejected` or `inactive` one to a fresh draft. The template's
     * `status` is the aggregate over its languages, so an entry may send you to the
     * version to see where each language actually stands.
     * 
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
    * What to do next with this template, given the state it is in. Each entry names one
    action and says why it is worth taking, so you can act on this response without
    working out the order yourself. Present on reads that compute it: an empty list
    means there is nothing to do, and the field is absent entirely on responses that
    do not report next actions.
    
    A `draft` template routes to opening its draft, a `pending` one to the version
    under review, and a `rejected` or `inactive` one to a fresh draft. The template's
    `status` is the aggregate over its languages, so an entry may send you to the
    version to see where each language actually stands.
    
    *
    * @param list<NextAction>|null $next
    *
    * @return self
    */
    public function setNext(?array $next): self
    {
        $this->initialized['next'] = true;
        $this->next = $next;
        return $this;
    }
}
