<?php

namespace MessageBird\Wire\Model;

class WebhookAttemptList
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
     * Delivery attempts, newest first.
     *
     * @var list<WebhookAttempt>|null
     */
    protected $data;
    /**
     * Delivery attempts, newest first.
     *
     * @return list<WebhookAttempt>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Delivery attempts, newest first.
     *
     * @param list<WebhookAttempt>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}
