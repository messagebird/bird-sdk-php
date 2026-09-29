<?php

namespace MessageBird\Wire\Model;

class AMBInboundBusinessStatsPoint
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
    protected $businessAccountId;
    /**
     * Distinct messages received by this business in the period.
     *
     * @var int|null
     */
    protected $received;
    /**
     * @return string|null
     */
    public function getBusinessAccountId(): ?string
    {
        return $this->businessAccountId;
    }
    /**
     * @param string|null $businessAccountId
     *
     * @return self
     */
    public function setBusinessAccountId(?string $businessAccountId): self
    {
        $this->initialized['businessAccountId'] = true;
        $this->businessAccountId = $businessAccountId;
        return $this;
    }
    /**
     * Distinct messages received by this business in the period.
     *
     * @return int|null
     */
    public function getReceived(): ?int
    {
        return $this->received;
    }
    /**
     * Distinct messages received by this business in the period.
     *
     * @param int|null $received
     *
     * @return self
     */
    public function setReceived(?int $received): self
    {
        $this->initialized['received'] = true;
        $this->received = $received;
        return $this;
    }
}
