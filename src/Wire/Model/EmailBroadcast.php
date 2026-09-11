<?php

namespace MessageBird\Wire\Model;

class EmailBroadcast
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
     * Broadcast ID.
     *
     * @var string|null
     */
    protected $id;
    /**
     * An email address with an optional display name.
     *
     * @var EmailAddress|null
     */
    protected $from;
    /**
     * @var string|null
     */
    protected $audienceId;
    /**
     * The template this broadcast sends. A broadcast sends the template's published version, and the exact version is fixed when the broadcast is prepared for sending, so publishing a new version afterwards does not change what this broadcast sends. Null on a draft that has not chosen a template yet.
     *
     * @var EmailBroadcastTemplate|null
     */
    protected $template;
    /**
     * Size of the HTML body this broadcast sends, in bytes, or 0 when its content has no HTML part. Measured on the template version the broadcast sends, so this is the real body we send and differs per recipient only by that recipient's own merge values. Returned on a single broadcast read, and absent from the list and from the broadcast that creating, updating, sending or canceling one returns, none of which measure the content. Absent too when the broadcast has no template or its content can no longer be read.
     * 
     *
     * @var int|null
     */
    protected $htmlBytes;
    /**
     * Size of the plain-text body this broadcast sends, in bytes, or 0 when its content has no plain-text part. Measured, and absent, the same way as `html_bytes`.
     * 
     *
     * @var int|null
     */
    protected $textBytes;
    /**
     * What kind of email this is, which decides how suppressions apply to it. A `marketing` broadcast is held back from every suppressed address. A `transactional` one still goes to addresses suppressed for a complaint or an unsubscribe, because those suppressions are about marketing mail.
     *
     * @var string|null
     */
    protected $category;
    /**
     * The IP pool this broadcast sends from, or `ipp_shared` when it sends through the shared pool. Absent when it sends on your organization's default pool.
     *
     * @var string|null
     */
    protected $ipPoolId;
    /**
     * Where replies to this broadcast go, if you want them somewhere other than the `from` address. Absent when you have not set one.
     *
     * @var list<EmailAddress>|null
     */
    protected $replyTo;
    /**
     * Any custom email headers set on the broadcast. Returned on a single broadcast read and on the broadcast that creating, updating, sending or canceling one returns, and absent from the list. The unsubscribe headers we add ourselves are not included.
     *
     * @var array<string, string>|null
     */
    protected $headers;
    /**
     * Where the broadcast itself has got to, separate from what happened to individual recipients: for that, read `sent_count`, `delivered_count`, `bounced_count` and `complained_count` below. When it is `failed`, `failure_reason` says why.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * What to do next about this broadcast, given the state it is in. Each entry names one action and
     * says why it is worth taking. Present on reads that compute it: an empty list means there is
     * nothing to do, and the field is absent entirely on responses that do not report next actions.
     * 
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * Why the broadcast failed. Set when `status` is `failed`, and `null` the rest of the time.
     * 
     * - `empty_audience`: There was nobody to send to. Either the audience has no members, or every address in it is suppressed.
     * - `audience_unavailable`: The audience no longer exists, so there was nothing to resolve.
     * - `content_invalid`: The broadcast could not be set up to send. `failure_detail` says exactly what was wrong. It is one of these:
     *   - The broadcast has no template, or its template has been deleted.
     *   - The template has no published version, or no sendable content.
     *   - The template uses a loop that a broadcast cannot fill.
     *   - The template requires every send to name a language.
     *   - The sending domain is no longer verified.
     *   - The IP pool has nothing to send from.
     *   - The message could not be handed off for delivery.
     * - `insufficient_funds`: There was not enough in the workspace balance to pay for the send.
     * - `quota_exceeded`: The send would have gone past your organization's daily or monthly email allowance, whichever runs out first. This can happen when the broadcast is being prepared, or partway through sending if the remaining recipients no longer fit. `failure_detail` gives you the count and the limit.
     * - `internal_error`: Something went wrong on our side. Retry, and open a support ticket if it keeps happening.
     * 
     *
     * @var string|null
     */
    protected $failureReason;
    /**
     * A sentence explaining the failure in more detail than `failure_reason` does, and `null` when the broadcast has not failed. Show it to the person using your app. Do not write code that reads it, because the wording can change. Branch on `failure_reason` instead.
     *
     * @var string|null
     */
    protected $failureDetail;
    /**
     * Number of recipients after suppressed addresses are removed from the audience. This is 0 until sending starts and the audience becomes a recipient list.
     *
     * @var int|null
     */
    protected $recipientCount = 0;
    /**
     * How many recipients the broadcast has been sent to, counting every recipient whose status is `processed` or later. The number rises while the broadcast is `sending` and stops changing once the broadcast has finished. These counters are exact. The email stats endpoints report on the same sending but are approximate, so use these numbers when you need the precise count. Absent when the broadcast comes back from creating, updating, sending or canceling it, none of which read the counters. Absent from a list row for a broadcast that has no delivery events yet, such as a draft, where reading that one broadcast answers 0 instead. Absent too when the event store cannot be reached, which still returns 200. Read the broadcast again for the numbers.
     *
     * @var int|null
     */
    protected $sentCount;
    /**
     * How many recipients' messages were accepted by their mail server. Absent when `sent_count` is.
     *
     * @var int|null
     */
    protected $deliveredCount;
    /**
     * How many recipients the message could not be delivered to at all. Absent when `sent_count` is.
     *
     * @var int|null
     */
    protected $bouncedCount;
    /**
     * How many recipients marked the message as spam. Absent when `sent_count` is.
     *
     * @var int|null
     */
    protected $complainedCount;
    /**
     * How many times the message was opened, added up across every recipient. One recipient opening it twice counts twice. Absent when `sent_count` is.
     *
     * @var int|null
     */
    protected $openCount;
    /**
     * How many times a link in the message was clicked, added up across every recipient. One recipient clicking twice counts twice. Absent when `sent_count` is.
     *
     * @var int|null
     */
    protected $clickCount;
    /**
     * The IP addresses this broadcast's messages went out from, up to 100 of them. A broadcast is spread across every address in its pool, so more than one can appear. The receiving mail systems name the address when they deliver, bounce or defer a message, so this stays absent until the first of those comes back. Returned on a single broadcast read, and absent from the list and from the broadcast that creating, updating, sending or canceling one returns, none of which read them. For delivery and latency broken down per address, read the sending-IP stats.
     * 
     *
     * @var list<string>|null
     */
    protected $sendingIps;
    /**
     * How many distinct recipients opened the message at least once, excluding opens auto-fetched by inbox privacy features (such as Apple Mail Privacy Protection and the Gmail image proxy). A recipient who opened several times, or whose inbox prefetched the message, counts once. Absent when `sent_count` is.
     *
     * @var int|null
     */
    protected $uniqueOpensNonPrefetched;
    /**
     * How many distinct recipients clicked a link in the message at least once. A recipient who clicked several times counts once. Absent when `sent_count` is.
     *
     * @var int|null
     */
    protected $uniqueClicks;
    /**
     * How many recipients bounced after the message had already been accepted for delivery. A recipient who bounced this way more than once counts once. Absent when `sent_count` is.
     *
     * @var int|null
     */
    protected $outOfBandBounces;
    /**
     * How many distinct recipients a delivery landed for. This is the denominator to measure `unique_opens_non_prefetched`, `unique_clicks` and `complained_count` against. It differs from `delivered_count`, which reports how many recipients are currently in the delivered state: a recipient who was delivered to and then complained moves to `complained_count` and leaves `delivered_count`, but stays here, because the message did reach them. Absent when `sent_count` is.
     *
     * @var int|null
     */
    protected $deliveredRecipients;
    /**
     * Labels on this broadcast, each one a `name` and a `value`, that you can filter and search broadcasts by. Use tags for anything you want to find broadcasts by later, and `metadata` for data you only want handed back to you.
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Any JSON you want to keep on the broadcast. We store it and hand it back in webhook payloads, and that is all it does. If you want to search or filter by it, use `tags` instead.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * Whether opens are tracked for this broadcast.
     *
     * @var bool|null
     */
    protected $trackOpens;
    /**
     * Whether link clicks are tracked for this broadcast.
     *
     * @var bool|null
     */
    protected $trackClicks;
    /**
     * When the broadcast was created.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the broadcast is due to send, and absent when it is not scheduled.
     *
     * @var \DateTime|null
     */
    protected $scheduledAt;
    /**
     * When the broadcast started sending. Absent until then. Compare with `sent_at`, which is when the broadcast finished sending.
     *
     * @var \DateTime|null
     */
    protected $startedAt;
    /**
     * When the last recipient was sent to and the broadcast became `sent`. Null until then. Compare with `started_at`, which is when the broadcast started sending.
     *
     * @var \DateTime|null
     */
    protected $sentAt;
    /**
     * When the broadcast was canceled, and absent if it never was. This is when cancellation was requested, so it is set as soon as the status is `canceling` and does not move while the remaining sends stop and the status becomes `canceled`.
     *
     * @var \DateTime|null
     */
    protected $canceledAt;
    /**
     * Broadcast ID.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Broadcast ID.
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
     * An email address with an optional display name.
     *
     * @return EmailAddress|null
     */
    public function getFrom(): ?EmailAddress
    {
        return $this->from;
    }
    /**
     * An email address with an optional display name.
     *
     * @param EmailAddress|null $from
     *
     * @return self
     */
    public function setFrom(?EmailAddress $from): self
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
     * The template this broadcast sends. A broadcast sends the template's published version, and the exact version is fixed when the broadcast is prepared for sending, so publishing a new version afterwards does not change what this broadcast sends. Null on a draft that has not chosen a template yet.
     *
     * @return EmailBroadcastTemplate|null
     */
    public function getTemplate(): ?EmailBroadcastTemplate
    {
        return $this->template;
    }
    /**
     * The template this broadcast sends. A broadcast sends the template's published version, and the exact version is fixed when the broadcast is prepared for sending, so publishing a new version afterwards does not change what this broadcast sends. Null on a draft that has not chosen a template yet.
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
     * Size of the HTML body this broadcast sends, in bytes, or 0 when its content has no HTML part. Measured on the template version the broadcast sends, so this is the real body we send and differs per recipient only by that recipient's own merge values. Returned on a single broadcast read, and absent from the list and from the broadcast that creating, updating, sending or canceling one returns, none of which measure the content. Absent too when the broadcast has no template or its content can no longer be read.
     * 
     *
     * @return int|null
     */
    public function getHtmlBytes(): ?int
    {
        return $this->htmlBytes;
    }
    /**
     * Size of the HTML body this broadcast sends, in bytes, or 0 when its content has no HTML part. Measured on the template version the broadcast sends, so this is the real body we send and differs per recipient only by that recipient's own merge values. Returned on a single broadcast read, and absent from the list and from the broadcast that creating, updating, sending or canceling one returns, none of which measure the content. Absent too when the broadcast has no template or its content can no longer be read.
     *
     * @param int|null $htmlBytes
     *
     * @return self
     */
    public function setHtmlBytes(?int $htmlBytes): self
    {
        $this->initialized['htmlBytes'] = true;
        $this->htmlBytes = $htmlBytes;
        return $this;
    }
    /**
     * Size of the plain-text body this broadcast sends, in bytes, or 0 when its content has no plain-text part. Measured, and absent, the same way as `html_bytes`.
     * 
     *
     * @return int|null
     */
    public function getTextBytes(): ?int
    {
        return $this->textBytes;
    }
    /**
     * Size of the plain-text body this broadcast sends, in bytes, or 0 when its content has no plain-text part. Measured, and absent, the same way as `html_bytes`.
     *
     * @param int|null $textBytes
     *
     * @return self
     */
    public function setTextBytes(?int $textBytes): self
    {
        $this->initialized['textBytes'] = true;
        $this->textBytes = $textBytes;
        return $this;
    }
    /**
     * What kind of email this is, which decides how suppressions apply to it. A `marketing` broadcast is held back from every suppressed address. A `transactional` one still goes to addresses suppressed for a complaint or an unsubscribe, because those suppressions are about marketing mail.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * What kind of email this is, which decides how suppressions apply to it. A `marketing` broadcast is held back from every suppressed address. A `transactional` one still goes to addresses suppressed for a complaint or an unsubscribe, because those suppressions are about marketing mail.
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
     * The IP pool this broadcast sends from, or `ipp_shared` when it sends through the shared pool. Absent when it sends on your organization's default pool.
     *
     * @return string|null
     */
    public function getIpPoolId(): ?string
    {
        return $this->ipPoolId;
    }
    /**
     * The IP pool this broadcast sends from, or `ipp_shared` when it sends through the shared pool. Absent when it sends on your organization's default pool.
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
     * Where replies to this broadcast go, if you want them somewhere other than the `from` address. Absent when you have not set one.
     *
     * @return list<EmailAddress>|null
     */
    public function getReplyTo(): ?array
    {
        return $this->replyTo;
    }
    /**
     * Where replies to this broadcast go, if you want them somewhere other than the `from` address. Absent when you have not set one.
     *
     * @param list<EmailAddress>|null $replyTo
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
     * Any custom email headers set on the broadcast. Returned on a single broadcast read and on the broadcast that creating, updating, sending or canceling one returns, and absent from the list. The unsubscribe headers we add ourselves are not included.
     *
     * @return array<string, string>|null
     */
    public function getHeaders(): ?iterable
    {
        return $this->headers;
    }
    /**
     * Any custom email headers set on the broadcast. Returned on a single broadcast read and on the broadcast that creating, updating, sending or canceling one returns, and absent from the list. The unsubscribe headers we add ourselves are not included.
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
     * Where the broadcast itself has got to, separate from what happened to individual recipients: for that, read `sent_count`, `delivered_count`, `bounced_count` and `complained_count` below. When it is `failed`, `failure_reason` says why.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Where the broadcast itself has got to, separate from what happened to individual recipients: for that, read `sent_count`, `delivered_count`, `bounced_count` and `complained_count` below. When it is `failed`, `failure_reason` says why.
     *
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
     * What to do next about this broadcast, given the state it is in. Each entry names one action and
     * says why it is worth taking. Present on reads that compute it: an empty list means there is
     * nothing to do, and the field is absent entirely on responses that do not report next actions.
     * 
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
    * What to do next about this broadcast, given the state it is in. Each entry names one action and
    says why it is worth taking. Present on reads that compute it: an empty list means there is
    nothing to do, and the field is absent entirely on responses that do not report next actions.
    
    *
    * @param list<NextAction>|null $next
    *
    * @return self
    */
    public function setNext(?array $next): self
    {
        $this->initialized['next'] = true;
        $this->next = $next;
        return $this;
    }
    /**
     * Why the broadcast failed. Set when `status` is `failed`, and `null` the rest of the time.
     * 
     * - `empty_audience`: There was nobody to send to. Either the audience has no members, or every address in it is suppressed.
     * - `audience_unavailable`: The audience no longer exists, so there was nothing to resolve.
     * - `content_invalid`: The broadcast could not be set up to send. `failure_detail` says exactly what was wrong. It is one of these:
     *   - The broadcast has no template, or its template has been deleted.
     *   - The template has no published version, or no sendable content.
     *   - The template uses a loop that a broadcast cannot fill.
     *   - The template requires every send to name a language.
     *   - The sending domain is no longer verified.
     *   - The IP pool has nothing to send from.
     *   - The message could not be handed off for delivery.
     * - `insufficient_funds`: There was not enough in the workspace balance to pay for the send.
     * - `quota_exceeded`: The send would have gone past your organization's daily or monthly email allowance, whichever runs out first. This can happen when the broadcast is being prepared, or partway through sending if the remaining recipients no longer fit. `failure_detail` gives you the count and the limit.
     * - `internal_error`: Something went wrong on our side. Retry, and open a support ticket if it keeps happening.
     * 
     *
     * @return string|null
     */
    public function getFailureReason(): ?string
    {
        return $this->failureReason;
    }
    /**
    * Why the broadcast failed. Set when `status` is `failed`, and `null` the rest of the time.
    
    - `empty_audience`: There was nobody to send to. Either the audience has no members, or every address in it is suppressed.
    - `audience_unavailable`: The audience no longer exists, so there was nothing to resolve.
    - `content_invalid`: The broadcast could not be set up to send. `failure_detail` says exactly what was wrong. It is one of these:
     - The broadcast has no template, or its template has been deleted.
     - The template has no published version, or no sendable content.
     - The template uses a loop that a broadcast cannot fill.
     - The template requires every send to name a language.
     - The sending domain is no longer verified.
     - The IP pool has nothing to send from.
     - The message could not be handed off for delivery.
    - `insufficient_funds`: There was not enough in the workspace balance to pay for the send.
    - `quota_exceeded`: The send would have gone past your organization's daily or monthly email allowance, whichever runs out first. This can happen when the broadcast is being prepared, or partway through sending if the remaining recipients no longer fit. `failure_detail` gives you the count and the limit.
    - `internal_error`: Something went wrong on our side. Retry, and open a support ticket if it keeps happening.
    
    *
    * @param string|null $failureReason
    *
    * @return self
    */
    public function setFailureReason(?string $failureReason): self
    {
        $this->initialized['failureReason'] = true;
        $this->failureReason = $failureReason;
        return $this;
    }
    /**
     * A sentence explaining the failure in more detail than `failure_reason` does, and `null` when the broadcast has not failed. Show it to the person using your app. Do not write code that reads it, because the wording can change. Branch on `failure_reason` instead.
     *
     * @return string|null
     */
    public function getFailureDetail(): ?string
    {
        return $this->failureDetail;
    }
    /**
     * A sentence explaining the failure in more detail than `failure_reason` does, and `null` when the broadcast has not failed. Show it to the person using your app. Do not write code that reads it, because the wording can change. Branch on `failure_reason` instead.
     *
     * @param string|null $failureDetail
     *
     * @return self
     */
    public function setFailureDetail(?string $failureDetail): self
    {
        $this->initialized['failureDetail'] = true;
        $this->failureDetail = $failureDetail;
        return $this;
    }
    /**
     * Number of recipients after suppressed addresses are removed from the audience. This is 0 until sending starts and the audience becomes a recipient list.
     *
     * @return int|null
     */
    public function getRecipientCount(): ?int
    {
        return $this->recipientCount;
    }
    /**
     * Number of recipients after suppressed addresses are removed from the audience. This is 0 until sending starts and the audience becomes a recipient list.
     *
     * @param int|null $recipientCount
     *
     * @return self
     */
    public function setRecipientCount(?int $recipientCount): self
    {
        $this->initialized['recipientCount'] = true;
        $this->recipientCount = $recipientCount;
        return $this;
    }
    /**
     * How many recipients the broadcast has been sent to, counting every recipient whose status is `processed` or later. The number rises while the broadcast is `sending` and stops changing once the broadcast has finished. These counters are exact. The email stats endpoints report on the same sending but are approximate, so use these numbers when you need the precise count. Absent when the broadcast comes back from creating, updating, sending or canceling it, none of which read the counters. Absent from a list row for a broadcast that has no delivery events yet, such as a draft, where reading that one broadcast answers 0 instead. Absent too when the event store cannot be reached, which still returns 200. Read the broadcast again for the numbers.
     *
     * @return int|null
     */
    public function getSentCount(): ?int
    {
        return $this->sentCount;
    }
    /**
     * How many recipients the broadcast has been sent to, counting every recipient whose status is `processed` or later. The number rises while the broadcast is `sending` and stops changing once the broadcast has finished. These counters are exact. The email stats endpoints report on the same sending but are approximate, so use these numbers when you need the precise count. Absent when the broadcast comes back from creating, updating, sending or canceling it, none of which read the counters. Absent from a list row for a broadcast that has no delivery events yet, such as a draft, where reading that one broadcast answers 0 instead. Absent too when the event store cannot be reached, which still returns 200. Read the broadcast again for the numbers.
     *
     * @param int|null $sentCount
     *
     * @return self
     */
    public function setSentCount(?int $sentCount): self
    {
        $this->initialized['sentCount'] = true;
        $this->sentCount = $sentCount;
        return $this;
    }
    /**
     * How many recipients' messages were accepted by their mail server. Absent when `sent_count` is.
     *
     * @return int|null
     */
    public function getDeliveredCount(): ?int
    {
        return $this->deliveredCount;
    }
    /**
     * How many recipients' messages were accepted by their mail server. Absent when `sent_count` is.
     *
     * @param int|null $deliveredCount
     *
     * @return self
     */
    public function setDeliveredCount(?int $deliveredCount): self
    {
        $this->initialized['deliveredCount'] = true;
        $this->deliveredCount = $deliveredCount;
        return $this;
    }
    /**
     * How many recipients the message could not be delivered to at all. Absent when `sent_count` is.
     *
     * @return int|null
     */
    public function getBouncedCount(): ?int
    {
        return $this->bouncedCount;
    }
    /**
     * How many recipients the message could not be delivered to at all. Absent when `sent_count` is.
     *
     * @param int|null $bouncedCount
     *
     * @return self
     */
    public function setBouncedCount(?int $bouncedCount): self
    {
        $this->initialized['bouncedCount'] = true;
        $this->bouncedCount = $bouncedCount;
        return $this;
    }
    /**
     * How many recipients marked the message as spam. Absent when `sent_count` is.
     *
     * @return int|null
     */
    public function getComplainedCount(): ?int
    {
        return $this->complainedCount;
    }
    /**
     * How many recipients marked the message as spam. Absent when `sent_count` is.
     *
     * @param int|null $complainedCount
     *
     * @return self
     */
    public function setComplainedCount(?int $complainedCount): self
    {
        $this->initialized['complainedCount'] = true;
        $this->complainedCount = $complainedCount;
        return $this;
    }
    /**
     * How many times the message was opened, added up across every recipient. One recipient opening it twice counts twice. Absent when `sent_count` is.
     *
     * @return int|null
     */
    public function getOpenCount(): ?int
    {
        return $this->openCount;
    }
    /**
     * How many times the message was opened, added up across every recipient. One recipient opening it twice counts twice. Absent when `sent_count` is.
     *
     * @param int|null $openCount
     *
     * @return self
     */
    public function setOpenCount(?int $openCount): self
    {
        $this->initialized['openCount'] = true;
        $this->openCount = $openCount;
        return $this;
    }
    /**
     * How many times a link in the message was clicked, added up across every recipient. One recipient clicking twice counts twice. Absent when `sent_count` is.
     *
     * @return int|null
     */
    public function getClickCount(): ?int
    {
        return $this->clickCount;
    }
    /**
     * How many times a link in the message was clicked, added up across every recipient. One recipient clicking twice counts twice. Absent when `sent_count` is.
     *
     * @param int|null $clickCount
     *
     * @return self
     */
    public function setClickCount(?int $clickCount): self
    {
        $this->initialized['clickCount'] = true;
        $this->clickCount = $clickCount;
        return $this;
    }
    /**
     * The IP addresses this broadcast's messages went out from, up to 100 of them. A broadcast is spread across every address in its pool, so more than one can appear. The receiving mail systems name the address when they deliver, bounce or defer a message, so this stays absent until the first of those comes back. Returned on a single broadcast read, and absent from the list and from the broadcast that creating, updating, sending or canceling one returns, none of which read them. For delivery and latency broken down per address, read the sending-IP stats.
     * 
     *
     * @return list<string>|null
     */
    public function getSendingIps(): ?array
    {
        return $this->sendingIps;
    }
    /**
     * The IP addresses this broadcast's messages went out from, up to 100 of them. A broadcast is spread across every address in its pool, so more than one can appear. The receiving mail systems name the address when they deliver, bounce or defer a message, so this stays absent until the first of those comes back. Returned on a single broadcast read, and absent from the list and from the broadcast that creating, updating, sending or canceling one returns, none of which read them. For delivery and latency broken down per address, read the sending-IP stats.
     *
     * @param list<string>|null $sendingIps
     *
     * @return self
     */
    public function setSendingIps(?array $sendingIps): self
    {
        $this->initialized['sendingIps'] = true;
        $this->sendingIps = $sendingIps;
        return $this;
    }
    /**
     * How many distinct recipients opened the message at least once, excluding opens auto-fetched by inbox privacy features (such as Apple Mail Privacy Protection and the Gmail image proxy). A recipient who opened several times, or whose inbox prefetched the message, counts once. Absent when `sent_count` is.
     *
     * @return int|null
     */
    public function getUniqueOpensNonPrefetched(): ?int
    {
        return $this->uniqueOpensNonPrefetched;
    }
    /**
     * How many distinct recipients opened the message at least once, excluding opens auto-fetched by inbox privacy features (such as Apple Mail Privacy Protection and the Gmail image proxy). A recipient who opened several times, or whose inbox prefetched the message, counts once. Absent when `sent_count` is.
     *
     * @param int|null $uniqueOpensNonPrefetched
     *
     * @return self
     */
    public function setUniqueOpensNonPrefetched(?int $uniqueOpensNonPrefetched): self
    {
        $this->initialized['uniqueOpensNonPrefetched'] = true;
        $this->uniqueOpensNonPrefetched = $uniqueOpensNonPrefetched;
        return $this;
    }
    /**
     * How many distinct recipients clicked a link in the message at least once. A recipient who clicked several times counts once. Absent when `sent_count` is.
     *
     * @return int|null
     */
    public function getUniqueClicks(): ?int
    {
        return $this->uniqueClicks;
    }
    /**
     * How many distinct recipients clicked a link in the message at least once. A recipient who clicked several times counts once. Absent when `sent_count` is.
     *
     * @param int|null $uniqueClicks
     *
     * @return self
     */
    public function setUniqueClicks(?int $uniqueClicks): self
    {
        $this->initialized['uniqueClicks'] = true;
        $this->uniqueClicks = $uniqueClicks;
        return $this;
    }
    /**
     * How many recipients bounced after the message had already been accepted for delivery. A recipient who bounced this way more than once counts once. Absent when `sent_count` is.
     *
     * @return int|null
     */
    public function getOutOfBandBounces(): ?int
    {
        return $this->outOfBandBounces;
    }
    /**
     * How many recipients bounced after the message had already been accepted for delivery. A recipient who bounced this way more than once counts once. Absent when `sent_count` is.
     *
     * @param int|null $outOfBandBounces
     *
     * @return self
     */
    public function setOutOfBandBounces(?int $outOfBandBounces): self
    {
        $this->initialized['outOfBandBounces'] = true;
        $this->outOfBandBounces = $outOfBandBounces;
        return $this;
    }
    /**
     * How many distinct recipients a delivery landed for. This is the denominator to measure `unique_opens_non_prefetched`, `unique_clicks` and `complained_count` against. It differs from `delivered_count`, which reports how many recipients are currently in the delivered state: a recipient who was delivered to and then complained moves to `complained_count` and leaves `delivered_count`, but stays here, because the message did reach them. Absent when `sent_count` is.
     *
     * @return int|null
     */
    public function getDeliveredRecipients(): ?int
    {
        return $this->deliveredRecipients;
    }
    /**
     * How many distinct recipients a delivery landed for. This is the denominator to measure `unique_opens_non_prefetched`, `unique_clicks` and `complained_count` against. It differs from `delivered_count`, which reports how many recipients are currently in the delivered state: a recipient who was delivered to and then complained moves to `complained_count` and leaves `delivered_count`, but stays here, because the message did reach them. Absent when `sent_count` is.
     *
     * @param int|null $deliveredRecipients
     *
     * @return self
     */
    public function setDeliveredRecipients(?int $deliveredRecipients): self
    {
        $this->initialized['deliveredRecipients'] = true;
        $this->deliveredRecipients = $deliveredRecipients;
        return $this;
    }
    /**
     * Labels on this broadcast, each one a `name` and a `value`, that you can filter and search broadcasts by. Use tags for anything you want to find broadcasts by later, and `metadata` for data you only want handed back to you.
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Labels on this broadcast, each one a `name` and a `value`, that you can filter and search broadcasts by. Use tags for anything you want to find broadcasts by later, and `metadata` for data you only want handed back to you.
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
     * Any JSON you want to keep on the broadcast. We store it and hand it back in webhook payloads, and that is all it does. If you want to search or filter by it, use `tags` instead.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Any JSON you want to keep on the broadcast. We store it and hand it back in webhook payloads, and that is all it does. If you want to search or filter by it, use `tags` instead.
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
     * Whether opens are tracked for this broadcast.
     *
     * @return bool|null
     */
    public function getTrackOpens(): ?bool
    {
        return $this->trackOpens;
    }
    /**
     * Whether opens are tracked for this broadcast.
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
     * Whether link clicks are tracked for this broadcast.
     *
     * @return bool|null
     */
    public function getTrackClicks(): ?bool
    {
        return $this->trackClicks;
    }
    /**
     * Whether link clicks are tracked for this broadcast.
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
     * When the broadcast was created.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the broadcast was created.
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
     * When the broadcast is due to send, and absent when it is not scheduled.
     *
     * @return \DateTime|null
     */
    public function getScheduledAt(): ?\DateTime
    {
        return $this->scheduledAt;
    }
    /**
     * When the broadcast is due to send, and absent when it is not scheduled.
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
     * When the broadcast started sending. Absent until then. Compare with `sent_at`, which is when the broadcast finished sending.
     *
     * @return \DateTime|null
     */
    public function getStartedAt(): ?\DateTime
    {
        return $this->startedAt;
    }
    /**
     * When the broadcast started sending. Absent until then. Compare with `sent_at`, which is when the broadcast finished sending.
     *
     * @param \DateTime|null $startedAt
     *
     * @return self
     */
    public function setStartedAt(?\DateTime $startedAt): self
    {
        $this->initialized['startedAt'] = true;
        $this->startedAt = $startedAt;
        return $this;
    }
    /**
     * When the last recipient was sent to and the broadcast became `sent`. Null until then. Compare with `started_at`, which is when the broadcast started sending.
     *
     * @return \DateTime|null
     */
    public function getSentAt(): ?\DateTime
    {
        return $this->sentAt;
    }
    /**
     * When the last recipient was sent to and the broadcast became `sent`. Null until then. Compare with `started_at`, which is when the broadcast started sending.
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
     * When the broadcast was canceled, and absent if it never was. This is when cancellation was requested, so it is set as soon as the status is `canceling` and does not move while the remaining sends stop and the status becomes `canceled`.
     *
     * @return \DateTime|null
     */
    public function getCanceledAt(): ?\DateTime
    {
        return $this->canceledAt;
    }
    /**
     * When the broadcast was canceled, and absent if it never was. This is when cancellation was requested, so it is set as soon as the status is `canceling` and does not move while the remaining sends stop and the status becomes `canceled`.
     *
     * @param \DateTime|null $canceledAt
     *
     * @return self
     */
    public function setCanceledAt(?\DateTime $canceledAt): self
    {
        $this->initialized['canceledAt'] = true;
        $this->canceledAt = $canceledAt;
        return $this;
    }
}
