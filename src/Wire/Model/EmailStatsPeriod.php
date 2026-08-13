<?php

namespace MessageBird\Wire\Model;

class EmailStatsPeriod
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
     * Inclusive start date the response covers (YYYY-MM-DD).
     *
     * @var \DateTime|null
     */
    protected $from;
    /**
     * Inclusive end date the response covers (YYYY-MM-DD).
     *
     * @var \DateTime|null
     */
    protected $to;
    /**
     * The instant the statistics in this response are current to: events recorded up to roughly this time are reflected, while more recent events may not be yet. Statistics are served from a rolling aggregation that refreshes every few seconds, so a response reflects data from up to a few seconds ago. Use this field to label data freshness (for example "as of 14:03") rather than assuming the numbers are to-the-second. Null when the freshness boundary is not being reported.
     * 
     *
     * @var \DateTime|null
     */
    protected $dataAsOf;
    /**
     * Inclusive start date the response covers (YYYY-MM-DD).
     *
     * @return \DateTime|null
     */
    public function getFrom(): ?\DateTime
    {
        return $this->from;
    }
    /**
     * Inclusive start date the response covers (YYYY-MM-DD).
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
     * Inclusive end date the response covers (YYYY-MM-DD).
     *
     * @return \DateTime|null
     */
    public function getTo(): ?\DateTime
    {
        return $this->to;
    }
    /**
     * Inclusive end date the response covers (YYYY-MM-DD).
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
    /**
     * The instant the statistics in this response are current to: events recorded up to roughly this time are reflected, while more recent events may not be yet. Statistics are served from a rolling aggregation that refreshes every few seconds, so a response reflects data from up to a few seconds ago. Use this field to label data freshness (for example "as of 14:03") rather than assuming the numbers are to-the-second. Null when the freshness boundary is not being reported.
     * 
     *
     * @return \DateTime|null
     */
    public function getDataAsOf(): ?\DateTime
    {
        return $this->dataAsOf;
    }
    /**
     * The instant the statistics in this response are current to: events recorded up to roughly this time are reflected, while more recent events may not be yet. Statistics are served from a rolling aggregation that refreshes every few seconds, so a response reflects data from up to a few seconds ago. Use this field to label data freshness (for example "as of 14:03") rather than assuming the numbers are to-the-second. Null when the freshness boundary is not being reported.
     *
     * @param \DateTime|null $dataAsOf
     *
     * @return self
     */
    public function setDataAsOf(?\DateTime $dataAsOf): self
    {
        $this->initialized['dataAsOf'] = true;
        $this->dataAsOf = $dataAsOf;
        return $this;
    }
}
