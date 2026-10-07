<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSeedTestProvider
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
     * Share of this provider's seeds that received the message in the inbox, as a percentage.
     *
     * @var float|null
     */
    protected $inboxRatePercent;
    /**
     * Share of this provider's seeds that received the message in spam, as a percentage.
     *
     * @var float|null
     */
    protected $spamRatePercent;
    /**
     * Seed addresses at this provider that received the message in the inbox.
     *
     * @var int|null
     */
    protected $inboxSeeds;
    /**
     * Seed addresses at this provider that received the message in spam.
     *
     * @var int|null
     */
    protected $spamSeeds;
    /**
     * Seed addresses at this provider included in the test.
     *
     * @var int|null
     */
    protected $totalSeeds;
    /**
     * Which Gmail tab the test's Gmail seeds mostly landed under.
     *
     * @var EmailInboxInsightsGmailCategory|null
     */
    protected $gmailCategory;
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
     * Share of this provider's seeds that received the message in the inbox, as a percentage.
     *
     * @return float|null
     */
    public function getInboxRatePercent(): ?float
    {
        return $this->inboxRatePercent;
    }
    /**
     * Share of this provider's seeds that received the message in the inbox, as a percentage.
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
     * Share of this provider's seeds that received the message in spam, as a percentage.
     *
     * @return float|null
     */
    public function getSpamRatePercent(): ?float
    {
        return $this->spamRatePercent;
    }
    /**
     * Share of this provider's seeds that received the message in spam, as a percentage.
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
     * Seed addresses at this provider that received the message in the inbox.
     *
     * @return int|null
     */
    public function getInboxSeeds(): ?int
    {
        return $this->inboxSeeds;
    }
    /**
     * Seed addresses at this provider that received the message in the inbox.
     *
     * @param int|null $inboxSeeds
     *
     * @return self
     */
    public function setInboxSeeds(?int $inboxSeeds): self
    {
        $this->initialized['inboxSeeds'] = true;
        $this->inboxSeeds = $inboxSeeds;
        return $this;
    }
    /**
     * Seed addresses at this provider that received the message in spam.
     *
     * @return int|null
     */
    public function getSpamSeeds(): ?int
    {
        return $this->spamSeeds;
    }
    /**
     * Seed addresses at this provider that received the message in spam.
     *
     * @param int|null $spamSeeds
     *
     * @return self
     */
    public function setSpamSeeds(?int $spamSeeds): self
    {
        $this->initialized['spamSeeds'] = true;
        $this->spamSeeds = $spamSeeds;
        return $this;
    }
    /**
     * Seed addresses at this provider included in the test.
     *
     * @return int|null
     */
    public function getTotalSeeds(): ?int
    {
        return $this->totalSeeds;
    }
    /**
     * Seed addresses at this provider included in the test.
     *
     * @param int|null $totalSeeds
     *
     * @return self
     */
    public function setTotalSeeds(?int $totalSeeds): self
    {
        $this->initialized['totalSeeds'] = true;
        $this->totalSeeds = $totalSeeds;
        return $this;
    }
    /**
     * Which Gmail tab the test's Gmail seeds mostly landed under.
     *
     * @return EmailInboxInsightsGmailCategory|null
     */
    public function getGmailCategory(): ?EmailInboxInsightsGmailCategory
    {
        return $this->gmailCategory;
    }
    /**
     * Which Gmail tab the test's Gmail seeds mostly landed under.
     *
     * @param EmailInboxInsightsGmailCategory|null $gmailCategory
     *
     * @return self
     */
    public function setGmailCategory(?EmailInboxInsightsGmailCategory $gmailCategory): self
    {
        $this->initialized['gmailCategory'] = true;
        $this->gmailCategory = $gmailCategory;
        return $this;
    }
}
