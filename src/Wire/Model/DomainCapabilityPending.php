<?php

namespace MessageBird\Wire\Model;

class DomainCapabilityPending
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
     * Hostname the capability uses after the staged change verifies.
     *
     * @var string|null
     */
    protected $domain;
    /**
     * Verification status of the staged change.
     * 
     * - `pending`: the DNS records have not been detected yet.
     * - `failed`: the records resolved with wrong values; correct them
     *   or submit a different change.
     * - `temporary_failure`: the DNS lookup failed transiently and is
     *   queued for retry.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Hostname the capability uses after the staged change verifies.
     *
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }
    /**
     * Hostname the capability uses after the staged change verifies.
     *
     * @param string|null $domain
     *
     * @return self
     */
    public function setDomain(?string $domain): self
    {
        $this->initialized['domain'] = true;
        $this->domain = $domain;
        return $this;
    }
    /**
     * Verification status of the staged change.
     * 
     * - `pending`: the DNS records have not been detected yet.
     * - `failed`: the records resolved with wrong values; correct them
     *   or submit a different change.
     * - `temporary_failure`: the DNS lookup failed transiently and is
     *   queued for retry.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Verification status of the staged change.
    
    - `pending`: the DNS records have not been detected yet.
    - `failed`: the records resolved with wrong values; correct them
     or submit a different change.
    - `temporary_failure`: the DNS lookup failed transiently and is
     queued for retry.
    
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
