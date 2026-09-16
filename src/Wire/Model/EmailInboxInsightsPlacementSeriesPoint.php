<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsPlacementSeriesPoint
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
     * First UTC day of the bucket.
     *
     * @var \DateTime|null
     */
    protected $date;
    /**
     * The provider this point describes, or null on the domain-wide line. Per-provider points appear only when the request named providers.
     * 
     *
     * @var string|null
     */
    protected $mailboxProvider;
    /**
     * Inbox share of the bucket's measured placements, as a percentage.
     *
     * @var float|null
     */
    protected $inboxRatePercent;
    /**
     * Spam share of the bucket's measured placements, as a percentage.
     *
     * @var float|null
     */
    protected $spamRatePercent;
    /**
     * Measured placements observed in the inbox in this bucket.
     *
     * @var int|null
     */
    protected $inboxRawCount;
    /**
     * Measured placements observed in spam in this bucket.
     *
     * @var int|null
     */
    protected $spamRawCount;
    /**
     * First UTC day of the bucket.
     *
     * @return \DateTime|null
     */
    public function getDate(): ?\DateTime
    {
        return $this->date;
    }
    /**
     * First UTC day of the bucket.
     *
     * @param \DateTime|null $date
     *
     * @return self
     */
    public function setDate(?\DateTime $date): self
    {
        $this->initialized['date'] = true;
        $this->date = $date;
        return $this;
    }
    /**
     * The provider this point describes, or null on the domain-wide line. Per-provider points appear only when the request named providers.
     * 
     *
     * @return string|null
     */
    public function getMailboxProvider(): ?string
    {
        return $this->mailboxProvider;
    }
    /**
     * The provider this point describes, or null on the domain-wide line. Per-provider points appear only when the request named providers.
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
     * Inbox share of the bucket's measured placements, as a percentage.
     *
     * @return float|null
     */
    public function getInboxRatePercent(): ?float
    {
        return $this->inboxRatePercent;
    }
    /**
     * Inbox share of the bucket's measured placements, as a percentage.
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
     * Spam share of the bucket's measured placements, as a percentage.
     *
     * @return float|null
     */
    public function getSpamRatePercent(): ?float
    {
        return $this->spamRatePercent;
    }
    /**
     * Spam share of the bucket's measured placements, as a percentage.
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
     * Measured placements observed in the inbox in this bucket.
     *
     * @return int|null
     */
    public function getInboxRawCount(): ?int
    {
        return $this->inboxRawCount;
    }
    /**
     * Measured placements observed in the inbox in this bucket.
     *
     * @param int|null $inboxRawCount
     *
     * @return self
     */
    public function setInboxRawCount(?int $inboxRawCount): self
    {
        $this->initialized['inboxRawCount'] = true;
        $this->inboxRawCount = $inboxRawCount;
        return $this;
    }
    /**
     * Measured placements observed in spam in this bucket.
     *
     * @return int|null
     */
    public function getSpamRawCount(): ?int
    {
        return $this->spamRawCount;
    }
    /**
     * Measured placements observed in spam in this bucket.
     *
     * @param int|null $spamRawCount
     *
     * @return self
     */
    public function setSpamRawCount(?int $spamRawCount): self
    {
        $this->initialized['spamRawCount'] = true;
        $this->spamRawCount = $spamRawCount;
        return $this;
    }
}
