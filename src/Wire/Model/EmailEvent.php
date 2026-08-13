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
     * Type of an event in a message's per-recipient delivery timeline.
     * 
     * - `email.scheduled`: We accepted a send scheduled for a future time. Fires once per message, not per recipient.
     * - `email.accepted`: We accepted the send and are getting ready to deliver it. Fires once per requested recipient.
     * - `email.processed`: We queued the message for delivery to the recipient's mail server.
     * - `email.deferred`: The recipient's mail server temporarily refused the message, and delivery will be retried. Can fire more than once per recipient.
     * - `email.delivered`: The recipient's mail server accepted the message.
     * - `email.bounced`: Delivery permanently failed at the recipient's mail server.
     * - `email.out_of_band_bounce`: A bounce notification arrived after the message had already been accepted for delivery.
     * - `email.rejected`: We rejected the message before attempting delivery, for example because the recipient is suppressed.
     * - `email.canceled`: A scheduled send was canceled before it fired. Fires once per message, not per recipient.
     * - `email.opened`: The recipient opened the message. Can fire more than once per recipient.
     * - `email.clicked`: The recipient clicked a tracked link in the message. Can fire more than once per recipient.
     * - `email.unsubscribed`: The recipient opted out through a tracked unsubscribe link in the message.
     * - `email.list_unsubscribed`: The recipient opted out through the one-click unsubscribe control in their mail client.
     * - `email.complained`: The recipient reported the message as spam through their mailbox provider.
     * 
     * We can add new event types to this list over time, so treat a value you do not recognize as a new type rather than as an error.
     * 
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
     * A more detailed numeric bounce code, useful for telling apart failures that share the same `bounce_type`. For example, a DNS failure and a spam block can both come through as `bounce_type: soft` or `bounce_type: block`; this field tells you which one actually happened. Present on `email.bounced`, `email.out_of_band_bounce`, and `email.deferred` events.
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
     * The bounce reason, in plain language, as reported by the mail server. Present on `email.bounced` and `email.deferred` events.
     *
     * @var string|null
     */
    protected $bounceDescription;
    /**
     * Specific cause of rejection. Present on `email.rejected` events only.
     * 
     * - `recipient_suppressed`: The recipient is on the workspace suppression list.
     * - `transmission_failed`: The message could not be transmitted for delivery.
     * - `generation_failure`: The message could not be built for delivery, because of a template or content issue.
     * - `policy_rejection`: The message was refused by sending policy.
     * - `domain_unverified`: The sending domain was not verified.
     * - `quota_exceeded`: The organization's send quota was reached.
     * - `recipient_not_allowed`: This recipient was not allowed for this send. For a send from the shared onboarding domain, every recipient has to be a verified member of the workspace.
     * 
     *
     * @var string|null
     */
    protected $rejectionReason;
    /**
     * The IP address used to send this message. Useful for spotting a deliverability problem that is tied to one specific sending IP rather than affecting all of them. Present on `email.delivered`, `email.bounced`, `email.out_of_band_bounce`, and `email.deferred` events.
     * 
     *
     * @var string|null
     */
    protected $sendingIp;
    /**
     * True when the open was auto-fetched by an inbox privacy feature (Apple Mail Privacy Protection, the Gmail image proxy) rather than a person actually opening the message. Use it to calculate open rate accurately. Present on `email.opened` events only.
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
     * Type of an event in a message's per-recipient delivery timeline.
     * 
     * - `email.scheduled`: We accepted a send scheduled for a future time. Fires once per message, not per recipient.
     * - `email.accepted`: We accepted the send and are getting ready to deliver it. Fires once per requested recipient.
     * - `email.processed`: We queued the message for delivery to the recipient's mail server.
     * - `email.deferred`: The recipient's mail server temporarily refused the message, and delivery will be retried. Can fire more than once per recipient.
     * - `email.delivered`: The recipient's mail server accepted the message.
     * - `email.bounced`: Delivery permanently failed at the recipient's mail server.
     * - `email.out_of_band_bounce`: A bounce notification arrived after the message had already been accepted for delivery.
     * - `email.rejected`: We rejected the message before attempting delivery, for example because the recipient is suppressed.
     * - `email.canceled`: A scheduled send was canceled before it fired. Fires once per message, not per recipient.
     * - `email.opened`: The recipient opened the message. Can fire more than once per recipient.
     * - `email.clicked`: The recipient clicked a tracked link in the message. Can fire more than once per recipient.
     * - `email.unsubscribed`: The recipient opted out through a tracked unsubscribe link in the message.
     * - `email.list_unsubscribed`: The recipient opted out through the one-click unsubscribe control in their mail client.
     * - `email.complained`: The recipient reported the message as spam through their mailbox provider.
     * 
     * We can add new event types to this list over time, so treat a value you do not recognize as a new type rather than as an error.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
    * Type of an event in a message's per-recipient delivery timeline.
    
    - `email.scheduled`: We accepted a send scheduled for a future time. Fires once per message, not per recipient.
    - `email.accepted`: We accepted the send and are getting ready to deliver it. Fires once per requested recipient.
    - `email.processed`: We queued the message for delivery to the recipient's mail server.
    - `email.deferred`: The recipient's mail server temporarily refused the message, and delivery will be retried. Can fire more than once per recipient.
    - `email.delivered`: The recipient's mail server accepted the message.
    - `email.bounced`: Delivery permanently failed at the recipient's mail server.
    - `email.out_of_band_bounce`: A bounce notification arrived after the message had already been accepted for delivery.
    - `email.rejected`: We rejected the message before attempting delivery, for example because the recipient is suppressed.
    - `email.canceled`: A scheduled send was canceled before it fired. Fires once per message, not per recipient.
    - `email.opened`: The recipient opened the message. Can fire more than once per recipient.
    - `email.clicked`: The recipient clicked a tracked link in the message. Can fire more than once per recipient.
    - `email.unsubscribed`: The recipient opted out through a tracked unsubscribe link in the message.
    - `email.list_unsubscribed`: The recipient opted out through the one-click unsubscribe control in their mail client.
    - `email.complained`: The recipient reported the message as spam through their mailbox provider.
    
    We can add new event types to this list over time, so treat a value you do not recognize as a new type rather than as an error.
    
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
     * A more detailed numeric bounce code, useful for telling apart failures that share the same `bounce_type`. For example, a DNS failure and a spam block can both come through as `bounce_type: soft` or `bounce_type: block`; this field tells you which one actually happened. Present on `email.bounced`, `email.out_of_band_bounce`, and `email.deferred` events.
     * 
     *
     * @return int|null
     */
    public function getBounceClass(): ?int
    {
        return $this->bounceClass;
    }
    /**
     * A more detailed numeric bounce code, useful for telling apart failures that share the same `bounce_type`. For example, a DNS failure and a spam block can both come through as `bounce_type: soft` or `bounce_type: block`; this field tells you which one actually happened. Present on `email.bounced`, `email.out_of_band_bounce`, and `email.deferred` events.
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
     * The bounce reason, in plain language, as reported by the mail server. Present on `email.bounced` and `email.deferred` events.
     *
     * @return string|null
     */
    public function getBounceDescription(): ?string
    {
        return $this->bounceDescription;
    }
    /**
     * The bounce reason, in plain language, as reported by the mail server. Present on `email.bounced` and `email.deferred` events.
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
     * Specific cause of rejection. Present on `email.rejected` events only.
     * 
     * - `recipient_suppressed`: The recipient is on the workspace suppression list.
     * - `transmission_failed`: The message could not be transmitted for delivery.
     * - `generation_failure`: The message could not be built for delivery, because of a template or content issue.
     * - `policy_rejection`: The message was refused by sending policy.
     * - `domain_unverified`: The sending domain was not verified.
     * - `quota_exceeded`: The organization's send quota was reached.
     * - `recipient_not_allowed`: This recipient was not allowed for this send. For a send from the shared onboarding domain, every recipient has to be a verified member of the workspace.
     * 
     *
     * @return string|null
     */
    public function getRejectionReason(): ?string
    {
        return $this->rejectionReason;
    }
    /**
    * Specific cause of rejection. Present on `email.rejected` events only.
    
    - `recipient_suppressed`: The recipient is on the workspace suppression list.
    - `transmission_failed`: The message could not be transmitted for delivery.
    - `generation_failure`: The message could not be built for delivery, because of a template or content issue.
    - `policy_rejection`: The message was refused by sending policy.
    - `domain_unverified`: The sending domain was not verified.
    - `quota_exceeded`: The organization's send quota was reached.
    - `recipient_not_allowed`: This recipient was not allowed for this send. For a send from the shared onboarding domain, every recipient has to be a verified member of the workspace.
    
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
     * The IP address used to send this message. Useful for spotting a deliverability problem that is tied to one specific sending IP rather than affecting all of them. Present on `email.delivered`, `email.bounced`, `email.out_of_band_bounce`, and `email.deferred` events.
     * 
     *
     * @return string|null
     */
    public function getSendingIp(): ?string
    {
        return $this->sendingIp;
    }
    /**
     * The IP address used to send this message. Useful for spotting a deliverability problem that is tied to one specific sending IP rather than affecting all of them. Present on `email.delivered`, `email.bounced`, `email.out_of_band_bounce`, and `email.deferred` events.
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
     * True when the open was auto-fetched by an inbox privacy feature (Apple Mail Privacy Protection, the Gmail image proxy) rather than a person actually opening the message. Use it to calculate open rate accurately. Present on `email.opened` events only.
     * 
     *
     * @return bool|null
     */
    public function getIsPrefetched(): ?bool
    {
        return $this->isPrefetched;
    }
    /**
     * True when the open was auto-fetched by an inbox privacy feature (Apple Mail Privacy Protection, the Gmail image proxy) rather than a person actually opening the message. Use it to calculate open rate accurately. Present on `email.opened` events only.
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
