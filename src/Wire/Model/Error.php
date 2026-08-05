<?php

namespace MessageBird\Wire\Model;

class Error
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
