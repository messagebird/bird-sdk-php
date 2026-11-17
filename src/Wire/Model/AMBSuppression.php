<?php

namespace MessageBird\Wire\Model;

/**
 * One period during which messages to an address are stopped: when it started, what started it, and what ended it. The address is a phone number or the opaque identifier Apple assigns to a customer's conversation with a business. A customer who closes a conversation, returns, and closes it again has two of these on record rather than one current state, the first ended and the second in force, and each keeps its own dates once it ends. The list returns the periods in force; fetch one by ID to read an ended one.
 */
class AMBSuppression
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
     * The business account this stops. Null when it stops the address for every account in the workspace. A workspace-wide suppression covers the same address everywhere; it does not link the different opaque identifiers one person holds with different accounts.
     * 
     *
     * @var string|null
     */
    protected $businessAccountId;
    /**
     * The customer: a phone number in E.164 format, or the exact opaque identifier Apple supplied. `address_type` says which.
     * 
     *
     * @var string|null
     */
    protected $address;
    /**
     * What kind of value `address` holds.
     * 
     * - `phone_number` means `address` is the customer's phone number. Apple's CloseSession event carries a phone number rather than an opaque identifier, so a suppression opened by a close on a conversation identified by phone number takes this kind.
     * - `opaque_user_id` means `address` is the opaque identifier Apple assigns to the customer's conversation with the business, stable across a close and a later re-initiation.
     * 
     *
     * @var string|null
     */
    protected $addressType;
    /**
     * Why messages are stopped. `manual` means your workspace added it through this API or the dashboard. `opted_out` means the customer or Apple signaled they should not be contacted, such as a close of the conversation. This list grows over time, so treat an unknown value as informational rather than rejecting the record.
     * 
     *
     * @var string|null
     */
    protected $reason;
    /**
     * How the suppression came to exist:
     * 
     * - `user`: someone acting in the dashboard.
     * - `api_key`: an API call.
     * - `close_session`: Apple reporting that the customer closed the conversation.
     * - `gone`: Apple refusing a send because the customer had closed the conversation.
     * 
     * `user` and `api_key` are the manual suppressions, the ones you can end. The two closes are
     * the customer's own statement and end when they return. A customer declining or opting out of
     * invitations by phone number is recorded as a preference rather than here.
     * 
     *
     * @var string|null
     */
    protected $origin;
    /**
     * What this stops. `all` stops every outbound path to the address: operator and automated replies, API sends, typing indicators and invitations. `invitations` stops invitations to the phone number and leaves an open conversation reachable. Treat unrecognized values as stopping everything.
     * 
     *
     * @var string|null
     */
    protected $appliesTo;
    /**
     * Whether this is stopping messages right now; `applies_to` says what it stops. Always true in a list, which carries only the suppressions in force; false when you fetch one by ID that has since ended, which is also when `ended_at` is set.
     * 
     *
     * @var bool|null
     */
    protected $blocking;
    /**
     * The outbound message Apple refused because the customer had closed the conversation, when that is what opened this. Null for a close Apple reported and for a manual suppression.
     * 
     *
     * @var string|null
     */
    protected $sourceMessageId;
    /**
     * The conversation event recording the close Apple reported, when that is what opened this. Null for a refused send and for a manual suppression.
     * 
     *
     * @var string|null
     */
    protected $sourceEventId;
    /**
     * When the customer closed the conversation, as reported by Apple; when Apple refused a send because the conversation was closed; or when a manual suppression was added. This is what orders the list, and it can differ from `created_at`: earlier when a close reached us late, later when the customer closed the conversation again while this was in force, which moves it to that later close.
     * 
     *
     * @var \DateTime|null
     */
    protected $effectiveAt;
    /**
     * When we recorded it.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When we last recorded this suppression being stated. Later than `created_at` when it was stated again while already in force: your workspace adding it again, or the customer closing the conversation again. A repeat adds no new record.
     * 
     *
     * @var \DateTime|null
     */
    protected $lastAssertedAt;
    /**
     * When this stopped applying. Null while it is still stopping messages.
     *
     * @var \DateTime|null
     */
    protected $endedAt;
    /**
     * @var string|null
     */
    protected $endedReason;
    /**
     * When the customer returned to the conversation, as reported by Apple, or when your workspace ended it. Null while it is still stopping messages.
     * 
     *
     * @var \DateTime|null
     */
    protected $endedEffectiveAt;
    /**
     * The message the customer returned with, when there was one. Null while it is still stopping messages, and when something other than a customer message ended it: your workspace ending it, or the customer returning by accepting an invitation.
     * 
     *
     * @var string|null
     */
    protected $sourceEndMessageId;
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
     * The business account this stops. Null when it stops the address for every account in the workspace. A workspace-wide suppression covers the same address everywhere; it does not link the different opaque identifiers one person holds with different accounts.
     * 
     *
     * @return string|null
     */
    public function getBusinessAccountId(): ?string
    {
        return $this->businessAccountId;
    }
    /**
     * The business account this stops. Null when it stops the address for every account in the workspace. A workspace-wide suppression covers the same address everywhere; it does not link the different opaque identifiers one person holds with different accounts.
     *
     * @param string|null $businessAccountId
     *
     * @return self
     */
    public function setBusinessAccountId(?string $businessAccountId): self
    {
        $this->initialized['businessAccountId'] = true;
        $this->businessAccountId = $businessAccountId;
        return $this;
    }
    /**
     * The customer: a phone number in E.164 format, or the exact opaque identifier Apple supplied. `address_type` says which.
     * 
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    /**
     * The customer: a phone number in E.164 format, or the exact opaque identifier Apple supplied. `address_type` says which.
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
     * What kind of value `address` holds.
     * 
     * - `phone_number` means `address` is the customer's phone number. Apple's CloseSession event carries a phone number rather than an opaque identifier, so a suppression opened by a close on a conversation identified by phone number takes this kind.
     * - `opaque_user_id` means `address` is the opaque identifier Apple assigns to the customer's conversation with the business, stable across a close and a later re-initiation.
     * 
     *
     * @return string|null
     */
    public function getAddressType(): ?string
    {
        return $this->addressType;
    }
    /**
    * What kind of value `address` holds.
    
    - `phone_number` means `address` is the customer's phone number. Apple's CloseSession event carries a phone number rather than an opaque identifier, so a suppression opened by a close on a conversation identified by phone number takes this kind.
    - `opaque_user_id` means `address` is the opaque identifier Apple assigns to the customer's conversation with the business, stable across a close and a later re-initiation.
    
    *
    * @param string|null $addressType
    *
    * @return self
    */
    public function setAddressType(?string $addressType): self
    {
        $this->initialized['addressType'] = true;
        $this->addressType = $addressType;
        return $this;
    }
    /**
     * Why messages are stopped. `manual` means your workspace added it through this API or the dashboard. `opted_out` means the customer or Apple signaled they should not be contacted, such as a close of the conversation. This list grows over time, so treat an unknown value as informational rather than rejecting the record.
     * 
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
     * Why messages are stopped. `manual` means your workspace added it through this API or the dashboard. `opted_out` means the customer or Apple signaled they should not be contacted, such as a close of the conversation. This list grows over time, so treat an unknown value as informational rather than rejecting the record.
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
     * - `user`: someone acting in the dashboard.
     * - `api_key`: an API call.
     * - `close_session`: Apple reporting that the customer closed the conversation.
     * - `gone`: Apple refusing a send because the customer had closed the conversation.
     * 
     * `user` and `api_key` are the manual suppressions, the ones you can end. The two closes are
     * the customer's own statement and end when they return. A customer declining or opting out of
     * invitations by phone number is recorded as a preference rather than here.
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
    
    - `user`: someone acting in the dashboard.
    - `api_key`: an API call.
    - `close_session`: Apple reporting that the customer closed the conversation.
    - `gone`: Apple refusing a send because the customer had closed the conversation.
    
    `user` and `api_key` are the manual suppressions, the ones you can end. The two closes are
    the customer's own statement and end when they return. A customer declining or opting out of
    invitations by phone number is recorded as a preference rather than here.
    
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
     * What this stops. `all` stops every outbound path to the address: operator and automated replies, API sends, typing indicators and invitations. `invitations` stops invitations to the phone number and leaves an open conversation reachable. Treat unrecognized values as stopping everything.
     * 
     *
     * @return string|null
     */
    public function getAppliesTo(): ?string
    {
        return $this->appliesTo;
    }
    /**
     * What this stops. `all` stops every outbound path to the address: operator and automated replies, API sends, typing indicators and invitations. `invitations` stops invitations to the phone number and leaves an open conversation reachable. Treat unrecognized values as stopping everything.
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
     * Whether this is stopping messages right now; `applies_to` says what it stops. Always true in a list, which carries only the suppressions in force; false when you fetch one by ID that has since ended, which is also when `ended_at` is set.
     * 
     *
     * @return bool|null
     */
    public function getBlocking(): ?bool
    {
        return $this->blocking;
    }
    /**
     * Whether this is stopping messages right now; `applies_to` says what it stops. Always true in a list, which carries only the suppressions in force; false when you fetch one by ID that has since ended, which is also when `ended_at` is set.
     *
     * @param bool|null $blocking
     *
     * @return self
     */
    public function setBlocking(?bool $blocking): self
    {
        $this->initialized['blocking'] = true;
        $this->blocking = $blocking;
        return $this;
    }
    /**
     * The outbound message Apple refused because the customer had closed the conversation, when that is what opened this. Null for a close Apple reported and for a manual suppression.
     * 
     *
     * @return string|null
     */
    public function getSourceMessageId(): ?string
    {
        return $this->sourceMessageId;
    }
    /**
     * The outbound message Apple refused because the customer had closed the conversation, when that is what opened this. Null for a close Apple reported and for a manual suppression.
     *
     * @param string|null $sourceMessageId
     *
     * @return self
     */
    public function setSourceMessageId(?string $sourceMessageId): self
    {
        $this->initialized['sourceMessageId'] = true;
        $this->sourceMessageId = $sourceMessageId;
        return $this;
    }
    /**
     * The conversation event recording the close Apple reported, when that is what opened this. Null for a refused send and for a manual suppression.
     * 
     *
     * @return string|null
     */
    public function getSourceEventId(): ?string
    {
        return $this->sourceEventId;
    }
    /**
     * The conversation event recording the close Apple reported, when that is what opened this. Null for a refused send and for a manual suppression.
     *
     * @param string|null $sourceEventId
     *
     * @return self
     */
    public function setSourceEventId(?string $sourceEventId): self
    {
        $this->initialized['sourceEventId'] = true;
        $this->sourceEventId = $sourceEventId;
        return $this;
    }
    /**
     * When the customer closed the conversation, as reported by Apple; when Apple refused a send because the conversation was closed; or when a manual suppression was added. This is what orders the list, and it can differ from `created_at`: earlier when a close reached us late, later when the customer closed the conversation again while this was in force, which moves it to that later close.
     * 
     *
     * @return \DateTime|null
     */
    public function getEffectiveAt(): ?\DateTime
    {
        return $this->effectiveAt;
    }
    /**
     * When the customer closed the conversation, as reported by Apple; when Apple refused a send because the conversation was closed; or when a manual suppression was added. This is what orders the list, and it can differ from `created_at`: earlier when a close reached us late, later when the customer closed the conversation again while this was in force, which moves it to that later close.
     *
     * @param \DateTime|null $effectiveAt
     *
     * @return self
     */
    public function setEffectiveAt(?\DateTime $effectiveAt): self
    {
        $this->initialized['effectiveAt'] = true;
        $this->effectiveAt = $effectiveAt;
        return $this;
    }
    /**
     * When we recorded it.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When we recorded it.
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
     * When we last recorded this suppression being stated. Later than `created_at` when it was stated again while already in force: your workspace adding it again, or the customer closing the conversation again. A repeat adds no new record.
     * 
     *
     * @return \DateTime|null
     */
    public function getLastAssertedAt(): ?\DateTime
    {
        return $this->lastAssertedAt;
    }
    /**
     * When we last recorded this suppression being stated. Later than `created_at` when it was stated again while already in force: your workspace adding it again, or the customer closing the conversation again. A repeat adds no new record.
     *
     * @param \DateTime|null $lastAssertedAt
     *
     * @return self
     */
    public function setLastAssertedAt(?\DateTime $lastAssertedAt): self
    {
        $this->initialized['lastAssertedAt'] = true;
        $this->lastAssertedAt = $lastAssertedAt;
        return $this;
    }
    /**
     * When this stopped applying. Null while it is still stopping messages.
     *
     * @return \DateTime|null
     */
    public function getEndedAt(): ?\DateTime
    {
        return $this->endedAt;
    }
    /**
     * When this stopped applying. Null while it is still stopping messages.
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
     * @return string|null
     */
    public function getEndedReason(): ?string
    {
        return $this->endedReason;
    }
    /**
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
     * When the customer returned to the conversation, as reported by Apple, or when your workspace ended it. Null while it is still stopping messages.
     * 
     *
     * @return \DateTime|null
     */
    public function getEndedEffectiveAt(): ?\DateTime
    {
        return $this->endedEffectiveAt;
    }
    /**
     * When the customer returned to the conversation, as reported by Apple, or when your workspace ended it. Null while it is still stopping messages.
     *
     * @param \DateTime|null $endedEffectiveAt
     *
     * @return self
     */
    public function setEndedEffectiveAt(?\DateTime $endedEffectiveAt): self
    {
        $this->initialized['endedEffectiveAt'] = true;
        $this->endedEffectiveAt = $endedEffectiveAt;
        return $this;
    }
    /**
     * The message the customer returned with, when there was one. Null while it is still stopping messages, and when something other than a customer message ended it: your workspace ending it, or the customer returning by accepting an invitation.
     * 
     *
     * @return string|null
     */
    public function getSourceEndMessageId(): ?string
    {
        return $this->sourceEndMessageId;
    }
    /**
     * The message the customer returned with, when there was one. Null while it is still stopping messages, and when something other than a customer message ended it: your workspace ending it, or the customer returning by accepting an invitation.
     *
     * @param string|null $sourceEndMessageId
     *
     * @return self
     */
    public function setSourceEndMessageId(?string $sourceEndMessageId): self
    {
        $this->initialized['sourceEndMessageId'] = true;
        $this->sourceEndMessageId = $sourceEndMessageId;
        return $this;
    }
}
