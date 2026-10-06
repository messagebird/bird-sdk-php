<?php

namespace MessageBird\Wire\Model;

class EsimInstallLink
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
    protected $esimId;
    /**
     * Private installation URL. Anyone holding it can access installation details until expiry or revocation. Store or share it securely when created; later reads do not return it.
     *
     * @var string|null
     */
    protected $url;
    /**
     * When the link stops granting access to installation details.
     *
     * @var \DateTime|null
     */
    protected $expiresAt;
    /**
     * When the link was created.
     *
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
    public function getEsimId(): ?string
    {
        return $this->esimId;
    }
    /**
     * @param string|null $esimId
     *
     * @return self
     */
    public function setEsimId(?string $esimId): self
    {
        $this->initialized['esimId'] = true;
        $this->esimId = $esimId;
        return $this;
    }
    /**
     * Private installation URL. Anyone holding it can access installation details until expiry or revocation. Store or share it securely when created; later reads do not return it.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Private installation URL. Anyone holding it can access installation details until expiry or revocation. Store or share it securely when created; later reads do not return it.
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
    /**
     * When the link stops granting access to installation details.
     *
     * @return \DateTime|null
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }
    /**
     * When the link stops granting access to installation details.
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
     * When the link was created.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the link was created.
     *
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
