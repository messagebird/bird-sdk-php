<?php

namespace MessageBird\Wire\Model;

class SMSInboundStatsPoint
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
     * Start of the bucket this row covers, as a calendar day (YYYY-MM-DD) for the daily series or an hour boundary (RFC 3339) for the hourly one.
     *
     * @var string|null
     */
    protected $bucket;
    /**
     * Distinct messages received in this bucket, counted by the time the carrier received them.
     *
     * @var int|null
     */
    protected $received;
    /**
     * Start of the bucket this row covers, as a calendar day (YYYY-MM-DD) for the daily series or an hour boundary (RFC 3339) for the hourly one.
     *
     * @return string|null
     */
    public function getBucket(): ?string
    {
        return $this->bucket;
    }
    /**
     * Start of the bucket this row covers, as a calendar day (YYYY-MM-DD) for the daily series or an hour boundary (RFC 3339) for the hourly one.
     *
     * @param string|null $bucket
     *
     * @return self
     */
    public function setBucket(?string $bucket): self
    {
        $this->initialized['bucket'] = true;
        $this->bucket = $bucket;
        return $this;
    }
    /**
     * Distinct messages received in this bucket, counted by the time the carrier received them.
     *
     * @return int|null
     */
    public function getReceived(): ?int
    {
        return $this->received;
    }
    /**
     * Distinct messages received in this bucket, counted by the time the carrier received them.
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
