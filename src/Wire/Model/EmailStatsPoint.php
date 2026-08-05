<?php

namespace MessageBird\Wire\Model;

class EmailStatsPoint
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
     * The day (YYYY-MM-DD, in the requested `timezone`) or hour this point covers, matching the period's grain. An hour bucket is an RFC 3339 UTC instant marking the start of the hour; it falls on a local hour boundary when `timezone` is set, which is on the UTC hour only for whole-hour offsets.
     *
     * @var string|null
     */
    protected $bucket;
    /**
     * Distinct email messages accepted in this bucket, counted at the message level (one per accepted send regardless of how many recipients it addresses). Every other metric in `delivery` and `engagement` is recipient-level or event-level.
     * 
     *
     * @var int|null
     */
    protected $sendsAccepted;
    /**
     * @var EmailStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var EmailStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * @var EmailStatsPointLatency|null
     */
    protected $latency;
    /**
     * The day (YYYY-MM-DD, in the requested `timezone`) or hour this point covers, matching the period's grain. An hour bucket is an RFC 3339 UTC instant marking the start of the hour; it falls on a local hour boundary when `timezone` is set, which is on the UTC hour only for whole-hour offsets.
     *
     * @return string|null
     */
    public function getBucket(): ?string
    {
        return $this->bucket;
    }
    /**
     * The day (YYYY-MM-DD, in the requested `timezone`) or hour this point covers, matching the period's grain. An hour bucket is an RFC 3339 UTC instant marking the start of the hour; it falls on a local hour boundary when `timezone` is set, which is on the UTC hour only for whole-hour offsets.
     *
     * @param string|null $bucket
     *
     * @return self
     */
    public function setBucket(?string $bucket): self
    {
        $this->initialized['bucket'] = true;
        $this->bucket = $bucket;
        return $this;
    }
    /**
     * Distinct email messages accepted in this bucket, counted at the message level (one per accepted send regardless of how many recipients it addresses). Every other metric in `delivery` and `engagement` is recipient-level or event-level.
     * 
     *
     * @return int|null
     */
    public function getSendsAccepted(): ?int
    {
        return $this->sendsAccepted;
    }
    /**
     * Distinct email messages accepted in this bucket, counted at the message level (one per accepted send regardless of how many recipients it addresses). Every other metric in `delivery` and `engagement` is recipient-level or event-level.
     *
     * @param int|null $sendsAccepted
     *
     * @return self
     */
    public function setSendsAccepted(?int $sendsAccepted): self
    {
        $this->initialized['sendsAccepted'] = true;
        $this->sendsAccepted = $sendsAccepted;
        return $this;
    }
    /**
     * @return EmailStatsPointDelivery|null
     */
    public function getDelivery(): ?EmailStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param EmailStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?EmailStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return EmailStatsPointEngagement|null
     */
    public function getEngagement(): ?EmailStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param EmailStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?EmailStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return EmailStatsPointLatency|null
     */
    public function getLatency(): ?EmailStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param EmailStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?EmailStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
}
