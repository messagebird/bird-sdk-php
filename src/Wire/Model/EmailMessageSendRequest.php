<?php

namespace MessageBird\Wire\Model;

class EmailMessageSendRequest
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
     * A sender or recipient address. Accepts a plain email string (`jane@acme.com`), an RFC 5322 mailbox string with an embedded display name (`Jane Doe <jane@acme.com>`), or an object carrying the address and an optional display name. All forms can be mixed freely within one request. Responses always return the object form.
     * 
     *
     * @var mixed|null
     */
    protected $from;
    /**
     * Primary recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@acme.com>`), or an object with an optional display name.
     *
     * @var list<mixed>|null
     */
    protected $to;
    /**
     * CC recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@acme.com>`), or an object with an optional display name.
     *
     * @var list<mixed>|null
     */
    protected $cc;
    /**
     * BCC recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@acme.com>`), or an object with an optional display name.
     *
     * @var list<mixed>|null
     */
    protected $bcc;
    /**
     * Message subject line. Required for inline sends. Omit it when sending a `template` (the template supplies the subject).
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
     * Reply-To addresses, each a plain email string, an RFC 5322 mailbox string, or an object with an optional display name. RFC 5322 allows multiple. Every recipient reply hits all listed addresses, so 1-2 is typical. The 25 cap exists to prevent header sizes that some receiving mail servers reject.
     * 
     *
     * @var list<mixed>|null
     */
    protected $replyTo;
    /**
     * Custom email headers as key-value pairs (for example `References`, `In-Reply-To`, or your own `X-*` headers). Reserved headers are rejected with a `422`. Set the message's addressing and subject through the dedicated fields: `from`, `to`, `cc`, `bcc`, `reply_to`, and `subject`. The API automatically generates `Content-Type`, `Content-Transfer-Encoding`, `DKIM-Signature`, `Received`, and `Return-Path`. You cannot override these generated headers. `List-Unsubscribe` and `List-Unsubscribe-Post` are honored as-is on `transactional` sends. Marketing sends receive a compliant unsubscribe header, so supplying either one is rejected with a `422`. Header values may not contain carriage-return or line-feed characters. Up to 25 headers per send, each value up to 998 characters.
     * 
     *
     * @var array<string, string>|null
     */
    protected $headers;
    /**
     * Structured `{name, value}` labels for **filtering and analytics**. Tags become first-class query dimensions:
     * 
     * - Filter the list endpoint by tag name.
     * - Slice analytics rollups by tag.
     * - Surface in webhook payloads.
     * 
     * Cap: 20 tags per send. Use tags for low-cardinality dimensions (`category`, `experiment_variant`, `template_id`). For arbitrary structured context that you do not need as a filter dimension, use `metadata` instead.
     * 
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Arbitrary JSON object returned on API reads and included in webhook payloads. You can query its paths in analytics, such as `metadata.order_id`, but it is not a dashboard filter. The serialized object is limited to 2 KB. Use metadata for per-send context such as order IDs, customer references, and structured event data. For low-cardinality filterable labels, use `tags` instead.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * Parameter values used to personalize inline content. A parameter is a single word, and a token in the subject or body (for example `{{ animal }}`) is replaced with the value of that name at send time. Shared across all recipients of this send. A token with no matching key renders empty. Cap: 16 KB serialized. When sending a stored `template`, put the values in `template.parameters` instead.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $parameters;
    /**
     * Send a stored template instead of inline content. When set, omit `subject`, `html` and `text`, because the template supplies them. Personalize with `template.parameters`. A template send goes out immediately: `template` and `scheduled_at` are mutually exclusive, and combining them is rejected with a `422`.
     * 
     *
     * @var EmailMessageSendRequestTemplate|null
     */
    protected $template;
    /**
     * Whether to track open events for this message.
     *
     * @var bool|null
     */
    protected $trackOpens = true;
    /**
     * Whether to track click events for this message.
     *
     * @var bool|null
     */
    protected $trackClicks = true;
    /**
     * ID of the IP pool to send from (`ipp_` prefix), or `ipp_shared` to route through the shared pool explicitly. Omit to use your organization's default pool. An unknown pool, or a pool with no dedicated IPs available to send from, is rejected with a `422`.
     * 
     *
     * @var string|null
     */
    protected $ipPoolId;
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
     * Files to attach, up to 20 per message. A message can be at most 20 MB once it has been generated, and we refuse a send that would go over. That figure covers the HTML body, the text body and every attachment and inline image, all measured after base64 encoding, which adds roughly a third. So 15 MB of raw files already accounts for most of the budget, and the body competes for the same space. A batch send is held to the same 20 MB per message, and the whole request body is capped at 20 MB as well.
     * 
     *
     * @var list<EmailAttachment>|null
     */
    protected $attachments;
    /**
     * Schedule the message to send at a future time instead of immediately. Must be at least 30 seconds and at most 30 days ahead. Outside that range the request is rejected with `422`. The message returns with status `accepted` and shows as `scheduled` on reads until it sends. Cancel it before then with the message cancel endpoint. Scheduled sends count against your plan's monthly scheduled-email allowance. Exceeding it is rejected with a `422`. A scheduled message has inline content: `scheduled_at` and `template` are mutually exclusive, and combining them is rejected with a `422`. Batch items take this field too, so one batch can mix scheduled and immediate messages.
     * 
     *
     * @var \DateTime|null
     */
    protected $scheduledAt;
    /**
     * A sender or recipient address. Accepts a plain email string (`jane@acme.com`), an RFC 5322 mailbox string with an embedded display name (`Jane Doe <jane@acme.com>`), or an object carrying the address and an optional display name. All forms can be mixed freely within one request. Responses always return the object form.
     * 
     *
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }
    /**
     * A sender or recipient address. Accepts a plain email string (`jane@acme.com`), an RFC 5322 mailbox string with an embedded display name (`Jane Doe <jane@acme.com>`), or an object carrying the address and an optional display name. All forms can be mixed freely within one request. Responses always return the object form.
     *
     * @param mixed $from
     *
     * @return self
     */
    public function setFrom($from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * Primary recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@acme.com>`), or an object with an optional display name.
     *
     * @return list<mixed>|null
     */
    public function getTo(): ?array
    {
        return $this->to;
    }
    /**
     * Primary recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@acme.com>`), or an object with an optional display name.
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
     * CC recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@acme.com>`), or an object with an optional display name.
     *
     * @return list<mixed>|null
     */
    public function getCc(): ?array
    {
        return $this->cc;
    }
    /**
     * CC recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@acme.com>`), or an object with an optional display name.
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
     * BCC recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@acme.com>`), or an object with an optional display name.
     *
     * @return list<mixed>|null
     */
    public function getBcc(): ?array
    {
        return $this->bcc;
    }
    /**
     * BCC recipients. Each entry is a plain email string, an RFC 5322 mailbox string (`Jane <jane@acme.com>`), or an object with an optional display name.
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
     * Message subject line. Required for inline sends. Omit it when sending a `template` (the template supplies the subject).
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * Message subject line. Required for inline sends. Omit it when sending a `template` (the template supplies the subject).
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
     * Reply-To addresses, each a plain email string, an RFC 5322 mailbox string, or an object with an optional display name. RFC 5322 allows multiple. Every recipient reply hits all listed addresses, so 1-2 is typical. The 25 cap exists to prevent header sizes that some receiving mail servers reject.
     * 
     *
     * @return list<mixed>|null
     */
    public function getReplyTo(): ?array
    {
        return $this->replyTo;
    }
    /**
     * Reply-To addresses, each a plain email string, an RFC 5322 mailbox string, or an object with an optional display name. RFC 5322 allows multiple. Every recipient reply hits all listed addresses, so 1-2 is typical. The 25 cap exists to prevent header sizes that some receiving mail servers reject.
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
     * Custom email headers as key-value pairs (for example `References`, `In-Reply-To`, or your own `X-*` headers). Reserved headers are rejected with a `422`. Set the message's addressing and subject through the dedicated fields: `from`, `to`, `cc`, `bcc`, `reply_to`, and `subject`. The API automatically generates `Content-Type`, `Content-Transfer-Encoding`, `DKIM-Signature`, `Received`, and `Return-Path`. You cannot override these generated headers. `List-Unsubscribe` and `List-Unsubscribe-Post` are honored as-is on `transactional` sends. Marketing sends receive a compliant unsubscribe header, so supplying either one is rejected with a `422`. Header values may not contain carriage-return or line-feed characters. Up to 25 headers per send, each value up to 998 characters.
     * 
     *
     * @return array<string, string>|null
     */
    public function getHeaders(): ?iterable
    {
        return $this->headers;
    }
    /**
     * Custom email headers as key-value pairs (for example `References`, `In-Reply-To`, or your own `X-*` headers). Reserved headers are rejected with a `422`. Set the message's addressing and subject through the dedicated fields: `from`, `to`, `cc`, `bcc`, `reply_to`, and `subject`. The API automatically generates `Content-Type`, `Content-Transfer-Encoding`, `DKIM-Signature`, `Received`, and `Return-Path`. You cannot override these generated headers. `List-Unsubscribe` and `List-Unsubscribe-Post` are honored as-is on `transactional` sends. Marketing sends receive a compliant unsubscribe header, so supplying either one is rejected with a `422`. Header values may not contain carriage-return or line-feed characters. Up to 25 headers per send, each value up to 998 characters.
     *
     * @param array<string, string>|null $headers
     *
     * @return self
     */
    public function setHeaders(?iterable $headers): self
    {
        $this->initialized['headers'] = true;
        $this->headers = $headers;
        return $this;
    }
    /**
     * Structured `{name, value}` labels for **filtering and analytics**. Tags become first-class query dimensions:
     * 
     * - Filter the list endpoint by tag name.
     * - Slice analytics rollups by tag.
     * - Surface in webhook payloads.
     * 
     * Cap: 20 tags per send. Use tags for low-cardinality dimensions (`category`, `experiment_variant`, `template_id`). For arbitrary structured context that you do not need as a filter dimension, use `metadata` instead.
     * 
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
    * Structured `{name, value}` labels for **filtering and analytics**. Tags become first-class query dimensions:
    
    - Filter the list endpoint by tag name.
    - Slice analytics rollups by tag.
    - Surface in webhook payloads.
    
    Cap: 20 tags per send. Use tags for low-cardinality dimensions (`category`, `experiment_variant`, `template_id`). For arbitrary structured context that you do not need as a filter dimension, use `metadata` instead.
    
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
     * Arbitrary JSON object returned on API reads and included in webhook payloads. You can query its paths in analytics, such as `metadata.order_id`, but it is not a dashboard filter. The serialized object is limited to 2 KB. Use metadata for per-send context such as order IDs, customer references, and structured event data. For low-cardinality filterable labels, use `tags` instead.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Arbitrary JSON object returned on API reads and included in webhook payloads. You can query its paths in analytics, such as `metadata.order_id`, but it is not a dashboard filter. The serialized object is limited to 2 KB. Use metadata for per-send context such as order IDs, customer references, and structured event data. For low-cardinality filterable labels, use `tags` instead.
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
     * Parameter values used to personalize inline content. A parameter is a single word, and a token in the subject or body (for example `{{ animal }}`) is replaced with the value of that name at send time. Shared across all recipients of this send. A token with no matching key renders empty. Cap: 16 KB serialized. When sending a stored `template`, put the values in `template.parameters` instead.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getParameters(): ?iterable
    {
        return $this->parameters;
    }
    /**
     * Parameter values used to personalize inline content. A parameter is a single word, and a token in the subject or body (for example `{{ animal }}`) is replaced with the value of that name at send time. Shared across all recipients of this send. A token with no matching key renders empty. Cap: 16 KB serialized. When sending a stored `template`, put the values in `template.parameters` instead.
     *
     * @param array<string, mixed>|null $parameters
     *
     * @return self
     */
    public function setParameters(?iterable $parameters): self
    {
        $this->initialized['parameters'] = true;
        $this->parameters = $parameters;
        return $this;
    }
    /**
     * Send a stored template instead of inline content. When set, omit `subject`, `html` and `text`, because the template supplies them. Personalize with `template.parameters`. A template send goes out immediately: `template` and `scheduled_at` are mutually exclusive, and combining them is rejected with a `422`.
     * 
     *
     * @return EmailMessageSendRequestTemplate|null
     */
    public function getTemplate(): ?EmailMessageSendRequestTemplate
    {
        return $this->template;
    }
    /**
     * Send a stored template instead of inline content. When set, omit `subject`, `html` and `text`, because the template supplies them. Personalize with `template.parameters`. A template send goes out immediately: `template` and `scheduled_at` are mutually exclusive, and combining them is rejected with a `422`.
     *
     * @param EmailMessageSendRequestTemplate|null $template
     *
     * @return self
     */
    public function setTemplate(?EmailMessageSendRequestTemplate $template): self
    {
        $this->initialized['template'] = true;
        $this->template = $template;
        return $this;
    }
    /**
     * Whether to track open events for this message.
     *
     * @return bool|null
     */
    public function getTrackOpens(): ?bool
    {
        return $this->trackOpens;
    }
    /**
     * Whether to track open events for this message.
     *
     * @param bool|null $trackOpens
     *
     * @return self
     */
    public function setTrackOpens(?bool $trackOpens): self
    {
        $this->initialized['trackOpens'] = true;
        $this->trackOpens = $trackOpens;
        return $this;
    }
    /**
     * Whether to track click events for this message.
     *
     * @return bool|null
     */
    public function getTrackClicks(): ?bool
    {
        return $this->trackClicks;
    }
    /**
     * Whether to track click events for this message.
     *
     * @param bool|null $trackClicks
     *
     * @return self
     */
    public function setTrackClicks(?bool $trackClicks): self
    {
        $this->initialized['trackClicks'] = true;
        $this->trackClicks = $trackClicks;
        return $this;
    }
    /**
     * ID of the IP pool to send from (`ipp_` prefix), or `ipp_shared` to route through the shared pool explicitly. Omit to use your organization's default pool. An unknown pool, or a pool with no dedicated IPs available to send from, is rejected with a `422`.
     * 
     *
     * @return string|null
     */
    public function getIpPoolId(): ?string
    {
        return $this->ipPoolId;
    }
    /**
     * ID of the IP pool to send from (`ipp_` prefix), or `ipp_shared` to route through the shared pool explicitly. Omit to use your organization's default pool. An unknown pool, or a pool with no dedicated IPs available to send from, is rejected with a `422`.
     *
     * @param string|null $ipPoolId
     *
     * @return self
     */
    public function setIpPoolId(?string $ipPoolId): self
    {
        $this->initialized['ipPoolId'] = true;
        $this->ipPoolId = $ipPoolId;
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
     * Files to attach, up to 20 per message. A message can be at most 20 MB once it has been generated, and we refuse a send that would go over. That figure covers the HTML body, the text body and every attachment and inline image, all measured after base64 encoding, which adds roughly a third. So 15 MB of raw files already accounts for most of the budget, and the body competes for the same space. A batch send is held to the same 20 MB per message, and the whole request body is capped at 20 MB as well.
     * 
     *
     * @return list<EmailAttachment>|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }
    /**
     * Files to attach, up to 20 per message. A message can be at most 20 MB once it has been generated, and we refuse a send that would go over. That figure covers the HTML body, the text body and every attachment and inline image, all measured after base64 encoding, which adds roughly a third. So 15 MB of raw files already accounts for most of the budget, and the body competes for the same space. A batch send is held to the same 20 MB per message, and the whole request body is capped at 20 MB as well.
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
     * Schedule the message to send at a future time instead of immediately. Must be at least 30 seconds and at most 30 days ahead. Outside that range the request is rejected with `422`. The message returns with status `accepted` and shows as `scheduled` on reads until it sends. Cancel it before then with the message cancel endpoint. Scheduled sends count against your plan's monthly scheduled-email allowance. Exceeding it is rejected with a `422`. A scheduled message has inline content: `scheduled_at` and `template` are mutually exclusive, and combining them is rejected with a `422`. Batch items take this field too, so one batch can mix scheduled and immediate messages.
     * 
     *
     * @return \DateTime|null
     */
    public function getScheduledAt(): ?\DateTime
    {
        return $this->scheduledAt;
    }
    /**
     * Schedule the message to send at a future time instead of immediately. Must be at least 30 seconds and at most 30 days ahead. Outside that range the request is rejected with `422`. The message returns with status `accepted` and shows as `scheduled` on reads until it sends. Cancel it before then with the message cancel endpoint. Scheduled sends count against your plan's monthly scheduled-email allowance. Exceeding it is rejected with a `422`. A scheduled message has inline content: `scheduled_at` and `template` are mutually exclusive, and combining them is rejected with a `422`. Batch items take this field too, so one batch can mix scheduled and immediate messages.
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
}
