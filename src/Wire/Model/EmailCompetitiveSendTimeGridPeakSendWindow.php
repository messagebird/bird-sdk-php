<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveSendTimeGridPeakSendWindow extends \ArrayObject
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
     * The first hour of the window, in the timezone the response reports.
     *
     * @var int|null
     */
    protected $startHour;
    /**
     * The hour the window ends at, exclusive: a window of `13` to `14` covers 13:00 to
     * 14:00. The window is always one hour wide on this endpoint, so this is always the
     * hour after `start_hour`. The pair is kept rather than collapsed because the panel
     * computes the window at whatever width it was asked for, and only this endpoint
     * pins that to an hour.
     * 
     * It can therefore be lower than `start_hour` in exactly one case: a peak at 23:00,
     * whose window runs past midnight and ends at `0`.
     * 
     *
     * @var int|null
     */
    protected $endHour;
    /**
     * Share of everything the brand sent over the period that fell in this window.
     * 
     * This is the panel's own figure, while a cell's `share_percent` is recomputed from
     * the cells in the response. Adding up this hour's seven cells should therefore land
     * on this number but is not guaranteed to; where they disagree, this one is the
     * panel's answer about its own peak and the cells are the arithmetic behind the grid.
     * 
     *
     * @var float|null
     */
    protected $sharePercent;
    /**
     * The first hour of the window, in the timezone the response reports.
     *
     * @return int|null
     */
    public function getStartHour(): ?int
    {
        return $this->startHour;
    }
    /**
     * The first hour of the window, in the timezone the response reports.
     *
     * @param int|null $startHour
     *
     * @return self
     */
    public function setStartHour(?int $startHour): self
    {
        $this->initialized['startHour'] = true;
        $this->startHour = $startHour;
        return $this;
    }
    /**
     * The hour the window ends at, exclusive: a window of `13` to `14` covers 13:00 to
     * 14:00. The window is always one hour wide on this endpoint, so this is always the
     * hour after `start_hour`. The pair is kept rather than collapsed because the panel
     * computes the window at whatever width it was asked for, and only this endpoint
     * pins that to an hour.
     * 
     * It can therefore be lower than `start_hour` in exactly one case: a peak at 23:00,
     * whose window runs past midnight and ends at `0`.
     * 
     *
     * @return int|null
     */
    public function getEndHour(): ?int
    {
        return $this->endHour;
    }
    /**
    * The hour the window ends at, exclusive: a window of `13` to `14` covers 13:00 to
    14:00. The window is always one hour wide on this endpoint, so this is always the
    hour after `start_hour`. The pair is kept rather than collapsed because the panel
    computes the window at whatever width it was asked for, and only this endpoint
    pins that to an hour.
    
    It can therefore be lower than `start_hour` in exactly one case: a peak at 23:00,
    whose window runs past midnight and ends at `0`.
    
    *
    * @param int|null $endHour
    *
    * @return self
    */
    public function setEndHour(?int $endHour): self
    {
        $this->initialized['endHour'] = true;
        $this->endHour = $endHour;
        return $this;
    }
    /**
     * Share of everything the brand sent over the period that fell in this window.
     * 
     * This is the panel's own figure, while a cell's `share_percent` is recomputed from
     * the cells in the response. Adding up this hour's seven cells should therefore land
     * on this number but is not guaranteed to; where they disagree, this one is the
     * panel's answer about its own peak and the cells are the arithmetic behind the grid.
     * 
     *
     * @return float|null
     */
    public function getSharePercent(): ?float
    {
        return $this->sharePercent;
    }
    /**
    * Share of everything the brand sent over the period that fell in this window.
    
    This is the panel's own figure, while a cell's `share_percent` is recomputed from
    the cells in the response. Adding up this hour's seven cells should therefore land
    on this number but is not guaranteed to; where they disagree, this one is the
    panel's answer about its own peak and the cells are the arithmetic behind the grid.
    
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
}
