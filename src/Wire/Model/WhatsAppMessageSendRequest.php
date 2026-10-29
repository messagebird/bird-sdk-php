<?php

namespace MessageBird\Wire\Model;

/**
 * A WhatsApp message to send, carrying exactly one kind of content.
 */
class WhatsAppMessageSendRequest
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
     * Recipient E.164 number, business-scoped user ID (BSUID, such as `US.13491208655302741918`), or group ID (such as `wag_01krdgeqcxet5s7t44vh8rt9mg`). OTP templates require a phone number. For replies, use the inbound sender identity and receiving business number.
     *
     * @var string|null
     */
    protected $to;
    /**
     * Connected E.164 number owned by this workspace; for authored templates, use the same WhatsApp Business Account. Omit for Bird-managed templates and groups; required otherwise.
     *
     * @var string|null
     */
    protected $from;
    /**
     * Required outside the customer service window. Groups accept workspace-authored, non-authentication templates only.
     *
     * @var WhatsAppMessageSendRequestTemplate|null
     */
    protected $template;
    /**
     * Free-form text; requires an open customer service window.
     *
     * @var WhatsAppMessageSendRequestText|null
     */
    protected $text;
    /**
     * Free-form image; requires an open customer service window.
     *
     * @var WhatsAppMessageSendRequestImage|null
     */
    protected $image;
    /**
     * Free-form video; requires an open customer service window.
     *
     * @var WhatsAppMessageSendRequestVideo|null
     */
    protected $video;
    /**
     * Free-form audio; requires an open customer service window.
     *
     * @var WhatsAppMessageSendRequestAudio|null
     */
    protected $audio;
    /**
     * Free-form sticker; requires an open customer service window.
     *
     * @var WhatsAppMessageSendRequestSticker|null
     */
    protected $sticker;
    /**
     * Free-form document; requires an open customer service window.
     *
     * @var WhatsAppMessageSendRequestDocument|null
     */
    protected $document;
    /**
     * Free-form location; requires an open customer service window.
     *
     * @var WhatsAppMessageSendRequestLocation|null
     */
    protected $location;
    /**
     * Reply buttons, a list, a link button, media cards, or a location/contact request. Requires an open customer service window; unsupported for groups.
     *
     * @var WhatsAppMessageSendRequestInteractive|null
     */
    protected $interactive;
    /**
     * Up to five cards. Each name needs `formatted_name` and another name part. Requires an open customer service window.
     *
     * @var list<WhatsAppContactCardSend>|null
     */
    protected $contactCards;
    /**
     * Message to quote, from this conversation (`to` and `from`) within the last 15 days.
     *
     * @var string|null
     */
    protected $inReplyToMessageId;
    /**
     * Up to 20 `{name, value}` labels, filterable by name. Use for low-cardinality dimensions such as category; put other context in `metadata`.
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Per-message JSON context, such as internal IDs, returned on reads. Maximum 2 KB serialized. Use `tags` for filterable labels.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * Identifier matched exactly by the message list's `reference` filter; returned on reads and webhooks. May be shared by multiple messages. Put non-searchable context in `metadata`.
     *
     * @var string|null
     */
    protected $reference;
    /**
     * Recipient E.164 number, business-scoped user ID (BSUID, such as `US.13491208655302741918`), or group ID (such as `wag_01krdgeqcxet5s7t44vh8rt9mg`). OTP templates require a phone number. For replies, use the inbound sender identity and receiving business number.
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * Recipient E.164 number, business-scoped user ID (BSUID, such as `US.13491208655302741918`), or group ID (such as `wag_01krdgeqcxet5s7t44vh8rt9mg`). OTP templates require a phone number. For replies, use the inbound sender identity and receiving business number.
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
     * Connected E.164 number owned by this workspace; for authored templates, use the same WhatsApp Business Account. Omit for Bird-managed templates and groups; required otherwise.
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * Connected E.164 number owned by this workspace; for authored templates, use the same WhatsApp Business Account. Omit for Bird-managed templates and groups; required otherwise.
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
     * Required outside the customer service window. Groups accept workspace-authored, non-authentication templates only.
     *
     * @return WhatsAppMessageSendRequestTemplate|null
     */
    public function getTemplate(): ?WhatsAppMessageSendRequestTemplate
    {
        return $this->template;
    }
    /**
     * Required outside the customer service window. Groups accept workspace-authored, non-authentication templates only.
     *
     * @param WhatsAppMessageSendRequestTemplate|WhatsAppTemplateSend|array|null $template
     *
     * @return self
     */
    public function setTemplate($template): self
    {
        $this->initialized['template'] = true;
        $this->template = \MessageBird\Core\ModelWrapper::normalize($template, WhatsAppMessageSendRequestTemplate::class);
        return $this;
    }
    /**
     * Free-form text; requires an open customer service window.
     *
     * @return WhatsAppMessageSendRequestText|null
     */
    public function getText(): ?WhatsAppMessageSendRequestText
    {
        return $this->text;
    }
    /**
     * Free-form text; requires an open customer service window.
     *
     * @param WhatsAppMessageSendRequestText|WhatsAppTextSend|array|null $text
     *
     * @return self
     */
    public function setText($text): self
    {
        $this->initialized['text'] = true;
        $this->text = \MessageBird\Core\ModelWrapper::normalize($text, WhatsAppMessageSendRequestText::class);
        return $this;
    }
    /**
     * Free-form image; requires an open customer service window.
     *
     * @return WhatsAppMessageSendRequestImage|null
     */
    public function getImage(): ?WhatsAppMessageSendRequestImage
    {
        return $this->image;
    }
    /**
     * Free-form image; requires an open customer service window.
     *
     * @param WhatsAppMessageSendRequestImage|WhatsAppImageSend|array|null $image
     *
     * @return self
     */
    public function setImage($image): self
    {
        $this->initialized['image'] = true;
        $this->image = \MessageBird\Core\ModelWrapper::normalize($image, WhatsAppMessageSendRequestImage::class);
        return $this;
    }
    /**
     * Free-form video; requires an open customer service window.
     *
     * @return WhatsAppMessageSendRequestVideo|null
     */
    public function getVideo(): ?WhatsAppMessageSendRequestVideo
    {
        return $this->video;
    }
    /**
     * Free-form video; requires an open customer service window.
     *
     * @param WhatsAppMessageSendRequestVideo|WhatsAppVideoSend|array|null $video
     *
     * @return self
     */
    public function setVideo($video): self
    {
        $this->initialized['video'] = true;
        $this->video = \MessageBird\Core\ModelWrapper::normalize($video, WhatsAppMessageSendRequestVideo::class);
        return $this;
    }
    /**
     * Free-form audio; requires an open customer service window.
     *
     * @return WhatsAppMessageSendRequestAudio|null
     */
    public function getAudio(): ?WhatsAppMessageSendRequestAudio
    {
        return $this->audio;
    }
    /**
     * Free-form audio; requires an open customer service window.
     *
     * @param WhatsAppMessageSendRequestAudio|WhatsAppAudioSend|array|null $audio
     *
     * @return self
     */
    public function setAudio($audio): self
    {
        $this->initialized['audio'] = true;
        $this->audio = \MessageBird\Core\ModelWrapper::normalize($audio, WhatsAppMessageSendRequestAudio::class);
        return $this;
    }
    /**
     * Free-form sticker; requires an open customer service window.
     *
     * @return WhatsAppMessageSendRequestSticker|null
     */
    public function getSticker(): ?WhatsAppMessageSendRequestSticker
    {
        return $this->sticker;
    }
    /**
     * Free-form sticker; requires an open customer service window.
     *
     * @param WhatsAppMessageSendRequestSticker|WhatsAppStickerSend|array|null $sticker
     *
     * @return self
     */
    public function setSticker($sticker): self
    {
        $this->initialized['sticker'] = true;
        $this->sticker = \MessageBird\Core\ModelWrapper::normalize($sticker, WhatsAppMessageSendRequestSticker::class);
        return $this;
    }
    /**
     * Free-form document; requires an open customer service window.
     *
     * @return WhatsAppMessageSendRequestDocument|null
     */
    public function getDocument(): ?WhatsAppMessageSendRequestDocument
    {
        return $this->document;
    }
    /**
     * Free-form document; requires an open customer service window.
     *
     * @param WhatsAppMessageSendRequestDocument|WhatsAppDocumentSend|array|null $document
     *
     * @return self
     */
    public function setDocument($document): self
    {
        $this->initialized['document'] = true;
        $this->document = \MessageBird\Core\ModelWrapper::normalize($document, WhatsAppMessageSendRequestDocument::class);
        return $this;
    }
    /**
     * Free-form location; requires an open customer service window.
     *
     * @return WhatsAppMessageSendRequestLocation|null
     */
    public function getLocation(): ?WhatsAppMessageSendRequestLocation
    {
        return $this->location;
    }
    /**
     * Free-form location; requires an open customer service window.
     *
     * @param WhatsAppMessageSendRequestLocation|WhatsAppLocationSend|array|null $location
     *
     * @return self
     */
    public function setLocation($location): self
    {
        $this->initialized['location'] = true;
        $this->location = \MessageBird\Core\ModelWrapper::normalize($location, WhatsAppMessageSendRequestLocation::class);
        return $this;
    }
    /**
     * Reply buttons, a list, a link button, media cards, or a location/contact request. Requires an open customer service window; unsupported for groups.
     *
     * @return WhatsAppMessageSendRequestInteractive|null
     */
    public function getInteractive(): ?WhatsAppMessageSendRequestInteractive
    {
        return $this->interactive;
    }
    /**
     * Reply buttons, a list, a link button, media cards, or a location/contact request. Requires an open customer service window; unsupported for groups.
     *
     * @param WhatsAppMessageSendRequestInteractive|WhatsAppInteractiveSend|array|null $interactive
     *
     * @return self
     */
    public function setInteractive($interactive): self
    {
        $this->initialized['interactive'] = true;
        $this->interactive = \MessageBird\Core\ModelWrapper::normalize($interactive, WhatsAppMessageSendRequestInteractive::class);
        return $this;
    }
    /**
     * Up to five cards. Each name needs `formatted_name` and another name part. Requires an open customer service window.
     *
     * @return list<WhatsAppContactCardSend>|null
     */
    public function getContactCards(): ?array
    {
        return $this->contactCards;
    }
    /**
     * Up to five cards. Each name needs `formatted_name` and another name part. Requires an open customer service window.
     *
     * @param list<WhatsAppContactCardSend>|null $contactCards
     *
     * @return self
     */
    public function setContactCards(?array $contactCards): self
    {
        $this->initialized['contactCards'] = true;
        $this->contactCards = $contactCards;
        return $this;
    }
    /**
     * Message to quote, from this conversation (`to` and `from`) within the last 15 days.
     *
     * @return string|null
     */
    public function getInReplyToMessageId(): ?string
    {
        return $this->inReplyToMessageId;
    }
    /**
     * Message to quote, from this conversation (`to` and `from`) within the last 15 days.
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
     * Up to 20 `{name, value}` labels, filterable by name. Use for low-cardinality dimensions such as category; put other context in `metadata`.
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Up to 20 `{name, value}` labels, filterable by name. Use for low-cardinality dimensions such as category; put other context in `metadata`.
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
     * Per-message JSON context, such as internal IDs, returned on reads. Maximum 2 KB serialized. Use `tags` for filterable labels.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Per-message JSON context, such as internal IDs, returned on reads. Maximum 2 KB serialized. Use `tags` for filterable labels.
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
     * Identifier matched exactly by the message list's `reference` filter; returned on reads and webhooks. May be shared by multiple messages. Put non-searchable context in `metadata`.
     *
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }
    /**
     * Identifier matched exactly by the message list's `reference` filter; returned on reads and webhooks. May be shared by multiple messages. Put non-searchable context in `metadata`.
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
}
