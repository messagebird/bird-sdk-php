<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsComparedTo
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
     * First UTC day of the prior period, inclusive.
     *
     * @var \DateTime|null
     */
    protected $start;
    /**
     * Last UTC day of the prior period, inclusive.
     *
     * @var \DateTime|null
     */
    protected $end;
    /**
     * First UTC day of the prior period, inclusive.
     *
     * @return \DateTime|null
     */
    public function getStart(): ?\DateTime
    {
        return $this->start;
    }
    /**
     * First UTC day of the prior period, inclusive.
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
     * Last UTC day of the prior period, inclusive.
     *
     * @return \DateTime|null
     */
    public function getEnd(): ?\DateTime
    {
        return $this->end;
    }
    /**
     * Last UTC day of the prior period, inclusive.
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
}
