<?php

namespace MessageBird\Wire\Model;

/**
 * Received-message volume for one message type.
 */
class SMSInboundContentTypeStatsPoint
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
     * Message type used for reporting. Previously recorded statistics remain attributed to SMS. New activity uses the message type.
     *
     * @var string|null
     */
    protected $contentType;
    /**
     * Distinct messages received on numbers in this message type during the period.
     *
     * @var int|null
     */
    protected $received;
    /**
     * Message type used for reporting. Previously recorded statistics remain attributed to SMS. New activity uses the message type.
     *
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }
    /**
     * Message type used for reporting. Previously recorded statistics remain attributed to SMS. New activity uses the message type.
     *
     * @param string|null $contentType
     *
     * @return self
     */
    public function setContentType(?string $contentType): self
    {
        $this->initialized['contentType'] = true;
        $this->contentType = $contentType;
        return $this;
    }
    /**
     * Distinct messages received on numbers in this message type during the period.
     *
     * @return int|null
     */
    public function getReceived(): ?int
    {
        return $this->received;
    }
    /**
     * Distinct messages received on numbers in this message type during the period.
     *
     * @param int|null $received
     *
     * @return self
     */
    public function setReceived(?int $received): self
    {
        $this->initialized['received'] = true;
        $this->received = $received;
        return $this;
    }
}
