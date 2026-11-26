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
     * Event type to simulate. Any type from the event catalog is accepted, whether or not the endpoint subscribes to it; an unknown type returns a `422`. When omitted, the endpoint's first subscribed event type that is still in the catalog is used. An endpoint with no subscribed event types returns a `412`; one whose subscribed types have all left the catalog returns a `422`.
     * 
     *
     * @var string|null
     */
    protected $eventType;
    /**
     * Event type to simulate. Any type from the event catalog is accepted, whether or not the endpoint subscribes to it; an unknown type returns a `422`. When omitted, the endpoint's first subscribed event type that is still in the catalog is used. An endpoint with no subscribed event types returns a `412`; one whose subscribed types have all left the catalog returns a `422`.
     * 
     *
     * @return string|null
     */
    public function getEventType(): ?string
    {
        return $this->eventType;
    }
    /**
     * Event type to simulate. Any type from the event catalog is accepted, whether or not the endpoint subscribes to it; an unknown type returns a `422`. When omitted, the endpoint's first subscribed event type that is still in the catalog is used. An endpoint with no subscribed event types returns a `412`; one whose subscribed types have all left the catalog returns a `422`.
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
