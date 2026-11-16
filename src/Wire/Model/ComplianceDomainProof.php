<?php

namespace MessageBird\Wire\Model;

/**
 * How your organization proved it controls the business's domain, for a business verification.
 */
class ComplianceDomainProof
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
     * How the domain was proven.
     * 
     * - `member_login`: a member of this workspace signs in with a verified address at the domain.
     * - `sso_domain`: the domain is your organization's verified single sign-on domain.
     * 
     *
     * @var string|null
     */
    protected $method;
    /**
     * The business's registrable domain, such as `acme.com`.
     *
     * @var string|null
     */
    protected $domain;
    /**
     * How the domain was proven.
     * 
     * - `member_login`: a member of this workspace signs in with a verified address at the domain.
     * - `sso_domain`: the domain is your organization's verified single sign-on domain.
     * 
     *
     * @return string|null
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }
    /**
    * How the domain was proven.
    
    - `member_login`: a member of this workspace signs in with a verified address at the domain.
    - `sso_domain`: the domain is your organization's verified single sign-on domain.
    
    *
    * @param string|null $method
    *
    * @return self
    */
    public function setMethod(?string $method): self
    {
        $this->initialized['method'] = true;
        $this->method = $method;
        return $this;
    }
    /**
     * The business's registrable domain, such as `acme.com`.
     *
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }
    /**
     * The business's registrable domain, such as `acme.com`.
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
}
