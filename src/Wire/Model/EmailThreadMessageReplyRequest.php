<?php

namespace MessageBird\Wire\Model;

/**
 * A reply to a conversation message. For a received message, recipients are derived from its Reply-To address when present, otherwise its From address. For a message the mailbox sent, recipients are derived from its original To line. Set `reply_all` to also include the original To and Cc recipients (minus the mailbox's own address). Add `cc` or `bcc` to copy further recipients. The subject and threading headers are set automatically. At least one of `html` or `text` must be provided.
 */
class EmailThreadMessageReplyRequest
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
     * Send between 30 seconds and 30 days ahead, sharing the scheduled-email allowance. The scheduled send is listed separately and enters the conversation only at dispatch. Sender, mailbox and send-volume eligibility are rechecked then; refusal fails the schedule record without adding a conversation message. Retention starts at dispatch. Attachments are not supported on scheduled messages; send now or schedule without attachments.
     *
     * @var \DateTime|null
     */
    protected $scheduledAt;
    /**
     * HTML body of the reply. At least one of html or text must be provided.
     *
     * @var string|null
     */
    protected $html;
    /**
     * Plain-text body of the reply. At least one of html or text must be provided.
     *
     * @var string|null
     */
    protected $text;
    /**
     * Additional Cc recipients, merged with recipients derived by `reply_all`. Addresses already on the derived To line are dropped (case-insensitive). The merged Cc set must contain at most 50 addresses; larger sets return 422.
     *
     * @var list<string>|null
     */
    protected $cc;
    /**
     * Blind-copy recipients. Addresses already on the derived To or merged Cc line are dropped (case-insensitive). Bcc addresses are omitted from conversation participants, visible recipient headers, and the 202 response. Bcc delivery outcomes are excluded from the message's `recipients` list.
     *
     * @var list<string>|null
     */
    protected $bcc;
    /**
     * Also send the reply to the original To and Cc recipients, minus the mailbox's own address.
     *
     * @var bool|null
     */
    protected $replyAll = false;
    /**
     * Structured `{name, value}` labels for filtering and analytics on the sent-message log. Cap: 20 tags per send.
     * 
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Arbitrary JSON object stored on the send and echoed in webhook payloads. Cap: 2 KB serialized.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * Content classification, which controls suppression policy:
     * 
     * - `marketing`: Blocks on all suppression reasons.
     * - `transactional`: Allows delivery through complaint and unsubscribe suppressions, for receipts, password resets, and similar operational mail.
     * 
     *
     * @var string|null
     */
    protected $category;
    /**
     * File attachments to include with the reply. The send is rejected when the estimated generated message size exceeds 20 MB (bodies plus all attachments after base64 encoding). Keep total raw attachment content at or below 15 MB for reliable headroom. Attachment metadata stays on the message's `attachment_manifest`, and the bytes are downloadable for the mailbox's retention tier.
     * 
     *
     * @var list<EmailAttachment>|null
     */
    protected $attachments;
    /**
     * When scheduled_at is set, cancel if an inbound message arrives in the conversation before dispatch is claimed. Defaults to false: the frozen parent, recipients and content are sent unchanged even if new mail arrives.
     *
     * @var bool|null
     */
    protected $cancelOnReply = false;
    /**
     * Send between 30 seconds and 30 days ahead, sharing the scheduled-email allowance. The scheduled send is listed separately and enters the conversation only at dispatch. Sender, mailbox and send-volume eligibility are rechecked then; refusal fails the schedule record without adding a conversation message. Retention starts at dispatch. Attachments are not supported on scheduled messages; send now or schedule without attachments.
     *
     * @return \DateTime|null
     */
    public function getScheduledAt(): ?\DateTime
    {
        return $this->scheduledAt;
    }
    /**
     * Send between 30 seconds and 30 days ahead, sharing the scheduled-email allowance. The scheduled send is listed separately and enters the conversation only at dispatch. Sender, mailbox and send-volume eligibility are rechecked then; refusal fails the schedule record without adding a conversation message. Retention starts at dispatch. Attachments are not supported on scheduled messages; send now or schedule without attachments.
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
     * HTML body of the reply. At least one of html or text must be provided.
     *
     * @return string|null
     */
    public function getHtml(): ?string
    {
        return $this->html;
    }
    /**
     * HTML body of the reply. At least one of html or text must be provided.
     *
     * @param string|null $html
     *
     * @return self
     */
    public function setHtml(?string $html): self
    {
        $this->initialized['html'] = true;
        $this->html = $html;
        return $this;
    }
    /**
     * Plain-text body of the reply. At least one of html or text must be provided.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * Plain-text body of the reply. At least one of html or text must be provided.
     *
     * @param string|null $text
     *
     * @return self
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
    /**
     * Additional Cc recipients, merged with recipients derived by `reply_all`. Addresses already on the derived To line are dropped (case-insensitive). The merged Cc set must contain at most 50 addresses; larger sets return 422.
     *
     * @return list<string>|null
     */
    public function getCc(): ?array
    {
        return $this->cc;
    }
    /**
     * Additional Cc recipients, merged with recipients derived by `reply_all`. Addresses already on the derived To line are dropped (case-insensitive). The merged Cc set must contain at most 50 addresses; larger sets return 422.
     *
     * @param list<string>|null $cc
     *
     * @return self
     */
    public function setCc(?array $cc): self
    {
        $this->initialized['cc'] = true;
        $this->cc = $cc;
        return $this;
    }
    /**
     * Blind-copy recipients. Addresses already on the derived To or merged Cc line are dropped (case-insensitive). Bcc addresses are omitted from conversation participants, visible recipient headers, and the 202 response. Bcc delivery outcomes are excluded from the message's `recipients` list.
     *
     * @return list<string>|null
     */
    public function getBcc(): ?array
    {
        return $this->bcc;
    }
    /**
     * Blind-copy recipients. Addresses already on the derived To or merged Cc line are dropped (case-insensitive). Bcc addresses are omitted from conversation participants, visible recipient headers, and the 202 response. Bcc delivery outcomes are excluded from the message's `recipients` list.
     *
     * @param list<string>|null $bcc
     *
     * @return self
     */
    public function setBcc(?array $bcc): self
    {
        $this->initialized['bcc'] = true;
        $this->bcc = $bcc;
        return $this;
    }
    /**
     * Also send the reply to the original To and Cc recipients, minus the mailbox's own address.
     *
     * @return bool|null
     */
    public function getReplyAll(): ?bool
    {
        return $this->replyAll;
    }
    /**
     * Also send the reply to the original To and Cc recipients, minus the mailbox's own address.
     *
     * @param bool|null $replyAll
     *
     * @return self
     */
    public function setReplyAll(?bool $replyAll): self
    {
        $this->initialized['replyAll'] = true;
        $this->replyAll = $replyAll;
        return $this;
    }
    /**
     * Structured `{name, value}` labels for filtering and analytics on the sent-message log. Cap: 20 tags per send.
     * 
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Structured `{name, value}` labels for filtering and analytics on the sent-message log. Cap: 20 tags per send.
     *
     * @param list<Tag>|null $tags
     *
     * @return self
     */
    public function setTags(?array $tags): self
    {
        $this->initialized['tags'] = true;
        $this->tags = $tags;
        return $this;
    }
    /**
     * Arbitrary JSON object stored on the send and echoed in webhook payloads. Cap: 2 KB serialized.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Arbitrary JSON object stored on the send and echoed in webhook payloads. Cap: 2 KB serialized.
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
     * Content classification, which controls suppression policy:
     * 
     * - `marketing`: Blocks on all suppression reasons.
     * - `transactional`: Allows delivery through complaint and unsubscribe suppressions, for receipts, password resets, and similar operational mail.
     * 
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
    * Content classification, which controls suppression policy:
    
    - `marketing`: Blocks on all suppression reasons.
    - `transactional`: Allows delivery through complaint and unsubscribe suppressions, for receipts, password resets, and similar operational mail.
    
    *
    * @param string|null $category
    *
    * @return self
    */
    public function setCategory(?string $category): self
    {
        $this->initialized['category'] = true;
        $this->category = $category;
        return $this;
    }
    /**
     * File attachments to include with the reply. The send is rejected when the estimated generated message size exceeds 20 MB (bodies plus all attachments after base64 encoding). Keep total raw attachment content at or below 15 MB for reliable headroom. Attachment metadata stays on the message's `attachment_manifest`, and the bytes are downloadable for the mailbox's retention tier.
     * 
     *
     * @return list<EmailAttachment>|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }
    /**
     * File attachments to include with the reply. The send is rejected when the estimated generated message size exceeds 20 MB (bodies plus all attachments after base64 encoding). Keep total raw attachment content at or below 15 MB for reliable headroom. Attachment metadata stays on the message's `attachment_manifest`, and the bytes are downloadable for the mailbox's retention tier.
     *
     * @param list<EmailAttachment>|null $attachments
     *
     * @return self
     */
    public function setAttachments(?array $attachments): self
    {
        $this->initialized['attachments'] = true;
        $this->attachments = $attachments;
        return $this;
    }
    /**
     * When scheduled_at is set, cancel if an inbound message arrives in the conversation before dispatch is claimed. Defaults to false: the frozen parent, recipients and content are sent unchanged even if new mail arrives.
     *
     * @return bool|null
     */
    public function getCancelOnReply(): ?bool
    {
        return $this->cancelOnReply;
    }
    /**
     * When scheduled_at is set, cancel if an inbound message arrives in the conversation before dispatch is claimed. Defaults to false: the frozen parent, recipients and content are sent unchanged even if new mail arrives.
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
}
