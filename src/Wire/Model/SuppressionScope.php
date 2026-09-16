<?php

namespace MessageBird\Wire\Model;

class SuppressionScope
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
     * How widely the email suppression applies. Responses use `workspace`. The values `category`, `audience`, `topic`, `contact`, and `domain` are reserved and have no records. The record's `applies_to` field determines which message categories are blocked.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * Public ID or alias of the scoped resource. For workspace scope, this is the workspace ID.
     * 
     *
     * @var string|null
     */
    protected $id;
    /**
     * How widely the email suppression applies. Responses use `workspace`. The values `category`, `audience`, `topic`, `contact`, and `domain` are reserved and have no records. The record's `applies_to` field determines which message categories are blocked.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * How widely the email suppression applies. Responses use `workspace`. The values `category`, `audience`, `topic`, `contact`, and `domain` are reserved and have no records. The record's `applies_to` field determines which message categories are blocked.
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
     * Public ID or alias of the scoped resource. For workspace scope, this is the workspace ID.
     * 
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Public ID or alias of the scoped resource. For workspace scope, this is the workspace ID.
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
}
