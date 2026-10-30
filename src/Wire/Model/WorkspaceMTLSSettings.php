<?php

namespace MessageBird\Wire\Model;

/**
 * Client certificate (mTLS) settings for API requests to your workspace. The mTLS endpoint is `mtls.<region>.platform.bird.com`. With `disabled`, the mTLS endpoint rejects requests. With `evaluating`, both endpoints accept requests, and the mTLS endpoint rejects a request without a valid client certificate. With `enforced`, only the mTLS endpoint accepts requests. Dashboard and OAuth requests are accepted on the standard endpoint in every state. `crl_check` is `disabled` by default.
 */
class WorkspaceMTLSSettings
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
     * A subject alternative name that every client certificate must contain, as a DNS name or a URI. `null` when any subject alternative name is accepted.
     *
     * @var string|null
     */
    protected $expectedSan;
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
     * A subject alternative name that every client certificate must contain, as a DNS name or a URI. `null` when any subject alternative name is accepted.
     *
     * @return string|null
     */
    public function getExpectedSan(): ?string
    {
        return $this->expectedSan;
    }
    /**
     * A subject alternative name that every client certificate must contain, as a DNS name or a URI. `null` when any subject alternative name is accepted.
     *
     * @param string|null $expectedSan
     *
     * @return self
     */
    public function setExpectedSan(?string $expectedSan): self
    {
        $this->initialized['expectedSan'] = true;
        $this->expectedSan = $expectedSan;
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
