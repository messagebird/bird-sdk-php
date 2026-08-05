<?php

namespace MessageBird\Wire\Model;

class VerificationChannelEntry
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
     * The channel a passcode is delivered over. Open enum — new channels may be added over time, so treat any unrecognized value as a future channel rather than an error.
     *
     * @var string|null
     */
    protected $channel;
    /**
     * The channel a passcode is delivered over. Open enum — new channels may be added over time, so treat any unrecognized value as a future channel rather than an error.
     *
     * @return string|null
     */
    public function getChannel(): ?string
    {
        return $this->channel;
    }
    /**
     * The channel a passcode is delivered over. Open enum — new channels may be added over time, so treat any unrecognized value as a future channel rather than an error.
     *
     * @param string|null $channel
     *
     * @return self
     */
    public function setChannel(?string $channel): self
    {
        $this->initialized['channel'] = true;
        $this->channel = $channel;
        return $this;
    }
}
