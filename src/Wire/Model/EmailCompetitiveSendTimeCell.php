<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveSendTimeCell
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
     * A day of the week. Named rather than numbered because the two common numberings disagree about which day the week starts on.
     * 
     *
     * @var string|null
     */
    protected $weekday;
    /**
     * The hour this cell covers, in the timezone the response reports. `13` covers 13:00 to 14:00.
     * 
     *
     * @var int|null
     */
    protected $hour;
    /**
     * Share of everything the brand sent over the period that fell in this hour. It is `0` for an hour the brand demonstrably did not send in, which on a disciplined sender is the most useful thing this grid says.
     * 
     *
     * @var float|null
     */
    protected $sharePercent;
    /**
     * How strongly the brand sends in this hour, against its own busiest hour at `1`.
     * It is this cell's sending per `sample_days` divided by the busiest cell's, so it
     * is derivable from the two numbers beside it and reconciles with them rather than
     * competing: it is published because that correction is easy to get wrong, not
     * because it knows anything they do not.
     * 
     * Shade a cell by this rather than by `share_percent`: the period holds one more
     * of some weekdays than others, so a share compares an hour that came round
     * thirteen times against one that came round twelve.
     * 
     *
     * @var float|null
     */
    protected $intensity;
    /**
     * How many days of the period fell on this weekday, whether or not the brand sent on them. It is what separates an hour the brand is quiet in from one there was little chance to observe.
     * 
     *
     * @var int|null
     */
    protected $sampleDays;
    /**
     * A day of the week. Named rather than numbered because the two common numberings disagree about which day the week starts on.
     * 
     *
     * @return string|null
     */
    public function getWeekday(): ?string
    {
        return $this->weekday;
    }
    /**
     * A day of the week. Named rather than numbered because the two common numberings disagree about which day the week starts on.
     *
     * @param string|null $weekday
     *
     * @return self
     */
    public function setWeekday(?string $weekday): self
    {
        $this->initialized['weekday'] = true;
        $this->weekday = $weekday;
        return $this;
    }
    /**
     * The hour this cell covers, in the timezone the response reports. `13` covers 13:00 to 14:00.
     * 
     *
     * @return int|null
     */
    public function getHour(): ?int
    {
        return $this->hour;
    }
    /**
     * The hour this cell covers, in the timezone the response reports. `13` covers 13:00 to 14:00.
     *
     * @param int|null $hour
     *
     * @return self
     */
    public function setHour(?int $hour): self
    {
        $this->initialized['hour'] = true;
        $this->hour = $hour;
        return $this;
    }
    /**
     * Share of everything the brand sent over the period that fell in this hour. It is `0` for an hour the brand demonstrably did not send in, which on a disciplined sender is the most useful thing this grid says.
     * 
     *
     * @return float|null
     */
    public function getSharePercent(): ?float
    {
        return $this->sharePercent;
    }
    /**
     * Share of everything the brand sent over the period that fell in this hour. It is `0` for an hour the brand demonstrably did not send in, which on a disciplined sender is the most useful thing this grid says.
     *
     * @param float|null $sharePercent
     *
     * @return self
     */
    public function setSharePercent(?float $sharePercent): self
    {
        $this->initialized['sharePercent'] = true;
        $this->sharePercent = $sharePercent;
        return $this;
    }
    /**
     * How strongly the brand sends in this hour, against its own busiest hour at `1`.
     * It is this cell's sending per `sample_days` divided by the busiest cell's, so it
     * is derivable from the two numbers beside it and reconciles with them rather than
     * competing: it is published because that correction is easy to get wrong, not
     * because it knows anything they do not.
     * 
     * Shade a cell by this rather than by `share_percent`: the period holds one more
     * of some weekdays than others, so a share compares an hour that came round
     * thirteen times against one that came round twelve.
     * 
     *
     * @return float|null
     */
    public function getIntensity(): ?float
    {
        return $this->intensity;
    }
    /**
    * How strongly the brand sends in this hour, against its own busiest hour at `1`.
    It is this cell's sending per `sample_days` divided by the busiest cell's, so it
    is derivable from the two numbers beside it and reconciles with them rather than
    competing: it is published because that correction is easy to get wrong, not
    because it knows anything they do not.
    
    Shade a cell by this rather than by `share_percent`: the period holds one more
    of some weekdays than others, so a share compares an hour that came round
    thirteen times against one that came round twelve.
    
    *
    * @param float|null $intensity
    *
    * @return self
    */
    public function setIntensity(?float $intensity): self
    {
        $this->initialized['intensity'] = true;
        $this->intensity = $intensity;
        return $this;
    }
    /**
     * How many days of the period fell on this weekday, whether or not the brand sent on them. It is what separates an hour the brand is quiet in from one there was little chance to observe.
     * 
     *
     * @return int|null
     */
    public function getSampleDays(): ?int
    {
        return $this->sampleDays;
    }
    /**
     * How many days of the period fell on this weekday, whether or not the brand sent on them. It is what separates an hour the brand is quiet in from one there was little chance to observe.
     *
     * @param int|null $sampleDays
     *
     * @return self
     */
    public function setSampleDays(?int $sampleDays): self
    {
        $this->initialized['sampleDays'] = true;
        $this->sampleDays = $sampleDays;
        return $this;
    }
}
