<?php

namespace MessageBird\Wire\Model;

class SMSSenderRequirement
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
     * The sender these requirements are for, the same one you asked about. It is repeated on every row so a row is complete on its own: what a country needs is addressed by the sender and the country together, and a step that registers this sender needs both.
     * 
     *
     * @var string|null
     */
    protected $senderId;
    /**
     * @var string|null
     */
    protected $countryCode;
    /**
     * Whether country registration is absent, optional, or required before sending.
     *
     * @var string|null
     */
    protected $registrationMode;
    /**
     * The effective sender ID behavior for this sender and destination. An approved optional registration changes `overwritten` to `preserved` for its permitted message categories. Required registration does not change the configured sender ID behavior after approval. `unknown` means no behavior is published. This is expected behavior, not confirmation of what a recipient saw. Overwrite details are published in the country messaging context.
     * 
     *
     * @var string|null
     */
    protected $senderIdBehavior;
    /**
     * The registration program available for this destination, including optional registration. An existing registration retains its own program.
     * 
     *
     * @var string|null
     */
    protected $program;
    /**
     * Where this sender stands with this country's registration programme. The `approved` and `not_required` statuses satisfy it. Every other status leaves it unsatisfied: the `registration_required` status means the required registration has not started, the `pending` status means something required is still owed by you, and `under_review` means it is all with us. Read `next` for what to do about any of it.
     * 
     * Registration blocks sending when `registration_mode` is `required`. Optional registration can be pending while sending remains available with `sender_id_behavior` set to `overwritten`. Check `destination_enabled` too, which is independent of registration progress.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * What to do next about this country, given the state it is in. Each entry names one action
     * and says why it is worth taking, so you can act on this response without working out the
     * order yourself. Present on reads that compute it: an empty list means there is nothing to
     * do, and the field is absent entirely on responses that do not report next actions.
     * 
     * This routes rather than advises: it names where to go to act on this country, and the
     * resource it names carries what to do there. So a country under carrier review names the
     * verification to read, rather than restating a verdict that resource owns.
     * 
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * Whether your workspace has this destination country turned on. This is a workspace setting rather than anything about this sender, and it is checked before the sender is even considered, so a country can be fully registered and still refuse your messages because it is switched off here. Turn it on with [Update SMS destinations](/docs/api/reference/update-workspace-sms-destinations).
     * 
     *
     * @var bool|null
     */
    protected $destinationEnabled;
    /**
     * Whether registering this sender for this country continues at compliance requirements you answer with a submission. When true, read them with [Get what a registration needs](/docs/api/reference/get-workspace-compliance-requirements) once the registration exists; the one-off setup fee is charged when you submit, and the monthly charge starts once the registration is approved. False in three cases: the country takes no registration (`registration_mode` is `none`); its programme runs its own flow, such as US 10DLC, toll-free, and short codes, which `next` routes to; or the registration goes to review with nothing to submit, and both charges are made once it is approved.
     * 
     *
     * @var bool|null
     */
    protected $hasComplianceRequirements;
    /**
     * Message category the registration covering this country is approved for. Null when the registration admits any category, and null before you register.
     * 
     *
     * @var string|null
     */
    protected $category;
    /**
     * The registration covering this country, once one exists. Null before you register. Where the country's requirements are collected as a form, this is the `subject_id` to pass to `GET /v1/compliance/requirements`.
     * 
     *
     * @var string|null
     */
    protected $registrationId;
    /**
     * The resource this country's walk continues at. `none` means the first one is still to be
     * created; every other value names what to read next, whose id is `program_entry_ref`.
     * 
     * Every programme names its entry. US 10DLC enters at a `10dlc_brand` or a `10dlc_campaign` and
     * continues at the `10dlc_campaign_number_link` a number hangs off. US toll-free both enters and
     * continues at its `tfn_verification`. A programme answered by filling in a form enters at the
     * `compliance_submission` holding your answers, the only entry that names something you filled in
     * rather than something a carrier holds. Read the entry whenever you need the detail behind a
     * country: it carries why a registration was refused, which this row reports only as a status.
     * 
     * The values are programme-prefixed where a programme owns them, so one vocabulary reads the same
     * wherever an entry is reported. Tolerate a value you do not recognize: read `program_entry_ref`
     * as the id of a resource to fetch, and read `next` for what to do about the country.
     * 
     * Computed on this read, so it is never stale and never absent. That matters most where a row
     * cannot answer for itself: a toll-free verification you have started but not submitted is named
     * here even though no registration exists for it yet, which is what tells you to finish that one
     * rather than start a second.
     * 
     *
     * @var string|null
     */
    protected $programEntry;
    /**
     * The id of the resource `program_entry` names, or null when it names none. Where the workspace holds several to choose from, this is the one to start from: the only brand or campaign if there is one, otherwise the most recently approved, and otherwise the most recent.
     * 
     *
     * @var string|null
     */
    protected $programEntryRef;
    /**
     * Why the registration was rejected, when it was. Null otherwise.
     *
     * @var string|null
     */
    protected $rejectionReason;
    /**
     * When this country's registration must be brought up to date by, if it must. Null when nothing is outstanding, which is the ordinary case. The sender keeps sending until the date passes; `GET /v1/compliance/requirements` says what is being asked for.
     * 
     *
     * @var \DateTime|null
     */
    protected $obligationDueAt;
    /**
     * Shortest time approval usually takes, in business days. Null when the country publishes no estimate.
     *
     * @var int|null
     */
    protected $timelineMinDays;
    /**
     * Longest time approval usually takes, in business days. Null when the country publishes no estimate.
     *
     * @var int|null
     */
    protected $timelineMaxDays;
    /**
     * Registration categories this country's program accepts.
     *
     * @var list<string>|null
     */
    protected $registrationTypes;
    /**
     * The sender these requirements are for, the same one you asked about. It is repeated on every row so a row is complete on its own: what a country needs is addressed by the sender and the country together, and a step that registers this sender needs both.
     * 
     *
     * @return string|null
     */
    public function getSenderId(): ?string
    {
        return $this->senderId;
    }
    /**
     * The sender these requirements are for, the same one you asked about. It is repeated on every row so a row is complete on its own: what a country needs is addressed by the sender and the country together, and a step that registers this sender needs both.
     *
     * @param string|null $senderId
     *
     * @return self
     */
    public function setSenderId(?string $senderId): self
    {
        $this->initialized['senderId'] = true;
        $this->senderId = $senderId;
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
     * Whether country registration is absent, optional, or required before sending.
     *
     * @return string|null
     */
    public function getRegistrationMode(): ?string
    {
        return $this->registrationMode;
    }
    /**
     * Whether country registration is absent, optional, or required before sending.
     *
     * @param string|null $registrationMode
     *
     * @return self
     */
    public function setRegistrationMode(?string $registrationMode): self
    {
        $this->initialized['registrationMode'] = true;
        $this->registrationMode = $registrationMode;
        return $this;
    }
    /**
     * The effective sender ID behavior for this sender and destination. An approved optional registration changes `overwritten` to `preserved` for its permitted message categories. Required registration does not change the configured sender ID behavior after approval. `unknown` means no behavior is published. This is expected behavior, not confirmation of what a recipient saw. Overwrite details are published in the country messaging context.
     * 
     *
     * @return string|null
     */
    public function getSenderIdBehavior(): ?string
    {
        return $this->senderIdBehavior;
    }
    /**
     * The effective sender ID behavior for this sender and destination. An approved optional registration changes `overwritten` to `preserved` for its permitted message categories. Required registration does not change the configured sender ID behavior after approval. `unknown` means no behavior is published. This is expected behavior, not confirmation of what a recipient saw. Overwrite details are published in the country messaging context.
     *
     * @param string|null $senderIdBehavior
     *
     * @return self
     */
    public function setSenderIdBehavior(?string $senderIdBehavior): self
    {
        $this->initialized['senderIdBehavior'] = true;
        $this->senderIdBehavior = $senderIdBehavior;
        return $this;
    }
    /**
     * The registration program available for this destination, including optional registration. An existing registration retains its own program.
     * 
     *
     * @return string|null
     */
    public function getProgram(): ?string
    {
        return $this->program;
    }
    /**
     * The registration program available for this destination, including optional registration. An existing registration retains its own program.
     *
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
     * Where this sender stands with this country's registration programme. The `approved` and `not_required` statuses satisfy it. Every other status leaves it unsatisfied: the `registration_required` status means the required registration has not started, the `pending` status means something required is still owed by you, and `under_review` means it is all with us. Read `next` for what to do about any of it.
     * 
     * Registration blocks sending when `registration_mode` is `required`. Optional registration can be pending while sending remains available with `sender_id_behavior` set to `overwritten`. Check `destination_enabled` too, which is independent of registration progress.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Where this sender stands with this country's registration programme. The `approved` and `not_required` statuses satisfy it. Every other status leaves it unsatisfied: the `registration_required` status means the required registration has not started, the `pending` status means something required is still owed by you, and `under_review` means it is all with us. Read `next` for what to do about any of it.
    
    Registration blocks sending when `registration_mode` is `required`. Optional registration can be pending while sending remains available with `sender_id_behavior` set to `overwritten`. Check `destination_enabled` too, which is independent of registration progress.
    
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
     * What to do next about this country, given the state it is in. Each entry names one action
     * and says why it is worth taking, so you can act on this response without working out the
     * order yourself. Present on reads that compute it: an empty list means there is nothing to
     * do, and the field is absent entirely on responses that do not report next actions.
     * 
     * This routes rather than advises: it names where to go to act on this country, and the
     * resource it names carries what to do there. So a country under carrier review names the
     * verification to read, rather than restating a verdict that resource owns.
     * 
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
    * What to do next about this country, given the state it is in. Each entry names one action
    and says why it is worth taking, so you can act on this response without working out the
    order yourself. Present on reads that compute it: an empty list means there is nothing to
    do, and the field is absent entirely on responses that do not report next actions.
    
    This routes rather than advises: it names where to go to act on this country, and the
    resource it names carries what to do there. So a country under carrier review names the
    verification to read, rather than restating a verdict that resource owns.
    
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
     * Whether your workspace has this destination country turned on. This is a workspace setting rather than anything about this sender, and it is checked before the sender is even considered, so a country can be fully registered and still refuse your messages because it is switched off here. Turn it on with [Update SMS destinations](/docs/api/reference/update-workspace-sms-destinations).
     * 
     *
     * @return bool|null
     */
    public function getDestinationEnabled(): ?bool
    {
        return $this->destinationEnabled;
    }
    /**
     * Whether your workspace has this destination country turned on. This is a workspace setting rather than anything about this sender, and it is checked before the sender is even considered, so a country can be fully registered and still refuse your messages because it is switched off here. Turn it on with [Update SMS destinations](/docs/api/reference/update-workspace-sms-destinations).
     *
     * @param bool|null $destinationEnabled
     *
     * @return self
     */
    public function setDestinationEnabled(?bool $destinationEnabled): self
    {
        $this->initialized['destinationEnabled'] = true;
        $this->destinationEnabled = $destinationEnabled;
        return $this;
    }
    /**
     * Whether registering this sender for this country continues at compliance requirements you answer with a submission. When true, read them with [Get what a registration needs](/docs/api/reference/get-workspace-compliance-requirements) once the registration exists; the one-off setup fee is charged when you submit, and the monthly charge starts once the registration is approved. False in three cases: the country takes no registration (`registration_mode` is `none`); its programme runs its own flow, such as US 10DLC, toll-free, and short codes, which `next` routes to; or the registration goes to review with nothing to submit, and both charges are made once it is approved.
     * 
     *
     * @return bool|null
     */
    public function getHasComplianceRequirements(): ?bool
    {
        return $this->hasComplianceRequirements;
    }
    /**
     * Whether registering this sender for this country continues at compliance requirements you answer with a submission. When true, read them with [Get what a registration needs](/docs/api/reference/get-workspace-compliance-requirements) once the registration exists; the one-off setup fee is charged when you submit, and the monthly charge starts once the registration is approved. False in three cases: the country takes no registration (`registration_mode` is `none`); its programme runs its own flow, such as US 10DLC, toll-free, and short codes, which `next` routes to; or the registration goes to review with nothing to submit, and both charges are made once it is approved.
     *
     * @param bool|null $hasComplianceRequirements
     *
     * @return self
     */
    public function setHasComplianceRequirements(?bool $hasComplianceRequirements): self
    {
        $this->initialized['hasComplianceRequirements'] = true;
        $this->hasComplianceRequirements = $hasComplianceRequirements;
        return $this;
    }
    /**
     * Message category the registration covering this country is approved for. Null when the registration admits any category, and null before you register.
     * 
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Message category the registration covering this country is approved for. Null when the registration admits any category, and null before you register.
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
     * The registration covering this country, once one exists. Null before you register. Where the country's requirements are collected as a form, this is the `subject_id` to pass to `GET /v1/compliance/requirements`.
     * 
     *
     * @return string|null
     */
    public function getRegistrationId(): ?string
    {
        return $this->registrationId;
    }
    /**
     * The registration covering this country, once one exists. Null before you register. Where the country's requirements are collected as a form, this is the `subject_id` to pass to `GET /v1/compliance/requirements`.
     *
     * @param string|null $registrationId
     *
     * @return self
     */
    public function setRegistrationId(?string $registrationId): self
    {
        $this->initialized['registrationId'] = true;
        $this->registrationId = $registrationId;
        return $this;
    }
    /**
     * The resource this country's walk continues at. `none` means the first one is still to be
     * created; every other value names what to read next, whose id is `program_entry_ref`.
     * 
     * Every programme names its entry. US 10DLC enters at a `10dlc_brand` or a `10dlc_campaign` and
     * continues at the `10dlc_campaign_number_link` a number hangs off. US toll-free both enters and
     * continues at its `tfn_verification`. A programme answered by filling in a form enters at the
     * `compliance_submission` holding your answers, the only entry that names something you filled in
     * rather than something a carrier holds. Read the entry whenever you need the detail behind a
     * country: it carries why a registration was refused, which this row reports only as a status.
     * 
     * The values are programme-prefixed where a programme owns them, so one vocabulary reads the same
     * wherever an entry is reported. Tolerate a value you do not recognize: read `program_entry_ref`
     * as the id of a resource to fetch, and read `next` for what to do about the country.
     * 
     * Computed on this read, so it is never stale and never absent. That matters most where a row
     * cannot answer for itself: a toll-free verification you have started but not submitted is named
     * here even though no registration exists for it yet, which is what tells you to finish that one
     * rather than start a second.
     * 
     *
     * @return string|null
     */
    public function getProgramEntry(): ?string
    {
        return $this->programEntry;
    }
    /**
    * The resource this country's walk continues at. `none` means the first one is still to be
    created; every other value names what to read next, whose id is `program_entry_ref`.
    
    Every programme names its entry. US 10DLC enters at a `10dlc_brand` or a `10dlc_campaign` and
    continues at the `10dlc_campaign_number_link` a number hangs off. US toll-free both enters and
    continues at its `tfn_verification`. A programme answered by filling in a form enters at the
    `compliance_submission` holding your answers, the only entry that names something you filled in
    rather than something a carrier holds. Read the entry whenever you need the detail behind a
    country: it carries why a registration was refused, which this row reports only as a status.
    
    The values are programme-prefixed where a programme owns them, so one vocabulary reads the same
    wherever an entry is reported. Tolerate a value you do not recognize: read `program_entry_ref`
    as the id of a resource to fetch, and read `next` for what to do about the country.
    
    Computed on this read, so it is never stale and never absent. That matters most where a row
    cannot answer for itself: a toll-free verification you have started but not submitted is named
    here even though no registration exists for it yet, which is what tells you to finish that one
    rather than start a second.
    
    *
    * @param string|null $programEntry
    *
    * @return self
    */
    public function setProgramEntry(?string $programEntry): self
    {
        $this->initialized['programEntry'] = true;
        $this->programEntry = $programEntry;
        return $this;
    }
    /**
     * The id of the resource `program_entry` names, or null when it names none. Where the workspace holds several to choose from, this is the one to start from: the only brand or campaign if there is one, otherwise the most recently approved, and otherwise the most recent.
     * 
     *
     * @return string|null
     */
    public function getProgramEntryRef(): ?string
    {
        return $this->programEntryRef;
    }
    /**
     * The id of the resource `program_entry` names, or null when it names none. Where the workspace holds several to choose from, this is the one to start from: the only brand or campaign if there is one, otherwise the most recently approved, and otherwise the most recent.
     *
     * @param string|null $programEntryRef
     *
     * @return self
     */
    public function setProgramEntryRef(?string $programEntryRef): self
    {
        $this->initialized['programEntryRef'] = true;
        $this->programEntryRef = $programEntryRef;
        return $this;
    }
    /**
     * Why the registration was rejected, when it was. Null otherwise.
     *
     * @return string|null
     */
    public function getRejectionReason(): ?string
    {
        return $this->rejectionReason;
    }
    /**
     * Why the registration was rejected, when it was. Null otherwise.
     *
     * @param string|null $rejectionReason
     *
     * @return self
     */
    public function setRejectionReason(?string $rejectionReason): self
    {
        $this->initialized['rejectionReason'] = true;
        $this->rejectionReason = $rejectionReason;
        return $this;
    }
    /**
     * When this country's registration must be brought up to date by, if it must. Null when nothing is outstanding, which is the ordinary case. The sender keeps sending until the date passes; `GET /v1/compliance/requirements` says what is being asked for.
     * 
     *
     * @return \DateTime|null
     */
    public function getObligationDueAt(): ?\DateTime
    {
        return $this->obligationDueAt;
    }
    /**
     * When this country's registration must be brought up to date by, if it must. Null when nothing is outstanding, which is the ordinary case. The sender keeps sending until the date passes; `GET /v1/compliance/requirements` says what is being asked for.
     *
     * @param \DateTime|null $obligationDueAt
     *
     * @return self
     */
    public function setObligationDueAt(?\DateTime $obligationDueAt): self
    {
        $this->initialized['obligationDueAt'] = true;
        $this->obligationDueAt = $obligationDueAt;
        return $this;
    }
    /**
     * Shortest time approval usually takes, in business days. Null when the country publishes no estimate.
     *
     * @return int|null
     */
    public function getTimelineMinDays(): ?int
    {
        return $this->timelineMinDays;
    }
    /**
     * Shortest time approval usually takes, in business days. Null when the country publishes no estimate.
     *
     * @param int|null $timelineMinDays
     *
     * @return self
     */
    public function setTimelineMinDays(?int $timelineMinDays): self
    {
        $this->initialized['timelineMinDays'] = true;
        $this->timelineMinDays = $timelineMinDays;
        return $this;
    }
    /**
     * Longest time approval usually takes, in business days. Null when the country publishes no estimate.
     *
     * @return int|null
     */
    public function getTimelineMaxDays(): ?int
    {
        return $this->timelineMaxDays;
    }
    /**
     * Longest time approval usually takes, in business days. Null when the country publishes no estimate.
     *
     * @param int|null $timelineMaxDays
     *
     * @return self
     */
    public function setTimelineMaxDays(?int $timelineMaxDays): self
    {
        $this->initialized['timelineMaxDays'] = true;
        $this->timelineMaxDays = $timelineMaxDays;
        return $this;
    }
    /**
     * Registration categories this country's program accepts.
     *
     * @return list<string>|null
     */
    public function getRegistrationTypes(): ?array
    {
        return $this->registrationTypes;
    }
    /**
     * Registration categories this country's program accepts.
     *
     * @param list<string>|null $registrationTypes
     *
     * @return self
     */
    public function setRegistrationTypes(?array $registrationTypes): self
    {
        $this->initialized['registrationTypes'] = true;
        $this->registrationTypes = $registrationTypes;
        return $this;
    }
}
