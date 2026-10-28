<?php

namespace MessageBird\Wire\Model;

/**
 * A message to send. Supply exactly one of `text` (free-text, which also requires `category` unless a messaging profile supplies a default), `template` (a stored template, whose category is derived), or `binary` (which also requires `category`). Supplying more than one, or none, is rejected.
 */
class SMSMessageSendRequest
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
     * Recipient phone number in E.164 format (for example `+14155550100`), or in national format when you also pass `to_country_code`. One recipient per message. The number is stored and returned in canonical E.164; a recipient that cannot be routed returns a `422` `SMSInvalidRecipient`.
     * 
     *
     * @var string|null
     */
    protected $to;
    /**
     * The ISO 3166-1 alpha-2 country whose national numbering plan `to` is written in, such as `NL` for `0612345678`. Bird converts `to` to E.164 before checking the destination, price and sender. An E.164 `to` is still accepted when its country calling code matches this country; a mismatch, or a national number that is not valid in this country, returns a `422` `SMSInvalidRecipient`. Omit it to send `to` in E.164.
     * 
     *
     * @var string|null
     */
    protected $toCountryCode;
    /**
     * Sender to send from. It must be a sender the workspace holds: a number it owns in E.164, such as `+15557654321`, a short code it holds, such as `24680`, or an alphanumeric sender ID it has claimed, such as `MyBrand`. A sender the workspace does not hold returns a `422` `SMSSenderNotConfigured`, and an alphanumeric sender must also be permitted, and where required registered, for the destination country. Required on a free-text send and when sending a workspace template, unless `messaging_profile_id` is set and the profile selects a sender for the destination country or has a default sender. Omitting it otherwise returns `422`. A built-in template selects its sender automatically and rejects `from`.
     * 
     *
     * @var string|null
     */
    protected $from;
    /**
     * Free-text message body. Required unless `template` is supplied (the two are mutually exclusive). At least 1 character, up to a 12-segment cap (roughly 1836 GSM-7 or 804 UCS-2 characters). Bird does not truncate; a body exceeding 12 segments is rejected with a 422. The cap applies to segments because GSM-7 and UCS-2 encodings differ in characters per segment.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * Send an 8-bit binary payload instead of `text` or `template`. Requires `category` `transactional` and refuses `options.smart_encoding`. It is sent and charged as one segment.
     * 
     *
     * @var SMSMessageSendRequestBinary|null
     */
    protected $binary;
    /**
     * Content classification: why you are sending. Required on a free-text send unless the messaging profile in `messaging_profile_id` sets a default category; omit it on a template send, where the category is derived from the template. Where the destination country requires the sender to be registered, a category outside what that registration covers returns a `422` `SenderCategoryNotPermitted`.
     * 
     *
     * @var string|null
     */
    protected $category;
    /**
     * How long, in seconds (60-172800), the message may wait for delivery, counted from acceptance. Bird does not submit the message to the carrier after this deadline and passes the remaining time to the carrier where the route supports it. A message that misses the deadline before reaching the carrier ends `rejected` or `failed`, not `expired`; `expired` comes only from a carrier report. Omit it to use the validity period of the messaging profile in `messaging_profile_id`, or the carrier's own validity rules when the profile sets none.
     * 
     *
     * @var int|null
     */
    protected $validityPeriod;
    /**
     * An identifier you want to find this message by, such as an order or ticket number, matched exactly by the message list's `reference` filter. Set it only when you need to search on it, and put any other data in `metadata`. Stored on the message, returned on reads and echoed in webhook payloads. Several messages can share one.
     * 
     *
     * @var string|null
     */
    protected $reference;
    /**
     * Your accounting identifier for this message, such as a department code. Stored on the message and its usage record, returned on reads, and echoed in webhook payloads. Omit it to use the cost center of the messaging profile in `messaging_profile_id`. Accepting it does not change how the message is priced.
     * 
     *
     * @var string|null
     */
    protected $costCenter;
    /**
     * Structured `{name, value}` labels for filtering and analytics. Tags become first-class query dimensions: filter the list endpoint by tag name, slice analytics by tag, and surface in webhook payloads. Maximum 20 tags per send. Use tags for low-cardinality dimensions (`category`, `experiment_variant`). For arbitrary structured context you do not need as a filter dimension, use `metadata` instead.
     * 
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Arbitrary JSON object stored on the message, returned on API reads, and echoed in webhook payloads. Maximum 2 KB serialized. Use metadata for per-send context like internal IDs and foreign keys. For low-cardinality filterable labels, use `tags` instead.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * What Bird does to this message on its way out, such as `smart_encoding`. The message being relayed stays at the top level: its recipient, sender, content, and the delivery instructions the carrier acts on.
     * 
     *
     * @var SMSMessageSendRequestOptions|null
     */
    protected $options;
    /**
     * Preview feature: multimedia (MMS) attachments. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @var list<string>|null
     */
    protected $mediaUrls;
    /**
     * The messaging profile that supplies this message's sender and defaults. When `from` is omitted, Bird sends from the profile's sender for the destination country, or its default sender. An omitted `category` on a free-text send takes the profile's default category, and `smart_encoding`, `cost_center` and `validity_period` take the profile's settings. So do `options.callback_url` and `options.ignore_suppression`, which apply to the message. Values you set on the message take precedence. A built-in template sends from Bird's system sender and ignores the profile's senders. A profile that does not exist in this workspace returns `422` `SMSMessagingProfileNotFound`; a `from` bound to a different profile returns `422` `SMSMessagingProfileSenderBound`.
     * 
     *
     * @var string|null
     */
    protected $messagingProfileId;
    /**
     * Preview feature: send-later scheduling. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @var \DateTime|null
     */
    protected $scheduledAt;
    /**
     * Send using a stored template instead of free text. The category is derived from the template, so `category` and `media_urls` are rejected. A workspace template requires `from`; a built-in template selects its sender and rejects `from`.
     * 
     *
     * @var SMSMessageSendRequestTemplate|null
     */
    protected $template;
    /**
     * Preview feature: broadcast correlation. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @var string|null
     */
    protected $broadcastId;
    /**
     * Preview feature: campaign correlation for analytics. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @var string|null
     */
    protected $campaignId;
    /**
     * Preview feature: audience-targeted sends. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @var string|null
     */
    protected $audienceId;
    /**
     * Preview feature: contact-targeted sends. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @var string|null
     */
    protected $contactId;
    /**
     * Preview feature: topic-gated sends. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @var string|null
     */
    protected $topicId;
    /**
     * Preview feature: per-recipient substitution for batch sends. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @var array<string, mixed>|null
     */
    protected $personalization;
    /**
     * Recipient phone number in E.164 format (for example `+14155550100`), or in national format when you also pass `to_country_code`. One recipient per message. The number is stored and returned in canonical E.164; a recipient that cannot be routed returns a `422` `SMSInvalidRecipient`.
     * 
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * Recipient phone number in E.164 format (for example `+14155550100`), or in national format when you also pass `to_country_code`. One recipient per message. The number is stored and returned in canonical E.164; a recipient that cannot be routed returns a `422` `SMSInvalidRecipient`.
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
     * The ISO 3166-1 alpha-2 country whose national numbering plan `to` is written in, such as `NL` for `0612345678`. Bird converts `to` to E.164 before checking the destination, price and sender. An E.164 `to` is still accepted when its country calling code matches this country; a mismatch, or a national number that is not valid in this country, returns a `422` `SMSInvalidRecipient`. Omit it to send `to` in E.164.
     * 
     *
     * @return string|null
     */
    public function getToCountryCode(): ?string
    {
        return $this->toCountryCode;
    }
    /**
     * The ISO 3166-1 alpha-2 country whose national numbering plan `to` is written in, such as `NL` for `0612345678`. Bird converts `to` to E.164 before checking the destination, price and sender. An E.164 `to` is still accepted when its country calling code matches this country; a mismatch, or a national number that is not valid in this country, returns a `422` `SMSInvalidRecipient`. Omit it to send `to` in E.164.
     *
     * @param string|null $toCountryCode
     *
     * @return self
     */
    public function setToCountryCode(?string $toCountryCode): self
    {
        $this->initialized['toCountryCode'] = true;
        $this->toCountryCode = $toCountryCode;
        return $this;
    }
    /**
     * Sender to send from. It must be a sender the workspace holds: a number it owns in E.164, such as `+15557654321`, a short code it holds, such as `24680`, or an alphanumeric sender ID it has claimed, such as `MyBrand`. A sender the workspace does not hold returns a `422` `SMSSenderNotConfigured`, and an alphanumeric sender must also be permitted, and where required registered, for the destination country. Required on a free-text send and when sending a workspace template, unless `messaging_profile_id` is set and the profile selects a sender for the destination country or has a default sender. Omitting it otherwise returns `422`. A built-in template selects its sender automatically and rejects `from`.
     * 
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * Sender to send from. It must be a sender the workspace holds: a number it owns in E.164, such as `+15557654321`, a short code it holds, such as `24680`, or an alphanumeric sender ID it has claimed, such as `MyBrand`. A sender the workspace does not hold returns a `422` `SMSSenderNotConfigured`, and an alphanumeric sender must also be permitted, and where required registered, for the destination country. Required on a free-text send and when sending a workspace template, unless `messaging_profile_id` is set and the profile selects a sender for the destination country or has a default sender. Omitting it otherwise returns `422`. A built-in template selects its sender automatically and rejects `from`.
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
     * Free-text message body. Required unless `template` is supplied (the two are mutually exclusive). At least 1 character, up to a 12-segment cap (roughly 1836 GSM-7 or 804 UCS-2 characters). Bird does not truncate; a body exceeding 12 segments is rejected with a 422. The cap applies to segments because GSM-7 and UCS-2 encodings differ in characters per segment.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * Free-text message body. Required unless `template` is supplied (the two are mutually exclusive). At least 1 character, up to a 12-segment cap (roughly 1836 GSM-7 or 804 UCS-2 characters). Bird does not truncate; a body exceeding 12 segments is rejected with a 422. The cap applies to segments because GSM-7 and UCS-2 encodings differ in characters per segment.
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
     * Send an 8-bit binary payload instead of `text` or `template`. Requires `category` `transactional` and refuses `options.smart_encoding`. It is sent and charged as one segment.
     * 
     *
     * @return SMSMessageSendRequestBinary|null
     */
    public function getBinary(): ?SMSMessageSendRequestBinary
    {
        return $this->binary;
    }
    /**
     * Send an 8-bit binary payload instead of `text` or `template`. Requires `category` `transactional` and refuses `options.smart_encoding`. It is sent and charged as one segment.
     *
     * @param SMSMessageSendRequestBinary|SMSBinary|array|null $binary
     *
     * @return self
     */
    public function setBinary($binary): self
    {
        $this->initialized['binary'] = true;
        $this->binary = \MessageBird\Core\ModelWrapper::normalize($binary, SMSMessageSendRequestBinary::class);
        return $this;
    }
    /**
     * Content classification: why you are sending. Required on a free-text send unless the messaging profile in `messaging_profile_id` sets a default category; omit it on a template send, where the category is derived from the template. Where the destination country requires the sender to be registered, a category outside what that registration covers returns a `422` `SenderCategoryNotPermitted`.
     * 
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Content classification: why you are sending. Required on a free-text send unless the messaging profile in `messaging_profile_id` sets a default category; omit it on a template send, where the category is derived from the template. Where the destination country requires the sender to be registered, a category outside what that registration covers returns a `422` `SenderCategoryNotPermitted`.
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
     * How long, in seconds (60-172800), the message may wait for delivery, counted from acceptance. Bird does not submit the message to the carrier after this deadline and passes the remaining time to the carrier where the route supports it. A message that misses the deadline before reaching the carrier ends `rejected` or `failed`, not `expired`; `expired` comes only from a carrier report. Omit it to use the validity period of the messaging profile in `messaging_profile_id`, or the carrier's own validity rules when the profile sets none.
     * 
     *
     * @return int|null
     */
    public function getValidityPeriod(): ?int
    {
        return $this->validityPeriod;
    }
    /**
     * How long, in seconds (60-172800), the message may wait for delivery, counted from acceptance. Bird does not submit the message to the carrier after this deadline and passes the remaining time to the carrier where the route supports it. A message that misses the deadline before reaching the carrier ends `rejected` or `failed`, not `expired`; `expired` comes only from a carrier report. Omit it to use the validity period of the messaging profile in `messaging_profile_id`, or the carrier's own validity rules when the profile sets none.
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
     * Your accounting identifier for this message, such as a department code. Stored on the message and its usage record, returned on reads, and echoed in webhook payloads. Omit it to use the cost center of the messaging profile in `messaging_profile_id`. Accepting it does not change how the message is priced.
     * 
     *
     * @return string|null
     */
    public function getCostCenter(): ?string
    {
        return $this->costCenter;
    }
    /**
     * Your accounting identifier for this message, such as a department code. Stored on the message and its usage record, returned on reads, and echoed in webhook payloads. Omit it to use the cost center of the messaging profile in `messaging_profile_id`. Accepting it does not change how the message is priced.
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
     * Structured `{name, value}` labels for filtering and analytics. Tags become first-class query dimensions: filter the list endpoint by tag name, slice analytics by tag, and surface in webhook payloads. Maximum 20 tags per send. Use tags for low-cardinality dimensions (`category`, `experiment_variant`). For arbitrary structured context you do not need as a filter dimension, use `metadata` instead.
     * 
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Structured `{name, value}` labels for filtering and analytics. Tags become first-class query dimensions: filter the list endpoint by tag name, slice analytics by tag, and surface in webhook payloads. Maximum 20 tags per send. Use tags for low-cardinality dimensions (`category`, `experiment_variant`). For arbitrary structured context you do not need as a filter dimension, use `metadata` instead.
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
     * Arbitrary JSON object stored on the message, returned on API reads, and echoed in webhook payloads. Maximum 2 KB serialized. Use metadata for per-send context like internal IDs and foreign keys. For low-cardinality filterable labels, use `tags` instead.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Arbitrary JSON object stored on the message, returned on API reads, and echoed in webhook payloads. Maximum 2 KB serialized. Use metadata for per-send context like internal IDs and foreign keys. For low-cardinality filterable labels, use `tags` instead.
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
     * What Bird does to this message on its way out, such as `smart_encoding`. The message being relayed stays at the top level: its recipient, sender, content, and the delivery instructions the carrier acts on.
     * 
     *
     * @return SMSMessageSendRequestOptions|null
     */
    public function getOptions(): ?SMSMessageSendRequestOptions
    {
        return $this->options;
    }
    /**
     * What Bird does to this message on its way out, such as `smart_encoding`. The message being relayed stays at the top level: its recipient, sender, content, and the delivery instructions the carrier acts on.
     *
     * @param SMSMessageSendRequestOptions|SMSSendOptions|array|null $options
     *
     * @return self
     */
    public function setOptions($options): self
    {
        $this->initialized['options'] = true;
        $this->options = \MessageBird\Core\ModelWrapper::normalize($options, SMSMessageSendRequestOptions::class);
        return $this;
    }
    /**
     * Preview feature: multimedia (MMS) attachments. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @return list<string>|null
     */
    public function getMediaUrls(): ?array
    {
        return $this->mediaUrls;
    }
    /**
     * Preview feature: multimedia (MMS) attachments. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @param list<string>|null $mediaUrls
     *
     * @return self
     */
    public function setMediaUrls(?array $mediaUrls): self
    {
        $this->initialized['mediaUrls'] = true;
        $this->mediaUrls = $mediaUrls;
        return $this;
    }
    /**
     * The messaging profile that supplies this message's sender and defaults. When `from` is omitted, Bird sends from the profile's sender for the destination country, or its default sender. An omitted `category` on a free-text send takes the profile's default category, and `smart_encoding`, `cost_center` and `validity_period` take the profile's settings. So do `options.callback_url` and `options.ignore_suppression`, which apply to the message. Values you set on the message take precedence. A built-in template sends from Bird's system sender and ignores the profile's senders. A profile that does not exist in this workspace returns `422` `SMSMessagingProfileNotFound`; a `from` bound to a different profile returns `422` `SMSMessagingProfileSenderBound`.
     * 
     *
     * @return string|null
     */
    public function getMessagingProfileId(): ?string
    {
        return $this->messagingProfileId;
    }
    /**
     * The messaging profile that supplies this message's sender and defaults. When `from` is omitted, Bird sends from the profile's sender for the destination country, or its default sender. An omitted `category` on a free-text send takes the profile's default category, and `smart_encoding`, `cost_center` and `validity_period` take the profile's settings. So do `options.callback_url` and `options.ignore_suppression`, which apply to the message. Values you set on the message take precedence. A built-in template sends from Bird's system sender and ignores the profile's senders. A profile that does not exist in this workspace returns `422` `SMSMessagingProfileNotFound`; a `from` bound to a different profile returns `422` `SMSMessagingProfileSenderBound`.
     *
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
     * Preview feature: send-later scheduling. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @return \DateTime|null
     */
    public function getScheduledAt(): ?\DateTime
    {
        return $this->scheduledAt;
    }
    /**
     * Preview feature: send-later scheduling. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
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
     * Send using a stored template instead of free text. The category is derived from the template, so `category` and `media_urls` are rejected. A workspace template requires `from`; a built-in template selects its sender and rejects `from`.
     * 
     *
     * @return SMSMessageSendRequestTemplate|null
     */
    public function getTemplate(): ?SMSMessageSendRequestTemplate
    {
        return $this->template;
    }
    /**
     * Send using a stored template instead of free text. The category is derived from the template, so `category` and `media_urls` are rejected. A workspace template requires `from`; a built-in template selects its sender and rejects `from`.
     *
     * @param SMSMessageSendRequestTemplate|SMSTemplateSend|array|null $template
     *
     * @return self
     */
    public function setTemplate($template): self
    {
        $this->initialized['template'] = true;
        $this->template = \MessageBird\Core\ModelWrapper::normalize($template, SMSMessageSendRequestTemplate::class);
        return $this;
    }
    /**
     * Preview feature: broadcast correlation. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @return string|null
     */
    public function getBroadcastId(): ?string
    {
        return $this->broadcastId;
    }
    /**
     * Preview feature: broadcast correlation. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @param string|null $broadcastId
     *
     * @return self
     */
    public function setBroadcastId(?string $broadcastId): self
    {
        $this->initialized['broadcastId'] = true;
        $this->broadcastId = $broadcastId;
        return $this;
    }
    /**
     * Preview feature: campaign correlation for analytics. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @return string|null
     */
    public function getCampaignId(): ?string
    {
        return $this->campaignId;
    }
    /**
     * Preview feature: campaign correlation for analytics. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @param string|null $campaignId
     *
     * @return self
     */
    public function setCampaignId(?string $campaignId): self
    {
        $this->initialized['campaignId'] = true;
        $this->campaignId = $campaignId;
        return $this;
    }
    /**
     * Preview feature: audience-targeted sends. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @return string|null
     */
    public function getAudienceId(): ?string
    {
        return $this->audienceId;
    }
    /**
     * Preview feature: audience-targeted sends. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @param string|null $audienceId
     *
     * @return self
     */
    public function setAudienceId(?string $audienceId): self
    {
        $this->initialized['audienceId'] = true;
        $this->audienceId = $audienceId;
        return $this;
    }
    /**
     * Preview feature: contact-targeted sends. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @return string|null
     */
    public function getContactId(): ?string
    {
        return $this->contactId;
    }
    /**
     * Preview feature: contact-targeted sends. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
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
     * Preview feature: topic-gated sends. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @return string|null
     */
    public function getTopicId(): ?string
    {
        return $this->topicId;
    }
    /**
     * Preview feature: topic-gated sends. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
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
    /**
     * Preview feature: per-recipient substitution for batch sends. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @return array<string, mixed>|null
     */
    public function getPersonalization(): ?iterable
    {
        return $this->personalization;
    }
    /**
     * Preview feature: per-recipient substitution for batch sends. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @param array<string, mixed>|null $personalization
     *
     * @return self
     */
    public function setPersonalization(?iterable $personalization): self
    {
        $this->initialized['personalization'] = true;
        $this->personalization = $personalization;
        return $this;
    }
}
