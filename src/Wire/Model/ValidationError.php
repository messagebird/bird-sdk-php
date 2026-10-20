<?php

namespace MessageBird\Wire\Model;

/**
 * Field validation error. Uses the standard error envelope with `type` set to `validation_error` and `details` always present.
 */
class ValidationError extends \ArrayObject
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
     * @var ErrorBody|null
     */
    protected $error;
    /**
     * @return ErrorBody|null
     */
    public function getError(): ?ErrorBody
    {
        return $this->error;
    }
    /**
     * @param ErrorBody|null $error
     *
     * @return self
     */
    public function setError(?ErrorBody $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;
        return $this;
    }
}
