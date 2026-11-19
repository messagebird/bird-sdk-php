<?php

namespace MessageBird\Wire\Model;

class AutomaticSeedingIssue
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
    protected $code;
    /**
     * @var int|null
     */
    protected $count;
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
    public function getCode(): ?string
    {
        return $this->code;
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
    * @param string|null $code
    *
    * @return self
    */
    public function setCode(?string $code): self
    {
        $this->initialized['code'] = true;
        $this->code = $code;
        return $this;
    }
    /**
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->count;
    }
    /**
     * @param int|null $count
     *
     * @return self
     */
    public function setCount(?int $count): self
    {
        $this->initialized['count'] = true;
        $this->count = $count;
        return $this;
    }
}
