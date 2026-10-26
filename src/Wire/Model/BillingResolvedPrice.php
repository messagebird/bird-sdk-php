<?php

namespace MessageBird\Wire\Model;

class BillingResolvedPrice
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
     * Whether a published price matched. True includes an explicitly published zero price. False means no price matched and the zero amounts are placeholders, not a quote.
     *
     * @var bool|null
     */
    protected $isPriced;
    /**
     * @var Money|null
     */
    protected $unitPrice;
    /**
     * The tax rate applied to this price for your organization, as a decimal (for example `0.21` for 21%). `0` if your organization is tax-exempt or no tax applies.
     *
     * @var string|null
     */
    protected $taxRate;
    /**
     * @var Money|null
     */
    protected $taxAmount;
    /**
     * @var Money|null
     */
    protected $grossPrice;
    /**
     * Number of units that form one chargeable block. Overage usage is ceiling-rounded to the nearest multiple of this value before the unit price is applied. A value of 1 charges per individual unit.
     *
     * @var int|null
     */
    protected $billingUnitSize;
    /**
     * The billing rounding window for time-based products, expressed as `{initial_seconds}/{continuation_seconds}`. For example, `60/60` means each unit covers 60 seconds. `null` for per-unit products.
     *
     * @var string|null
     */
    protected $increment;
    /**
     * Pricing dimensions that determined this price (for example, `country_code`, `sender_type`).
     *
     * @var array<string, string>|null
     */
    protected $dimensions;
    /**
     * Display name of the product this price was resolved for.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Customer-facing description of the product this price was resolved for, when set.
     *
     * @var string|null
     */
    protected $externalDescription;
    /**
     * How this product is priced.
     * 
     * - `plan`: it comes with the organization's subscribed plan, with usage tracked
     *   against that plan's included allowance.
     * - `metered`: it is billed per unit beyond any included allowance.
     * - `rate_card`: the per-unit price varies by attributes of the usage, such as
     *   destination, instead of being flat.
     * - `unit_subscription`: it is a standalone add-on billed as its own recurring
     *   subscription, independent of the plan.
     * - `custom`: a pricing arrangement that does not fit the other models.
     * - `counter`: usage is recorded without enforcing a spending cap or blocking
     *   requests.
     * 
     *
     * @var string|null
     */
    protected $pricingModel;
    /**
     * The recurring interval one subscription charge covers.
     *
     * @var string|null
     */
    protected $billingInterval;
    /**
     * Compatibility alias for `intervals_per_charge`. Only present when `pricing_model` is `unit_subscription`, or `plan` with configured recurring terms. Omitted for other pricing models and plans without configured terms.
     *
     * @deprecated
     *
     * @var int|null
     */
    protected $billingIntervalCount;
    /**
     * A period: a unit and a count. A day is a fixed 24-hour UTC period. A larger `count` lengthens the period without multiplying the amount quoted for it.
     *
     * @var BillingPricingInterval|null
     */
    protected $pricingInterval;
    /**
     * Number of complete pricing intervals bought by each recurring charge. Renewal duration is `pricing_interval.count` multiplied by this value. Present alongside `pricing_interval` for `unit_subscription` products and plans with configured recurring terms; omitted otherwise.
     *
     * @var int|null
     */
    protected $intervalsPerCharge;
    /**
     * Whether a published price matched. True includes an explicitly published zero price. False means no price matched and the zero amounts are placeholders, not a quote.
     *
     * @return bool|null
     */
    public function getIsPriced(): ?bool
    {
        return $this->isPriced;
    }
    /**
     * Whether a published price matched. True includes an explicitly published zero price. False means no price matched and the zero amounts are placeholders, not a quote.
     *
     * @param bool|null $isPriced
     *
     * @return self
     */
    public function setIsPriced(?bool $isPriced): self
    {
        $this->initialized['isPriced'] = true;
        $this->isPriced = $isPriced;
        return $this;
    }
    /**
     * @return Money|null
     */
    public function getUnitPrice(): ?Money
    {
        return $this->unitPrice;
    }
    /**
     * @param Money|null $unitPrice
     *
     * @return self
     */
    public function setUnitPrice(?Money $unitPrice): self
    {
        $this->initialized['unitPrice'] = true;
        $this->unitPrice = $unitPrice;
        return $this;
    }
    /**
     * The tax rate applied to this price for your organization, as a decimal (for example `0.21` for 21%). `0` if your organization is tax-exempt or no tax applies.
     *
     * @return string|null
     */
    public function getTaxRate(): ?string
    {
        return $this->taxRate;
    }
    /**
     * The tax rate applied to this price for your organization, as a decimal (for example `0.21` for 21%). `0` if your organization is tax-exempt or no tax applies.
     *
     * @param string|null $taxRate
     *
     * @return self
     */
    public function setTaxRate(?string $taxRate): self
    {
        $this->initialized['taxRate'] = true;
        $this->taxRate = $taxRate;
        return $this;
    }
    /**
     * @return Money|null
     */
    public function getTaxAmount(): ?Money
    {
        return $this->taxAmount;
    }
    /**
     * @param Money|null $taxAmount
     *
     * @return self
     */
    public function setTaxAmount(?Money $taxAmount): self
    {
        $this->initialized['taxAmount'] = true;
        $this->taxAmount = $taxAmount;
        return $this;
    }
    /**
     * @return Money|null
     */
    public function getGrossPrice(): ?Money
    {
        return $this->grossPrice;
    }
    /**
     * @param Money|null $grossPrice
     *
     * @return self
     */
    public function setGrossPrice(?Money $grossPrice): self
    {
        $this->initialized['grossPrice'] = true;
        $this->grossPrice = $grossPrice;
        return $this;
    }
    /**
     * Number of units that form one chargeable block. Overage usage is ceiling-rounded to the nearest multiple of this value before the unit price is applied. A value of 1 charges per individual unit.
     *
     * @return int|null
     */
    public function getBillingUnitSize(): ?int
    {
        return $this->billingUnitSize;
    }
    /**
     * Number of units that form one chargeable block. Overage usage is ceiling-rounded to the nearest multiple of this value before the unit price is applied. A value of 1 charges per individual unit.
     *
     * @param int|null $billingUnitSize
     *
     * @return self
     */
    public function setBillingUnitSize(?int $billingUnitSize): self
    {
        $this->initialized['billingUnitSize'] = true;
        $this->billingUnitSize = $billingUnitSize;
        return $this;
    }
    /**
     * The billing rounding window for time-based products, expressed as `{initial_seconds}/{continuation_seconds}`. For example, `60/60` means each unit covers 60 seconds. `null` for per-unit products.
     *
     * @return string|null
     */
    public function getIncrement(): ?string
    {
        return $this->increment;
    }
    /**
     * The billing rounding window for time-based products, expressed as `{initial_seconds}/{continuation_seconds}`. For example, `60/60` means each unit covers 60 seconds. `null` for per-unit products.
     *
     * @param string|null $increment
     *
     * @return self
     */
    public function setIncrement(?string $increment): self
    {
        $this->initialized['increment'] = true;
        $this->increment = $increment;
        return $this;
    }
    /**
     * Pricing dimensions that determined this price (for example, `country_code`, `sender_type`).
     *
     * @return array<string, string>|null
     */
    public function getDimensions(): ?iterable
    {
        return $this->dimensions;
    }
    /**
     * Pricing dimensions that determined this price (for example, `country_code`, `sender_type`).
     *
     * @param array<string, string>|null $dimensions
     *
     * @return self
     */
    public function setDimensions(?iterable $dimensions): self
    {
        $this->initialized['dimensions'] = true;
        $this->dimensions = $dimensions;
        return $this;
    }
    /**
     * Display name of the product this price was resolved for.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Display name of the product this price was resolved for.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Customer-facing description of the product this price was resolved for, when set.
     *
     * @return string|null
     */
    public function getExternalDescription(): ?string
    {
        return $this->externalDescription;
    }
    /**
     * Customer-facing description of the product this price was resolved for, when set.
     *
     * @param string|null $externalDescription
     *
     * @return self
     */
    public function setExternalDescription(?string $externalDescription): self
    {
        $this->initialized['externalDescription'] = true;
        $this->externalDescription = $externalDescription;
        return $this;
    }
    /**
     * How this product is priced.
     * 
     * - `plan`: it comes with the organization's subscribed plan, with usage tracked
     *   against that plan's included allowance.
     * - `metered`: it is billed per unit beyond any included allowance.
     * - `rate_card`: the per-unit price varies by attributes of the usage, such as
     *   destination, instead of being flat.
     * - `unit_subscription`: it is a standalone add-on billed as its own recurring
     *   subscription, independent of the plan.
     * - `custom`: a pricing arrangement that does not fit the other models.
     * - `counter`: usage is recorded without enforcing a spending cap or blocking
     *   requests.
     * 
     *
     * @return string|null
     */
    public function getPricingModel(): ?string
    {
        return $this->pricingModel;
    }
    /**
    * How this product is priced.
    
    - `plan`: it comes with the organization's subscribed plan, with usage tracked
     against that plan's included allowance.
    - `metered`: it is billed per unit beyond any included allowance.
    - `rate_card`: the per-unit price varies by attributes of the usage, such as
     destination, instead of being flat.
    - `unit_subscription`: it is a standalone add-on billed as its own recurring
     subscription, independent of the plan.
    - `custom`: a pricing arrangement that does not fit the other models.
    - `counter`: usage is recorded without enforcing a spending cap or blocking
     requests.
    
    *
    * @param string|null $pricingModel
    *
    * @return self
    */
    public function setPricingModel(?string $pricingModel): self
    {
        $this->initialized['pricingModel'] = true;
        $this->pricingModel = $pricingModel;
        return $this;
    }
    /**
     * The recurring interval one subscription charge covers.
     *
     * @return string|null
     */
    public function getBillingInterval(): ?string
    {
        return $this->billingInterval;
    }
    /**
     * The recurring interval one subscription charge covers.
     *
     * @param string|null $billingInterval
     *
     * @return self
     */
    public function setBillingInterval(?string $billingInterval): self
    {
        $this->initialized['billingInterval'] = true;
        $this->billingInterval = $billingInterval;
        return $this;
    }
    /**
     * Compatibility alias for `intervals_per_charge`. Only present when `pricing_model` is `unit_subscription`, or `plan` with configured recurring terms. Omitted for other pricing models and plans without configured terms.
     *
     * @deprecated
     *
     * @return int|null
     */
    public function getBillingIntervalCount(): ?int
    {
        return $this->billingIntervalCount;
    }
    /**
     * Compatibility alias for `intervals_per_charge`. Only present when `pricing_model` is `unit_subscription`, or `plan` with configured recurring terms. Omitted for other pricing models and plans without configured terms.
     *
     * @param int|null $billingIntervalCount
     *
     * @deprecated
     *
     * @return self
     */
    public function setBillingIntervalCount(?int $billingIntervalCount): self
    {
        $this->initialized['billingIntervalCount'] = true;
        $this->billingIntervalCount = $billingIntervalCount;
        return $this;
    }
    /**
     * A period: a unit and a count. A day is a fixed 24-hour UTC period. A larger `count` lengthens the period without multiplying the amount quoted for it.
     *
     * @return BillingPricingInterval|null
     */
    public function getPricingInterval(): ?BillingPricingInterval
    {
        return $this->pricingInterval;
    }
    /**
     * A period: a unit and a count. A day is a fixed 24-hour UTC period. A larger `count` lengthens the period without multiplying the amount quoted for it.
     *
     * @param BillingPricingInterval|null $pricingInterval
     *
     * @return self
     */
    public function setPricingInterval(?BillingPricingInterval $pricingInterval): self
    {
        $this->initialized['pricingInterval'] = true;
        $this->pricingInterval = $pricingInterval;
        return $this;
    }
    /**
     * Number of complete pricing intervals bought by each recurring charge. Renewal duration is `pricing_interval.count` multiplied by this value. Present alongside `pricing_interval` for `unit_subscription` products and plans with configured recurring terms; omitted otherwise.
     *
     * @return int|null
     */
    public function getIntervalsPerCharge(): ?int
    {
        return $this->intervalsPerCharge;
    }
    /**
     * Number of complete pricing intervals bought by each recurring charge. Renewal duration is `pricing_interval.count` multiplied by this value. Present alongside `pricing_interval` for `unit_subscription` products and plans with configured recurring terms; omitted otherwise.
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
