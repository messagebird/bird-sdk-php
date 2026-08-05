<?php

namespace MessageBird\Wire\Model;

class EmailLatencyQuantiles
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
     * Median (50th percentile) latency in milliseconds. Null when no qualifying event contributed a measurement.
     *
     * @var int|null
     */
    protected $p50Ms;
    /**
     * 95th percentile latency in milliseconds. Null when no qualifying event contributed a measurement.
     *
     * @var int|null
     */
    protected $p95Ms;
    /**
     * 99th percentile latency in milliseconds. Null when no qualifying event contributed a measurement.
     *
     * @var int|null
     */
    protected $p99Ms;
    /**
     * Median (50th percentile) latency in milliseconds. Null when no qualifying event contributed a measurement.
     *
     * @return int|null
     */
    public function getP50Ms(): ?int
    {
        return $this->p50Ms;
    }
    /**
     * Median (50th percentile) latency in milliseconds. Null when no qualifying event contributed a measurement.
     *
     * @param int|null $p50Ms
     *
     * @return self
     */
    public function setP50Ms(?int $p50Ms): self
    {
        $this->initialized['p50Ms'] = true;
        $this->p50Ms = $p50Ms;
        return $this;
    }
    /**
     * 95th percentile latency in milliseconds. Null when no qualifying event contributed a measurement.
     *
     * @return int|null
     */
    public function getP95Ms(): ?int
    {
        return $this->p95Ms;
    }
    /**
     * 95th percentile latency in milliseconds. Null when no qualifying event contributed a measurement.
     *
     * @param int|null $p95Ms
     *
     * @return self
     */
    public function setP95Ms(?int $p95Ms): self
    {
        $this->initialized['p95Ms'] = true;
        $this->p95Ms = $p95Ms;
        return $this;
    }
    /**
     * 99th percentile latency in milliseconds. Null when no qualifying event contributed a measurement.
     *
     * @return int|null
     */
    public function getP99Ms(): ?int
    {
        return $this->p99Ms;
    }
    /**
     * 99th percentile latency in milliseconds. Null when no qualifying event contributed a measurement.
     *
     * @param int|null $p99Ms
     *
     * @return self
     */
    public function setP99Ms(?int $p99Ms): self
    {
        $this->initialized['p99Ms'] = true;
        $this->p99Ms = $p99Ms;
        return $this;
    }
}
