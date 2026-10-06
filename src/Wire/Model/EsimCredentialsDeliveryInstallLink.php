<?php

namespace MessageBird\Wire\Model;

class EsimCredentialsDeliveryInstallLink extends \ArrayObject
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
     * When the installation link expires.
     *
     * @var \DateTime|null
     */
    protected $expiresAt;
    /**
     * When the link was revoked, or null while not revoked.
     *
     * @var \DateTime|null
     */
    protected $revokedAt;
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
     * When the installation link expires.
     *
     * @return \DateTime|null
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }
    /**
     * When the installation link expires.
     *
     * @param \DateTime|null $expiresAt
     *
     * @return self
     */
    public function setExpiresAt(?\DateTime $expiresAt): self
    {
        $this->initialized['expiresAt'] = true;
        $this->expiresAt = $expiresAt;
        return $this;
    }
    /**
     * When the link was revoked, or null while not revoked.
     *
     * @return \DateTime|null
     */
    public function getRevokedAt(): ?\DateTime
    {
        return $this->revokedAt;
    }
    /**
     * When the link was revoked, or null while not revoked.
     *
     * @param \DateTime|null $revokedAt
     *
     * @return self
     */
    public function setRevokedAt(?\DateTime $revokedAt): self
    {
        $this->initialized['revokedAt'] = true;
        $this->revokedAt = $revokedAt;
        return $this;
    }
}
