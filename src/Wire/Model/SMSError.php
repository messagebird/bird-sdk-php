<?php

namespace MessageBird\Wire\Model;

class SMSError
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
     * Standardized failure reason:
     * 
     * - `invalid_destination`: The number is unassigned, ported out, or malformed.
     * - `unreachable`: The handset is off or outside coverage.
     * - `blocked_by_carrier`: The carrier filtered the message.
     * - `blocked_by_recipient`: The recipient device blocked the sender.
     * - `landline_unreachable`: The destination is a landline that does not accept SMS.
     * - `content_rejected`: The carrier rejected the content.
     * - `sender_unregistered`: The sender is not registered for the destination.
     * - `recipient_opted_out`: The recipient is on a suppression list.
     * - `provider_unavailable`: The provider remained unavailable after retries.
     * - `insufficient_balance`: The workspace wallet could not fund the send.
     * - `unknown`: The failure could not be classified.
     * 
     * This is an open enum. Accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $code;
    /**
     * The failure in words, from whatever refused the message: the carrier's own reason text on a delivery receipt, or ours on a message stopped before a carrier saw it. Free-form, so branch on `code` and show this to a human.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Raw provider-supplied error code, finer-grained than the `code` that normalizes it. Not a Bird-defined value, so quote it to support when asking why a message failed. Null when the provider sent none, including any failure decided before one was reached.
     *
     * @var string|null
     */
    protected $carrierErrorCode;
    /**
     * When the failure occurred.
     *
     * @var \DateTime|null
     */
    protected $occurredAt;
    /**
     * Standardized failure reason:
     * 
     * - `invalid_destination`: The number is unassigned, ported out, or malformed.
     * - `unreachable`: The handset is off or outside coverage.
     * - `blocked_by_carrier`: The carrier filtered the message.
     * - `blocked_by_recipient`: The recipient device blocked the sender.
     * - `landline_unreachable`: The destination is a landline that does not accept SMS.
     * - `content_rejected`: The carrier rejected the content.
     * - `sender_unregistered`: The sender is not registered for the destination.
     * - `recipient_opted_out`: The recipient is on a suppression list.
     * - `provider_unavailable`: The provider remained unavailable after retries.
     * - `insufficient_balance`: The workspace wallet could not fund the send.
     * - `unknown`: The failure could not be classified.
     * 
     * This is an open enum. Accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
    * Standardized failure reason:
    
    - `invalid_destination`: The number is unassigned, ported out, or malformed.
    - `unreachable`: The handset is off or outside coverage.
    - `blocked_by_carrier`: The carrier filtered the message.
    - `blocked_by_recipient`: The recipient device blocked the sender.
    - `landline_unreachable`: The destination is a landline that does not accept SMS.
    - `content_rejected`: The carrier rejected the content.
    - `sender_unregistered`: The sender is not registered for the destination.
    - `recipient_opted_out`: The recipient is on a suppression list.
    - `provider_unavailable`: The provider remained unavailable after retries.
    - `insufficient_balance`: The workspace wallet could not fund the send.
    - `unknown`: The failure could not be classified.
    
    This is an open enum. Accept unrecognized values.
    
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
     * The failure in words, from whatever refused the message: the carrier's own reason text on a delivery receipt, or ours on a message stopped before a carrier saw it. Free-form, so branch on `code` and show this to a human.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * The failure in words, from whatever refused the message: the carrier's own reason text on a delivery receipt, or ours on a message stopped before a carrier saw it. Free-form, so branch on `code` and show this to a human.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * Raw provider-supplied error code, finer-grained than the `code` that normalizes it. Not a Bird-defined value, so quote it to support when asking why a message failed. Null when the provider sent none, including any failure decided before one was reached.
     *
     * @return string|null
     */
    public function getCarrierErrorCode(): ?string
    {
        return $this->carrierErrorCode;
    }
    /**
     * Raw provider-supplied error code, finer-grained than the `code` that normalizes it. Not a Bird-defined value, so quote it to support when asking why a message failed. Null when the provider sent none, including any failure decided before one was reached.
     *
     * @param string|null $carrierErrorCode
     *
     * @return self
     */
    public function setCarrierErrorCode(?string $carrierErrorCode): self
    {
        $this->initialized['carrierErrorCode'] = true;
        $this->carrierErrorCode = $carrierErrorCode;
        return $this;
    }
    /**
     * When the failure occurred.
     *
     * @return \DateTime|null
     */
    public function getOccurredAt(): ?\DateTime
    {
        return $this->occurredAt;
    }
    /**
     * When the failure occurred.
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
}
