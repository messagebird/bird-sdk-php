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
     * Custom email headers, such as `References`, `In-Reply-To`, and `X-*` headers. Reserved headers and values containing carriage returns or line feeds return `422`. Set addressing and subject through their dedicated fields. Transactional sends accept `List-Unsubscribe` and `List-Unsubscribe-Post`. Marketing sends use Bird-managed unsubscribe by default.
     * 
     *
     * @var array<string, string>|null
     */
    protected $headers;
    /**
     * Structured `{name, value}` labels, up to 20 per send. You can filter the list endpoint by tag name, slice analytics by tag, and read them in webhook payloads. Use them for low-cardinality dimensions such as `category`, `experiment_variant` or `template_id`, and `metadata` for context you do not filter by.
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * JSON object returned on reads and in webhook payloads, up to 2 KB serialized. Analytics can query its paths, such as `metadata.order_id`, but the dashboard cannot filter by it. Use it for per-send context such as order IDs and customer references, and `tags` for low-cardinality labels you filter by.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * An identifier you want to find this message by, such as an order or ticket number, matched exactly by the message list's `reference` filter. Set it only when you need to search on it, and put any other data in `metadata`. Stored on the message, returned on reads and echoed in webhook payloads. Several messages can share one.
     * 
     *
     * @var string|null
     */
    protected $reference;
    /**
     * Values for the Liquid tokens in inline content, shared by every recipient: `{{ animal }}` takes the `animal` value, and a missing value renders empty. Include the object, even as `{}`, to render Liquid, or omit it to leave tokens unchanged. Names are single words other than `bird`, and the object is capped at 16 KB serialized. A stored template takes `template.parameters` instead. [Inline personalization](https://bird.com/docs/guides/email/sending-email#content) covers validation and URL encoding.
     *
     * @var array<string, mixed>|null
     */
    protected $parameters;
    /**
     * Send a stored template instead of inline content. When set, omit `subject`, `html` and `text`, because the template supplies them. Personalize with `template.parameters`. Add `scheduled_at` to send it later.
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
     * ID of the IP pool to send from (`ipp_` prefix), or `ipp_shared` to route through the shared pool explicitly. Omit to use the sending domain's default pool in this workspace, or the organization's default when the domain has none. An unknown pool, or a pool with no dedicated IPs available to send from, is rejected with a `422`.
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
     * Files to attach, up to 20 per message. A generated message is capped at 20 MB, and a send over it is refused. The cap counts the HTML and text bodies and every attachment and inline image after base64 encoding, which adds about a third, so 15 MB of raw files uses most of it. Each batch item has the same cap, and the whole request body is capped at 20 MB too.
     *
     * @var list<EmailAttachment>|null
     */
    protected $attachments;
    /**
     * Send at this future time instead of immediately, at least 30 seconds and at most 30 days ahead; outside that range returns `422`. The message returns `accepted` and reads as `scheduled` until it sends, and the message cancel endpoint cancels it before then. Scheduled sends count against your plan's monthly scheduled-email allowance, and a send over it returns `422`. A stored template's published version, language and parameter values are pinned at acceptance, so a later publication does not change what sends; deleting the template before the message is due rejects it with `generation_failure`. Sender eligibility and send-volume allowance are checked again when it is due. Batch items take this field too, so one batch can mix scheduled and immediate messages.
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
     * Custom email headers, such as `References`, `In-Reply-To`, and `X-*` headers. Reserved headers and values containing carriage returns or line feeds return `422`. Set addressing and subject through their dedicated fields. Transactional sends accept `List-Unsubscribe` and `List-Unsubscribe-Post`. Marketing sends use Bird-managed unsubscribe by default.
     * 
     *
     * @return array<string, string>|null
     */
    public function getHeaders(): ?iterable
    {
        return $this->headers;
    }
    /**
     * Custom email headers, such as `References`, `In-Reply-To`, and `X-*` headers. Reserved headers and values containing carriage returns or line feeds return `422`. Set addressing and subject through their dedicated fields. Transactional sends accept `List-Unsubscribe` and `List-Unsubscribe-Post`. Marketing sends use Bird-managed unsubscribe by default.
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
     * Structured `{name, value}` labels, up to 20 per send. You can filter the list endpoint by tag name, slice analytics by tag, and read them in webhook payloads. Use them for low-cardinality dimensions such as `category`, `experiment_variant` or `template_id`, and `metadata` for context you do not filter by.
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Structured `{name, value}` labels, up to 20 per send. You can filter the list endpoint by tag name, slice analytics by tag, and read them in webhook payloads. Use them for low-cardinality dimensions such as `category`, `experiment_variant` or `template_id`, and `metadata` for context you do not filter by.
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
     * JSON object returned on reads and in webhook payloads, up to 2 KB serialized. Analytics can query its paths, such as `metadata.order_id`, but the dashboard cannot filter by it. Use it for per-send context such as order IDs and customer references, and `tags` for low-cardinality labels you filter by.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * JSON object returned on reads and in webhook payloads, up to 2 KB serialized. Analytics can query its paths, such as `metadata.order_id`, but the dashboard cannot filter by it. Use it for per-send context such as order IDs and customer references, and `tags` for low-cardinality labels you filter by.
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
     * An identifier you want to find this message by, such as an order or ticket number, matched exactly by the message list's `reference` filter. Set it only when you need to search on it, and put any other data in `metadata`. Stored on the message, returned on reads and echoed in webhook payloads. Several messages can share one.
     * 
     *
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }
    /**
     * An identifier you want to find this message by, such as an order or ticket number, matched exactly by the message list's `reference` filter. Set it only when you need to search on it, and put any other data in `metadata`. Stored on the message, returned on reads and echoed in webhook payloads. Several messages can share one.
     *
     * @param string|null $reference
     *
     * @return self
     */
    public function setReference(?string $reference): self
    {
        $this->initialized['reference'] = true;
        $this->reference = $reference;
        return $this;
    }
    /**
     * Values for the Liquid tokens in inline content, shared by every recipient: `{{ animal }}` takes the `animal` value, and a missing value renders empty. Include the object, even as `{}`, to render Liquid, or omit it to leave tokens unchanged. Names are single words other than `bird`, and the object is capped at 16 KB serialized. A stored template takes `template.parameters` instead. [Inline personalization](https://bird.com/docs/guides/email/sending-email#content) covers validation and URL encoding.
     *
     * @return array<string, mixed>|null
     */
    public function getParameters(): ?iterable
    {
        return $this->parameters;
    }
    /**
     * Values for the Liquid tokens in inline content, shared by every recipient: `{{ animal }}` takes the `animal` value, and a missing value renders empty. Include the object, even as `{}`, to render Liquid, or omit it to leave tokens unchanged. Names are single words other than `bird`, and the object is capped at 16 KB serialized. A stored template takes `template.parameters` instead. [Inline personalization](https://bird.com/docs/guides/email/sending-email#content) covers validation and URL encoding.
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
     * Send a stored template instead of inline content. When set, omit `subject`, `html` and `text`, because the template supplies them. Personalize with `template.parameters`. Add `scheduled_at` to send it later.
     * 
     *
     * @return EmailMessageSendRequestTemplate|null
     */
    public function getTemplate(): ?EmailMessageSendRequestTemplate
    {
        return $this->template;
    }
    /**
     * Send a stored template instead of inline content. When set, omit `subject`, `html` and `text`, because the template supplies them. Personalize with `template.parameters`. Add `scheduled_at` to send it later.
     *
     * @param EmailMessageSendRequestTemplate|EmailTemplateSend|array|null $template
     *
     * @return self
     */
    public function setTemplate($template): self
    {
        $this->initialized['template'] = true;
        $this->template = \MessageBird\Core\ModelWrapper::normalize($template, EmailMessageSendRequestTemplate::class);
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
     * ID of the IP pool to send from (`ipp_` prefix), or `ipp_shared` to route through the shared pool explicitly. Omit to use the sending domain's default pool in this workspace, or the organization's default when the domain has none. An unknown pool, or a pool with no dedicated IPs available to send from, is rejected with a `422`.
     * 
     *
     * @return string|null
     */
    public function getIpPoolId(): ?string
    {
        return $this->ipPoolId;
    }
    /**
     * ID of the IP pool to send from (`ipp_` prefix), or `ipp_shared` to route through the shared pool explicitly. Omit to use the sending domain's default pool in this workspace, or the organization's default when the domain has none. An unknown pool, or a pool with no dedicated IPs available to send from, is rejected with a `422`.
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
     * Files to attach, up to 20 per message. A generated message is capped at 20 MB, and a send over it is refused. The cap counts the HTML and text bodies and every attachment and inline image after base64 encoding, which adds about a third, so 15 MB of raw files uses most of it. Each batch item has the same cap, and the whole request body is capped at 20 MB too.
     *
     * @return list<EmailAttachment>|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }
    /**
     * Files to attach, up to 20 per message. A generated message is capped at 20 MB, and a send over it is refused. The cap counts the HTML and text bodies and every attachment and inline image after base64 encoding, which adds about a third, so 15 MB of raw files uses most of it. Each batch item has the same cap, and the whole request body is capped at 20 MB too.
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
     * Send at this future time instead of immediately, at least 30 seconds and at most 30 days ahead; outside that range returns `422`. The message returns `accepted` and reads as `scheduled` until it sends, and the message cancel endpoint cancels it before then. Scheduled sends count against your plan's monthly scheduled-email allowance, and a send over it returns `422`. A stored template's published version, language and parameter values are pinned at acceptance, so a later publication does not change what sends; deleting the template before the message is due rejects it with `generation_failure`. Sender eligibility and send-volume allowance are checked again when it is due. Batch items take this field too, so one batch can mix scheduled and immediate messages.
     *
     * @return \DateTime|null
     */
    public function getScheduledAt(): ?\DateTime
    {
        return $this->scheduledAt;
    }
    /**
     * Send at this future time instead of immediately, at least 30 seconds and at most 30 days ahead; outside that range returns `422`. The message returns `accepted` and reads as `scheduled` until it sends, and the message cancel endpoint cancels it before then. Scheduled sends count against your plan's monthly scheduled-email allowance, and a send over it returns `422`. A stored template's published version, language and parameter values are pinned at acceptance, so a later publication does not change what sends; deleting the template before the message is due rejects it with `generation_failure`. Sender eligibility and send-volume allowance are checked again when it is due. Batch items take this field too, so one batch can mix scheduled and immediate messages.
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
