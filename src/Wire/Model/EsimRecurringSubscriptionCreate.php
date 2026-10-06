<?php

namespace MessageBird\Wire\Model;

class EsimRecurringSubscriptionCreate
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
    protected $esimId;
    /**
     * @var string|null
     */
    protected $offerId;
    /**
     * The accepted offer revision.
     *
     * @var int|null
     */
    protected $offerRevision;
    /**
     * The accepted recurring configuration revision.
     *
     * @var int|null
     */
    protected $recurrenceRevision;
    /**
     * @var Money|null
     */
    protected $acceptedPrice;
    /**
     * @return string|null
     */
    public function getEsimId(): ?string
    {
        return $this->esimId;
    }
    /**
     * @param string|null $esimId
     *
     * @return self
     */
    public function setEsimId(?string $esimId): self
    {
        $this->initialized['esimId'] = true;
        $this->esimId = $esimId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getOfferId(): ?string
    {
        return $this->offerId;
    }
    /**
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
     * The accepted offer revision.
     *
     * @return int|null
     */
    public function getOfferRevision(): ?int
    {
        return $this->offerRevision;
    }
    /**
     * The accepted offer revision.
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
     * The accepted recurring configuration revision.
     *
     * @return int|null
     */
    public function getRecurrenceRevision(): ?int
    {
        return $this->recurrenceRevision;
    }
    /**
     * The accepted recurring configuration revision.
     *
     * @param int|null $recurrenceRevision
     *
     * @return self
     */
    public function setRecurrenceRevision(?int $recurrenceRevision): self
    {
        $this->initialized['recurrenceRevision'] = true;
        $this->recurrenceRevision = $recurrenceRevision;
        return $this;
    }
    /**
     * @return Money|null
     */
    public function getAcceptedPrice(): ?Money
    {
        return $this->acceptedPrice;
    }
    /**
     * @param Money|null $acceptedPrice
     *
     * @return self
     */
    public function setAcceptedPrice(?Money $acceptedPrice): self
    {
        $this->initialized['acceptedPrice'] = true;
        $this->acceptedPrice = $acceptedPrice;
        return $this;
    }
}
