<?php

namespace MessageBird\Wire\Model;

class VoiceSessionCredential
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
     * SIP digest username. Always `bird`. The credential identifies the workspace through `realm`. The username does not identify the workspace.
     * 
     *
     * @var string|null
     */
    protected $username;
    /**
     * SIP digest password, returned once. Treat it as a bearer secret: until it expires it can place calls billed to this workspace.
     * 
     *
     * @var string|null
     */
    protected $password;
    /**
     * SIP digest realm to authenticate against. Workspace-scoped, so a credential minted for one workspace cannot authenticate against another.
     * 
     *
     * @var string|null
     */
    protected $realm;
    /**
     * When the credential stops authenticating, five minutes after creation. Existing calls may continue; use a fresh credential for later authentication.
     *
     * @var \DateTime|null
     */
    protected $expiresAt;
    /**
     * Short-lived token required when upgrading the WebSocket connection. The token authorizes the connection only; each call still authenticates with `password`.
     * 
     *
     * @var string|null
     */
    protected $handshakeToken;
    /**
     * SIP digest username. Always `bird`. The credential identifies the workspace through `realm`. The username does not identify the workspace.
     * 
     *
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }
    /**
     * SIP digest username. Always `bird`. The credential identifies the workspace through `realm`. The username does not identify the workspace.
     *
     * @param string|null $username
     *
     * @return self
     */
    public function setUsername(?string $username): self
    {
        $this->initialized['username'] = true;
        $this->username = $username;
        return $this;
    }
    /**
     * SIP digest password, returned once. Treat it as a bearer secret: until it expires it can place calls billed to this workspace.
     * 
     *
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }
    /**
     * SIP digest password, returned once. Treat it as a bearer secret: until it expires it can place calls billed to this workspace.
     *
     * @param string|null $password
     *
     * @return self
     */
    public function setPassword(?string $password): self
    {
        $this->initialized['password'] = true;
        $this->password = $password;
        return $this;
    }
    /**
     * SIP digest realm to authenticate against. Workspace-scoped, so a credential minted for one workspace cannot authenticate against another.
     * 
     *
     * @return string|null
     */
    public function getRealm(): ?string
    {
        return $this->realm;
    }
    /**
     * SIP digest realm to authenticate against. Workspace-scoped, so a credential minted for one workspace cannot authenticate against another.
     *
     * @param string|null $realm
     *
     * @return self
     */
    public function setRealm(?string $realm): self
    {
        $this->initialized['realm'] = true;
        $this->realm = $realm;
        return $this;
    }
    /**
     * When the credential stops authenticating, five minutes after creation. Existing calls may continue; use a fresh credential for later authentication.
     *
     * @return \DateTime|null
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }
    /**
     * When the credential stops authenticating, five minutes after creation. Existing calls may continue; use a fresh credential for later authentication.
     *
     * @param \DateTime|null $expiresAt
     *
     * @return self
     */
    public function setExpiresAt(?\DateTime $expiresAt): self
    {
        $this->initialized['expiresAt'] = true;
        $this->expiresAt = $expiresAt;
        return $this;
    }
    /**
     * Short-lived token required when upgrading the WebSocket connection. The token authorizes the connection only; each call still authenticates with `password`.
     * 
     *
     * @return string|null
     */
    public function getHandshakeToken(): ?string
    {
        return $this->handshakeToken;
    }
    /**
     * Short-lived token required when upgrading the WebSocket connection. The token authorizes the connection only; each call still authenticates with `password`.
     *
     * @param string|null $handshakeToken
     *
     * @return self
     */
    public function setHandshakeToken(?string $handshakeToken): self
    {
        $this->initialized['handshakeToken'] = true;
        $this->handshakeToken = $handshakeToken;
        return $this;
    }
}
