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
     * A sender or recipient address. Accepts a plain email string (`jane@example.com`), an RFC 5322 mailbox string with an embedded display name (`Jane Doe <jane@example.com>`), or an object carrying the address and an optional display name. All forms can be mixed freely within one request; responses always return the object form.
     * 
     *
     * @var mixed|null
     */
    protected $from;
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
     * Message subject line. Required for inline sends; omit it when sending a `template` (the template supplies the subject).
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
     * Reply-To addresses, each a plain email string, an RFC 5322 mailbox string, or an object with an optional display name. RFC 5322 allows multiple. Every recipient reply hits all listed addresses, so 1-2 is typical; the 25 cap exists to prevent runaway header sizes that some MTAs reject.
     * 
     *
     * @var list<mixed>|null
     */
    protected $replyTo;
    /**
     * Custom email headers as key-value pairs (for example `References`, `In-Reply-To`, or your own `X-*` headers). Reserved headers are rejected with a `422`: set the message's addressing and subject through the dedicated fields (`from`, `to`, `cc`, `bcc`, `reply_to`, `subject`) rather than here, and headers the platform generates for you — `Content-Type`, `Content-Transfer-Encoding`, `DKIM-Signature`, `Received`, and `Return-Path` — cannot be overridden. `List-Unsubscribe` and `List-Unsubscribe-Post` are honored as-is on `transactional` sends; on `marketing` sends the platform sets a compliant unsubscribe header for you, so supplying them there is rejected with a `422`. Header values may not contain carriage-return or line-feed characters.
     * 
     *
     * @var array<string, string>|null
     */
    protected $headers;
    /**
     * Structured `{name, value}` labels for **filtering and analytics**. Tags become first-class query dimensions: filter the list endpoint by tag name, slice analytics rollups by tag, and surface in webhook payloads. Cap: 20 tags per send. Use tags for low-cardinality dimensions (`category`, `experiment_variant`, `template_id`). For arbitrary structured context that you do not need as a filter dimension, use `metadata` instead.
     * 
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Arbitrary JSON object **stored, returned on API reads, and echoed in webhook payloads**. Path-queryable in analytics (e.g. filter on `metadata.order_id`) but not surfaced as a first-class dashboard filter dimension. Cap: 2 KB serialized. Use metadata for per-send context like internal IDs, foreign keys, and structured payloads you want round-tripped through events. For low-cardinality filterable labels, use `tags` instead.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * Template variables used to personalize inline content. Tokens in the subject and body (e.g. `{{ first_name }}`) are replaced with these values at send time. Shared across all recipients of this send. A token with no matching key renders empty. Cap: 16 KB serialized. When sending a stored `template`, put the values in `template.parameters` instead.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $parameters;
    /**
     * Send a stored template instead of inline content. When set, omit `subject`/`html`/`text` — the template supplies them; personalize with `template.parameters`.
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
     * Content classification. Controls suppression policy: `marketing` blocks on all suppression reasons; `transactional` allows delivery through complaint and unsubscribe suppressions, for receipts, password resets, and similar operational mail.
     * 
     *
     * @var string|null
     */
    protected $category;
    /**
     * @var string|null
     */
    protected $inReplyToMessageId;
    /**
     * File attachments. Bird rejects sends whose estimated generated message size exceeds 20 MB. The estimate is the HTML and text body plus all attachments and inline images measured after base64 encoding. Keep total raw attachment content at or below 15 MB for reliable headroom. In batch sends, this per-message cap still applies and the serialized JSON request body for the whole batch has a hard 20 MB cap. See the EmailAttachment schema for the full field contract.
     * 
     *
     * @var list<EmailAttachment>|null
     */
    protected $attachments;
    /**
     * Schedule the message to send at a future time instead of immediately. Must be at least 30 seconds and at most 30 days ahead — outside that range the request is rejected with `422`. The message returns with status `accepted` and shows as `scheduled` on reads until it sends; cancel it before then with the message cancel endpoint. Scheduled sends count against your plan's monthly scheduled-email allowance; exceeding it is rejected with a `422`.
     * 
     *
     * @var \DateTime|null
     */
    protected $scheduledAt;
    /**
     * Preview feature — contact-targeted sends. Currently unavailable; supplying this field returns `422 UnsupportedEmailFeature`.
     *
     * @var string|null
     */
    protected $contactId;
    /**
     * Preview feature — topic-gated sends. Currently unavailable; supplying this field returns `422 UnsupportedEmailFeature`. When generally available, a non-empty `topic_id` gates delivery on the recipient's opt-in state for that topic — if the recipient is opt_out, the send is silently suppressed and an `email.suppressed` event fires with `reason: topic_opt_out`.
     * 
     *
     * @var string|null
     */
    protected $topicId;
    /**
     * A sender or recipient address. Accepts a plain email string (`jane@example.com`), an RFC 5322 mailbox string with an embedded display name (`Jane Doe <jane@example.com>`), or an object carrying the address and an optional display name. All forms can be mixed freely within one request; responses always return the object form.
     * 
     *
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }
    /**
     * A sender or recipient address. Accepts a plain email string (`jane@example.com`), an RFC 5322 mailbox string with an embedded display name (`Jane Doe <jane@example.com>`), or an object carrying the address and an optional display name. All forms can be mixed freely within one request; responses always return the object form.
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
     * Message subject line. Required for inline sends; omit it when sending a `template` (the template supplies the subject).
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * Message subject line. Required for inline sends; omit it when sending a `template` (the template supplies the subject).
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
     * Reply-To addresses, each a plain email string, an RFC 5322 mailbox string, or an object with an optional display name. RFC 5322 allows multiple. Every recipient reply hits all listed addresses, so 1-2 is typical; the 25 cap exists to prevent runaway header sizes that some MTAs reject.
     * 
     *
     * @return list<mixed>|null
     */
    public function getReplyTo(): ?array
    {
        return $this->replyTo;
    }
    /**
     * Reply-To addresses, each a plain email string, an RFC 5322 mailbox string, or an object with an optional display name. RFC 5322 allows multiple. Every recipient reply hits all listed addresses, so 1-2 is typical; the 25 cap exists to prevent runaway header sizes that some MTAs reject.
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
     * Custom email headers as key-value pairs (for example `References`, `In-Reply-To`, or your own `X-*` headers). Reserved headers are rejected with a `422`: set the message's addressing and subject through the dedicated fields (`from`, `to`, `cc`, `bcc`, `reply_to`, `subject`) rather than here, and headers the platform generates for you — `Content-Type`, `Content-Transfer-Encoding`, `DKIM-Signature`, `Received`, and `Return-Path` — cannot be overridden. `List-Unsubscribe` and `List-Unsubscribe-Post` are honored as-is on `transactional` sends; on `marketing` sends the platform sets a compliant unsubscribe header for you, so supplying them there is rejected with a `422`. Header values may not contain carriage-return or line-feed characters.
     * 
     *
     * @return array<string, string>|null
     */
    public function getHeaders(): ?iterable
    {
        return $this->headers;
    }
    /**
     * Custom email headers as key-value pairs (for example `References`, `In-Reply-To`, or your own `X-*` headers). Reserved headers are rejected with a `422`: set the message's addressing and subject through the dedicated fields (`from`, `to`, `cc`, `bcc`, `reply_to`, `subject`) rather than here, and headers the platform generates for you — `Content-Type`, `Content-Transfer-Encoding`, `DKIM-Signature`, `Received`, and `Return-Path` — cannot be overridden. `List-Unsubscribe` and `List-Unsubscribe-Post` are honored as-is on `transactional` sends; on `marketing` sends the platform sets a compliant unsubscribe header for you, so supplying them there is rejected with a `422`. Header values may not contain carriage-return or line-feed characters.
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
     * Structured `{name, value}` labels for **filtering and analytics**. Tags become first-class query dimensions: filter the list endpoint by tag name, slice analytics rollups by tag, and surface in webhook payloads. Cap: 20 tags per send. Use tags for low-cardinality dimensions (`category`, `experiment_variant`, `template_id`). For arbitrary structured context that you do not need as a filter dimension, use `metadata` instead.
     * 
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Structured `{name, value}` labels for **filtering and analytics**. Tags become first-class query dimensions: filter the list endpoint by tag name, slice analytics rollups by tag, and surface in webhook payloads. Cap: 20 tags per send. Use tags for low-cardinality dimensions (`category`, `experiment_variant`, `template_id`). For arbitrary structured context that you do not need as a filter dimension, use `metadata` instead.
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
     * Arbitrary JSON object **stored, returned on API reads, and echoed in webhook payloads**. Path-queryable in analytics (e.g. filter on `metadata.order_id`) but not surfaced as a first-class dashboard filter dimension. Cap: 2 KB serialized. Use metadata for per-send context like internal IDs, foreign keys, and structured payloads you want round-tripped through events. For low-cardinality filterable labels, use `tags` instead.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Arbitrary JSON object **stored, returned on API reads, and echoed in webhook payloads**. Path-queryable in analytics (e.g. filter on `metadata.order_id`) but not surfaced as a first-class dashboard filter dimension. Cap: 2 KB serialized. Use metadata for per-send context like internal IDs, foreign keys, and structured payloads you want round-tripped through events. For low-cardinality filterable labels, use `tags` instead.
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
     * Template variables used to personalize inline content. Tokens in the subject and body (e.g. `{{ first_name }}`) are replaced with these values at send time. Shared across all recipients of this send. A token with no matching key renders empty. Cap: 16 KB serialized. When sending a stored `template`, put the values in `template.parameters` instead.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getParameters(): ?iterable
    {
        return $this->parameters;
    }
    /**
     * Template variables used to personalize inline content. Tokens in the subject and body (e.g. `{{ first_name }}`) are replaced with these values at send time. Shared across all recipients of this send. A token with no matching key renders empty. Cap: 16 KB serialized. When sending a stored `template`, put the values in `template.parameters` instead.
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
     * Send a stored template instead of inline content. When set, omit `subject`/`html`/`text` — the template supplies them; personalize with `template.parameters`.
     * 
     *
     * @return EmailMessageSendRequestTemplate|null
     */
    public function getTemplate(): ?EmailMessageSendRequestTemplate
    {
        return $this->template;
    }
    /**
     * Send a stored template instead of inline content. When set, omit `subject`/`html`/`text` — the template supplies them; personalize with `template.parameters`.
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
    /**
     * @return string|null
     */
    public function getInReplyToMessageId(): ?string
    {
        return $this->inReplyToMessageId;
    }
    /**
     * @param string|null $inReplyToMessageId
     *
     * @return self
     */
    public function setInReplyToMessageId(?string $inReplyToMessageId): self
    {
        $this->initialized['inReplyToMessageId'] = true;
        $this->inReplyToMessageId = $inReplyToMessageId;
        return $this;
    }
    /**
     * File attachments. Bird rejects sends whose estimated generated message size exceeds 20 MB. The estimate is the HTML and text body plus all attachments and inline images measured after base64 encoding. Keep total raw attachment content at or below 15 MB for reliable headroom. In batch sends, this per-message cap still applies and the serialized JSON request body for the whole batch has a hard 20 MB cap. See the EmailAttachment schema for the full field contract.
     * 
     *
     * @return list<EmailAttachment>|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }
    /**
     * File attachments. Bird rejects sends whose estimated generated message size exceeds 20 MB. The estimate is the HTML and text body plus all attachments and inline images measured after base64 encoding. Keep total raw attachment content at or below 15 MB for reliable headroom. In batch sends, this per-message cap still applies and the serialized JSON request body for the whole batch has a hard 20 MB cap. See the EmailAttachment schema for the full field contract.
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
     * Schedule the message to send at a future time instead of immediately. Must be at least 30 seconds and at most 30 days ahead — outside that range the request is rejected with `422`. The message returns with status `accepted` and shows as `scheduled` on reads until it sends; cancel it before then with the message cancel endpoint. Scheduled sends count against your plan's monthly scheduled-email allowance; exceeding it is rejected with a `422`.
     * 
     *
     * @return \DateTime|null
     */
    public function getScheduledAt(): ?\DateTime
    {
        return $this->scheduledAt;
    }
    /**
     * Schedule the message to send at a future time instead of immediately. Must be at least 30 seconds and at most 30 days ahead — outside that range the request is rejected with `422`. The message returns with status `accepted` and shows as `scheduled` on reads until it sends; cancel it before then with the message cancel endpoint. Scheduled sends count against your plan's monthly scheduled-email allowance; exceeding it is rejected with a `422`.
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
     * Preview feature — contact-targeted sends. Currently unavailable; supplying this field returns `422 UnsupportedEmailFeature`.
     *
     * @return string|null
     */
    public function getContactId(): ?string
    {
        return $this->contactId;
    }
    /**
     * Preview feature — contact-targeted sends. Currently unavailable; supplying this field returns `422 UnsupportedEmailFeature`.
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
     * Preview feature — topic-gated sends. Currently unavailable; supplying this field returns `422 UnsupportedEmailFeature`. When generally available, a non-empty `topic_id` gates delivery on the recipient's opt-in state for that topic — if the recipient is opt_out, the send is silently suppressed and an `email.suppressed` event fires with `reason: topic_opt_out`.
     * 
     *
     * @return string|null
     */
    public function getTopicId(): ?string
    {
        return $this->topicId;
    }
    /**
     * Preview feature — topic-gated sends. Currently unavailable; supplying this field returns `422 UnsupportedEmailFeature`. When generally available, a non-empty `topic_id` gates delivery on the recipient's opt-in state for that topic — if the recipient is opt_out, the send is silently suppressed and an `email.suppressed` event fires with `reason: topic_opt_out`.
     *
     * @param string|null $topicId
     *
     * @return self
     */
    public function setTopicId(?string $topicId): self
    {
        $this->initialized['topicId'] = true;
        $this->topicId = $topicId;
        return $this;
    }
}
