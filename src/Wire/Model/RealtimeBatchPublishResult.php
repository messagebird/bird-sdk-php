<?php

namespace MessageBird\Wire\Model;

class RealtimeBatchPublishResult
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
     * Per-event channel attributes at publish time, present only when at least one event asked for them via `include`. Positional: one item per event, in request order.
     *
     * @var list<RealtimeBatchPublishResultItem>|null
     */
    protected $data;
    /**
     * Per-event channel attributes at publish time, present only when at least one event asked for them via `include`. Positional: one item per event, in request order.
     *
     * @return list<RealtimeBatchPublishResultItem>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Per-event channel attributes at publish time, present only when at least one event asked for them via `include`. Positional: one item per event, in request order.
     *
     * @param list<RealtimeBatchPublishResultItem>|null $data
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
