<?php

namespace MessageBird\Wire\Model;

/**
 * Daily membership observations in ascending UTC date order. Missing observations are explicit null gaps; changes between samples are unobserved.
 */
class AudienceMembershipStatisticsResponse
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
     * Requested UTC date window.
     *
     * @var AudienceMembershipStatisticsResponsePeriod|null
     */
    protected $period;
    /**
     * One point for every requested date, including gaps.
     *
     * @var list<AudienceMembershipStatisticsPoint>|null
     */
    protected $data;
    /**
     * Requested UTC date window.
     *
     * @return AudienceMembershipStatisticsResponsePeriod|null
     */
    public function getPeriod(): ?AudienceMembershipStatisticsResponsePeriod
    {
        return $this->period;
    }
    /**
     * Requested UTC date window.
     *
     * @param AudienceMembershipStatisticsResponsePeriod|AudienceMembershipStatisticsPeriod|array|null $period
     *
     * @return self
     */
    public function setPeriod($period): self
    {
        $this->initialized['period'] = true;
        $this->period = \MessageBird\Core\ModelWrapper::normalize($period, AudienceMembershipStatisticsResponsePeriod::class);
        return $this;
    }
    /**
     * One point for every requested date, including gaps.
     *
     * @return list<AudienceMembershipStatisticsPoint>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * One point for every requested date, including gaps.
     *
     * @param list<AudienceMembershipStatisticsPoint>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}
