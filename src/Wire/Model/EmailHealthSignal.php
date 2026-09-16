<?php

namespace MessageBird\Wire\Model;

class EmailHealthSignal
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
     * Which rate this signal reports.
     *
     * @var string|null
     */
    protected $metric;
    /**
     * The current rate over the window, as a fraction. Null when its denominator is zero.
     *
     * @var float|null
     */
    protected $value;
    /**
     * The reference deliverability limit for this rate, as a fraction (for example `0.005` for a 0.5% bounce-rate limit). Null for metrics that have no limit, such as delivery rate and open rate. The verdict is classified using `thresholds`, which can differ from this reference limit.
     *
     * @var float|null
     */
    protected $limit;
    /**
     * This metric's individual verdict, ordered best to worst: `strong`, `healthy`, `watching`, `throttled`. `strong` applies only to `open_rate`, for an open rate well above typical. For the other rates, `healthy`, `watching`, and `throttled` indicate how close the rate is to a level that risks deliverability. The verdict follows the `thresholds` boundaries rather than the displayed reference `limit`. A signal whose `value` is null, because its denominator was zero in the window, is reported as `healthy`.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * @var EmailHealthSignalThresholds|null
     */
    protected $thresholds;
    /**
     * Which rate this signal reports.
     *
     * @return string|null
     */
    public function getMetric(): ?string
    {
        return $this->metric;
    }
    /**
     * Which rate this signal reports.
     *
     * @param string|null $metric
     *
     * @return self
     */
    public function setMetric(?string $metric): self
    {
        $this->initialized['metric'] = true;
        $this->metric = $metric;
        return $this;
    }
    /**
     * The current rate over the window, as a fraction. Null when its denominator is zero.
     *
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->value;
    }
    /**
     * The current rate over the window, as a fraction. Null when its denominator is zero.
     *
     * @param float|null $value
     *
     * @return self
     */
    public function setValue(?float $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
    /**
     * The reference deliverability limit for this rate, as a fraction (for example `0.005` for a 0.5% bounce-rate limit). Null for metrics that have no limit, such as delivery rate and open rate. The verdict is classified using `thresholds`, which can differ from this reference limit.
     *
     * @return float|null
     */
    public function getLimit(): ?float
    {
        return $this->limit;
    }
    /**
     * The reference deliverability limit for this rate, as a fraction (for example `0.005` for a 0.5% bounce-rate limit). Null for metrics that have no limit, such as delivery rate and open rate. The verdict is classified using `thresholds`, which can differ from this reference limit.
     *
     * @param float|null $limit
     *
     * @return self
     */
    public function setLimit(?float $limit): self
    {
        $this->initialized['limit'] = true;
        $this->limit = $limit;
        return $this;
    }
    /**
     * This metric's individual verdict, ordered best to worst: `strong`, `healthy`, `watching`, `throttled`. `strong` applies only to `open_rate`, for an open rate well above typical. For the other rates, `healthy`, `watching`, and `throttled` indicate how close the rate is to a level that risks deliverability. The verdict follows the `thresholds` boundaries rather than the displayed reference `limit`. A signal whose `value` is null, because its denominator was zero in the window, is reported as `healthy`.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * This metric's individual verdict, ordered best to worst: `strong`, `healthy`, `watching`, `throttled`. `strong` applies only to `open_rate`, for an open rate well above typical. For the other rates, `healthy`, `watching`, and `throttled` indicate how close the rate is to a level that risks deliverability. The verdict follows the `thresholds` boundaries rather than the displayed reference `limit`. A signal whose `value` is null, because its denominator was zero in the window, is reported as `healthy`.
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * @return EmailHealthSignalThresholds|null
     */
    public function getThresholds(): ?EmailHealthSignalThresholds
    {
        return $this->thresholds;
    }
    /**
     * @param EmailHealthSignalThresholds|null $thresholds
     *
     * @return self
     */
    public function setThresholds(?EmailHealthSignalThresholds $thresholds): self
    {
        $this->initialized['thresholds'] = true;
        $this->thresholds = $thresholds;
        return $this;
    }
}
