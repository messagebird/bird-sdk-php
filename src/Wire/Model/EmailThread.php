<?php

namespace MessageBird\Wire\Model;

class EmailThread
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
    protected $mailboxId;
    /**
     * Channel this conversation lives on. Always `email`.
     *
     * @var string|null
     */
    protected $channel;
    /**
     * Contact linked to this conversation, or null when none is linked.
     *
     * @var string|null
     */
    protected $contactId;
    /**
     * Subject of the conversation, taken from its first message. Null when that message had no subject.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * Addresses that appear on the retained messages in this conversation, including the mailbox's own address.
     *
     * @var list<string>|null
     */
    protected $participants;
    /**
     * Number of retained messages in this conversation, both directions.
     *
     * @var int|null
     */
    protected $messageCount;
    /**
     * Number of retained received messages that are still unread. Spam and blocked mail is not counted.
     *
     * @var int|null
     */
    protected $unreadCount;
    /**
     * When the most recent retained message in this conversation was received or sent.
     *
     * @var \DateTime|null
     */
    protected $lastMessageAt;
    /**
     * Direction of the most recent message — `inbound` for a received message, `outbound` for a sent one.
     *
     * @var string|null
     */
    protected $lastDirection;
    /**
     * Labels on this conversation. Exactly one system placement label is always present — `inbox`, `archive` (filed away, done for now), `spam` (the opening message failed sender authentication), or `blocked` (rejected by the mailbox's receive policy or rules) — set by the message that started the conversation. Move a conversation by updating its labels: add `spam` to file it as spam, add `archive` to clean it out of the inbox, and add `inbox` — or remove `spam`, `blocked`, or `archive` — to bring it back. An archived conversation returns to the inbox by itself when a new message arrives. Custom labels share the same list; a conversation carries at most 20.
     * 
     *
     * @var list<string>|null
     */
    protected $labels;
    /**
     * When the thread was created.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the thread last changed.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Matched search fragments for a thread, one array per field the query matched, with the matched terms wrapped in `**`. A field is present only when the query matched it, so the keys that are present tell you which fields produced the hit. Returned only on thread search results.
     * 
     *
     * @var EmailThreadHighlights|null
     */
    protected $highlights;
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
    public function getMailboxId(): ?string
    {
        return $this->mailboxId;
    }
    /**
     * @param string|null $mailboxId
     *
     * @return self
     */
    public function setMailboxId(?string $mailboxId): self
    {
        $this->initialized['mailboxId'] = true;
        $this->mailboxId = $mailboxId;
        return $this;
    }
    /**
     * Channel this conversation lives on. Always `email`.
     *
     * @return string|null
     */
    public function getChannel(): ?string
    {
        return $this->channel;
    }
    /**
     * Channel this conversation lives on. Always `email`.
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
     * Contact linked to this conversation, or null when none is linked.
     *
     * @return string|null
     */
    public function getContactId(): ?string
    {
        return $this->contactId;
    }
    /**
     * Contact linked to this conversation, or null when none is linked.
     *
     * @param string|null $contactId
     *
     * @return self
     */
    public function setContactId(?string $contactId): self
    {
        $this->initialized['contactId'] = true;
        $this->contactId = $contactId;
        return $this;
    }
    /**
     * Subject of the conversation, taken from its first message. Null when that message had no subject.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * Subject of the conversation, taken from its first message. Null when that message had no subject.
     *
     * @param string|null $subject
     *
     * @return self
     */
    public function setSubject(?string $subject): self
    {
        $this->initialized['subject'] = true;
        $this->subject = $subject;
        return $this;
    }
    /**
     * Addresses that appear on the retained messages in this conversation, including the mailbox's own address.
     *
     * @return list<string>|null
     */
    public function getParticipants(): ?array
    {
        return $this->participants;
    }
    /**
     * Addresses that appear on the retained messages in this conversation, including the mailbox's own address.
     *
     * @param list<string>|null $participants
     *
     * @return self
     */
    public function setParticipants(?array $participants): self
    {
        $this->initialized['participants'] = true;
        $this->participants = $participants;
        return $this;
    }
    /**
     * Number of retained messages in this conversation, both directions.
     *
     * @return int|null
     */
    public function getMessageCount(): ?int
    {
        return $this->messageCount;
    }
    /**
     * Number of retained messages in this conversation, both directions.
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
     * Number of retained received messages that are still unread. Spam and blocked mail is not counted.
     *
     * @return int|null
     */
    public function getUnreadCount(): ?int
    {
        return $this->unreadCount;
    }
    /**
     * Number of retained received messages that are still unread. Spam and blocked mail is not counted.
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
     * When the most recent retained message in this conversation was received or sent.
     *
     * @return \DateTime|null
     */
    public function getLastMessageAt(): ?\DateTime
    {
        return $this->lastMessageAt;
    }
    /**
     * When the most recent retained message in this conversation was received or sent.
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
     * Direction of the most recent message — `inbound` for a received message, `outbound` for a sent one.
     *
     * @return string|null
     */
    public function getLastDirection(): ?string
    {
        return $this->lastDirection;
    }
    /**
     * Direction of the most recent message — `inbound` for a received message, `outbound` for a sent one.
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
     * Labels on this conversation. Exactly one system placement label is always present — `inbox`, `archive` (filed away, done for now), `spam` (the opening message failed sender authentication), or `blocked` (rejected by the mailbox's receive policy or rules) — set by the message that started the conversation. Move a conversation by updating its labels: add `spam` to file it as spam, add `archive` to clean it out of the inbox, and add `inbox` — or remove `spam`, `blocked`, or `archive` — to bring it back. An archived conversation returns to the inbox by itself when a new message arrives. Custom labels share the same list; a conversation carries at most 20.
     * 
     *
     * @return list<string>|null
     */
    public function getLabels(): ?array
    {
        return $this->labels;
    }
    /**
     * Labels on this conversation. Exactly one system placement label is always present — `inbox`, `archive` (filed away, done for now), `spam` (the opening message failed sender authentication), or `blocked` (rejected by the mailbox's receive policy or rules) — set by the message that started the conversation. Move a conversation by updating its labels: add `spam` to file it as spam, add `archive` to clean it out of the inbox, and add `inbox` — or remove `spam`, `blocked`, or `archive` — to bring it back. An archived conversation returns to the inbox by itself when a new message arrives. Custom labels share the same list; a conversation carries at most 20.
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
     * When the thread was created.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the thread was created.
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
     * When the thread last changed.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When the thread last changed.
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
     * Matched search fragments for a thread, one array per field the query matched, with the matched terms wrapped in `**`. A field is present only when the query matched it, so the keys that are present tell you which fields produced the hit. Returned only on thread search results.
     * 
     *
     * @return EmailThreadHighlights|null
     */
    public function getHighlights(): ?EmailThreadHighlights
    {
        return $this->highlights;
    }
    /**
     * Matched search fragments for a thread, one array per field the query matched, with the matched terms wrapped in `**`. A field is present only when the query matched it, so the keys that are present tell you which fields produced the hit. Returned only on thread search results.
     *
     * @param EmailThreadHighlights|null $highlights
     *
     * @return self
     */
    public function setHighlights(?EmailThreadHighlights $highlights): self
    {
        $this->initialized['highlights'] = true;
        $this->highlights = $highlights;
        return $this;
    }
}
