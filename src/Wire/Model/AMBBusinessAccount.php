<?php

namespace MessageBird\Wire\Model;

class AMBBusinessAccount
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
     * Apple business UUID, or null until supplied. Adding this identifier does not submit the account for review.
     *
     * @var string|null
     */
    protected $appleBusinessId;
    /**
     * Customer-supplied account name used in Bird. Apple controls the name shown to customers in Messages.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Pending accounts need setup or review. Active accounts have recorded approval. Suspended accounts retain their recorded suspension. Configured, connected accounts can exchange messages regardless of review status; Apple decides whether to accept outgoing requests. Disconnected accounts retain their identity and history but cannot exchange new messages until reconnected.
     *
     * @var string|null
     */
    protected $status;
    /**
     * Reason for the current operational suspension, when recorded. Review feedback is retained on the submission. May contain basic Markdown, such as emphasis and lists.
     *
     * @var string|null
     */
    protected $statusReason;
    /**
     * Whether Apple has granted invitation access. Sending also requires a configured, connected account and eligible recipient.
     *
     * @var bool|null
     */
    protected $invitationsEnabled;
    /**
     * When the business record was created.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the business record was last changed.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Next setup actions on create, update and single-account reads. Active accounts return an empty array. Lists omit this field.
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * Latest review outcome recorded by Bird staff.
     *
     * @var string|null
     */
    protected $accountReviewStatus;
    /**
     * Bird dashboard URL for completing setup. Present only when customer action is available.
     *
     * @var string|null
     */
    protected $finishSetupUrl;
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
     * Apple business UUID, or null until supplied. Adding this identifier does not submit the account for review.
     *
     * @return string|null
     */
    public function getAppleBusinessId(): ?string
    {
        return $this->appleBusinessId;
    }
    /**
     * Apple business UUID, or null until supplied. Adding this identifier does not submit the account for review.
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
     * Customer-supplied account name used in Bird. Apple controls the name shown to customers in Messages.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Customer-supplied account name used in Bird. Apple controls the name shown to customers in Messages.
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
     * Pending accounts need setup or review. Active accounts have recorded approval. Suspended accounts retain their recorded suspension. Configured, connected accounts can exchange messages regardless of review status; Apple decides whether to accept outgoing requests. Disconnected accounts retain their identity and history but cannot exchange new messages until reconnected.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Pending accounts need setup or review. Active accounts have recorded approval. Suspended accounts retain their recorded suspension. Configured, connected accounts can exchange messages regardless of review status; Apple decides whether to accept outgoing requests. Disconnected accounts retain their identity and history but cannot exchange new messages until reconnected.
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
     * Reason for the current operational suspension, when recorded. Review feedback is retained on the submission. May contain basic Markdown, such as emphasis and lists.
     *
     * @return string|null
     */
    public function getStatusReason(): ?string
    {
        return $this->statusReason;
    }
    /**
     * Reason for the current operational suspension, when recorded. Review feedback is retained on the submission. May contain basic Markdown, such as emphasis and lists.
     *
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
     * Whether Apple has granted invitation access. Sending also requires a configured, connected account and eligible recipient.
     *
     * @return bool|null
     */
    public function getInvitationsEnabled(): ?bool
    {
        return $this->invitationsEnabled;
    }
    /**
     * Whether Apple has granted invitation access. Sending also requires a configured, connected account and eligible recipient.
     *
     * @param bool|null $invitationsEnabled
     *
     * @return self
     */
    public function setInvitationsEnabled(?bool $invitationsEnabled): self
    {
        $this->initialized['invitationsEnabled'] = true;
        $this->invitationsEnabled = $invitationsEnabled;
        return $this;
    }
    /**
     * When the business record was created.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the business record was created.
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
     * When the business record was last changed.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When the business record was last changed.
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
     * Next setup actions on create, update and single-account reads. Active accounts return an empty array. Lists omit this field.
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
     * Next setup actions on create, update and single-account reads. Active accounts return an empty array. Lists omit this field.
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
     * Latest review outcome recorded by Bird staff.
     *
     * @return string|null
     */
    public function getAccountReviewStatus(): ?string
    {
        return $this->accountReviewStatus;
    }
    /**
     * Latest review outcome recorded by Bird staff.
     *
     * @param string|null $accountReviewStatus
     *
     * @return self
     */
    public function setAccountReviewStatus(?string $accountReviewStatus): self
    {
        $this->initialized['accountReviewStatus'] = true;
        $this->accountReviewStatus = $accountReviewStatus;
        return $this;
    }
    /**
     * Bird dashboard URL for completing setup. Present only when customer action is available.
     *
     * @return string|null
     */
    public function getFinishSetupUrl(): ?string
    {
        return $this->finishSetupUrl;
    }
    /**
     * Bird dashboard URL for completing setup. Present only when customer action is available.
     *
     * @param string|null $finishSetupUrl
     *
     * @return self
     */
    public function setFinishSetupUrl(?string $finishSetupUrl): self
    {
        $this->initialized['finishSetupUrl'] = true;
        $this->finishSetupUrl = $finishSetupUrl;
        return $this;
    }
}
