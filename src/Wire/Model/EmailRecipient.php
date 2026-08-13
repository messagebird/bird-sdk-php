<?php

namespace MessageBird\Wire\Model;

class EmailRecipient
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
     * ID of the parent message (em_ prefix) or broadcast (eb_ prefix) this recipient belongs to.
     *
     * @var string|null
     */
    protected $parentId;
    /**
     * Envelope position of a recipient on an outbound email event.
     *
     * @var string|null
     */
    protected $role;
    /**
     * Recipient email address.
     *
     * @var string|null
     */
    protected $recipient;
    /**
     * Display name provided for this recipient on the send, or null if none was given.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Delivery status for this recipient:
     * 
     * - `accepted`: The send has been taken and is being prepared for delivery.
     * - `processed`: This recipient's message is on its way out.
     * - `deferred`: The recipient's mailbox provider asked for a retry, and delivery attempts continue.
     * - `delivered`: The recipient's mail server accepted the message.
     * - `bounced`: Delivery permanently failed (see `bounce_type` for hard vs soft).
     * - `complained`: The recipient reported the message as spam.
     * - `rejected`: Delivery was never attempted (see `rejection_reason` for why).
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Present on `status: rejected` rows. Specifies why the recipient was rejected:
     * 
     * - `recipient_suppressed`: The recipient is on the workspace suppression list, so
     *   delivery was never attempted.
     * - `transmission_failed`: The message could not be transmitted for delivery.
     * - `generation_failure`: The message could not be built for delivery (template or
     *   content issue).
     * - `policy_rejection`: The message was refused by sending policy.
     * - `domain_unverified`: The sending domain was not verified.
     * - `quota_exceeded`: The organization's send quota was reached.
     * - `recipient_not_allowed`: A recipient was not permitted for this send (for shared
     *   onboarding-domain sends, recipients must be verified workspace members).
     * 
     *
     * @var string|null
     */
    protected $rejectionReason;
    /**
     * Bounce classification for `bounced` and `deferred` rows, or null when the recipient has not bounced or the receiving server's response has not been classified. `hard` is a permanent failure (invalid address or non-existent domain). `soft` is a transient failure (mailbox full, server temporarily unavailable). `block` indicates the receiving mail server blocked the sending IP for reputation reasons. `admin` indicates an administrative refusal (relaying denied, blocklisted domain). `undetermined` is used when the receiving server's response is ambiguous.
     * 
     *
     * @var string|null
     */
    protected $bounceType;
    /**
     * SMTP reply code returned by the receiving mail server for `bounced` and `deferred` rows, or null when none was provided.
     *
     * @var string|null
     */
    protected $bounceCode;
    /**
     * Human-readable reason the receiving mail server gave for the bounce or deferral, or null when none was provided.
     *
     * @var string|null
     */
    protected $bounceDescription;
    /**
     * When the message was prepared and queued for delivery to the recipient's mail server, or null if that has not happened yet.
     *
     * @var \DateTime|null
     */
    protected $processedAt;
    /**
     * When the recipient's mail server accepted the message, or null if not yet delivered.
     *
     * @var \DateTime|null
     */
    protected $deliveredAt;
    /**
     * Time between the send being accepted and the message being prepared for delivery, in milliseconds. Null until processed.
     *
     * @var int|null
     */
    protected $processingLatencyMs;
    /**
     * Time between the message being prepared and the receiving mail server accepting it, in milliseconds. Null until delivered.
     *
     * @var int|null
     */
    protected $deliveryLatencyMs;
    /**
     * End-to-end accept → delivered time for this recipient, in milliseconds. Null until delivered.
     *
     * @var int|null
     */
    protected $totalLatencyMs;
    /**
     * Number of open events for this recipient.
     *
     * @var int|null
     */
    protected $openCount = 0;
    /**
     * Number of click events for this recipient.
     *
     * @var int|null
     */
    protected $clickCount = 0;
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
     * ID of the parent message (em_ prefix) or broadcast (eb_ prefix) this recipient belongs to.
     *
     * @return string|null
     */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }
    /**
     * ID of the parent message (em_ prefix) or broadcast (eb_ prefix) this recipient belongs to.
     *
     * @param string|null $parentId
     *
     * @return self
     */
    public function setParentId(?string $parentId): self
    {
        $this->initialized['parentId'] = true;
        $this->parentId = $parentId;
        return $this;
    }
    /**
     * Envelope position of a recipient on an outbound email event.
     *
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }
    /**
     * Envelope position of a recipient on an outbound email event.
     *
     * @param string|null $role
     *
     * @return self
     */
    public function setRole(?string $role): self
    {
        $this->initialized['role'] = true;
        $this->role = $role;
        return $this;
    }
    /**
     * Recipient email address.
     *
     * @return string|null
     */
    public function getRecipient(): ?string
    {
        return $this->recipient;
    }
    /**
     * Recipient email address.
     *
     * @param string|null $recipient
     *
     * @return self
     */
    public function setRecipient(?string $recipient): self
    {
        $this->initialized['recipient'] = true;
        $this->recipient = $recipient;
        return $this;
    }
    /**
     * Display name provided for this recipient on the send, or null if none was given.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Display name provided for this recipient on the send, or null if none was given.
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
     * Delivery status for this recipient:
     * 
     * - `accepted`: The send has been taken and is being prepared for delivery.
     * - `processed`: This recipient's message is on its way out.
     * - `deferred`: The recipient's mailbox provider asked for a retry, and delivery attempts continue.
     * - `delivered`: The recipient's mail server accepted the message.
     * - `bounced`: Delivery permanently failed (see `bounce_type` for hard vs soft).
     * - `complained`: The recipient reported the message as spam.
     * - `rejected`: Delivery was never attempted (see `rejection_reason` for why).
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Delivery status for this recipient:
    
    - `accepted`: The send has been taken and is being prepared for delivery.
    - `processed`: This recipient's message is on its way out.
    - `deferred`: The recipient's mailbox provider asked for a retry, and delivery attempts continue.
    - `delivered`: The recipient's mail server accepted the message.
    - `bounced`: Delivery permanently failed (see `bounce_type` for hard vs soft).
    - `complained`: The recipient reported the message as spam.
    - `rejected`: Delivery was never attempted (see `rejection_reason` for why).
    
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
     * Present on `status: rejected` rows. Specifies why the recipient was rejected:
     * 
     * - `recipient_suppressed`: The recipient is on the workspace suppression list, so
     *   delivery was never attempted.
     * - `transmission_failed`: The message could not be transmitted for delivery.
     * - `generation_failure`: The message could not be built for delivery (template or
     *   content issue).
     * - `policy_rejection`: The message was refused by sending policy.
     * - `domain_unverified`: The sending domain was not verified.
     * - `quota_exceeded`: The organization's send quota was reached.
     * - `recipient_not_allowed`: A recipient was not permitted for this send (for shared
     *   onboarding-domain sends, recipients must be verified workspace members).
     * 
     *
     * @return string|null
     */
    public function getRejectionReason(): ?string
    {
        return $this->rejectionReason;
    }
    /**
    * Present on `status: rejected` rows. Specifies why the recipient was rejected:
    
    - `recipient_suppressed`: The recipient is on the workspace suppression list, so
     delivery was never attempted.
    - `transmission_failed`: The message could not be transmitted for delivery.
    - `generation_failure`: The message could not be built for delivery (template or
     content issue).
    - `policy_rejection`: The message was refused by sending policy.
    - `domain_unverified`: The sending domain was not verified.
    - `quota_exceeded`: The organization's send quota was reached.
    - `recipient_not_allowed`: A recipient was not permitted for this send (for shared
     onboarding-domain sends, recipients must be verified workspace members).
    
    *
    * @param string|null $rejectionReason
    *
    * @return self
    */
    public function setRejectionReason(?string $rejectionReason): self
    {
        $this->initialized['rejectionReason'] = true;
        $this->rejectionReason = $rejectionReason;
        return $this;
    }
    /**
     * Bounce classification for `bounced` and `deferred` rows, or null when the recipient has not bounced or the receiving server's response has not been classified. `hard` is a permanent failure (invalid address or non-existent domain). `soft` is a transient failure (mailbox full, server temporarily unavailable). `block` indicates the receiving mail server blocked the sending IP for reputation reasons. `admin` indicates an administrative refusal (relaying denied, blocklisted domain). `undetermined` is used when the receiving server's response is ambiguous.
     * 
     *
     * @return string|null
     */
    public function getBounceType(): ?string
    {
        return $this->bounceType;
    }
    /**
     * Bounce classification for `bounced` and `deferred` rows, or null when the recipient has not bounced or the receiving server's response has not been classified. `hard` is a permanent failure (invalid address or non-existent domain). `soft` is a transient failure (mailbox full, server temporarily unavailable). `block` indicates the receiving mail server blocked the sending IP for reputation reasons. `admin` indicates an administrative refusal (relaying denied, blocklisted domain). `undetermined` is used when the receiving server's response is ambiguous.
     *
     * @param string|null $bounceType
     *
     * @return self
     */
    public function setBounceType(?string $bounceType): self
    {
        $this->initialized['bounceType'] = true;
        $this->bounceType = $bounceType;
        return $this;
    }
    /**
     * SMTP reply code returned by the receiving mail server for `bounced` and `deferred` rows, or null when none was provided.
     *
     * @return string|null
     */
    public function getBounceCode(): ?string
    {
        return $this->bounceCode;
    }
    /**
     * SMTP reply code returned by the receiving mail server for `bounced` and `deferred` rows, or null when none was provided.
     *
     * @param string|null $bounceCode
     *
     * @return self
     */
    public function setBounceCode(?string $bounceCode): self
    {
        $this->initialized['bounceCode'] = true;
        $this->bounceCode = $bounceCode;
        return $this;
    }
    /**
     * Human-readable reason the receiving mail server gave for the bounce or deferral, or null when none was provided.
     *
     * @return string|null
     */
    public function getBounceDescription(): ?string
    {
        return $this->bounceDescription;
    }
    /**
     * Human-readable reason the receiving mail server gave for the bounce or deferral, or null when none was provided.
     *
     * @param string|null $bounceDescription
     *
     * @return self
     */
    public function setBounceDescription(?string $bounceDescription): self
    {
        $this->initialized['bounceDescription'] = true;
        $this->bounceDescription = $bounceDescription;
        return $this;
    }
    /**
     * When the message was prepared and queued for delivery to the recipient's mail server, or null if that has not happened yet.
     *
     * @return \DateTime|null
     */
    public function getProcessedAt(): ?\DateTime
    {
        return $this->processedAt;
    }
    /**
     * When the message was prepared and queued for delivery to the recipient's mail server, or null if that has not happened yet.
     *
     * @param \DateTime|null $processedAt
     *
     * @return self
     */
    public function setProcessedAt(?\DateTime $processedAt): self
    {
        $this->initialized['processedAt'] = true;
        $this->processedAt = $processedAt;
        return $this;
    }
    /**
     * When the recipient's mail server accepted the message, or null if not yet delivered.
     *
     * @return \DateTime|null
     */
    public function getDeliveredAt(): ?\DateTime
    {
        return $this->deliveredAt;
    }
    /**
     * When the recipient's mail server accepted the message, or null if not yet delivered.
     *
     * @param \DateTime|null $deliveredAt
     *
     * @return self
     */
    public function setDeliveredAt(?\DateTime $deliveredAt): self
    {
        $this->initialized['deliveredAt'] = true;
        $this->deliveredAt = $deliveredAt;
        return $this;
    }
    /**
     * Time between the send being accepted and the message being prepared for delivery, in milliseconds. Null until processed.
     *
     * @return int|null
     */
    public function getProcessingLatencyMs(): ?int
    {
        return $this->processingLatencyMs;
    }
    /**
     * Time between the send being accepted and the message being prepared for delivery, in milliseconds. Null until processed.
     *
     * @param int|null $processingLatencyMs
     *
     * @return self
     */
    public function setProcessingLatencyMs(?int $processingLatencyMs): self
    {
        $this->initialized['processingLatencyMs'] = true;
        $this->processingLatencyMs = $processingLatencyMs;
        return $this;
    }
    /**
     * Time between the message being prepared and the receiving mail server accepting it, in milliseconds. Null until delivered.
     *
     * @return int|null
     */
    public function getDeliveryLatencyMs(): ?int
    {
        return $this->deliveryLatencyMs;
    }
    /**
     * Time between the message being prepared and the receiving mail server accepting it, in milliseconds. Null until delivered.
     *
     * @param int|null $deliveryLatencyMs
     *
     * @return self
     */
    public function setDeliveryLatencyMs(?int $deliveryLatencyMs): self
    {
        $this->initialized['deliveryLatencyMs'] = true;
        $this->deliveryLatencyMs = $deliveryLatencyMs;
        return $this;
    }
    /**
     * End-to-end accept → delivered time for this recipient, in milliseconds. Null until delivered.
     *
     * @return int|null
     */
    public function getTotalLatencyMs(): ?int
    {
        return $this->totalLatencyMs;
    }
    /**
     * End-to-end accept → delivered time for this recipient, in milliseconds. Null until delivered.
     *
     * @param int|null $totalLatencyMs
     *
     * @return self
     */
    public function setTotalLatencyMs(?int $totalLatencyMs): self
    {
        $this->initialized['totalLatencyMs'] = true;
        $this->totalLatencyMs = $totalLatencyMs;
        return $this;
    }
    /**
     * Number of open events for this recipient.
     *
     * @return int|null
     */
    public function getOpenCount(): ?int
    {
        return $this->openCount;
    }
    /**
     * Number of open events for this recipient.
     *
     * @param int|null $openCount
     *
     * @return self
     */
    public function setOpenCount(?int $openCount): self
    {
        $this->initialized['openCount'] = true;
        $this->openCount = $openCount;
        return $this;
    }
    /**
     * Number of click events for this recipient.
     *
     * @return int|null
     */
    public function getClickCount(): ?int
    {
        return $this->clickCount;
    }
    /**
     * Number of click events for this recipient.
     *
     * @param int|null $clickCount
     *
     * @return self
     */
    public function setClickCount(?int $clickCount): self
    {
        $this->initialized['clickCount'] = true;
        $this->clickCount = $clickCount;
        return $this;
    }
}
