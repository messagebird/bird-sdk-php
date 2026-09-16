<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveWatchlistSummary
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
     * Your share of everything the watched set sent over the period, your own sending included in the total. Your half of the ratio is an exact count of your own sending while the rest is the panel's estimate, so the two sides are measured differently.
     * 
     *
     * @var float|null
     */
    protected $shareOfVolumePercent;
    /**
     * How that share moved against the period immediately before, in percentage points. A share that went from 11.7 to 10.5 reports -1.2.
     * 
     *
     * @var float|null
     */
    protected $shareOfVolumeChangePoints;
    /**
     * Estimated volume the watched brands sent between them, excluding your own sending. A panel estimate, so read it as an order of magnitude rather than a count.
     * 
     *
     * @var int|null
     */
    protected $competitorSends;
    /**
     * Change in that volume against the period immediately before.
     *
     * @var float|null
     */
    protected $competitorSendsChangePercent;
    /**
     * Median campaigns per week across the brands you watch, per sending domain. Your own row is excluded, since it is the figure being held against this one.
     * 
     *
     * @var float|null
     */
    protected $peerCadenceMedianPerWeek;
    /**
     * Median inbox placement across the brands you watch. Your own row is excluded, as with the cadence median.
     * 
     *
     * @var float|null
     */
    protected $peerInboxPlacementMedianRate;
    /**
     * Your share of everything the watched set sent over the period, your own sending included in the total. Your half of the ratio is an exact count of your own sending while the rest is the panel's estimate, so the two sides are measured differently.
     * 
     *
     * @return float|null
     */
    public function getShareOfVolumePercent(): ?float
    {
        return $this->shareOfVolumePercent;
    }
    /**
     * Your share of everything the watched set sent over the period, your own sending included in the total. Your half of the ratio is an exact count of your own sending while the rest is the panel's estimate, so the two sides are measured differently.
     *
     * @param float|null $shareOfVolumePercent
     *
     * @return self
     */
    public function setShareOfVolumePercent(?float $shareOfVolumePercent): self
    {
        $this->initialized['shareOfVolumePercent'] = true;
        $this->shareOfVolumePercent = $shareOfVolumePercent;
        return $this;
    }
    /**
     * How that share moved against the period immediately before, in percentage points. A share that went from 11.7 to 10.5 reports -1.2.
     * 
     *
     * @return float|null
     */
    public function getShareOfVolumeChangePoints(): ?float
    {
        return $this->shareOfVolumeChangePoints;
    }
    /**
     * How that share moved against the period immediately before, in percentage points. A share that went from 11.7 to 10.5 reports -1.2.
     *
     * @param float|null $shareOfVolumeChangePoints
     *
     * @return self
     */
    public function setShareOfVolumeChangePoints(?float $shareOfVolumeChangePoints): self
    {
        $this->initialized['shareOfVolumeChangePoints'] = true;
        $this->shareOfVolumeChangePoints = $shareOfVolumeChangePoints;
        return $this;
    }
    /**
     * Estimated volume the watched brands sent between them, excluding your own sending. A panel estimate, so read it as an order of magnitude rather than a count.
     * 
     *
     * @return int|null
     */
    public function getCompetitorSends(): ?int
    {
        return $this->competitorSends;
    }
    /**
     * Estimated volume the watched brands sent between them, excluding your own sending. A panel estimate, so read it as an order of magnitude rather than a count.
     *
     * @param int|null $competitorSends
     *
     * @return self
     */
    public function setCompetitorSends(?int $competitorSends): self
    {
        $this->initialized['competitorSends'] = true;
        $this->competitorSends = $competitorSends;
        return $this;
    }
    /**
     * Change in that volume against the period immediately before.
     *
     * @return float|null
     */
    public function getCompetitorSendsChangePercent(): ?float
    {
        return $this->competitorSendsChangePercent;
    }
    /**
     * Change in that volume against the period immediately before.
     *
     * @param float|null $competitorSendsChangePercent
     *
     * @return self
     */
    public function setCompetitorSendsChangePercent(?float $competitorSendsChangePercent): self
    {
        $this->initialized['competitorSendsChangePercent'] = true;
        $this->competitorSendsChangePercent = $competitorSendsChangePercent;
        return $this;
    }
    /**
     * Median campaigns per week across the brands you watch, per sending domain. Your own row is excluded, since it is the figure being held against this one.
     * 
     *
     * @return float|null
     */
    public function getPeerCadenceMedianPerWeek(): ?float
    {
        return $this->peerCadenceMedianPerWeek;
    }
    /**
     * Median campaigns per week across the brands you watch, per sending domain. Your own row is excluded, since it is the figure being held against this one.
     *
     * @param float|null $peerCadenceMedianPerWeek
     *
     * @return self
     */
    public function setPeerCadenceMedianPerWeek(?float $peerCadenceMedianPerWeek): self
    {
        $this->initialized['peerCadenceMedianPerWeek'] = true;
        $this->peerCadenceMedianPerWeek = $peerCadenceMedianPerWeek;
        return $this;
    }
    /**
     * Median inbox placement across the brands you watch. Your own row is excluded, as with the cadence median.
     * 
     *
     * @return float|null
     */
    public function getPeerInboxPlacementMedianRate(): ?float
    {
        return $this->peerInboxPlacementMedianRate;
    }
    /**
     * Median inbox placement across the brands you watch. Your own row is excluded, as with the cadence median.
     *
     * @param float|null $peerInboxPlacementMedianRate
     *
     * @return self
     */
    public function setPeerInboxPlacementMedianRate(?float $peerInboxPlacementMedianRate): self
    {
        $this->initialized['peerInboxPlacementMedianRate'] = true;
        $this->peerInboxPlacementMedianRate = $peerInboxPlacementMedianRate;
        return $this;
    }
}
