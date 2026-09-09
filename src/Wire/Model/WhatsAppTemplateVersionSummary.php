<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateVersionSummary
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
     * The version's sequence number, assigned when it is submitted. Null on a draft, which has not been submitted and has no place in the sequence yet.
     * 
     *
     * @var int|null
     */
    protected $versionNumber;
    /**
     * When this version was submitted to Meta. Null on a draft, which has not been submitted, and null for a built-in template's version, which Bird ships already approved rather than submitting on your behalf.
     * 
     *
     * @var \DateTime|null
     */
    protected $submittedAt;
    /**
     * What this version's submission did with each language it holds, keyed by BCP-47 language tag. Content is not here: read the version for that.
     * 
     *
     * @var array<string, WhatsAppTemplateLanguageState>|null
     */
    protected $languages;
    /**
     * When the version was opened. Null for a built-in template's version, which Bird ships rather than stores.
     * 
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * What to do next with this version, given whether it has been submitted. Present on
     * reads that compute it: an empty list means there is nothing to do, and the field is
     * absent entirely on responses that do not report next actions.
     * 
     * A version with no `version_number` is the open draft, and routes to writing its
     * languages and checking it. One that carries a number is frozen, so it routes to
     * reading the verdicts it holds. `submitted_at` does not separate the two, because
     * it is also null on a built-in template's version.
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
     * The version's sequence number, assigned when it is submitted. Null on a draft, which has not been submitted and has no place in the sequence yet.
     * 
     *
     * @return int|null
     */
    public function getVersionNumber(): ?int
    {
        return $this->versionNumber;
    }
    /**
     * The version's sequence number, assigned when it is submitted. Null on a draft, which has not been submitted and has no place in the sequence yet.
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
     * When this version was submitted to Meta. Null on a draft, which has not been submitted, and null for a built-in template's version, which Bird ships already approved rather than submitting on your behalf.
     * 
     *
     * @return \DateTime|null
     */
    public function getSubmittedAt(): ?\DateTime
    {
        return $this->submittedAt;
    }
    /**
     * When this version was submitted to Meta. Null on a draft, which has not been submitted, and null for a built-in template's version, which Bird ships already approved rather than submitting on your behalf.
     *
     * @param \DateTime|null $submittedAt
     *
     * @return self
     */
    public function setSubmittedAt(?\DateTime $submittedAt): self
    {
        $this->initialized['submittedAt'] = true;
        $this->submittedAt = $submittedAt;
        return $this;
    }
    /**
     * What this version's submission did with each language it holds, keyed by BCP-47 language tag. Content is not here: read the version for that.
     * 
     *
     * @return array<string, WhatsAppTemplateLanguageState>|null
     */
    public function getLanguages(): ?iterable
    {
        return $this->languages;
    }
    /**
     * What this version's submission did with each language it holds, keyed by BCP-47 language tag. Content is not here: read the version for that.
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
     * When the version was opened. Null for a built-in template's version, which Bird ships rather than stores.
     * 
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the version was opened. Null for a built-in template's version, which Bird ships rather than stores.
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
     * What to do next with this version, given whether it has been submitted. Present on
     * reads that compute it: an empty list means there is nothing to do, and the field is
     * absent entirely on responses that do not report next actions.
     * 
     * A version with no `version_number` is the open draft, and routes to writing its
     * languages and checking it. One that carries a number is frozen, so it routes to
     * reading the verdicts it holds. `submitted_at` does not separate the two, because
     * it is also null on a built-in template's version.
     * 
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
    * What to do next with this version, given whether it has been submitted. Present on
    reads that compute it: an empty list means there is nothing to do, and the field is
    absent entirely on responses that do not report next actions.
    
    A version with no `version_number` is the open draft, and routes to writing its
    languages and checking it. One that carries a number is frozen, so it routes to
    reading the verdicts it holds. `submitted_at` does not separate the two, because
    it is also null on a built-in template's version.
    
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
