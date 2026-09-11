<?php

namespace MessageBird\Wire\Model;

class WhatsAppNumber
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
     * Unique identifier for the connected number.
     *
     * @var string|null
     */
    protected $id;
    /**
     * The WhatsApp Business Account this number is connected under. Present only for a number your workspace connected itself.
     * 
     *
     * @var string|null
     */
    protected $waba;
    /**
     * The number in E.164 format. Null only while the number itself is not yet known: a number your workspace holds carries its E.164 from the moment setup starts, so a value here does not mean the number can send. `status` is what says that.
     * 
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * The number you hold with us that this WhatsApp number was connected from, as its id in GET /v1/numbers. Absent for a number you brought yourself.
     * 
     *
     * @var string|null
     */
    protected $numberId;
    /**
     * Your workspace's own label for this number, given when it was connected and changeable afterwards. It has no bearing on what WhatsApp displays to people the number messages; `GET /v1/whatsapp/numbers/{number_id}/profile` returns that as `display_name`. For a number we operate on your behalf, this is our own label instead and cannot be changed.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * Whether the number sends under a WhatsApp Business Account we operate on your behalf (`system`) or one your workspace connected itself (`workspace`).
     * 
     *
     * @var string|null
     */
    protected $scope;
    /**
     * The country this number's message content is stored at rest in, as its two-letter ISO 3166 code. Absent when it uses WhatsApp's default storage. It can differ from the region requested at connection when WhatsApp requires a particular country for the number.
     * 
     *
     * @var string|null
     */
    protected $dataLocalizationRegion;
    /**
     * WhatsApp's own state for this number as of `meta_synced_at`, except for the three states we answer ourselves because WhatsApp holds nothing to report. A connection we are still verifying reads `preparing`, one waiting for someone to finish signup reads `awaiting_signup`, and a permanently refused one reads `failed`, with `error` saying why. `pending` is WhatsApp's own token for a number it does not hold as registered, and is also what a number with no stored WhatsApp status reads, including after setup completes, so it does not by itself establish whether setup is complete. A number we operate on your behalf reads `connected` as our own assertion rather than a reading from WhatsApp for every number we ship today; that tier carries no `meta_synced_at`.
     *
     * @var string|null
     */
    protected $status;
    /**
     * What to do next about this number, given the state it is in. Each entry names one
     * action and says why it is worth taking, so you can act on this response without
     * working out the order yourself. Present on reads that compute it: an empty list
     * means there is nothing to do, and the field is absent entirely on responses that
     * do not report next actions.
     * 
     * While `status` is `awaiting_signup` this carries the browser step that finishes
     * the connection, because embedded signup sits behind an OAuth screen no API call
     * can stand in for.
     * 
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * Why this number's connection was refused for good. Present only while `status` is `failed`. A retryable step records its cause on a still-`pending` number without setting this field, because that cause is not a refusal yet, so a connection you are still waiting on reports no error here.
     *
     * @var WhatsAppNumberError|null
     */
    protected $error;
    /**
     * Where a person finishes connecting this number, present only while `status` is `awaiting_signup`. Finishing means completing WhatsApp's embedded signup, which is a browser flow behind an OAuth screen: it cannot be done over the API, so open this link and have someone with access to the workspace complete it. The number is offered to them already verified. Once they finish, `status` moves on and this link is no longer returned.
     *
     * @var string|null
     */
    protected $finishSetupUrl;
    /**
     * WhatsApp's quality rating for this number as of `meta_synced_at`. Absent until WhatsApp has reported one, and always absent for a number we operate on your behalf.
     *
     * @var string|null
     */
    protected $qualityRating;
    /**
     * The messaging limit WhatsApp applied to this number's business portfolio as of `meta_synced_at`. Absent until WhatsApp has reported one, and always absent for a number we operate on your behalf.
     *
     * @var string|null
     */
    protected $messagingLimit;
    /**
     * The send rate WhatsApp allowed this number as of `meta_synced_at`. Absent until WhatsApp has reported one, and always absent for a number we operate on your behalf.
     *
     * @var string|null
     */
    protected $throughputLevel;
    /**
     * Whether WhatsApp grants this number Official Business Account status as of `meta_synced_at`. Absent until WhatsApp has reported it, and always absent for a number we operate on your behalf. WhatsApp grants the status per number, so two numbers on one WhatsApp Business Account can differ. The status also decides whether a rename is possible here: a number that has it cannot be renamed through `PATCH /v1/whatsapp/numbers/{number_id}/profile` at all, and has to be renamed through WhatsApp support instead.
     *
     * @var bool|null
     */
    protected $isOfficialBusinessAccount;
    /**
     * When this number's state was last read from WhatsApp. `status`, `quality_rating`, `messaging_limit`, `throughput_level`, and `is_official_business_account` all belong to that reading rather than representing live values. We re-read roughly hourly, so a change at WhatsApp can be up to an hour old here. Absent for a number we have never read back and for a number we operate on your behalf.
     *
     * @var \DateTime|null
     */
    protected $metaSyncedAt;
    /**
     * When we last asked WhatsApp to send this number a verification code, which we do only for a number your workspace connected itself from a number you hold with us. Absent for a number we operate on your behalf, and for one you connected through Embedded Signup with a code you read yourself. Wait a few hours after this before repairing a number whose verification failed: WhatsApp rotates the routes it verifies over during that period, and throttles a number asked repeatedly in a short window. Distinct from `updated_at`, which any change to the number moves.
     *
     * @var \DateTime|null
     */
    protected $preVerificationRequestedAt;
    /**
     * When this number was submitted for connection.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When this number was last changed.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Unique identifier for the connected number.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Unique identifier for the connected number.
     *
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
     * The WhatsApp Business Account this number is connected under. Present only for a number your workspace connected itself.
     * 
     *
     * @return string|null
     */
    public function getWaba(): ?string
    {
        return $this->waba;
    }
    /**
     * The WhatsApp Business Account this number is connected under. Present only for a number your workspace connected itself.
     *
     * @param string|null $waba
     *
     * @return self
     */
    public function setWaba(?string $waba): self
    {
        $this->initialized['waba'] = true;
        $this->waba = $waba;
        return $this;
    }
    /**
     * The number in E.164 format. Null only while the number itself is not yet known: a number your workspace holds carries its E.164 from the moment setup starts, so a value here does not mean the number can send. `status` is what says that.
     * 
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * The number in E.164 format. Null only while the number itself is not yet known: a number your workspace holds carries its E.164 from the moment setup starts, so a value here does not mean the number can send. `status` is what says that.
     *
     * @param string|null $phoneNumber
     *
     * @return self
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->initialized['phoneNumber'] = true;
        $this->phoneNumber = $phoneNumber;
        return $this;
    }
    /**
     * The number you hold with us that this WhatsApp number was connected from, as its id in GET /v1/numbers. Absent for a number you brought yourself.
     * 
     *
     * @return string|null
     */
    public function getNumberId(): ?string
    {
        return $this->numberId;
    }
    /**
     * The number you hold with us that this WhatsApp number was connected from, as its id in GET /v1/numbers. Absent for a number you brought yourself.
     *
     * @param string|null $numberId
     *
     * @return self
     */
    public function setNumberId(?string $numberId): self
    {
        $this->initialized['numberId'] = true;
        $this->numberId = $numberId;
        return $this;
    }
    /**
     * Your workspace's own label for this number, given when it was connected and changeable afterwards. It has no bearing on what WhatsApp displays to people the number messages; `GET /v1/whatsapp/numbers/{number_id}/profile` returns that as `display_name`. For a number we operate on your behalf, this is our own label instead and cannot be changed.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Your workspace's own label for this number, given when it was connected and changeable afterwards. It has no bearing on what WhatsApp displays to people the number messages; `GET /v1/whatsapp/numbers/{number_id}/profile` returns that as `display_name`. For a number we operate on your behalf, this is our own label instead and cannot be changed.
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
     * Whether the number sends under a WhatsApp Business Account we operate on your behalf (`system`) or one your workspace connected itself (`workspace`).
     * 
     *
     * @return string|null
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }
    /**
     * Whether the number sends under a WhatsApp Business Account we operate on your behalf (`system`) or one your workspace connected itself (`workspace`).
     *
     * @param string|null $scope
     *
     * @return self
     */
    public function setScope(?string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
    /**
     * The country this number's message content is stored at rest in, as its two-letter ISO 3166 code. Absent when it uses WhatsApp's default storage. It can differ from the region requested at connection when WhatsApp requires a particular country for the number.
     * 
     *
     * @return string|null
     */
    public function getDataLocalizationRegion(): ?string
    {
        return $this->dataLocalizationRegion;
    }
    /**
     * The country this number's message content is stored at rest in, as its two-letter ISO 3166 code. Absent when it uses WhatsApp's default storage. It can differ from the region requested at connection when WhatsApp requires a particular country for the number.
     *
     * @param string|null $dataLocalizationRegion
     *
     * @return self
     */
    public function setDataLocalizationRegion(?string $dataLocalizationRegion): self
    {
        $this->initialized['dataLocalizationRegion'] = true;
        $this->dataLocalizationRegion = $dataLocalizationRegion;
        return $this;
    }
    /**
     * WhatsApp's own state for this number as of `meta_synced_at`, except for the three states we answer ourselves because WhatsApp holds nothing to report. A connection we are still verifying reads `preparing`, one waiting for someone to finish signup reads `awaiting_signup`, and a permanently refused one reads `failed`, with `error` saying why. `pending` is WhatsApp's own token for a number it does not hold as registered, and is also what a number with no stored WhatsApp status reads, including after setup completes, so it does not by itself establish whether setup is complete. A number we operate on your behalf reads `connected` as our own assertion rather than a reading from WhatsApp for every number we ship today; that tier carries no `meta_synced_at`.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * WhatsApp's own state for this number as of `meta_synced_at`, except for the three states we answer ourselves because WhatsApp holds nothing to report. A connection we are still verifying reads `preparing`, one waiting for someone to finish signup reads `awaiting_signup`, and a permanently refused one reads `failed`, with `error` saying why. `pending` is WhatsApp's own token for a number it does not hold as registered, and is also what a number with no stored WhatsApp status reads, including after setup completes, so it does not by itself establish whether setup is complete. A number we operate on your behalf reads `connected` as our own assertion rather than a reading from WhatsApp for every number we ship today; that tier carries no `meta_synced_at`.
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
     * What to do next about this number, given the state it is in. Each entry names one
     * action and says why it is worth taking, so you can act on this response without
     * working out the order yourself. Present on reads that compute it: an empty list
     * means there is nothing to do, and the field is absent entirely on responses that
     * do not report next actions.
     * 
     * While `status` is `awaiting_signup` this carries the browser step that finishes
     * the connection, because embedded signup sits behind an OAuth screen no API call
     * can stand in for.
     * 
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
    * What to do next about this number, given the state it is in. Each entry names one
    action and says why it is worth taking, so you can act on this response without
    working out the order yourself. Present on reads that compute it: an empty list
    means there is nothing to do, and the field is absent entirely on responses that
    do not report next actions.
    
    While `status` is `awaiting_signup` this carries the browser step that finishes
    the connection, because embedded signup sits behind an OAuth screen no API call
    can stand in for.
    
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
     * Why this number's connection was refused for good. Present only while `status` is `failed`. A retryable step records its cause on a still-`pending` number without setting this field, because that cause is not a refusal yet, so a connection you are still waiting on reports no error here.
     *
     * @return WhatsAppNumberError|null
     */
    public function getError(): ?WhatsAppNumberError
    {
        return $this->error;
    }
    /**
     * Why this number's connection was refused for good. Present only while `status` is `failed`. A retryable step records its cause on a still-`pending` number without setting this field, because that cause is not a refusal yet, so a connection you are still waiting on reports no error here.
     *
     * @param WhatsAppNumberError|null $error
     *
     * @return self
     */
    public function setError(?WhatsAppNumberError $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;
        return $this;
    }
    /**
     * Where a person finishes connecting this number, present only while `status` is `awaiting_signup`. Finishing means completing WhatsApp's embedded signup, which is a browser flow behind an OAuth screen: it cannot be done over the API, so open this link and have someone with access to the workspace complete it. The number is offered to them already verified. Once they finish, `status` moves on and this link is no longer returned.
     *
     * @return string|null
     */
    public function getFinishSetupUrl(): ?string
    {
        return $this->finishSetupUrl;
    }
    /**
     * Where a person finishes connecting this number, present only while `status` is `awaiting_signup`. Finishing means completing WhatsApp's embedded signup, which is a browser flow behind an OAuth screen: it cannot be done over the API, so open this link and have someone with access to the workspace complete it. The number is offered to them already verified. Once they finish, `status` moves on and this link is no longer returned.
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
    /**
     * WhatsApp's quality rating for this number as of `meta_synced_at`. Absent until WhatsApp has reported one, and always absent for a number we operate on your behalf.
     *
     * @return string|null
     */
    public function getQualityRating(): ?string
    {
        return $this->qualityRating;
    }
    /**
     * WhatsApp's quality rating for this number as of `meta_synced_at`. Absent until WhatsApp has reported one, and always absent for a number we operate on your behalf.
     *
     * @param string|null $qualityRating
     *
     * @return self
     */
    public function setQualityRating(?string $qualityRating): self
    {
        $this->initialized['qualityRating'] = true;
        $this->qualityRating = $qualityRating;
        return $this;
    }
    /**
     * The messaging limit WhatsApp applied to this number's business portfolio as of `meta_synced_at`. Absent until WhatsApp has reported one, and always absent for a number we operate on your behalf.
     *
     * @return string|null
     */
    public function getMessagingLimit(): ?string
    {
        return $this->messagingLimit;
    }
    /**
     * The messaging limit WhatsApp applied to this number's business portfolio as of `meta_synced_at`. Absent until WhatsApp has reported one, and always absent for a number we operate on your behalf.
     *
     * @param string|null $messagingLimit
     *
     * @return self
     */
    public function setMessagingLimit(?string $messagingLimit): self
    {
        $this->initialized['messagingLimit'] = true;
        $this->messagingLimit = $messagingLimit;
        return $this;
    }
    /**
     * The send rate WhatsApp allowed this number as of `meta_synced_at`. Absent until WhatsApp has reported one, and always absent for a number we operate on your behalf.
     *
     * @return string|null
     */
    public function getThroughputLevel(): ?string
    {
        return $this->throughputLevel;
    }
    /**
     * The send rate WhatsApp allowed this number as of `meta_synced_at`. Absent until WhatsApp has reported one, and always absent for a number we operate on your behalf.
     *
     * @param string|null $throughputLevel
     *
     * @return self
     */
    public function setThroughputLevel(?string $throughputLevel): self
    {
        $this->initialized['throughputLevel'] = true;
        $this->throughputLevel = $throughputLevel;
        return $this;
    }
    /**
     * Whether WhatsApp grants this number Official Business Account status as of `meta_synced_at`. Absent until WhatsApp has reported it, and always absent for a number we operate on your behalf. WhatsApp grants the status per number, so two numbers on one WhatsApp Business Account can differ. The status also decides whether a rename is possible here: a number that has it cannot be renamed through `PATCH /v1/whatsapp/numbers/{number_id}/profile` at all, and has to be renamed through WhatsApp support instead.
     *
     * @return bool|null
     */
    public function getIsOfficialBusinessAccount(): ?bool
    {
        return $this->isOfficialBusinessAccount;
    }
    /**
     * Whether WhatsApp grants this number Official Business Account status as of `meta_synced_at`. Absent until WhatsApp has reported it, and always absent for a number we operate on your behalf. WhatsApp grants the status per number, so two numbers on one WhatsApp Business Account can differ. The status also decides whether a rename is possible here: a number that has it cannot be renamed through `PATCH /v1/whatsapp/numbers/{number_id}/profile` at all, and has to be renamed through WhatsApp support instead.
     *
     * @param bool|null $isOfficialBusinessAccount
     *
     * @return self
     */
    public function setIsOfficialBusinessAccount(?bool $isOfficialBusinessAccount): self
    {
        $this->initialized['isOfficialBusinessAccount'] = true;
        $this->isOfficialBusinessAccount = $isOfficialBusinessAccount;
        return $this;
    }
    /**
     * When this number's state was last read from WhatsApp. `status`, `quality_rating`, `messaging_limit`, `throughput_level`, and `is_official_business_account` all belong to that reading rather than representing live values. We re-read roughly hourly, so a change at WhatsApp can be up to an hour old here. Absent for a number we have never read back and for a number we operate on your behalf.
     *
     * @return \DateTime|null
     */
    public function getMetaSyncedAt(): ?\DateTime
    {
        return $this->metaSyncedAt;
    }
    /**
     * When this number's state was last read from WhatsApp. `status`, `quality_rating`, `messaging_limit`, `throughput_level`, and `is_official_business_account` all belong to that reading rather than representing live values. We re-read roughly hourly, so a change at WhatsApp can be up to an hour old here. Absent for a number we have never read back and for a number we operate on your behalf.
     *
     * @param \DateTime|null $metaSyncedAt
     *
     * @return self
     */
    public function setMetaSyncedAt(?\DateTime $metaSyncedAt): self
    {
        $this->initialized['metaSyncedAt'] = true;
        $this->metaSyncedAt = $metaSyncedAt;
        return $this;
    }
    /**
     * When we last asked WhatsApp to send this number a verification code, which we do only for a number your workspace connected itself from a number you hold with us. Absent for a number we operate on your behalf, and for one you connected through Embedded Signup with a code you read yourself. Wait a few hours after this before repairing a number whose verification failed: WhatsApp rotates the routes it verifies over during that period, and throttles a number asked repeatedly in a short window. Distinct from `updated_at`, which any change to the number moves.
     *
     * @return \DateTime|null
     */
    public function getPreVerificationRequestedAt(): ?\DateTime
    {
        return $this->preVerificationRequestedAt;
    }
    /**
     * When we last asked WhatsApp to send this number a verification code, which we do only for a number your workspace connected itself from a number you hold with us. Absent for a number we operate on your behalf, and for one you connected through Embedded Signup with a code you read yourself. Wait a few hours after this before repairing a number whose verification failed: WhatsApp rotates the routes it verifies over during that period, and throttles a number asked repeatedly in a short window. Distinct from `updated_at`, which any change to the number moves.
     *
     * @param \DateTime|null $preVerificationRequestedAt
     *
     * @return self
     */
    public function setPreVerificationRequestedAt(?\DateTime $preVerificationRequestedAt): self
    {
        $this->initialized['preVerificationRequestedAt'] = true;
        $this->preVerificationRequestedAt = $preVerificationRequestedAt;
        return $this;
    }
    /**
     * When this number was submitted for connection.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When this number was submitted for connection.
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
     * When this number was last changed.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When this number was last changed.
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
}
