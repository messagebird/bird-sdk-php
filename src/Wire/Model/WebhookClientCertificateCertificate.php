<?php

namespace MessageBird\Wire\Model;

/**
 * Public details of a webhook client certificate.
 */
class WebhookClientCertificateCertificate extends \ArrayObject
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
     * The distinguished name of the certificate.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * The distinguished name of the certificate authority that signed it.
     *
     * @var string|null
     */
    protected $issuer;
    /**
     * The serial number, in lowercase hexadecimal.
     *
     * @var string|null
     */
    protected $serialNumber;
    /**
     * The SHA-256 fingerprint of the certificate, in lowercase hexadecimal.
     *
     * @var string|null
     */
    protected $fingerprintSha256;
    /**
     * Start of the validity period.
     *
     * @var \DateTime|null
     */
    protected $notBefore;
    /**
     * End of the validity period.
     *
     * @var \DateTime|null
     */
    protected $notAfter;
    /**
     * The distinguished name of the certificate.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * The distinguished name of the certificate.
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
     * The distinguished name of the certificate authority that signed it.
     *
     * @return string|null
     */
    public function getIssuer(): ?string
    {
        return $this->issuer;
    }
    /**
     * The distinguished name of the certificate authority that signed it.
     *
     * @param string|null $issuer
     *
     * @return self
     */
    public function setIssuer(?string $issuer): self
    {
        $this->initialized['issuer'] = true;
        $this->issuer = $issuer;
        return $this;
    }
    /**
     * The serial number, in lowercase hexadecimal.
     *
     * @return string|null
     */
    public function getSerialNumber(): ?string
    {
        return $this->serialNumber;
    }
    /**
     * The serial number, in lowercase hexadecimal.
     *
     * @param string|null $serialNumber
     *
     * @return self
     */
    public function setSerialNumber(?string $serialNumber): self
    {
        $this->initialized['serialNumber'] = true;
        $this->serialNumber = $serialNumber;
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
     * Start of the validity period.
     *
     * @return \DateTime|null
     */
    public function getNotBefore(): ?\DateTime
    {
        return $this->notBefore;
    }
    /**
     * Start of the validity period.
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
     * End of the validity period.
     *
     * @return \DateTime|null
     */
    public function getNotAfter(): ?\DateTime
    {
        return $this->notAfter;
    }
    /**
     * End of the validity period.
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
}
