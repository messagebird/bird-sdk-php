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
     * Recipient phone number in E.164 format.
     *
     * @var string|null
     */
    protected $to;
    /**
     * Sender the message was sent from: an E.164 number, an alphanumeric sender ID, or a short code.
     *
     * @var string|null
     */
    protected $from;
    /**
     * The message body as sent. For a template send, this is the rendered text after parameter substitution. When `category` is `authentication` (a message carrying a one-time code), this is `**REDACTED**`: the code still reaches the recipient, Bird just does not persist it for later reads.
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
     * Cost of the message. Null until the message has been priced; the cost is populated as the message is processed, not at the moment it is accepted.
     *
     * @var SMSCost|null
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
     * How long, in seconds, Bird keeps trying to deliver before the message transitions to `expired`.
     *
     * @var int|null
     */
    protected $validityPeriod;
    /**
     * Carrier that handled the message, when known. Populated once a delivery receipt identifies it.
     *
     * @var string|null
     */
    protected $carrier;
    /**
     * Mobile country code and mobile network code of the carrier, when known.
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
     * Recipient phone number in E.164 format.
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * Recipient phone number in E.164 format.
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
     * Sender the message was sent from: an E.164 number, an alphanumeric sender ID, or a short code.
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * Sender the message was sent from: an E.164 number, an alphanumeric sender ID, or a short code.
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
     * The message body as sent. For a template send, this is the rendered text after parameter substitution. When `category` is `authentication` (a message carrying a one-time code), this is `**REDACTED**`: the code still reaches the recipient, Bird just does not persist it for later reads.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The message body as sent. For a template send, this is the rendered text after parameter substitution. When `category` is `authentication` (a message carrying a one-time code), this is `**REDACTED**`: the code still reaches the recipient, Bird just does not persist it for later reads.
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
     * Cost of the message. Null until the message has been priced; the cost is populated as the message is processed, not at the moment it is accepted.
     *
     * @return SMSCost|null
     */
    public function getCost(): ?SMSCost
    {
        return $this->cost;
    }
    /**
     * Cost of the message. Null until the message has been priced; the cost is populated as the message is processed, not at the moment it is accepted.
     *
     * @param SMSCost|null $cost
     *
     * @return self
     */
    public function setCost(?SMSCost $cost): self
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
     * How long, in seconds, Bird keeps trying to deliver before the message transitions to `expired`.
     *
     * @return int|null
     */
    public function getValidityPeriod(): ?int
    {
        return $this->validityPeriod;
    }
    /**
     * How long, in seconds, Bird keeps trying to deliver before the message transitions to `expired`.
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
     * Carrier that handled the message, when known. Populated once a delivery receipt identifies it.
     *
     * @return string|null
     */
    public function getCarrier(): ?string
    {
        return $this->carrier;
    }
    /**
     * Carrier that handled the message, when known. Populated once a delivery receipt identifies it.
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
     * Mobile country code and mobile network code of the carrier, when known.
     *
     * @return string|null
     */
    public function getMccMnc(): ?string
    {
        return $this->mccMnc;
    }
    /**
     * Mobile country code and mobile network code of the carrier, when known.
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
