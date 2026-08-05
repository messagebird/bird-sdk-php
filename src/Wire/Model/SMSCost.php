<?php

namespace MessageBird\Wire\Model;

class SMSCost
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
     * Total cost as a decimal string: the per-segment rate multiplied by the segment count, plus any surcharges.
     *
     * @var string|null
     */
    protected $amount;
    /**
     * Per-component cost breakdown. Returned on single-message reads; omitted from list rows.
     *
     * @var SMSCostBreakdown|null
     */
    protected $breakdown;
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
     * Total cost as a decimal string: the per-segment rate multiplied by the segment count, plus any surcharges.
     *
     * @return string|null
     */
    public function getAmount(): ?string
    {
        return $this->amount;
    }
    /**
     * Total cost as a decimal string: the per-segment rate multiplied by the segment count, plus any surcharges.
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
     * Per-component cost breakdown. Returned on single-message reads; omitted from list rows.
     *
     * @return SMSCostBreakdown|null
     */
    public function getBreakdown(): ?SMSCostBreakdown
    {
        return $this->breakdown;
    }
    /**
     * Per-component cost breakdown. Returned on single-message reads; omitted from list rows.
     *
     * @param SMSCostBreakdown|null $breakdown
     *
     * @return self
     */
    public function setBreakdown(?SMSCostBreakdown $breakdown): self
    {
        $this->initialized['breakdown'] = true;
        $this->breakdown = $breakdown;
        return $this;
    }
}
