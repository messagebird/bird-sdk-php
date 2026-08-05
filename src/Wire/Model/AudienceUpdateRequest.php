<?php

namespace MessageBird\Wire\Model;

class AudienceUpdateRequest
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
     * New display name for the audience. Omit to keep the current name; the name cannot be cleared, and a whitespace-only value returns a validation error.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Longer description of who this audience is. Set to null to clear.
     *
     * @var string|null
     */
    protected $description;
    /**
     * New display name for the audience. Omit to keep the current name; the name cannot be cleared, and a whitespace-only value returns a validation error.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * New display name for the audience. Omit to keep the current name; the name cannot be cleared, and a whitespace-only value returns a validation error.
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
     * Longer description of who this audience is. Set to null to clear.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Longer description of who this audience is. Set to null to clear.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
}
