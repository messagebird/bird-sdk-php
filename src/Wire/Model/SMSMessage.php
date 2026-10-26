<?php

namespace MessageBird\Wire\Model;

class SMSMessage
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
     * Whether the message was sent from a Bird sender (`outbound`) or received from a subscriber (`inbound`).
     *
     * @var string|null
     */
    protected $direction;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * Where the message went. On an outbound message this is the recipient's phone number in E.164 format; on an inbound one it is your own number that received it.
     * 
     *
     * @var string|null
     */
    protected $to;
    /**
     * Where the message came from. On an outbound message this is the sender you sent it from: an E.164 number, an alphanumeric sender ID, or a short code. On an inbound message, this is the phone number that sent it to you.
     * 
     *
     * @var string|null
     */
    protected $from;
    /**
     * The message body. Every message carries body text, attachments, or both, so this is absent only on a received message that carried attachments and no text, and on a binary message, which returns `binary` instead. For a template send, this is the rendered text after parameter substitution. When `category` is `authentication` (a message carrying a one-time code), this is `**REDACTED**`: the code still reaches the recipient, but the API does not retain it for later reads.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * Preview feature: the payload of a binary send, in place of `text`. Absent on every other message.
     *
     * @var SMSMessageBinary|null
     */
    protected $binary;
    /**
     * Content classification supplied for free text or derived from the template. Null for inbound messages.
     *
     * @var string|null
     */
    protected $category;
    /**
     * The template language requested by the send, in canonical form. Null when the send named no language or used no template.
     * 
     *
     * @var string|null
     */
    protected $requestedLanguage;
    /**
     * The template language whose text was rendered, in canonical form. Null when the send used no template. This can differ from `requested_language` when the template's fallback policy selects another language.
     * 
     *
     * @var string|null
     */
    protected $resolvedLanguage;
    /**
     * The template rendered for this message, or null for a free-text message.
     *
     * @var string|null
     */
    protected $templateId;
    /**
     * The workspace published version or synthetic built-in version rendered at acceptance, or null for a free-text message. For a built-in template, `template_content_hash` identifies the exact catalogue source.
     * 
     *
     * @var string|null
     */
    protected $templateVersionId;
    /**
     * The rendered language's source fingerprint, or null for a free-text message.
     *
     * @var string|null
     */
    protected $templateContentHash;
    /**
     * @var string|null
     */
    protected $messagingProfileId;
    /**
     * Segment breakdown for the message body. Segment count drives billing.
     *
     * @var SMSSegments|null
     */
    protected $segments;
    /**
     * What was charged for a message, split into the components that make it up. `null` until at least one component has been priced.
     * 
     *
     * @var MessageCost|null
     */
    protected $cost;
    /**
     * Structured `{name, value}` filter labels applied to this message.
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Arbitrary JSON metadata stored on the message and echoed in webhook payloads.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * The settings applied to this message, with any option you omitted filled in with the default in force when you sent it. Absent on inbound messages, and on any outbound message for which no settings were recorded.
     * 
     *
     * @var SMSMessageOptions|null
     */
    protected $options;
    /**
     * Preview feature: the `validity_period` applied to the message, in seconds: the send's own, or else its messaging profile's. Absent when neither set one.
     *
     * @var int|null
     */
    protected $validityPeriod;
    /**
     * Preview feature: the `cost_center` applied to the message: the send's own, or else its messaging profile's. Absent when neither set one, and on inbound messages.
     *
     * @var string|null
     */
    protected $costCenter;
    /**
     * Carrier that handled the message. Absent until a delivery receipt identifies it, and on a received message the carrier reports it only where a carrier fee applies.
     *
     * @var string|null
     */
    protected $carrier;
    /**
     * Mobile country code and mobile network code of the carrier. Absent until the carrier is identified.
     *
     * @var string|null
     */
    protected $mccMnc;
    /**
     * Failure detail for a message that could not be delivered or was rejected.
     *
     * @var SMSError|null
     */
    protected $lastError;
    /**
     * On an outbound message, the country of the recipient's number. On a received message, the country of the sender's number, or of your number that received it when the sender is not a phone number, such as a short code or an alphanumeric sender. The same value as the message's `sms.*` events' `country_code`. Absent when not known.
     * 
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * Preview feature: on a received message, the outbound message it was paired with through its messaging profile's outbound matching. Absent on outbound messages and on received messages that were not paired.
     * 
     *
     * @var SMSMessageInReplyToMessage|null
     */
    protected $inReplyToMessage;
    /**
     * When the message was accepted (outbound) or received (inbound).
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the message was handed to the carrier. Null until then.
     *
     * @var \DateTime|null
     */
    protected $sentAt;
    /**
     * When delivery was confirmed. Null until then.
     *
     * @var \DateTime|null
     */
    protected $deliveredAt;
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
     * Whether the message was sent from a Bird sender (`outbound`) or received from a subscriber (`inbound`).
     *
     * @return string|null
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }
    /**
     * Whether the message was sent from a Bird sender (`outbound`) or received from a subscriber (`inbound`).
     *
     * @param string|null $direction
     *
     * @return self
     */
    public function setDirection(?string $direction): self
    {
        $this->initialized['direction'] = true;
        $this->direction = $direction;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
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
     * Where the message went. On an outbound message this is the recipient's phone number in E.164 format; on an inbound one it is your own number that received it.
     * 
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * Where the message went. On an outbound message this is the recipient's phone number in E.164 format; on an inbound one it is your own number that received it.
     *
     * @param string|null $to
     *
     * @return self
     */
    public function setTo(?string $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * Where the message came from. On an outbound message this is the sender you sent it from: an E.164 number, an alphanumeric sender ID, or a short code. On an inbound message, this is the phone number that sent it to you.
     * 
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * Where the message came from. On an outbound message this is the sender you sent it from: an E.164 number, an alphanumeric sender ID, or a short code. On an inbound message, this is the phone number that sent it to you.
     *
     * @param string|null $from
     *
     * @return self
     */
    public function setFrom(?string $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * The message body. Every message carries body text, attachments, or both, so this is absent only on a received message that carried attachments and no text, and on a binary message, which returns `binary` instead. For a template send, this is the rendered text after parameter substitution. When `category` is `authentication` (a message carrying a one-time code), this is `**REDACTED**`: the code still reaches the recipient, but the API does not retain it for later reads.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The message body. Every message carries body text, attachments, or both, so this is absent only on a received message that carried attachments and no text, and on a binary message, which returns `binary` instead. For a template send, this is the rendered text after parameter substitution. When `category` is `authentication` (a message carrying a one-time code), this is `**REDACTED**`: the code still reaches the recipient, but the API does not retain it for later reads.
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
     * Preview feature: the payload of a binary send, in place of `text`. Absent on every other message.
     *
     * @return SMSMessageBinary|null
     */
    public function getBinary(): ?SMSMessageBinary
    {
        return $this->binary;
    }
    /**
     * Preview feature: the payload of a binary send, in place of `text`. Absent on every other message.
     *
     * @param SMSMessageBinary|SMSBinary|array|null $binary
     *
     * @return self
     */
    public function setBinary($binary): self
    {
        $this->initialized['binary'] = true;
        $this->binary = \MessageBird\Core\ModelWrapper::normalize($binary, SMSMessageBinary::class);
        return $this;
    }
    /**
     * Content classification supplied for free text or derived from the template. Null for inbound messages.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Content classification supplied for free text or derived from the template. Null for inbound messages.
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
     * The template language requested by the send, in canonical form. Null when the send named no language or used no template.
     * 
     *
     * @return string|null
     */
    public function getRequestedLanguage(): ?string
    {
        return $this->requestedLanguage;
    }
    /**
     * The template language requested by the send, in canonical form. Null when the send named no language or used no template.
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
     * The template language whose text was rendered, in canonical form. Null when the send used no template. This can differ from `requested_language` when the template's fallback policy selects another language.
     * 
     *
     * @return string|null
     */
    public function getResolvedLanguage(): ?string
    {
        return $this->resolvedLanguage;
    }
    /**
     * The template language whose text was rendered, in canonical form. Null when the send used no template. This can differ from `requested_language` when the template's fallback policy selects another language.
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
     * The template rendered for this message, or null for a free-text message.
     *
     * @return string|null
     */
    public function getTemplateId(): ?string
    {
        return $this->templateId;
    }
    /**
     * The template rendered for this message, or null for a free-text message.
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
     * The workspace published version or synthetic built-in version rendered at acceptance, or null for a free-text message. For a built-in template, `template_content_hash` identifies the exact catalogue source.
     * 
     *
     * @return string|null
     */
    public function getTemplateVersionId(): ?string
    {
        return $this->templateVersionId;
    }
    /**
     * The workspace published version or synthetic built-in version rendered at acceptance, or null for a free-text message. For a built-in template, `template_content_hash` identifies the exact catalogue source.
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
     * The rendered language's source fingerprint, or null for a free-text message.
     *
     * @return string|null
     */
    public function getTemplateContentHash(): ?string
    {
        return $this->templateContentHash;
    }
    /**
     * The rendered language's source fingerprint, or null for a free-text message.
     *
     * @param string|null $templateContentHash
     *
     * @return self
     */
    public function setTemplateContentHash(?string $templateContentHash): self
    {
        $this->initialized['templateContentHash'] = true;
        $this->templateContentHash = $templateContentHash;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getMessagingProfileId(): ?string
    {
        return $this->messagingProfileId;
    }
    /**
     * @param string|null $messagingProfileId
     *
     * @return self
     */
    public function setMessagingProfileId(?string $messagingProfileId): self
    {
        $this->initialized['messagingProfileId'] = true;
        $this->messagingProfileId = $messagingProfileId;
        return $this;
    }
    /**
     * Segment breakdown for the message body. Segment count drives billing.
     *
     * @return SMSSegments|null
     */
    public function getSegments(): ?SMSSegments
    {
        return $this->segments;
    }
    /**
     * Segment breakdown for the message body. Segment count drives billing.
     *
     * @param SMSSegments|null $segments
     *
     * @return self
     */
    public function setSegments(?SMSSegments $segments): self
    {
        $this->initialized['segments'] = true;
        $this->segments = $segments;
        return $this;
    }
    /**
     * What was charged for a message, split into the components that make it up. `null` until at least one component has been priced.
     * 
     *
     * @return MessageCost|null
     */
    public function getCost(): ?MessageCost
    {
        return $this->cost;
    }
    /**
     * What was charged for a message, split into the components that make it up. `null` until at least one component has been priced.
     *
     * @param MessageCost|null $cost
     *
     * @return self
     */
    public function setCost(?MessageCost $cost): self
    {
        $this->initialized['cost'] = true;
        $this->cost = $cost;
        return $this;
    }
    /**
     * Structured `{name, value}` filter labels applied to this message.
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Structured `{name, value}` filter labels applied to this message.
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
     * Arbitrary JSON metadata stored on the message and echoed in webhook payloads.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Arbitrary JSON metadata stored on the message and echoed in webhook payloads.
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
     * The settings applied to this message, with any option you omitted filled in with the default in force when you sent it. Absent on inbound messages, and on any outbound message for which no settings were recorded.
     * 
     *
     * @return SMSMessageOptions|null
     */
    public function getOptions(): ?SMSMessageOptions
    {
        return $this->options;
    }
    /**
     * The settings applied to this message, with any option you omitted filled in with the default in force when you sent it. Absent on inbound messages, and on any outbound message for which no settings were recorded.
     *
     * @param SMSMessageOptions|SMSMessageEffectiveOptions|array|null $options
     *
     * @return self
     */
    public function setOptions($options): self
    {
        $this->initialized['options'] = true;
        $this->options = \MessageBird\Core\ModelWrapper::normalize($options, SMSMessageOptions::class);
        return $this;
    }
    /**
     * Preview feature: the `validity_period` applied to the message, in seconds: the send's own, or else its messaging profile's. Absent when neither set one.
     *
     * @return int|null
     */
    public function getValidityPeriod(): ?int
    {
        return $this->validityPeriod;
    }
    /**
     * Preview feature: the `validity_period` applied to the message, in seconds: the send's own, or else its messaging profile's. Absent when neither set one.
     *
     * @param int|null $validityPeriod
     *
     * @return self
     */
    public function setValidityPeriod(?int $validityPeriod): self
    {
        $this->initialized['validityPeriod'] = true;
        $this->validityPeriod = $validityPeriod;
        return $this;
    }
    /**
     * Preview feature: the `cost_center` applied to the message: the send's own, or else its messaging profile's. Absent when neither set one, and on inbound messages.
     *
     * @return string|null
     */
    public function getCostCenter(): ?string
    {
        return $this->costCenter;
    }
    /**
     * Preview feature: the `cost_center` applied to the message: the send's own, or else its messaging profile's. Absent when neither set one, and on inbound messages.
     *
     * @param string|null $costCenter
     *
     * @return self
     */
    public function setCostCenter(?string $costCenter): self
    {
        $this->initialized['costCenter'] = true;
        $this->costCenter = $costCenter;
        return $this;
    }
    /**
     * Carrier that handled the message. Absent until a delivery receipt identifies it, and on a received message the carrier reports it only where a carrier fee applies.
     *
     * @return string|null
     */
    public function getCarrier(): ?string
    {
        return $this->carrier;
    }
    /**
     * Carrier that handled the message. Absent until a delivery receipt identifies it, and on a received message the carrier reports it only where a carrier fee applies.
     *
     * @param string|null $carrier
     *
     * @return self
     */
    public function setCarrier(?string $carrier): self
    {
        $this->initialized['carrier'] = true;
        $this->carrier = $carrier;
        return $this;
    }
    /**
     * Mobile country code and mobile network code of the carrier. Absent until the carrier is identified.
     *
     * @return string|null
     */
    public function getMccMnc(): ?string
    {
        return $this->mccMnc;
    }
    /**
     * Mobile country code and mobile network code of the carrier. Absent until the carrier is identified.
     *
     * @param string|null $mccMnc
     *
     * @return self
     */
    public function setMccMnc(?string $mccMnc): self
    {
        $this->initialized['mccMnc'] = true;
        $this->mccMnc = $mccMnc;
        return $this;
    }
    /**
     * Failure detail for a message that could not be delivered or was rejected.
     *
     * @return SMSError|null
     */
    public function getLastError(): ?SMSError
    {
        return $this->lastError;
    }
    /**
     * Failure detail for a message that could not be delivered or was rejected.
     *
     * @param SMSError|null $lastError
     *
     * @return self
     */
    public function setLastError(?SMSError $lastError): self
    {
        $this->initialized['lastError'] = true;
        $this->lastError = $lastError;
        return $this;
    }
    /**
     * On an outbound message, the country of the recipient's number. On a received message, the country of the sender's number, or of your number that received it when the sender is not a phone number, such as a short code or an alphanumeric sender. The same value as the message's `sms.*` events' `country_code`. Absent when not known.
     * 
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * On an outbound message, the country of the recipient's number. On a received message, the country of the sender's number, or of your number that received it when the sender is not a phone number, such as a short code or an alphanumeric sender. The same value as the message's `sms.*` events' `country_code`. Absent when not known.
     *
     * @param string|null $countryCode
     *
     * @return self
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;
        return $this;
    }
    /**
     * Preview feature: on a received message, the outbound message it was paired with through its messaging profile's outbound matching. Absent on outbound messages and on received messages that were not paired.
     * 
     *
     * @return SMSMessageInReplyToMessage|null
     */
    public function getInReplyToMessage(): ?SMSMessageInReplyToMessage
    {
        return $this->inReplyToMessage;
    }
    /**
     * Preview feature: on a received message, the outbound message it was paired with through its messaging profile's outbound matching. Absent on outbound messages and on received messages that were not paired.
     *
     * @param SMSMessageInReplyToMessage|SMSInReplyToMessage|array|null $inReplyToMessage
     *
     * @return self
     */
    public function setInReplyToMessage($inReplyToMessage): self
    {
        $this->initialized['inReplyToMessage'] = true;
        $this->inReplyToMessage = \MessageBird\Core\ModelWrapper::normalize($inReplyToMessage, SMSMessageInReplyToMessage::class);
        return $this;
    }
    /**
     * When the message was accepted (outbound) or received (inbound).
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the message was accepted (outbound) or received (inbound).
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
     * When the message was handed to the carrier. Null until then.
     *
     * @return \DateTime|null
     */
    public function getSentAt(): ?\DateTime
    {
        return $this->sentAt;
    }
    /**
     * When the message was handed to the carrier. Null until then.
     *
     * @param \DateTime|null $sentAt
     *
     * @return self
     */
    public function setSentAt(?\DateTime $sentAt): self
    {
        $this->initialized['sentAt'] = true;
        $this->sentAt = $sentAt;
        return $this;
    }
    /**
     * When delivery was confirmed. Null until then.
     *
     * @return \DateTime|null
     */
    public function getDeliveredAt(): ?\DateTime
    {
        return $this->deliveredAt;
    }
    /**
     * When delivery was confirmed. Null until then.
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
}
