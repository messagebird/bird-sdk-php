<?php

namespace MessageBird\Wire\Model;

class RealtimeBatchPublishResultItem extends \ArrayObject
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
     * Distinct members (presence channels only; requires `include=member_count`).
     *
     * @var int|null
     */
    protected $memberCount;
    /**
     * Connections currently subscribed to this channel (requires `include=connection_count` and the app's connection-counting flag). Channel-scoped: distinct from the app-wide peak connections metric.
     *
     * @var int|null
     */
    protected $connectionCount;
    /**
     * A Realtime channel name. Only letters, digits, and _ - = @ , . ; Prefix with `private-` or `presence-` for authenticated channels, or `private-encrypted-` for channels whose payloads are end-to-end encrypted with a key only you hold.
     *
     * @var string|null
     */
    protected $channel;
    /**
     * Distinct members (presence channels only; requires `include=member_count`).
     *
     * @return int|null
     */
    public function getMemberCount(): ?int
    {
        return $this->memberCount;
    }
    /**
     * Distinct members (presence channels only; requires `include=member_count`).
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
     * Connections currently subscribed to this channel (requires `include=connection_count` and the app's connection-counting flag). Channel-scoped: distinct from the app-wide peak connections metric.
     *
     * @return int|null
     */
    public function getConnectionCount(): ?int
    {
        return $this->connectionCount;
    }
    /**
     * Connections currently subscribed to this channel (requires `include=connection_count` and the app's connection-counting flag). Channel-scoped: distinct from the app-wide peak connections metric.
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
     * A Realtime channel name. Only letters, digits, and _ - = @ , . ; Prefix with `private-` or `presence-` for authenticated channels, or `private-encrypted-` for channels whose payloads are end-to-end encrypted with a key only you hold.
     *
     * @return string|null
     */
    public function getChannel(): ?string
    {
        return $this->channel;
    }
    /**
     * A Realtime channel name. Only letters, digits, and _ - = @ , . ; Prefix with `private-` or `presence-` for authenticated channels, or `private-encrypted-` for channels whose payloads are end-to-end encrypted with a key only you hold.
     *
     * @param string|null $channel
     *
     * @return self
     */
    public function setChannel(?string $channel): self
    {
        $this->initialized['channel'] = true;
        $this->channel = $channel;
        return $this;
    }
}
