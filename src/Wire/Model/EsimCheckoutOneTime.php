<?php

namespace MessageBird\Wire\Model;

class EsimCheckoutOneTime
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
     * Current funding needed for this purchase, including tax and approved credit. The quoted price excludes tax; `total` includes tax for this purchase. This read reserves no funds; payment checks funding again. Test purchases have zero tax and total and are always covered.
     *
     * @var EsimCheckoutFunding|null
     */
    protected $funding;
    /**
     * The offer revision to accept when purchasing.
     *
     * @var int|null
     */
    protected $offerRevision;
    /**
     * @var Money|null
     */
    protected $price;
    /**
     * Current funding needed for this purchase, including tax and approved credit. The quoted price excludes tax; `total` includes tax for this purchase. This read reserves no funds; payment checks funding again. Test purchases have zero tax and total and are always covered.
     *
     * @return EsimCheckoutFunding|null
     */
    public function getFunding(): ?EsimCheckoutFunding
    {
        return $this->funding;
    }
    /**
     * Current funding needed for this purchase, including tax and approved credit. The quoted price excludes tax; `total` includes tax for this purchase. This read reserves no funds; payment checks funding again. Test purchases have zero tax and total and are always covered.
     *
     * @param EsimCheckoutFunding|null $funding
     *
     * @return self
     */
    public function setFunding(?EsimCheckoutFunding $funding): self
    {
        $this->initialized['funding'] = true;
        $this->funding = $funding;
        return $this;
    }
    /**
     * The offer revision to accept when purchasing.
     *
     * @return int|null
     */
    public function getOfferRevision(): ?int
    {
        return $this->offerRevision;
    }
    /**
     * The offer revision to accept when purchasing.
     *
     * @param int|null $offerRevision
     *
     * @return self
     */
    public function setOfferRevision(?int $offerRevision): self
    {
        $this->initialized['offerRevision'] = true;
        $this->offerRevision = $offerRevision;
        return $this;
    }
    /**
     * @return Money|null
     */
    public function getPrice(): ?Money
    {
        return $this->price;
    }
    /**
     * @param Money|null $price
     *
     * @return self
     */
    public function setPrice(?Money $price): self
    {
        $this->initialized['price'] = true;
        $this->price = $price;
        return $this;
    }
}
