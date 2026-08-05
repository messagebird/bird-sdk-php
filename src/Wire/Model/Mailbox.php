<?php

namespace MessageBird\Wire\Model;

class Mailbox
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
     * The mailbox's email address. Immutable once created.
     *
     * @var string|null
     */
    protected $address;
    /**
     * Display name used as the sender name on mail from this mailbox. Null when unset.
     *
     * @var string|null
     */
    protected $displayName;
    /**
     * Default Reply-To address stamped on mail sent from this mailbox. Null when unset.
     *
     * @var string|null
     */
    protected $defaultReplyTo;
    /**
     * Which inbound mail the mailbox accepts. `open` accepts everything not blocked by a rule; `replies_only` accepts only replies to messages this mailbox has sent (a reply must match a message the mailbox sent, not merely land in an existing thread); `allowlist` accepts only senders matching an allow rule (replies to prior outbound are always admitted unless blocked); `drop` stores nothing.
     *
     * @var string|null
     */
    protected $receivePolicy;
    /**
     * Lifecycle state. Suspended mailboxes stop emitting events; inbound mail is retained as blocked.
     *
     * @var string|null
     */
    protected $state;
    /**
     * The channel this mailbox receives on. Always `email`.
     *
     * @var string|null
     */
    protected $channel;
    /**
     * The principal that owns the mailbox. Always the workspace.
     *
     * @var MailboxOwner|null
     */
    protected $owner;
    /**
     * @var string|null
     */
    protected $inboundAddressId;
    /**
     * How long the mailbox remembers message metadata and extracted text. Original rendered source (HTML, raw message, attachments) is always available for 30 days regardless of tier. `3y` and `10y` are reserved future tiers.
     *
     * @var string|null
     */
    protected $retentionTier;
    /**
     * Number of retained messages across all threads.
     *
     * @var int|null
     */
    protected $messageCount;
    /**
     * Number of retained threads.
     *
     * @var int|null
     */
    protected $threadCount;
    /**
     * Number of threads with unread messages in this mailbox, excluding trash. Null on create/update responses.
     * 
     *
     * @var int|null
     */
    protected $unreadThreadCount;
    /**
     * Your own key/value data attached to the mailbox. Up to 2 KB; keys starting with `__bird` are reserved.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * Whether Bird generated the local part of the address. `false` means a custom handle was chosen at creation; on the shared `inbox.ai` domain a custom handle counts against your plan's custom-handle allowance.
     *
     * @var bool|null
     */
    protected $localPartGenerated;
    /**
     * When the mailbox was created.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the mailbox was last updated.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * When the mailbox was deleted, or null if it is active. A deleted mailbox stops receiving mail immediately but can be restored for 30 days, after which it and its remembered messages are permanently removed.
     *
     * @var \DateTime|null
     */
    protected $deletedAt;
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
     * The mailbox's email address. Immutable once created.
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    /**
     * The mailbox's email address. Immutable once created.
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
     * Display name used as the sender name on mail from this mailbox. Null when unset.
     *
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * Display name used as the sender name on mail from this mailbox. Null when unset.
     *
     * @param string|null $displayName
     *
     * @return self
     */
    public function setDisplayName(?string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * Default Reply-To address stamped on mail sent from this mailbox. Null when unset.
     *
     * @return string|null
     */
    public function getDefaultReplyTo(): ?string
    {
        return $this->defaultReplyTo;
    }
    /**
     * Default Reply-To address stamped on mail sent from this mailbox. Null when unset.
     *
     * @param string|null $defaultReplyTo
     *
     * @return self
     */
    public function setDefaultReplyTo(?string $defaultReplyTo): self
    {
        $this->initialized['defaultReplyTo'] = true;
        $this->defaultReplyTo = $defaultReplyTo;
        return $this;
    }
    /**
     * Which inbound mail the mailbox accepts. `open` accepts everything not blocked by a rule; `replies_only` accepts only replies to messages this mailbox has sent (a reply must match a message the mailbox sent, not merely land in an existing thread); `allowlist` accepts only senders matching an allow rule (replies to prior outbound are always admitted unless blocked); `drop` stores nothing.
     *
     * @return string|null
     */
    public function getReceivePolicy(): ?string
    {
        return $this->receivePolicy;
    }
    /**
     * Which inbound mail the mailbox accepts. `open` accepts everything not blocked by a rule; `replies_only` accepts only replies to messages this mailbox has sent (a reply must match a message the mailbox sent, not merely land in an existing thread); `allowlist` accepts only senders matching an allow rule (replies to prior outbound are always admitted unless blocked); `drop` stores nothing.
     *
     * @param string|null $receivePolicy
     *
     * @return self
     */
    public function setReceivePolicy(?string $receivePolicy): self
    {
        $this->initialized['receivePolicy'] = true;
        $this->receivePolicy = $receivePolicy;
        return $this;
    }
    /**
     * Lifecycle state. Suspended mailboxes stop emitting events; inbound mail is retained as blocked.
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * Lifecycle state. Suspended mailboxes stop emitting events; inbound mail is retained as blocked.
     *
     * @param string|null $state
     *
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }
    /**
     * The channel this mailbox receives on. Always `email`.
     *
     * @return string|null
     */
    public function getChannel(): ?string
    {
        return $this->channel;
    }
    /**
     * The channel this mailbox receives on. Always `email`.
     *
     * @param string|null $channel
     *
     * @return self
     */
    public function setChannel(?string $channel): self
    {
        $this->initialized['channel'] = true;
        $this->channel = $channel;
        return $this;
    }
    /**
     * The principal that owns the mailbox. Always the workspace.
     *
     * @return MailboxOwner|null
     */
    public function getOwner(): ?MailboxOwner
    {
        return $this->owner;
    }
    /**
     * The principal that owns the mailbox. Always the workspace.
     *
     * @param MailboxOwner|null $owner
     *
     * @return self
     */
    public function setOwner(?MailboxOwner $owner): self
    {
        $this->initialized['owner'] = true;
        $this->owner = $owner;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getInboundAddressId(): ?string
    {
        return $this->inboundAddressId;
    }
    /**
     * @param string|null $inboundAddressId
     *
     * @return self
     */
    public function setInboundAddressId(?string $inboundAddressId): self
    {
        $this->initialized['inboundAddressId'] = true;
        $this->inboundAddressId = $inboundAddressId;
        return $this;
    }
    /**
     * How long the mailbox remembers message metadata and extracted text. Original rendered source (HTML, raw message, attachments) is always available for 30 days regardless of tier. `3y` and `10y` are reserved future tiers.
     *
     * @return string|null
     */
    public function getRetentionTier(): ?string
    {
        return $this->retentionTier;
    }
    /**
     * How long the mailbox remembers message metadata and extracted text. Original rendered source (HTML, raw message, attachments) is always available for 30 days regardless of tier. `3y` and `10y` are reserved future tiers.
     *
     * @param string|null $retentionTier
     *
     * @return self
     */
    public function setRetentionTier(?string $retentionTier): self
    {
        $this->initialized['retentionTier'] = true;
        $this->retentionTier = $retentionTier;
        return $this;
    }
    /**
     * Number of retained messages across all threads.
     *
     * @return int|null
     */
    public function getMessageCount(): ?int
    {
        return $this->messageCount;
    }
    /**
     * Number of retained messages across all threads.
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
     * Number of retained threads.
     *
     * @return int|null
     */
    public function getThreadCount(): ?int
    {
        return $this->threadCount;
    }
    /**
     * Number of retained threads.
     *
     * @param int|null $threadCount
     *
     * @return self
     */
    public function setThreadCount(?int $threadCount): self
    {
        $this->initialized['threadCount'] = true;
        $this->threadCount = $threadCount;
        return $this;
    }
    /**
     * Number of threads with unread messages in this mailbox, excluding trash. Null on create/update responses.
     * 
     *
     * @return int|null
     */
    public function getUnreadThreadCount(): ?int
    {
        return $this->unreadThreadCount;
    }
    /**
     * Number of threads with unread messages in this mailbox, excluding trash. Null on create/update responses.
     *
     * @param int|null $unreadThreadCount
     *
     * @return self
     */
    public function setUnreadThreadCount(?int $unreadThreadCount): self
    {
        $this->initialized['unreadThreadCount'] = true;
        $this->unreadThreadCount = $unreadThreadCount;
        return $this;
    }
    /**
     * Your own key/value data attached to the mailbox. Up to 2 KB; keys starting with `__bird` are reserved.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Your own key/value data attached to the mailbox. Up to 2 KB; keys starting with `__bird` are reserved.
     *
     * @param array<string, mixed>|null $metadata
     *
     * @return self
     */
    public function setMetadata(?iterable $metadata): self
    {
        $this->initialized['metadata'] = true;
        $this->metadata = $metadata;
        return $this;
    }
    /**
     * Whether Bird generated the local part of the address. `false` means a custom handle was chosen at creation; on the shared `inbox.ai` domain a custom handle counts against your plan's custom-handle allowance.
     *
     * @return bool|null
     */
    public function getLocalPartGenerated(): ?bool
    {
        return $this->localPartGenerated;
    }
    /**
     * Whether Bird generated the local part of the address. `false` means a custom handle was chosen at creation; on the shared `inbox.ai` domain a custom handle counts against your plan's custom-handle allowance.
     *
     * @param bool|null $localPartGenerated
     *
     * @return self
     */
    public function setLocalPartGenerated(?bool $localPartGenerated): self
    {
        $this->initialized['localPartGenerated'] = true;
        $this->localPartGenerated = $localPartGenerated;
        return $this;
    }
    /**
     * When the mailbox was created.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the mailbox was created.
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
     * When the mailbox was last updated.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When the mailbox was last updated.
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
    /**
     * When the mailbox was deleted, or null if it is active. A deleted mailbox stops receiving mail immediately but can be restored for 30 days, after which it and its remembered messages are permanently removed.
     *
     * @return \DateTime|null
     */
    public function getDeletedAt(): ?\DateTime
    {
        return $this->deletedAt;
    }
    /**
     * When the mailbox was deleted, or null if it is active. A deleted mailbox stops receiving mail immediately but can be restored for 30 days, after which it and its remembered messages are permanently removed.
     *
     * @param \DateTime|null $deletedAt
     *
     * @return self
     */
    public function setDeletedAt(?\DateTime $deletedAt): self
    {
        $this->initialized['deletedAt'] = true;
        $this->deletedAt = $deletedAt;
        return $this;
    }
}
