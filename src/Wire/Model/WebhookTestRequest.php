<?php

namespace MessageBird\Wire\Model;

class WebhookTestRequest
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
     * Event type to simulate. Any type from the event catalog is accepted, whether or not the endpoint subscribes to it; an unknown type returns a `422`. When omitted, the endpoint's first subscribed event type is used.
     * 
     *
     * @var string|null
     */
    protected $eventType;
    /**
     * Event type to simulate. Any type from the event catalog is accepted, whether or not the endpoint subscribes to it; an unknown type returns a `422`. When omitted, the endpoint's first subscribed event type is used.
     * 
     *
     * @return string|null
     */
    public function getEventType(): ?string
    {
        return $this->eventType;
    }
    /**
     * Event type to simulate. Any type from the event catalog is accepted, whether or not the endpoint subscribes to it; an unknown type returns a `422`. When omitted, the endpoint's first subscribed event type is used.
     *
     * @param string|null $eventType
     *
     * @return self
     */
    public function setEventType(?string $eventType): self
    {
        $this->initialized['eventType'] = true;
        $this->eventType = $eventType;
        return $this;
    }
}
