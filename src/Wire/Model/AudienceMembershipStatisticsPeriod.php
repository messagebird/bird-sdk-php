<?php

namespace MessageBird\Wire\Model;

/**
 * Inclusive UTC date window for daily membership observations. Snapshots do not establish continuous freshness; data_as_of is always null.
 */
class AudienceMembershipStatisticsPeriod
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
     * Inclusive first UTC date.
     *
     * @var \DateTime|null
     */
    protected $from;
    /**
     * Inclusive last UTC date.
     *
     * @var \DateTime|null
     */
    protected $to;
    /**
     * Always null. Use each point's observed_at for its actual observation instant.
     *
     * @var \DateTime|null
     */
    protected $dataAsOf;
    /**
     * Inclusive first UTC date.
     *
     * @return \DateTime|null
     */
    public function getFrom(): ?\DateTime
    {
        return $this->from;
    }
    /**
     * Inclusive first UTC date.
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
     * Inclusive last UTC date.
     *
     * @return \DateTime|null
     */
    public function getTo(): ?\DateTime
    {
        return $this->to;
    }
    /**
     * Inclusive last UTC date.
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
     * Always null. Use each point's observed_at for its actual observation instant.
     *
     * @return \DateTime|null
     */
    public function getDataAsOf(): ?\DateTime
    {
        return $this->dataAsOf;
    }
    /**
     * Always null. Use each point's observed_at for its actual observation instant.
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
