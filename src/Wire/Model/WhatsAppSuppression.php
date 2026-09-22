<?php

namespace MessageBird\Wire\Model;

class WhatsAppSuppression
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
     * The suppressed WhatsApp address. For a phone number this is canonical E.164 with a leading plus sign, such as `+5511977670804`.
     * 
     *
     * @var string|null
     */
    protected $address;
    /**
     * The WhatsApp Business Account the suppression is limited to, identified by its WhatsApp-issued account ID, or null when it covers the whole workspace.
     * 
     *
     * @var string|null
     */
    protected $waba;
    /**
     * Why the address is suppressed. `manual` means it was added directly rather than created automatically from a delivery outcome. This list grows over time, so treat an unknown value as informational rather than rejecting the record.
     * 
     *
     * @var string|null
     */
    protected $reason;
    /**
     * How the suppression came to exist: `api_key` (added through the API with an API key) or `user` (added by a user in the dashboard). This list grows over time, so treat an unknown value as informational rather than rejecting the record.
     * 
     *
     * @var string|null
     */
    protected $origin;
    /**
     * Blocking policy. `all` blocks every message category. Treat an unrecognized value as blocking.
     * 
     *
     * @var string|null
     */
    protected $appliesTo;
    /**
     * ID of the WhatsApp message that caused this address to be suppressed, when the suppression was created automatically. Omitted for addresses added manually.
     *
     * @var string|null
     */
    protected $sourceWhatsappId;
    /**
     * When this stopped applying. Null while it is still stopping messages, which is the case for every record in the list.
     * 
     *
     * @var \DateTime|null
     */
    protected $endedAt;
    /**
     * What ended it: `api_key` (deleted through the API with an API key) or `user` (deleted by a user in the dashboard). Null while it is still stopping messages. This list grows over time, so treat an unknown value as informational rather than rejecting the record.
     * 
     *
     * @var string|null
     */
    protected $endedReason;
    /**
     * When the suppression was created.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
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
     * The suppressed WhatsApp address. For a phone number this is canonical E.164 with a leading plus sign, such as `+5511977670804`.
     * 
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    /**
     * The suppressed WhatsApp address. For a phone number this is canonical E.164 with a leading plus sign, such as `+5511977670804`.
     *
     * @param string|null $address
     *
     * @return self
     */
    public function setAddress(?string $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;
        return $this;
    }
    /**
     * The WhatsApp Business Account the suppression is limited to, identified by its WhatsApp-issued account ID, or null when it covers the whole workspace.
     * 
     *
     * @return string|null
     */
    public function getWaba(): ?string
    {
        return $this->waba;
    }
    /**
     * The WhatsApp Business Account the suppression is limited to, identified by its WhatsApp-issued account ID, or null when it covers the whole workspace.
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
     * Why the address is suppressed. `manual` means it was added directly rather than created automatically from a delivery outcome. This list grows over time, so treat an unknown value as informational rather than rejecting the record.
     * 
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
     * Why the address is suppressed. `manual` means it was added directly rather than created automatically from a delivery outcome. This list grows over time, so treat an unknown value as informational rather than rejecting the record.
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
     * How the suppression came to exist: `api_key` (added through the API with an API key) or `user` (added by a user in the dashboard). This list grows over time, so treat an unknown value as informational rather than rejecting the record.
     * 
     *
     * @return string|null
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }
    /**
     * How the suppression came to exist: `api_key` (added through the API with an API key) or `user` (added by a user in the dashboard). This list grows over time, so treat an unknown value as informational rather than rejecting the record.
     *
     * @param string|null $origin
     *
     * @return self
     */
    public function setOrigin(?string $origin): self
    {
        $this->initialized['origin'] = true;
        $this->origin = $origin;
        return $this;
    }
    /**
     * Blocking policy. `all` blocks every message category. Treat an unrecognized value as blocking.
     * 
     *
     * @return string|null
     */
    public function getAppliesTo(): ?string
    {
        return $this->appliesTo;
    }
    /**
     * Blocking policy. `all` blocks every message category. Treat an unrecognized value as blocking.
     *
     * @param string|null $appliesTo
     *
     * @return self
     */
    public function setAppliesTo(?string $appliesTo): self
    {
        $this->initialized['appliesTo'] = true;
        $this->appliesTo = $appliesTo;
        return $this;
    }
    /**
     * ID of the WhatsApp message that caused this address to be suppressed, when the suppression was created automatically. Omitted for addresses added manually.
     *
     * @return string|null
     */
    public function getSourceWhatsappId(): ?string
    {
        return $this->sourceWhatsappId;
    }
    /**
     * ID of the WhatsApp message that caused this address to be suppressed, when the suppression was created automatically. Omitted for addresses added manually.
     *
     * @param string|null $sourceWhatsappId
     *
     * @return self
     */
    public function setSourceWhatsappId(?string $sourceWhatsappId): self
    {
        $this->initialized['sourceWhatsappId'] = true;
        $this->sourceWhatsappId = $sourceWhatsappId;
        return $this;
    }
    /**
     * When this stopped applying. Null while it is still stopping messages, which is the case for every record in the list.
     * 
     *
     * @return \DateTime|null
     */
    public function getEndedAt(): ?\DateTime
    {
        return $this->endedAt;
    }
    /**
     * When this stopped applying. Null while it is still stopping messages, which is the case for every record in the list.
     *
     * @param \DateTime|null $endedAt
     *
     * @return self
     */
    public function setEndedAt(?\DateTime $endedAt): self
    {
        $this->initialized['endedAt'] = true;
        $this->endedAt = $endedAt;
        return $this;
    }
    /**
     * What ended it: `api_key` (deleted through the API with an API key) or `user` (deleted by a user in the dashboard). Null while it is still stopping messages. This list grows over time, so treat an unknown value as informational rather than rejecting the record.
     * 
     *
     * @return string|null
     */
    public function getEndedReason(): ?string
    {
        return $this->endedReason;
    }
    /**
     * What ended it: `api_key` (deleted through the API with an API key) or `user` (deleted by a user in the dashboard). Null while it is still stopping messages. This list grows over time, so treat an unknown value as informational rather than rejecting the record.
     *
     * @param string|null $endedReason
     *
     * @return self
     */
    public function setEndedReason(?string $endedReason): self
    {
        $this->initialized['endedReason'] = true;
        $this->endedReason = $endedReason;
        return $this;
    }
    /**
     * When the suppression was created.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the suppression was created.
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
}
