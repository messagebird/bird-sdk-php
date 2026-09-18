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
     * New actor types may be added. Treat unrecognized values as future types, not errors.
     * - `user`: a member's own session.
     * - `api_key`: a workspace API key.
     * - `oauth_token`: a token issued to a caller on a member's behalf.
     * - `system`: an action we perform without a customer actor.
     * - `sso`: an organization's SSO connection.
     * - `service_account`: a workspace's connected Integration acting with no member behind it.
     * - `automation`: an automation execution in your workspace.
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
     * New actor types may be added. Treat unrecognized values as future types, not errors.
     * - `user`: a member's own session.
     * - `api_key`: a workspace API key.
     * - `oauth_token`: a token issued to a caller on a member's behalf.
     * - `system`: an action we perform without a customer actor.
     * - `sso`: an organization's SSO connection.
     * - `service_account`: a workspace's connected Integration acting with no member behind it.
     * - `automation`: an automation execution in your workspace.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
    * New actor types may be added. Treat unrecognized values as future types, not errors.
    - `user`: a member's own session.
    - `api_key`: a workspace API key.
    - `oauth_token`: a token issued to a caller on a member's behalf.
    - `system`: an action we perform without a customer actor.
    - `sso`: an organization's SSO connection.
    - `service_account`: a workspace's connected Integration acting with no member behind it.
    - `automation`: an automation execution in your workspace.
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
