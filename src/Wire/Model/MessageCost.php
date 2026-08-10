<?php

namespace MessageBird\Wire\Model;

class MessageCost
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
     * Total charged, as a decimal string: the sum of the components below. Net of tax, which applies to your wallet balance rather than to an individual charge.
     * 
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
     * What Bird charged to carry the message, as a decimal string. Null when this component was not priced; `"0.00000"` when it priced at zero.
     * 
     *
     * @var string|null
     */
    protected $transactionAmount;
    /**
     * Third-party fees Bird passes on, as a decimal string, such as US 10DLC carrier surcharges. Null when this component was not priced; `"0.00000"` when it priced at zero.
     * 
     *
     * @var string|null
     */
    protected $passthroughAmount;
    /**
     * Total charged, as a decimal string: the sum of the components below. Net of tax, which applies to your wallet balance rather than to an individual charge.
     * 
     *
     * @return string|null
     */
    public function getAmount(): ?string
    {
        return $this->amount;
    }
    /**
     * Total charged, as a decimal string: the sum of the components below. Net of tax, which applies to your wallet balance rather than to an individual charge.
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
    /**
     * What Bird charged to carry the message, as a decimal string. Null when this component was not priced; `"0.00000"` when it priced at zero.
     * 
     *
     * @return string|null
     */
    public function getTransactionAmount(): ?string
    {
        return $this->transactionAmount;
    }
    /**
     * What Bird charged to carry the message, as a decimal string. Null when this component was not priced; `"0.00000"` when it priced at zero.
     *
     * @param string|null $transactionAmount
     *
     * @return self
     */
    public function setTransactionAmount(?string $transactionAmount): self
    {
        $this->initialized['transactionAmount'] = true;
        $this->transactionAmount = $transactionAmount;
        return $this;
    }
    /**
     * Third-party fees Bird passes on, as a decimal string, such as US 10DLC carrier surcharges. Null when this component was not priced; `"0.00000"` when it priced at zero.
     * 
     *
     * @return string|null
     */
    public function getPassthroughAmount(): ?string
    {
        return $this->passthroughAmount;
    }
    /**
     * Third-party fees Bird passes on, as a decimal string, such as US 10DLC carrier surcharges. Null when this component was not priced; `"0.00000"` when it priced at zero.
     *
     * @param string|null $passthroughAmount
     *
     * @return self
     */
    public function setPassthroughAmount(?string $passthroughAmount): self
    {
        $this->initialized['passthroughAmount'] = true;
        $this->passthroughAmount = $passthroughAmount;
        return $this;
    }
}
