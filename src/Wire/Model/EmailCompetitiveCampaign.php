<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveCampaign extends \ArrayObject
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
     * The identifier for this campaign. Use it to fetch this one campaign on its own.
     * 
     * It is a string, and it needs to stay one. The values are long enough that
     * JavaScript, and any other language that stores every number as a floating point
     * value, will round them, and a rounded identifier matches no campaign at all.
     * Compare it and pass it back as text.
     * 
     *
     * @var string|null
     */
    protected $id;
    /**
     * The subject line the panel saw on this campaign.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * When the panel first saw this campaign arrive.
     *
     * @var \DateTime|null
     */
    protected $sentAt;
    /**
     * Where the panel's capture of the rendered email can be fetched, null when it captured none. Panels image only some of what they observe, so an absent creative is an ordinary outcome rather than a failed one. The image is served from the panel's own host rather than from ours, so a page embedding it has to allow that host.
     * 
     *
     * @var string|null
     */
    protected $imageUrl;
    /**
     * Estimated recipients this campaign reached, null when the panel observed the campaign but published no estimate for it.
     * 
     *
     * @var int|null
     */
    protected $reach;
    /**
     * Estimated share of recipients who read this campaign, null when the panel published no rate for it. Panel read rates count dwell time, so they do not move with the automatic opens that inflate a sender's own open rate.
     * 
     *
     * @var float|null
     */
    protected $readRate;
    /**
     * Whether the panel captured the rendered email for this campaign.
     *
     * @var bool|null
     */
    protected $hasCreative;
    /**
     * The discount the subject line leads with, null when it names none. Read from the subject text, so it finds a stated offer and not one revealed inside the email.
     * 
     *
     * @var float|null
     */
    protected $discountPercent;
    /**
     * Share of this campaign that reached an inbox, null when the panel observed it without recording where it landed. It describes this send rather than the brand's domain, so a single bad campaign is visible against a brand whose overall placement still looks healthy.
     * 
     *
     * @var float|null
     */
    protected $inboxRate;
    /**
     * Share of this campaign that was filed as spam, null on the same terms.
     *
     * @var float|null
     */
    protected $spamRate;
    /**
     * The identifier for this campaign. Use it to fetch this one campaign on its own.
     * 
     * It is a string, and it needs to stay one. The values are long enough that
     * JavaScript, and any other language that stores every number as a floating point
     * value, will round them, and a rounded identifier matches no campaign at all.
     * Compare it and pass it back as text.
     * 
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
    * The identifier for this campaign. Use it to fetch this one campaign on its own.
    
    It is a string, and it needs to stay one. The values are long enough that
    JavaScript, and any other language that stores every number as a floating point
    value, will round them, and a rounded identifier matches no campaign at all.
    Compare it and pass it back as text.
    
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
     * The subject line the panel saw on this campaign.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * The subject line the panel saw on this campaign.
     *
     * @param string|null $subject
     *
     * @return self
     */
    public function setSubject(?string $subject): self
    {
        $this->initialized['subject'] = true;
        $this->subject = $subject;
        return $this;
    }
    /**
     * When the panel first saw this campaign arrive.
     *
     * @return \DateTime|null
     */
    public function getSentAt(): ?\DateTime
    {
        return $this->sentAt;
    }
    /**
     * When the panel first saw this campaign arrive.
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
     * Where the panel's capture of the rendered email can be fetched, null when it captured none. Panels image only some of what they observe, so an absent creative is an ordinary outcome rather than a failed one. The image is served from the panel's own host rather than from ours, so a page embedding it has to allow that host.
     * 
     *
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }
    /**
     * Where the panel's capture of the rendered email can be fetched, null when it captured none. Panels image only some of what they observe, so an absent creative is an ordinary outcome rather than a failed one. The image is served from the panel's own host rather than from ours, so a page embedding it has to allow that host.
     *
     * @param string|null $imageUrl
     *
     * @return self
     */
    public function setImageUrl(?string $imageUrl): self
    {
        $this->initialized['imageUrl'] = true;
        $this->imageUrl = $imageUrl;
        return $this;
    }
    /**
     * Estimated recipients this campaign reached, null when the panel observed the campaign but published no estimate for it.
     * 
     *
     * @return int|null
     */
    public function getReach(): ?int
    {
        return $this->reach;
    }
    /**
     * Estimated recipients this campaign reached, null when the panel observed the campaign but published no estimate for it.
     *
     * @param int|null $reach
     *
     * @return self
     */
    public function setReach(?int $reach): self
    {
        $this->initialized['reach'] = true;
        $this->reach = $reach;
        return $this;
    }
    /**
     * Estimated share of recipients who read this campaign, null when the panel published no rate for it. Panel read rates count dwell time, so they do not move with the automatic opens that inflate a sender's own open rate.
     * 
     *
     * @return float|null
     */
    public function getReadRate(): ?float
    {
        return $this->readRate;
    }
    /**
     * Estimated share of recipients who read this campaign, null when the panel published no rate for it. Panel read rates count dwell time, so they do not move with the automatic opens that inflate a sender's own open rate.
     *
     * @param float|null $readRate
     *
     * @return self
     */
    public function setReadRate(?float $readRate): self
    {
        $this->initialized['readRate'] = true;
        $this->readRate = $readRate;
        return $this;
    }
    /**
     * Whether the panel captured the rendered email for this campaign.
     *
     * @return bool|null
     */
    public function getHasCreative(): ?bool
    {
        return $this->hasCreative;
    }
    /**
     * Whether the panel captured the rendered email for this campaign.
     *
     * @param bool|null $hasCreative
     *
     * @return self
     */
    public function setHasCreative(?bool $hasCreative): self
    {
        $this->initialized['hasCreative'] = true;
        $this->hasCreative = $hasCreative;
        return $this;
    }
    /**
     * The discount the subject line leads with, null when it names none. Read from the subject text, so it finds a stated offer and not one revealed inside the email.
     * 
     *
     * @return float|null
     */
    public function getDiscountPercent(): ?float
    {
        return $this->discountPercent;
    }
    /**
     * The discount the subject line leads with, null when it names none. Read from the subject text, so it finds a stated offer and not one revealed inside the email.
     *
     * @param float|null $discountPercent
     *
     * @return self
     */
    public function setDiscountPercent(?float $discountPercent): self
    {
        $this->initialized['discountPercent'] = true;
        $this->discountPercent = $discountPercent;
        return $this;
    }
    /**
     * Share of this campaign that reached an inbox, null when the panel observed it without recording where it landed. It describes this send rather than the brand's domain, so a single bad campaign is visible against a brand whose overall placement still looks healthy.
     * 
     *
     * @return float|null
     */
    public function getInboxRate(): ?float
    {
        return $this->inboxRate;
    }
    /**
     * Share of this campaign that reached an inbox, null when the panel observed it without recording where it landed. It describes this send rather than the brand's domain, so a single bad campaign is visible against a brand whose overall placement still looks healthy.
     *
     * @param float|null $inboxRate
     *
     * @return self
     */
    public function setInboxRate(?float $inboxRate): self
    {
        $this->initialized['inboxRate'] = true;
        $this->inboxRate = $inboxRate;
        return $this;
    }
    /**
     * Share of this campaign that was filed as spam, null on the same terms.
     *
     * @return float|null
     */
    public function getSpamRate(): ?float
    {
        return $this->spamRate;
    }
    /**
     * Share of this campaign that was filed as spam, null on the same terms.
     *
     * @param float|null $spamRate
     *
     * @return self
     */
    public function setSpamRate(?float $spamRate): self
    {
        $this->initialized['spamRate'] = true;
        $this->spamRate = $spamRate;
        return $this;
    }
}
