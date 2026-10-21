<?php

namespace MessageBird\Wire\Model;

/**
 * A mailbox-owned scheduled send, separate from conversation messages. Sent means handed to the ordinary send pipeline, not delivered; follow message_id for delivery status. Frozen recipients and reply headers do not change when new mail arrives. Terminal records remain until the mailbox is permanently erased.
 */
class EmailMailboxScheduledMessage extends \ArrayObject
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
     * @var string|null
     */
    protected $threadId;
    /**
     * @var string|null
     */
    protected $messageId;
    /**
     * - `scheduled`: Waiting for its due time; cancellation is still possible.
     * - `sending`: Dispatch has been claimed; cancellation is no longer possible.
     * - `sent`: Handed to the ordinary send pipeline, not necessarily delivered. Follow message_id for delivery status.
     * - `failed`: Terminal dispatch refusal or failure; see failure_reason. The schedule will not retry.
     * - `canceled`: Terminal cancellation before dispatch; see cancellation_reason. The message will not send.
     *
     * @var string|null
     */
    protected $status;
    /**
     * Scheduled at.
     *
     * @var \DateTime|null
     */
    protected $scheduledAt;
    /**
     * Whether an inbound message cancels this send before dispatch is claimed.
     *
     * @var bool|null
     */
    protected $cancelOnReply;
    /**
     * Why dispatch failed.
     *
     * @var string|null
     */
    protected $failureReason;
    /**
     * Why canceled; replied means new inbound mail canceled an opted-in schedule.
     *
     * @var string|null
     */
    protected $cancellationReason;
    /**
     * Frozen subject.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * Plain-text preview of the frozen message.
     *
     * @var string|null
     */
    protected $snippet;
    /**
     * Visible recipients (To and Cc). Bcc addresses remain only in the frozen send payload.
     *
     * @var list<string>|null
     */
    protected $recipients;
    /**
     * @var Actor|null
     */
    protected $createdBy;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
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
     * @return string|null
     */
    public function getThreadId(): ?string
    {
        return $this->threadId;
    }
    /**
     * @param string|null $threadId
     *
     * @return self
     */
    public function setThreadId(?string $threadId): self
    {
        $this->initialized['threadId'] = true;
        $this->threadId = $threadId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getMessageId(): ?string
    {
        return $this->messageId;
    }
    /**
     * @param string|null $messageId
     *
     * @return self
     */
    public function setMessageId(?string $messageId): self
    {
        $this->initialized['messageId'] = true;
        $this->messageId = $messageId;
        return $this;
    }
    /**
     * - `scheduled`: Waiting for its due time; cancellation is still possible.
     * - `sending`: Dispatch has been claimed; cancellation is no longer possible.
     * - `sent`: Handed to the ordinary send pipeline, not necessarily delivered. Follow message_id for delivery status.
     * - `failed`: Terminal dispatch refusal or failure; see failure_reason. The schedule will not retry.
     * - `canceled`: Terminal cancellation before dispatch; see cancellation_reason. The message will not send.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * - `scheduled`: Waiting for its due time; cancellation is still possible.
    - `sending`: Dispatch has been claimed; cancellation is no longer possible.
    - `sent`: Handed to the ordinary send pipeline, not necessarily delivered. Follow message_id for delivery status.
    - `failed`: Terminal dispatch refusal or failure; see failure_reason. The schedule will not retry.
    - `canceled`: Terminal cancellation before dispatch; see cancellation_reason. The message will not send.
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
     * Scheduled at.
     *
     * @return \DateTime|null
     */
    public function getScheduledAt(): ?\DateTime
    {
        return $this->scheduledAt;
    }
    /**
     * Scheduled at.
     *
     * @param \DateTime|null $scheduledAt
     *
     * @return self
     */
    public function setScheduledAt(?\DateTime $scheduledAt): self
    {
        $this->initialized['scheduledAt'] = true;
        $this->scheduledAt = $scheduledAt;
        return $this;
    }
    /**
     * Whether an inbound message cancels this send before dispatch is claimed.
     *
     * @return bool|null
     */
    public function getCancelOnReply(): ?bool
    {
        return $this->cancelOnReply;
    }
    /**
     * Whether an inbound message cancels this send before dispatch is claimed.
     *
     * @param bool|null $cancelOnReply
     *
     * @return self
     */
    public function setCancelOnReply(?bool $cancelOnReply): self
    {
        $this->initialized['cancelOnReply'] = true;
        $this->cancelOnReply = $cancelOnReply;
        return $this;
    }
    /**
     * Why dispatch failed.
     *
     * @return string|null
     */
    public function getFailureReason(): ?string
    {
        return $this->failureReason;
    }
    /**
     * Why dispatch failed.
     *
     * @param string|null $failureReason
     *
     * @return self
     */
    public function setFailureReason(?string $failureReason): self
    {
        $this->initialized['failureReason'] = true;
        $this->failureReason = $failureReason;
        return $this;
    }
    /**
     * Why canceled; replied means new inbound mail canceled an opted-in schedule.
     *
     * @return string|null
     */
    public function getCancellationReason(): ?string
    {
        return $this->cancellationReason;
    }
    /**
     * Why canceled; replied means new inbound mail canceled an opted-in schedule.
     *
     * @param string|null $cancellationReason
     *
     * @return self
     */
    public function setCancellationReason(?string $cancellationReason): self
    {
        $this->initialized['cancellationReason'] = true;
        $this->cancellationReason = $cancellationReason;
        return $this;
    }
    /**
     * Frozen subject.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * Frozen subject.
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
     * Plain-text preview of the frozen message.
     *
     * @return string|null
     */
    public function getSnippet(): ?string
    {
        return $this->snippet;
    }
    /**
     * Plain-text preview of the frozen message.
     *
     * @param string|null $snippet
     *
     * @return self
     */
    public function setSnippet(?string $snippet): self
    {
        $this->initialized['snippet'] = true;
        $this->snippet = $snippet;
        return $this;
    }
    /**
     * Visible recipients (To and Cc). Bcc addresses remain only in the frozen send payload.
     *
     * @return list<string>|null
     */
    public function getRecipients(): ?array
    {
        return $this->recipients;
    }
    /**
     * Visible recipients (To and Cc). Bcc addresses remain only in the frozen send payload.
     *
     * @param list<string>|null $recipients
     *
     * @return self
     */
    public function setRecipients(?array $recipients): self
    {
        $this->initialized['recipients'] = true;
        $this->recipients = $recipients;
        return $this;
    }
    /**
     * @return Actor|null
     */
    public function getCreatedBy(): ?Actor
    {
        return $this->createdBy;
    }
    /**
     * @param Actor|null $createdBy
     *
     * @return self
     */
    public function setCreatedBy(?Actor $createdBy): self
    {
        $this->initialized['createdBy'] = true;
        $this->createdBy = $createdBy;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
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
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
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
