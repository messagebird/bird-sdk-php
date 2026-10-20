<?php

namespace MessageBird\Wire\Model;

class SMSSender
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
     * The value messages are sent from: a number in E.164 format, a shortcode, or an alphanumeric sender string.
     * 
     *
     * @var string|null
     */
    protected $sender;
    /**
     * @var string|null
     */
    protected $sourceKind;
    /**
     * The kind of sender identity this is, which decides what each destination country asks of it. It is finer than source_kind: a short code and an ordinary long code are both numbers but follow different rules.
     * 
     *
     * @var string|null
     */
    protected $senderType;
    /**
     * The country of the number this sender sends from. Null for an alphanumeric sender.
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * The number this sender sends from, as returned in the `id` field of `GET /v1/numbers`. Present only when `source_kind` is `number` or `shared_number`; an alphanumeric sender has no number behind it. Exactly one sender exists per number, so this is also how you go the other way: `GET /v1/sms/senders?number_id={id}` returns this sender.
     * 
     *
     * @var string|null
     */
    protected $numberId;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * What to do next about this sender, given the state it is in. Present on reads that
     * compute it: an empty list means there is nothing to do, and the field is absent entirely
     * on responses that do not report next actions.
     * 
     * This routes rather than advises. A sender only knows about itself, so where the work is
     * per-country it names the requirements read rather than guessing which country you meant.
     * 
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * @var SMSSenderDestinationsWrapper|null
     */
    protected $destinations;
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
     * The value messages are sent from: a number in E.164 format, a shortcode, or an alphanumeric sender string.
     * 
     *
     * @return string|null
     */
    public function getSender(): ?string
    {
        return $this->sender;
    }
    /**
     * The value messages are sent from: a number in E.164 format, a shortcode, or an alphanumeric sender string.
     *
     * @param string|null $sender
     *
     * @return self
     */
    public function setSender(?string $sender): self
    {
        $this->initialized['sender'] = true;
        $this->sender = $sender;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getSourceKind(): ?string
    {
        return $this->sourceKind;
    }
    /**
     * @param string|null $sourceKind
     *
     * @return self
     */
    public function setSourceKind(?string $sourceKind): self
    {
        $this->initialized['sourceKind'] = true;
        $this->sourceKind = $sourceKind;
        return $this;
    }
    /**
     * The kind of sender identity this is, which decides what each destination country asks of it. It is finer than source_kind: a short code and an ordinary long code are both numbers but follow different rules.
     * 
     *
     * @return string|null
     */
    public function getSenderType(): ?string
    {
        return $this->senderType;
    }
    /**
     * The kind of sender identity this is, which decides what each destination country asks of it. It is finer than source_kind: a short code and an ordinary long code are both numbers but follow different rules.
     *
     * @param string|null $senderType
     *
     * @return self
     */
    public function setSenderType(?string $senderType): self
    {
        $this->initialized['senderType'] = true;
        $this->senderType = $senderType;
        return $this;
    }
    /**
     * The country of the number this sender sends from. Null for an alphanumeric sender.
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * The country of the number this sender sends from. Null for an alphanumeric sender.
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
     * The number this sender sends from, as returned in the `id` field of `GET /v1/numbers`. Present only when `source_kind` is `number` or `shared_number`; an alphanumeric sender has no number behind it. Exactly one sender exists per number, so this is also how you go the other way: `GET /v1/sms/senders?number_id={id}` returns this sender.
     * 
     *
     * @return string|null
     */
    public function getNumberId(): ?string
    {
        return $this->numberId;
    }
    /**
     * The number this sender sends from, as returned in the `id` field of `GET /v1/numbers`. Present only when `source_kind` is `number` or `shared_number`; an alphanumeric sender has no number behind it. Exactly one sender exists per number, so this is also how you go the other way: `GET /v1/sms/senders?number_id={id}` returns this sender.
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
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
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
     * What to do next about this sender, given the state it is in. Present on reads that
     * compute it: an empty list means there is nothing to do, and the field is absent entirely
     * on responses that do not report next actions.
     * 
     * This routes rather than advises. A sender only knows about itself, so where the work is
     * per-country it names the requirements read rather than guessing which country you meant.
     * 
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
    * What to do next about this sender, given the state it is in. Present on reads that
    compute it: an empty list means there is nothing to do, and the field is absent entirely
    on responses that do not report next actions.
    
    This routes rather than advises. A sender only knows about itself, so where the work is
    per-country it names the requirements read rather than guessing which country you meant.
    
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
     * @return SMSSenderDestinationsWrapper|null
     */
    public function getDestinations(): ?SMSSenderDestinationsWrapper
    {
        return $this->destinations;
    }
    /**
     * @param SMSSenderDestinationsWrapper|SMSSenderDestinations|array|null $destinations
     *
     * @return self
     */
    public function setDestinations($destinations): self
    {
        $this->initialized['destinations'] = true;
        $this->destinations = \MessageBird\Core\ModelWrapper::normalize($destinations, SMSSenderDestinationsWrapper::class);
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
