<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsComplaintPeak
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
     * The UTC day the highest rate fell on.
     *
     * @var \DateTime|null
     */
    protected $date;
    /**
     * The rate on that day, as a percentage.
     *
     * @var float|null
     */
    protected $valuePercent;
    /**
     * The UTC day the highest rate fell on.
     *
     * @return \DateTime|null
     */
    public function getDate(): ?\DateTime
    {
        return $this->date;
    }
    /**
     * The UTC day the highest rate fell on.
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
     * The rate on that day, as a percentage.
     *
     * @return float|null
     */
    public function getValuePercent(): ?float
    {
        return $this->valuePercent;
    }
    /**
     * The rate on that day, as a percentage.
     *
     * @param float|null $valuePercent
     *
     * @return self
     */
    public function setValuePercent(?float $valuePercent): self
    {
        $this->initialized['valuePercent'] = true;
        $this->valuePercent = $valuePercent;
        return $this;
    }
}
