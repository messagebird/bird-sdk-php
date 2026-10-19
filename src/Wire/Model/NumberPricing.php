<?php

namespace MessageBird\Wire\Model;

/**
 * What your organization pays for a number it holds, net of tax.
 */
class NumberPricing extends \ArrayObject
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
     * What your organization is charged for this number per `recurring_period`, net of tax, in the currency this number is charged in: your billing currency, unless this number's subscription predates a change of your billing currency, in which case its own currency is returned. `null` when no price applies.
     *
     * @var NumberPricingRecurringPrice|null
     */
    protected $recurringPrice;
    /**
     * The rate's interval, or a fixed price's whole renewal period. `null` when `recurring_price` is `null`.
     *
     * @var NumberPricingRecurringPeriod|null
     */
    protected $recurringPeriod;
    /**
     * How many `recurring_period`s one renewal charges. When `releases_at` is set no renewal follows, and the value still describes the subscription's cadence until the release. `1` for a fixed price. `null` when `recurring_price` is `null`.
     *
     * @var int|null
     */
    protected $intervalsPerCharge;
    /**
     * A retryable failure to read the price. Retry a GET of the number; do not repeat a completed write. `null` when the price was read or no price applies.
     *
     * @var NumberPricingError|null
     */
    protected $error;
    /**
     * What your organization is charged for this number per `recurring_period`, net of tax, in the currency this number is charged in: your billing currency, unless this number's subscription predates a change of your billing currency, in which case its own currency is returned. `null` when no price applies.
     *
     * @return NumberPricingRecurringPrice|null
     */
    public function getRecurringPrice(): ?NumberPricingRecurringPrice
    {
        return $this->recurringPrice;
    }
    /**
     * What your organization is charged for this number per `recurring_period`, net of tax, in the currency this number is charged in: your billing currency, unless this number's subscription predates a change of your billing currency, in which case its own currency is returned. `null` when no price applies.
     *
     * @param NumberPricingRecurringPrice|null $recurringPrice
     *
     * @return self
     */
    public function setRecurringPrice(?NumberPricingRecurringPrice $recurringPrice): self
    {
        $this->initialized['recurringPrice'] = true;
        $this->recurringPrice = $recurringPrice;
        return $this;
    }
    /**
     * The rate's interval, or a fixed price's whole renewal period. `null` when `recurring_price` is `null`.
     *
     * @return NumberPricingRecurringPeriod|null
     */
    public function getRecurringPeriod(): ?NumberPricingRecurringPeriod
    {
        return $this->recurringPeriod;
    }
    /**
     * The rate's interval, or a fixed price's whole renewal period. `null` when `recurring_price` is `null`.
     *
     * @param NumberPricingRecurringPeriod|null $recurringPeriod
     *
     * @return self
     */
    public function setRecurringPeriod(?NumberPricingRecurringPeriod $recurringPeriod): self
    {
        $this->initialized['recurringPeriod'] = true;
        $this->recurringPeriod = $recurringPeriod;
        return $this;
    }
    /**
     * How many `recurring_period`s one renewal charges. When `releases_at` is set no renewal follows, and the value still describes the subscription's cadence until the release. `1` for a fixed price. `null` when `recurring_price` is `null`.
     *
     * @return int|null
     */
    public function getIntervalsPerCharge(): ?int
    {
        return $this->intervalsPerCharge;
    }
    /**
     * How many `recurring_period`s one renewal charges. When `releases_at` is set no renewal follows, and the value still describes the subscription's cadence until the release. `1` for a fixed price. `null` when `recurring_price` is `null`.
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
    /**
     * A retryable failure to read the price. Retry a GET of the number; do not repeat a completed write. `null` when the price was read or no price applies.
     *
     * @return NumberPricingError|null
     */
    public function getError(): ?NumberPricingError
    {
        return $this->error;
    }
    /**
     * A retryable failure to read the price. Retry a GET of the number; do not repeat a completed write. `null` when the price was read or no price applies.
     *
     * @param NumberPricingError|null $error
     *
     * @return self
     */
    public function setError(?NumberPricingError $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;
        return $this;
    }
}
