<?php

namespace MessageBird\Wire\Model;

class EsimOffer
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
     * Display name of the offer.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Increments whenever the offer's terms change. Orders lock the revision they were quoted at.
     *
     * @var int|null
     */
    protected $revision;
    /**
     * Coverage zone the offer sells. Offers for the same footprint share one zone.
     *
     * @var string|null
     */
    protected $zoneId;
    /**
     * The offer's coverage zone, embedded so one read answers "where does this work". The zone resource is authoritative.
     *
     * @var EsimOfferZone|null
     */
    protected $zone;
    /**
     * Speed class. For reduced-speed offers, the bundle's data.throttled_after_bytes carries the full-speed allowance.
     *
     * @var string|null
     */
    protected $speed;
    /**
     * Whether packages from this offer can be held alongside packages from other zones on the same eSIM, subject to the eSIM's package_limit.
     *
     * @var bool|null
     */
    protected $stackable;
    /**
     * Phone service that comes with the plan, or null when the plan includes no phone number. When present, `included` says how the number is provided and the flags state which call and text directions work.
     * 
     *
     * @var EsimOfferPhone|null
     */
    protected $phone;
    /**
     * Commercial terms of the offer. Every offer in the current catalog is a bundle: a fixed allowance with a validity period for a fixed price. Match on the pricing type; treat an unrecognized type as an offer your integration cannot order yet.
     * 
     *
     * @var mixed|null
     */
    protected $pricing;
    /**
     * Billing product the offer's charges post under, as it appears on your invoice line items.
     *
     * @var string|null
     */
    protected $product;
    /**
     * @var string|null
     */
    protected $status;
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
     * Display name of the offer.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Display name of the offer.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Increments whenever the offer's terms change. Orders lock the revision they were quoted at.
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * Increments whenever the offer's terms change. Orders lock the revision they were quoted at.
     *
     * @param int|null $revision
     *
     * @return self
     */
    public function setRevision(?int $revision): self
    {
        $this->initialized['revision'] = true;
        $this->revision = $revision;
        return $this;
    }
    /**
     * Coverage zone the offer sells. Offers for the same footprint share one zone.
     *
     * @return string|null
     */
    public function getZoneId(): ?string
    {
        return $this->zoneId;
    }
    /**
     * Coverage zone the offer sells. Offers for the same footprint share one zone.
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
     * The offer's coverage zone, embedded so one read answers "where does this work". The zone resource is authoritative.
     *
     * @return EsimOfferZone|null
     */
    public function getZone(): ?EsimOfferZone
    {
        return $this->zone;
    }
    /**
     * The offer's coverage zone, embedded so one read answers "where does this work". The zone resource is authoritative.
     *
     * @param EsimOfferZone|EsimZone|array|null $zone
     *
     * @return self
     */
    public function setZone($zone): self
    {
        $this->initialized['zone'] = true;
        $this->zone = \MessageBird\Core\ModelWrapper::normalize($zone, EsimOfferZone::class);
        return $this;
    }
    /**
     * Speed class. For reduced-speed offers, the bundle's data.throttled_after_bytes carries the full-speed allowance.
     *
     * @return string|null
     */
    public function getSpeed(): ?string
    {
        return $this->speed;
    }
    /**
     * Speed class. For reduced-speed offers, the bundle's data.throttled_after_bytes carries the full-speed allowance.
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
     * Whether packages from this offer can be held alongside packages from other zones on the same eSIM, subject to the eSIM's package_limit.
     *
     * @return bool|null
     */
    public function getStackable(): ?bool
    {
        return $this->stackable;
    }
    /**
     * Whether packages from this offer can be held alongside packages from other zones on the same eSIM, subject to the eSIM's package_limit.
     *
     * @param bool|null $stackable
     *
     * @return self
     */
    public function setStackable(?bool $stackable): self
    {
        $this->initialized['stackable'] = true;
        $this->stackable = $stackable;
        return $this;
    }
    /**
     * Phone service that comes with the plan, or null when the plan includes no phone number. When present, `included` says how the number is provided and the flags state which call and text directions work.
     * 
     *
     * @return EsimOfferPhone|null
     */
    public function getPhone(): ?EsimOfferPhone
    {
        return $this->phone;
    }
    /**
     * Phone service that comes with the plan, or null when the plan includes no phone number. When present, `included` says how the number is provided and the flags state which call and text directions work.
     *
     * @param EsimOfferPhone|null $phone
     *
     * @return self
     */
    public function setPhone(?EsimOfferPhone $phone): self
    {
        $this->initialized['phone'] = true;
        $this->phone = $phone;
        return $this;
    }
    /**
     * Commercial terms of the offer. Every offer in the current catalog is a bundle: a fixed allowance with a validity period for a fixed price. Match on the pricing type; treat an unrecognized type as an offer your integration cannot order yet.
     * 
     *
     * @return mixed
     */
    public function getPricing()
    {
        return $this->pricing;
    }
    /**
     * Commercial terms of the offer. Every offer in the current catalog is a bundle: a fixed allowance with a validity period for a fixed price. Match on the pricing type; treat an unrecognized type as an offer your integration cannot order yet.
     *
     * @param mixed $pricing
     *
     * @return self
     */
    public function setPricing($pricing): self
    {
        $this->initialized['pricing'] = true;
        $this->pricing = $pricing;
        return $this;
    }
    /**
     * Billing product the offer's charges post under, as it appears on your invoice line items.
     *
     * @return string|null
     */
    public function getProduct(): ?string
    {
        return $this->product;
    }
    /**
     * Billing product the offer's charges post under, as it appears on your invoice line items.
     *
     * @param string|null $product
     *
     * @return self
     */
    public function setProduct(?string $product): self
    {
        $this->initialized['product'] = true;
        $this->product = $product;
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
