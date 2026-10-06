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
