<?php

namespace MessageBird\Wire\Model;

class BillingWallet
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
     * @var string|null
     */
    protected $id;
    /**
     * ISO 4217 three-letter currency code.
     *
     * @var string|null
     */
    protected $currencyCode;
    /**
     * Balance you can spend, in currency units. Usage is charged as it happens, so this drops within seconds of sending and can be lower than the balance the wallet transactions add up to, which only reflects charges that have settled. Funds held for upcoming renewals are also excluded. Credit headroom is reported separately in `credit_limit`, and postpaid accounts can keep spending past a zero balance up to that limit.
     *
     * @var string|null
     */
    protected $balance;
    /**
     * Settled wallet balance in currency units, before active reservations are deducted.
     *
     * @var string|null
     */
    protected $settledBalance;
    /**
     * Amount currently held for prepared subscription renewals and scheduled plan changes, in currency units.
     *
     * @var string|null
     */
    protected $renewalReserved;
    /**
     * Total amount required for prepared subscription renewals and scheduled plan changes, including tax, in currency units.
     *
     * @var string|null
     */
    protected $renewalRequired;
    /**
     * Automatic collection state:
     * - `none`: No retained collection run.
     * - `in_progress`: Collection is active, though payment may still require customer action.
     * - `exhausted`: Automatic retries have stopped and customer action is needed.
     *
     * @var string|null
     */
    protected $collectionStatus;
    /**
     * Part of collection_required needed for unfunded renewal fees, in exact currency units.
     *
     * @var string|null
     */
    protected $collectionRenewal;
    /**
     * Total wallet funding still required by the current automatic collection run, in exact currency units.
     *
     * @var string|null
     */
    protected $collectionRequired;
    /**
     * Part of collection_required needed for the configured auto-topup amount, in currency units.
     *
     * @var string|null
     */
    protected $collectionUsageBuffer;
    /**
     * Part of collection_required needed to cover the wallet shortfall after reservations and approved credit, in currency units.
     *
     * @var string|null
     */
    protected $collectionDeficit;
    /**
     * Credit limit in currency units. `0.00` for prepaid wallets.
     *
     * @var string|null
     */
    protected $creditLimit;
    /**
     * When `true`, the wallet currency has not yet been committed and can be changed once. When `false`, the currency is permanent.
     *
     * @var bool|null
     */
    protected $provisional;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
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
     * Balance you can spend, in currency units. Usage is charged as it happens, so this drops within seconds of sending and can be lower than the balance the wallet transactions add up to, which only reflects charges that have settled. Funds held for upcoming renewals are also excluded. Credit headroom is reported separately in `credit_limit`, and postpaid accounts can keep spending past a zero balance up to that limit.
     *
     * @return string|null
     */
    public function getBalance(): ?string
    {
        return $this->balance;
    }
    /**
     * Balance you can spend, in currency units. Usage is charged as it happens, so this drops within seconds of sending and can be lower than the balance the wallet transactions add up to, which only reflects charges that have settled. Funds held for upcoming renewals are also excluded. Credit headroom is reported separately in `credit_limit`, and postpaid accounts can keep spending past a zero balance up to that limit.
     *
     * @param string|null $balance
     *
     * @return self
     */
    public function setBalance(?string $balance): self
    {
        $this->initialized['balance'] = true;
        $this->balance = $balance;
        return $this;
    }
    /**
     * Settled wallet balance in currency units, before active reservations are deducted.
     *
     * @return string|null
     */
    public function getSettledBalance(): ?string
    {
        return $this->settledBalance;
    }
    /**
     * Settled wallet balance in currency units, before active reservations are deducted.
     *
     * @param string|null $settledBalance
     *
     * @return self
     */
    public function setSettledBalance(?string $settledBalance): self
    {
        $this->initialized['settledBalance'] = true;
        $this->settledBalance = $settledBalance;
        return $this;
    }
    /**
     * Amount currently held for prepared subscription renewals and scheduled plan changes, in currency units.
     *
     * @return string|null
     */
    public function getRenewalReserved(): ?string
    {
        return $this->renewalReserved;
    }
    /**
     * Amount currently held for prepared subscription renewals and scheduled plan changes, in currency units.
     *
     * @param string|null $renewalReserved
     *
     * @return self
     */
    public function setRenewalReserved(?string $renewalReserved): self
    {
        $this->initialized['renewalReserved'] = true;
        $this->renewalReserved = $renewalReserved;
        return $this;
    }
    /**
     * Total amount required for prepared subscription renewals and scheduled plan changes, including tax, in currency units.
     *
     * @return string|null
     */
    public function getRenewalRequired(): ?string
    {
        return $this->renewalRequired;
    }
    /**
     * Total amount required for prepared subscription renewals and scheduled plan changes, including tax, in currency units.
     *
     * @param string|null $renewalRequired
     *
     * @return self
     */
    public function setRenewalRequired(?string $renewalRequired): self
    {
        $this->initialized['renewalRequired'] = true;
        $this->renewalRequired = $renewalRequired;
        return $this;
    }
    /**
     * Automatic collection state:
     * - `none`: No retained collection run.
     * - `in_progress`: Collection is active, though payment may still require customer action.
     * - `exhausted`: Automatic retries have stopped and customer action is needed.
     *
     * @return string|null
     */
    public function getCollectionStatus(): ?string
    {
        return $this->collectionStatus;
    }
    /**
    * Automatic collection state:
    - `none`: No retained collection run.
    - `in_progress`: Collection is active, though payment may still require customer action.
    - `exhausted`: Automatic retries have stopped and customer action is needed.
    *
    * @param string|null $collectionStatus
    *
    * @return self
    */
    public function setCollectionStatus(?string $collectionStatus): self
    {
        $this->initialized['collectionStatus'] = true;
        $this->collectionStatus = $collectionStatus;
        return $this;
    }
    /**
     * Part of collection_required needed for unfunded renewal fees, in exact currency units.
     *
     * @return string|null
     */
    public function getCollectionRenewal(): ?string
    {
        return $this->collectionRenewal;
    }
    /**
     * Part of collection_required needed for unfunded renewal fees, in exact currency units.
     *
     * @param string|null $collectionRenewal
     *
     * @return self
     */
    public function setCollectionRenewal(?string $collectionRenewal): self
    {
        $this->initialized['collectionRenewal'] = true;
        $this->collectionRenewal = $collectionRenewal;
        return $this;
    }
    /**
     * Total wallet funding still required by the current automatic collection run, in exact currency units.
     *
     * @return string|null
     */
    public function getCollectionRequired(): ?string
    {
        return $this->collectionRequired;
    }
    /**
     * Total wallet funding still required by the current automatic collection run, in exact currency units.
     *
     * @param string|null $collectionRequired
     *
     * @return self
     */
    public function setCollectionRequired(?string $collectionRequired): self
    {
        $this->initialized['collectionRequired'] = true;
        $this->collectionRequired = $collectionRequired;
        return $this;
    }
    /**
     * Part of collection_required needed for the configured auto-topup amount, in currency units.
     *
     * @return string|null
     */
    public function getCollectionUsageBuffer(): ?string
    {
        return $this->collectionUsageBuffer;
    }
    /**
     * Part of collection_required needed for the configured auto-topup amount, in currency units.
     *
     * @param string|null $collectionUsageBuffer
     *
     * @return self
     */
    public function setCollectionUsageBuffer(?string $collectionUsageBuffer): self
    {
        $this->initialized['collectionUsageBuffer'] = true;
        $this->collectionUsageBuffer = $collectionUsageBuffer;
        return $this;
    }
    /**
     * Part of collection_required needed to cover the wallet shortfall after reservations and approved credit, in currency units.
     *
     * @return string|null
     */
    public function getCollectionDeficit(): ?string
    {
        return $this->collectionDeficit;
    }
    /**
     * Part of collection_required needed to cover the wallet shortfall after reservations and approved credit, in currency units.
     *
     * @param string|null $collectionDeficit
     *
     * @return self
     */
    public function setCollectionDeficit(?string $collectionDeficit): self
    {
        $this->initialized['collectionDeficit'] = true;
        $this->collectionDeficit = $collectionDeficit;
        return $this;
    }
    /**
     * Credit limit in currency units. `0.00` for prepaid wallets.
     *
     * @return string|null
     */
    public function getCreditLimit(): ?string
    {
        return $this->creditLimit;
    }
    /**
     * Credit limit in currency units. `0.00` for prepaid wallets.
     *
     * @param string|null $creditLimit
     *
     * @return self
     */
    public function setCreditLimit(?string $creditLimit): self
    {
        $this->initialized['creditLimit'] = true;
        $this->creditLimit = $creditLimit;
        return $this;
    }
    /**
     * When `true`, the wallet currency has not yet been committed and can be changed once. When `false`, the currency is permanent.
     *
     * @return bool|null
     */
    public function getProvisional(): ?bool
    {
        return $this->provisional;
    }
    /**
     * When `true`, the wallet currency has not yet been committed and can be changed once. When `false`, the currency is permanent.
     *
     * @param bool|null $provisional
     *
     * @return self
     */
    public function setProvisional(?bool $provisional): self
    {
        $this->initialized['provisional'] = true;
        $this->provisional = $provisional;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
