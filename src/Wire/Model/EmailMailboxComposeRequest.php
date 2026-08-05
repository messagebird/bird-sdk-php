<?php

namespace MessageBird\Wire\Model;

class EmailMailboxComposeRequest
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
     * Primary recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@example.com>`), or an object with an optional display name.
     *
     * @var list<mixed>|null
     */
    protected $to;
    /**
     * CC recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@example.com>`), or an object with an optional display name.
     *
     * @var list<mixed>|null
     */
    protected $cc;
    /**
     * BCC recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@example.com>`), or an object with an optional display name.
     *
     * @var list<mixed>|null
     */
    protected $bcc;
    /**
     * Message subject line.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * HTML body. At least one of html or text must be provided.
     *
     * @var string|null
     */
    protected $html;
    /**
     * Plain-text body. At least one of html or text must be provided.
     *
     * @var string|null
     */
    protected $text;
    /**
     * Reply-To addresses. When omitted, the mailbox's `default_reply_to` applies (replies then come back to the mailbox itself).
     * 
     *
     * @var list<mixed>|null
     */
    protected $replyTo;
    /**
     * File attachments. The send is rejected when the estimated generated message size exceeds 20 MB (bodies plus all attachments after base64 encoding). Attachment metadata endures on the message's `attachment_manifest`; the bytes are downloadable for 30 days.
     * 
     *
     * @var list<EmailAttachment>|null
     */
    protected $attachments;
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
     * Content classification. Controls suppression policy: `marketing` blocks on all suppression reasons; `transactional` allows delivery through complaint and unsubscribe suppressions, for receipts, password resets, and similar operational mail.
     * 
     *
     * @var string|null
     */
    protected $category;
    /**
     * Primary recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@example.com>`), or an object with an optional display name.
     *
     * @return list<mixed>|null
     */
    public function getTo(): ?array
    {
        return $this->to;
    }
    /**
     * Primary recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@example.com>`), or an object with an optional display name.
     *
     * @param list<mixed>|null $to
     *
     * @return self
     */
    public function setTo(?array $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * CC recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@example.com>`), or an object with an optional display name.
     *
     * @return list<mixed>|null
     */
    public function getCc(): ?array
    {
        return $this->cc;
    }
    /**
     * CC recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@example.com>`), or an object with an optional display name.
     *
     * @param list<mixed>|null $cc
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
     * BCC recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@example.com>`), or an object with an optional display name.
     *
     * @return list<mixed>|null
     */
    public function getBcc(): ?array
    {
        return $this->bcc;
    }
    /**
     * BCC recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@example.com>`), or an object with an optional display name.
     *
     * @param list<mixed>|null $bcc
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
     * Message subject line.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * Message subject line.
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
     * HTML body. At least one of html or text must be provided.
     *
     * @return string|null
     */
    public function getHtml(): ?string
    {
        return $this->html;
    }
    /**
     * HTML body. At least one of html or text must be provided.
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
     * Plain-text body. At least one of html or text must be provided.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * Plain-text body. At least one of html or text must be provided.
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
     * Reply-To addresses. When omitted, the mailbox's `default_reply_to` applies (replies then come back to the mailbox itself).
     * 
     *
     * @return list<mixed>|null
     */
    public function getReplyTo(): ?array
    {
        return $this->replyTo;
    }
    /**
     * Reply-To addresses. When omitted, the mailbox's `default_reply_to` applies (replies then come back to the mailbox itself).
     *
     * @param list<mixed>|null $replyTo
     *
     * @return self
     */
    public function setReplyTo(?array $replyTo): self
    {
        $this->initialized['replyTo'] = true;
        $this->replyTo = $replyTo;
        return $this;
    }
    /**
     * File attachments. The send is rejected when the estimated generated message size exceeds 20 MB (bodies plus all attachments after base64 encoding). Attachment metadata endures on the message's `attachment_manifest`; the bytes are downloadable for 30 days.
     * 
     *
     * @return list<EmailAttachment>|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }
    /**
     * File attachments. The send is rejected when the estimated generated message size exceeds 20 MB (bodies plus all attachments after base64 encoding). Attachment metadata endures on the message's `attachment_manifest`; the bytes are downloadable for 30 days.
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
     * Content classification. Controls suppression policy: `marketing` blocks on all suppression reasons; `transactional` allows delivery through complaint and unsubscribe suppressions, for receipts, password resets, and similar operational mail.
     * 
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Content classification. Controls suppression policy: `marketing` blocks on all suppression reasons; `transactional` allows delivery through complaint and unsubscribe suppressions, for receipts, password resets, and similar operational mail.
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
}
