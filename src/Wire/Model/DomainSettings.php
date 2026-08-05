<?php

namespace MessageBird\Wire\Model;

class DomainSettings
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
     * Rewrite links in HTML email through your tracking domain to record clicks. You can enable this before your tracking domain has verified — it begins working once verification completes. A tracking domain must be configured; enabling it without one returns `409`.
     * 
     *
     * @var bool|null
     */
    protected $clickTracking = false;
    /**
     * Insert a tracking pixel in HTML email to record opens. You can enable this before your tracking domain has verified — it begins working once verification completes. A tracking domain must be configured; enabling it without one returns `409`.
     * 
     *
     * @var bool|null
     */
    protected $openTracking = false;
    /**
     * Rewrite links in HTML email through your tracking domain to record clicks. You can enable this before your tracking domain has verified — it begins working once verification completes. A tracking domain must be configured; enabling it without one returns `409`.
     * 
     *
     * @return bool|null
     */
    public function getClickTracking(): ?bool
    {
        return $this->clickTracking;
    }
    /**
     * Rewrite links in HTML email through your tracking domain to record clicks. You can enable this before your tracking domain has verified — it begins working once verification completes. A tracking domain must be configured; enabling it without one returns `409`.
     *
     * @param bool|null $clickTracking
     *
     * @return self
     */
    public function setClickTracking(?bool $clickTracking): self
    {
        $this->initialized['clickTracking'] = true;
        $this->clickTracking = $clickTracking;
        return $this;
    }
    /**
     * Insert a tracking pixel in HTML email to record opens. You can enable this before your tracking domain has verified — it begins working once verification completes. A tracking domain must be configured; enabling it without one returns `409`.
     * 
     *
     * @return bool|null
     */
    public function getOpenTracking(): ?bool
    {
        return $this->openTracking;
    }
    /**
     * Insert a tracking pixel in HTML email to record opens. You can enable this before your tracking domain has verified — it begins working once verification completes. A tracking domain must be configured; enabling it without one returns `409`.
     *
     * @param bool|null $openTracking
     *
     * @return self
     */
    public function setOpenTracking(?bool $openTracking): self
    {
        $this->initialized['openTracking'] = true;
        $this->openTracking = $openTracking;
        return $this;
    }
}
