<?php

namespace MessageBird\Wire\Model;

class WebhookTestResponse
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
     * Whether your endpoint accepted the test event. `delivered` means it returned a `2xx` status; `failed` means it returned a non-`2xx` status or could not be reached (see `error` for the latter).
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * HTTP status returned by your endpoint. Null when no response was received (timeout, connection error, DNS failure).
     *
     * @var int|null
     */
    protected $responseStatusCode;
    /**
     * Response body returned by your endpoint, truncated to the first 1024 bytes. Omitted when your endpoint returned no body or could not be reached.
     * 
     *
     * @var string|null
     */
    protected $responseBody;
    /**
     * Round-trip delivery latency in milliseconds.
     *
     * @var int|null
     */
    protected $responseDurationMs;
    /**
     * Webhook delivery body. `type` identifies the event variant, `timestamp` is when the event occurred, and `data` contains the event-specific payload. See the [webhooks guide](/docs/guides/webhooks) for signature verification.
     * 
     *
     * @var mixed|null
     */
    protected $eventPayload;
    /**
     * A short explanation of why the event could not be delivered. Present only when your endpoint could not be reached.
     *
     * @var string|null
     */
    protected $error;
    /**
     * Whether your endpoint accepted the test event. `delivered` means it returned a `2xx` status; `failed` means it returned a non-`2xx` status or could not be reached (see `error` for the latter).
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Whether your endpoint accepted the test event. `delivered` means it returned a `2xx` status; `failed` means it returned a non-`2xx` status or could not be reached (see `error` for the latter).
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
     * HTTP status returned by your endpoint. Null when no response was received (timeout, connection error, DNS failure).
     *
     * @return int|null
     */
    public function getResponseStatusCode(): ?int
    {
        return $this->responseStatusCode;
    }
    /**
     * HTTP status returned by your endpoint. Null when no response was received (timeout, connection error, DNS failure).
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
     * Response body returned by your endpoint, truncated to the first 1024 bytes. Omitted when your endpoint returned no body or could not be reached.
     * 
     *
     * @return string|null
     */
    public function getResponseBody(): ?string
    {
        return $this->responseBody;
    }
    /**
     * Response body returned by your endpoint, truncated to the first 1024 bytes. Omitted when your endpoint returned no body or could not be reached.
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
     * Round-trip delivery latency in milliseconds.
     *
     * @return int|null
     */
    public function getResponseDurationMs(): ?int
    {
        return $this->responseDurationMs;
    }
    /**
     * Round-trip delivery latency in milliseconds.
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
     * Webhook delivery body. `type` identifies the event variant, `timestamp` is when the event occurred, and `data` contains the event-specific payload. See the [webhooks guide](/docs/guides/webhooks) for signature verification.
     * 
     *
     * @return mixed
     */
    public function getEventPayload()
    {
        return $this->eventPayload;
    }
    /**
     * Webhook delivery body. `type` identifies the event variant, `timestamp` is when the event occurred, and `data` contains the event-specific payload. See the [webhooks guide](/docs/guides/webhooks) for signature verification.
     *
     * @param mixed $eventPayload
     *
     * @return self
     */
    public function setEventPayload($eventPayload): self
    {
        $this->initialized['eventPayload'] = true;
        $this->eventPayload = $eventPayload;
        return $this;
    }
    /**
     * A short explanation of why the event could not be delivered. Present only when your endpoint could not be reached.
     *
     * @return string|null
     */
    public function getError(): ?string
    {
        return $this->error;
    }
    /**
     * A short explanation of why the event could not be delivered. Present only when your endpoint could not be reached.
     *
     * @param string|null $error
     *
     * @return self
     */
    public function setError(?string $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;
        return $this;
    }
}
