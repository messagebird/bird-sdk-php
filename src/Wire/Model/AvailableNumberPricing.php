<?php

namespace MessageBird\Wire\Model;

/**
 * What your organization pays for an available number, net of tax, in your billing currency.
 */
class AvailableNumberPricing
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
     * One-off setup fee for your organization, net of tax, in your billing currency. Its `amount` is `"0"` when the published fee is zero. `null` when no setup fee applies to this country and number type, and whenever `recurring_price` is `null`.
     *
     * @var AvailableNumberPricingSetupPrice|null
     */
    protected $setupPrice;
    /**
     * What your organization is charged for this number per `recurring_period`, net of tax, in your billing currency, after your agreed prices are applied. `null` when the number cannot be priced for your organization, because its recurring price or a required setup fee has no price; it cannot be ordered then.
     *
     * @var AvailableNumberPricingRecurringPrice|null
     */
    protected $recurringPrice;
    /**
     * The period `recurring_price` covers. `null` when `recurring_price` is `null`.
     *
     * @var AvailableNumberPricingRecurringPeriod|null
     */
    protected $recurringPeriod;
    /**
     * How many `recurring_period`s one charge bills at once. Your organization is charged `recurring_price` multiplied by this at purchase and at each renewal. `null` when `recurring_price` is `null`.
     *
     * @var int|null
     */
    protected $intervalsPerCharge;
    /**
     * One-off setup fee for your organization, net of tax, in your billing currency. Its `amount` is `"0"` when the published fee is zero. `null` when no setup fee applies to this country and number type, and whenever `recurring_price` is `null`.
     *
     * @return AvailableNumberPricingSetupPrice|null
     */
    public function getSetupPrice(): ?AvailableNumberPricingSetupPrice
    {
        return $this->setupPrice;
    }
    /**
     * One-off setup fee for your organization, net of tax, in your billing currency. Its `amount` is `"0"` when the published fee is zero. `null` when no setup fee applies to this country and number type, and whenever `recurring_price` is `null`.
     *
     * @param AvailableNumberPricingSetupPrice|null $setupPrice
     *
     * @return self
     */
    public function setSetupPrice(?AvailableNumberPricingSetupPrice $setupPrice): self
    {
        $this->initialized['setupPrice'] = true;
        $this->setupPrice = $setupPrice;
        return $this;
    }
    /**
     * What your organization is charged for this number per `recurring_period`, net of tax, in your billing currency, after your agreed prices are applied. `null` when the number cannot be priced for your organization, because its recurring price or a required setup fee has no price; it cannot be ordered then.
     *
     * @return AvailableNumberPricingRecurringPrice|null
     */
    public function getRecurringPrice(): ?AvailableNumberPricingRecurringPrice
    {
        return $this->recurringPrice;
    }
    /**
     * What your organization is charged for this number per `recurring_period`, net of tax, in your billing currency, after your agreed prices are applied. `null` when the number cannot be priced for your organization, because its recurring price or a required setup fee has no price; it cannot be ordered then.
     *
     * @param AvailableNumberPricingRecurringPrice|null $recurringPrice
     *
     * @return self
     */
    public function setRecurringPrice(?AvailableNumberPricingRecurringPrice $recurringPrice): self
    {
        $this->initialized['recurringPrice'] = true;
        $this->recurringPrice = $recurringPrice;
        return $this;
    }
    /**
     * The period `recurring_price` covers. `null` when `recurring_price` is `null`.
     *
     * @return AvailableNumberPricingRecurringPeriod|null
     */
    public function getRecurringPeriod(): ?AvailableNumberPricingRecurringPeriod
    {
        return $this->recurringPeriod;
    }
    /**
     * The period `recurring_price` covers. `null` when `recurring_price` is `null`.
     *
     * @param AvailableNumberPricingRecurringPeriod|null $recurringPeriod
     *
     * @return self
     */
    public function setRecurringPeriod(?AvailableNumberPricingRecurringPeriod $recurringPeriod): self
    {
        $this->initialized['recurringPeriod'] = true;
        $this->recurringPeriod = $recurringPeriod;
        return $this;
    }
    /**
     * How many `recurring_period`s one charge bills at once. Your organization is charged `recurring_price` multiplied by this at purchase and at each renewal. `null` when `recurring_price` is `null`.
     *
     * @return int|null
     */
    public function getIntervalsPerCharge(): ?int
    {
        return $this->intervalsPerCharge;
    }
    /**
     * How many `recurring_period`s one charge bills at once. Your organization is charged `recurring_price` multiplied by this at purchase and at each renewal. `null` when `recurring_price` is `null`.
     *
     * @param int|null $intervalsPerCharge
     *
     * @return self
     */
    public function setIntervalsPerCharge(?int $intervalsPerCharge): self
    {
        $this->initialized['intervalsPerCharge'] = true;
        $this->intervalsPerCharge = $intervalsPerCharge;
        return $this;
    }
}
