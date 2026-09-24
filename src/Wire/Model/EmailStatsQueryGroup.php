<?php

namespace MessageBird\Wire\Model;

class EmailStatsQueryGroup
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
     * Contains the requested group_by property, including a null value when context is missing. Ungrouped results use an empty object.
     *
     * @var EmailStatsQueryDimensions|null
     */
    protected $dimensions;
    /**
     * Selected metric values. Counts are nonnegative approximate distinct counts. Period uniques and rates are computed independently of buckets; summing bucket or group values does not reconstruct period totals. Zero means a supported empty population; undefined rates and empty latency samples are null.
     *
     * @var EmailStatsQueryMetrics|null
     */
    protected $metrics;
    /**
     * Present when grain is requested; absent otherwise.
     *
     * @var list<EmailStatsQueryPoint>|null
     */
    protected $series;
    /**
     * Contains the requested group_by property, including a null value when context is missing. Ungrouped results use an empty object.
     *
     * @return EmailStatsQueryDimensions|null
     */
    public function getDimensions(): ?EmailStatsQueryDimensions
    {
        return $this->dimensions;
    }
    /**
     * Contains the requested group_by property, including a null value when context is missing. Ungrouped results use an empty object.
     *
     * @param EmailStatsQueryDimensions|null $dimensions
     *
     * @return self
     */
    public function setDimensions(?EmailStatsQueryDimensions $dimensions): self
    {
        $this->initialized['dimensions'] = true;
        $this->dimensions = $dimensions;
        return $this;
    }
    /**
     * Selected metric values. Counts are nonnegative approximate distinct counts. Period uniques and rates are computed independently of buckets; summing bucket or group values does not reconstruct period totals. Zero means a supported empty population; undefined rates and empty latency samples are null.
     *
     * @return EmailStatsQueryMetrics|null
     */
    public function getMetrics(): ?EmailStatsQueryMetrics
    {
        return $this->metrics;
    }
    /**
     * Selected metric values. Counts are nonnegative approximate distinct counts. Period uniques and rates are computed independently of buckets; summing bucket or group values does not reconstruct period totals. Zero means a supported empty population; undefined rates and empty latency samples are null.
     *
     * @param EmailStatsQueryMetrics|null $metrics
     *
     * @return self
     */
    public function setMetrics(?EmailStatsQueryMetrics $metrics): self
    {
        $this->initialized['metrics'] = true;
        $this->metrics = $metrics;
        return $this;
    }
    /**
     * Present when grain is requested; absent otherwise.
     *
     * @return list<EmailStatsQueryPoint>|null
     */
    public function getSeries(): ?array
    {
        return $this->series;
    }
    /**
     * Present when grain is requested; absent otherwise.
     *
     * @param list<EmailStatsQueryPoint>|null $series
     *
     * @return self
     */
    public function setSeries(?array $series): self
    {
        $this->initialized['series'] = true;
        $this->series = $series;
        return $this;
    }
}
