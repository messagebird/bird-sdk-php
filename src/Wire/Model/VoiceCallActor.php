<?php

namespace MessageBird\Wire\Model;

class VoiceCallActor extends \ArrayObject
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
     * Actor identifier.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Who or what performed the action: `user` for a member's own session, `oauth_token` for a token issued to a caller on a member's behalf, `api_key` for a workspace API key, `system` for our own automation, `sso` for an organization's SSO connection, and `service_account` for a workspace's connected Integration acting with no member behind it. Open enum: new actor types may be added over time, so treat any unrecognized value as a future type rather than an error.
     *
     * @var string|null
     */
    protected $type;
    /**
     * The label the actor is shown under: typically a member's name or email address, or the API key's name. Null when it could not be resolved.
     * 
     *
     * @var string|null
     */
    protected $displayName;
    /**
     * Actor identifier.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Actor identifier.
     *
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * Who or what performed the action: `user` for a member's own session, `oauth_token` for a token issued to a caller on a member's behalf, `api_key` for a workspace API key, `system` for our own automation, `sso` for an organization's SSO connection, and `service_account` for a workspace's connected Integration acting with no member behind it. Open enum: new actor types may be added over time, so treat any unrecognized value as a future type rather than an error.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Who or what performed the action: `user` for a member's own session, `oauth_token` for a token issued to a caller on a member's behalf, `api_key` for a workspace API key, `system` for our own automation, `sso` for an organization's SSO connection, and `service_account` for a workspace's connected Integration acting with no member behind it. Open enum: new actor types may be added over time, so treat any unrecognized value as a future type rather than an error.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * The label the actor is shown under: typically a member's name or email address, or the API key's name. Null when it could not be resolved.
     * 
     *
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * The label the actor is shown under: typically a member's name or email address, or the API key's name. Null when it could not be resolved.
     *
     * @param string|null $displayName
     *
     * @return self
     */
    public function setDisplayName(?string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;
        return $this;
    }
}
