<?php

namespace MessageBird\Wire\Model;

class PhoneNumberLookupPresence extends \ArrayObject
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
    protected $status;
    /**
     * Whether the number is registered on a network and able to receive traffic. False means the network answered and reported the number as not currently reachable, which is different from us being unable to find out. Present only when `status` is `ok`.
     * 
     *
     * @var bool|null
     */
    protected $reachable;
    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
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
    /**
     * Whether the number is registered on a network and able to receive traffic. False means the network answered and reported the number as not currently reachable, which is different from us being unable to find out. Present only when `status` is `ok`.
     * 
     *
     * @return bool|null
     */
    public function getReachable(): ?bool
    {
        return $this->reachable;
    }
    /**
     * Whether the number is registered on a network and able to receive traffic. False means the network answered and reported the number as not currently reachable, which is different from us being unable to find out. Present only when `status` is `ok`.
     *
     * @param bool|null $reachable
     *
     * @return self
     */
    public function setReachable(?bool $reachable): self
    {
        $this->initialized['reachable'] = true;
        $this->reachable = $reachable;
        return $this;
    }
}
