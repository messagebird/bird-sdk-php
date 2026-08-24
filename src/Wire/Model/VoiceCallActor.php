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
     * ID of the user, API key, integration, or system process that performed the action.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Type of actor, such as `user`, `api_key`, `service_account`, or `system`.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Display name of the actor. This is the user's email address for a `user` actor, or the name of the API key or integration that acted. Absent when it could not be resolved.
     * 
     *
     * @var string|null
     */
    protected $displayName;
    /**
     * ID of the user, API key, integration, or system process that performed the action.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * ID of the user, API key, integration, or system process that performed the action.
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
     * Type of actor, such as `user`, `api_key`, `service_account`, or `system`.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Type of actor, such as `user`, `api_key`, `service_account`, or `system`.
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
     * Display name of the actor. This is the user's email address for a `user` actor, or the name of the API key or integration that acted. Absent when it could not be resolved.
     * 
     *
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * Display name of the actor. This is the user's email address for a `user` actor, or the name of the API key or integration that acted. Absent when it could not be resolved.
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
