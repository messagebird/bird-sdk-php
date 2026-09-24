<?php

namespace MessageBird\Wire\Model;

class VoiceTrunkIPACL
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
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $trunkId;
    /**
     * IPv4 or IPv6 CIDR block that is allowed to send SIP traffic to this trunk.
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
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getTrunkId(): ?string
    {
        return $this->trunkId;
    }
    /**
     * @param string|null $trunkId
     *
     * @return self
     */
    public function setTrunkId(?string $trunkId): self
    {
        $this->initialized['trunkId'] = true;
        $this->trunkId = $trunkId;
        return $this;
    }
    /**
     * IPv4 or IPv6 CIDR block that is allowed to send SIP traffic to this trunk.
     *
     * @return string|null
     */
    public function getCidr(): ?string
    {
        return $this->cidr;
    }
    /**
     * IPv4 or IPv6 CIDR block that is allowed to send SIP traffic to this trunk.
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
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
}
