<?php

namespace MessageBird\Wire\Model;

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
     * Recipient phone number in E.164 format (for example `+15551234567`). One recipient per message.
     *
     * @var string|null
     */
    protected $to;
    /**
     * Sender to send from: an E.164 number (`+15557654321`), an alphanumeric sender ID (1-11 letters, digits, spaces, dashes, or underscores, at least one of them a letter, for example `MyBrand`), or a short code (5-6 digits). A numeric sender must be a number your workspace owns; an alphanumeric sender is accepted where the destination country permits one. Required on a free-text send: omitting it returns a `422` `SMSNoEligibleSender`. Not accepted alongside `template`, which selects its sender automatically.
     * 
     *
     * @var string|null
     */
    protected $from;
    /**
     * Free-text message body. Required unless `template` is supplied (the two are mutually exclusive). At least 1 character, up to a 12-segment cap (roughly 1836 GSM-7 or 804 UCS-2 characters). Bird does not truncate; a body exceeding 12 segments is rejected with a 422. The limit is on segment count, not characters, because GSM-7 and UCS-2 encodings differ in characters per segment.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * Content classification. Tells Bird and carriers why you're sending; per-country compliance rules (opt-out policy, quiet hours) key on it as they roll out. Required on a free-text send; omit it on a template send, where the category is derived from the template.
     * 
     *
     * @var string|null
     */
    protected $category;
    /**
     * Preview feature: how long, in seconds (60-172800), Bird keeps trying to deliver before the message transitions to `expired`. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     * 
     *
     * @var int|null
     */
    protected $validityPeriod;
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
     * Preview feature: multimedia (MMS) attachments. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @var list<string>|null
     */
    protected $mediaUrls;
    /**
     * Preview feature: sender selection from a messaging profile pool. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
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
     * Send using a stored template instead of free text. Mutually exclusive with `text`; the message category is derived from the template, so `from`, `category`, and `media_urls` are not accepted alongside it.
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
     * Preview feature: per-segment price ceiling. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @var float|null
     */
    protected $maxPricePerSegment;
    /**
     * Preview feature: per-recipient substitution for batch sends. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @var array<string, mixed>|null
     */
    protected $personalization;
    /**
     * Preview feature: link click tracking. Defaults to `false`. Currently unavailable; setting this to `true` returns `422 SMSUnsupportedFeature`.
     *
     * @var bool|null
     */
    protected $trackClicks;
    /**
     * Recipient phone number in E.164 format (for example `+15551234567`). One recipient per message.
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * Recipient phone number in E.164 format (for example `+15551234567`). One recipient per message.
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
     * Sender to send from: an E.164 number (`+15557654321`), an alphanumeric sender ID (1-11 letters, digits, spaces, dashes, or underscores, at least one of them a letter, for example `MyBrand`), or a short code (5-6 digits). A numeric sender must be a number your workspace owns; an alphanumeric sender is accepted where the destination country permits one. Required on a free-text send: omitting it returns a `422` `SMSNoEligibleSender`. Not accepted alongside `template`, which selects its sender automatically.
     * 
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * Sender to send from: an E.164 number (`+15557654321`), an alphanumeric sender ID (1-11 letters, digits, spaces, dashes, or underscores, at least one of them a letter, for example `MyBrand`), or a short code (5-6 digits). A numeric sender must be a number your workspace owns; an alphanumeric sender is accepted where the destination country permits one. Required on a free-text send: omitting it returns a `422` `SMSNoEligibleSender`. Not accepted alongside `template`, which selects its sender automatically.
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
     * Free-text message body. Required unless `template` is supplied (the two are mutually exclusive). At least 1 character, up to a 12-segment cap (roughly 1836 GSM-7 or 804 UCS-2 characters). Bird does not truncate; a body exceeding 12 segments is rejected with a 422. The limit is on segment count, not characters, because GSM-7 and UCS-2 encodings differ in characters per segment.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * Free-text message body. Required unless `template` is supplied (the two are mutually exclusive). At least 1 character, up to a 12-segment cap (roughly 1836 GSM-7 or 804 UCS-2 characters). Bird does not truncate; a body exceeding 12 segments is rejected with a 422. The limit is on segment count, not characters, because GSM-7 and UCS-2 encodings differ in characters per segment.
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
     * Content classification. Tells Bird and carriers why you're sending; per-country compliance rules (opt-out policy, quiet hours) key on it as they roll out. Required on a free-text send; omit it on a template send, where the category is derived from the template.
     * 
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Content classification. Tells Bird and carriers why you're sending; per-country compliance rules (opt-out policy, quiet hours) key on it as they roll out. Required on a free-text send; omit it on a template send, where the category is derived from the template.
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
     * Preview feature: how long, in seconds (60-172800), Bird keeps trying to deliver before the message transitions to `expired`. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     * 
     *
     * @return int|null
     */
    public function getValidityPeriod(): ?int
    {
        return $this->validityPeriod;
    }
    /**
     * Preview feature: how long, in seconds (60-172800), Bird keeps trying to deliver before the message transitions to `expired`. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
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
     * Preview feature: sender selection from a messaging profile pool. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @return string|null
     */
    public function getMessagingProfileId(): ?string
    {
        return $this->messagingProfileId;
    }
    /**
     * Preview feature: sender selection from a messaging profile pool. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
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
     * Send using a stored template instead of free text. Mutually exclusive with `text`; the message category is derived from the template, so `from`, `category`, and `media_urls` are not accepted alongside it.
     * 
     *
     * @return SMSMessageSendRequestTemplate|null
     */
    public function getTemplate(): ?SMSMessageSendRequestTemplate
    {
        return $this->template;
    }
    /**
     * Send using a stored template instead of free text. Mutually exclusive with `text`; the message category is derived from the template, so `from`, `category`, and `media_urls` are not accepted alongside it.
     *
     * @param SMSMessageSendRequestTemplate|null $template
     *
     * @return self
     */
    public function setTemplate(?SMSMessageSendRequestTemplate $template): self
    {
        $this->initialized['template'] = true;
        $this->template = $template;
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
     * Preview feature: per-segment price ceiling. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @return float|null
     */
    public function getMaxPricePerSegment(): ?float
    {
        return $this->maxPricePerSegment;
    }
    /**
     * Preview feature: per-segment price ceiling. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @param float|null $maxPricePerSegment
     *
     * @return self
     */
    public function setMaxPricePerSegment(?float $maxPricePerSegment): self
    {
        $this->initialized['maxPricePerSegment'] = true;
        $this->maxPricePerSegment = $maxPricePerSegment;
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
    /**
     * Preview feature: link click tracking. Defaults to `false`. Currently unavailable; setting this to `true` returns `422 SMSUnsupportedFeature`.
     *
     * @return bool|null
     */
    public function getTrackClicks(): ?bool
    {
        return $this->trackClicks;
    }
    /**
     * Preview feature: link click tracking. Defaults to `false`. Currently unavailable; setting this to `true` returns `422 SMSUnsupportedFeature`.
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
}
