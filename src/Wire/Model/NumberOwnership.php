<?php

namespace MessageBird\Wire\Model;

class NumberOwnership extends \ArrayObject
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
     * The most recent ownership submission for this number, including after approval. Users with compliance read access can view the filed answers and their review status from the number's details in the dashboard. This may be a newer filing than the one that cleared the number for use. Absent when no submission was found or submission progress could not be read.
     *
     * @var string|null
     */
    protected $submissionId;
    /**
     * Whether the ownership paperwork is accepted or is no longer required. This can remain true while an external verifier asks for a correction or activation is pending. Read `status` and `next` for the current step, and `blocked_at` for the ownership block on outbound SMS and inbound and outbound voice.
     * 
     *
     * @var bool|null
     */
    protected $satisfied;
    /**
     * Current ownership registration approval status. Operational activation is separate:
     * `blocked_at` records the ownership block on number use, and `next` describes remaining work.
     * 
     * - `needs_input` means ownership details or a submission correction are needed.
     * - `under_review` means your current answers are being reviewed.
     * - `approval_pending` means your paperwork is accepted but registration approval is still pending.
     * - `approved` means ownership registration is approved. Number activation can still be pending while `blocked_at` is non-null.
     * - `not_required` means no active ownership requirement applies, including after a requirement is withdrawn.
     * - `rejected` means the submission was closed or the verifier correction deadline passed. Corrections are no longer accepted for this submission.
     * - `unknown` means current approval status could not be determined. Read `blocked_at` for any recorded ownership block. Retry the read.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * When ownership requirements began blocking outbound SMS and inbound and outbound voice calls. Null when that block is clear. Accepted paperwork can still await activation with a block in place. A number bought before ownership requirements were introduced can have outstanding paperwork without a block.
     * 
     *
     * @var \DateTime|null
     */
    protected $blockedAt;
    /**
     * Actions that advance ownership registration or activation, in order. Empty when neither needs further action. A `wait` step means no customer action is needed now, including while accepted paperwork awaits activation. Read this list again after each change.
     * 
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * The most recent ownership submission for this number, including after approval. Users with compliance read access can view the filed answers and their review status from the number's details in the dashboard. This may be a newer filing than the one that cleared the number for use. Absent when no submission was found or submission progress could not be read.
     *
     * @return string|null
     */
    public function getSubmissionId(): ?string
    {
        return $this->submissionId;
    }
    /**
     * The most recent ownership submission for this number, including after approval. Users with compliance read access can view the filed answers and their review status from the number's details in the dashboard. This may be a newer filing than the one that cleared the number for use. Absent when no submission was found or submission progress could not be read.
     *
     * @param string|null $submissionId
     *
     * @return self
     */
    public function setSubmissionId(?string $submissionId): self
    {
        $this->initialized['submissionId'] = true;
        $this->submissionId = $submissionId;
        return $this;
    }
    /**
     * Whether the ownership paperwork is accepted or is no longer required. This can remain true while an external verifier asks for a correction or activation is pending. Read `status` and `next` for the current step, and `blocked_at` for the ownership block on outbound SMS and inbound and outbound voice.
     * 
     *
     * @return bool|null
     */
    public function getSatisfied(): ?bool
    {
        return $this->satisfied;
    }
    /**
     * Whether the ownership paperwork is accepted or is no longer required. This can remain true while an external verifier asks for a correction or activation is pending. Read `status` and `next` for the current step, and `blocked_at` for the ownership block on outbound SMS and inbound and outbound voice.
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
     * Current ownership registration approval status. Operational activation is separate:
     * `blocked_at` records the ownership block on number use, and `next` describes remaining work.
     * 
     * - `needs_input` means ownership details or a submission correction are needed.
     * - `under_review` means your current answers are being reviewed.
     * - `approval_pending` means your paperwork is accepted but registration approval is still pending.
     * - `approved` means ownership registration is approved. Number activation can still be pending while `blocked_at` is non-null.
     * - `not_required` means no active ownership requirement applies, including after a requirement is withdrawn.
     * - `rejected` means the submission was closed or the verifier correction deadline passed. Corrections are no longer accepted for this submission.
     * - `unknown` means current approval status could not be determined. Read `blocked_at` for any recorded ownership block. Retry the read.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Current ownership registration approval status. Operational activation is separate:
    `blocked_at` records the ownership block on number use, and `next` describes remaining work.
    
    - `needs_input` means ownership details or a submission correction are needed.
    - `under_review` means your current answers are being reviewed.
    - `approval_pending` means your paperwork is accepted but registration approval is still pending.
    - `approved` means ownership registration is approved. Number activation can still be pending while `blocked_at` is non-null.
    - `not_required` means no active ownership requirement applies, including after a requirement is withdrawn.
    - `rejected` means the submission was closed or the verifier correction deadline passed. Corrections are no longer accepted for this submission.
    - `unknown` means current approval status could not be determined. Read `blocked_at` for any recorded ownership block. Retry the read.
    
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
     * When ownership requirements began blocking outbound SMS and inbound and outbound voice calls. Null when that block is clear. Accepted paperwork can still await activation with a block in place. A number bought before ownership requirements were introduced can have outstanding paperwork without a block.
     * 
     *
     * @return \DateTime|null
     */
    public function getBlockedAt(): ?\DateTime
    {
        return $this->blockedAt;
    }
    /**
     * When ownership requirements began blocking outbound SMS and inbound and outbound voice calls. Null when that block is clear. Accepted paperwork can still await activation with a block in place. A number bought before ownership requirements were introduced can have outstanding paperwork without a block.
     *
     * @param \DateTime|null $blockedAt
     *
     * @return self
     */
    public function setBlockedAt(?\DateTime $blockedAt): self
    {
        $this->initialized['blockedAt'] = true;
        $this->blockedAt = $blockedAt;
        return $this;
    }
    /**
     * Actions that advance ownership registration or activation, in order. Empty when neither needs further action. A `wait` step means no customer action is needed now, including while accepted paperwork awaits activation. Read this list again after each change.
     * 
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
     * Actions that advance ownership registration or activation, in order. Empty when neither needs further action. A `wait` step means no customer action is needed now, including while accepted paperwork awaits activation. Read this list again after each change.
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
