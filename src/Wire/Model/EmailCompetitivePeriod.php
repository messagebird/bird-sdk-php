<?php

namespace MessageBird\Wire\Model;

class EmailCompetitivePeriod
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
     * Length of the period in days.
     *
     * @var int|null
     */
    protected $days;
    /**
     * Start of the period, inclusive.
     *
     * @var \DateTime|null
     */
    protected $from;
    /**
     * End of the period, exclusive. Daily figures therefore run through the previous whole UTC day and never include the one in progress.
     * 
     *
     * @var \DateTime|null
     */
    protected $to;
    /**
     * Length of the period in days.
     *
     * @return int|null
     */
    public function getDays(): ?int
    {
        return $this->days;
    }
    /**
     * Length of the period in days.
     *
     * @param int|null $days
     *
     * @return self
     */
    public function setDays(?int $days): self
    {
        $this->initialized['days'] = true;
        $this->days = $days;
        return $this;
    }
    /**
     * Start of the period, inclusive.
     *
     * @return \DateTime|null
     */
    public function getFrom(): ?\DateTime
    {
        return $this->from;
    }
    /**
     * Start of the period, inclusive.
     *
     * @param \DateTime|null $from
     *
     * @return self
     */
    public function setFrom(?\DateTime $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * End of the period, exclusive. Daily figures therefore run through the previous whole UTC day and never include the one in progress.
     * 
     *
     * @return \DateTime|null
     */
    public function getTo(): ?\DateTime
    {
        return $this->to;
    }
    /**
     * End of the period, exclusive. Daily figures therefore run through the previous whole UTC day and never include the one in progress.
     *
     * @param \DateTime|null $to
     *
     * @return self
     */
    public function setTo(?\DateTime $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
}
