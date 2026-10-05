<?php

namespace MessageBird\Wire\Model;

class AMBBusinessAccountSubmission
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
    protected $businessAccountId;
    /**
     * The Apple business UUID frozen when this attempt was submitted.
     *
     * @var string|null
     */
    protected $appleBusinessId;
    /**
     * The customer-supplied Bird account name frozen when this attempt was submitted.
     *
     * @var string|null
     */
    protected $name;
    /**
     * @var AMBBusinessAccountSubmissionReadinessAttachment|null
     */
    protected $readinessAttachment;
    /**
     * @var AMBBusinessAccountSubmissionUseCasesAttachment|null
     */
    protected $useCasesAttachment;
    /**
     * @var AMBBusinessAccountSubmissionVideoAttachment|null
     */
    protected $videoAttachment;
    /**
     * The review outcome of this attempt. Earlier attempts retain their outcome when a new attempt is submitted.
     *
     * @var string|null
     */
    protected $status;
    /**
     * @var string|null
     */
    protected $statusReason;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Read the parent business account for current eligibility and next actions. Present on create responses and each customer submission-list item; historical attempts do not establish current account state.
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
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
     * @return string|null
     */
    public function getBusinessAccountId(): ?string
    {
        return $this->businessAccountId;
    }
    /**
     * @param string|null $businessAccountId
     *
     * @return self
     */
    public function setBusinessAccountId(?string $businessAccountId): self
    {
        $this->initialized['businessAccountId'] = true;
        $this->businessAccountId = $businessAccountId;
        return $this;
    }
    /**
     * The Apple business UUID frozen when this attempt was submitted.
     *
     * @return string|null
     */
    public function getAppleBusinessId(): ?string
    {
        return $this->appleBusinessId;
    }
    /**
     * The Apple business UUID frozen when this attempt was submitted.
     *
     * @param string|null $appleBusinessId
     *
     * @return self
     */
    public function setAppleBusinessId(?string $appleBusinessId): self
    {
        $this->initialized['appleBusinessId'] = true;
        $this->appleBusinessId = $appleBusinessId;
        return $this;
    }
    /**
     * The customer-supplied Bird account name frozen when this attempt was submitted.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The customer-supplied Bird account name frozen when this attempt was submitted.
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
     * @return AMBBusinessAccountSubmissionReadinessAttachment|null
     */
    public function getReadinessAttachment(): ?AMBBusinessAccountSubmissionReadinessAttachment
    {
        return $this->readinessAttachment;
    }
    /**
     * @param AMBBusinessAccountSubmissionReadinessAttachment|Attachment|array|null $readinessAttachment
     *
     * @return self
     */
    public function setReadinessAttachment($readinessAttachment): self
    {
        $this->initialized['readinessAttachment'] = true;
        $this->readinessAttachment = \MessageBird\Core\ModelWrapper::normalize($readinessAttachment, AMBBusinessAccountSubmissionReadinessAttachment::class);
        return $this;
    }
    /**
     * @return AMBBusinessAccountSubmissionUseCasesAttachment|null
     */
    public function getUseCasesAttachment(): ?AMBBusinessAccountSubmissionUseCasesAttachment
    {
        return $this->useCasesAttachment;
    }
    /**
     * @param AMBBusinessAccountSubmissionUseCasesAttachment|Attachment|array|null $useCasesAttachment
     *
     * @return self
     */
    public function setUseCasesAttachment($useCasesAttachment): self
    {
        $this->initialized['useCasesAttachment'] = true;
        $this->useCasesAttachment = \MessageBird\Core\ModelWrapper::normalize($useCasesAttachment, AMBBusinessAccountSubmissionUseCasesAttachment::class);
        return $this;
    }
    /**
     * @return AMBBusinessAccountSubmissionVideoAttachment|null
     */
    public function getVideoAttachment(): ?AMBBusinessAccountSubmissionVideoAttachment
    {
        return $this->videoAttachment;
    }
    /**
     * @param AMBBusinessAccountSubmissionVideoAttachment|Attachment|array|null $videoAttachment
     *
     * @return self
     */
    public function setVideoAttachment($videoAttachment): self
    {
        $this->initialized['videoAttachment'] = true;
        $this->videoAttachment = \MessageBird\Core\ModelWrapper::normalize($videoAttachment, AMBBusinessAccountSubmissionVideoAttachment::class);
        return $this;
    }
    /**
     * The review outcome of this attempt. Earlier attempts retain their outcome when a new attempt is submitted.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * The review outcome of this attempt. Earlier attempts retain their outcome when a new attempt is submitted.
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
     * @return string|null
     */
    public function getStatusReason(): ?string
    {
        return $this->statusReason;
    }
    /**
     * @param string|null $statusReason
     *
     * @return self
     */
    public function setStatusReason(?string $statusReason): self
    {
        $this->initialized['statusReason'] = true;
        $this->statusReason = $statusReason;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
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
     * Read the parent business account for current eligibility and next actions. Present on create responses and each customer submission-list item; historical attempts do not establish current account state.
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
     * Read the parent business account for current eligibility and next actions. Present on create responses and each customer submission-list item; historical attempts do not establish current account state.
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
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
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
