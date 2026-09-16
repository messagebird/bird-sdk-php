<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsDomainMonitoringResult
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
     * What switching on the main sending domain did.
     * 
     * - `enabled`: Inbox Insights is now switched on for the domain named alongside this.
     * - `already_on`: at least one domain was already switched on, so nothing changed.
     * - `choice_required`: the main sending domain could not be identified, most often
     *   because the workspace has several verified domains and no sending to rank them
     *   by. Ask the customer to choose.
     * - `no_verified_domains`: the workspace has no verified sending domain, so there is
     *   nothing to report on until one is verified.
     * 
     *
     * @var string|null
     */
    protected $outcome;
    /**
     * The sending domain this call switched on, lowercased. The server sends a domain with the `enabled` outcome and null with the other three, `already_on` included: that outcome says only that the workspace had already made its choice, not which domain it chose. Read the domain list for that. Check `outcome` first rather than treating a domain as present.
     * 
     *
     * @var string|null
     */
    protected $domain;
    /**
     * What switching on the main sending domain did.
     * 
     * - `enabled`: Inbox Insights is now switched on for the domain named alongside this.
     * - `already_on`: at least one domain was already switched on, so nothing changed.
     * - `choice_required`: the main sending domain could not be identified, most often
     *   because the workspace has several verified domains and no sending to rank them
     *   by. Ask the customer to choose.
     * - `no_verified_domains`: the workspace has no verified sending domain, so there is
     *   nothing to report on until one is verified.
     * 
     *
     * @return string|null
     */
    public function getOutcome(): ?string
    {
        return $this->outcome;
    }
    /**
    * What switching on the main sending domain did.
    
    - `enabled`: Inbox Insights is now switched on for the domain named alongside this.
    - `already_on`: at least one domain was already switched on, so nothing changed.
    - `choice_required`: the main sending domain could not be identified, most often
     because the workspace has several verified domains and no sending to rank them
     by. Ask the customer to choose.
    - `no_verified_domains`: the workspace has no verified sending domain, so there is
     nothing to report on until one is verified.
    
    *
    * @param string|null $outcome
    *
    * @return self
    */
    public function setOutcome(?string $outcome): self
    {
        $this->initialized['outcome'] = true;
        $this->outcome = $outcome;
        return $this;
    }
    /**
     * The sending domain this call switched on, lowercased. The server sends a domain with the `enabled` outcome and null with the other three, `already_on` included: that outcome says only that the workspace had already made its choice, not which domain it chose. Read the domain list for that. Check `outcome` first rather than treating a domain as present.
     * 
     *
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }
    /**
     * The sending domain this call switched on, lowercased. The server sends a domain with the `enabled` outcome and null with the other three, `already_on` included: that outcome says only that the workspace had already made its choice, not which domain it chose. Read the domain list for that. Check `outcome` first rather than treating a domain as present.
     *
     * @param string|null $domain
     *
     * @return self
     */
    public function setDomain(?string $domain): self
    {
        $this->initialized['domain'] = true;
        $this->domain = $domain;
        return $this;
    }
}
