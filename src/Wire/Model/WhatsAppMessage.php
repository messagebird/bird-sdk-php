<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessage
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
     * Whether the message was sent by the business (`outbound`) or received from the contact (`inbound`).
     *
     * @var string|null
     */
    protected $direction;
    /**
     * Sender of the message. On outbound messages, the business number it was sent from; on inbound, the WhatsApp contact.
     *
     * @var WhatsAppMessageFrom|null
     */
    protected $from;
    /**
     * Recipient of the message. On outbound messages, the WhatsApp contact; on inbound, the business number.
     *
     * @var WhatsAppMessageTo|null
     */
    protected $to;
    /**
     * The template the message was sent from. For authentication templates the filled-in values are not returned.
     *
     * @var WhatsAppMessageTemplate|null
     */
    protected $template;
    /**
     * Text the message carried.
     *
     * @var WhatsAppMessageText|null
     */
    protected $text;
    /**
     * Image the message carried.
     *
     * @var WhatsAppMessageImage|null
     */
    protected $image;
    /**
     * Video the message carried.
     *
     * @var WhatsAppMessageVideo|null
     */
    protected $video;
    /**
     * Audio the message carried.
     *
     * @var WhatsAppMessageAudio|null
     */
    protected $audio;
    /**
     * Sticker the message carried.
     *
     * @var WhatsAppMessageSticker|null
     */
    protected $sticker;
    /**
     * Document the message carried.
     *
     * @var WhatsAppMessageDocument|null
     */
    protected $document;
    /**
     * Location the message carried.
     *
     * @var WhatsAppMessageLocation|null
     */
    protected $location;
    /**
     * Contact cards the contact shared, either by tapping a button that asked for their number or by sending a card from their address book. Inbound only: sending a contact card is not supported.
     * 
     *
     * @var list<WhatsAppContactCard>|null
     */
    protected $contactCards;
    /**
     * Set when the contact sent content we do not model, naming the WhatsApp content type so the message is not silently empty. Inbound only.
     * 
     *
     * @var WhatsAppMessageUnsupported|null
     */
    protected $unsupported;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * Failure detail for a message that could not be delivered or was rejected.
     *
     * @var WhatsAppError|null
     */
    protected $lastError;
    /**
     * When the message was accepted for delivery.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the message was handed to the WhatsApp network. Null until then.
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
     * When the message was read by the recipient. Null until then.
     *
     * @var \DateTime|null
     */
    protected $readAt;
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
     * Arbitrary JSON metadata stored on the message.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
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
     * Whether the message was sent by the business (`outbound`) or received from the contact (`inbound`).
     *
     * @return string|null
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }
    /**
     * Whether the message was sent by the business (`outbound`) or received from the contact (`inbound`).
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
     * Sender of the message. On outbound messages, the business number it was sent from; on inbound, the WhatsApp contact.
     *
     * @return WhatsAppMessageFrom|null
     */
    public function getFrom(): ?WhatsAppMessageFrom
    {
        return $this->from;
    }
    /**
     * Sender of the message. On outbound messages, the business number it was sent from; on inbound, the WhatsApp contact.
     *
     * @param WhatsAppMessageFrom|null $from
     *
     * @return self
     */
    public function setFrom(?WhatsAppMessageFrom $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * Recipient of the message. On outbound messages, the WhatsApp contact; on inbound, the business number.
     *
     * @return WhatsAppMessageTo|null
     */
    public function getTo(): ?WhatsAppMessageTo
    {
        return $this->to;
    }
    /**
     * Recipient of the message. On outbound messages, the WhatsApp contact; on inbound, the business number.
     *
     * @param WhatsAppMessageTo|null $to
     *
     * @return self
     */
    public function setTo(?WhatsAppMessageTo $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * The template the message was sent from. For authentication templates the filled-in values are not returned.
     *
     * @return WhatsAppMessageTemplate|null
     */
    public function getTemplate(): ?WhatsAppMessageTemplate
    {
        return $this->template;
    }
    /**
     * The template the message was sent from. For authentication templates the filled-in values are not returned.
     *
     * @param WhatsAppMessageTemplate|null $template
     *
     * @return self
     */
    public function setTemplate(?WhatsAppMessageTemplate $template): self
    {
        $this->initialized['template'] = true;
        $this->template = $template;
        return $this;
    }
    /**
     * Text the message carried.
     *
     * @return WhatsAppMessageText|null
     */
    public function getText(): ?WhatsAppMessageText
    {
        return $this->text;
    }
    /**
     * Text the message carried.
     *
     * @param WhatsAppMessageText|null $text
     *
     * @return self
     */
    public function setText(?WhatsAppMessageText $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
    /**
     * Image the message carried.
     *
     * @return WhatsAppMessageImage|null
     */
    public function getImage(): ?WhatsAppMessageImage
    {
        return $this->image;
    }
    /**
     * Image the message carried.
     *
     * @param WhatsAppMessageImage|null $image
     *
     * @return self
     */
    public function setImage(?WhatsAppMessageImage $image): self
    {
        $this->initialized['image'] = true;
        $this->image = $image;
        return $this;
    }
    /**
     * Video the message carried.
     *
     * @return WhatsAppMessageVideo|null
     */
    public function getVideo(): ?WhatsAppMessageVideo
    {
        return $this->video;
    }
    /**
     * Video the message carried.
     *
     * @param WhatsAppMessageVideo|null $video
     *
     * @return self
     */
    public function setVideo(?WhatsAppMessageVideo $video): self
    {
        $this->initialized['video'] = true;
        $this->video = $video;
        return $this;
    }
    /**
     * Audio the message carried.
     *
     * @return WhatsAppMessageAudio|null
     */
    public function getAudio(): ?WhatsAppMessageAudio
    {
        return $this->audio;
    }
    /**
     * Audio the message carried.
     *
     * @param WhatsAppMessageAudio|null $audio
     *
     * @return self
     */
    public function setAudio(?WhatsAppMessageAudio $audio): self
    {
        $this->initialized['audio'] = true;
        $this->audio = $audio;
        return $this;
    }
    /**
     * Sticker the message carried.
     *
     * @return WhatsAppMessageSticker|null
     */
    public function getSticker(): ?WhatsAppMessageSticker
    {
        return $this->sticker;
    }
    /**
     * Sticker the message carried.
     *
     * @param WhatsAppMessageSticker|null $sticker
     *
     * @return self
     */
    public function setSticker(?WhatsAppMessageSticker $sticker): self
    {
        $this->initialized['sticker'] = true;
        $this->sticker = $sticker;
        return $this;
    }
    /**
     * Document the message carried.
     *
     * @return WhatsAppMessageDocument|null
     */
    public function getDocument(): ?WhatsAppMessageDocument
    {
        return $this->document;
    }
    /**
     * Document the message carried.
     *
     * @param WhatsAppMessageDocument|null $document
     *
     * @return self
     */
    public function setDocument(?WhatsAppMessageDocument $document): self
    {
        $this->initialized['document'] = true;
        $this->document = $document;
        return $this;
    }
    /**
     * Location the message carried.
     *
     * @return WhatsAppMessageLocation|null
     */
    public function getLocation(): ?WhatsAppMessageLocation
    {
        return $this->location;
    }
    /**
     * Location the message carried.
     *
     * @param WhatsAppMessageLocation|null $location
     *
     * @return self
     */
    public function setLocation(?WhatsAppMessageLocation $location): self
    {
        $this->initialized['location'] = true;
        $this->location = $location;
        return $this;
    }
    /**
     * Contact cards the contact shared, either by tapping a button that asked for their number or by sending a card from their address book. Inbound only: sending a contact card is not supported.
     * 
     *
     * @return list<WhatsAppContactCard>|null
     */
    public function getContactCards(): ?array
    {
        return $this->contactCards;
    }
    /**
     * Contact cards the contact shared, either by tapping a button that asked for their number or by sending a card from their address book. Inbound only: sending a contact card is not supported.
     *
     * @param list<WhatsAppContactCard>|null $contactCards
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
     * Set when the contact sent content we do not model, naming the WhatsApp content type so the message is not silently empty. Inbound only.
     * 
     *
     * @return WhatsAppMessageUnsupported|null
     */
    public function getUnsupported(): ?WhatsAppMessageUnsupported
    {
        return $this->unsupported;
    }
    /**
     * Set when the contact sent content we do not model, naming the WhatsApp content type so the message is not silently empty. Inbound only.
     *
     * @param WhatsAppMessageUnsupported|null $unsupported
     *
     * @return self
     */
    public function setUnsupported(?WhatsAppMessageUnsupported $unsupported): self
    {
        $this->initialized['unsupported'] = true;
        $this->unsupported = $unsupported;
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
     * Failure detail for a message that could not be delivered or was rejected.
     *
     * @return WhatsAppError|null
     */
    public function getLastError(): ?WhatsAppError
    {
        return $this->lastError;
    }
    /**
     * Failure detail for a message that could not be delivered or was rejected.
     *
     * @param WhatsAppError|null $lastError
     *
     * @return self
     */
    public function setLastError(?WhatsAppError $lastError): self
    {
        $this->initialized['lastError'] = true;
        $this->lastError = $lastError;
        return $this;
    }
    /**
     * When the message was accepted for delivery.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the message was accepted for delivery.
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
     * When the message was handed to the WhatsApp network. Null until then.
     *
     * @return \DateTime|null
     */
    public function getSentAt(): ?\DateTime
    {
        return $this->sentAt;
    }
    /**
     * When the message was handed to the WhatsApp network. Null until then.
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
    /**
     * When the message was read by the recipient. Null until then.
     *
     * @return \DateTime|null
     */
    public function getReadAt(): ?\DateTime
    {
        return $this->readAt;
    }
    /**
     * When the message was read by the recipient. Null until then.
     *
     * @param \DateTime|null $readAt
     *
     * @return self
     */
    public function setReadAt(?\DateTime $readAt): self
    {
        $this->initialized['readAt'] = true;
        $this->readAt = $readAt;
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
     * Arbitrary JSON metadata stored on the message.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Arbitrary JSON metadata stored on the message.
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
