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
     * Standardized failure reason:
     * 
     * - `insufficient_balance`: The workspace wallet could not fund the send.
     * - `price_not_found`: No price was configured for the destination and template.
     * - `internal_error`: An unexpected service failure occurred.
     * - `undeliverable`: The recipient could not be reached.
     * - `service_window_expired`: The 24-hour service window closed; send a template.
     * - `rate_limited`: The send was throttled.
     * - `recipient_suppressed`: The recipient is on the workspace suppression list.
     * 
     * This is an open enum. Accept unrecognized values.
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
     * Standardized failure reason:
     * 
     * - `insufficient_balance`: The workspace wallet could not fund the send.
     * - `price_not_found`: No price was configured for the destination and template.
     * - `internal_error`: An unexpected service failure occurred.
     * - `undeliverable`: The recipient could not be reached.
     * - `service_window_expired`: The 24-hour service window closed; send a template.
     * - `rate_limited`: The send was throttled.
     * - `recipient_suppressed`: The recipient is on the workspace suppression list.
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
    
    - `insufficient_balance`: The workspace wallet could not fund the send.
    - `price_not_found`: No price was configured for the destination and template.
    - `internal_error`: An unexpected service failure occurred.
    - `undeliverable`: The recipient could not be reached.
    - `service_window_expired`: The 24-hour service window closed; send a template.
    - `rate_limited`: The send was throttled.
    - `recipient_suppressed`: The recipient is on the workspace suppression list.
    
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
