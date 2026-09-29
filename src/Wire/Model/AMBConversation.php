<?php

namespace MessageBird\Wire\Model;

class AMBConversation
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
     * @var string|null
     */
    protected $businessAccountId;
    /**
     * Whether a conversation is open or closed. There is no close operation on this API: only the customer closes a conversation from their device, and any inbound message on a closed conversation reopens it.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * How the conversation started. `entry_point` means the customer opened it from one of your configured Apple Messages for Business entry points. `invitation` means the customer accepted an invitation and sent a message. This is set once when the conversation is created and never changes.
     * 
     *
     * @var string|null
     */
    protected $origin;
    /**
     * Apple's opaque identifier for the customer with this business. The customer must send a message before a conversation is created. Null when no identifier is recorded.
     * 
     *
     * @var string|null
     */
    protected $opaqueUserId;
    /**
     * Customer phone number, when recorded. Null when unknown. Read the invitation's `to` field for the number an invitation was sent to.
     * 
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * The `group` value carried by the inbound message that opened or most recently reopened the conversation. Your business chooses it when configuring an entry point with Apple, and Apple passes it through; used with `intent_id` to route the conversation. Null when that message carried none.
     * 
     *
     * @var string|null
     */
    protected $groupId;
    /**
     * The `intent` value carried by the inbound message that opened or most recently reopened the conversation. Your business chooses it when configuring an entry point with Apple, and Apple passes it through; used with `group_id` to route the conversation. Null when that message carried none.
     * 
     *
     * @var string|null
     */
    protected $intentId;
    /**
     * The entry point in your channel settings whose group and intent matched the inbound message that opened or most recently reopened the conversation. Null when no configured entry point matched.
     * 
     *
     * @var string|null
     */
    protected $entryPoint;
    /**
     * The capability tokens the customer's device advertised on its most recent message, replaced by each inbound rather than accumulated, so this describes the device in use now. An empty list means the device's capabilities are unknown. Implemented message types may still be sent, but device rendering support has not been confirmed. Authentication requires an explicitly advertised AUTH2 capability.
     * 
     *
     * @var list<string>|null
     */
    protected $deviceCapabilities;
    /**
     * Implemented baseline types plus interactive types confirmed by `device_capabilities`. An empty capability list yields text, attachments and rich links; it does not establish support for other types. Unadvertised quick replies, list pickers, time pickers and forms are refused when capabilities are known. Custom apps and opaque interactive references are not included because their device support cannot be inferred from these tokens. Unsupported roadmap types cannot be sent.
     * 
     *
     * @var list<string>|null
     */
    protected $supportedContentKinds;
    /**
     * The customer's locale from the most recent inbound message, or your business's default locale before any inbound arrives. Preserved in Apple's locale format, for example `en_US@rg=nlzzzz`.
     * 
     *
     * @var string|null
     */
    protected $locale;
    /**
     * Number of inbound messages since this conversation was last marked read. Incremented once per inbound message, reset to zero by marking the conversation read and by any outbound message your workspace sends.
     * 
     *
     * @var int|null
     */
    protected $unreadCount;
    /**
     * Number of messages in this conversation, both directions.
     *
     * @var int|null
     */
    protected $messageCount;
    /**
     * When the most recent message in this conversation was sent or received.
     *
     * @var \DateTime|null
     */
    protected $lastMessageAt;
    /**
     * Whether a message was sent by the business or received from the customer:
     * 
     * - `outbound`: A reply the business sent into the conversation.
     * - `inbound`: A message the customer sent.
     * 
     *
     * @var string|null
     */
    protected $lastDirection;
    /**
     * The user this conversation is assigned to, or null when unassigned. Assignment is not rechecked against workspace membership on read, so it can still name a user whose access was removed.
     * 
     *
     * @var string|null
     */
    protected $assignedTo;
    /**
     * Operator-set tags on this conversation. Unlike email, there are no system placement labels: every value here is one an operator chose.
     * 
     *
     * @var list<string>|null
     */
    protected $labels;
    /**
     * The console queue this conversation is routed to. Empty when no routing rule matched, which the console lists as unrouted.
     * 
     *
     * @var string|null
     */
    protected $queue;
    /**
     * When this conversation was closed. Null while it is open.
     *
     * @var \DateTime|null
     */
    protected $closedAt;
    /**
     * Why this conversation was closed. Null while it is open.
     *
     * @var string|null
     */
    protected $closedReason;
    /**
     * Number of times this conversation has been opened, starting at 1 and incremented on each reopen. A closed conversation reopens on the next inbound message rather than creating a new conversation.
     * 
     *
     * @var int|null
     */
    protected $openCount;
    /**
     * When this conversation was created.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When this conversation last changed.
     *
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
     * @return string|null
     */
    public function getBusinessAccountId(): ?string
    {
        return $this->businessAccountId;
    }
    /**
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
     * Whether a conversation is open or closed. There is no close operation on this API: only the customer closes a conversation from their device, and any inbound message on a closed conversation reopens it.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Whether a conversation is open or closed. There is no close operation on this API: only the customer closes a conversation from their device, and any inbound message on a closed conversation reopens it.
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
     * How the conversation started. `entry_point` means the customer opened it from one of your configured Apple Messages for Business entry points. `invitation` means the customer accepted an invitation and sent a message. This is set once when the conversation is created and never changes.
     * 
     *
     * @return string|null
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }
    /**
     * How the conversation started. `entry_point` means the customer opened it from one of your configured Apple Messages for Business entry points. `invitation` means the customer accepted an invitation and sent a message. This is set once when the conversation is created and never changes.
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
     * Apple's opaque identifier for the customer with this business. The customer must send a message before a conversation is created. Null when no identifier is recorded.
     * 
     *
     * @return string|null
     */
    public function getOpaqueUserId(): ?string
    {
        return $this->opaqueUserId;
    }
    /**
     * Apple's opaque identifier for the customer with this business. The customer must send a message before a conversation is created. Null when no identifier is recorded.
     *
     * @param string|null $opaqueUserId
     *
     * @return self
     */
    public function setOpaqueUserId(?string $opaqueUserId): self
    {
        $this->initialized['opaqueUserId'] = true;
        $this->opaqueUserId = $opaqueUserId;
        return $this;
    }
    /**
     * Customer phone number, when recorded. Null when unknown. Read the invitation's `to` field for the number an invitation was sent to.
     * 
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * Customer phone number, when recorded. Null when unknown. Read the invitation's `to` field for the number an invitation was sent to.
     *
     * @param string|null $phoneNumber
     *
     * @return self
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->initialized['phoneNumber'] = true;
        $this->phoneNumber = $phoneNumber;
        return $this;
    }
    /**
     * The `group` value carried by the inbound message that opened or most recently reopened the conversation. Your business chooses it when configuring an entry point with Apple, and Apple passes it through; used with `intent_id` to route the conversation. Null when that message carried none.
     * 
     *
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }
    /**
     * The `group` value carried by the inbound message that opened or most recently reopened the conversation. Your business chooses it when configuring an entry point with Apple, and Apple passes it through; used with `intent_id` to route the conversation. Null when that message carried none.
     *
     * @param string|null $groupId
     *
     * @return self
     */
    public function setGroupId(?string $groupId): self
    {
        $this->initialized['groupId'] = true;
        $this->groupId = $groupId;
        return $this;
    }
    /**
     * The `intent` value carried by the inbound message that opened or most recently reopened the conversation. Your business chooses it when configuring an entry point with Apple, and Apple passes it through; used with `group_id` to route the conversation. Null when that message carried none.
     * 
     *
     * @return string|null
     */
    public function getIntentId(): ?string
    {
        return $this->intentId;
    }
    /**
     * The `intent` value carried by the inbound message that opened or most recently reopened the conversation. Your business chooses it when configuring an entry point with Apple, and Apple passes it through; used with `group_id` to route the conversation. Null when that message carried none.
     *
     * @param string|null $intentId
     *
     * @return self
     */
    public function setIntentId(?string $intentId): self
    {
        $this->initialized['intentId'] = true;
        $this->intentId = $intentId;
        return $this;
    }
    /**
     * The entry point in your channel settings whose group and intent matched the inbound message that opened or most recently reopened the conversation. Null when no configured entry point matched.
     * 
     *
     * @return string|null
     */
    public function getEntryPoint(): ?string
    {
        return $this->entryPoint;
    }
    /**
     * The entry point in your channel settings whose group and intent matched the inbound message that opened or most recently reopened the conversation. Null when no configured entry point matched.
     *
     * @param string|null $entryPoint
     *
     * @return self
     */
    public function setEntryPoint(?string $entryPoint): self
    {
        $this->initialized['entryPoint'] = true;
        $this->entryPoint = $entryPoint;
        return $this;
    }
    /**
     * The capability tokens the customer's device advertised on its most recent message, replaced by each inbound rather than accumulated, so this describes the device in use now. An empty list means the device's capabilities are unknown. Implemented message types may still be sent, but device rendering support has not been confirmed. Authentication requires an explicitly advertised AUTH2 capability.
     * 
     *
     * @return list<string>|null
     */
    public function getDeviceCapabilities(): ?array
    {
        return $this->deviceCapabilities;
    }
    /**
     * The capability tokens the customer's device advertised on its most recent message, replaced by each inbound rather than accumulated, so this describes the device in use now. An empty list means the device's capabilities are unknown. Implemented message types may still be sent, but device rendering support has not been confirmed. Authentication requires an explicitly advertised AUTH2 capability.
     *
     * @param list<string>|null $deviceCapabilities
     *
     * @return self
     */
    public function setDeviceCapabilities(?array $deviceCapabilities): self
    {
        $this->initialized['deviceCapabilities'] = true;
        $this->deviceCapabilities = $deviceCapabilities;
        return $this;
    }
    /**
     * Implemented baseline types plus interactive types confirmed by `device_capabilities`. An empty capability list yields text, attachments and rich links; it does not establish support for other types. Unadvertised quick replies, list pickers, time pickers and forms are refused when capabilities are known. Custom apps and opaque interactive references are not included because their device support cannot be inferred from these tokens. Unsupported roadmap types cannot be sent.
     * 
     *
     * @return list<string>|null
     */
    public function getSupportedContentKinds(): ?array
    {
        return $this->supportedContentKinds;
    }
    /**
     * Implemented baseline types plus interactive types confirmed by `device_capabilities`. An empty capability list yields text, attachments and rich links; it does not establish support for other types. Unadvertised quick replies, list pickers, time pickers and forms are refused when capabilities are known. Custom apps and opaque interactive references are not included because their device support cannot be inferred from these tokens. Unsupported roadmap types cannot be sent.
     *
     * @param list<string>|null $supportedContentKinds
     *
     * @return self
     */
    public function setSupportedContentKinds(?array $supportedContentKinds): self
    {
        $this->initialized['supportedContentKinds'] = true;
        $this->supportedContentKinds = $supportedContentKinds;
        return $this;
    }
    /**
     * The customer's locale from the most recent inbound message, or your business's default locale before any inbound arrives. Preserved in Apple's locale format, for example `en_US@rg=nlzzzz`.
     * 
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }
    /**
     * The customer's locale from the most recent inbound message, or your business's default locale before any inbound arrives. Preserved in Apple's locale format, for example `en_US@rg=nlzzzz`.
     *
     * @param string|null $locale
     *
     * @return self
     */
    public function setLocale(?string $locale): self
    {
        $this->initialized['locale'] = true;
        $this->locale = $locale;
        return $this;
    }
    /**
     * Number of inbound messages since this conversation was last marked read. Incremented once per inbound message, reset to zero by marking the conversation read and by any outbound message your workspace sends.
     * 
     *
     * @return int|null
     */
    public function getUnreadCount(): ?int
    {
        return $this->unreadCount;
    }
    /**
     * Number of inbound messages since this conversation was last marked read. Incremented once per inbound message, reset to zero by marking the conversation read and by any outbound message your workspace sends.
     *
     * @param int|null $unreadCount
     *
     * @return self
     */
    public function setUnreadCount(?int $unreadCount): self
    {
        $this->initialized['unreadCount'] = true;
        $this->unreadCount = $unreadCount;
        return $this;
    }
    /**
     * Number of messages in this conversation, both directions.
     *
     * @return int|null
     */
    public function getMessageCount(): ?int
    {
        return $this->messageCount;
    }
    /**
     * Number of messages in this conversation, both directions.
     *
     * @param int|null $messageCount
     *
     * @return self
     */
    public function setMessageCount(?int $messageCount): self
    {
        $this->initialized['messageCount'] = true;
        $this->messageCount = $messageCount;
        return $this;
    }
    /**
     * When the most recent message in this conversation was sent or received.
     *
     * @return \DateTime|null
     */
    public function getLastMessageAt(): ?\DateTime
    {
        return $this->lastMessageAt;
    }
    /**
     * When the most recent message in this conversation was sent or received.
     *
     * @param \DateTime|null $lastMessageAt
     *
     * @return self
     */
    public function setLastMessageAt(?\DateTime $lastMessageAt): self
    {
        $this->initialized['lastMessageAt'] = true;
        $this->lastMessageAt = $lastMessageAt;
        return $this;
    }
    /**
     * Whether a message was sent by the business or received from the customer:
     * 
     * - `outbound`: A reply the business sent into the conversation.
     * - `inbound`: A message the customer sent.
     * 
     *
     * @return string|null
     */
    public function getLastDirection(): ?string
    {
        return $this->lastDirection;
    }
    /**
    * Whether a message was sent by the business or received from the customer:
    
    - `outbound`: A reply the business sent into the conversation.
    - `inbound`: A message the customer sent.
    
    *
    * @param string|null $lastDirection
    *
    * @return self
    */
    public function setLastDirection(?string $lastDirection): self
    {
        $this->initialized['lastDirection'] = true;
        $this->lastDirection = $lastDirection;
        return $this;
    }
    /**
     * The user this conversation is assigned to, or null when unassigned. Assignment is not rechecked against workspace membership on read, so it can still name a user whose access was removed.
     * 
     *
     * @return string|null
     */
    public function getAssignedTo(): ?string
    {
        return $this->assignedTo;
    }
    /**
     * The user this conversation is assigned to, or null when unassigned. Assignment is not rechecked against workspace membership on read, so it can still name a user whose access was removed.
     *
     * @param string|null $assignedTo
     *
     * @return self
     */
    public function setAssignedTo(?string $assignedTo): self
    {
        $this->initialized['assignedTo'] = true;
        $this->assignedTo = $assignedTo;
        return $this;
    }
    /**
     * Operator-set tags on this conversation. Unlike email, there are no system placement labels: every value here is one an operator chose.
     * 
     *
     * @return list<string>|null
     */
    public function getLabels(): ?array
    {
        return $this->labels;
    }
    /**
     * Operator-set tags on this conversation. Unlike email, there are no system placement labels: every value here is one an operator chose.
     *
     * @param list<string>|null $labels
     *
     * @return self
     */
    public function setLabels(?array $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;
        return $this;
    }
    /**
     * The console queue this conversation is routed to. Empty when no routing rule matched, which the console lists as unrouted.
     * 
     *
     * @return string|null
     */
    public function getQueue(): ?string
    {
        return $this->queue;
    }
    /**
     * The console queue this conversation is routed to. Empty when no routing rule matched, which the console lists as unrouted.
     *
     * @param string|null $queue
     *
     * @return self
     */
    public function setQueue(?string $queue): self
    {
        $this->initialized['queue'] = true;
        $this->queue = $queue;
        return $this;
    }
    /**
     * When this conversation was closed. Null while it is open.
     *
     * @return \DateTime|null
     */
    public function getClosedAt(): ?\DateTime
    {
        return $this->closedAt;
    }
    /**
     * When this conversation was closed. Null while it is open.
     *
     * @param \DateTime|null $closedAt
     *
     * @return self
     */
    public function setClosedAt(?\DateTime $closedAt): self
    {
        $this->initialized['closedAt'] = true;
        $this->closedAt = $closedAt;
        return $this;
    }
    /**
     * Why this conversation was closed. Null while it is open.
     *
     * @return string|null
     */
    public function getClosedReason(): ?string
    {
        return $this->closedReason;
    }
    /**
     * Why this conversation was closed. Null while it is open.
     *
     * @param string|null $closedReason
     *
     * @return self
     */
    public function setClosedReason(?string $closedReason): self
    {
        $this->initialized['closedReason'] = true;
        $this->closedReason = $closedReason;
        return $this;
    }
    /**
     * Number of times this conversation has been opened, starting at 1 and incremented on each reopen. A closed conversation reopens on the next inbound message rather than creating a new conversation.
     * 
     *
     * @return int|null
     */
    public function getOpenCount(): ?int
    {
        return $this->openCount;
    }
    /**
     * Number of times this conversation has been opened, starting at 1 and incremented on each reopen. A closed conversation reopens on the next inbound message rather than creating a new conversation.
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
     * When this conversation was created.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When this conversation was created.
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
     * When this conversation last changed.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When this conversation last changed.
     *
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
