<?php

namespace MessageBird\Wire\Model;

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
     * File attachments to include with the reply. The send is rejected when the estimated generated message size exceeds 20 MB (bodies plus all attachments after base64 encoding). Keep total raw attachment content at or below 15 MB for reliable headroom. Attachment metadata stays on the message's `attachment_manifest`, and the bytes are downloadable for 30 days.
     * 
     *
     * @var list<EmailAttachment>|null
     */
    protected $attachments;
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
     * File attachments to include with the reply. The send is rejected when the estimated generated message size exceeds 20 MB (bodies plus all attachments after base64 encoding). Keep total raw attachment content at or below 15 MB for reliable headroom. Attachment metadata stays on the message's `attachment_manifest`, and the bytes are downloadable for 30 days.
     * 
     *
     * @return list<EmailAttachment>|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }
    /**
     * File attachments to include with the reply. The send is rejected when the estimated generated message size exceeds 20 MB (bodies plus all attachments after base64 encoding). Keep total raw attachment content at or below 15 MB for reliable headroom. Attachment metadata stays on the message's `attachment_manifest`, and the bytes are downloadable for 30 days.
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
}
