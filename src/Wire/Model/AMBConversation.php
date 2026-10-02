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
     * Whether the conversation needs attention in the workspace inbox. Set it to `resolved` when the work is finished. A new inbound message reopens the same conversation. Changing inbox status preserves message history and does not change the channel's permission to send messages or mark messages read.
     *
     * @var string|null
     */
    protected $inboxStatus;
    /**
     * The customer on the other side of this Apple Messages for Business conversation.
     *
     * @var AMBConversationRecipient|null
     */
    protected $recipient;
    /**
     * Routing context the conversation is filed under. Routing rules set it when the conversation opens or reopens, or when the customer writes after it was resolved. A teammate can move the queue or apply a pending `routing_change`.
     *
     * @var AMBConversationRouting|null
     */
    protected $routing;
    /**
     * Routing from a later customer message that differs from `routing`, waiting for a teammate to apply or dismiss it. Null when there is none. Only recorded while the inbox status is open; resolving the conversation or moving its queue clears it.
     *
     * @var AMBConversationRoutingChange|null
     */
    protected $routingChange;
    /**
     * Most recent message, or null when its identity has not been recorded.
     *
     * @var AMBConversationLastMessage|null
     */
    protected $lastMessage;
    /**
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $businessAccountId;
    /**
     * Apple's native conversation state, which determines whether replies can be sent. A customer close or an Apple 410 response closes it; a newer inbound message reopens it. This API has no native close operation. Use `inbox_status` to resolve workspace inbox work independently.
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
     * Number of inbound messages the workspace has not acknowledged. Shared across the workspace. Pass read with a date-time to acknowledge received inbound messages through that timestamp. Sending a reply does not change this count.
     * 
     *
     * @var int|null
     */
    protected $unreadCount;
    /**
     * The user this conversation is assigned to, or null when unassigned. Assignment is not rechecked against workspace membership on read, so it can still name a user whose access was removed.
     * 
     *
     * @var string|null
     */
    protected $assignedTo;
    /**
     * Workspace labels on this conversation. Labels do not change read state or inbox status.
     *
     * @var list<string>|null
     */
    protected $labels;
    /**
     * When the native Apple conversation was closed. Null while its native status is open; independent of inbox status.
     *
     * @var \DateTime|null
     */
    protected $closedAt;
    /**
     * Why the native Apple conversation was closed. Null while its native status is open; independent of inbox status.
     *
     * @var string|null
     */
    protected $closedReason;
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
     * Whether the conversation needs attention in the workspace inbox. Set it to `resolved` when the work is finished. A new inbound message reopens the same conversation. Changing inbox status preserves message history and does not change the channel's permission to send messages or mark messages read.
     *
     * @return string|null
     */
    public function getInboxStatus(): ?string
    {
        return $this->inboxStatus;
    }
    /**
     * Whether the conversation needs attention in the workspace inbox. Set it to `resolved` when the work is finished. A new inbound message reopens the same conversation. Changing inbox status preserves message history and does not change the channel's permission to send messages or mark messages read.
     *
     * @param string|null $inboxStatus
     *
     * @return self
     */
    public function setInboxStatus(?string $inboxStatus): self
    {
        $this->initialized['inboxStatus'] = true;
        $this->inboxStatus = $inboxStatus;
        return $this;
    }
    /**
     * The customer on the other side of this Apple Messages for Business conversation.
     *
     * @return AMBConversationRecipient|null
     */
    public function getRecipient(): ?AMBConversationRecipient
    {
        return $this->recipient;
    }
    /**
     * The customer on the other side of this Apple Messages for Business conversation.
     *
     * @param AMBConversationRecipient|null $recipient
     *
     * @return self
     */
    public function setRecipient(?AMBConversationRecipient $recipient): self
    {
        $this->initialized['recipient'] = true;
        $this->recipient = $recipient;
        return $this;
    }
    /**
     * Routing context the conversation is filed under. Routing rules set it when the conversation opens or reopens, or when the customer writes after it was resolved. A teammate can move the queue or apply a pending `routing_change`.
     *
     * @return AMBConversationRouting|null
     */
    public function getRouting(): ?AMBConversationRouting
    {
        return $this->routing;
    }
    /**
     * Routing context the conversation is filed under. Routing rules set it when the conversation opens or reopens, or when the customer writes after it was resolved. A teammate can move the queue or apply a pending `routing_change`.
     *
     * @param AMBConversationRouting|null $routing
     *
     * @return self
     */
    public function setRouting(?AMBConversationRouting $routing): self
    {
        $this->initialized['routing'] = true;
        $this->routing = $routing;
        return $this;
    }
    /**
     * Routing from a later customer message that differs from `routing`, waiting for a teammate to apply or dismiss it. Null when there is none. Only recorded while the inbox status is open; resolving the conversation or moving its queue clears it.
     *
     * @return AMBConversationRoutingChange|null
     */
    public function getRoutingChange(): ?AMBConversationRoutingChange
    {
        return $this->routingChange;
    }
    /**
     * Routing from a later customer message that differs from `routing`, waiting for a teammate to apply or dismiss it. Null when there is none. Only recorded while the inbox status is open; resolving the conversation or moving its queue clears it.
     *
     * @param AMBConversationRoutingChange|null $routingChange
     *
     * @return self
     */
    public function setRoutingChange(?AMBConversationRoutingChange $routingChange): self
    {
        $this->initialized['routingChange'] = true;
        $this->routingChange = $routingChange;
        return $this;
    }
    /**
     * Most recent message, or null when its identity has not been recorded.
     *
     * @return AMBConversationLastMessage|null
     */
    public function getLastMessage(): ?AMBConversationLastMessage
    {
        return $this->lastMessage;
    }
    /**
     * Most recent message, or null when its identity has not been recorded.
     *
     * @param AMBConversationLastMessage|null $lastMessage
     *
     * @return self
     */
    public function setLastMessage(?AMBConversationLastMessage $lastMessage): self
    {
        $this->initialized['lastMessage'] = true;
        $this->lastMessage = $lastMessage;
        return $this;
    }
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
     * Apple's native conversation state, which determines whether replies can be sent. A customer close or an Apple 410 response closes it; a newer inbound message reopens it. This API has no native close operation. Use `inbox_status` to resolve workspace inbox work independently.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Apple's native conversation state, which determines whether replies can be sent. A customer close or an Apple 410 response closes it; a newer inbound message reopens it. This API has no native close operation. Use `inbox_status` to resolve workspace inbox work independently.
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
     * Number of inbound messages the workspace has not acknowledged. Shared across the workspace. Pass read with a date-time to acknowledge received inbound messages through that timestamp. Sending a reply does not change this count.
     * 
     *
     * @return int|null
     */
    public function getUnreadCount(): ?int
    {
        return $this->unreadCount;
    }
    /**
     * Number of inbound messages the workspace has not acknowledged. Shared across the workspace. Pass read with a date-time to acknowledge received inbound messages through that timestamp. Sending a reply does not change this count.
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
     * Workspace labels on this conversation. Labels do not change read state or inbox status.
     *
     * @return list<string>|null
     */
    public function getLabels(): ?array
    {
        return $this->labels;
    }
    /**
     * Workspace labels on this conversation. Labels do not change read state or inbox status.
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
     * When the native Apple conversation was closed. Null while its native status is open; independent of inbox status.
     *
     * @return \DateTime|null
     */
    public function getClosedAt(): ?\DateTime
    {
        return $this->closedAt;
    }
    /**
     * When the native Apple conversation was closed. Null while its native status is open; independent of inbox status.
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
     * Why the native Apple conversation was closed. Null while its native status is open; independent of inbox status.
     *
     * @return string|null
     */
    public function getClosedReason(): ?string
    {
        return $this->closedReason;
    }
    /**
     * Why the native Apple conversation was closed. Null while its native status is open; independent of inbox status.
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
