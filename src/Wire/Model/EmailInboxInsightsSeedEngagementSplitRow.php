<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSeedEngagementSplitRow
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
     * A mailbox provider, as the measurement identifies it. A lowercase identifier rather than
     * a display name, so pick your own label for it, and treat the set as open: this is a long
     * tail rather than a handful of household names, and some entries are domains
     * (`fastmail.com`, `seznam.cz`) rather than brands.
     * 
     * The measurement places mail into its own seed lists, so its buckets are not the ones the
     * [mailbox-provider stats breakdown](/docs/api/reference/get-email-stats-by-mailbox-provider)
     * reports: Microsoft's properties appear here as `hotmail` rather than `microsoft`, and
     * `apple` appears here where the Competitive Insights panel has no measurement for it at
     * all. None of the three is a joinable dimension against the others.
     * 
     *
     * @var string|null
     */
    protected $mailboxProvider;
    /**
     * Inbox rate across seeds simulating engaged recipients, as a percentage.
     *
     * @var float|null
     */
    protected $engagedInboxRatePercent;
    /**
     * Inbox rate across seeds simulating dormant recipients, as a percentage.
     *
     * @var float|null
     */
    protected $dormantInboxRatePercent;
    /**
     * Engaged inbox rate minus dormant inbox rate, in percentage points. The value can be negative, which means dormant seeds placed better, and is reported as measured rather than floored at zero.
     * 
     *
     * @var float|null
     */
    protected $gapPts;
    /**
     * Seeds simulating engaged recipients at this provider.
     *
     * @var int|null
     */
    protected $engagedSeeds;
    /**
     * Seeds simulating dormant recipients at this provider.
     *
     * @var int|null
     */
    protected $dormantSeeds;
    /**
     * A mailbox provider, as the measurement identifies it. A lowercase identifier rather than
     * a display name, so pick your own label for it, and treat the set as open: this is a long
     * tail rather than a handful of household names, and some entries are domains
     * (`fastmail.com`, `seznam.cz`) rather than brands.
     * 
     * The measurement places mail into its own seed lists, so its buckets are not the ones the
     * [mailbox-provider stats breakdown](/docs/api/reference/get-email-stats-by-mailbox-provider)
     * reports: Microsoft's properties appear here as `hotmail` rather than `microsoft`, and
     * `apple` appears here where the Competitive Insights panel has no measurement for it at
     * all. None of the three is a joinable dimension against the others.
     * 
     *
     * @return string|null
     */
    public function getMailboxProvider(): ?string
    {
        return $this->mailboxProvider;
    }
    /**
    * A mailbox provider, as the measurement identifies it. A lowercase identifier rather than
    a display name, so pick your own label for it, and treat the set as open: this is a long
    tail rather than a handful of household names, and some entries are domains
    (`fastmail.com`, `seznam.cz`) rather than brands.
    
    The measurement places mail into its own seed lists, so its buckets are not the ones the
    [mailbox-provider stats breakdown](/docs/api/reference/get-email-stats-by-mailbox-provider)
    reports: Microsoft's properties appear here as `hotmail` rather than `microsoft`, and
    `apple` appears here where the Competitive Insights panel has no measurement for it at
    all. None of the three is a joinable dimension against the others.
    
    *
    * @param string|null $mailboxProvider
    *
    * @return self
    */
    public function setMailboxProvider(?string $mailboxProvider): self
    {
        $this->initialized['mailboxProvider'] = true;
        $this->mailboxProvider = $mailboxProvider;
        return $this;
    }
    /**
     * Inbox rate across seeds simulating engaged recipients, as a percentage.
     *
     * @return float|null
     */
    public function getEngagedInboxRatePercent(): ?float
    {
        return $this->engagedInboxRatePercent;
    }
    /**
     * Inbox rate across seeds simulating engaged recipients, as a percentage.
     *
     * @param float|null $engagedInboxRatePercent
     *
     * @return self
     */
    public function setEngagedInboxRatePercent(?float $engagedInboxRatePercent): self
    {
        $this->initialized['engagedInboxRatePercent'] = true;
        $this->engagedInboxRatePercent = $engagedInboxRatePercent;
        return $this;
    }
    /**
     * Inbox rate across seeds simulating dormant recipients, as a percentage.
     *
     * @return float|null
     */
    public function getDormantInboxRatePercent(): ?float
    {
        return $this->dormantInboxRatePercent;
    }
    /**
     * Inbox rate across seeds simulating dormant recipients, as a percentage.
     *
     * @param float|null $dormantInboxRatePercent
     *
     * @return self
     */
    public function setDormantInboxRatePercent(?float $dormantInboxRatePercent): self
    {
        $this->initialized['dormantInboxRatePercent'] = true;
        $this->dormantInboxRatePercent = $dormantInboxRatePercent;
        return $this;
    }
    /**
     * Engaged inbox rate minus dormant inbox rate, in percentage points. The value can be negative, which means dormant seeds placed better, and is reported as measured rather than floored at zero.
     * 
     *
     * @return float|null
     */
    public function getGapPts(): ?float
    {
        return $this->gapPts;
    }
    /**
     * Engaged inbox rate minus dormant inbox rate, in percentage points. The value can be negative, which means dormant seeds placed better, and is reported as measured rather than floored at zero.
     *
     * @param float|null $gapPts
     *
     * @return self
     */
    public function setGapPts(?float $gapPts): self
    {
        $this->initialized['gapPts'] = true;
        $this->gapPts = $gapPts;
        return $this;
    }
    /**
     * Seeds simulating engaged recipients at this provider.
     *
     * @return int|null
     */
    public function getEngagedSeeds(): ?int
    {
        return $this->engagedSeeds;
    }
    /**
     * Seeds simulating engaged recipients at this provider.
     *
     * @param int|null $engagedSeeds
     *
     * @return self
     */
    public function setEngagedSeeds(?int $engagedSeeds): self
    {
        $this->initialized['engagedSeeds'] = true;
        $this->engagedSeeds = $engagedSeeds;
        return $this;
    }
    /**
     * Seeds simulating dormant recipients at this provider.
     *
     * @return int|null
     */
    public function getDormantSeeds(): ?int
    {
        return $this->dormantSeeds;
    }
    /**
     * Seeds simulating dormant recipients at this provider.
     *
     * @param int|null $dormantSeeds
     *
     * @return self
     */
    public function setDormantSeeds(?int $dormantSeeds): self
    {
        $this->initialized['dormantSeeds'] = true;
        $this->dormantSeeds = $dormantSeeds;
        return $this;
    }
}
