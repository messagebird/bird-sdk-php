<?php

namespace MessageBird\Wire\Model;

/**
 * Authentication attempt created through the conversation authentication endpoint. Contains no authorization parameters or credentials.
 */
class AMBNativeAuthentication
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
}
