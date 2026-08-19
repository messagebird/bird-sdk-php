<?php

namespace MessageBird\Wire\Model;

class SMSEvent
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
     * Unique identifier for this event, stable across repeated fetches of the message.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Lifecycle event type. The `sms.accepted` event means the API accepted the request. The `sms.sent` event means the message reached the carrier. The `sms.delivered` event confirms delivery. The `sms.undelivered`, `sms.failed`, and `sms.expired` events describe delivery failures. The `sms.rejected` event means the message was refused before carrier handoff. This is an open enum. Accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * When this event occurred.
     *
     * @var \DateTime|null
     */
    protected $occurredAt;
    /**
     * Carrier that handled the message. Present on `sms.sent` and `sms.delivered` once identified, absent otherwise.
     *
     * @var string|null
     */
    protected $carrier;
    /**
     * Mobile country code and mobile network code of the carrier. Present on `sms.sent` and `sms.delivered` once identified, absent otherwise.
     *
     * @var string|null
     */
    protected $mccMnc;
    /**
     * Failure detail for a message that could not be delivered or was rejected.
     *
     * @var SMSError|null
     */
    protected $error;
    /**
     * Unique identifier for this event, stable across repeated fetches of the message.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Unique identifier for this event, stable across repeated fetches of the message.
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
     * Lifecycle event type. The `sms.accepted` event means the API accepted the request. The `sms.sent` event means the message reached the carrier. The `sms.delivered` event confirms delivery. The `sms.undelivered`, `sms.failed`, and `sms.expired` events describe delivery failures. The `sms.rejected` event means the message was refused before carrier handoff. This is an open enum. Accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Lifecycle event type. The `sms.accepted` event means the API accepted the request. The `sms.sent` event means the message reached the carrier. The `sms.delivered` event confirms delivery. The `sms.undelivered`, `sms.failed`, and `sms.expired` events describe delivery failures. The `sms.rejected` event means the message was refused before carrier handoff. This is an open enum. Accept unrecognized values.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * When this event occurred.
     *
     * @return \DateTime|null
     */
    public function getOccurredAt(): ?\DateTime
    {
        return $this->occurredAt;
    }
    /**
     * When this event occurred.
     *
     * @param \DateTime|null $occurredAt
     *
     * @return self
     */
    public function setOccurredAt(?\DateTime $occurredAt): self
    {
        $this->initialized['occurredAt'] = true;
        $this->occurredAt = $occurredAt;
        return $this;
    }
    /**
     * Carrier that handled the message. Present on `sms.sent` and `sms.delivered` once identified, absent otherwise.
     *
     * @return string|null
     */
    public function getCarrier(): ?string
    {
        return $this->carrier;
    }
    /**
     * Carrier that handled the message. Present on `sms.sent` and `sms.delivered` once identified, absent otherwise.
     *
     * @param string|null $carrier
     *
     * @return self
     */
    public function setCarrier(?string $carrier): self
    {
        $this->initialized['carrier'] = true;
        $this->carrier = $carrier;
        return $this;
    }
    /**
     * Mobile country code and mobile network code of the carrier. Present on `sms.sent` and `sms.delivered` once identified, absent otherwise.
     *
     * @return string|null
     */
    public function getMccMnc(): ?string
    {
        return $this->mccMnc;
    }
    /**
     * Mobile country code and mobile network code of the carrier. Present on `sms.sent` and `sms.delivered` once identified, absent otherwise.
     *
     * @param string|null $mccMnc
     *
     * @return self
     */
    public function setMccMnc(?string $mccMnc): self
    {
        $this->initialized['mccMnc'] = true;
        $this->mccMnc = $mccMnc;
        return $this;
    }
    /**
     * Failure detail for a message that could not be delivered or was rejected.
     *
     * @return SMSError|null
     */
    public function getError(): ?SMSError
    {
        return $this->error;
    }
    /**
     * Failure detail for a message that could not be delivered or was rejected.
     *
     * @param SMSError|null $error
     *
     * @return self
     */
    public function setError(?SMSError $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;
        return $this;
    }
}
