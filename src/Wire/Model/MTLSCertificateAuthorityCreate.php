<?php

namespace MessageBird\Wire\Model;

/**
 * A certificate authority to add. The certificate must be an unexpired CA certificate that can sign certificates. A workspace has at most two certificate authorities.
 */
class MTLSCertificateAuthorityCreate
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
     * One PEM-encoded X.509 certificate.
     *
     * @var string|null
     */
    protected $certificate;
    /**
     * One PEM-encoded X.509 certificate.
     *
     * @return string|null
     */
    public function getCertificate(): ?string
    {
        return $this->certificate;
    }
    /**
     * One PEM-encoded X.509 certificate.
     *
     * @param string|null $certificate
     *
     * @return self
     */
    public function setCertificate(?string $certificate): self
    {
        $this->initialized['certificate'] = true;
        $this->certificate = $certificate;
        return $this;
    }
}
