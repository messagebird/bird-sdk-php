<?php

namespace MessageBird\Wire\Model;

/**
 * Link to the message's entry in the received-message or sent-message log, which has delivery analytics such as per-recipient events. Log entries expire 30 days after the message occurred.
 */
class EmailThreadMessageSource
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
     * API path of the log entry for this message.
     *
     * @var string|null
     */
    protected $resource;
    /**
     * When the log entry (and the message's body and raw MIME) expires.
     *
     * @var \DateTime|null
     */
    protected $availableUntil;
    /**
     * API path of the log entry for this message.
     *
     * @return string|null
     */
    public function getResource(): ?string
    {
        return $this->resource;
    }
    /**
     * API path of the log entry for this message.
     *
     * @param string|null $resource
     *
     * @return self
     */
    public function setResource(?string $resource): self
    {
        $this->initialized['resource'] = true;
        $this->resource = $resource;
        return $this;
    }
    /**
     * When the log entry (and the message's body and raw MIME) expires.
     *
     * @return \DateTime|null
     */
    public function getAvailableUntil(): ?\DateTime
    {
        return $this->availableUntil;
    }
    /**
     * When the log entry (and the message's body and raw MIME) expires.
     *
     * @param \DateTime|null $availableUntil
     *
     * @return self
     */
    public function setAvailableUntil(?\DateTime $availableUntil): self
    {
        $this->initialized['availableUntil'] = true;
        $this->availableUntil = $availableUntil;
        return $this;
    }
}
