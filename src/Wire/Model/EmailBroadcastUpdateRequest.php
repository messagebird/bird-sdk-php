<?php

namespace MessageBird\Wire\Model;

class EmailBroadcastUpdateRequest
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
     * The template the broadcast sends. Its published version is fixed when the broadcast is prepared for sending. Set this to null to take the template off a draft, or leave it out to keep the one already set.
     *
     * @var EmailBroadcastUpdateRequestTemplate|null
     */
    protected $template;
    /**
     * Where replies to this broadcast should go. Set this to null to remove the addresses already set.
     *
     * @var list<mixed>|null
     */
    protected $replyTo;
    /**
     * Custom email headers to set on the broadcast, as name and value pairs. What you send replaces the headers the draft already had rather than adding to them. Up to 25 of them, each value up to 998 characters. Two names are ours and cannot be set here: `List-Unsubscribe` and `List-Unsubscribe-Post` are dropped if you send them, whatever the category. We add the one-click unsubscribe pair to a marketing broadcast ourselves, and a transactional broadcast has neither header.
     * 
     *
     * @var array<string, string>|null
     */
    protected $headers;
    /**
     * Labels on this broadcast, each one a `name` and a `value`, that you can filter and search broadcasts by. What you send replaces the tags the draft already had rather than adding to them.
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Any JSON you want to keep on the broadcast, up to 2 KB once serialized. What you send replaces the metadata the draft already had rather than merging into it.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * Whether to track opens for this broadcast.
     *
     * @var bool|null
     */
    protected $trackOpens;
    /**
     * Whether to track link clicks for this broadcast.
     *
     * @var bool|null
     */
    protected $trackClicks;
    /**
     * The IP pool to send this broadcast from. Pass a pool ID, or `ipp_shared` to send through the shared pool on purpose. Set it to null to fall back to your organization's default pool.
     *
     * @var string|null
     */
    protected $ipPoolId;
    /**
     * What kind of email this is. It decides two things: which suppressions apply, and whether we add an unsubscribe header.
     * 
     * `marketing` is held back from every suppressed address and has the one-click unsubscribe headers. `transactional` still goes to addresses suppressed for a complaint or an unsubscribe, and has no unsubscribe header. Only use `transactional` for genuine operational mail such as a terms-of-service update or a service outage notice. Marketing content sent this way reaches people who have already unsubscribed from you.
     * 
     *
     * @var string|null
     */
    protected $category;
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
     * The template the broadcast sends. Its published version is fixed when the broadcast is prepared for sending. Set this to null to take the template off a draft, or leave it out to keep the one already set.
     *
     * @return EmailBroadcastUpdateRequestTemplate|null
     */
    public function getTemplate(): ?EmailBroadcastUpdateRequestTemplate
    {
        return $this->template;
    }
    /**
     * The template the broadcast sends. Its published version is fixed when the broadcast is prepared for sending. Set this to null to take the template off a draft, or leave it out to keep the one already set.
     *
     * @param EmailBroadcastUpdateRequestTemplate|null $template
     *
     * @return self
     */
    public function setTemplate(?EmailBroadcastUpdateRequestTemplate $template): self
    {
        $this->initialized['template'] = true;
        $this->template = $template;
        return $this;
    }
    /**
     * Where replies to this broadcast should go. Set this to null to remove the addresses already set.
     *
     * @return list<mixed>|null
     */
    public function getReplyTo(): ?array
    {
        return $this->replyTo;
    }
    /**
     * Where replies to this broadcast should go. Set this to null to remove the addresses already set.
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
     * Custom email headers to set on the broadcast, as name and value pairs. What you send replaces the headers the draft already had rather than adding to them. Up to 25 of them, each value up to 998 characters. Two names are ours and cannot be set here: `List-Unsubscribe` and `List-Unsubscribe-Post` are dropped if you send them, whatever the category. We add the one-click unsubscribe pair to a marketing broadcast ourselves, and a transactional broadcast has neither header.
     * 
     *
     * @return array<string, string>|null
     */
    public function getHeaders(): ?iterable
    {
        return $this->headers;
    }
    /**
     * Custom email headers to set on the broadcast, as name and value pairs. What you send replaces the headers the draft already had rather than adding to them. Up to 25 of them, each value up to 998 characters. Two names are ours and cannot be set here: `List-Unsubscribe` and `List-Unsubscribe-Post` are dropped if you send them, whatever the category. We add the one-click unsubscribe pair to a marketing broadcast ourselves, and a transactional broadcast has neither header.
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
     * Labels on this broadcast, each one a `name` and a `value`, that you can filter and search broadcasts by. What you send replaces the tags the draft already had rather than adding to them.
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Labels on this broadcast, each one a `name` and a `value`, that you can filter and search broadcasts by. What you send replaces the tags the draft already had rather than adding to them.
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
     * Any JSON you want to keep on the broadcast, up to 2 KB once serialized. What you send replaces the metadata the draft already had rather than merging into it.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Any JSON you want to keep on the broadcast, up to 2 KB once serialized. What you send replaces the metadata the draft already had rather than merging into it.
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
     * The IP pool to send this broadcast from. Pass a pool ID, or `ipp_shared` to send through the shared pool on purpose. Set it to null to fall back to your organization's default pool.
     *
     * @return string|null
     */
    public function getIpPoolId(): ?string
    {
        return $this->ipPoolId;
    }
    /**
     * The IP pool to send this broadcast from. Pass a pool ID, or `ipp_shared` to send through the shared pool on purpose. Set it to null to fall back to your organization's default pool.
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
     * What kind of email this is. It decides two things: which suppressions apply, and whether we add an unsubscribe header.
     * 
     * `marketing` is held back from every suppressed address and has the one-click unsubscribe headers. `transactional` still goes to addresses suppressed for a complaint or an unsubscribe, and has no unsubscribe header. Only use `transactional` for genuine operational mail such as a terms-of-service update or a service outage notice. Marketing content sent this way reaches people who have already unsubscribed from you.
     * 
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
    * What kind of email this is. It decides two things: which suppressions apply, and whether we add an unsubscribe header.
    
    `marketing` is held back from every suppressed address and has the one-click unsubscribe headers. `transactional` still goes to addresses suppressed for a complaint or an unsubscribe, and has no unsubscribe header. Only use `transactional` for genuine operational mail such as a terms-of-service update or a service outage notice. Marketing content sent this way reaches people who have already unsubscribed from you.
    
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
}
