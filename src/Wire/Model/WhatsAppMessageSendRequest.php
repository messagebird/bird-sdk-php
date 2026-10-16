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
     * The recipient: a phone number in E.164 format (for example `+14155550100`), a business-scoped user ID (for example `US.13491208655302741918`) for a WhatsApp user whose number you do not have, or a WhatsApp group ID (for example `wag_01krdgeqcxet5s7t44vh8rt9mg`). One-time-passcode templates need a phone number. Bird tracks the customer service window per identity and business number, so reply to the identity a contact's message came from, from the number it reached.
     * 
     *
     * @var string|null
     */
    protected $to;
    /**
     * The business phone number to send from, in E.164 format: a connected number this workspace owns, on the same WhatsApp Business Account as an authored template. Omit it for a Bird-managed template or a group send, which use their own number; every other send requires it.
     * 
     *
     * @var string|null
     */
    protected $from;
    /**
     * The template to send, the only content deliverable outside the customer service window. A group takes only templates your workspace authored, outside the authentication category.
     * 
     *
     * @var WhatsAppMessageSendRequestTemplate|null
     */
    protected $template;
    /**
     * Free-form text. Deliverable only inside an open customer service window.
     *
     * @var WhatsAppMessageSendRequestText|null
     */
    protected $text;
    /**
     * A free-form image. Deliverable only inside an open customer service window.
     *
     * @var WhatsAppMessageSendRequestImage|null
     */
    protected $image;
    /**
     * A free-form video. Deliverable only inside an open customer service window.
     *
     * @var WhatsAppMessageSendRequestVideo|null
     */
    protected $video;
    /**
     * Free-form audio. Deliverable only inside an open customer service window.
     *
     * @var WhatsAppMessageSendRequestAudio|null
     */
    protected $audio;
    /**
     * A free-form sticker. Deliverable only inside an open customer service window.
     *
     * @var WhatsAppMessageSendRequestSticker|null
     */
    protected $sticker;
    /**
     * A free-form document. Deliverable only inside an open customer service window.
     *
     * @var WhatsAppMessageSendRequestDocument|null
     */
    protected $document;
    /**
     * A free-form location. Deliverable only inside an open customer service window.
     *
     * @var WhatsAppMessageSendRequestLocation|null
     */
    protected $location;
    /**
     * Free-form interactive content: reply buttons, a list menu, a link button, media cards, or a request for the recipient's location or contact details. Deliverable only inside an open customer service window, and never to a group.
     * 
     *
     * @var WhatsAppMessageSendRequestInteractive|null
     */
    protected $interactive;
    /**
     * Up to five contact cards, each `name` carrying `formatted_name` plus at least one other part. Deliverable only inside an open customer service window.
     * 
     *
     * @var list<WhatsAppContactCardSend>|null
     */
    protected $contactCards;
    /**
     * An earlier message to quote above this one: one from the same conversation, between this `to` and `from`, in the last 15 days.
     * 
     *
     * @var string|null
     */
    protected $inReplyToMessageId;
    /**
     * Structured `{name, value}` labels for filtering. Tags become first-class query dimensions: filter the list endpoint by tag name. Maximum 20 tags per send. Use tags for low-cardinality dimensions (`category`, `experiment_variant`). For arbitrary structured context you do not need as a filter dimension, use `metadata` instead.
     * 
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Arbitrary JSON object stored on the message and returned on API reads. Maximum 2 KB serialized. Use metadata for per-send context like internal IDs and foreign keys. For low-cardinality filterable labels, use `tags` instead.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * The recipient: a phone number in E.164 format (for example `+14155550100`), a business-scoped user ID (for example `US.13491208655302741918`) for a WhatsApp user whose number you do not have, or a WhatsApp group ID (for example `wag_01krdgeqcxet5s7t44vh8rt9mg`). One-time-passcode templates need a phone number. Bird tracks the customer service window per identity and business number, so reply to the identity a contact's message came from, from the number it reached.
     * 
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * The recipient: a phone number in E.164 format (for example `+14155550100`), a business-scoped user ID (for example `US.13491208655302741918`) for a WhatsApp user whose number you do not have, or a WhatsApp group ID (for example `wag_01krdgeqcxet5s7t44vh8rt9mg`). One-time-passcode templates need a phone number. Bird tracks the customer service window per identity and business number, so reply to the identity a contact's message came from, from the number it reached.
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
     * The business phone number to send from, in E.164 format: a connected number this workspace owns, on the same WhatsApp Business Account as an authored template. Omit it for a Bird-managed template or a group send, which use their own number; every other send requires it.
     * 
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * The business phone number to send from, in E.164 format: a connected number this workspace owns, on the same WhatsApp Business Account as an authored template. Omit it for a Bird-managed template or a group send, which use their own number; every other send requires it.
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
     * The template to send, the only content deliverable outside the customer service window. A group takes only templates your workspace authored, outside the authentication category.
     * 
     *
     * @return WhatsAppMessageSendRequestTemplate|null
     */
    public function getTemplate(): ?WhatsAppMessageSendRequestTemplate
    {
        return $this->template;
    }
    /**
     * The template to send, the only content deliverable outside the customer service window. A group takes only templates your workspace authored, outside the authentication category.
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
     * Free-form text. Deliverable only inside an open customer service window.
     *
     * @return WhatsAppMessageSendRequestText|null
     */
    public function getText(): ?WhatsAppMessageSendRequestText
    {
        return $this->text;
    }
    /**
     * Free-form text. Deliverable only inside an open customer service window.
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
     * A free-form image. Deliverable only inside an open customer service window.
     *
     * @return WhatsAppMessageSendRequestImage|null
     */
    public function getImage(): ?WhatsAppMessageSendRequestImage
    {
        return $this->image;
    }
    /**
     * A free-form image. Deliverable only inside an open customer service window.
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
     * A free-form video. Deliverable only inside an open customer service window.
     *
     * @return WhatsAppMessageSendRequestVideo|null
     */
    public function getVideo(): ?WhatsAppMessageSendRequestVideo
    {
        return $this->video;
    }
    /**
     * A free-form video. Deliverable only inside an open customer service window.
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
     * Free-form audio. Deliverable only inside an open customer service window.
     *
     * @return WhatsAppMessageSendRequestAudio|null
     */
    public function getAudio(): ?WhatsAppMessageSendRequestAudio
    {
        return $this->audio;
    }
    /**
     * Free-form audio. Deliverable only inside an open customer service window.
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
     * A free-form sticker. Deliverable only inside an open customer service window.
     *
     * @return WhatsAppMessageSendRequestSticker|null
     */
    public function getSticker(): ?WhatsAppMessageSendRequestSticker
    {
        return $this->sticker;
    }
    /**
     * A free-form sticker. Deliverable only inside an open customer service window.
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
     * A free-form document. Deliverable only inside an open customer service window.
     *
     * @return WhatsAppMessageSendRequestDocument|null
     */
    public function getDocument(): ?WhatsAppMessageSendRequestDocument
    {
        return $this->document;
    }
    /**
     * A free-form document. Deliverable only inside an open customer service window.
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
     * A free-form location. Deliverable only inside an open customer service window.
     *
     * @return WhatsAppMessageSendRequestLocation|null
     */
    public function getLocation(): ?WhatsAppMessageSendRequestLocation
    {
        return $this->location;
    }
    /**
     * A free-form location. Deliverable only inside an open customer service window.
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
     * Free-form interactive content: reply buttons, a list menu, a link button, media cards, or a request for the recipient's location or contact details. Deliverable only inside an open customer service window, and never to a group.
     * 
     *
     * @return WhatsAppMessageSendRequestInteractive|null
     */
    public function getInteractive(): ?WhatsAppMessageSendRequestInteractive
    {
        return $this->interactive;
    }
    /**
     * Free-form interactive content: reply buttons, a list menu, a link button, media cards, or a request for the recipient's location or contact details. Deliverable only inside an open customer service window, and never to a group.
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
     * Up to five contact cards, each `name` carrying `formatted_name` plus at least one other part. Deliverable only inside an open customer service window.
     * 
     *
     * @return list<WhatsAppContactCardSend>|null
     */
    public function getContactCards(): ?array
    {
        return $this->contactCards;
    }
    /**
     * Up to five contact cards, each `name` carrying `formatted_name` plus at least one other part. Deliverable only inside an open customer service window.
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
     * An earlier message to quote above this one: one from the same conversation, between this `to` and `from`, in the last 15 days.
     * 
     *
     * @return string|null
     */
    public function getInReplyToMessageId(): ?string
    {
        return $this->inReplyToMessageId;
    }
    /**
     * An earlier message to quote above this one: one from the same conversation, between this `to` and `from`, in the last 15 days.
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
     * Structured `{name, value}` labels for filtering. Tags become first-class query dimensions: filter the list endpoint by tag name. Maximum 20 tags per send. Use tags for low-cardinality dimensions (`category`, `experiment_variant`). For arbitrary structured context you do not need as a filter dimension, use `metadata` instead.
     * 
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Structured `{name, value}` labels for filtering. Tags become first-class query dimensions: filter the list endpoint by tag name. Maximum 20 tags per send. Use tags for low-cardinality dimensions (`category`, `experiment_variant`). For arbitrary structured context you do not need as a filter dimension, use `metadata` instead.
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
     * Arbitrary JSON object stored on the message and returned on API reads. Maximum 2 KB serialized. Use metadata for per-send context like internal IDs and foreign keys. For low-cardinality filterable labels, use `tags` instead.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Arbitrary JSON object stored on the message and returned on API reads. Maximum 2 KB serialized. Use metadata for per-send context like internal IDs and foreign keys. For low-cardinality filterable labels, use `tags` instead.
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
}
