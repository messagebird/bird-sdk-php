<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsWindow
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
     * First UTC day of the period, inclusive.
     *
     * @var \DateTime|null
     */
    protected $start;
    /**
     * Last UTC day of the period, inclusive.
     *
     * @var \DateTime|null
     */
    protected $end;
    /**
     * The bucket size a series is grouped by. Day suits the product's charts; wider grains suit long ranges.
     * 
     *
     * @var string|null
     */
    protected $groupBy;
    /**
     * First UTC day of the period, inclusive.
     *
     * @return \DateTime|null
     */
    public function getStart(): ?\DateTime
    {
        return $this->start;
    }
    /**
     * First UTC day of the period, inclusive.
     *
     * @param \DateTime|null $start
     *
     * @return self
     */
    public function setStart(?\DateTime $start): self
    {
        $this->initialized['start'] = true;
        $this->start = $start;
        return $this;
    }
    /**
     * Last UTC day of the period, inclusive.
     *
     * @return \DateTime|null
     */
    public function getEnd(): ?\DateTime
    {
        return $this->end;
    }
    /**
     * Last UTC day of the period, inclusive.
     *
     * @param \DateTime|null $end
     *
     * @return self
     */
    public function setEnd(?\DateTime $end): self
    {
        $this->initialized['end'] = true;
        $this->end = $end;
        return $this;
    }
    /**
     * The bucket size a series is grouped by. Day suits the product's charts; wider grains suit long ranges.
     * 
     *
     * @return string|null
     */
    public function getGroupBy(): ?string
    {
        return $this->groupBy;
    }
    /**
     * The bucket size a series is grouped by. Day suits the product's charts; wider grains suit long ranges.
     *
     * @param string|null $groupBy
     *
     * @return self
     */
    public function setGroupBy(?string $groupBy): self
    {
        $this->initialized['groupBy'] = true;
        $this->groupBy = $groupBy;
        return $this;
    }
}
