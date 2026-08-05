<?php

namespace MessageBird\Wire\Model;

class RealtimeBatchPublish
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
     * Up to 10 events per batch.
     *
     * @var list<RealtimeBatchEvent>|null
     */
    protected $events;
    /**
     * Up to 10 events per batch.
     *
     * @return list<RealtimeBatchEvent>|null
     */
    public function getEvents(): ?array
    {
        return $this->events;
    }
    /**
     * Up to 10 events per batch.
     *
     * @param list<RealtimeBatchEvent>|null $events
     *
     * @return self
     */
    public function setEvents(?array $events): self
    {
        $this->initialized['events'] = true;
        $this->events = $events;
        return $this;
    }
}
