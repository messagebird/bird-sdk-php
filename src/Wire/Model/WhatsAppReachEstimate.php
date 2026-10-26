<?php

namespace MessageBird\Wire\Model;

class WhatsAppReachEstimate
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
     * ISO 4217 three-letter currency code.
     *
     * @var string|null
     */
    protected $currencyCode;
    /**
     * One estimate per candidate bid, in ascending bid order.
     *
     * @var list<WhatsAppReachEstimateRow>|null
     */
    protected $estimates;
    /**
     * ISO 4217 three-letter currency code.
     *
     * @return string|null
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }
    /**
     * ISO 4217 three-letter currency code.
     *
     * @param string|null $currencyCode
     *
     * @return self
     */
    public function setCurrencyCode(?string $currencyCode): self
    {
        $this->initialized['currencyCode'] = true;
        $this->currencyCode = $currencyCode;
        return $this;
    }
    /**
     * One estimate per candidate bid, in ascending bid order.
     *
     * @return list<WhatsAppReachEstimateRow>|null
     */
    public function getEstimates(): ?array
    {
        return $this->estimates;
    }
    /**
     * One estimate per candidate bid, in ascending bid order.
     *
     * @param list<WhatsAppReachEstimateRow>|null $estimates
     *
     * @return self
     */
    public function setEstimates(?array $estimates): self
    {
        $this->initialized['estimates'] = true;
        $this->estimates = $estimates;
        return $this;
    }
}
