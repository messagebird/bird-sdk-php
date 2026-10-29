<?php

namespace MessageBird\Wire\Model;

class AMBNativeInboundAuthentication
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
     * Authentication status reported by Apple. This does not establish an authenticated Bird session.
     *
     * @var string|null
     */
    protected $status;
    /**
     * Authentication status reported by Apple. This does not establish an authenticated Bird session.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Authentication status reported by Apple. This does not establish an authenticated Bird session.
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
}
