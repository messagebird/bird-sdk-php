<?php

namespace MessageBird\Wire\Model;

class WhatsAppStatsByCountryResponse
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
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants on the hour). The grain of `from` and `to` mirrors the grain of the request's bounds.
     * 
     *
     * @var WhatsAppStatsSummaryPeriod|null
     */
    protected $period;
    /**
     * Country rows ranked by accepted volume descending. Empty when no eligible activity occurred in the period; rows sum to the summary less group-send volume, and less any pre-cutover phone-addressed sends still inside the window.
     * 
     *
     * @var list<WhatsAppCountryStatsPoint>|null
     */
    protected $data;
    /**
     * Total distinct countries with activity in the period, regardless of `limit`.
     *
     * @var int|null
     */
    protected $total;
    /**
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants on the hour). The grain of `from` and `to` mirrors the grain of the request's bounds.
     * 
     *
     * @return WhatsAppStatsSummaryPeriod|null
     */
    public function getPeriod(): ?WhatsAppStatsSummaryPeriod
    {
        return $this->period;
    }
    /**
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants on the hour). The grain of `from` and `to` mirrors the grain of the request's bounds.
     *
     * @param WhatsAppStatsSummaryPeriod|null $period
     *
     * @return self
     */
    public function setPeriod(?WhatsAppStatsSummaryPeriod $period): self
    {
        $this->initialized['period'] = true;
        $this->period = $period;
        return $this;
    }
    /**
     * Country rows ranked by accepted volume descending. Empty when no eligible activity occurred in the period; rows sum to the summary less group-send volume, and less any pre-cutover phone-addressed sends still inside the window.
     * 
     *
     * @return list<WhatsAppCountryStatsPoint>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Country rows ranked by accepted volume descending. Empty when no eligible activity occurred in the period; rows sum to the summary less group-send volume, and less any pre-cutover phone-addressed sends still inside the window.
     *
     * @param list<WhatsAppCountryStatsPoint>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
    /**
     * Total distinct countries with activity in the period, regardless of `limit`.
     *
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }
    /**
     * Total distinct countries with activity in the period, regardless of `limit`.
     *
     * @param int|null $total
     *
     * @return self
     */
    public function setTotal(?int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;
        return $this;
    }
}
