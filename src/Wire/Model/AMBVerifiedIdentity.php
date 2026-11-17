<?php

namespace MessageBird\Wire\Model;

/**
 * Validated identity claims. Verification does not create a persistent login session or grant access to customer systems.
 */
class AMBVerifiedIdentity
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
     * Issuer that verified the identity.
     *
     * @var string|null
     */
    protected $issuer;
    /**
     * Provider-issued user identifier. Not necessarily your CRM customer ID.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * Name supplied by the provider when name collection is enabled.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Email supplied by the provider when email collection is enabled.
     *
     * @var string|null
     */
    protected $email;
    /**
     * Whether the provider verified this email address.
     *
     * @var bool|null
     */
    protected $emailVerified;
    /**
     * When the provider says the user authenticated. May precede this verification.
     *
     * @var \DateTime|null
     */
    protected $authenticatedAt;
    /**
     * When Bird completed identity validation and confirmed the originating Messages conversation.
     *
     * @var \DateTime|null
     */
    protected $verifiedAt;
    /**
     * Issuer that verified the identity.
     *
     * @return string|null
     */
    public function getIssuer(): ?string
    {
        return $this->issuer;
    }
    /**
     * Issuer that verified the identity.
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
     * Provider-issued user identifier. Not necessarily your CRM customer ID.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * Provider-issued user identifier. Not necessarily your CRM customer ID.
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
     * Name supplied by the provider when name collection is enabled.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name supplied by the provider when name collection is enabled.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Email supplied by the provider when email collection is enabled.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * Email supplied by the provider when email collection is enabled.
     *
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;
        return $this;
    }
    /**
     * Whether the provider verified this email address.
     *
     * @return bool|null
     */
    public function getEmailVerified(): ?bool
    {
        return $this->emailVerified;
    }
    /**
     * Whether the provider verified this email address.
     *
     * @param bool|null $emailVerified
     *
     * @return self
     */
    public function setEmailVerified(?bool $emailVerified): self
    {
        $this->initialized['emailVerified'] = true;
        $this->emailVerified = $emailVerified;
        return $this;
    }
    /**
     * When the provider says the user authenticated. May precede this verification.
     *
     * @return \DateTime|null
     */
    public function getAuthenticatedAt(): ?\DateTime
    {
        return $this->authenticatedAt;
    }
    /**
     * When the provider says the user authenticated. May precede this verification.
     *
     * @param \DateTime|null $authenticatedAt
     *
     * @return self
     */
    public function setAuthenticatedAt(?\DateTime $authenticatedAt): self
    {
        $this->initialized['authenticatedAt'] = true;
        $this->authenticatedAt = $authenticatedAt;
        return $this;
    }
    /**
     * When Bird completed identity validation and confirmed the originating Messages conversation.
     *
     * @return \DateTime|null
     */
    public function getVerifiedAt(): ?\DateTime
    {
        return $this->verifiedAt;
    }
    /**
     * When Bird completed identity validation and confirmed the originating Messages conversation.
     *
     * @param \DateTime|null $verifiedAt
     *
     * @return self
     */
    public function setVerifiedAt(?\DateTime $verifiedAt): self
    {
        $this->initialized['verifiedAt'] = true;
        $this->verifiedAt = $verifiedAt;
        return $this;
    }
}
