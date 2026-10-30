<?php

namespace MessageBird\Wire\Model;

/**
 * The signed certificate for the waiting signing request. The certificate must match the key of the signing request, have the `clientAuth` extended key usage and be in its validity period. Each intermediate certificate must be a CA certificate in its validity period that signed the certificate before it. It replaces the certificate in use.
 */
class WebhookClientCertificateUpload
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
     * PEM-encoded certificates, the signed certificate first, then any intermediate certificates.
     *
     * @var string|null
     */
    protected $certificateChain;
    /**
     * PEM-encoded certificates, the signed certificate first, then any intermediate certificates.
     *
     * @return string|null
     */
    public function getCertificateChain(): ?string
    {
        return $this->certificateChain;
    }
    /**
     * PEM-encoded certificates, the signed certificate first, then any intermediate certificates.
     *
     * @param string|null $certificateChain
     *
     * @return self
     */
    public function setCertificateChain(?string $certificateChain): self
    {
        $this->initialized['certificateChain'] = true;
        $this->certificateChain = $certificateChain;
        return $this;
    }
}
