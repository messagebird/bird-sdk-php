<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsComplaintSeriesPoint
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
     * The bucket's Google Postmaster spam rate, as a percentage.
     *
     * @var float|null
     */
    protected $gmailPostmasterSpamRatePercent;
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
     * The bucket's Google Postmaster spam rate, as a percentage.
     *
     * @return float|null
     */
    public function getGmailPostmasterSpamRatePercent(): ?float
    {
        return $this->gmailPostmasterSpamRatePercent;
    }
    /**
     * The bucket's Google Postmaster spam rate, as a percentage.
     *
     * @param float|null $gmailPostmasterSpamRatePercent
     *
     * @return self
     */
    public function setGmailPostmasterSpamRatePercent(?float $gmailPostmasterSpamRatePercent): self
    {
        $this->initialized['gmailPostmasterSpamRatePercent'] = true;
        $this->gmailPostmasterSpamRatePercent = $gmailPostmasterSpamRatePercent;
        return $this;
    }
}
