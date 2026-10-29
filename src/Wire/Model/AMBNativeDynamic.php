<?php

namespace MessageBird\Wire\Model;

/**
 * Form content. Bird supplies Apple’s messageForms template and protocol version.
 */
class AMBNativeDynamic
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
     * @var AMBNativeFormData|null
     */
    protected $data;
    /**
     * @return AMBNativeFormData|null
     */
    public function getData(): ?AMBNativeFormData
    {
        return $this->data;
    }
    /**
     * @param AMBNativeFormData|null $data
     *
     * @return self
     */
    public function setData(?AMBNativeFormData $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}
