<?php

namespace MessageBird\Wire\Model;

class RealtimeChannelInfo extends \ArrayObject
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
     * Distinct members (presence channels only; requires include=member_count).
     *
     * @var int|null
     */
    protected $memberCount;
    /**
     * Connections currently subscribed to this channel (requires include=connection_count and the app's connection-counting flag). Channel-scoped — distinct from the app-wide peak connections metric.
     *
     * @var int|null
     */
    protected $connectionCount;
    /**
     * Whether at least one client is subscribed.
     *
     * @var bool|null
     */
    protected $occupied;
    /**
     * Distinct members (presence channels only; requires include=member_count).
     *
     * @return int|null
     */
    public function getMemberCount(): ?int
    {
        return $this->memberCount;
    }
    /**
     * Distinct members (presence channels only; requires include=member_count).
     *
     * @param int|null $memberCount
     *
     * @return self
     */
    public function setMemberCount(?int $memberCount): self
    {
        $this->initialized['memberCount'] = true;
        $this->memberCount = $memberCount;
        return $this;
    }
    /**
     * Connections currently subscribed to this channel (requires include=connection_count and the app's connection-counting flag). Channel-scoped — distinct from the app-wide peak connections metric.
     *
     * @return int|null
     */
    public function getConnectionCount(): ?int
    {
        return $this->connectionCount;
    }
    /**
     * Connections currently subscribed to this channel (requires include=connection_count and the app's connection-counting flag). Channel-scoped — distinct from the app-wide peak connections metric.
     *
     * @param int|null $connectionCount
     *
     * @return self
     */
    public function setConnectionCount(?int $connectionCount): self
    {
        $this->initialized['connectionCount'] = true;
        $this->connectionCount = $connectionCount;
        return $this;
    }
    /**
     * Whether at least one client is subscribed.
     *
     * @return bool|null
     */
    public function getOccupied(): ?bool
    {
        return $this->occupied;
    }
    /**
     * Whether at least one client is subscribed.
     *
     * @param bool|null $occupied
     *
     * @return self
     */
    public function setOccupied(?bool $occupied): self
    {
        $this->initialized['occupied'] = true;
        $this->occupied = $occupied;
        return $this;
    }
}
