<?php

namespace MessageBird\Wire\Model;

/**
 * One period during which messages to a WhatsApp address are stopped: when it started, what started it, and what ended it. An address suppressed, ended and suppressed again has two of these on record rather than one current state, the first ended and the second in force, and each keeps its own dates once it ends. The list returns the periods in force; fetch one by ID to read an ended one.
 */
class WhatsAppSuppression
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
     * The suppressed WhatsApp address. For a phone number this is canonical E.164 with a leading plus sign, such as `+5511977670804`.
     * 
     *
     * @var string|null
     */
    protected $address;
    /**
     * The WhatsApp Business Account this stops, identified by its WhatsApp-issued account ID. Null when it stops the address for every account in the workspace, whichever one sends.
     * 
     *
     * @var string|null
     */
    protected $waba;
    /**
     * Why the address cannot be messaged:
     * 
     * - `manual`: Your workspace added the suppression through the API or the dashboard, and can end it.
     * 
     *
     * @var string|null
     */
    protected $reason;
    /**
     * How the suppression came to exist:
     * 
     * - `api_key`: an API call.
     * - `user`: someone acting in the dashboard.
     * 
     * Kept beside the reason because one reason can arrive by more than one route.
     * 
     *
     * @var string|null
     */
    protected $origin;
    /**
     * Message categories blocked for this address. `all` blocks every category, including authentication and transactional messages, and is the only value in use. Treat unrecognized values as blocking every category.
     * 
     *
     * @var string|null
     */
    protected $appliesTo;
    /**
     * Whether this is stopping messages right now. Always true in a list, which carries only the suppressions in force; false when you fetch one by ID that has since ended, which is also when `ended_at` is set.
     * 
     *
     * @var bool|null
     */
    protected $blocking;
    /**
     * The WhatsApp message a suppression was opened from. Null for a manual suppression, and Bird records no other kind today, so this is null on every record.
     * 
     *
     * @var string|null
     */
    protected $sourceWhatsappId;
    /**
     * When the suppression took effect. For one added through the API or the dashboard this is when it was added, so it matches `created_at`. This is what orders the list.
     * 
     *
     * @var \DateTime|null
     */
    protected $effectiveAt;
    /**
     * When this stopped applying. Null while it is still stopping messages.
     *
     * @var \DateTime|null
     */
    protected $endedAt;
    /**
     * @var string|null
     */
    protected $endedReason;
    /**
     * When the end took effect. For one ended through the API or the dashboard this matches `ended_at`. Null while it is still stopping messages.
     * 
     *
     * @var \DateTime|null
     */
    protected $endedEffectiveAt;
    /**
     * When we recorded it.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When we last recorded this suppression being stated. Later than `created_at` when your workspace added it again while it was already in force; a repeat adds no new record.
     * 
     *
     * @var \DateTime|null
     */
    protected $lastAssertedAt;
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
     * The suppressed WhatsApp address. For a phone number this is canonical E.164 with a leading plus sign, such as `+5511977670804`.
     * 
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    /**
     * The suppressed WhatsApp address. For a phone number this is canonical E.164 with a leading plus sign, such as `+5511977670804`.
     *
     * @param string|null $address
     *
     * @return self
     */
    public function setAddress(?string $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;
        return $this;
    }
    /**
     * The WhatsApp Business Account this stops, identified by its WhatsApp-issued account ID. Null when it stops the address for every account in the workspace, whichever one sends.
     * 
     *
     * @return string|null
     */
    public function getWaba(): ?string
    {
        return $this->waba;
    }
    /**
     * The WhatsApp Business Account this stops, identified by its WhatsApp-issued account ID. Null when it stops the address for every account in the workspace, whichever one sends.
     *
     * @param string|null $waba
     *
     * @return self
     */
    public function setWaba(?string $waba): self
    {
        $this->initialized['waba'] = true;
        $this->waba = $waba;
        return $this;
    }
    /**
     * Why the address cannot be messaged:
     * 
     * - `manual`: Your workspace added the suppression through the API or the dashboard, and can end it.
     * 
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
    * Why the address cannot be messaged:
    
    - `manual`: Your workspace added the suppression through the API or the dashboard, and can end it.
    
    *
    * @param string|null $reason
    *
    * @return self
    */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;
        return $this;
    }
    /**
     * How the suppression came to exist:
     * 
     * - `api_key`: an API call.
     * - `user`: someone acting in the dashboard.
     * 
     * Kept beside the reason because one reason can arrive by more than one route.
     * 
     *
     * @return string|null
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }
    /**
    * How the suppression came to exist:
    
    - `api_key`: an API call.
    - `user`: someone acting in the dashboard.
    
    Kept beside the reason because one reason can arrive by more than one route.
    
    *
    * @param string|null $origin
    *
    * @return self
    */
    public function setOrigin(?string $origin): self
    {
        $this->initialized['origin'] = true;
        $this->origin = $origin;
        return $this;
    }
    /**
     * Message categories blocked for this address. `all` blocks every category, including authentication and transactional messages, and is the only value in use. Treat unrecognized values as blocking every category.
     * 
     *
     * @return string|null
     */
    public function getAppliesTo(): ?string
    {
        return $this->appliesTo;
    }
    /**
     * Message categories blocked for this address. `all` blocks every category, including authentication and transactional messages, and is the only value in use. Treat unrecognized values as blocking every category.
     *
     * @param string|null $appliesTo
     *
     * @return self
     */
    public function setAppliesTo(?string $appliesTo): self
    {
        $this->initialized['appliesTo'] = true;
        $this->appliesTo = $appliesTo;
        return $this;
    }
    /**
     * Whether this is stopping messages right now. Always true in a list, which carries only the suppressions in force; false when you fetch one by ID that has since ended, which is also when `ended_at` is set.
     * 
     *
     * @return bool|null
     */
    public function getBlocking(): ?bool
    {
        return $this->blocking;
    }
    /**
     * Whether this is stopping messages right now. Always true in a list, which carries only the suppressions in force; false when you fetch one by ID that has since ended, which is also when `ended_at` is set.
     *
     * @param bool|null $blocking
     *
     * @return self
     */
    public function setBlocking(?bool $blocking): self
    {
        $this->initialized['blocking'] = true;
        $this->blocking = $blocking;
        return $this;
    }
    /**
     * The WhatsApp message a suppression was opened from. Null for a manual suppression, and Bird records no other kind today, so this is null on every record.
     * 
     *
     * @return string|null
     */
    public function getSourceWhatsappId(): ?string
    {
        return $this->sourceWhatsappId;
    }
    /**
     * The WhatsApp message a suppression was opened from. Null for a manual suppression, and Bird records no other kind today, so this is null on every record.
     *
     * @param string|null $sourceWhatsappId
     *
     * @return self
     */
    public function setSourceWhatsappId(?string $sourceWhatsappId): self
    {
        $this->initialized['sourceWhatsappId'] = true;
        $this->sourceWhatsappId = $sourceWhatsappId;
        return $this;
    }
    /**
     * When the suppression took effect. For one added through the API or the dashboard this is when it was added, so it matches `created_at`. This is what orders the list.
     * 
     *
     * @return \DateTime|null
     */
    public function getEffectiveAt(): ?\DateTime
    {
        return $this->effectiveAt;
    }
    /**
     * When the suppression took effect. For one added through the API or the dashboard this is when it was added, so it matches `created_at`. This is what orders the list.
     *
     * @param \DateTime|null $effectiveAt
     *
     * @return self
     */
    public function setEffectiveAt(?\DateTime $effectiveAt): self
    {
        $this->initialized['effectiveAt'] = true;
        $this->effectiveAt = $effectiveAt;
        return $this;
    }
    /**
     * When this stopped applying. Null while it is still stopping messages.
     *
     * @return \DateTime|null
     */
    public function getEndedAt(): ?\DateTime
    {
        return $this->endedAt;
    }
    /**
     * When this stopped applying. Null while it is still stopping messages.
     *
     * @param \DateTime|null $endedAt
     *
     * @return self
     */
    public function setEndedAt(?\DateTime $endedAt): self
    {
        $this->initialized['endedAt'] = true;
        $this->endedAt = $endedAt;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getEndedReason(): ?string
    {
        return $this->endedReason;
    }
    /**
     * @param string|null $endedReason
     *
     * @return self
     */
    public function setEndedReason(?string $endedReason): self
    {
        $this->initialized['endedReason'] = true;
        $this->endedReason = $endedReason;
        return $this;
    }
    /**
     * When the end took effect. For one ended through the API or the dashboard this matches `ended_at`. Null while it is still stopping messages.
     * 
     *
     * @return \DateTime|null
     */
    public function getEndedEffectiveAt(): ?\DateTime
    {
        return $this->endedEffectiveAt;
    }
    /**
     * When the end took effect. For one ended through the API or the dashboard this matches `ended_at`. Null while it is still stopping messages.
     *
     * @param \DateTime|null $endedEffectiveAt
     *
     * @return self
     */
    public function setEndedEffectiveAt(?\DateTime $endedEffectiveAt): self
    {
        $this->initialized['endedEffectiveAt'] = true;
        $this->endedEffectiveAt = $endedEffectiveAt;
        return $this;
    }
    /**
     * When we recorded it.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When we recorded it.
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
     * When we last recorded this suppression being stated. Later than `created_at` when your workspace added it again while it was already in force; a repeat adds no new record.
     * 
     *
     * @return \DateTime|null
     */
    public function getLastAssertedAt(): ?\DateTime
    {
        return $this->lastAssertedAt;
    }
    /**
     * When we last recorded this suppression being stated. Later than `created_at` when your workspace added it again while it was already in force; a repeat adds no new record.
     *
     * @param \DateTime|null $lastAssertedAt
     *
     * @return self
     */
    public function setLastAssertedAt(?\DateTime $lastAssertedAt): self
    {
        $this->initialized['lastAssertedAt'] = true;
        $this->lastAssertedAt = $lastAssertedAt;
        return $this;
    }
}
