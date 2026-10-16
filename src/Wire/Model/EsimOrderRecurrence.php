<?php

namespace MessageBird\Wire\Model;

/**
 * Buy the first package and enable automatic renewal in one purchase. Requires subscriber_id, offer_revision and Idempotency-Key. Omit esim_id and expected_price.
 */
class EsimOrderRecurrence
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
