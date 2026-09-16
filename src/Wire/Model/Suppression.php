<?php

namespace MessageBird\Wire\Model;

class Suppression
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
     * The suppressed address, stored lowercase.
     *
     * @var string|null
     */
    protected $email;
    /**
     * @var SuppressionScope|null
     */
    protected $scope;
    /**
     * Why the address is suppressed:
     * 
     * - `hard_bounce`: A delivery permanently failed.
     * - `complaint`: The recipient reported a message as spam.
     * - `manual`: Added through the API or dashboard.
     * - `unsubscribe`: The recipient opted out. Deprecated, and no new record carries it: an opt-out is a messaging preference rather than a suppression. Legacy records remain visible until they are moved to messaging preferences.
     * 
     * An address can hold one record per reason. This list grows over time. Treat unknown values as informational rather than rejecting the record.
     * 
     *
     * @var string|null
     */
    protected $reason;
    /**
     * How the suppression came to exist:
     * 
     * - `bounce_event`: Created automatically from a hard bounce.
     * - `complaint_event`: Created from a spam complaint.
     * - `api_key`: Added through the API with an API key.
     * - `user`: Added by a user in the dashboard.
     * - `unsubscribe_event`: The mailbox provider reported an opt-out. Deprecated with `reason: unsubscribe`.
     * - `unsubscribe_link`: The recipient used a Bird unsubscribe link. Deprecated with `reason: unsubscribe`.
     * 
     * This list grows over time. Treat unknown values as informational rather than rejecting the record.
     * 
     *
     * @var string|null
     */
    protected $origin;
    /**
     * Which sends the suppression blocks.
     * 
     * - `all`: blocks every message category, including transactional.
     * - `non_transactional`: blocks marketing but allows transactional messages.
     *   A recipient who complained can therefore still receive
     *   mail such as password resets.
     * - `category`: scopes the block to a preference category and blocks every
     *   category until one is set.
     * 
     * This list grows over time, and any value other than `non_transactional`
     * blocks every category, so treat an unknown value as blocking the send.
     * 
     *
     * @var string|null
     */
    protected $appliesTo;
    /**
     * ID of the email that triggered suppression. Null for manual additions.
     *
     * @var string|null
     */
    protected $sourceEmailId;
    /**
     * ID of the recipient event that triggered suppression. Null for manual additions.
     *
     * @var string|null
     */
    protected $sourceRecipientId;
    /**
     * When the address was suppressed.
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
     * The suppressed address, stored lowercase.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * The suppressed address, stored lowercase.
     *
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;
        return $this;
    }
    /**
     * @return SuppressionScope|null
     */
    public function getScope(): ?SuppressionScope
    {
        return $this->scope;
    }
    /**
     * @param SuppressionScope|null $scope
     *
     * @return self
     */
    public function setScope(?SuppressionScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
    /**
     * Why the address is suppressed:
     * 
     * - `hard_bounce`: A delivery permanently failed.
     * - `complaint`: The recipient reported a message as spam.
     * - `manual`: Added through the API or dashboard.
     * - `unsubscribe`: The recipient opted out. Deprecated, and no new record carries it: an opt-out is a messaging preference rather than a suppression. Legacy records remain visible until they are moved to messaging preferences.
     * 
     * An address can hold one record per reason. This list grows over time. Treat unknown values as informational rather than rejecting the record.
     * 
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
    * Why the address is suppressed:
    
    - `hard_bounce`: A delivery permanently failed.
    - `complaint`: The recipient reported a message as spam.
    - `manual`: Added through the API or dashboard.
    - `unsubscribe`: The recipient opted out. Deprecated, and no new record carries it: an opt-out is a messaging preference rather than a suppression. Legacy records remain visible until they are moved to messaging preferences.
    
    An address can hold one record per reason. This list grows over time. Treat unknown values as informational rather than rejecting the record.
    
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
     * How the suppression came to exist:
     * 
     * - `bounce_event`: Created automatically from a hard bounce.
     * - `complaint_event`: Created from a spam complaint.
     * - `api_key`: Added through the API with an API key.
     * - `user`: Added by a user in the dashboard.
     * - `unsubscribe_event`: The mailbox provider reported an opt-out. Deprecated with `reason: unsubscribe`.
     * - `unsubscribe_link`: The recipient used a Bird unsubscribe link. Deprecated with `reason: unsubscribe`.
     * 
     * This list grows over time. Treat unknown values as informational rather than rejecting the record.
     * 
     *
     * @return string|null
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }
    /**
    * How the suppression came to exist:
    
    - `bounce_event`: Created automatically from a hard bounce.
    - `complaint_event`: Created from a spam complaint.
    - `api_key`: Added through the API with an API key.
    - `user`: Added by a user in the dashboard.
    - `unsubscribe_event`: The mailbox provider reported an opt-out. Deprecated with `reason: unsubscribe`.
    - `unsubscribe_link`: The recipient used a Bird unsubscribe link. Deprecated with `reason: unsubscribe`.
    
    This list grows over time. Treat unknown values as informational rather than rejecting the record.
    
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
     * Which sends the suppression blocks.
     * 
     * - `all`: blocks every message category, including transactional.
     * - `non_transactional`: blocks marketing but allows transactional messages.
     *   A recipient who complained can therefore still receive
     *   mail such as password resets.
     * - `category`: scopes the block to a preference category and blocks every
     *   category until one is set.
     * 
     * This list grows over time, and any value other than `non_transactional`
     * blocks every category, so treat an unknown value as blocking the send.
     * 
     *
     * @return string|null
     */
    public function getAppliesTo(): ?string
    {
        return $this->appliesTo;
    }
    /**
    * Which sends the suppression blocks.
    
    - `all`: blocks every message category, including transactional.
    - `non_transactional`: blocks marketing but allows transactional messages.
     A recipient who complained can therefore still receive
     mail such as password resets.
    - `category`: scopes the block to a preference category and blocks every
     category until one is set.
    
    This list grows over time, and any value other than `non_transactional`
    blocks every category, so treat an unknown value as blocking the send.
    
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
     * ID of the email that triggered suppression. Null for manual additions.
     *
     * @return string|null
     */
    public function getSourceEmailId(): ?string
    {
        return $this->sourceEmailId;
    }
    /**
     * ID of the email that triggered suppression. Null for manual additions.
     *
     * @param string|null $sourceEmailId
     *
     * @return self
     */
    public function setSourceEmailId(?string $sourceEmailId): self
    {
        $this->initialized['sourceEmailId'] = true;
        $this->sourceEmailId = $sourceEmailId;
        return $this;
    }
    /**
     * ID of the recipient event that triggered suppression. Null for manual additions.
     *
     * @return string|null
     */
    public function getSourceRecipientId(): ?string
    {
        return $this->sourceRecipientId;
    }
    /**
     * ID of the recipient event that triggered suppression. Null for manual additions.
     *
     * @param string|null $sourceRecipientId
     *
     * @return self
     */
    public function setSourceRecipientId(?string $sourceRecipientId): self
    {
        $this->initialized['sourceRecipientId'] = true;
        $this->sourceRecipientId = $sourceRecipientId;
        return $this;
    }
    /**
     * When the address was suppressed.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the address was suppressed.
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
