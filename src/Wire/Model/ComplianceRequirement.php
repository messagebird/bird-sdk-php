<?php

namespace MessageBird\Wire\Model;

class ComplianceRequirement
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
     * What to do next about this country's requirements, given the state it is in. Each entry names one action and says
     * why it is worth taking, so you can act on this response without working out the order
     * yourself. Present on reads that compute it: an empty list means there is nothing to do,
     * and the field is absent entirely on responses that do not report next actions.
     * 
     * Whether anything is asked of you is `needs_input`, and this says what to do about it: send your
     * answers where none have been filed, or replace the ones that were refused. Which items those
     * are, and why each was refused, is on the item in `fields`. For feedback about the
     * whole submission, read `reason` and `general_reasons` and update the details that need correction.
     * 
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * @var string|null
     */
    protected $subjectKind;
    /**
     * The registration these requirements are for, the same one you asked about. `null` when you asked without one, which is how a form read on its own says it is answering for nothing yet.
     * 
     *
     * @var string|null
     */
    protected $subjectId;
    /**
     * The registration program these requirements belong to. `null` when the country runs no registration program at all, in which case nothing is required and the field list is empty.
     * 
     *
     * @var string|null
     */
    protected $program;
    /**
     * @var string|null
     */
    protected $countryCode;
    /**
     * Whether this country's requirements are met. `true` when no requirements apply, or once the submission is approved and every required requirement is approved or marked not applicable. This can remain true when an external verifier requests a correction. Once you submit that correction, it must pass review before this becomes true again, including any optional answers you change.
     * 
     *
     * @var bool|null
     */
    protected $satisfied;
    /**
     * Whether anything is waiting on you. True when a required requirement has no answer, its answer was refused or has gone stale, the registration needs correction as described by `reason`, or a closed submission accepts corrected details (`resubmission_allowed`). False does not imply that review is pending: a closed verifier correction can leave the requirements unsatisfied with no editable answers. Read `review_pending` to determine whether an answer is awaiting review. Read this independently of `satisfied`, which reports whether your paperwork is accepted. An unresolved verifier correction also sets it while the matching grant is live and the correction deadline has not passed, until you supply updated details. At the deadline or after grant withdrawal, an unresolved rejection alone does not set it because accepted answers can no longer be replaced. A corrected optional answer that is rejected or expires still needs your input through ordinary resupply, including after that deadline.
     * 
     *
     * @var bool|null
     */
    protected $needsInput;
    /**
     * Whether any submitted answer is awaiting or undergoing review. False after all answers have received verdicts. A closed verifier correction can remain unsatisfied with no review pending and no editable answers.
     * 
     *
     * @var bool|null
     */
    protected $reviewPending;
    /**
     * Whether you may change any answer, not only one that was refused or has gone stale. True for a number, business identity or SMS sender registration whose submission has not been approved yet, including answers awaiting review or already accepted, and for a closed submission when `resubmission_allowed` is true. An SMS sender registration goes to the carrier or registry when it is approved, so it stays editable only until then. A changed answer loses its verdict and is reviewed again. Send only the answers you change. False once the submission is approved: replace only answers in `fields` whose state is `not_supplied`, `rejected` or `expired`, or those marked `editable_for_verifier_repair`.
     * 
     *
     * @var bool|null
     */
    protected $answersEditable;
    /**
     * Whether Bird closed the previous submission but accepts corrected details for this registration. When `submission_id` is set, update that submission with your corrected answers and it is reviewed again. When `submission_id` is `null`, the form has changed since: create a new submission. `reason` says why the previous one was closed. False when nothing was closed, and when a closed submission cannot be sent again; contact support then.
     * 
     *
     * @var bool|null
     */
    protected $resubmissionAllowed;
    /**
     * What to correct about the registration as a whole, or null when no registration-wide correction is requested. Reasons about individual answers are on the entries in fields.
     * 
     *
     * @var string|null
     */
    protected $reason;
    /**
     * What this country expects of you before and while you fill in the form, written by Bird's compliance team. It may point you to a registration you must complete elsewhere first. `null` when the form needs no introduction, or when no program applies.
     * 
     *
     * @var string|null
     */
    protected $guidance;
    /**
     * The submission carrying your answers, once you have made one. `null` before that.
     *
     * @var string|null
     */
    protected $submissionId;
    /**
     * What this registration has to do to keep sending, and by when. Null when nothing is outstanding. An obligation does not stop you sending: the registration stays authorised until the date passes, and supplying what is asked for before then closes it with no interruption.
     * 
     *
     * @var ComplianceRequirementObligation|null
     */
    protected $obligation;
    /**
     * Feedback about the submission as a whole from an external verifier. It can remain visible while corrections are under review. Empty when no unresolved verifier feedback applies. On requirements responses, read `needs_input` to determine whether action is needed and `editable_for_verifier_repair` on each field to determine whether an approved or not-applicable answer can be replaced.
     * 
     *
     * @var list<string>|null
     */
    protected $generalReasons;
    /**
     * Every requirement for this country, in the order to present them.
     *
     * @var list<ComplianceRequirementField>|null
     */
    protected $fields;
    /**
     * When the submission for these requirements was closed. Null while open or not yet submitted.
     *
     * @var \DateTime|null
     */
    protected $closedAt;
    /**
     * What to do next about this country's requirements, given the state it is in. Each entry names one action and says
     * why it is worth taking, so you can act on this response without working out the order
     * yourself. Present on reads that compute it: an empty list means there is nothing to do,
     * and the field is absent entirely on responses that do not report next actions.
     * 
     * Whether anything is asked of you is `needs_input`, and this says what to do about it: send your
     * answers where none have been filed, or replace the ones that were refused. Which items those
     * are, and why each was refused, is on the item in `fields`. For feedback about the
     * whole submission, read `reason` and `general_reasons` and update the details that need correction.
     * 
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
    * What to do next about this country's requirements, given the state it is in. Each entry names one action and says
    why it is worth taking, so you can act on this response without working out the order
    yourself. Present on reads that compute it: an empty list means there is nothing to do,
    and the field is absent entirely on responses that do not report next actions.
    
    Whether anything is asked of you is `needs_input`, and this says what to do about it: send your
    answers where none have been filed, or replace the ones that were refused. Which items those
    are, and why each was refused, is on the item in `fields`. For feedback about the
    whole submission, read `reason` and `general_reasons` and update the details that need correction.
    
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
     * The registration these requirements are for, the same one you asked about. `null` when you asked without one, which is how a form read on its own says it is answering for nothing yet.
     * 
     *
     * @return string|null
     */
    public function getSubjectId(): ?string
    {
        return $this->subjectId;
    }
    /**
     * The registration these requirements are for, the same one you asked about. `null` when you asked without one, which is how a form read on its own says it is answering for nothing yet.
     *
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
     * The registration program these requirements belong to. `null` when the country runs no registration program at all, in which case nothing is required and the field list is empty.
     * 
     *
     * @return string|null
     */
    public function getProgram(): ?string
    {
        return $this->program;
    }
    /**
     * The registration program these requirements belong to. `null` when the country runs no registration program at all, in which case nothing is required and the field list is empty.
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
     * Whether this country's requirements are met. `true` when no requirements apply, or once the submission is approved and every required requirement is approved or marked not applicable. This can remain true when an external verifier requests a correction. Once you submit that correction, it must pass review before this becomes true again, including any optional answers you change.
     * 
     *
     * @return bool|null
     */
    public function getSatisfied(): ?bool
    {
        return $this->satisfied;
    }
    /**
     * Whether this country's requirements are met. `true` when no requirements apply, or once the submission is approved and every required requirement is approved or marked not applicable. This can remain true when an external verifier requests a correction. Once you submit that correction, it must pass review before this becomes true again, including any optional answers you change.
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
     * Whether anything is waiting on you. True when a required requirement has no answer, its answer was refused or has gone stale, the registration needs correction as described by `reason`, or a closed submission accepts corrected details (`resubmission_allowed`). False does not imply that review is pending: a closed verifier correction can leave the requirements unsatisfied with no editable answers. Read `review_pending` to determine whether an answer is awaiting review. Read this independently of `satisfied`, which reports whether your paperwork is accepted. An unresolved verifier correction also sets it while the matching grant is live and the correction deadline has not passed, until you supply updated details. At the deadline or after grant withdrawal, an unresolved rejection alone does not set it because accepted answers can no longer be replaced. A corrected optional answer that is rejected or expires still needs your input through ordinary resupply, including after that deadline.
     * 
     *
     * @return bool|null
     */
    public function getNeedsInput(): ?bool
    {
        return $this->needsInput;
    }
    /**
     * Whether anything is waiting on you. True when a required requirement has no answer, its answer was refused or has gone stale, the registration needs correction as described by `reason`, or a closed submission accepts corrected details (`resubmission_allowed`). False does not imply that review is pending: a closed verifier correction can leave the requirements unsatisfied with no editable answers. Read `review_pending` to determine whether an answer is awaiting review. Read this independently of `satisfied`, which reports whether your paperwork is accepted. An unresolved verifier correction also sets it while the matching grant is live and the correction deadline has not passed, until you supply updated details. At the deadline or after grant withdrawal, an unresolved rejection alone does not set it because accepted answers can no longer be replaced. A corrected optional answer that is rejected or expires still needs your input through ordinary resupply, including after that deadline.
     *
     * @param bool|null $needsInput
     *
     * @return self
     */
    public function setNeedsInput(?bool $needsInput): self
    {
        $this->initialized['needsInput'] = true;
        $this->needsInput = $needsInput;
        return $this;
    }
    /**
     * Whether any submitted answer is awaiting or undergoing review. False after all answers have received verdicts. A closed verifier correction can remain unsatisfied with no review pending and no editable answers.
     * 
     *
     * @return bool|null
     */
    public function getReviewPending(): ?bool
    {
        return $this->reviewPending;
    }
    /**
     * Whether any submitted answer is awaiting or undergoing review. False after all answers have received verdicts. A closed verifier correction can remain unsatisfied with no review pending and no editable answers.
     *
     * @param bool|null $reviewPending
     *
     * @return self
     */
    public function setReviewPending(?bool $reviewPending): self
    {
        $this->initialized['reviewPending'] = true;
        $this->reviewPending = $reviewPending;
        return $this;
    }
    /**
     * Whether you may change any answer, not only one that was refused or has gone stale. True for a number, business identity or SMS sender registration whose submission has not been approved yet, including answers awaiting review or already accepted, and for a closed submission when `resubmission_allowed` is true. An SMS sender registration goes to the carrier or registry when it is approved, so it stays editable only until then. A changed answer loses its verdict and is reviewed again. Send only the answers you change. False once the submission is approved: replace only answers in `fields` whose state is `not_supplied`, `rejected` or `expired`, or those marked `editable_for_verifier_repair`.
     * 
     *
     * @return bool|null
     */
    public function getAnswersEditable(): ?bool
    {
        return $this->answersEditable;
    }
    /**
     * Whether you may change any answer, not only one that was refused or has gone stale. True for a number, business identity or SMS sender registration whose submission has not been approved yet, including answers awaiting review or already accepted, and for a closed submission when `resubmission_allowed` is true. An SMS sender registration goes to the carrier or registry when it is approved, so it stays editable only until then. A changed answer loses its verdict and is reviewed again. Send only the answers you change. False once the submission is approved: replace only answers in `fields` whose state is `not_supplied`, `rejected` or `expired`, or those marked `editable_for_verifier_repair`.
     *
     * @param bool|null $answersEditable
     *
     * @return self
     */
    public function setAnswersEditable(?bool $answersEditable): self
    {
        $this->initialized['answersEditable'] = true;
        $this->answersEditable = $answersEditable;
        return $this;
    }
    /**
     * Whether Bird closed the previous submission but accepts corrected details for this registration. When `submission_id` is set, update that submission with your corrected answers and it is reviewed again. When `submission_id` is `null`, the form has changed since: create a new submission. `reason` says why the previous one was closed. False when nothing was closed, and when a closed submission cannot be sent again; contact support then.
     * 
     *
     * @return bool|null
     */
    public function getResubmissionAllowed(): ?bool
    {
        return $this->resubmissionAllowed;
    }
    /**
     * Whether Bird closed the previous submission but accepts corrected details for this registration. When `submission_id` is set, update that submission with your corrected answers and it is reviewed again. When `submission_id` is `null`, the form has changed since: create a new submission. `reason` says why the previous one was closed. False when nothing was closed, and when a closed submission cannot be sent again; contact support then.
     *
     * @param bool|null $resubmissionAllowed
     *
     * @return self
     */
    public function setResubmissionAllowed(?bool $resubmissionAllowed): self
    {
        $this->initialized['resubmissionAllowed'] = true;
        $this->resubmissionAllowed = $resubmissionAllowed;
        return $this;
    }
    /**
     * What to correct about the registration as a whole, or null when no registration-wide correction is requested. Reasons about individual answers are on the entries in fields.
     * 
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
     * What to correct about the registration as a whole, or null when no registration-wide correction is requested. Reasons about individual answers are on the entries in fields.
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
     * What this country expects of you before and while you fill in the form, written by Bird's compliance team. It may point you to a registration you must complete elsewhere first. `null` when the form needs no introduction, or when no program applies.
     * 
     *
     * @return string|null
     */
    public function getGuidance(): ?string
    {
        return $this->guidance;
    }
    /**
     * What this country expects of you before and while you fill in the form, written by Bird's compliance team. It may point you to a registration you must complete elsewhere first. `null` when the form needs no introduction, or when no program applies.
     *
     * @param string|null $guidance
     *
     * @return self
     */
    public function setGuidance(?string $guidance): self
    {
        $this->initialized['guidance'] = true;
        $this->guidance = $guidance;
        return $this;
    }
    /**
     * The submission carrying your answers, once you have made one. `null` before that.
     *
     * @return string|null
     */
    public function getSubmissionId(): ?string
    {
        return $this->submissionId;
    }
    /**
     * The submission carrying your answers, once you have made one. `null` before that.
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
     * What this registration has to do to keep sending, and by when. Null when nothing is outstanding. An obligation does not stop you sending: the registration stays authorised until the date passes, and supplying what is asked for before then closes it with no interruption.
     * 
     *
     * @return ComplianceRequirementObligation|null
     */
    public function getObligation(): ?ComplianceRequirementObligation
    {
        return $this->obligation;
    }
    /**
     * What this registration has to do to keep sending, and by when. Null when nothing is outstanding. An obligation does not stop you sending: the registration stays authorised until the date passes, and supplying what is asked for before then closes it with no interruption.
     *
     * @param ComplianceRequirementObligation|null $obligation
     *
     * @return self
     */
    public function setObligation(?ComplianceRequirementObligation $obligation): self
    {
        $this->initialized['obligation'] = true;
        $this->obligation = $obligation;
        return $this;
    }
    /**
     * Feedback about the submission as a whole from an external verifier. It can remain visible while corrections are under review. Empty when no unresolved verifier feedback applies. On requirements responses, read `needs_input` to determine whether action is needed and `editable_for_verifier_repair` on each field to determine whether an approved or not-applicable answer can be replaced.
     * 
     *
     * @return list<string>|null
     */
    public function getGeneralReasons(): ?array
    {
        return $this->generalReasons;
    }
    /**
     * Feedback about the submission as a whole from an external verifier. It can remain visible while corrections are under review. Empty when no unresolved verifier feedback applies. On requirements responses, read `needs_input` to determine whether action is needed and `editable_for_verifier_repair` on each field to determine whether an approved or not-applicable answer can be replaced.
     *
     * @param list<string>|null $generalReasons
     *
     * @return self
     */
    public function setGeneralReasons(?array $generalReasons): self
    {
        $this->initialized['generalReasons'] = true;
        $this->generalReasons = $generalReasons;
        return $this;
    }
    /**
     * Every requirement for this country, in the order to present them.
     *
     * @return list<ComplianceRequirementField>|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }
    /**
     * Every requirement for this country, in the order to present them.
     *
     * @param list<ComplianceRequirementField>|null $fields
     *
     * @return self
     */
    public function setFields(?array $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;
        return $this;
    }
    /**
     * When the submission for these requirements was closed. Null while open or not yet submitted.
     *
     * @return \DateTime|null
     */
    public function getClosedAt(): ?\DateTime
    {
        return $this->closedAt;
    }
    /**
     * When the submission for these requirements was closed. Null while open or not yet submitted.
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
}
