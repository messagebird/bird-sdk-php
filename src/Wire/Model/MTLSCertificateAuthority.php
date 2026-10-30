<?php

namespace MessageBird\Wire\Model;

/**
 * A certificate authority that issues the client certificates of your workspace.
 */
class MTLSCertificateAuthority
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
     * The distinguished name of the certificate authority.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * The SHA-256 fingerprint of the certificate, in lowercase hexadecimal.
     *
     * @var string|null
     */
    protected $fingerprintSha256;
    /**
     * Start of the validity period of the certificate authority.
     *
     * @var \DateTime|null
     */
    protected $notBefore;
    /**
     * End of the validity period of the certificate authority.
     *
     * @var \DateTime|null
     */
    protected $notAfter;
    /**
     * When you added the certificate authority.
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
     * The distinguished name of the certificate authority.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * The distinguished name of the certificate authority.
     *
     * @param string|null $subject
     *
     * @return self
     */
    public function setSubject(?string $subject): self
    {
        $this->initialized['subject'] = true;
        $this->subject = $subject;
        return $this;
    }
    /**
     * The SHA-256 fingerprint of the certificate, in lowercase hexadecimal.
     *
     * @return string|null
     */
    public function getFingerprintSha256(): ?string
    {
        return $this->fingerprintSha256;
    }
    /**
     * The SHA-256 fingerprint of the certificate, in lowercase hexadecimal.
     *
     * @param string|null $fingerprintSha256
     *
     * @return self
     */
    public function setFingerprintSha256(?string $fingerprintSha256): self
    {
        $this->initialized['fingerprintSha256'] = true;
        $this->fingerprintSha256 = $fingerprintSha256;
        return $this;
    }
    /**
     * Start of the validity period of the certificate authority.
     *
     * @return \DateTime|null
     */
    public function getNotBefore(): ?\DateTime
    {
        return $this->notBefore;
    }
    /**
     * Start of the validity period of the certificate authority.
     *
     * @param \DateTime|null $notBefore
     *
     * @return self
     */
    public function setNotBefore(?\DateTime $notBefore): self
    {
        $this->initialized['notBefore'] = true;
        $this->notBefore = $notBefore;
        return $this;
    }
    /**
     * End of the validity period of the certificate authority.
     *
     * @return \DateTime|null
     */
    public function getNotAfter(): ?\DateTime
    {
        return $this->notAfter;
    }
    /**
     * End of the validity period of the certificate authority.
     *
     * @param \DateTime|null $notAfter
     *
     * @return self
     */
    public function setNotAfter(?\DateTime $notAfter): self
    {
        $this->initialized['notAfter'] = true;
        $this->notAfter = $notAfter;
        return $this;
    }
    /**
     * When you added the certificate authority.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When you added the certificate authority.
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
