<?php

namespace MessageBird\Wire\Model;

class WebhookAttempt
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
     * Identifier of this individual delivery attempt. Each retry is a separate attempt with its own id; use `event_id` to group the attempts for one event.
     * 
     *
     * @var string|null
     */
    protected $id;
    /**
     * Bird's source event ID, stable across retries of the same event. Null only for older attempts recorded before event IDs were available.
     *
     * @var string|null
     */
    protected $eventId;
    /**
     * Webhook event type. This is an open enum, so accept unrecognized values in deliveries. Subscribing to a type outside the event catalog returns a `422`.
     * 
     *
     * @var string|null
     */
    protected $eventType;
    /**
     * Outcome of this attempt.
     * 
     * - `delivered`: your endpoint accepted it with a `2xx` response.
     * - `pending`: the attempt is still in flight.
     * - `failed`: it returned a non-`2xx` response or no response at all. A `failed`
     *   attempt is not final for the event: automatic retries appear as further
     *   attempts with the same `event_id`.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * URL the request was sent to: the endpoint's `url` at the time of the attempt, which can differ from the current configuration after an update.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * HTTP status returned by the receiver. Null when no response was received (timeout, connection error, DNS failure).
     *
     * @var int|null
     */
    protected $responseStatusCode;
    /**
     * Response body your endpoint returned, which may be truncated. Omitted when no body was returned.
     * 
     *
     * @var string|null
     */
    protected $responseBody;
    /**
     * Round-trip duration in milliseconds.
     *
     * @var int|null
     */
    protected $responseDurationMs;
    /**
     * When this attempt was made. Attempts are listed newest first by this timestamp, and the list's `before`/`after` parameters bound it.
     * 
     *
     * @var \DateTime|null
     */
    protected $attemptedAt;
    /**
     * Identifier of this individual delivery attempt. Each retry is a separate attempt with its own id; use `event_id` to group the attempts for one event.
     * 
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Identifier of this individual delivery attempt. Each retry is a separate attempt with its own id; use `event_id` to group the attempts for one event.
     *
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
     * Bird's source event ID, stable across retries of the same event. Null only for older attempts recorded before event IDs were available.
     *
     * @return string|null
     */
    public function getEventId(): ?string
    {
        return $this->eventId;
    }
    /**
     * Bird's source event ID, stable across retries of the same event. Null only for older attempts recorded before event IDs were available.
     *
     * @param string|null $eventId
     *
     * @return self
     */
    public function setEventId(?string $eventId): self
    {
        $this->initialized['eventId'] = true;
        $this->eventId = $eventId;
        return $this;
    }
    /**
     * Webhook event type. This is an open enum, so accept unrecognized values in deliveries. Subscribing to a type outside the event catalog returns a `422`.
     * 
     *
     * @return string|null
     */
    public function getEventType(): ?string
    {
        return $this->eventType;
    }
    /**
     * Webhook event type. This is an open enum, so accept unrecognized values in deliveries. Subscribing to a type outside the event catalog returns a `422`.
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
    /**
     * Outcome of this attempt.
     * 
     * - `delivered`: your endpoint accepted it with a `2xx` response.
     * - `pending`: the attempt is still in flight.
     * - `failed`: it returned a non-`2xx` response or no response at all. A `failed`
     *   attempt is not final for the event: automatic retries appear as further
     *   attempts with the same `event_id`.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Outcome of this attempt.
    
    - `delivered`: your endpoint accepted it with a `2xx` response.
    - `pending`: the attempt is still in flight.
    - `failed`: it returned a non-`2xx` response or no response at all. A `failed`
     attempt is not final for the event: automatic retries appear as further
     attempts with the same `event_id`.
    
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
     * URL the request was sent to: the endpoint's `url` at the time of the attempt, which can differ from the current configuration after an update.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * URL the request was sent to: the endpoint's `url` at the time of the attempt, which can differ from the current configuration after an update.
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
     * HTTP status returned by the receiver. Null when no response was received (timeout, connection error, DNS failure).
     *
     * @return int|null
     */
    public function getResponseStatusCode(): ?int
    {
        return $this->responseStatusCode;
    }
    /**
     * HTTP status returned by the receiver. Null when no response was received (timeout, connection error, DNS failure).
     *
     * @param int|null $responseStatusCode
     *
     * @return self
     */
    public function setResponseStatusCode(?int $responseStatusCode): self
    {
        $this->initialized['responseStatusCode'] = true;
        $this->responseStatusCode = $responseStatusCode;
        return $this;
    }
    /**
     * Response body your endpoint returned, which may be truncated. Omitted when no body was returned.
     * 
     *
     * @return string|null
     */
    public function getResponseBody(): ?string
    {
        return $this->responseBody;
    }
    /**
     * Response body your endpoint returned, which may be truncated. Omitted when no body was returned.
     *
     * @param string|null $responseBody
     *
     * @return self
     */
    public function setResponseBody(?string $responseBody): self
    {
        $this->initialized['responseBody'] = true;
        $this->responseBody = $responseBody;
        return $this;
    }
    /**
     * Round-trip duration in milliseconds.
     *
     * @return int|null
     */
    public function getResponseDurationMs(): ?int
    {
        return $this->responseDurationMs;
    }
    /**
     * Round-trip duration in milliseconds.
     *
     * @param int|null $responseDurationMs
     *
     * @return self
     */
    public function setResponseDurationMs(?int $responseDurationMs): self
    {
        $this->initialized['responseDurationMs'] = true;
        $this->responseDurationMs = $responseDurationMs;
        return $this;
    }
    /**
     * When this attempt was made. Attempts are listed newest first by this timestamp, and the list's `before`/`after` parameters bound it.
     * 
     *
     * @return \DateTime|null
     */
    public function getAttemptedAt(): ?\DateTime
    {
        return $this->attemptedAt;
    }
    /**
     * When this attempt was made. Attempts are listed newest first by this timestamp, and the list's `before`/`after` parameters bound it.
     *
     * @param \DateTime|null $attemptedAt
     *
     * @return self
     */
    public function setAttemptedAt(?\DateTime $attemptedAt): self
    {
        $this->initialized['attemptedAt'] = true;
        $this->attemptedAt = $attemptedAt;
        return $this;
    }
}
