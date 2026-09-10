<?php

namespace MessageBird\Wire\Model;

class WhatsAppStatsPointEngagement extends \ArrayObject
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
     * Distinct messages confirmed read by the recipient.
     *
     * @var int|null
     */
    protected $read;
    /**
     * Distinct messages confirmed read by the recipient.
     *
     * @return int|null
     */
    public function getRead(): ?int
    {
        return $this->read;
    }
    /**
     * Distinct messages confirmed read by the recipient.
     *
     * @param int|null $read
     *
     * @return self
     */
    public function setRead(?int $read): self
    {
        $this->initialized['read'] = true;
        $this->read = $read;
        return $this;
    }
}
