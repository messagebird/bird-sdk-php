<?php

namespace MessageBird\Wire\Model;

class EmailStatsQueryPoint
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
     * Nominal bucket start as a UTC RFC 3339 instant.
     *
     * @var \DateTime|null
     */
    protected $bucket;
    /**
     * Selected metric values. Counts are nonnegative approximate distinct counts. Period uniques and rates are computed independently of buckets; summing bucket or group values does not reconstruct period totals. Zero means a supported empty population; undefined rates and empty latency samples are null.
     *
     * @var EmailStatsQueryMetrics|null
     */
    protected $metrics;
    /**
     * Nominal bucket start as a UTC RFC 3339 instant.
     *
     * @return \DateTime|null
     */
    public function getBucket(): ?\DateTime
    {
        return $this->bucket;
    }
    /**
     * Nominal bucket start as a UTC RFC 3339 instant.
     *
     * @param \DateTime|null $bucket
     *
     * @return self
     */
    public function setBucket(?\DateTime $bucket): self
    {
        $this->initialized['bucket'] = true;
        $this->bucket = $bucket;
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
}
