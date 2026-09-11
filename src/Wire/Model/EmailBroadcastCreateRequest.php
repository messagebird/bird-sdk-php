<?php

namespace MessageBird\Wire\Model;

class EmailBroadcastCreateRequest
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
     * A sender or recipient address. Accepts a plain email string (`jane@acme.com`), an RFC 5322 mailbox string with an embedded display name (`Jane Doe <jane@acme.com>`), or an object carrying the address and an optional display name. All forms can be mixed freely within one request. Responses always return the object form.
     * 
     *
     * @var mixed|null
     */
    protected $from;
    /**
     * @var string|null
     */
    protected $audienceId;
    /**
     * The template a broadcast sends, and the exact version of it the broadcast is fixed to. The template cannot be one that requires every send to name a language, because a broadcast never names one, so a template that insists on it has nothing to work with.
     * 
     *
     * @var EmailBroadcastTemplate|null
     */
    protected $template;
    /**
     * Where replies to this broadcast should go. Give each address as a plain address, as `Jane <jane@acme.com>` to include a display name, or as an object with an address and a name. You can list more than one.
     *
     * @var list<mixed>|null
     */
    protected $replyTo;
    /**
     * Custom email headers to set on the broadcast, as name and value pairs. Up to 25 of them, each value up to 998 characters. Two names are ours and cannot be set here: `List-Unsubscribe` and `List-Unsubscribe-Post` are dropped if you send them, whatever the category. We add the one-click unsubscribe pair to a marketing broadcast ourselves, and a transactional broadcast has neither header.
     * 
     *
     * @var array<string, string>|null
     */
    protected $headers;
    /**
     * Labels on this broadcast, each one a `name` and a `value`, up to 20 of them. You can filter the broadcast list by a tag, break your stats down by one, and read them back off webhook payloads. Use tags for anything you want to find broadcasts by later, and `metadata` for data you only want handed back to you.
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Any JSON you want to keep on the broadcast. We store it, hand it back when you read the broadcast, and include it in webhook payloads, and you can break stats down by a path inside it such as `metadata.order_id`. It can be up to 2 KB once serialized.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * Whether to track opens for this broadcast.
     *
     * @var bool|null
     */
    protected $trackOpens = true;
    /**
     * Whether to track link clicks for this broadcast.
     *
     * @var bool|null
     */
    protected $trackClicks = true;
    /**
     * The IP pool to send this broadcast from. Pass a pool ID, or `ipp_shared` to send through the shared pool on purpose. Leave it out and the broadcast uses your organization's default pool. A pool we do not recognize, or one with no IPs available to send from, is refused with a `422`.
     *
     * @var string|null
     */
    protected $ipPoolId;
    /**
     * What kind of email this is. A broadcast sets this itself rather than taking it from its template, and it decides two things: which suppressions apply, and whether we add an unsubscribe header.
     * 
     * `marketing`, the default, is held back from every suppressed address and has the one-click unsubscribe headers. `transactional` still goes to addresses suppressed for a complaint or an unsubscribe, and has no unsubscribe header. Only use `transactional` for genuine operational mail such as a terms-of-service update or a service outage notice. Marketing content sent this way still reaches people who have already unsubscribed from you.
     * 
     *
     * @var string|null
     */
    protected $category = 'marketing';
    /**
     * Whether to send the broadcast as soon as it is created. Set it to true and the broadcast goes out immediately, or at `scheduled_at` if you set one. Leave it false, which is the default, and you get a draft you can update and send later.
     *
     * @var bool|null
     */
    protected $send = false;
    /**
     * When to send the broadcast. It has to be at least 30 seconds and at most 365 days from now. It requires `send` to be true, so a `scheduled_at` on its own is refused rather than saved on the draft.
     * 
     *
     * @var \DateTime|null
     */
    protected $scheduledAt;
    /**
     * A sender or recipient address. Accepts a plain email string (`jane@acme.com`), an RFC 5322 mailbox string with an embedded display name (`Jane Doe <jane@acme.com>`), or an object carrying the address and an optional display name. All forms can be mixed freely within one request. Responses always return the object form.
     * 
     *
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }
    /**
     * A sender or recipient address. Accepts a plain email string (`jane@acme.com`), an RFC 5322 mailbox string with an embedded display name (`Jane Doe <jane@acme.com>`), or an object carrying the address and an optional display name. All forms can be mixed freely within one request. Responses always return the object form.
     *
     * @param mixed $from
     *
     * @return self
     */
    public function setFrom($from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getAudienceId(): ?string
    {
        return $this->audienceId;
    }
    /**
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
     * The template a broadcast sends, and the exact version of it the broadcast is fixed to. The template cannot be one that requires every send to name a language, because a broadcast never names one, so a template that insists on it has nothing to work with.
     * 
     *
     * @return EmailBroadcastTemplate|null
     */
    public function getTemplate(): ?EmailBroadcastTemplate
    {
        return $this->template;
    }
    /**
     * The template a broadcast sends, and the exact version of it the broadcast is fixed to. The template cannot be one that requires every send to name a language, because a broadcast never names one, so a template that insists on it has nothing to work with.
     *
     * @param EmailBroadcastTemplate|null $template
     *
     * @return self
     */
    public function setTemplate(?EmailBroadcastTemplate $template): self
    {
        $this->initialized['template'] = true;
        $this->template = $template;
        return $this;
    }
    /**
     * Where replies to this broadcast should go. Give each address as a plain address, as `Jane <jane@acme.com>` to include a display name, or as an object with an address and a name. You can list more than one.
     *
     * @return list<mixed>|null
     */
    public function getReplyTo(): ?array
    {
        return $this->replyTo;
    }
    /**
     * Where replies to this broadcast should go. Give each address as a plain address, as `Jane <jane@acme.com>` to include a display name, or as an object with an address and a name. You can list more than one.
     *
     * @param list<mixed>|null $replyTo
     *
     * @return self
     */
    public function setReplyTo(?array $replyTo): self
    {
        $this->initialized['replyTo'] = true;
        $this->replyTo = $replyTo;
        return $this;
    }
    /**
     * Custom email headers to set on the broadcast, as name and value pairs. Up to 25 of them, each value up to 998 characters. Two names are ours and cannot be set here: `List-Unsubscribe` and `List-Unsubscribe-Post` are dropped if you send them, whatever the category. We add the one-click unsubscribe pair to a marketing broadcast ourselves, and a transactional broadcast has neither header.
     * 
     *
     * @return array<string, string>|null
     */
    public function getHeaders(): ?iterable
    {
        return $this->headers;
    }
    /**
     * Custom email headers to set on the broadcast, as name and value pairs. Up to 25 of them, each value up to 998 characters. Two names are ours and cannot be set here: `List-Unsubscribe` and `List-Unsubscribe-Post` are dropped if you send them, whatever the category. We add the one-click unsubscribe pair to a marketing broadcast ourselves, and a transactional broadcast has neither header.
     *
     * @param array<string, string>|null $headers
     *
     * @return self
     */
    public function setHeaders(?iterable $headers): self
    {
        $this->initialized['headers'] = true;
        $this->headers = $headers;
        return $this;
    }
    /**
     * Labels on this broadcast, each one a `name` and a `value`, up to 20 of them. You can filter the broadcast list by a tag, break your stats down by one, and read them back off webhook payloads. Use tags for anything you want to find broadcasts by later, and `metadata` for data you only want handed back to you.
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Labels on this broadcast, each one a `name` and a `value`, up to 20 of them. You can filter the broadcast list by a tag, break your stats down by one, and read them back off webhook payloads. Use tags for anything you want to find broadcasts by later, and `metadata` for data you only want handed back to you.
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
     * Any JSON you want to keep on the broadcast. We store it, hand it back when you read the broadcast, and include it in webhook payloads, and you can break stats down by a path inside it such as `metadata.order_id`. It can be up to 2 KB once serialized.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Any JSON you want to keep on the broadcast. We store it, hand it back when you read the broadcast, and include it in webhook payloads, and you can break stats down by a path inside it such as `metadata.order_id`. It can be up to 2 KB once serialized.
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
     * Whether to track opens for this broadcast.
     *
     * @return bool|null
     */
    public function getTrackOpens(): ?bool
    {
        return $this->trackOpens;
    }
    /**
     * Whether to track opens for this broadcast.
     *
     * @param bool|null $trackOpens
     *
     * @return self
     */
    public function setTrackOpens(?bool $trackOpens): self
    {
        $this->initialized['trackOpens'] = true;
        $this->trackOpens = $trackOpens;
        return $this;
    }
    /**
     * Whether to track link clicks for this broadcast.
     *
     * @return bool|null
     */
    public function getTrackClicks(): ?bool
    {
        return $this->trackClicks;
    }
    /**
     * Whether to track link clicks for this broadcast.
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
    /**
     * The IP pool to send this broadcast from. Pass a pool ID, or `ipp_shared` to send through the shared pool on purpose. Leave it out and the broadcast uses your organization's default pool. A pool we do not recognize, or one with no IPs available to send from, is refused with a `422`.
     *
     * @return string|null
     */
    public function getIpPoolId(): ?string
    {
        return $this->ipPoolId;
    }
    /**
     * The IP pool to send this broadcast from. Pass a pool ID, or `ipp_shared` to send through the shared pool on purpose. Leave it out and the broadcast uses your organization's default pool. A pool we do not recognize, or one with no IPs available to send from, is refused with a `422`.
     *
     * @param string|null $ipPoolId
     *
     * @return self
     */
    public function setIpPoolId(?string $ipPoolId): self
    {
        $this->initialized['ipPoolId'] = true;
        $this->ipPoolId = $ipPoolId;
        return $this;
    }
    /**
     * What kind of email this is. A broadcast sets this itself rather than taking it from its template, and it decides two things: which suppressions apply, and whether we add an unsubscribe header.
     * 
     * `marketing`, the default, is held back from every suppressed address and has the one-click unsubscribe headers. `transactional` still goes to addresses suppressed for a complaint or an unsubscribe, and has no unsubscribe header. Only use `transactional` for genuine operational mail such as a terms-of-service update or a service outage notice. Marketing content sent this way still reaches people who have already unsubscribed from you.
     * 
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
    * What kind of email this is. A broadcast sets this itself rather than taking it from its template, and it decides two things: which suppressions apply, and whether we add an unsubscribe header.
    
    `marketing`, the default, is held back from every suppressed address and has the one-click unsubscribe headers. `transactional` still goes to addresses suppressed for a complaint or an unsubscribe, and has no unsubscribe header. Only use `transactional` for genuine operational mail such as a terms-of-service update or a service outage notice. Marketing content sent this way still reaches people who have already unsubscribed from you.
    
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
     * Whether to send the broadcast as soon as it is created. Set it to true and the broadcast goes out immediately, or at `scheduled_at` if you set one. Leave it false, which is the default, and you get a draft you can update and send later.
     *
     * @return bool|null
     */
    public function getSend(): ?bool
    {
        return $this->send;
    }
    /**
     * Whether to send the broadcast as soon as it is created. Set it to true and the broadcast goes out immediately, or at `scheduled_at` if you set one. Leave it false, which is the default, and you get a draft you can update and send later.
     *
     * @param bool|null $send
     *
     * @return self
     */
    public function setSend(?bool $send): self
    {
        $this->initialized['send'] = true;
        $this->send = $send;
        return $this;
    }
    /**
     * When to send the broadcast. It has to be at least 30 seconds and at most 365 days from now. It requires `send` to be true, so a `scheduled_at` on its own is refused rather than saved on the draft.
     * 
     *
     * @return \DateTime|null
     */
    public function getScheduledAt(): ?\DateTime
    {
        return $this->scheduledAt;
    }
    /**
     * When to send the broadcast. It has to be at least 30 seconds and at most 365 days from now. It requires `send` to be true, so a `scheduled_at` on its own is refused rather than saved on the draft.
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
}
