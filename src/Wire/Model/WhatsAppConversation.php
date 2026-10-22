<?php

namespace MessageBird\Wire\Model;

/**
 * One WhatsApp conversation between a number you have connected and a single contact, or a group it belongs to. It holds who answers the conversation right now, its read state and labels, when its service window closes, and the most recent message. Resolving the inbox work preserves the conversation's ID and history. A new inbound message reopens it. Messages are retained for 30 days, and the conversation is deleted when its last message expires.
 */
class WhatsAppConversation
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
     * Your WhatsApp business phone number this conversation runs on, in E.164 format. It stays the same when you remove the number and connect it again. Null when Bird holds no phone number for it.
     * 
     *
     * @var string|null
     */
    protected $businessPhoneNumber;
    /**
     * The other side of the conversation: the contact, or the group it takes place in. A group conversation carries `group_id` and null contact identity fields.
     * 
     *
     * @var WhatsAppConversationRecipientWrapper|null
     */
    protected $recipient;
    /**
     * Whether the conversation needs attention in the workspace inbox. Set it to `resolved` when the work is finished. A new inbound message reopens the same conversation. Changing inbox status preserves message history and does not change the channel's permission to send messages or mark messages read.
     *
     * @var string|null
     */
    protected $inboxStatus;
    /**
     * Who answers this conversation right now. You take and release control in the dashboard inbox.
     *
     * @var string|null
     */
    protected $control;
    /**
     * The user this conversation is assigned to. Null when unassigned. Assignment is not rechecked against workspace membership on read, so it can still name a user whose access was removed.
     * 
     *
     * @var string|null
     */
    protected $assignedTo;
    /**
     * Customer-service window for a contact. Null for group conversations.
     *
     * @var WhatsAppConversationServiceWindow|null
     */
    protected $serviceWindow;
    /**
     * A pointer to the most recent message in this conversation. It names the message; read its content through the conversation's message list. Null when the conversation has no message yet.
     * 
     *
     * @var WhatsAppConversationLastMessage|null
     */
    protected $lastMessage;
    /**
     * Number of inbound messages the workspace has not acknowledged. Shared across the workspace. Sending a reply does not mark messages read.
     * 
     *
     * @var int|null
     */
    protected $unreadCount;
    /**
     * Workspace labels on this conversation. Labels do not change read state or inbox status.
     *
     * @var list<string>|null
     */
    protected $labels;
    /**
     * When Bird opened this conversation.
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
     * Your WhatsApp business phone number this conversation runs on, in E.164 format. It stays the same when you remove the number and connect it again. Null when Bird holds no phone number for it.
     * 
     *
     * @return string|null
     */
    public function getBusinessPhoneNumber(): ?string
    {
        return $this->businessPhoneNumber;
    }
    /**
     * Your WhatsApp business phone number this conversation runs on, in E.164 format. It stays the same when you remove the number and connect it again. Null when Bird holds no phone number for it.
     *
     * @param string|null $businessPhoneNumber
     *
     * @return self
     */
    public function setBusinessPhoneNumber(?string $businessPhoneNumber): self
    {
        $this->initialized['businessPhoneNumber'] = true;
        $this->businessPhoneNumber = $businessPhoneNumber;
        return $this;
    }
    /**
     * The other side of the conversation: the contact, or the group it takes place in. A group conversation carries `group_id` and null contact identity fields.
     * 
     *
     * @return WhatsAppConversationRecipientWrapper|null
     */
    public function getRecipient(): ?WhatsAppConversationRecipientWrapper
    {
        return $this->recipient;
    }
    /**
     * The other side of the conversation: the contact, or the group it takes place in. A group conversation carries `group_id` and null contact identity fields.
     *
     * @param WhatsAppConversationRecipientWrapper|WhatsAppConversationRecipient|array|null $recipient
     *
     * @return self
     */
    public function setRecipient($recipient): self
    {
        $this->initialized['recipient'] = true;
        $this->recipient = \MessageBird\Core\ModelWrapper::normalize($recipient, WhatsAppConversationRecipientWrapper::class);
        return $this;
    }
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
     * Who answers this conversation right now. You take and release control in the dashboard inbox.
     *
     * @return string|null
     */
    public function getControl(): ?string
    {
        return $this->control;
    }
    /**
     * Who answers this conversation right now. You take and release control in the dashboard inbox.
     *
     * @param string|null $control
     *
     * @return self
     */
    public function setControl(?string $control): self
    {
        $this->initialized['control'] = true;
        $this->control = $control;
        return $this;
    }
    /**
     * The user this conversation is assigned to. Null when unassigned. Assignment is not rechecked against workspace membership on read, so it can still name a user whose access was removed.
     * 
     *
     * @return string|null
     */
    public function getAssignedTo(): ?string
    {
        return $this->assignedTo;
    }
    /**
     * The user this conversation is assigned to. Null when unassigned. Assignment is not rechecked against workspace membership on read, so it can still name a user whose access was removed.
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
     * Customer-service window for a contact. Null for group conversations.
     *
     * @return WhatsAppConversationServiceWindow|null
     */
    public function getServiceWindow(): ?WhatsAppConversationServiceWindow
    {
        return $this->serviceWindow;
    }
    /**
     * Customer-service window for a contact. Null for group conversations.
     *
     * @param WhatsAppConversationServiceWindow|null $serviceWindow
     *
     * @return self
     */
    public function setServiceWindow(?WhatsAppConversationServiceWindow $serviceWindow): self
    {
        $this->initialized['serviceWindow'] = true;
        $this->serviceWindow = $serviceWindow;
        return $this;
    }
    /**
     * A pointer to the most recent message in this conversation. It names the message; read its content through the conversation's message list. Null when the conversation has no message yet.
     * 
     *
     * @return WhatsAppConversationLastMessage|null
     */
    public function getLastMessage(): ?WhatsAppConversationLastMessage
    {
        return $this->lastMessage;
    }
    /**
     * A pointer to the most recent message in this conversation. It names the message; read its content through the conversation's message list. Null when the conversation has no message yet.
     *
     * @param WhatsAppConversationLastMessage|null $lastMessage
     *
     * @return self
     */
    public function setLastMessage(?WhatsAppConversationLastMessage $lastMessage): self
    {
        $this->initialized['lastMessage'] = true;
        $this->lastMessage = $lastMessage;
        return $this;
    }
    /**
     * Number of inbound messages the workspace has not acknowledged. Shared across the workspace. Sending a reply does not mark messages read.
     * 
     *
     * @return int|null
     */
    public function getUnreadCount(): ?int
    {
        return $this->unreadCount;
    }
    /**
     * Number of inbound messages the workspace has not acknowledged. Shared across the workspace. Sending a reply does not mark messages read.
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
     * When Bird opened this conversation.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When Bird opened this conversation.
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
