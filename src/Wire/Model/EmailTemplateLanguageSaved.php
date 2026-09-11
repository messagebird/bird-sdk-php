<?php

namespace MessageBird\Wire\Model;

class EmailTemplateLanguageSaved
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
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $language;
    /**
     * This language's new revision. Send it back on your next save of this language so a concurrent edit is caught instead of silently overwritten.
     * 
     *
     * @var int|null
     */
    protected $revision;
    /**
     * The draft's new revision. Saving a language moves it, so any template update you make next must send this value instead of the revision you read before the save.
     * 
     *
     * @var int|null
     */
    protected $draftRevision;
    /**
     * A hash over the language's content as saved, prefixed with the algorithm that produced it (`sha256:`), so the algorithm can change without the field becoming ambiguous. It tells you whether a language differs without transferring the content, and is comparable only within one version of this API.
     * 
     *
     * @var string|null
     */
    protected $contentHash;
    /**
     * When this language was saved.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * The template this call addressed, as its id, even when you addressed it by slug. Send it back as `template_ref` on a follow-up call.
     * 
     *
     * @var string|null
     */
    protected $templateRef;
    /**
     * @var string|null
     */
    protected $versionId;
    /**
     * The worst severity across every finding the response was computed from, which
     * is the authoritative reading: a response that caps how many findings it lists
     * still accounts here for the ones it left out. Each response's `compatibility`
     * says which content it covered.
     * 
     * - `problem`: at least one finding is a `problem`.
     * - `warning`: every finding is a `warning`.
     * - `none`: there are no findings.
     * 
     *
     * @var string|null
     */
    protected $compatibilitySeverity;
    /**
     * What to do next with this save. Present on reads that compute it: an empty list means
     * there is nothing to do, and the field is absent entirely on responses that do not
     * report next actions.
     * 
     * A `problem` in `compatibility` routes back to this same write, with the identifiers
     * to address it already on this response; a `warning` says what degrades and leaves
     * the draft as it is.
     * 
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * What the HTML you just saved uses that mail clients remove, ignore, or render inconsistently, in the order the patterns appear. Empty when nothing is worth reporting. Advisory: the language was saved either way, and a finding never refuses a write. Line and column count in the HTML as saved, which the language read returns as `content.html`. A partial update reports on the language in full rather than on the fields it carried, so it reads the same as the read of the same language. At most 200 findings come back, the first 200 in source order; `compatibility_severity` is derived from every finding the HTML produced, including any beyond those 200.
     * 
     *
     * @var list<EmailCompatibilityFinding>|null
     */
    protected $compatibility;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @param string|null $language
     *
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->initialized['language'] = true;
        $this->language = $language;
        return $this;
    }
    /**
     * This language's new revision. Send it back on your next save of this language so a concurrent edit is caught instead of silently overwritten.
     * 
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * This language's new revision. Send it back on your next save of this language so a concurrent edit is caught instead of silently overwritten.
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
     * The draft's new revision. Saving a language moves it, so any template update you make next must send this value instead of the revision you read before the save.
     * 
     *
     * @return int|null
     */
    public function getDraftRevision(): ?int
    {
        return $this->draftRevision;
    }
    /**
     * The draft's new revision. Saving a language moves it, so any template update you make next must send this value instead of the revision you read before the save.
     *
     * @param int|null $draftRevision
     *
     * @return self
     */
    public function setDraftRevision(?int $draftRevision): self
    {
        $this->initialized['draftRevision'] = true;
        $this->draftRevision = $draftRevision;
        return $this;
    }
    /**
     * A hash over the language's content as saved, prefixed with the algorithm that produced it (`sha256:`), so the algorithm can change without the field becoming ambiguous. It tells you whether a language differs without transferring the content, and is comparable only within one version of this API.
     * 
     *
     * @return string|null
     */
    public function getContentHash(): ?string
    {
        return $this->contentHash;
    }
    /**
     * A hash over the language's content as saved, prefixed with the algorithm that produced it (`sha256:`), so the algorithm can change without the field becoming ambiguous. It tells you whether a language differs without transferring the content, and is comparable only within one version of this API.
     *
     * @param string|null $contentHash
     *
     * @return self
     */
    public function setContentHash(?string $contentHash): self
    {
        $this->initialized['contentHash'] = true;
        $this->contentHash = $contentHash;
        return $this;
    }
    /**
     * When this language was saved.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When this language was saved.
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
     * The template this call addressed, as its id, even when you addressed it by slug. Send it back as `template_ref` on a follow-up call.
     * 
     *
     * @return string|null
     */
    public function getTemplateRef(): ?string
    {
        return $this->templateRef;
    }
    /**
     * The template this call addressed, as its id, even when you addressed it by slug. Send it back as `template_ref` on a follow-up call.
     *
     * @param string|null $templateRef
     *
     * @return self
     */
    public function setTemplateRef(?string $templateRef): self
    {
        $this->initialized['templateRef'] = true;
        $this->templateRef = $templateRef;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getVersionId(): ?string
    {
        return $this->versionId;
    }
    /**
     * @param string|null $versionId
     *
     * @return self
     */
    public function setVersionId(?string $versionId): self
    {
        $this->initialized['versionId'] = true;
        $this->versionId = $versionId;
        return $this;
    }
    /**
     * The worst severity across every finding the response was computed from, which
     * is the authoritative reading: a response that caps how many findings it lists
     * still accounts here for the ones it left out. Each response's `compatibility`
     * says which content it covered.
     * 
     * - `problem`: at least one finding is a `problem`.
     * - `warning`: every finding is a `warning`.
     * - `none`: there are no findings.
     * 
     *
     * @return string|null
     */
    public function getCompatibilitySeverity(): ?string
    {
        return $this->compatibilitySeverity;
    }
    /**
    * The worst severity across every finding the response was computed from, which
    is the authoritative reading: a response that caps how many findings it lists
    still accounts here for the ones it left out. Each response's `compatibility`
    says which content it covered.
    
    - `problem`: at least one finding is a `problem`.
    - `warning`: every finding is a `warning`.
    - `none`: there are no findings.
    
    *
    * @param string|null $compatibilitySeverity
    *
    * @return self
    */
    public function setCompatibilitySeverity(?string $compatibilitySeverity): self
    {
        $this->initialized['compatibilitySeverity'] = true;
        $this->compatibilitySeverity = $compatibilitySeverity;
        return $this;
    }
    /**
     * What to do next with this save. Present on reads that compute it: an empty list means
     * there is nothing to do, and the field is absent entirely on responses that do not
     * report next actions.
     * 
     * A `problem` in `compatibility` routes back to this same write, with the identifiers
     * to address it already on this response; a `warning` says what degrades and leaves
     * the draft as it is.
     * 
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
    * What to do next with this save. Present on reads that compute it: an empty list means
    there is nothing to do, and the field is absent entirely on responses that do not
    report next actions.
    
    A `problem` in `compatibility` routes back to this same write, with the identifiers
    to address it already on this response; a `warning` says what degrades and leaves
    the draft as it is.
    
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
    /**
     * What the HTML you just saved uses that mail clients remove, ignore, or render inconsistently, in the order the patterns appear. Empty when nothing is worth reporting. Advisory: the language was saved either way, and a finding never refuses a write. Line and column count in the HTML as saved, which the language read returns as `content.html`. A partial update reports on the language in full rather than on the fields it carried, so it reads the same as the read of the same language. At most 200 findings come back, the first 200 in source order; `compatibility_severity` is derived from every finding the HTML produced, including any beyond those 200.
     * 
     *
     * @return list<EmailCompatibilityFinding>|null
     */
    public function getCompatibility(): ?array
    {
        return $this->compatibility;
    }
    /**
     * What the HTML you just saved uses that mail clients remove, ignore, or render inconsistently, in the order the patterns appear. Empty when nothing is worth reporting. Advisory: the language was saved either way, and a finding never refuses a write. Line and column count in the HTML as saved, which the language read returns as `content.html`. A partial update reports on the language in full rather than on the fields it carried, so it reads the same as the read of the same language. At most 200 findings come back, the first 200 in source order; `compatibility_severity` is derived from every finding the HTML produced, including any beyond those 200.
     *
     * @param list<EmailCompatibilityFinding>|null $compatibility
     *
     * @return self
     */
    public function setCompatibility(?array $compatibility): self
    {
        $this->initialized['compatibility'] = true;
        $this->compatibility = $compatibility;
        return $this;
    }
}
