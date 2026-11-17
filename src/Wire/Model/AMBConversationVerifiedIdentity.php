<?php

namespace MessageBird\Wire\Model;

/**
 * Most recent successful identity verification for this conversation.
 */
class AMBConversationVerifiedIdentity
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
    protected $authenticationId;
    /**
     * @var string|null
     */
    protected $providerId;
    /**
     * Provider revision used for verification.
     *
     * @var int|null
     */
    protected $providerRevision;
    /**
     * Validated identity claims. Verification does not create a persistent login session or grant access to customer systems.
     *
     * @var AMBVerifiedIdentity|null
     */
    protected $identity;
    /**
     * The conversation or provider changed after verification. This result is retained as history.
     *
     * @var bool|null
     */
    protected $historical;
    /**
     * @return string|null
     */
    public function getAuthenticationId(): ?string
    {
        return $this->authenticationId;
    }
    /**
     * @param string|null $authenticationId
     *
     * @return self
     */
    public function setAuthenticationId(?string $authenticationId): self
    {
        $this->initialized['authenticationId'] = true;
        $this->authenticationId = $authenticationId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getProviderId(): ?string
    {
        return $this->providerId;
    }
    /**
     * @param string|null $providerId
     *
     * @return self
     */
    public function setProviderId(?string $providerId): self
    {
        $this->initialized['providerId'] = true;
        $this->providerId = $providerId;
        return $this;
    }
    /**
     * Provider revision used for verification.
     *
     * @return int|null
     */
    public function getProviderRevision(): ?int
    {
        return $this->providerRevision;
    }
    /**
     * Provider revision used for verification.
     *
     * @param int|null $providerRevision
     *
     * @return self
     */
    public function setProviderRevision(?int $providerRevision): self
    {
        $this->initialized['providerRevision'] = true;
        $this->providerRevision = $providerRevision;
        return $this;
    }
    /**
     * Validated identity claims. Verification does not create a persistent login session or grant access to customer systems.
     *
     * @return AMBVerifiedIdentity|null
     */
    public function getIdentity(): ?AMBVerifiedIdentity
    {
        return $this->identity;
    }
    /**
     * Validated identity claims. Verification does not create a persistent login session or grant access to customer systems.
     *
     * @param AMBVerifiedIdentity|null $identity
     *
     * @return self
     */
    public function setIdentity(?AMBVerifiedIdentity $identity): self
    {
        $this->initialized['identity'] = true;
        $this->identity = $identity;
        return $this;
    }
    /**
     * The conversation or provider changed after verification. This result is retained as history.
     *
     * @return bool|null
     */
    public function getHistorical(): ?bool
    {
        return $this->historical;
    }
    /**
     * The conversation or provider changed after verification. This result is retained as history.
     *
     * @param bool|null $historical
     *
     * @return self
     */
    public function setHistorical(?bool $historical): self
    {
        $this->initialized['historical'] = true;
        $this->historical = $historical;
        return $this;
    }
}
