<?php

namespace MessageBird\Wire\Model;

class DomainCapability
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
     * Capability verification status.
     * 
     * - `pending`: verification has not run, or is currently running.
     * - `verified`: all DNS records for this capability resolved with the
     *   expected values.
     * - `warning`: a record for this capability verified before and a recent
     *   check no longer matches, but it is still within the grace period.
     *   Sending is not yet affected; fix it before the grace period ends.
     * - `failed`: DNS records resolved but at least one value is wrong.
     *   Update your DNS to recover.
     * - `temporary_failure`: DNS lookup failed transiently. Verification retries
     *   automatically; do not change DNS records unless they are incorrect.
     * - `not_configured`: the capability is not set up on this domain
     *   (for example, no tracking domain configured).
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Hostname this capability is configured with: the return-path domain, the tracking domain, or the domain where the DMARC policy was found. `null` when not applicable or not configured.
     * 
     *
     * @var string|null
     */
    protected $domain;
    /**
     * A staged configuration change awaiting DNS verification. The currently active configuration keeps serving until the staged one verifies, at which point it is promoted automatically. Submitting another change for the same capability replaces the staged value.
     * 
     *
     * @var DomainCapabilityPending|null
     */
    protected $pending;
    /**
     * Machine-readable reason code for a failed capability status. Only set when
     * `status` is `failed`. Use this to display a specific message to users rather
     * than a generic failure message.
     * 
     * - `tracking_domain_in_use`: the link tracking subdomain is already claimed
     *   by another organization.
     * 
     *
     * @var string|null
     */
    protected $reason;
    /**
     * Capability verification status.
     * 
     * - `pending`: verification has not run, or is currently running.
     * - `verified`: all DNS records for this capability resolved with the
     *   expected values.
     * - `warning`: a record for this capability verified before and a recent
     *   check no longer matches, but it is still within the grace period.
     *   Sending is not yet affected; fix it before the grace period ends.
     * - `failed`: DNS records resolved but at least one value is wrong.
     *   Update your DNS to recover.
     * - `temporary_failure`: DNS lookup failed transiently. Verification retries
     *   automatically; do not change DNS records unless they are incorrect.
     * - `not_configured`: the capability is not set up on this domain
     *   (for example, no tracking domain configured).
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Capability verification status.
    
    - `pending`: verification has not run, or is currently running.
    - `verified`: all DNS records for this capability resolved with the
     expected values.
    - `warning`: a record for this capability verified before and a recent
     check no longer matches, but it is still within the grace period.
     Sending is not yet affected; fix it before the grace period ends.
    - `failed`: DNS records resolved but at least one value is wrong.
     Update your DNS to recover.
    - `temporary_failure`: DNS lookup failed transiently. Verification retries
     automatically; do not change DNS records unless they are incorrect.
    - `not_configured`: the capability is not set up on this domain
     (for example, no tracking domain configured).
    
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
    /**
     * Hostname this capability is configured with: the return-path domain, the tracking domain, or the domain where the DMARC policy was found. `null` when not applicable or not configured.
     * 
     *
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }
    /**
     * Hostname this capability is configured with: the return-path domain, the tracking domain, or the domain where the DMARC policy was found. `null` when not applicable or not configured.
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
     * A staged configuration change awaiting DNS verification. The currently active configuration keeps serving until the staged one verifies, at which point it is promoted automatically. Submitting another change for the same capability replaces the staged value.
     * 
     *
     * @return DomainCapabilityPending|null
     */
    public function getPending(): ?DomainCapabilityPending
    {
        return $this->pending;
    }
    /**
     * A staged configuration change awaiting DNS verification. The currently active configuration keeps serving until the staged one verifies, at which point it is promoted automatically. Submitting another change for the same capability replaces the staged value.
     *
     * @param DomainCapabilityPending|null $pending
     *
     * @return self
     */
    public function setPending(?DomainCapabilityPending $pending): self
    {
        $this->initialized['pending'] = true;
        $this->pending = $pending;
        return $this;
    }
    /**
     * Machine-readable reason code for a failed capability status. Only set when
     * `status` is `failed`. Use this to display a specific message to users rather
     * than a generic failure message.
     * 
     * - `tracking_domain_in_use`: the link tracking subdomain is already claimed
     *   by another organization.
     * 
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
    * Machine-readable reason code for a failed capability status. Only set when
    `status` is `failed`. Use this to display a specific message to users rather
    than a generic failure message.
    
    - `tracking_domain_in_use`: the link tracking subdomain is already claimed
     by another organization.
    
    *
    * @param string|null $reason
    *
    * @return self
    */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;
        return $this;
    }
}
