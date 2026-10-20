<?php

namespace MessageBird\Wire\Model;

class ComplianceSubmission
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
     * What to do next about this submission, given the state it is in. Each entry names one action and says
     * why it is worth taking, so you can act on this response without working out the order
     * yourself. Present on reads that compute it: an empty list means there is nothing to do,
     * and the field is absent entirely on responses that do not report next actions.
     * 
     * A submission reports the answers you filed; whether the country's requirements are met is
     * reported by the requirements read. So this points there rather than repeating a verdict it
     * does not own.
     * 
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $subjectKind;
    /**
     * @var string|null
     */
    protected $subjectId;
    /**
     * @var string|null
     */
    protected $program;
    /**
     * @var string|null
     */
    protected $countryCode;
    /**
     * The party this registration was filed for, or `null` if none was named.
     *
     * @var string|null
     */
    protected $identityId;
    /**
     * Whether this country's requirements are met. `true` once the submission is approved and every required requirement is approved or marked not applicable. This can remain true when an external verifier requests a correction. Once you submit that correction, it must pass review before this becomes true again, including any optional answers you change.
     * 
     *
     * @var bool|null
     */
    protected $satisfied;
    /**
     * Every answer and where it stands. Each is decided on its own.
     *
     * @var list<ComplianceSubmissionItem>|null
     */
    protected $items;
    /**
     * When this was submitted.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When it last changed.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * When this submission was closed. Null while it remains open.
     *
     * @var \DateTime|null
     */
    protected $closedAt;
    /**
     * The decline reason for a closed submission, or null while open.
     *
     * @var string|null
     */
    protected $closureReason;
    /**
     * What to do next about this submission, given the state it is in. Each entry names one action and says
     * why it is worth taking, so you can act on this response without working out the order
     * yourself. Present on reads that compute it: an empty list means there is nothing to do,
     * and the field is absent entirely on responses that do not report next actions.
     * 
     * A submission reports the answers you filed; whether the country's requirements are met is
     * reported by the requirements read. So this points there rather than repeating a verdict it
     * does not own.
     * 
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
    * What to do next about this submission, given the state it is in. Each entry names one action and says
    why it is worth taking, so you can act on this response without working out the order
    yourself. Present on reads that compute it: an empty list means there is nothing to do,
    and the field is absent entirely on responses that do not report next actions.
    
    A submission reports the answers you filed; whether the country's requirements are met is
    reported by the requirements read. So this points there rather than repeating a verdict it
    does not own.
    
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
    public function getSubjectKind(): ?string
    {
        return $this->subjectKind;
    }
    /**
     * @param string|null $subjectKind
     *
     * @return self
     */
    public function setSubjectKind(?string $subjectKind): self
    {
        $this->initialized['subjectKind'] = true;
        $this->subjectKind = $subjectKind;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getSubjectId(): ?string
    {
        return $this->subjectId;
    }
    /**
     * @param string|null $subjectId
     *
     * @return self
     */
    public function setSubjectId(?string $subjectId): self
    {
        $this->initialized['subjectId'] = true;
        $this->subjectId = $subjectId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getProgram(): ?string
    {
        return $this->program;
    }
    /**
     * @param string|null $program
     *
     * @return self
     */
    public function setProgram(?string $program): self
    {
        $this->initialized['program'] = true;
        $this->program = $program;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * @param string|null $countryCode
     *
     * @return self
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;
        return $this;
    }
    /**
     * The party this registration was filed for, or `null` if none was named.
     *
     * @return string|null
     */
    public function getIdentityId(): ?string
    {
        return $this->identityId;
    }
    /**
     * The party this registration was filed for, or `null` if none was named.
     *
     * @param string|null $identityId
     *
     * @return self
     */
    public function setIdentityId(?string $identityId): self
    {
        $this->initialized['identityId'] = true;
        $this->identityId = $identityId;
        return $this;
    }
    /**
     * Whether this country's requirements are met. `true` once the submission is approved and every required requirement is approved or marked not applicable. This can remain true when an external verifier requests a correction. Once you submit that correction, it must pass review before this becomes true again, including any optional answers you change.
     * 
     *
     * @return bool|null
     */
    public function getSatisfied(): ?bool
    {
        return $this->satisfied;
    }
    /**
     * Whether this country's requirements are met. `true` once the submission is approved and every required requirement is approved or marked not applicable. This can remain true when an external verifier requests a correction. Once you submit that correction, it must pass review before this becomes true again, including any optional answers you change.
     *
     * @param bool|null $satisfied
     *
     * @return self
     */
    public function setSatisfied(?bool $satisfied): self
    {
        $this->initialized['satisfied'] = true;
        $this->satisfied = $satisfied;
        return $this;
    }
    /**
     * Every answer and where it stands. Each is decided on its own.
     *
     * @return list<ComplianceSubmissionItem>|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }
    /**
     * Every answer and where it stands. Each is decided on its own.
     *
     * @param list<ComplianceSubmissionItem>|null $items
     *
     * @return self
     */
    public function setItems(?array $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;
        return $this;
    }
    /**
     * When this was submitted.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When this was submitted.
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
     * When it last changed.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When it last changed.
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
     * When this submission was closed. Null while it remains open.
     *
     * @return \DateTime|null
     */
    public function getClosedAt(): ?\DateTime
    {
        return $this->closedAt;
    }
    /**
     * When this submission was closed. Null while it remains open.
     *
     * @param \DateTime|null $closedAt
     *
     * @return self
     */
    public function setClosedAt(?\DateTime $closedAt): self
    {
        $this->initialized['closedAt'] = true;
        $this->closedAt = $closedAt;
        return $this;
    }
    /**
     * The decline reason for a closed submission, or null while open.
     *
     * @return string|null
     */
    public function getClosureReason(): ?string
    {
        return $this->closureReason;
    }
    /**
     * The decline reason for a closed submission, or null while open.
     *
     * @param string|null $closureReason
     *
     * @return self
     */
    public function setClosureReason(?string $closureReason): self
    {
        $this->initialized['closureReason'] = true;
        $this->closureReason = $closureReason;
        return $this;
    }
}
