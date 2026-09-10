<?php

namespace MessageBird\Wire\Model;

class WhatsAppInboundStatsPoint
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
     * The day (YYYY-MM-DD) or hour (RFC 3339, on the hour) this point covers, matching the request's grain.
     *
     * @var string|null
     */
    protected $bucket;
    /**
     * Distinct messages received in this bucket.
     *
     * @var int|null
     */
    protected $received;
    /**
     * The day (YYYY-MM-DD) or hour (RFC 3339, on the hour) this point covers, matching the request's grain.
     *
     * @return string|null
     */
    public function getBucket(): ?string
    {
        return $this->bucket;
    }
    /**
     * The day (YYYY-MM-DD) or hour (RFC 3339, on the hour) this point covers, matching the request's grain.
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
     * Distinct messages received in this bucket.
     *
     * @return int|null
     */
    public function getReceived(): ?int
    {
        return $this->received;
    }
    /**
     * Distinct messages received in this bucket.
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
