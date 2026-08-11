<?php

namespace MessageBird\Wire\Model;

class Money
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
     * Decimal amount as a string, in major currency units.
     *
     * @var string|null
     */
    protected $amount;
    /**
     * ISO 4217 three-letter currency code.
     *
     * @var string|null
     */
    protected $currencyCode;
    /**
     * Decimal amount as a string, in major currency units.
     *
     * @return string|null
     */
    public function getAmount(): ?string
    {
        return $this->amount;
    }
    /**
     * Decimal amount as a string, in major currency units.
     *
     * @param string|null $amount
     *
     * @return self
     */
    public function setAmount(?string $amount): self
    {
        $this->initialized['amount'] = true;
        $this->amount = $amount;
        return $this;
    }
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
}
