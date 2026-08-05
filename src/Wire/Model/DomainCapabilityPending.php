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
     * Hostname the capability will use once the staged change verifies.
     *
     * @var string|null
     */
    protected $domain;
    /**
     * Verification status of the staged change. `pending` — waiting for the DNS records to be detected. `failed` — the records resolved with wrong values; correct them or submit a different change. `temporary_failure` — DNS lookup failed transiently and will be retried.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Hostname the capability will use once the staged change verifies.
     *
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }
    /**
     * Hostname the capability will use once the staged change verifies.
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
     * Verification status of the staged change. `pending` — waiting for the DNS records to be detected. `failed` — the records resolved with wrong values; correct them or submit a different change. `temporary_failure` — DNS lookup failed transiently and will be retried.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Verification status of the staged change. `pending` — waiting for the DNS records to be detected. `failed` — the records resolved with wrong values; correct them or submit a different change. `temporary_failure` — DNS lookup failed transiently and will be retried.
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
