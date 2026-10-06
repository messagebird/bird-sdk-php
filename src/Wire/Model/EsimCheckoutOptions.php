<?php

namespace MessageBird\Wire\Model;

class EsimCheckoutOptions
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
    protected $offerId;
    /**
     * Published one-time purchase terms before tax.
     *
     * @var EsimCheckoutOneTime|null
     */
    protected $oneTime;
    /**
     * When available is true, quote contains the recurring terms and unavailable_reason is null. Otherwise quote is null and unavailable_reason explains why renewal is unavailable.
     *
     * @var EsimCheckoutRecurrence|null
     */
    protected $recurrence;
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
     * Published one-time purchase terms before tax.
     *
     * @return EsimCheckoutOneTime|null
     */
    public function getOneTime(): ?EsimCheckoutOneTime
    {
        return $this->oneTime;
    }
    /**
     * Published one-time purchase terms before tax.
     *
     * @param EsimCheckoutOneTime|null $oneTime
     *
     * @return self
     */
    public function setOneTime(?EsimCheckoutOneTime $oneTime): self
    {
        $this->initialized['oneTime'] = true;
        $this->oneTime = $oneTime;
        return $this;
    }
    /**
     * When available is true, quote contains the recurring terms and unavailable_reason is null. Otherwise quote is null and unavailable_reason explains why renewal is unavailable.
     *
     * @return EsimCheckoutRecurrence|null
     */
    public function getRecurrence(): ?EsimCheckoutRecurrence
    {
        return $this->recurrence;
    }
    /**
     * When available is true, quote contains the recurring terms and unavailable_reason is null. Otherwise quote is null and unavailable_reason explains why renewal is unavailable.
     *
     * @param EsimCheckoutRecurrence|null $recurrence
     *
     * @return self
     */
    public function setRecurrence(?EsimCheckoutRecurrence $recurrence): self
    {
        $this->initialized['recurrence'] = true;
        $this->recurrence = $recurrence;
        return $this;
    }
}
