<?php

namespace MessageBird\Wire\Model;

class WebhookEndpoint extends \ArrayObject
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
     * @var string|null
     */
    protected $id;
    /**
     * HTTPS URL where the API delivers events for this endpoint.
     *
     * @var string|null
     */
    protected $url;
    /**
     * Human-readable label for the endpoint.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Event types this endpoint is subscribed to; only matching events are delivered. Change the set with [Update a webhook endpoint](/docs/api/reference/update-webhook).
     * 
     *
     * @var list<string>|null
     */
    protected $events;
    /**
     * Delivery state of the endpoint.
     * 
     * - `active`: The initial state; events are being delivered normally.
     * - `degraded`: Recent deliveries are failing. We keep delivering and retrying,
     *   and the endpoint returns to `active` automatically once deliveries succeed
     *   again.
     * - `paused`: All delivery is stopped, either because an update set `status` to
     *   `paused` or automatically after sustained delivery failures. A paused endpoint
     *   never resumes on its own: re-enable it with
     *   [Update a webhook endpoint](/docs/api/reference/update-webhook), then recover
     *   the missed events with
     *   [Replay missed events](/docs/api/reference/create-webhook-replay).
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * HTTPS URL where the API delivers events for this endpoint.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * HTTPS URL where the API delivers events for this endpoint.
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
     * Human-readable label for the endpoint.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Human-readable label for the endpoint.
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
     * Event types this endpoint is subscribed to; only matching events are delivered. Change the set with [Update a webhook endpoint](/docs/api/reference/update-webhook).
     * 
     *
     * @return list<string>|null
     */
    public function getEvents(): ?array
    {
        return $this->events;
    }
    /**
     * Event types this endpoint is subscribed to; only matching events are delivered. Change the set with [Update a webhook endpoint](/docs/api/reference/update-webhook).
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
     * Delivery state of the endpoint.
     * 
     * - `active`: The initial state; events are being delivered normally.
     * - `degraded`: Recent deliveries are failing. We keep delivering and retrying,
     *   and the endpoint returns to `active` automatically once deliveries succeed
     *   again.
     * - `paused`: All delivery is stopped, either because an update set `status` to
     *   `paused` or automatically after sustained delivery failures. A paused endpoint
     *   never resumes on its own: re-enable it with
     *   [Update a webhook endpoint](/docs/api/reference/update-webhook), then recover
     *   the missed events with
     *   [Replay missed events](/docs/api/reference/create-webhook-replay).
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Delivery state of the endpoint.
    
    - `active`: The initial state; events are being delivered normally.
    - `degraded`: Recent deliveries are failing. We keep delivering and retrying,
     and the endpoint returns to `active` automatically once deliveries succeed
     again.
    - `paused`: All delivery is stopped, either because an update set `status` to
     `paused` or automatically after sustained delivery failures. A paused endpoint
     never resumes on its own: re-enable it with
     [Update a webhook endpoint](/docs/api/reference/update-webhook), then recover
     the missed events with
     [Replay missed events](/docs/api/reference/create-webhook-replay).
    
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
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
