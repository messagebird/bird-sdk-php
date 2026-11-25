<?php

namespace MessageBird\Wire\Model;

/**
 * Delivery, engagement, and latency figures for one Brand's email traffic over the requested period, or for historical unbranded traffic when brand_id is null.
 */
class EmailBrandStatsPoint
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
     * The Brand recorded at send time (`bnd_…`, copyable from Brands > More actions > Copy brand ID in the dashboard). Archived Brands continue to appear keyed by their ID. `null` represents historical or unattributed messages sent without a Brand and is distinct from the workspace's default Brand.
     * 
     *
     * @var string|null
     */
    protected $brandId;
    /**
     * @var EmailBrandStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var EmailBrandStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * Latency quantiles for this Brand. Retained reporting events populate `processing` and `total` quantiles; `delivery` quantiles are `null`.
     * 
     *
     * @var EmailBrandStatsPointLatency|null
     */
    protected $latency;
    /**
     * The Brand recorded at send time (`bnd_…`, copyable from Brands > More actions > Copy brand ID in the dashboard). Archived Brands continue to appear keyed by their ID. `null` represents historical or unattributed messages sent without a Brand and is distinct from the workspace's default Brand.
     * 
     *
     * @return string|null
     */
    public function getBrandId(): ?string
    {
        return $this->brandId;
    }
    /**
     * The Brand recorded at send time (`bnd_…`, copyable from Brands > More actions > Copy brand ID in the dashboard). Archived Brands continue to appear keyed by their ID. `null` represents historical or unattributed messages sent without a Brand and is distinct from the workspace's default Brand.
     *
     * @param string|null $brandId
     *
     * @return self
     */
    public function setBrandId(?string $brandId): self
    {
        $this->initialized['brandId'] = true;
        $this->brandId = $brandId;
        return $this;
    }
    /**
     * @return EmailBrandStatsPointDelivery|null
     */
    public function getDelivery(): ?EmailBrandStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param EmailBrandStatsPointDelivery|EmailDeliveryStats|array|null $delivery
     *
     * @return self
     */
    public function setDelivery($delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = \MessageBird\Core\ModelWrapper::normalize($delivery, EmailBrandStatsPointDelivery::class);
        return $this;
    }
    /**
     * @return EmailBrandStatsPointEngagement|null
     */
    public function getEngagement(): ?EmailBrandStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param EmailBrandStatsPointEngagement|EmailEngagementStats|array|null $engagement
     *
     * @return self
     */
    public function setEngagement($engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = \MessageBird\Core\ModelWrapper::normalize($engagement, EmailBrandStatsPointEngagement::class);
        return $this;
    }
    /**
     * Latency quantiles for this Brand. Retained reporting events populate `processing` and `total` quantiles; `delivery` quantiles are `null`.
     * 
     *
     * @return EmailBrandStatsPointLatency|null
     */
    public function getLatency(): ?EmailBrandStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * Latency quantiles for this Brand. Retained reporting events populate `processing` and `total` quantiles; `delivery` quantiles are `null`.
     *
     * @param EmailBrandStatsPointLatency|EmailLatencyStats|array|null $latency
     *
     * @return self
     */
    public function setLatency($latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = \MessageBird\Core\ModelWrapper::normalize($latency, EmailBrandStatsPointLatency::class);
        return $this;
    }
}
