<?php

namespace MessageBird\Wire\Model;

/**
 * A certificate signing request (CSR) for a new key pair that we generated. The private key stays with us. Get the CSR signed by your certificate authority, then upload the certificate.
 */
class WebhookClientCertificateSigningRequest extends \ArrayObject
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
     * The PEM-encoded PKCS #10 certificate signing request.
     *
     * @var string|null
     */
    protected $csr;
    /**
     * When we created the signing request.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * The PEM-encoded PKCS #10 certificate signing request.
     *
     * @return string|null
     */
    public function getCsr(): ?string
    {
        return $this->csr;
    }
    /**
     * The PEM-encoded PKCS #10 certificate signing request.
     *
     * @param string|null $csr
     *
     * @return self
     */
    public function setCsr(?string $csr): self
    {
        $this->initialized['csr'] = true;
        $this->csr = $csr;
        return $this;
    }
    /**
     * When we created the signing request.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When we created the signing request.
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
