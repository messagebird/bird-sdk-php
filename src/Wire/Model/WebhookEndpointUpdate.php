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
     * Replacement delivery URL. Same rules as at creation: HTTPS, at most 2048 characters, and the host must be publicly reachable (private, loopback, and link-local addresses return a `422`). Omit to keep the current URL. A connector endpoint's URL comes from its connector and cannot be replaced: any value returns a `422`.
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
     * Replace the mailbox scope. Omit to keep it, or send null to include all resources. Scoped endpoints accept only email_mailbox events.
     *
     * @var WebhookEndpointUpdateFilter|null
     */
    protected $filter;
    /**
     * Replaces all event subscriptions with this list. Omit to keep the current set. Types outside the event catalog return a `422`.
     * 
     *
     * @var list<string>|null
     */
    protected $events;
    /**
     * Changes to how deliveries are built, shaped as at creation. Only a `connector` destination takes `connector`; on any other endpoint it returns a `422`. Omit to keep the destination.
     * 
     *
     * @var WebhookDestinationUpdate|null
     */
    protected $destination;
    /**
     * `paused` stops all deliveries; `active` re-enables a paused endpoint. Omit to leave the status unchanged. Events that fire while paused are not delivered and a replay cannot recover them, because they were never attempted; after re-enabling, [Replay failed deliveries](/docs/api/reference/create-webhook-replay) reaches only the deliveries that failed before the pause. A `degraded` endpoint cannot be reset through this field: it returns to `active` automatically once deliveries succeed again.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Replacement delivery URL. Same rules as at creation: HTTPS, at most 2048 characters, and the host must be publicly reachable (private, loopback, and link-local addresses return a `422`). Omit to keep the current URL. A connector endpoint's URL comes from its connector and cannot be replaced: any value returns a `422`.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Replacement delivery URL. Same rules as at creation: HTTPS, at most 2048 characters, and the host must be publicly reachable (private, loopback, and link-local addresses return a `422`). Omit to keep the current URL. A connector endpoint's URL comes from its connector and cannot be replaced: any value returns a `422`.
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
     * Replace the mailbox scope. Omit to keep it, or send null to include all resources. Scoped endpoints accept only email_mailbox events.
     *
     * @return WebhookEndpointUpdateFilter|null
     */
    public function getFilter(): ?WebhookEndpointUpdateFilter
    {
        return $this->filter;
    }
    /**
     * Replace the mailbox scope. Omit to keep it, or send null to include all resources. Scoped endpoints accept only email_mailbox events.
     *
     * @param WebhookEndpointUpdateFilter|null $filter
     *
     * @return self
     */
    public function setFilter(?WebhookEndpointUpdateFilter $filter): self
    {
        $this->initialized['filter'] = true;
        $this->filter = $filter;
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
     * Changes to how deliveries are built, shaped as at creation. Only a `connector` destination takes `connector`; on any other endpoint it returns a `422`. Omit to keep the destination.
     * 
     *
     * @return WebhookDestinationUpdate|null
     */
    public function getDestination(): ?WebhookDestinationUpdate
    {
        return $this->destination;
    }
    /**
     * Changes to how deliveries are built, shaped as at creation. Only a `connector` destination takes `connector`; on any other endpoint it returns a `422`. Omit to keep the destination.
     *
     * @param WebhookDestinationUpdate|null $destination
     *
     * @return self
     */
    public function setDestination(?WebhookDestinationUpdate $destination): self
    {
        $this->initialized['destination'] = true;
        $this->destination = $destination;
        return $this;
    }
    /**
     * `paused` stops all deliveries; `active` re-enables a paused endpoint. Omit to leave the status unchanged. Events that fire while paused are not delivered and a replay cannot recover them, because they were never attempted; after re-enabling, [Replay failed deliveries](/docs/api/reference/create-webhook-replay) reaches only the deliveries that failed before the pause. A `degraded` endpoint cannot be reset through this field: it returns to `active` automatically once deliveries succeed again.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * `paused` stops all deliveries; `active` re-enables a paused endpoint. Omit to leave the status unchanged. Events that fire while paused are not delivered and a replay cannot recover them, because they were never attempted; after re-enabling, [Replay failed deliveries](/docs/api/reference/create-webhook-replay) reaches only the deliveries that failed before the pause. A `degraded` endpoint cannot be reset through this field: it returns to `active` automatically once deliveries succeed again.
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
