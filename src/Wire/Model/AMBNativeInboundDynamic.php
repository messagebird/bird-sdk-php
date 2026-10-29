<?php

namespace MessageBird\Wire\Model;

class AMBNativeInboundDynamic
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
     * @var AMBNativeInboundFormData|null
     */
    protected $data;
    /**
     * @return AMBNativeInboundFormData|null
     */
    public function getData(): ?AMBNativeInboundFormData
    {
        return $this->data;
    }
    /**
     * @param AMBNativeInboundFormData|null $data
     *
     * @return self
     */
    public function setData(?AMBNativeInboundFormData $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}
