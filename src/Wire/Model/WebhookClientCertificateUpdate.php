<?php

namespace MessageBird\Wire\Model;

/**
 * Changes to the webhook client certificate. Omit a field to keep its value. `evaluating` and `enforced` require an uploaded certificate.
 */
class WebhookClientCertificateUpdate
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
     * Whether client certificates are off (`disabled`), checked while the previous behavior stays available (`evaluating`), or required (`enforced`).
     *
     * @var string|null
     */
    protected $state;
    /**
     * How a certificate chain is checked against the certificate revocation list (CRL) that each certificate names. With `full_chain`, the leaf certificate and each intermediate certificate below the trusted root are checked. A certificate that names no CRL is not checked.
     *
     * @var string|null
     */
    protected $crlCheck;
    /**
     * Whether client certificates are off (`disabled`), checked while the previous behavior stays available (`evaluating`), or required (`enforced`).
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * Whether client certificates are off (`disabled`), checked while the previous behavior stays available (`evaluating`), or required (`enforced`).
     *
     * @param string|null $state
     *
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }
    /**
     * How a certificate chain is checked against the certificate revocation list (CRL) that each certificate names. With `full_chain`, the leaf certificate and each intermediate certificate below the trusted root are checked. A certificate that names no CRL is not checked.
     *
     * @return string|null
     */
    public function getCrlCheck(): ?string
    {
        return $this->crlCheck;
    }
    /**
     * How a certificate chain is checked against the certificate revocation list (CRL) that each certificate names. With `full_chain`, the leaf certificate and each intermediate certificate below the trusted root are checked. A certificate that names no CRL is not checked.
     *
     * @param string|null $crlCheck
     *
     * @return self
     */
    public function setCrlCheck(?string $crlCheck): self
    {
        $this->initialized['crlCheck'] = true;
        $this->crlCheck = $crlCheck;
        return $this;
    }
}
