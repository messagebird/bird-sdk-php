<?php

namespace MessageBird\Wire\Model;

class RealtimePublishResult
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
     * Per-channel attributes at publish time, present only when the request asked for them via `include`; one item per distinct target channel, sorted by name.
     *
     * @var list<RealtimeChannelListItem>|null
     */
    protected $data;
    /**
     * Per-channel attributes at publish time, present only when the request asked for them via `include`; one item per distinct target channel, sorted by name.
     *
     * @return list<RealtimeChannelListItem>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Per-channel attributes at publish time, present only when the request asked for them via `include`; one item per distinct target channel, sorted by name.
     *
     * @param list<RealtimeChannelListItem>|null $data
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
