<?php

namespace MessageBird\Wire\Model;

class WebhookEndpointCreate
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
     * HTTPS URL to deliver events to, at most 2048 characters. The host must be publicly reachable: URLs on private, loopback, or link-local addresses are rejected with a `422`.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * Event types to subscribe to; the endpoint receives only matching events. Types outside the event catalog return a `422`, and an endpoint holds at most 100 entries.
     *
     * @var list<string>|null
     */
    protected $events;
    /**
     * Human-readable label for this endpoint, up to 256 characters.
     *
     * @var string|null
     */
    protected $description;
    /**
     * HTTPS URL to deliver events to, at most 2048 characters. The host must be publicly reachable: URLs on private, loopback, or link-local addresses are rejected with a `422`.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * HTTPS URL to deliver events to, at most 2048 characters. The host must be publicly reachable: URLs on private, loopback, or link-local addresses are rejected with a `422`.
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
    /**
     * Event types to subscribe to; the endpoint receives only matching events. Types outside the event catalog return a `422`, and an endpoint holds at most 100 entries.
     *
     * @return list<string>|null
     */
    public function getEvents(): ?array
    {
        return $this->events;
    }
    /**
     * Event types to subscribe to; the endpoint receives only matching events. Types outside the event catalog return a `422`, and an endpoint holds at most 100 entries.
     *
     * @param list<string>|null $events
     *
     * @return self
     */
    public function setEvents(?array $events): self
    {
        $this->initialized['events'] = true;
        $this->events = $events;
        return $this;
    }
    /**
     * Human-readable label for this endpoint, up to 256 characters.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Human-readable label for this endpoint, up to 256 characters.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
}
