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
    protected $encryption = 'preferred';
    /**
     * The sites this trunk may use for call audio, including its home site. Omit this field to allow every media site.
     * 
     *
     * @var list<string>|null
     */
    protected $sites;
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
    /**
     * The sites this trunk may use for call audio, including its home site. Omit this field to allow every media site.
     * 
     *
     * @return list<string>|null
     */
    public function getSites(): ?array
    {
        return $this->sites;
    }
    /**
     * The sites this trunk may use for call audio, including its home site. Omit this field to allow every media site.
     *
     * @param list<string>|null $sites
     *
     * @return self
     */
    public function setSites(?array $sites): self
    {
        $this->initialized['sites'] = true;
        $this->sites = $sites;
        return $this;
    }
}
