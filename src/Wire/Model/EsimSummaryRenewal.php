<?php

namespace MessageBird\Wire\Model;

/**
 * The eSIM's recurring subscription that has not ended. Fetch the subscription by id for its price, cadence, next charge and period history.
 */
class EsimSummaryRenewal extends \ArrayObject
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
    protected $subscriptionId;
    /**
     * Delivery state of the recurring service. Check payment and renewal fields separately.
     * 
     * - `pending`: enrollment or the initial purchase is still being processed.
     * - `active`: the service has delivered a package and remains active.
     * - `needs_attention`: delivery or a related credit remains unresolved. Check period history and the associated order before purchasing a replacement.
     * - `ended`: recurrence has ended. Previously delivered packages keep their own validity.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * @return string|null
     */
    public function getSubscriptionId(): ?string
    {
        return $this->subscriptionId;
    }
    /**
     * @param string|null $subscriptionId
     *
     * @return self
     */
    public function setSubscriptionId(?string $subscriptionId): self
    {
        $this->initialized['subscriptionId'] = true;
        $this->subscriptionId = $subscriptionId;
        return $this;
    }
    /**
     * Delivery state of the recurring service. Check payment and renewal fields separately.
     * 
     * - `pending`: enrollment or the initial purchase is still being processed.
     * - `active`: the service has delivered a package and remains active.
     * - `needs_attention`: delivery or a related credit remains unresolved. Check period history and the associated order before purchasing a replacement.
     * - `ended`: recurrence has ended. Previously delivered packages keep their own validity.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Delivery state of the recurring service. Check payment and renewal fields separately.
    
    - `pending`: enrollment or the initial purchase is still being processed.
    - `active`: the service has delivered a package and remains active.
    - `needs_attention`: delivery or a related credit remains unresolved. Check period history and the associated order before purchasing a replacement.
    - `ended`: recurrence has ended. Previously delivered packages keep their own validity.
    
    *
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
}
