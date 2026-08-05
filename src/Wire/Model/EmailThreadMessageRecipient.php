<?php

namespace MessageBird\Wire\Model;

class EmailThreadMessageRecipient
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
     * Recipient address.
     *
     * @var string|null
     */
    protected $address;
    /**
     * Terminal outcome: `delivered`, or `failed` (bounce or provider rejection).
     *
     * @var string|null
     */
    protected $status;
    /**
     * Recipient address.
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    /**
     * Recipient address.
     *
     * @param string|null $address
     *
     * @return self
     */
    public function setAddress(?string $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;
        return $this;
    }
    /**
     * Terminal outcome: `delivered`, or `failed` (bounce or provider rejection).
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Terminal outcome: `delivered`, or `failed` (bounce or provider rejection).
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
}
