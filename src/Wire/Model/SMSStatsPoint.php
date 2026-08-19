<?php

namespace MessageBird\Wire\Model;

class SMSStatsPoint
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
     * The day (YYYY-MM-DD) or hour (RFC 3339, on the hour) this point covers, matching the period's grain.
     *
     * @var string|null
     */
    protected $bucket;
    /**
     * @var SMSStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * The day (YYYY-MM-DD) or hour (RFC 3339, on the hour) this point covers, matching the period's grain.
     *
     * @return string|null
     */
    public function getBucket(): ?string
    {
        return $this->bucket;
    }
    /**
     * The day (YYYY-MM-DD) or hour (RFC 3339, on the hour) this point covers, matching the period's grain.
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
     * @return SMSStatsPointDelivery|null
     */
    public function getDelivery(): ?SMSStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param SMSStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?SMSStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
}
