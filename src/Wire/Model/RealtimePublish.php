<?php

namespace MessageBird\Wire\Model;

class RealtimePublish
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
     * The event name clients bind to. Application event names are free-form; the `bird:` and `bird_internal:` prefixes are reserved for the protocol and rejected.
     *
     * @var string|null
     */
    protected $event;
    /**
     * The channels to deliver the event to (up to 100 per call). Prefix with `private-` or `presence-` for authenticated channels.
     * 
     *
     * @var list<string>|null
     */
    protected $channels;
    /**
     * Arbitrary JSON payload delivered as the event data — an object, array, or scalar. Cap: 10 KB serialized.
     *
     * @var mixed|null
     */
    protected $data;
    /**
     * Exclude this connection from delivery, to avoid echoing a change back to the client that triggered it. The value is the client's connection id, assigned when its connection is established.
     *
     * @var string|null
     */
    protected $excludeConnectionId;
    /**
     * Per-channel attributes to return alongside the publish, reflecting each channel's state at publish time (same semantics and validation errors as on the channel endpoints: `member_count` is presence-channels only, `connection_count` requires the app's connection-counting flag). Requesting attributes counts as one additional message toward usage.
     *
     * @var list<string>|null
     */
    protected $include;
    /**
     * The event name clients bind to. Application event names are free-form; the `bird:` and `bird_internal:` prefixes are reserved for the protocol and rejected.
     *
     * @return string|null
     */
    public function getEvent(): ?string
    {
        return $this->event;
    }
    /**
     * The event name clients bind to. Application event names are free-form; the `bird:` and `bird_internal:` prefixes are reserved for the protocol and rejected.
     *
     * @param string|null $event
     *
     * @return self
     */
    public function setEvent(?string $event): self
    {
        $this->initialized['event'] = true;
        $this->event = $event;
        return $this;
    }
    /**
     * The channels to deliver the event to (up to 100 per call). Prefix with `private-` or `presence-` for authenticated channels.
     * 
     *
     * @return list<string>|null
     */
    public function getChannels(): ?array
    {
        return $this->channels;
    }
    /**
     * The channels to deliver the event to (up to 100 per call). Prefix with `private-` or `presence-` for authenticated channels.
     *
     * @param list<string>|null $channels
     *
     * @return self
     */
    public function setChannels(?array $channels): self
    {
        $this->initialized['channels'] = true;
        $this->channels = $channels;
        return $this;
    }
    /**
     * Arbitrary JSON payload delivered as the event data — an object, array, or scalar. Cap: 10 KB serialized.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
    /**
     * Arbitrary JSON payload delivered as the event data — an object, array, or scalar. Cap: 10 KB serialized.
     *
     * @param mixed $data
     *
     * @return self
     */
    public function setData($data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
    /**
     * Exclude this connection from delivery, to avoid echoing a change back to the client that triggered it. The value is the client's connection id, assigned when its connection is established.
     *
     * @return string|null
     */
    public function getExcludeConnectionId(): ?string
    {
        return $this->excludeConnectionId;
    }
    /**
     * Exclude this connection from delivery, to avoid echoing a change back to the client that triggered it. The value is the client's connection id, assigned when its connection is established.
     *
     * @param string|null $excludeConnectionId
     *
     * @return self
     */
    public function setExcludeConnectionId(?string $excludeConnectionId): self
    {
        $this->initialized['excludeConnectionId'] = true;
        $this->excludeConnectionId = $excludeConnectionId;
        return $this;
    }
    /**
     * Per-channel attributes to return alongside the publish, reflecting each channel's state at publish time (same semantics and validation errors as on the channel endpoints: `member_count` is presence-channels only, `connection_count` requires the app's connection-counting flag). Requesting attributes counts as one additional message toward usage.
     *
     * @return list<string>|null
     */
    public function getInclude(): ?array
    {
        return $this->include;
    }
    /**
     * Per-channel attributes to return alongside the publish, reflecting each channel's state at publish time (same semantics and validation errors as on the channel endpoints: `member_count` is presence-channels only, `connection_count` requires the app's connection-counting flag). Requesting attributes counts as one additional message toward usage.
     *
     * @param list<string>|null $include
     *
     * @return self
     */
    public function setInclude(?array $include): self
    {
        $this->initialized['include'] = true;
        $this->include = $include;
        return $this;
    }
}
