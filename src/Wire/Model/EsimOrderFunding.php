<?php

namespace MessageBird\Wire\Model;

class EsimOrderFunding extends \ArrayObject
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
     * Total wallet balance required for the charge, including tax. This is the required balance rather than the amount to add. Compare it with your current wallet balance.
     *
     * @var EsimOrderFundingRequiredAmount|null
     */
    protected $requiredAmount;
    /**
     * Earliest time a further insufficient-funds attempt can fail the order. Adding funds after this time can still complete the purchase before that attempt. Check the order status to determine whether it remains payable.
     *
     * @var \DateTime|null
     */
    protected $lapsesAt;
    /**
     * Total wallet balance required for the charge, including tax. This is the required balance rather than the amount to add. Compare it with your current wallet balance.
     *
     * @return EsimOrderFundingRequiredAmount|null
     */
    public function getRequiredAmount(): ?EsimOrderFundingRequiredAmount
    {
        return $this->requiredAmount;
    }
    /**
     * Total wallet balance required for the charge, including tax. This is the required balance rather than the amount to add. Compare it with your current wallet balance.
     *
     * @param EsimOrderFundingRequiredAmount|Money|array|null $requiredAmount
     *
     * @return self
     */
    public function setRequiredAmount($requiredAmount): self
    {
        $this->initialized['requiredAmount'] = true;
        $this->requiredAmount = \MessageBird\Core\ModelWrapper::normalize($requiredAmount, EsimOrderFundingRequiredAmount::class);
        return $this;
    }
    /**
     * Earliest time a further insufficient-funds attempt can fail the order. Adding funds after this time can still complete the purchase before that attempt. Check the order status to determine whether it remains payable.
     *
     * @return \DateTime|null
     */
    public function getLapsesAt(): ?\DateTime
    {
        return $this->lapsesAt;
    }
    /**
     * Earliest time a further insufficient-funds attempt can fail the order. Adding funds after this time can still complete the purchase before that attempt. Check the order status to determine whether it remains payable.
     *
     * @param \DateTime|null $lapsesAt
     *
     * @return self
     */
    public function setLapsesAt(?\DateTime $lapsesAt): self
    {
        $this->initialized['lapsesAt'] = true;
        $this->lapsesAt = $lapsesAt;
        return $this;
    }
}
