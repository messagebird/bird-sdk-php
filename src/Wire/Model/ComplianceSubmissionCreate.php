<?php

namespace MessageBird\Wire\Model;

class ComplianceSubmissionCreate
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
     * What is being registered.
     * 
     * - `sms_sender`: a sender registered to send to one country.
     * - `number`: a phone number you hold that needs ownership paperwork before it
     *   can carry traffic.
     * - `identity`: a business you operate as, registered once and reused by
     *   later registrations that name it.
     * 
     *
     * @var string|null
     */
    protected $subjectKind;
    /**
     * What is being registered. For `sms_sender` this is the `scr_` id returned when you register a sender for a country. For `number` it is the `nda_` id of a dedicated number you hold, as returned by `GET /v1/numbers`. A shared short code (`nal_`) is not accepted: it is shared, so its ownership paperwork is not yours to file. For `identity` it is the `cid_` id of the party being registered, picked from the parties your workspace holds, as returned by `GET /v1/compliance/identities`.
     * 
     *
     * @var string|null
     */
    protected $subjectId;
    /**
     * The registration program a country runs. Available programs depend on the registered resource. An SMS sender registers under an authority regime (`alpha` or `numeric`). A phone number proves ownership under its number type (`mobile`, `local`, `national`, `short_code`, `short_code_fteu`, or `toll_free`), matching the values of `NumberType`. An identity registers your business itself under `business`, internationally: its coordinate's country is always `ZZ`. A value is therefore only meaningful alongside the subject it describes. More are added as coverage grows, so treat this as an open set rather than a fixed list.
     * 
     *
     * @var string|null
     */
    protected $program;
    /**
     * ISO 3166-1 alpha-2 country code.
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * An existing party this registration is for. It fills in the business details you left out from what that party already holds, and each single-value answer you file about the party is written back onto it for next time, whatever the verdict. Documents and multi-value answers are asked fresh each time. Send this or `identity`, never both. An id belonging to another organization is rejected; nothing is created here. When `subject_kind` is `identity`, send neither: `subject_id` already names the party.
     *
     * @var string|null
     */
    protected $identityId;
    /**
     * Registers this on behalf of a party you have not stored yet, creating it as part
     * of the submission so you do not need a separate call. Exclusive with
     * `identity_id`.
     * 
     * Each time you send this you get a new party. Single-value identity answers filed for one
     * are reused by registrations naming the same party. Documents and lists are
     * supplied separately for each registration. Send this once and use the
     * `identity_id` from the response for the countries that follow.
     * 
     *
     * @var ComplianceSubmissionIdentity|null
     */
    protected $identity;
    /**
     * Every answer at once. Because submissions have no multi-call draft, send a complete set. Anything missing or malformed comes back named. A requirement the named party already answers may be left out; one you send anyway wins over what the party holds.
     * 
     *
     * @var list<ComplianceAnswer>|null
     */
    protected $answers;
    /**
     * What is being registered.
     * 
     * - `sms_sender`: a sender registered to send to one country.
     * - `number`: a phone number you hold that needs ownership paperwork before it
     *   can carry traffic.
     * - `identity`: a business you operate as, registered once and reused by
     *   later registrations that name it.
     * 
     *
     * @return string|null
     */
    public function getSubjectKind(): ?string
    {
        return $this->subjectKind;
    }
    /**
    * What is being registered.
    
    - `sms_sender`: a sender registered to send to one country.
    - `number`: a phone number you hold that needs ownership paperwork before it
     can carry traffic.
    - `identity`: a business you operate as, registered once and reused by
     later registrations that name it.
    
    *
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
     * What is being registered. For `sms_sender` this is the `scr_` id returned when you register a sender for a country. For `number` it is the `nda_` id of a dedicated number you hold, as returned by `GET /v1/numbers`. A shared short code (`nal_`) is not accepted: it is shared, so its ownership paperwork is not yours to file. For `identity` it is the `cid_` id of the party being registered, picked from the parties your workspace holds, as returned by `GET /v1/compliance/identities`.
     * 
     *
     * @return string|null
     */
    public function getSubjectId(): ?string
    {
        return $this->subjectId;
    }
    /**
     * What is being registered. For `sms_sender` this is the `scr_` id returned when you register a sender for a country. For `number` it is the `nda_` id of a dedicated number you hold, as returned by `GET /v1/numbers`. A shared short code (`nal_`) is not accepted: it is shared, so its ownership paperwork is not yours to file. For `identity` it is the `cid_` id of the party being registered, picked from the parties your workspace holds, as returned by `GET /v1/compliance/identities`.
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
     * The registration program a country runs. Available programs depend on the registered resource. An SMS sender registers under an authority regime (`alpha` or `numeric`). A phone number proves ownership under its number type (`mobile`, `local`, `national`, `short_code`, `short_code_fteu`, or `toll_free`), matching the values of `NumberType`. An identity registers your business itself under `business`, internationally: its coordinate's country is always `ZZ`. A value is therefore only meaningful alongside the subject it describes. More are added as coverage grows, so treat this as an open set rather than a fixed list.
     * 
     *
     * @return string|null
     */
    public function getProgram(): ?string
    {
        return $this->program;
    }
    /**
     * The registration program a country runs. Available programs depend on the registered resource. An SMS sender registers under an authority regime (`alpha` or `numeric`). A phone number proves ownership under its number type (`mobile`, `local`, `national`, `short_code`, `short_code_fteu`, or `toll_free`), matching the values of `NumberType`. An identity registers your business itself under `business`, internationally: its coordinate's country is always `ZZ`. A value is therefore only meaningful alongside the subject it describes. More are added as coverage grows, so treat this as an open set rather than a fixed list.
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
     * ISO 3166-1 alpha-2 country code.
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * ISO 3166-1 alpha-2 country code.
     *
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
     * An existing party this registration is for. It fills in the business details you left out from what that party already holds, and each single-value answer you file about the party is written back onto it for next time, whatever the verdict. Documents and multi-value answers are asked fresh each time. Send this or `identity`, never both. An id belonging to another organization is rejected; nothing is created here. When `subject_kind` is `identity`, send neither: `subject_id` already names the party.
     *
     * @return string|null
     */
    public function getIdentityId(): ?string
    {
        return $this->identityId;
    }
    /**
     * An existing party this registration is for. It fills in the business details you left out from what that party already holds, and each single-value answer you file about the party is written back onto it for next time, whatever the verdict. Documents and multi-value answers are asked fresh each time. Send this or `identity`, never both. An id belonging to another organization is rejected; nothing is created here. When `subject_kind` is `identity`, send neither: `subject_id` already names the party.
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
     * Registers this on behalf of a party you have not stored yet, creating it as part
     * of the submission so you do not need a separate call. Exclusive with
     * `identity_id`.
     * 
     * Each time you send this you get a new party. Single-value identity answers filed for one
     * are reused by registrations naming the same party. Documents and lists are
     * supplied separately for each registration. Send this once and use the
     * `identity_id` from the response for the countries that follow.
     * 
     *
     * @return ComplianceSubmissionIdentity|null
     */
    public function getIdentity(): ?ComplianceSubmissionIdentity
    {
        return $this->identity;
    }
    /**
    * Registers this on behalf of a party you have not stored yet, creating it as part
    of the submission so you do not need a separate call. Exclusive with
    `identity_id`.
    
    Each time you send this you get a new party. Single-value identity answers filed for one
    are reused by registrations naming the same party. Documents and lists are
    supplied separately for each registration. Send this once and use the
    `identity_id` from the response for the countries that follow.
    
    *
    * @param ComplianceSubmissionIdentity|null $identity
    *
    * @return self
    */
    public function setIdentity(?ComplianceSubmissionIdentity $identity): self
    {
        $this->initialized['identity'] = true;
        $this->identity = $identity;
        return $this;
    }
    /**
     * Every answer at once. Because submissions have no multi-call draft, send a complete set. Anything missing or malformed comes back named. A requirement the named party already answers may be left out; one you send anyway wins over what the party holds.
     * 
     *
     * @return list<ComplianceAnswer>|null
     */
    public function getAnswers(): ?array
    {
        return $this->answers;
    }
    /**
     * Every answer at once. Because submissions have no multi-call draft, send a complete set. Anything missing or malformed comes back named. A requirement the named party already answers may be left out; one you send anyway wins over what the party holds.
     *
     * @param list<ComplianceAnswer>|null $answers
     *
     * @return self
     */
    public function setAnswers(?array $answers): self
    {
        $this->initialized['answers'] = true;
        $this->answers = $answers;
        return $this;
    }
}
