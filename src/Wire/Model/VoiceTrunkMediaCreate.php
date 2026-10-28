<?php

namespace MessageBird\Wire\Model;

/**
 * How the new trunk carries call audio. An omitted member takes its default.
 */
class VoiceTrunkMediaCreate
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
     * Omit it for `preferred`, which encrypts whenever your equipment and gateways allow and otherwise carries calls as before.
     * 
     *
     * @var string|null
     */
    protected $encryption;
    /**
     * Omit it for `preferred`, which encrypts whenever your equipment and gateways allow and otherwise carries calls as before.
     * 
     *
     * @return string|null
     */
    public function getEncryption(): ?string
    {
        return $this->encryption;
    }
    /**
     * Omit it for `preferred`, which encrypts whenever your equipment and gateways allow and otherwise carries calls as before.
     *
     * @param string|null $encryption
     *
     * @return self
     */
    public function setEncryption(?string $encryption): self
    {
        $this->initialized['encryption'] = true;
        $this->encryption = $encryption;
        return $this;
    }
}
