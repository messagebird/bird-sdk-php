<?php

namespace MessageBird\Wire\Model;

/**
 * A change to the ring group's name.
 */
class VoiceRingGroupUpdate
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
     * The ring group's new name.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The ring group's new name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The ring group's new name.
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
}
