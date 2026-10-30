<?php

namespace MessageBird\Wire\Model;

/**
 * The client certificate that we present on webhook deliveries of your workspace. With `disabled`, we present no certificate. With `evaluating`, we present the certificate when the receiver asks for one. If the receiver does not ask, we deliver and report it. If the receiver rejects the certificate, we retry without it and report it. A failed check of the receiver's own certificate fails the attempt without a retry. With `enforced`, we present the certificate and fail the delivery attempt when the receiver does not ask for one or rejects it. `crl_check` applies to the server certificate chain of the receiver and is `disabled` by default. A failed CRL check fails the delivery attempt. When webhook mTLS is not enabled for this workspace, `state` and `crl_check` read `disabled` and deliveries obey them. Neither applies to `realtime.*` events, which Realtime delivers without the certificate, to connector endpoints, which call third-party APIs, or to MCP Events subscriptions, whose callback URL an OAuth authorization chooses.
 */
class WebhookClientCertificate
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
     * The certificate in use. `null` until you upload one.
     *
     * @var WebhookClientCertificateCertificate|null
     */
    protected $certificate;
    /**
     * The signing request that waits for a signed certificate. `null` when none waits.
     *
     * @var WebhookClientCertificateSigningRequest|null
     */
    protected $signingRequest;
    /**
     * When the certificate or its state last changed. `null` until the first change.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
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
    /**
     * The certificate in use. `null` until you upload one.
     *
     * @return WebhookClientCertificateCertificate|null
     */
    public function getCertificate(): ?WebhookClientCertificateCertificate
    {
        return $this->certificate;
    }
    /**
     * The certificate in use. `null` until you upload one.
     *
     * @param WebhookClientCertificateCertificate|null $certificate
     *
     * @return self
     */
    public function setCertificate(?WebhookClientCertificateCertificate $certificate): self
    {
        $this->initialized['certificate'] = true;
        $this->certificate = $certificate;
        return $this;
    }
    /**
     * The signing request that waits for a signed certificate. `null` when none waits.
     *
     * @return WebhookClientCertificateSigningRequest|null
     */
    public function getSigningRequest(): ?WebhookClientCertificateSigningRequest
    {
        return $this->signingRequest;
    }
    /**
     * The signing request that waits for a signed certificate. `null` when none waits.
     *
     * @param WebhookClientCertificateSigningRequest|null $signingRequest
     *
     * @return self
     */
    public function setSigningRequest(?WebhookClientCertificateSigningRequest $signingRequest): self
    {
        $this->initialized['signingRequest'] = true;
        $this->signingRequest = $signingRequest;
        return $this;
    }
    /**
     * When the certificate or its state last changed. `null` until the first change.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When the certificate or its state last changed. `null` until the first change.
     *
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
