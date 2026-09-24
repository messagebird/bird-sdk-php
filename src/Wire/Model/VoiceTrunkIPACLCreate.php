<?php

namespace MessageBird\Wire\Model;

class VoiceTrunkIPACLCreate
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
     * IPv4 or IPv6 CIDR block to allow. Use /32 for a single IPv4 address or /128 for a single IPv6 address.
     *
     * @var string|null
     */
    protected $cidr;
    /**
     * Optional human-readable label for this ACL entry.
     *
     * @var string|null
     */
    protected $description;
    /**
     * IPv4 or IPv6 CIDR block to allow. Use /32 for a single IPv4 address or /128 for a single IPv6 address.
     *
     * @return string|null
     */
    public function getCidr(): ?string
    {
        return $this->cidr;
    }
    /**
     * IPv4 or IPv6 CIDR block to allow. Use /32 for a single IPv4 address or /128 for a single IPv6 address.
     *
     * @param string|null $cidr
     *
     * @return self
     */
    public function setCidr(?string $cidr): self
    {
        $this->initialized['cidr'] = true;
        $this->cidr = $cidr;
        return $this;
    }
    /**
     * Optional human-readable label for this ACL entry.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Optional human-readable label for this ACL entry.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
}
