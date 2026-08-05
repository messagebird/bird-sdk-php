<?php

namespace MessageBird\Wire\Model;

class WhatsAppError
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
     * Failure reason, uniform whether the failure happened internally or was reported by the WhatsApp network. `insufficient_balance`: the workspace could not afford the send. `price_not_found`: no price was configured for this destination/template combination. `internal_error`: an unexpected Bird-side failure. `undeliverable`: the recipient could not be reached (for example not on WhatsApp, or the number is invalid). `service_window_expired`: the 24-hour customer care window has closed and a free-form message cannot be sent; send a template instead. `rate_limited`: the send was throttled. `recipient_suppressed`: the recipient is on the workspace's suppression list; the message was rejected before sending. Open enum: new codes may be added over time, so treat any unrecognized value as a future code rather than an error.
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
     * Raw error code from the WhatsApp Cloud API, when available, for low-level debugging.
     *
     * @var string|null
     */
    protected $metaErrorCode;
    /**
     * When the failure occurred.
     *
     * @var \DateTime|null
     */
    protected $occurredAt;
    /**
     * Failure reason, uniform whether the failure happened internally or was reported by the WhatsApp network. `insufficient_balance`: the workspace could not afford the send. `price_not_found`: no price was configured for this destination/template combination. `internal_error`: an unexpected Bird-side failure. `undeliverable`: the recipient could not be reached (for example not on WhatsApp, or the number is invalid). `service_window_expired`: the 24-hour customer care window has closed and a free-form message cannot be sent; send a template instead. `rate_limited`: the send was throttled. `recipient_suppressed`: the recipient is on the workspace's suppression list; the message was rejected before sending. Open enum: new codes may be added over time, so treat any unrecognized value as a future code rather than an error.
     * 
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
     * Failure reason, uniform whether the failure happened internally or was reported by the WhatsApp network. `insufficient_balance`: the workspace could not afford the send. `price_not_found`: no price was configured for this destination/template combination. `internal_error`: an unexpected Bird-side failure. `undeliverable`: the recipient could not be reached (for example not on WhatsApp, or the number is invalid). `service_window_expired`: the 24-hour customer care window has closed and a free-form message cannot be sent; send a template instead. `rate_limited`: the send was throttled. `recipient_suppressed`: the recipient is on the workspace's suppression list; the message was rejected before sending. Open enum: new codes may be added over time, so treat any unrecognized value as a future code rather than an error.
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
     * Raw error code from the WhatsApp Cloud API, when available, for low-level debugging.
     *
     * @return string|null
     */
    public function getMetaErrorCode(): ?string
    {
        return $this->metaErrorCode;
    }
    /**
     * Raw error code from the WhatsApp Cloud API, when available, for low-level debugging.
     *
     * @param string|null $metaErrorCode
     *
     * @return self
     */
    public function setMetaErrorCode(?string $metaErrorCode): self
    {
        $this->initialized['metaErrorCode'] = true;
        $this->metaErrorCode = $metaErrorCode;
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
