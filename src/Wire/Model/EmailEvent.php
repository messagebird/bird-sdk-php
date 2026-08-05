<?php

namespace MessageBird\Wire\Model;

class EmailEvent
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
     * Event ID.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Type of an event in a message's per-recipient delivery timeline. Open enum — new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
     *
     * @var string|null
     */
    protected $type;
    /**
     * When this event occurred.
     *
     * @var \DateTime|null
     */
    protected $occurredAt;
    /**
     * @var string|null
     */
    protected $recipientId;
    /**
     * Bounce classification. Present on `email.bounced`, `email.out_of_band_bounce`, and `email.deferred` events. `hard` is a permanent failure (invalid address or non-existent domain). `soft` is a transient failure (mailbox full, server temporarily unavailable). `block` indicates the receiving mail server blocked the sending IP for reputation reasons. `admin` indicates an administrative refusal (relaying denied, blocklisted domain). `undetermined` is used when the receiving server's response is ambiguous.
     * 
     *
     * @var string|null
     */
    protected $bounceType;
    /**
     * Numeric bounce classification for fine-grained deliverability triage. Lets you distinguish, for example, a DNS failure from a spam block when both would be `bounce_type: soft` or `bounce_type: block`. Present on `email.bounced`, `email.out_of_band_bounce`, and `email.deferred`.
     * 
     *
     * @var int|null
     */
    protected $bounceClass;
    /**
     * SMTP status code returned by the receiving mail server. Present on `email.bounced` and `email.deferred` events.
     * 
     *
     * @var string|null
     */
    protected $bounceCode;
    /**
     * Human-readable bounce reason. Present on `email.bounced` and `email.deferred` events.
     *
     * @var string|null
     */
    protected $bounceDescription;
    /**
     * Specific cause of rejection. Present on `email.rejected` events only. See `EmailRecipient.rejection_reason` for the meaning of each value.
     * 
     *
     * @var string|null
     */
    protected $rejectionReason;
    /**
     * The IP address Bird used to send this message. Useful when investigating deliverability issues that correlate with specific IPs. Present on `email.delivered`, `email.bounced`, `email.out_of_band_bounce`, and `email.deferred` events.
     * 
     *
     * @var string|null
     */
    protected $sendingIp;
    /**
     * True when the open was auto-fetched by an inbox privacy feature (Apple Mail Privacy Protection, Gmail image proxy) rather than a real user action. Useful for accurate open-rate calculation. Present on `email.opened` only.
     * 
     *
     * @var bool|null
     */
    protected $isPrefetched;
    /**
     * The clicked URL. Present on `email.clicked` events.
     *
     * @var string|null
     */
    protected $url;
    /**
     * ISO 3166-1 alpha-2 country code derived from the client IP. Present on `email.opened` and `email.clicked` events when available.
     *
     * @var string|null
     */
    protected $country;
    /**
     * Client IP address (IPv4 or IPv6). Present on `email.opened` and `email.clicked` events when available.
     *
     * @var string|null
     */
    protected $ipAddress;
    /**
     * Client user-agent string. Present on `email.opened` and `email.clicked` events when available.
     *
     * @var string|null
     */
    protected $userAgent;
    /**
     * Event ID.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Event ID.
     *
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
     * Type of an event in a message's per-recipient delivery timeline. Open enum — new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Type of an event in a message's per-recipient delivery timeline. Open enum — new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * When this event occurred.
     *
     * @return \DateTime|null
     */
    public function getOccurredAt(): ?\DateTime
    {
        return $this->occurredAt;
    }
    /**
     * When this event occurred.
     *
     * @param \DateTime|null $occurredAt
     *
     * @return self
     */
    public function setOccurredAt(?\DateTime $occurredAt): self
    {
        $this->initialized['occurredAt'] = true;
        $this->occurredAt = $occurredAt;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getRecipientId(): ?string
    {
        return $this->recipientId;
    }
    /**
     * @param string|null $recipientId
     *
     * @return self
     */
    public function setRecipientId(?string $recipientId): self
    {
        $this->initialized['recipientId'] = true;
        $this->recipientId = $recipientId;
        return $this;
    }
    /**
     * Bounce classification. Present on `email.bounced`, `email.out_of_band_bounce`, and `email.deferred` events. `hard` is a permanent failure (invalid address or non-existent domain). `soft` is a transient failure (mailbox full, server temporarily unavailable). `block` indicates the receiving mail server blocked the sending IP for reputation reasons. `admin` indicates an administrative refusal (relaying denied, blocklisted domain). `undetermined` is used when the receiving server's response is ambiguous.
     * 
     *
     * @return string|null
     */
    public function getBounceType(): ?string
    {
        return $this->bounceType;
    }
    /**
     * Bounce classification. Present on `email.bounced`, `email.out_of_band_bounce`, and `email.deferred` events. `hard` is a permanent failure (invalid address or non-existent domain). `soft` is a transient failure (mailbox full, server temporarily unavailable). `block` indicates the receiving mail server blocked the sending IP for reputation reasons. `admin` indicates an administrative refusal (relaying denied, blocklisted domain). `undetermined` is used when the receiving server's response is ambiguous.
     *
     * @param string|null $bounceType
     *
     * @return self
     */
    public function setBounceType(?string $bounceType): self
    {
        $this->initialized['bounceType'] = true;
        $this->bounceType = $bounceType;
        return $this;
    }
    /**
     * Numeric bounce classification for fine-grained deliverability triage. Lets you distinguish, for example, a DNS failure from a spam block when both would be `bounce_type: soft` or `bounce_type: block`. Present on `email.bounced`, `email.out_of_band_bounce`, and `email.deferred`.
     * 
     *
     * @return int|null
     */
    public function getBounceClass(): ?int
    {
        return $this->bounceClass;
    }
    /**
     * Numeric bounce classification for fine-grained deliverability triage. Lets you distinguish, for example, a DNS failure from a spam block when both would be `bounce_type: soft` or `bounce_type: block`. Present on `email.bounced`, `email.out_of_band_bounce`, and `email.deferred`.
     *
     * @param int|null $bounceClass
     *
     * @return self
     */
    public function setBounceClass(?int $bounceClass): self
    {
        $this->initialized['bounceClass'] = true;
        $this->bounceClass = $bounceClass;
        return $this;
    }
    /**
     * SMTP status code returned by the receiving mail server. Present on `email.bounced` and `email.deferred` events.
     * 
     *
     * @return string|null
     */
    public function getBounceCode(): ?string
    {
        return $this->bounceCode;
    }
    /**
     * SMTP status code returned by the receiving mail server. Present on `email.bounced` and `email.deferred` events.
     *
     * @param string|null $bounceCode
     *
     * @return self
     */
    public function setBounceCode(?string $bounceCode): self
    {
        $this->initialized['bounceCode'] = true;
        $this->bounceCode = $bounceCode;
        return $this;
    }
    /**
     * Human-readable bounce reason. Present on `email.bounced` and `email.deferred` events.
     *
     * @return string|null
     */
    public function getBounceDescription(): ?string
    {
        return $this->bounceDescription;
    }
    /**
     * Human-readable bounce reason. Present on `email.bounced` and `email.deferred` events.
     *
     * @param string|null $bounceDescription
     *
     * @return self
     */
    public function setBounceDescription(?string $bounceDescription): self
    {
        $this->initialized['bounceDescription'] = true;
        $this->bounceDescription = $bounceDescription;
        return $this;
    }
    /**
     * Specific cause of rejection. Present on `email.rejected` events only. See `EmailRecipient.rejection_reason` for the meaning of each value.
     * 
     *
     * @return string|null
     */
    public function getRejectionReason(): ?string
    {
        return $this->rejectionReason;
    }
    /**
     * Specific cause of rejection. Present on `email.rejected` events only. See `EmailRecipient.rejection_reason` for the meaning of each value.
     *
     * @param string|null $rejectionReason
     *
     * @return self
     */
    public function setRejectionReason(?string $rejectionReason): self
    {
        $this->initialized['rejectionReason'] = true;
        $this->rejectionReason = $rejectionReason;
        return $this;
    }
    /**
     * The IP address Bird used to send this message. Useful when investigating deliverability issues that correlate with specific IPs. Present on `email.delivered`, `email.bounced`, `email.out_of_band_bounce`, and `email.deferred` events.
     * 
     *
     * @return string|null
     */
    public function getSendingIp(): ?string
    {
        return $this->sendingIp;
    }
    /**
     * The IP address Bird used to send this message. Useful when investigating deliverability issues that correlate with specific IPs. Present on `email.delivered`, `email.bounced`, `email.out_of_band_bounce`, and `email.deferred` events.
     *
     * @param string|null $sendingIp
     *
     * @return self
     */
    public function setSendingIp(?string $sendingIp): self
    {
        $this->initialized['sendingIp'] = true;
        $this->sendingIp = $sendingIp;
        return $this;
    }
    /**
     * True when the open was auto-fetched by an inbox privacy feature (Apple Mail Privacy Protection, Gmail image proxy) rather than a real user action. Useful for accurate open-rate calculation. Present on `email.opened` only.
     * 
     *
     * @return bool|null
     */
    public function getIsPrefetched(): ?bool
    {
        return $this->isPrefetched;
    }
    /**
     * True when the open was auto-fetched by an inbox privacy feature (Apple Mail Privacy Protection, Gmail image proxy) rather than a real user action. Useful for accurate open-rate calculation. Present on `email.opened` only.
     *
     * @param bool|null $isPrefetched
     *
     * @return self
     */
    public function setIsPrefetched(?bool $isPrefetched): self
    {
        $this->initialized['isPrefetched'] = true;
        $this->isPrefetched = $isPrefetched;
        return $this;
    }
    /**
     * The clicked URL. Present on `email.clicked` events.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * The clicked URL. Present on `email.clicked` events.
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
    /**
     * ISO 3166-1 alpha-2 country code derived from the client IP. Present on `email.opened` and `email.clicked` events when available.
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }
    /**
     * ISO 3166-1 alpha-2 country code derived from the client IP. Present on `email.opened` and `email.clicked` events when available.
     *
     * @param string|null $country
     *
     * @return self
     */
    public function setCountry(?string $country): self
    {
        $this->initialized['country'] = true;
        $this->country = $country;
        return $this;
    }
    /**
     * Client IP address (IPv4 or IPv6). Present on `email.opened` and `email.clicked` events when available.
     *
     * @return string|null
     */
    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }
    /**
     * Client IP address (IPv4 or IPv6). Present on `email.opened` and `email.clicked` events when available.
     *
     * @param string|null $ipAddress
     *
     * @return self
     */
    public function setIpAddress(?string $ipAddress): self
    {
        $this->initialized['ipAddress'] = true;
        $this->ipAddress = $ipAddress;
        return $this;
    }
    /**
     * Client user-agent string. Present on `email.opened` and `email.clicked` events when available.
     *
     * @return string|null
     */
    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }
    /**
     * Client user-agent string. Present on `email.opened` and `email.clicked` events when available.
     *
     * @param string|null $userAgent
     *
     * @return self
     */
    public function setUserAgent(?string $userAgent): self
    {
        $this->initialized['userAgent'] = true;
        $this->userAgent = $userAgent;
        return $this;
    }
}
