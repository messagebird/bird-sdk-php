<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsBlocklistListing
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
     * Whether this listing is in force now. A false entry is history: it shows the target was listed and has since cleared, which is why the target's `is_listed` can be false while listings are present.
     * 
     *
     * @var bool|null
     */
    protected $isActive;
    /**
     * The provider's own short code for the listing reason, or null when it gives none. Stable where the prose in `reason` is not, so branch on this and display that.
     * 
     *
     * @var string|null
     */
    protected $reasonCode;
    /**
     * The blocklist that carries the listing. Providers publishing several lists are reported per list rather than under one combined name, because what a listing means and how it is cleared differ per list.
     * 
     *
     * @var string|null
     */
    protected $provider;
    /**
     * The reason the provider gives for the listing, or null when it publishes none.
     *
     * @var string|null
     */
    protected $reason;
    /**
     * When this listing was first observed.
     *
     * @var \DateTime|null
     */
    protected $firstDetected;
    /**
     * When this listing was most recently observed, or null while the listing is still in force. A provider records a last sighting only once one exists, so a null here reads as "still listed" rather than "never seen".
     * 
     *
     * @var \DateTime|null
     */
    protected $lastDetected;
    /**
     * Whether this listing is in force now. A false entry is history: it shows the target was listed and has since cleared, which is why the target's `is_listed` can be false while listings are present.
     * 
     *
     * @return bool|null
     */
    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }
    /**
     * Whether this listing is in force now. A false entry is history: it shows the target was listed and has since cleared, which is why the target's `is_listed` can be false while listings are present.
     *
     * @param bool|null $isActive
     *
     * @return self
     */
    public function setIsActive(?bool $isActive): self
    {
        $this->initialized['isActive'] = true;
        $this->isActive = $isActive;
        return $this;
    }
    /**
     * The provider's own short code for the listing reason, or null when it gives none. Stable where the prose in `reason` is not, so branch on this and display that.
     * 
     *
     * @return string|null
     */
    public function getReasonCode(): ?string
    {
        return $this->reasonCode;
    }
    /**
     * The provider's own short code for the listing reason, or null when it gives none. Stable where the prose in `reason` is not, so branch on this and display that.
     *
     * @param string|null $reasonCode
     *
     * @return self
     */
    public function setReasonCode(?string $reasonCode): self
    {
        $this->initialized['reasonCode'] = true;
        $this->reasonCode = $reasonCode;
        return $this;
    }
    /**
     * The blocklist that carries the listing. Providers publishing several lists are reported per list rather than under one combined name, because what a listing means and how it is cleared differ per list.
     * 
     *
     * @return string|null
     */
    public function getProvider(): ?string
    {
        return $this->provider;
    }
    /**
     * The blocklist that carries the listing. Providers publishing several lists are reported per list rather than under one combined name, because what a listing means and how it is cleared differ per list.
     *
     * @param string|null $provider
     *
     * @return self
     */
    public function setProvider(?string $provider): self
    {
        $this->initialized['provider'] = true;
        $this->provider = $provider;
        return $this;
    }
    /**
     * The reason the provider gives for the listing, or null when it publishes none.
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
     * The reason the provider gives for the listing, or null when it publishes none.
     *
     * @param string|null $reason
     *
     * @return self
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;
        return $this;
    }
    /**
     * When this listing was first observed.
     *
     * @return \DateTime|null
     */
    public function getFirstDetected(): ?\DateTime
    {
        return $this->firstDetected;
    }
    /**
     * When this listing was first observed.
     *
     * @param \DateTime|null $firstDetected
     *
     * @return self
     */
    public function setFirstDetected(?\DateTime $firstDetected): self
    {
        $this->initialized['firstDetected'] = true;
        $this->firstDetected = $firstDetected;
        return $this;
    }
    /**
     * When this listing was most recently observed, or null while the listing is still in force. A provider records a last sighting only once one exists, so a null here reads as "still listed" rather than "never seen".
     * 
     *
     * @return \DateTime|null
     */
    public function getLastDetected(): ?\DateTime
    {
        return $this->lastDetected;
    }
    /**
     * When this listing was most recently observed, or null while the listing is still in force. A provider records a last sighting only once one exists, so a null here reads as "still listed" rather than "never seen".
     *
     * @param \DateTime|null $lastDetected
     *
     * @return self
     */
    public function setLastDetected(?\DateTime $lastDetected): self
    {
        $this->initialized['lastDetected'] = true;
        $this->lastDetected = $lastDetected;
        return $this;
    }
}
