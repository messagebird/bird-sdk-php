<?php

namespace MessageBird\Wire\Model;

class SMSInboundNumberStatsPoint
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
     * The Bird number the messages arrived on, in E.164, or the short code they were sent to. This is the same value the message resource exposes as `to`.
     *
     * @var string|null
     */
    protected $number;
    /**
     * Distinct messages received on this number during the period.
     *
     * @var int|null
     */
    protected $received;
    /**
     * The Bird number the messages arrived on, in E.164, or the short code they were sent to. This is the same value the message resource exposes as `to`.
     *
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }
    /**
     * The Bird number the messages arrived on, in E.164, or the short code they were sent to. This is the same value the message resource exposes as `to`.
     *
     * @param string|null $number
     *
     * @return self
     */
    public function setNumber(?string $number): self
    {
        $this->initialized['number'] = true;
        $this->number = $number;
        return $this;
    }
    /**
     * Distinct messages received on this number during the period.
     *
     * @return int|null
     */
    public function getReceived(): ?int
    {
        return $this->received;
    }
    /**
     * Distinct messages received on this number during the period.
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
