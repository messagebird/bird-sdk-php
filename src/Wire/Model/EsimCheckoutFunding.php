<?php

namespace MessageBird\Wire\Model;

/**
 * Current funding needed for this purchase, including tax and approved credit. The quoted price excludes tax; `total` includes tax for this purchase. This read reserves no funds; payment checks funding again. Test purchases have zero tax and total and are always covered.
 */
class EsimCheckoutFunding
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
     * @var Money|null
     */
    protected $taxAmount;
    /**
     * @var Money|null
     */
    protected $total;
    /**
     * Whether the wallet can currently cover this purchase after reservations and approved credit.
     *
     * @var bool|null
     */
    protected $covered;
    /**
     * Additional funds needed to cover this purchase, or null without organization billing read permission. Zero when covered is true.
     *
     * @var EsimCheckoutFundingShortfall|null
     */
    protected $shortfall;
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
    public function getTotal(): ?Money
    {
        return $this->total;
    }
    /**
     * @param Money|null $total
     *
     * @return self
     */
    public function setTotal(?Money $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;
        return $this;
    }
    /**
     * Whether the wallet can currently cover this purchase after reservations and approved credit.
     *
     * @return bool|null
     */
    public function getCovered(): ?bool
    {
        return $this->covered;
    }
    /**
     * Whether the wallet can currently cover this purchase after reservations and approved credit.
     *
     * @param bool|null $covered
     *
     * @return self
     */
    public function setCovered(?bool $covered): self
    {
        $this->initialized['covered'] = true;
        $this->covered = $covered;
        return $this;
    }
    /**
     * Additional funds needed to cover this purchase, or null without organization billing read permission. Zero when covered is true.
     *
     * @return EsimCheckoutFundingShortfall|null
     */
    public function getShortfall(): ?EsimCheckoutFundingShortfall
    {
        return $this->shortfall;
    }
    /**
     * Additional funds needed to cover this purchase, or null without organization billing read permission. Zero when covered is true.
     *
     * @param EsimCheckoutFundingShortfall|null $shortfall
     *
     * @return self
     */
    public function setShortfall(?EsimCheckoutFundingShortfall $shortfall): self
    {
        $this->initialized['shortfall'] = true;
        $this->shortfall = $shortfall;
        return $this;
    }
}
