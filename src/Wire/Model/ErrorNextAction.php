<?php

namespace MessageBird\Wire\Model;

class ErrorNextAction
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
     * The operationId of a follow-up operation that resolves this error. Call it, then retry the original request.
     *
     * @var string|null
     */
    protected $operation;
    /**
     * A short, human-readable label for the recovery step, suitable for display.
     *
     * @var string|null
     */
    protected $description;
    /**
     * The operationId of a follow-up operation that resolves this error. Call it, then retry the original request.
     *
     * @return string|null
     */
    public function getOperation(): ?string
    {
        return $this->operation;
    }
    /**
     * The operationId of a follow-up operation that resolves this error. Call it, then retry the original request.
     *
     * @param string|null $operation
     *
     * @return self
     */
    public function setOperation(?string $operation): self
    {
        $this->initialized['operation'] = true;
        $this->operation = $operation;
        return $this;
    }
    /**
     * A short, human-readable label for the recovery step, suitable for display.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * A short, human-readable label for the recovery step, suitable for display.
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
