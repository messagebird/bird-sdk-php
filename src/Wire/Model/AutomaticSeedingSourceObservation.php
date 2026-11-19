<?php

namespace MessageBird\Wire\Model;

/**
 * Retained capture observation. `created_at` records observation creation; `updated_at` records the last capture observation change. `label` is omitted when the trigger address carried none.
 */
class AutomaticSeedingSourceObservation extends \ArrayObject
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
     * Original customer source. This never identifies a generated seed copy. Scheduled means an API-scheduled email.
     *
     * @var mixed|null
     */
    protected $source;
    /**
     * Original source execution time.
     *
     * @var \DateTime|null
     */
    protected $sourceCreatedAt;
    /**
     * Time after which the observation is unavailable.
     *
     * @var \DateTime|null
     */
    protected $retainUntil;
    /**
     * State of the source example, separate from the run's sending progress:
     * - `scheduled`: the API-scheduled source is waiting for its due time; capture has not started.
     * - `capturing`: capture is in progress and can already have an associated run.
     * - `captured`: immutable example content was committed for a run; this does not mean seeds were sent.
     * - `skipped`: the source did not complete eligible capture. The reason explains the refusal; a run can exist if refusal occurred after admission.
     * - `stopped`: the scheduled source was canceled; capture will not continue.
     * - `failed`: the scheduled source failed; capture will not continue.
     * Source observations can exist without a run. run_id is present only while an associated run is retained.
     * 
     *
     * @var string|null
     */
    protected $state;
    /**
     * A reason for a run or source outcome, or a seed-copy delivery or admission outcome.
     * 
     * - `registration_rejected` means the seed-list registration was refused; no seed plan was created.
     * - `allowance_exhausted` means the organization's seed-test allowance for this billing period was used up before registration; no seed plan was created.
     * - `selection_unavailable` means the saved seed-list type, engagement profile or region is no longer offered for the sending domain; no seed plan was created.
     * - `sending_domain_not_measured` means Inbox Insights is not measuring the example's sending domain; no seed plan was created.
     * - `vendor_outcome_unknown` means the seed-list registration result is unknown; automatic registration retries are stopped and investigation is required.
     * - `invalid_registration_response` means the returned seed list could not be used; no copies will be sent from that response.
     * - `canceled_or_expired` means new seed admissions stopped because the run was canceled or its eligibility expired.
     * - `run_stopped` means a stop request ended future seed admissions; already granted copies may still send.
     * - `settings_disabled` means automatic seeding was disabled before the copy was granted.
     * - `trigger_rotated` means the run's cancellation generation changed before the copy was granted, either through trigger rotation or disabling seeding. Re-enabling does not advance the generation or undo that fence. This code alone does not establish that the trigger address changed.
     * - `dispatch_deadline_exceeded` means the deadline for admitting this copy passed.
     * - `control_rejected` means the trigger message was rejected.
     * - `source_stopped` means the original source no longer authorizes seed sending.
     * - `conflicting_examples` means the source contained conflicting examples, so none was selected.
     * - `unsupported_source` means capture is unavailable for this source type.
     * - `mixed_recipients` means the original message did not have exactly one recipient consisting of the trigger address.
     * - `invalid_trigger` means the trigger address was invalid or no longer valid for this workspace.
     * - `seeding_unavailable` means automatic-seeding capture was unavailable for this source.
     * - `contact_template_unsupported` means the source template uses contact values that this capture path cannot freeze.
     * - `source_not_authorized` means the source failed sending authorization during capture or registration.
     * - `content_blocked` means the source content was rejected before capture.
     * - `capture_expired` means the example capture deadline passed.
     * - `capture_failed` means the example could not be captured.
     * - `preparation_unavailable` means the frozen example could not be used for registration or preparation of a seed copy.
     * - `policy_refused` means the seed copy failed sending-policy checks.
     * - `unavailable` means a more specific reason cannot be shown.
     * - `bounced` means the seed copy received a bounce outcome.
     * - `rejected` means the seed copy received a rejection outcome.
     * - `blocked` means the seed copy was blocked from sending.
     * - `canceled` means the seed copy was canceled before sending.
     * - `provider_outcome_unknown` means a provider submission may have occurred, but its result is unknown; the copy is not automatically resent.
     * - `admission_uncertain` means the seed copy may have entered sending, but admission is unconfirmed; it is not automatically admitted again.
     * - `admission_refused` means the seed copy was refused before entering sending.
     * 
     *
     * @var string|null
     */
    protected $reason;
    /**
     * @var string|null
     */
    protected $runId;
    /**
     * Label from a trigger address, such as `spring-launch` in `<token>+spring-launch@...`. It is a display name and selects nothing.
     *
     * @var string|null
     */
    protected $label;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Original customer source. This never identifies a generated seed copy. Scheduled means an API-scheduled email.
     *
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }
    /**
     * Original customer source. This never identifies a generated seed copy. Scheduled means an API-scheduled email.
     *
     * @param mixed $source
     *
     * @return self
     */
    public function setSource($source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;
        return $this;
    }
    /**
     * Original source execution time.
     *
     * @return \DateTime|null
     */
    public function getSourceCreatedAt(): ?\DateTime
    {
        return $this->sourceCreatedAt;
    }
    /**
     * Original source execution time.
     *
     * @param \DateTime|null $sourceCreatedAt
     *
     * @return self
     */
    public function setSourceCreatedAt(?\DateTime $sourceCreatedAt): self
    {
        $this->initialized['sourceCreatedAt'] = true;
        $this->sourceCreatedAt = $sourceCreatedAt;
        return $this;
    }
    /**
     * Time after which the observation is unavailable.
     *
     * @return \DateTime|null
     */
    public function getRetainUntil(): ?\DateTime
    {
        return $this->retainUntil;
    }
    /**
     * Time after which the observation is unavailable.
     *
     * @param \DateTime|null $retainUntil
     *
     * @return self
     */
    public function setRetainUntil(?\DateTime $retainUntil): self
    {
        $this->initialized['retainUntil'] = true;
        $this->retainUntil = $retainUntil;
        return $this;
    }
    /**
     * State of the source example, separate from the run's sending progress:
     * - `scheduled`: the API-scheduled source is waiting for its due time; capture has not started.
     * - `capturing`: capture is in progress and can already have an associated run.
     * - `captured`: immutable example content was committed for a run; this does not mean seeds were sent.
     * - `skipped`: the source did not complete eligible capture. The reason explains the refusal; a run can exist if refusal occurred after admission.
     * - `stopped`: the scheduled source was canceled; capture will not continue.
     * - `failed`: the scheduled source failed; capture will not continue.
     * Source observations can exist without a run. run_id is present only while an associated run is retained.
     * 
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
    * State of the source example, separate from the run's sending progress:
    - `scheduled`: the API-scheduled source is waiting for its due time; capture has not started.
    - `capturing`: capture is in progress and can already have an associated run.
    - `captured`: immutable example content was committed for a run; this does not mean seeds were sent.
    - `skipped`: the source did not complete eligible capture. The reason explains the refusal; a run can exist if refusal occurred after admission.
    - `stopped`: the scheduled source was canceled; capture will not continue.
    - `failed`: the scheduled source failed; capture will not continue.
    Source observations can exist without a run. run_id is present only while an associated run is retained.
    
    *
    * @param string|null $state
    *
    * @return self
    */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }
    /**
     * A reason for a run or source outcome, or a seed-copy delivery or admission outcome.
     * 
     * - `registration_rejected` means the seed-list registration was refused; no seed plan was created.
     * - `allowance_exhausted` means the organization's seed-test allowance for this billing period was used up before registration; no seed plan was created.
     * - `selection_unavailable` means the saved seed-list type, engagement profile or region is no longer offered for the sending domain; no seed plan was created.
     * - `sending_domain_not_measured` means Inbox Insights is not measuring the example's sending domain; no seed plan was created.
     * - `vendor_outcome_unknown` means the seed-list registration result is unknown; automatic registration retries are stopped and investigation is required.
     * - `invalid_registration_response` means the returned seed list could not be used; no copies will be sent from that response.
     * - `canceled_or_expired` means new seed admissions stopped because the run was canceled or its eligibility expired.
     * - `run_stopped` means a stop request ended future seed admissions; already granted copies may still send.
     * - `settings_disabled` means automatic seeding was disabled before the copy was granted.
     * - `trigger_rotated` means the run's cancellation generation changed before the copy was granted, either through trigger rotation or disabling seeding. Re-enabling does not advance the generation or undo that fence. This code alone does not establish that the trigger address changed.
     * - `dispatch_deadline_exceeded` means the deadline for admitting this copy passed.
     * - `control_rejected` means the trigger message was rejected.
     * - `source_stopped` means the original source no longer authorizes seed sending.
     * - `conflicting_examples` means the source contained conflicting examples, so none was selected.
     * - `unsupported_source` means capture is unavailable for this source type.
     * - `mixed_recipients` means the original message did not have exactly one recipient consisting of the trigger address.
     * - `invalid_trigger` means the trigger address was invalid or no longer valid for this workspace.
     * - `seeding_unavailable` means automatic-seeding capture was unavailable for this source.
     * - `contact_template_unsupported` means the source template uses contact values that this capture path cannot freeze.
     * - `source_not_authorized` means the source failed sending authorization during capture or registration.
     * - `content_blocked` means the source content was rejected before capture.
     * - `capture_expired` means the example capture deadline passed.
     * - `capture_failed` means the example could not be captured.
     * - `preparation_unavailable` means the frozen example could not be used for registration or preparation of a seed copy.
     * - `policy_refused` means the seed copy failed sending-policy checks.
     * - `unavailable` means a more specific reason cannot be shown.
     * - `bounced` means the seed copy received a bounce outcome.
     * - `rejected` means the seed copy received a rejection outcome.
     * - `blocked` means the seed copy was blocked from sending.
     * - `canceled` means the seed copy was canceled before sending.
     * - `provider_outcome_unknown` means a provider submission may have occurred, but its result is unknown; the copy is not automatically resent.
     * - `admission_uncertain` means the seed copy may have entered sending, but admission is unconfirmed; it is not automatically admitted again.
     * - `admission_refused` means the seed copy was refused before entering sending.
     * 
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
    * A reason for a run or source outcome, or a seed-copy delivery or admission outcome.
    
    - `registration_rejected` means the seed-list registration was refused; no seed plan was created.
    - `allowance_exhausted` means the organization's seed-test allowance for this billing period was used up before registration; no seed plan was created.
    - `selection_unavailable` means the saved seed-list type, engagement profile or region is no longer offered for the sending domain; no seed plan was created.
    - `sending_domain_not_measured` means Inbox Insights is not measuring the example's sending domain; no seed plan was created.
    - `vendor_outcome_unknown` means the seed-list registration result is unknown; automatic registration retries are stopped and investigation is required.
    - `invalid_registration_response` means the returned seed list could not be used; no copies will be sent from that response.
    - `canceled_or_expired` means new seed admissions stopped because the run was canceled or its eligibility expired.
    - `run_stopped` means a stop request ended future seed admissions; already granted copies may still send.
    - `settings_disabled` means automatic seeding was disabled before the copy was granted.
    - `trigger_rotated` means the run's cancellation generation changed before the copy was granted, either through trigger rotation or disabling seeding. Re-enabling does not advance the generation or undo that fence. This code alone does not establish that the trigger address changed.
    - `dispatch_deadline_exceeded` means the deadline for admitting this copy passed.
    - `control_rejected` means the trigger message was rejected.
    - `source_stopped` means the original source no longer authorizes seed sending.
    - `conflicting_examples` means the source contained conflicting examples, so none was selected.
    - `unsupported_source` means capture is unavailable for this source type.
    - `mixed_recipients` means the original message did not have exactly one recipient consisting of the trigger address.
    - `invalid_trigger` means the trigger address was invalid or no longer valid for this workspace.
    - `seeding_unavailable` means automatic-seeding capture was unavailable for this source.
    - `contact_template_unsupported` means the source template uses contact values that this capture path cannot freeze.
    - `source_not_authorized` means the source failed sending authorization during capture or registration.
    - `content_blocked` means the source content was rejected before capture.
    - `capture_expired` means the example capture deadline passed.
    - `capture_failed` means the example could not be captured.
    - `preparation_unavailable` means the frozen example could not be used for registration or preparation of a seed copy.
    - `policy_refused` means the seed copy failed sending-policy checks.
    - `unavailable` means a more specific reason cannot be shown.
    - `bounced` means the seed copy received a bounce outcome.
    - `rejected` means the seed copy received a rejection outcome.
    - `blocked` means the seed copy was blocked from sending.
    - `canceled` means the seed copy was canceled before sending.
    - `provider_outcome_unknown` means a provider submission may have occurred, but its result is unknown; the copy is not automatically resent.
    - `admission_uncertain` means the seed copy may have entered sending, but admission is unconfirmed; it is not automatically admitted again.
    - `admission_refused` means the seed copy was refused before entering sending.
    
    *
    * @param string|null $reason
    *
    * @return self
    */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getRunId(): ?string
    {
        return $this->runId;
    }
    /**
     * @param string|null $runId
     *
     * @return self
     */
    public function setRunId(?string $runId): self
    {
        $this->initialized['runId'] = true;
        $this->runId = $runId;
        return $this;
    }
    /**
     * Label from a trigger address, such as `spring-launch` in `<token>+spring-launch@...`. It is a display name and selects nothing.
     *
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }
    /**
     * Label from a trigger address, such as `spring-launch` in `<token>+spring-launch@...`. It is a display name and selects nothing.
     *
     * @param string|null $label
     *
     * @return self
     */
    public function setLabel(?string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;
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
