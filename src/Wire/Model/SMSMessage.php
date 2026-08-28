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
     * The message body. Every message carries body text, attachments, or both, so this is absent only on a received message that carried attachments and no text. For a template send, this is the rendered text after parameter substitution. When `category` is `authentication` (a message carrying a one-time code), this is `**REDACTED**`: the code still reaches the recipient, but the API does not retain it for later reads.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * Content classification supplied on the send. Null for inbound messages.
     *
     * @var string|null
     */
    protected $category;
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
     * Preview feature: how long, in seconds, the carrier may keep attempting delivery before the message is marked `expired`. Not returned yet.
     *
     * @var int|null
     */
    protected $validityPeriod;
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
     * The message body. Every message carries body text, attachments, or both, so this is absent only on a received message that carried attachments and no text. For a template send, this is the rendered text after parameter substitution. When `category` is `authentication` (a message carrying a one-time code), this is `**REDACTED**`: the code still reaches the recipient, but the API does not retain it for later reads.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The message body. Every message carries body text, attachments, or both, so this is absent only on a received message that carried attachments and no text. For a template send, this is the rendered text after parameter substitution. When `category` is `authentication` (a message carrying a one-time code), this is `**REDACTED**`: the code still reaches the recipient, but the API does not retain it for later reads.
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
     * Content classification supplied on the send. Null for inbound messages.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Content classification supplied on the send. Null for inbound messages.
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
     * @param SMSMessageOptions|null $options
     *
     * @return self
     */
    public function setOptions(?SMSMessageOptions $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;
        return $this;
    }
    /**
     * Preview feature: how long, in seconds, the carrier may keep attempting delivery before the message is marked `expired`. Not returned yet.
     *
     * @return int|null
     */
    public function getValidityPeriod(): ?int
    {
        return $this->validityPeriod;
    }
    /**
     * Preview feature: how long, in seconds, the carrier may keep attempting delivery before the message is marked `expired`. Not returned yet.
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
