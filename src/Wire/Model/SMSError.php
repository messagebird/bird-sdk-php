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
     * Bird-stable failure reason. Open enum: Bird adds reasons as the carrier platform's own buckets are covered, so treat an unrecognized value as a future reason rather than an error. `invalid_destination`: the number is not assigned, ported out, or malformed. `unreachable`: handset off or out of coverage. `blocked_by_carrier`: the carrier filtered the message. `blocked_by_recipient`: the recipient device blocked the sender. `landline_unreachable`: the destination is a landline that does not accept SMS. `content_rejected`: the carrier rejected the content. `sender_unregistered`: the sender is not registered for the destination. `recipient_opted_out`: the recipient is on a suppression list. `provider_unavailable`: an upstream failure after retries. `insufficient_balance`: the workspace wallet had insufficient balance to send the message. `unknown`: an unmapped failure.
     * 
     *
     * @var string|null
     */
    protected $code;
    /**
     * Human-readable explanation of the failure.
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
     * Bird-stable failure reason. Open enum: Bird adds reasons as the carrier platform's own buckets are covered, so treat an unrecognized value as a future reason rather than an error. `invalid_destination`: the number is not assigned, ported out, or malformed. `unreachable`: handset off or out of coverage. `blocked_by_carrier`: the carrier filtered the message. `blocked_by_recipient`: the recipient device blocked the sender. `landline_unreachable`: the destination is a landline that does not accept SMS. `content_rejected`: the carrier rejected the content. `sender_unregistered`: the sender is not registered for the destination. `recipient_opted_out`: the recipient is on a suppression list. `provider_unavailable`: an upstream failure after retries. `insufficient_balance`: the workspace wallet had insufficient balance to send the message. `unknown`: an unmapped failure.
     * 
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
     * Bird-stable failure reason. Open enum: Bird adds reasons as the carrier platform's own buckets are covered, so treat an unrecognized value as a future reason rather than an error. `invalid_destination`: the number is not assigned, ported out, or malformed. `unreachable`: handset off or out of coverage. `blocked_by_carrier`: the carrier filtered the message. `blocked_by_recipient`: the recipient device blocked the sender. `landline_unreachable`: the destination is a landline that does not accept SMS. `content_rejected`: the carrier rejected the content. `sender_unregistered`: the sender is not registered for the destination. `recipient_opted_out`: the recipient is on a suppression list. `provider_unavailable`: an upstream failure after retries. `insufficient_balance`: the workspace wallet had insufficient balance to send the message. `unknown`: an unmapped failure.
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
     * Human-readable explanation of the failure.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Human-readable explanation of the failure.
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
