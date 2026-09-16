<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsPlacementProvider
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
     * Share of this provider's measured placements that landed in the inbox, as a percentage.
     *
     * @var float|null
     */
    protected $inboxRatePercent;
    /**
     * Share of this provider's measured placements that landed in spam, as a percentage.
     *
     * @var float|null
     */
    protected $spamRatePercent;
    /**
     * Raw measured placements behind a set of rates, before any weighting. A measured placement is one message whose mailbox destination the measurement observed.
     * 
     *
     * @var EmailInboxInsightsPlacementCounts|null
     */
    protected $rawCounts;
    /**
     * Inbox-rate movement against the prior period, in percentage points. Present only when the request asked for a comparison and the prior period had data for this provider; absence is not zero change.
     * 
     *
     * @var float|null
     */
    protected $deltaPts;
    /**
     * Share of this provider's inbox-placed mail that was read, as a percentage.
     *
     * @var float|null
     */
    protected $readRatePercent;
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
     * Share of this provider's measured placements that landed in the inbox, as a percentage.
     *
     * @return float|null
     */
    public function getInboxRatePercent(): ?float
    {
        return $this->inboxRatePercent;
    }
    /**
     * Share of this provider's measured placements that landed in the inbox, as a percentage.
     *
     * @param float|null $inboxRatePercent
     *
     * @return self
     */
    public function setInboxRatePercent(?float $inboxRatePercent): self
    {
        $this->initialized['inboxRatePercent'] = true;
        $this->inboxRatePercent = $inboxRatePercent;
        return $this;
    }
    /**
     * Share of this provider's measured placements that landed in spam, as a percentage.
     *
     * @return float|null
     */
    public function getSpamRatePercent(): ?float
    {
        return $this->spamRatePercent;
    }
    /**
     * Share of this provider's measured placements that landed in spam, as a percentage.
     *
     * @param float|null $spamRatePercent
     *
     * @return self
     */
    public function setSpamRatePercent(?float $spamRatePercent): self
    {
        $this->initialized['spamRatePercent'] = true;
        $this->spamRatePercent = $spamRatePercent;
        return $this;
    }
    /**
     * Raw measured placements behind a set of rates, before any weighting. A measured placement is one message whose mailbox destination the measurement observed.
     * 
     *
     * @return EmailInboxInsightsPlacementCounts|null
     */
    public function getRawCounts(): ?EmailInboxInsightsPlacementCounts
    {
        return $this->rawCounts;
    }
    /**
     * Raw measured placements behind a set of rates, before any weighting. A measured placement is one message whose mailbox destination the measurement observed.
     *
     * @param EmailInboxInsightsPlacementCounts|null $rawCounts
     *
     * @return self
     */
    public function setRawCounts(?EmailInboxInsightsPlacementCounts $rawCounts): self
    {
        $this->initialized['rawCounts'] = true;
        $this->rawCounts = $rawCounts;
        return $this;
    }
    /**
     * Inbox-rate movement against the prior period, in percentage points. Present only when the request asked for a comparison and the prior period had data for this provider; absence is not zero change.
     * 
     *
     * @return float|null
     */
    public function getDeltaPts(): ?float
    {
        return $this->deltaPts;
    }
    /**
     * Inbox-rate movement against the prior period, in percentage points. Present only when the request asked for a comparison and the prior period had data for this provider; absence is not zero change.
     *
     * @param float|null $deltaPts
     *
     * @return self
     */
    public function setDeltaPts(?float $deltaPts): self
    {
        $this->initialized['deltaPts'] = true;
        $this->deltaPts = $deltaPts;
        return $this;
    }
    /**
     * Share of this provider's inbox-placed mail that was read, as a percentage.
     *
     * @return float|null
     */
    public function getReadRatePercent(): ?float
    {
        return $this->readRatePercent;
    }
    /**
     * Share of this provider's inbox-placed mail that was read, as a percentage.
     *
     * @param float|null $readRatePercent
     *
     * @return self
     */
    public function setReadRatePercent(?float $readRatePercent): self
    {
        $this->initialized['readRatePercent'] = true;
        $this->readRatePercent = $readRatePercent;
        return $this;
    }
}
