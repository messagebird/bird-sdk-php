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
     * Actor type (e.g. user, api_key, system).
     *
     * @var string|null
     */
    protected $type;
    /**
     * Display name of the actor — the user's email address for user actors, or the API key's name for API-key actors. Absent when it could not be resolved.
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
     * Actor type (e.g. user, api_key, system).
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Actor type (e.g. user, api_key, system).
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
     * Display name of the actor — the user's email address for user actors, or the API key's name for API-key actors. Absent when it could not be resolved.
     * 
     *
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * Display name of the actor — the user's email address for user actors, or the API key's name for API-key actors. Absent when it could not be resolved.
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
