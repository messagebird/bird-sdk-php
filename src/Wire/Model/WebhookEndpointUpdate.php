<?php

namespace MessageBird\Wire\Model;

class WebhookEndpointUpdate
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
     * Replacement delivery URL. Same rules as at creation: HTTPS, at most 2048 characters, and the host must be publicly reachable (private, loopback, and link-local addresses return a `422`). Omit to keep the current URL.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * Human-readable label for this endpoint, up to 256 characters.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Replaces all event subscriptions with this list. Omit to keep the current set. Types outside the event catalog return a `422`.
     * 
     *
     * @var list<string>|null
     */
    protected $events;
    /**
     * `paused` stops all deliveries; `active` re-enables a paused endpoint. Omit to leave the status unchanged. Events that fire while paused are not delivered; after re-enabling, recover them with [Replay missed events](/docs/api/reference/create-webhook-replay). A `degraded` endpoint cannot be reset through this field: it returns to `active` automatically once deliveries succeed again.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Replacement delivery URL. Same rules as at creation: HTTPS, at most 2048 characters, and the host must be publicly reachable (private, loopback, and link-local addresses return a `422`). Omit to keep the current URL.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Replacement delivery URL. Same rules as at creation: HTTPS, at most 2048 characters, and the host must be publicly reachable (private, loopback, and link-local addresses return a `422`). Omit to keep the current URL.
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
     * Replaces all event subscriptions with this list. Omit to keep the current set. Types outside the event catalog return a `422`.
     * 
     *
     * @return list<string>|null
     */
    public function getEvents(): ?array
    {
        return $this->events;
    }
    /**
     * Replaces all event subscriptions with this list. Omit to keep the current set. Types outside the event catalog return a `422`.
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
     * `paused` stops all deliveries; `active` re-enables a paused endpoint. Omit to leave the status unchanged. Events that fire while paused are not delivered; after re-enabling, recover them with [Replay missed events](/docs/api/reference/create-webhook-replay). A `degraded` endpoint cannot be reset through this field: it returns to `active` automatically once deliveries succeed again.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * `paused` stops all deliveries; `active` re-enables a paused endpoint. Omit to leave the status unchanged. Events that fire while paused are not delivered; after re-enabling, recover them with [Replay missed events](/docs/api/reference/create-webhook-replay). A `degraded` endpoint cannot be reset through this field: it returns to `active` automatically once deliveries succeed again.
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
}
