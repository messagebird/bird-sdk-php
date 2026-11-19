<?php

namespace MessageBird\Wire\Model;

/**
 * Retained run metadata. `created_at` records run intent creation; `updated_at` records run metadata changes, not every delivery outcome. `label` is omitted when the trigger address carried none.
 */
class AutomaticSeedingRun extends \ArrayObject
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
     * Execution state, separate from delivery and inbox placement:
     * - `pending`: the run is recorded and registration has not started.
     * - `registering`: registration is in progress. A stop request can coexist with an in-flight registration.
     * - `registration_uncertain`: the registration result is unknown. Registration is not automatically repeated, and uncertainty remains visible after a stop.
     * - `ready`: registration has produced a retained seed plan; dispatch scheduling has not started.
     * - `dispatching`: the scheduler is admitting planned copies or recovering earlier handoffs.
     * - `dispatch_complete`: scheduler work is acknowledged. Uncertain admission and pending delivery can remain.
     * - `stopped`: new admissions are closed by a stop request, settings or trigger changes, or the dispatch deadline. Already granted copies may still send.
     * - `failed`: registration failed or the source control was refused. New admissions cannot proceed; retained progress describes any copies already granted.
     * Inspect progress and stop_requested_at alongside this state. A terminal run state does not recall previously granted or queued copies.
     * 
     *
     * @var string|null
     */
    protected $state;
    /**
     * Original customer source. This never identifies a generated seed copy. Scheduled means an API-scheduled email.
     *
     * @var mixed|null
     */
    protected $source;
    /**
     * Label from a trigger address, such as `spring-launch` in `<token>+spring-launch@...`. It is a display name and selects nothing.
     *
     * @var string|null
     */
    protected $label;
    /**
     * Original source execution time.
     *
     * @var \DateTime|null
     */
    protected $sourceCreatedAt;
    /**
     * Time after which this run is no longer available.
     *
     * @var \DateTime|null
     */
    protected $retainUntil;
    /**
     * Delivered, failed, not_sent, unknown and pending partition planned copies. Admitted and provider_accepted overlap those buckets and must not be added to them. Late outcomes can move a copy between buckets.
     *
     * @var AutomaticSeedingProgress|null
     */
    protected $progress;
    /**
     * Present after registration establishes the sending domain.
     *
     * @var string|null
     */
    protected $sendingDomain;
    /**
     * Which pool of seed addresses a test uses. Which pools an account can use depends on what has been provisioned for it, so read the usable set from the seed-test options rather than assuming these are the only values.
     * 
     *
     * @var string|null
     */
    protected $listType;
    /**
     * Which engagement behaviour the seed addresses simulate. `all` mixes engaged and dormant seeds, which is what makes an engagement split measurable; single-cohort profiles exist too, and the usable set comes from the seed-test options rather than from this list.
     * 
     *
     * @var string|null
     */
    protected $engagementProfile;
    /**
     * Regions frozen at run admission.
     *
     * @var list<string>|null
     */
    protected $regions;
    /**
     * Registration admission time.
     *
     * @var \DateTime|null
     */
    protected $registrationStartedAt;
    /**
     * Time the registration response was persisted.
     *
     * @var \DateTime|null
     */
    protected $registrationFinishedAt;
    /**
     * Fixed deadline for new seed admissions.
     *
     * @var \DateTime|null
     */
    protected $dispatchDeadline;
    /**
     * Time scheduler work completed; uncertain admission or delivery may remain.
     *
     * @var \DateTime|null
     */
    protected $dispatchFinishedAt;
    /**
     * First durable stop, whether requested explicitly or imposed automatically. Already granted copies may still send.
     *
     * @var \DateTime|null
     */
    protected $stopRequestedAt;
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
     * Counts of sanitized terminal or uncertain copy outcomes. No seed addresses or provider error text. Counts overlap the progress buckets.
     *
     * @var list<AutomaticSeedingIssue>|null
     */
    protected $issues;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
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
     * Execution state, separate from delivery and inbox placement:
     * - `pending`: the run is recorded and registration has not started.
     * - `registering`: registration is in progress. A stop request can coexist with an in-flight registration.
     * - `registration_uncertain`: the registration result is unknown. Registration is not automatically repeated, and uncertainty remains visible after a stop.
     * - `ready`: registration has produced a retained seed plan; dispatch scheduling has not started.
     * - `dispatching`: the scheduler is admitting planned copies or recovering earlier handoffs.
     * - `dispatch_complete`: scheduler work is acknowledged. Uncertain admission and pending delivery can remain.
     * - `stopped`: new admissions are closed by a stop request, settings or trigger changes, or the dispatch deadline. Already granted copies may still send.
     * - `failed`: registration failed or the source control was refused. New admissions cannot proceed; retained progress describes any copies already granted.
     * Inspect progress and stop_requested_at alongside this state. A terminal run state does not recall previously granted or queued copies.
     * 
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
    * Execution state, separate from delivery and inbox placement:
    - `pending`: the run is recorded and registration has not started.
    - `registering`: registration is in progress. A stop request can coexist with an in-flight registration.
    - `registration_uncertain`: the registration result is unknown. Registration is not automatically repeated, and uncertainty remains visible after a stop.
    - `ready`: registration has produced a retained seed plan; dispatch scheduling has not started.
    - `dispatching`: the scheduler is admitting planned copies or recovering earlier handoffs.
    - `dispatch_complete`: scheduler work is acknowledged. Uncertain admission and pending delivery can remain.
    - `stopped`: new admissions are closed by a stop request, settings or trigger changes, or the dispatch deadline. Already granted copies may still send.
    - `failed`: registration failed or the source control was refused. New admissions cannot proceed; retained progress describes any copies already granted.
    Inspect progress and stop_requested_at alongside this state. A terminal run state does not recall previously granted or queued copies.
    
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
     * Time after which this run is no longer available.
     *
     * @return \DateTime|null
     */
    public function getRetainUntil(): ?\DateTime
    {
        return $this->retainUntil;
    }
    /**
     * Time after which this run is no longer available.
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
     * Delivered, failed, not_sent, unknown and pending partition planned copies. Admitted and provider_accepted overlap those buckets and must not be added to them. Late outcomes can move a copy between buckets.
     *
     * @return AutomaticSeedingProgress|null
     */
    public function getProgress(): ?AutomaticSeedingProgress
    {
        return $this->progress;
    }
    /**
     * Delivered, failed, not_sent, unknown and pending partition planned copies. Admitted and provider_accepted overlap those buckets and must not be added to them. Late outcomes can move a copy between buckets.
     *
     * @param AutomaticSeedingProgress|null $progress
     *
     * @return self
     */
    public function setProgress(?AutomaticSeedingProgress $progress): self
    {
        $this->initialized['progress'] = true;
        $this->progress = $progress;
        return $this;
    }
    /**
     * Present after registration establishes the sending domain.
     *
     * @return string|null
     */
    public function getSendingDomain(): ?string
    {
        return $this->sendingDomain;
    }
    /**
     * Present after registration establishes the sending domain.
     *
     * @param string|null $sendingDomain
     *
     * @return self
     */
    public function setSendingDomain(?string $sendingDomain): self
    {
        $this->initialized['sendingDomain'] = true;
        $this->sendingDomain = $sendingDomain;
        return $this;
    }
    /**
     * Which pool of seed addresses a test uses. Which pools an account can use depends on what has been provisioned for it, so read the usable set from the seed-test options rather than assuming these are the only values.
     * 
     *
     * @return string|null
     */
    public function getListType(): ?string
    {
        return $this->listType;
    }
    /**
     * Which pool of seed addresses a test uses. Which pools an account can use depends on what has been provisioned for it, so read the usable set from the seed-test options rather than assuming these are the only values.
     *
     * @param string|null $listType
     *
     * @return self
     */
    public function setListType(?string $listType): self
    {
        $this->initialized['listType'] = true;
        $this->listType = $listType;
        return $this;
    }
    /**
     * Which engagement behaviour the seed addresses simulate. `all` mixes engaged and dormant seeds, which is what makes an engagement split measurable; single-cohort profiles exist too, and the usable set comes from the seed-test options rather than from this list.
     * 
     *
     * @return string|null
     */
    public function getEngagementProfile(): ?string
    {
        return $this->engagementProfile;
    }
    /**
     * Which engagement behaviour the seed addresses simulate. `all` mixes engaged and dormant seeds, which is what makes an engagement split measurable; single-cohort profiles exist too, and the usable set comes from the seed-test options rather than from this list.
     *
     * @param string|null $engagementProfile
     *
     * @return self
     */
    public function setEngagementProfile(?string $engagementProfile): self
    {
        $this->initialized['engagementProfile'] = true;
        $this->engagementProfile = $engagementProfile;
        return $this;
    }
    /**
     * Regions frozen at run admission.
     *
     * @return list<string>|null
     */
    public function getRegions(): ?array
    {
        return $this->regions;
    }
    /**
     * Regions frozen at run admission.
     *
     * @param list<string>|null $regions
     *
     * @return self
     */
    public function setRegions(?array $regions): self
    {
        $this->initialized['regions'] = true;
        $this->regions = $regions;
        return $this;
    }
    /**
     * Registration admission time.
     *
     * @return \DateTime|null
     */
    public function getRegistrationStartedAt(): ?\DateTime
    {
        return $this->registrationStartedAt;
    }
    /**
     * Registration admission time.
     *
     * @param \DateTime|null $registrationStartedAt
     *
     * @return self
     */
    public function setRegistrationStartedAt(?\DateTime $registrationStartedAt): self
    {
        $this->initialized['registrationStartedAt'] = true;
        $this->registrationStartedAt = $registrationStartedAt;
        return $this;
    }
    /**
     * Time the registration response was persisted.
     *
     * @return \DateTime|null
     */
    public function getRegistrationFinishedAt(): ?\DateTime
    {
        return $this->registrationFinishedAt;
    }
    /**
     * Time the registration response was persisted.
     *
     * @param \DateTime|null $registrationFinishedAt
     *
     * @return self
     */
    public function setRegistrationFinishedAt(?\DateTime $registrationFinishedAt): self
    {
        $this->initialized['registrationFinishedAt'] = true;
        $this->registrationFinishedAt = $registrationFinishedAt;
        return $this;
    }
    /**
     * Fixed deadline for new seed admissions.
     *
     * @return \DateTime|null
     */
    public function getDispatchDeadline(): ?\DateTime
    {
        return $this->dispatchDeadline;
    }
    /**
     * Fixed deadline for new seed admissions.
     *
     * @param \DateTime|null $dispatchDeadline
     *
     * @return self
     */
    public function setDispatchDeadline(?\DateTime $dispatchDeadline): self
    {
        $this->initialized['dispatchDeadline'] = true;
        $this->dispatchDeadline = $dispatchDeadline;
        return $this;
    }
    /**
     * Time scheduler work completed; uncertain admission or delivery may remain.
     *
     * @return \DateTime|null
     */
    public function getDispatchFinishedAt(): ?\DateTime
    {
        return $this->dispatchFinishedAt;
    }
    /**
     * Time scheduler work completed; uncertain admission or delivery may remain.
     *
     * @param \DateTime|null $dispatchFinishedAt
     *
     * @return self
     */
    public function setDispatchFinishedAt(?\DateTime $dispatchFinishedAt): self
    {
        $this->initialized['dispatchFinishedAt'] = true;
        $this->dispatchFinishedAt = $dispatchFinishedAt;
        return $this;
    }
    /**
     * First durable stop, whether requested explicitly or imposed automatically. Already granted copies may still send.
     *
     * @return \DateTime|null
     */
    public function getStopRequestedAt(): ?\DateTime
    {
        return $this->stopRequestedAt;
    }
    /**
     * First durable stop, whether requested explicitly or imposed automatically. Already granted copies may still send.
     *
     * @param \DateTime|null $stopRequestedAt
     *
     * @return self
     */
    public function setStopRequestedAt(?\DateTime $stopRequestedAt): self
    {
        $this->initialized['stopRequestedAt'] = true;
        $this->stopRequestedAt = $stopRequestedAt;
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
     * Counts of sanitized terminal or uncertain copy outcomes. No seed addresses or provider error text. Counts overlap the progress buckets.
     *
     * @return list<AutomaticSeedingIssue>|null
     */
    public function getIssues(): ?array
    {
        return $this->issues;
    }
    /**
     * Counts of sanitized terminal or uncertain copy outcomes. No seed addresses or provider error text. Counts overlap the progress buckets.
     *
     * @param list<AutomaticSeedingIssue>|null $issues
     *
     * @return self
     */
    public function setIssues(?array $issues): self
    {
        $this->initialized['issues'] = true;
        $this->issues = $issues;
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
