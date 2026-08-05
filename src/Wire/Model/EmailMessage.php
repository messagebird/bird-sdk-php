<?php

namespace MessageBird\Wire\Model;

class EmailMessage
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
     * An email address with an optional display name.
     *
     * @var EmailAddress|null
     */
    protected $from;
    /**
     * Primary recipients. Length is the recipient count; use the broadcasts endpoint for audience-targeted sends. Each entry's `name` is present when a display name was provided on the send.
     *
     * @var list<EmailAddress>|null
     */
    protected $to;
    /**
     * CC recipients.
     *
     * @var list<EmailAddress>|null
     */
    protected $cc;
    /**
     * BCC recipients.
     *
     * @var list<EmailAddress>|null
     */
    protected $bcc;
    /**
     * The subject line as delivered. For a send that used a template, the stored subject is the template's, so this reports it with the send's `parameters` substituted in, which is what the recipient saw.
     * 
     *
     * @var string|null
     */
    protected $subject;
    /**
     * Content classification. Controls suppression policy: `marketing` blocks on all suppression reasons; `transactional` allows delivery through complaint and unsubscribe suppressions, for receipts, password resets, and similar operational mail.
     * 
     *
     * @var string|null
     */
    protected $category;
    /**
     * Reply-To addresses, if set on the send. Empty/null when no Reply-To was provided.
     *
     * @var list<EmailAddress>|null
     */
    protected $replyTo;
    /**
     * Aggregate delivery status derived from recipient states. `scheduled` means the message is queued to send at a future time and has not been dispatched yet. `accepted` means Bird has the send and is preparing to deliver. `processed` means Bird has processed the message and queued it for delivery to the recipient's mail server. `canceled` means a scheduled message was canceled before it was sent.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Number of recipients currently in the `accepted` state — Bird has the send and is preparing to deliver.
     *
     * @var int|null
     */
    protected $acceptedCount = 0;
    /**
     * Number of recipients for whom Bird has processed the message and queued it for delivery.
     *
     * @var int|null
     */
    protected $processedCount = 0;
    /**
     * Number of recipients whose messages were accepted by the remote MTA.
     *
     * @var int|null
     */
    protected $deliveredCount = 0;
    /**
     * Number of recipients that resulted in a permanent delivery failure.
     *
     * @var int|null
     */
    protected $bouncedCount = 0;
    /**
     * Number of recipients that reported spam.
     *
     * @var int|null
     */
    protected $complainedCount = 0;
    /**
     * Number of recipients in transient delivery deferral; the provider is retrying.
     *
     * @var int|null
     */
    protected $deferredCount = 0;
    /**
     * Number of recipients rejected before delivery. See the per-recipient `rejection_reason` field on `GET /v1/email/messages/{message_id}/recipients` for the specific cause (suppression match, transmission failure, generation failure, or policy refusal).
     * 
     *
     * @var int|null
     */
    protected $rejectedCount = 0;
    /**
     * Time between Bird accepting the send and the message being processed for delivery, in milliseconds, for the fastest recipient. Null until the first recipient reaches `processed`.
     * 
     *
     * @var int|null
     */
    protected $processingLatencyMs;
    /**
     * Time between the message being processed and the receiving mail server accepting it, in milliseconds, for the fastest delivered recipient. Null until the first recipient is delivered.
     * 
     *
     * @var int|null
     */
    protected $deliveryLatencyMs;
    /**
     * End-to-end accept → delivered time for the fastest delivered recipient, in milliseconds. Null until the first recipient is delivered.
     * 
     *
     * @var int|null
     */
    protected $totalLatencyMs;
    /**
     * Total open events across all recipients.
     *
     * @var int|null
     */
    protected $openCount = 0;
    /**
     * Total click events across all recipients.
     *
     * @var int|null
     */
    protected $clickCount = 0;
    /**
     * The template language this send asked for, in canonical form (`pt-BR` for a request of `pt-br`). Null when the send named no language (it took the template's default) or used no template at all. Compare it with `resolved_language`: when they differ, the language you asked for was not available and the template's `on_missing_language` policy chose the one shown there instead.
     * 
     *
     * @var string|null
     */
    protected $requestedLanguage;
    /**
     * The template language this send was actually delivered in, in canonical form. Null when the send used no template. A non-null value with a null `requested_language` means the send named no language and took the template's default.
     * 
     *
     * @var string|null
     */
    protected $resolvedLanguage;
    /**
     * The template this send rendered from, or null for a send that supplied its content inline.
     * 
     *
     * @var string|null
     */
    protected $templateId;
    /**
     * The exact template version this send rendered from, or null for an inline send. A template's live version changes every time you submit it, so this is what identifies the wording that was actually delivered, together with `resolved_language`.
     * 
     *
     * @var string|null
     */
    protected $templateVersionId;
    /**
     * Structured `{name, value}` filter labels applied to this send. See EmailMessageSendRequest for the tags vs metadata distinction.
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Arbitrary JSON metadata stored on the message object and echoed in webhook payloads. See EmailMessageSendRequest for the tags vs metadata distinction.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * The substitution values this send supplied, whether inline or from a template, or null if none were supplied. They are the values applied to `subject` and to the bodies the content endpoint returns, kept so you can see what produced the delivered copy and not only the result.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $parameters;
    /**
     * Attachment metadata for the send. Empty when no attachments were included. Raw content is not echoed; when content storage is enabled, download an attachment by its `id` via the message's attachment endpoint.
     *
     * @var list<EmailAttachmentRef>|null
     */
    protected $attachments;
    /**
     * Whether open tracking is enabled for this send.
     *
     * @var bool|null
     */
    protected $trackOpens;
    /**
     * Whether click tracking is enabled for this send.
     *
     * @var bool|null
     */
    protected $trackClicks;
    /**
     * When the send request was accepted.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Thread this message belongs to. Null until threading is enabled.
     *
     * @var string|null
     */
    protected $threadId;
    /**
     * The message this one is a reply to, if any.
     *
     * @var string|null
     */
    protected $inReplyToMessageId;
    /**
     * When all recipients reached a terminal delivered state, or null if not yet fully delivered.
     *
     * @var \DateTime|null
     */
    protected $deliveredAt;
    /**
     * When this message is scheduled to send, for a send created with a future send time. Null for an immediate send. Stays set after the scheduled send fires.
     *
     * @var \DateTime|null
     */
    protected $scheduledAt;
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
     * An email address with an optional display name.
     *
     * @return EmailAddress|null
     */
    public function getFrom(): ?EmailAddress
    {
        return $this->from;
    }
    /**
     * An email address with an optional display name.
     *
     * @param EmailAddress|null $from
     *
     * @return self
     */
    public function setFrom(?EmailAddress $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * Primary recipients. Length is the recipient count; use the broadcasts endpoint for audience-targeted sends. Each entry's `name` is present when a display name was provided on the send.
     *
     * @return list<EmailAddress>|null
     */
    public function getTo(): ?array
    {
        return $this->to;
    }
    /**
     * Primary recipients. Length is the recipient count; use the broadcasts endpoint for audience-targeted sends. Each entry's `name` is present when a display name was provided on the send.
     *
     * @param list<EmailAddress>|null $to
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
     * CC recipients.
     *
     * @return list<EmailAddress>|null
     */
    public function getCc(): ?array
    {
        return $this->cc;
    }
    /**
     * CC recipients.
     *
     * @param list<EmailAddress>|null $cc
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
     * BCC recipients.
     *
     * @return list<EmailAddress>|null
     */
    public function getBcc(): ?array
    {
        return $this->bcc;
    }
    /**
     * BCC recipients.
     *
     * @param list<EmailAddress>|null $bcc
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
     * The subject line as delivered. For a send that used a template, the stored subject is the template's, so this reports it with the send's `parameters` substituted in, which is what the recipient saw.
     * 
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * The subject line as delivered. For a send that used a template, the stored subject is the template's, so this reports it with the send's `parameters` substituted in, which is what the recipient saw.
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
     * Reply-To addresses, if set on the send. Empty/null when no Reply-To was provided.
     *
     * @return list<EmailAddress>|null
     */
    public function getReplyTo(): ?array
    {
        return $this->replyTo;
    }
    /**
     * Reply-To addresses, if set on the send. Empty/null when no Reply-To was provided.
     *
     * @param list<EmailAddress>|null $replyTo
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
     * Aggregate delivery status derived from recipient states. `scheduled` means the message is queued to send at a future time and has not been dispatched yet. `accepted` means Bird has the send and is preparing to deliver. `processed` means Bird has processed the message and queued it for delivery to the recipient's mail server. `canceled` means a scheduled message was canceled before it was sent.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Aggregate delivery status derived from recipient states. `scheduled` means the message is queued to send at a future time and has not been dispatched yet. `accepted` means Bird has the send and is preparing to deliver. `processed` means Bird has processed the message and queued it for delivery to the recipient's mail server. `canceled` means a scheduled message was canceled before it was sent.
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
     * Number of recipients currently in the `accepted` state — Bird has the send and is preparing to deliver.
     *
     * @return int|null
     */
    public function getAcceptedCount(): ?int
    {
        return $this->acceptedCount;
    }
    /**
     * Number of recipients currently in the `accepted` state — Bird has the send and is preparing to deliver.
     *
     * @param int|null $acceptedCount
     *
     * @return self
     */
    public function setAcceptedCount(?int $acceptedCount): self
    {
        $this->initialized['acceptedCount'] = true;
        $this->acceptedCount = $acceptedCount;
        return $this;
    }
    /**
     * Number of recipients for whom Bird has processed the message and queued it for delivery.
     *
     * @return int|null
     */
    public function getProcessedCount(): ?int
    {
        return $this->processedCount;
    }
    /**
     * Number of recipients for whom Bird has processed the message and queued it for delivery.
     *
     * @param int|null $processedCount
     *
     * @return self
     */
    public function setProcessedCount(?int $processedCount): self
    {
        $this->initialized['processedCount'] = true;
        $this->processedCount = $processedCount;
        return $this;
    }
    /**
     * Number of recipients whose messages were accepted by the remote MTA.
     *
     * @return int|null
     */
    public function getDeliveredCount(): ?int
    {
        return $this->deliveredCount;
    }
    /**
     * Number of recipients whose messages were accepted by the remote MTA.
     *
     * @param int|null $deliveredCount
     *
     * @return self
     */
    public function setDeliveredCount(?int $deliveredCount): self
    {
        $this->initialized['deliveredCount'] = true;
        $this->deliveredCount = $deliveredCount;
        return $this;
    }
    /**
     * Number of recipients that resulted in a permanent delivery failure.
     *
     * @return int|null
     */
    public function getBouncedCount(): ?int
    {
        return $this->bouncedCount;
    }
    /**
     * Number of recipients that resulted in a permanent delivery failure.
     *
     * @param int|null $bouncedCount
     *
     * @return self
     */
    public function setBouncedCount(?int $bouncedCount): self
    {
        $this->initialized['bouncedCount'] = true;
        $this->bouncedCount = $bouncedCount;
        return $this;
    }
    /**
     * Number of recipients that reported spam.
     *
     * @return int|null
     */
    public function getComplainedCount(): ?int
    {
        return $this->complainedCount;
    }
    /**
     * Number of recipients that reported spam.
     *
     * @param int|null $complainedCount
     *
     * @return self
     */
    public function setComplainedCount(?int $complainedCount): self
    {
        $this->initialized['complainedCount'] = true;
        $this->complainedCount = $complainedCount;
        return $this;
    }
    /**
     * Number of recipients in transient delivery deferral; the provider is retrying.
     *
     * @return int|null
     */
    public function getDeferredCount(): ?int
    {
        return $this->deferredCount;
    }
    /**
     * Number of recipients in transient delivery deferral; the provider is retrying.
     *
     * @param int|null $deferredCount
     *
     * @return self
     */
    public function setDeferredCount(?int $deferredCount): self
    {
        $this->initialized['deferredCount'] = true;
        $this->deferredCount = $deferredCount;
        return $this;
    }
    /**
     * Number of recipients rejected before delivery. See the per-recipient `rejection_reason` field on `GET /v1/email/messages/{message_id}/recipients` for the specific cause (suppression match, transmission failure, generation failure, or policy refusal).
     * 
     *
     * @return int|null
     */
    public function getRejectedCount(): ?int
    {
        return $this->rejectedCount;
    }
    /**
     * Number of recipients rejected before delivery. See the per-recipient `rejection_reason` field on `GET /v1/email/messages/{message_id}/recipients` for the specific cause (suppression match, transmission failure, generation failure, or policy refusal).
     *
     * @param int|null $rejectedCount
     *
     * @return self
     */
    public function setRejectedCount(?int $rejectedCount): self
    {
        $this->initialized['rejectedCount'] = true;
        $this->rejectedCount = $rejectedCount;
        return $this;
    }
    /**
     * Time between Bird accepting the send and the message being processed for delivery, in milliseconds, for the fastest recipient. Null until the first recipient reaches `processed`.
     * 
     *
     * @return int|null
     */
    public function getProcessingLatencyMs(): ?int
    {
        return $this->processingLatencyMs;
    }
    /**
     * Time between Bird accepting the send and the message being processed for delivery, in milliseconds, for the fastest recipient. Null until the first recipient reaches `processed`.
     *
     * @param int|null $processingLatencyMs
     *
     * @return self
     */
    public function setProcessingLatencyMs(?int $processingLatencyMs): self
    {
        $this->initialized['processingLatencyMs'] = true;
        $this->processingLatencyMs = $processingLatencyMs;
        return $this;
    }
    /**
     * Time between the message being processed and the receiving mail server accepting it, in milliseconds, for the fastest delivered recipient. Null until the first recipient is delivered.
     * 
     *
     * @return int|null
     */
    public function getDeliveryLatencyMs(): ?int
    {
        return $this->deliveryLatencyMs;
    }
    /**
     * Time between the message being processed and the receiving mail server accepting it, in milliseconds, for the fastest delivered recipient. Null until the first recipient is delivered.
     *
     * @param int|null $deliveryLatencyMs
     *
     * @return self
     */
    public function setDeliveryLatencyMs(?int $deliveryLatencyMs): self
    {
        $this->initialized['deliveryLatencyMs'] = true;
        $this->deliveryLatencyMs = $deliveryLatencyMs;
        return $this;
    }
    /**
     * End-to-end accept → delivered time for the fastest delivered recipient, in milliseconds. Null until the first recipient is delivered.
     * 
     *
     * @return int|null
     */
    public function getTotalLatencyMs(): ?int
    {
        return $this->totalLatencyMs;
    }
    /**
     * End-to-end accept → delivered time for the fastest delivered recipient, in milliseconds. Null until the first recipient is delivered.
     *
     * @param int|null $totalLatencyMs
     *
     * @return self
     */
    public function setTotalLatencyMs(?int $totalLatencyMs): self
    {
        $this->initialized['totalLatencyMs'] = true;
        $this->totalLatencyMs = $totalLatencyMs;
        return $this;
    }
    /**
     * Total open events across all recipients.
     *
     * @return int|null
     */
    public function getOpenCount(): ?int
    {
        return $this->openCount;
    }
    /**
     * Total open events across all recipients.
     *
     * @param int|null $openCount
     *
     * @return self
     */
    public function setOpenCount(?int $openCount): self
    {
        $this->initialized['openCount'] = true;
        $this->openCount = $openCount;
        return $this;
    }
    /**
     * Total click events across all recipients.
     *
     * @return int|null
     */
    public function getClickCount(): ?int
    {
        return $this->clickCount;
    }
    /**
     * Total click events across all recipients.
     *
     * @param int|null $clickCount
     *
     * @return self
     */
    public function setClickCount(?int $clickCount): self
    {
        $this->initialized['clickCount'] = true;
        $this->clickCount = $clickCount;
        return $this;
    }
    /**
     * The template language this send asked for, in canonical form (`pt-BR` for a request of `pt-br`). Null when the send named no language (it took the template's default) or used no template at all. Compare it with `resolved_language`: when they differ, the language you asked for was not available and the template's `on_missing_language` policy chose the one shown there instead.
     * 
     *
     * @return string|null
     */
    public function getRequestedLanguage(): ?string
    {
        return $this->requestedLanguage;
    }
    /**
     * The template language this send asked for, in canonical form (`pt-BR` for a request of `pt-br`). Null when the send named no language (it took the template's default) or used no template at all. Compare it with `resolved_language`: when they differ, the language you asked for was not available and the template's `on_missing_language` policy chose the one shown there instead.
     *
     * @param string|null $requestedLanguage
     *
     * @return self
     */
    public function setRequestedLanguage(?string $requestedLanguage): self
    {
        $this->initialized['requestedLanguage'] = true;
        $this->requestedLanguage = $requestedLanguage;
        return $this;
    }
    /**
     * The template language this send was actually delivered in, in canonical form. Null when the send used no template. A non-null value with a null `requested_language` means the send named no language and took the template's default.
     * 
     *
     * @return string|null
     */
    public function getResolvedLanguage(): ?string
    {
        return $this->resolvedLanguage;
    }
    /**
     * The template language this send was actually delivered in, in canonical form. Null when the send used no template. A non-null value with a null `requested_language` means the send named no language and took the template's default.
     *
     * @param string|null $resolvedLanguage
     *
     * @return self
     */
    public function setResolvedLanguage(?string $resolvedLanguage): self
    {
        $this->initialized['resolvedLanguage'] = true;
        $this->resolvedLanguage = $resolvedLanguage;
        return $this;
    }
    /**
     * The template this send rendered from, or null for a send that supplied its content inline.
     * 
     *
     * @return string|null
     */
    public function getTemplateId(): ?string
    {
        return $this->templateId;
    }
    /**
     * The template this send rendered from, or null for a send that supplied its content inline.
     *
     * @param string|null $templateId
     *
     * @return self
     */
    public function setTemplateId(?string $templateId): self
    {
        $this->initialized['templateId'] = true;
        $this->templateId = $templateId;
        return $this;
    }
    /**
     * The exact template version this send rendered from, or null for an inline send. A template's live version changes every time you submit it, so this is what identifies the wording that was actually delivered, together with `resolved_language`.
     * 
     *
     * @return string|null
     */
    public function getTemplateVersionId(): ?string
    {
        return $this->templateVersionId;
    }
    /**
     * The exact template version this send rendered from, or null for an inline send. A template's live version changes every time you submit it, so this is what identifies the wording that was actually delivered, together with `resolved_language`.
     *
     * @param string|null $templateVersionId
     *
     * @return self
     */
    public function setTemplateVersionId(?string $templateVersionId): self
    {
        $this->initialized['templateVersionId'] = true;
        $this->templateVersionId = $templateVersionId;
        return $this;
    }
    /**
     * Structured `{name, value}` filter labels applied to this send. See EmailMessageSendRequest for the tags vs metadata distinction.
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Structured `{name, value}` filter labels applied to this send. See EmailMessageSendRequest for the tags vs metadata distinction.
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
     * Arbitrary JSON metadata stored on the message object and echoed in webhook payloads. See EmailMessageSendRequest for the tags vs metadata distinction.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Arbitrary JSON metadata stored on the message object and echoed in webhook payloads. See EmailMessageSendRequest for the tags vs metadata distinction.
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
     * The substitution values this send supplied, whether inline or from a template, or null if none were supplied. They are the values applied to `subject` and to the bodies the content endpoint returns, kept so you can see what produced the delivered copy and not only the result.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getParameters(): ?iterable
    {
        return $this->parameters;
    }
    /**
     * The substitution values this send supplied, whether inline or from a template, or null if none were supplied. They are the values applied to `subject` and to the bodies the content endpoint returns, kept so you can see what produced the delivered copy and not only the result.
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
     * Attachment metadata for the send. Empty when no attachments were included. Raw content is not echoed; when content storage is enabled, download an attachment by its `id` via the message's attachment endpoint.
     *
     * @return list<EmailAttachmentRef>|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }
    /**
     * Attachment metadata for the send. Empty when no attachments were included. Raw content is not echoed; when content storage is enabled, download an attachment by its `id` via the message's attachment endpoint.
     *
     * @param list<EmailAttachmentRef>|null $attachments
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
     * Whether open tracking is enabled for this send.
     *
     * @return bool|null
     */
    public function getTrackOpens(): ?bool
    {
        return $this->trackOpens;
    }
    /**
     * Whether open tracking is enabled for this send.
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
     * Whether click tracking is enabled for this send.
     *
     * @return bool|null
     */
    public function getTrackClicks(): ?bool
    {
        return $this->trackClicks;
    }
    /**
     * Whether click tracking is enabled for this send.
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
     * When the send request was accepted.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the send request was accepted.
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
     * Thread this message belongs to. Null until threading is enabled.
     *
     * @return string|null
     */
    public function getThreadId(): ?string
    {
        return $this->threadId;
    }
    /**
     * Thread this message belongs to. Null until threading is enabled.
     *
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
     * The message this one is a reply to, if any.
     *
     * @return string|null
     */
    public function getInReplyToMessageId(): ?string
    {
        return $this->inReplyToMessageId;
    }
    /**
     * The message this one is a reply to, if any.
     *
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
     * When all recipients reached a terminal delivered state, or null if not yet fully delivered.
     *
     * @return \DateTime|null
     */
    public function getDeliveredAt(): ?\DateTime
    {
        return $this->deliveredAt;
    }
    /**
     * When all recipients reached a terminal delivered state, or null if not yet fully delivered.
     *
     * @param \DateTime|null $deliveredAt
     *
     * @return self
     */
    public function setDeliveredAt(?\DateTime $deliveredAt): self
    {
        $this->initialized['deliveredAt'] = true;
        $this->deliveredAt = $deliveredAt;
        return $this;
    }
    /**
     * When this message is scheduled to send, for a send created with a future send time. Null for an immediate send. Stays set after the scheduled send fires.
     *
     * @return \DateTime|null
     */
    public function getScheduledAt(): ?\DateTime
    {
        return $this->scheduledAt;
    }
    /**
     * When this message is scheduled to send, for a send created with a future send time. Null for an immediate send. Stays set after the scheduled send fires.
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
