<?php

namespace MessageBird\Wire\Model;

class SMSStatsSeriesPeriod
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
     * Inclusive start of the window. A calendar day (YYYY-MM-DD) on the day grain, an RFC 3339 instant rounded to the hour on the hour grain.
     *
     * @var string|null
     */
    protected $from;
    /**
     * Inclusive end of the window. A calendar day (YYYY-MM-DD) on the day grain, an RFC 3339 instant rounded to the hour on the hour grain.
     *
     * @var string|null
     */
    protected $to;
    /**
     * The bucket grain of the series, either `day` or `hour`.
     *
     * @var string|null
     */
    protected $grain;
    /**
     * Latest time reflected in the statistics. More recent events might not be included yet. Null when the freshness boundary is unavailable.
     * 
     *
     * @var \DateTime|null
     */
    protected $dataAsOf;
    /**
     * Inclusive start of the window. A calendar day (YYYY-MM-DD) on the day grain, an RFC 3339 instant rounded to the hour on the hour grain.
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * Inclusive start of the window. A calendar day (YYYY-MM-DD) on the day grain, an RFC 3339 instant rounded to the hour on the hour grain.
     *
     * @param string|null $from
     *
     * @return self
     */
    public function setFrom(?string $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * Inclusive end of the window. A calendar day (YYYY-MM-DD) on the day grain, an RFC 3339 instant rounded to the hour on the hour grain.
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * Inclusive end of the window. A calendar day (YYYY-MM-DD) on the day grain, an RFC 3339 instant rounded to the hour on the hour grain.
     *
     * @param string|null $to
     *
     * @return self
     */
    public function setTo(?string $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * The bucket grain of the series, either `day` or `hour`.
     *
     * @return string|null
     */
    public function getGrain(): ?string
    {
        return $this->grain;
    }
    /**
     * The bucket grain of the series, either `day` or `hour`.
     *
     * @param string|null $grain
     *
     * @return self
     */
    public function setGrain(?string $grain): self
    {
        $this->initialized['grain'] = true;
        $this->grain = $grain;
        return $this;
    }
    /**
     * Latest time reflected in the statistics. More recent events might not be included yet. Null when the freshness boundary is unavailable.
     * 
     *
     * @return \DateTime|null
     */
    public function getDataAsOf(): ?\DateTime
    {
        return $this->dataAsOf;
    }
    /**
     * Latest time reflected in the statistics. More recent events might not be included yet. Null when the freshness boundary is unavailable.
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
