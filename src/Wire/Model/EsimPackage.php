<?php

namespace MessageBird\Wire\Model;

class EsimPackage
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
     * @var string|null
     */
    protected $id;
    /**
     * The order that purchased this package.
     *
     * @var string|null
     */
    protected $orderId;
    /**
     * Offer this package was purchased from.
     *
     * @var string|null
     */
    protected $offerId;
    /**
     * Coverage zone the package draws on. The name and countries below are captured at purchase time; the zone resource carries the live footprint.
     *
     * @var string|null
     */
    protected $zoneId;
    /**
     * Coverage zone name, from the offer.
     *
     * @var string|null
     */
    protected $zoneName;
    /**
     * Countries the package's zone covers, captured at purchase time so the package is meaningful without fetching the offer.
     * 
     *
     * @var list<string>|null
     */
    protected $countries;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * Speed class, from the offer.
     *
     * @var string|null
     */
    protected $speed;
    /**
     * @var EsimPackageBalanceWrapper|null
     */
    protected $balance;
    /**
     * When the package started consuming data (first use in its zone). Null until then.
     *
     * @var \DateTime|null
     */
    protected $activatedAt;
    /**
     * When the package's validity ends and unused balance expires. Already capped by the eSIM's service period, so this is always the effective expiry. Null until the package activates.
     * 
     *
     * @var \DateTime|null
     */
    protected $expiresAt;
    /**
     * What your workspace was billed for this package.
     *
     * @var EsimPackagePrice|null
     */
    protected $price;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The order that purchased this package.
     *
     * @return string|null
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }
    /**
     * The order that purchased this package.
     *
     * @param string|null $orderId
     *
     * @return self
     */
    public function setOrderId(?string $orderId): self
    {
        $this->initialized['orderId'] = true;
        $this->orderId = $orderId;
        return $this;
    }
    /**
     * Offer this package was purchased from.
     *
     * @return string|null
     */
    public function getOfferId(): ?string
    {
        return $this->offerId;
    }
    /**
     * Offer this package was purchased from.
     *
     * @param string|null $offerId
     *
     * @return self
     */
    public function setOfferId(?string $offerId): self
    {
        $this->initialized['offerId'] = true;
        $this->offerId = $offerId;
        return $this;
    }
    /**
     * Coverage zone the package draws on. The name and countries below are captured at purchase time; the zone resource carries the live footprint.
     *
     * @return string|null
     */
    public function getZoneId(): ?string
    {
        return $this->zoneId;
    }
    /**
     * Coverage zone the package draws on. The name and countries below are captured at purchase time; the zone resource carries the live footprint.
     *
     * @param string|null $zoneId
     *
     * @return self
     */
    public function setZoneId(?string $zoneId): self
    {
        $this->initialized['zoneId'] = true;
        $this->zoneId = $zoneId;
        return $this;
    }
    /**
     * Coverage zone name, from the offer.
     *
     * @return string|null
     */
    public function getZoneName(): ?string
    {
        return $this->zoneName;
    }
    /**
     * Coverage zone name, from the offer.
     *
     * @param string|null $zoneName
     *
     * @return self
     */
    public function setZoneName(?string $zoneName): self
    {
        $this->initialized['zoneName'] = true;
        $this->zoneName = $zoneName;
        return $this;
    }
    /**
     * Countries the package's zone covers, captured at purchase time so the package is meaningful without fetching the offer.
     * 
     *
     * @return list<string>|null
     */
    public function getCountries(): ?array
    {
        return $this->countries;
    }
    /**
     * Countries the package's zone covers, captured at purchase time so the package is meaningful without fetching the offer.
     *
     * @param list<string>|null $countries
     *
     * @return self
     */
    public function setCountries(?array $countries): self
    {
        $this->initialized['countries'] = true;
        $this->countries = $countries;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
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
     * Speed class, from the offer.
     *
     * @return string|null
     */
    public function getSpeed(): ?string
    {
        return $this->speed;
    }
    /**
     * Speed class, from the offer.
     *
     * @param string|null $speed
     *
     * @return self
     */
    public function setSpeed(?string $speed): self
    {
        $this->initialized['speed'] = true;
        $this->speed = $speed;
        return $this;
    }
    /**
     * @return EsimPackageBalanceWrapper|null
     */
    public function getBalance(): ?EsimPackageBalanceWrapper
    {
        return $this->balance;
    }
    /**
     * @param EsimPackageBalanceWrapper|EsimPackageBalance|array|null $balance
     *
     * @return self
     */
    public function setBalance($balance): self
    {
        $this->initialized['balance'] = true;
        $this->balance = \MessageBird\Core\ModelWrapper::normalize($balance, EsimPackageBalanceWrapper::class);
        return $this;
    }
    /**
     * When the package started consuming data (first use in its zone). Null until then.
     *
     * @return \DateTime|null
     */
    public function getActivatedAt(): ?\DateTime
    {
        return $this->activatedAt;
    }
    /**
     * When the package started consuming data (first use in its zone). Null until then.
     *
     * @param \DateTime|null $activatedAt
     *
     * @return self
     */
    public function setActivatedAt(?\DateTime $activatedAt): self
    {
        $this->initialized['activatedAt'] = true;
        $this->activatedAt = $activatedAt;
        return $this;
    }
    /**
     * When the package's validity ends and unused balance expires. Already capped by the eSIM's service period, so this is always the effective expiry. Null until the package activates.
     * 
     *
     * @return \DateTime|null
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }
    /**
     * When the package's validity ends and unused balance expires. Already capped by the eSIM's service period, so this is always the effective expiry. Null until the package activates.
     *
     * @param \DateTime|null $expiresAt
     *
     * @return self
     */
    public function setExpiresAt(?\DateTime $expiresAt): self
    {
        $this->initialized['expiresAt'] = true;
        $this->expiresAt = $expiresAt;
        return $this;
    }
    /**
     * What your workspace was billed for this package.
     *
     * @return EsimPackagePrice|null
     */
    public function getPrice(): ?EsimPackagePrice
    {
        return $this->price;
    }
    /**
     * What your workspace was billed for this package.
     *
     * @param EsimPackagePrice|Money|array|null $price
     *
     * @return self
     */
    public function setPrice($price): self
    {
        $this->initialized['price'] = true;
        $this->price = \MessageBird\Core\ModelWrapper::normalize($price, EsimPackagePrice::class);
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
}
