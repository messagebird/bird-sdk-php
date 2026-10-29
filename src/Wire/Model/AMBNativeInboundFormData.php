<?php

namespace MessageBird\Wire\Model;

class AMBNativeInboundFormData
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
     * Whether the sender asked the MSP to treat this form response as private.
     *
     * @var bool|null
     */
    protected $private = false;
    /**
     * @var list<AMBInboundFormSelection>|null
     */
    protected $selections;
    /**
     * Whether the sender asked the MSP to treat this form response as private.
     *
     * @return bool|null
     */
    public function getPrivate(): ?bool
    {
        return $this->private;
    }
    /**
     * Whether the sender asked the MSP to treat this form response as private.
     *
     * @param bool|null $private
     *
     * @return self
     */
    public function setPrivate(?bool $private): self
    {
        $this->initialized['private'] = true;
        $this->private = $private;
        return $this;
    }
    /**
     * @return list<AMBInboundFormSelection>|null
     */
    public function getSelections(): ?array
    {
        return $this->selections;
    }
    /**
     * @param list<AMBInboundFormSelection>|null $selections
     *
     * @return self
     */
    public function setSelections(?array $selections): self
    {
        $this->initialized['selections'] = true;
        $this->selections = $selections;
        return $this;
    }
}
