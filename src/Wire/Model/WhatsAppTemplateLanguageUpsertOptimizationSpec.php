<?php

namespace MessageBird\Wire\Model;

/**
 * A maximum price for this language's marketing deliveries. Meta charges each delivery a variable amount up to the bid. Only marketing templates accept it.
 */
class WhatsAppTemplateLanguageUpsertOptimizationSpec extends \ArrayObject
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
     * The maximum price per 1,000 deliveries, in the smallest unit of the account's currency. The reach estimate returns that currency as `currency_code`. 5000 is USD 0.05 per delivery.
     * 
     *
     * @var int|null
     */
    protected $bidAmount;
    /**
     * How Meta bids for each delivery.
     * 
     * - `lowest_cost_with_bid_cap`: Meta delivers at the lowest cost it can find, never above the bid.
     * 
     *
     * @var string|null
     */
    protected $bidStrategy;
    /**
     * Scales the bid for recipients in a country, keyed by ISO 3166-1 alpha-2 code. A country you leave out uses 1. Each write replaces the whole map.
     * 
     *
     * @var array<string, float>|null
     */
    protected $bidCountryMultiplierOverrides;
    /**
     * The maximum price per 1,000 deliveries, in the smallest unit of the account's currency. The reach estimate returns that currency as `currency_code`. 5000 is USD 0.05 per delivery.
     * 
     *
     * @return int|null
     */
    public function getBidAmount(): ?int
    {
        return $this->bidAmount;
    }
    /**
     * The maximum price per 1,000 deliveries, in the smallest unit of the account's currency. The reach estimate returns that currency as `currency_code`. 5000 is USD 0.05 per delivery.
     *
     * @param int|null $bidAmount
     *
     * @return self
     */
    public function setBidAmount(?int $bidAmount): self
    {
        $this->initialized['bidAmount'] = true;
        $this->bidAmount = $bidAmount;
        return $this;
    }
    /**
     * How Meta bids for each delivery.
     * 
     * - `lowest_cost_with_bid_cap`: Meta delivers at the lowest cost it can find, never above the bid.
     * 
     *
     * @return string|null
     */
    public function getBidStrategy(): ?string
    {
        return $this->bidStrategy;
    }
    /**
    * How Meta bids for each delivery.
    
    - `lowest_cost_with_bid_cap`: Meta delivers at the lowest cost it can find, never above the bid.
    
    *
    * @param string|null $bidStrategy
    *
    * @return self
    */
    public function setBidStrategy(?string $bidStrategy): self
    {
        $this->initialized['bidStrategy'] = true;
        $this->bidStrategy = $bidStrategy;
        return $this;
    }
    /**
     * Scales the bid for recipients in a country, keyed by ISO 3166-1 alpha-2 code. A country you leave out uses 1. Each write replaces the whole map.
     * 
     *
     * @return array<string, float>|null
     */
    public function getBidCountryMultiplierOverrides(): ?iterable
    {
        return $this->bidCountryMultiplierOverrides;
    }
    /**
     * Scales the bid for recipients in a country, keyed by ISO 3166-1 alpha-2 code. A country you leave out uses 1. Each write replaces the whole map.
     *
     * @param array<string, float>|null $bidCountryMultiplierOverrides
     *
     * @return self
     */
    public function setBidCountryMultiplierOverrides(?iterable $bidCountryMultiplierOverrides): self
    {
        $this->initialized['bidCountryMultiplierOverrides'] = true;
        $this->bidCountryMultiplierOverrides = $bidCountryMultiplierOverrides;
        return $this;
    }
}
