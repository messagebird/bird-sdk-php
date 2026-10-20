<?php

namespace MessageBird\Wire\Model;

class BillingWalletList
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
     * @var list<BillingWallet>|null
     */
    protected $data;
    /**
     * @return list<BillingWallet>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * @param list<BillingWallet>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}
