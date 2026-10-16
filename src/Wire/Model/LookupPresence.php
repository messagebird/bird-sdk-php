<?php

namespace MessageBird\Wire\Model;

/**
 * Whether the number is live on its network right now. Returned when you
 * request the `presence` property.
 * 
 * The result reflects a real-time query to the network where the number is
 * registered.
 */
class LookupPresence
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
     * Whether the number is registered on a network and able to receive traffic. A `false` value means the network answered and reported the number as currently unreachable. This differs from the API being unable to find out. Present only when `status` is `ok`.
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
     * Whether the number is registered on a network and able to receive traffic. A `false` value means the network answered and reported the number as currently unreachable. This differs from the API being unable to find out. Present only when `status` is `ok`.
     * 
     *
     * @return bool|null
     */
    public function getReachable(): ?bool
    {
        return $this->reachable;
    }
    /**
     * Whether the number is registered on a network and able to receive traffic. A `false` value means the network answered and reported the number as currently unreachable. This differs from the API being unable to find out. Present only when `status` is `ok`.
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
