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
     * HTTPS URL to deliver events to, at most 2048 characters. The host must be publicly reachable: URLs on private, loopback, or link-local addresses are rejected with a `422`. Required unless `destination` is a connector, whose URL comes from the connector and its `config`; a URL given with one must equal it.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * Exact match on `mailbox_id`, for `email_mailbox.*` events only; the mailbox must belong to this workspace. Cannot be combined with Realtime app scope. Omit on create for all resources; on update omit to keep, send `null` to clear.
     * 
     *
     * @var WebhookFilter|null
     */
    protected $filter;
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
     * How each delivery is built. Omit to post the signed event to `url` unchanged, the same as `{"type": "webhook"}`.
     * 
     *
     * @var mixed|null
     */
    protected $destination;
    /**
     * HTTPS URL to deliver events to, at most 2048 characters. The host must be publicly reachable: URLs on private, loopback, or link-local addresses are rejected with a `422`. Required unless `destination` is a connector, whose URL comes from the connector and its `config`; a URL given with one must equal it.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * HTTPS URL to deliver events to, at most 2048 characters. The host must be publicly reachable: URLs on private, loopback, or link-local addresses are rejected with a `422`. Required unless `destination` is a connector, whose URL comes from the connector and its `config`; a URL given with one must equal it.
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
     * Exact match on `mailbox_id`, for `email_mailbox.*` events only; the mailbox must belong to this workspace. Cannot be combined with Realtime app scope. Omit on create for all resources; on update omit to keep, send `null` to clear.
     * 
     *
     * @return WebhookFilter|null
     */
    public function getFilter(): ?WebhookFilter
    {
        return $this->filter;
    }
    /**
     * Exact match on `mailbox_id`, for `email_mailbox.*` events only; the mailbox must belong to this workspace. Cannot be combined with Realtime app scope. Omit on create for all resources; on update omit to keep, send `null` to clear.
     *
     * @param WebhookFilter|null $filter
     *
     * @return self
     */
    public function setFilter(?WebhookFilter $filter): self
    {
        $this->initialized['filter'] = true;
        $this->filter = $filter;
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
    /**
     * How each delivery is built. Omit to post the signed event to `url` unchanged, the same as `{"type": "webhook"}`.
     * 
     *
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }
    /**
     * How each delivery is built. Omit to post the signed event to `url` unchanged, the same as `{"type": "webhook"}`.
     *
     * @param mixed $destination
     *
     * @return self
     */
    public function setDestination($destination): self
    {
        $this->initialized['destination'] = true;
        $this->destination = $destination;
        return $this;
    }
}
