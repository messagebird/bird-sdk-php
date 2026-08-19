<?php

namespace MessageBird\Wire\Model;

class Domain
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
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $workspaceId;
    /**
     * The sending domain name. Set at creation and immutable.
     *
     * @var string|null
     */
    protected $domain;
    /**
     * The DNS provider hosting this domain's nameservers, so you know which provider's dashboard to manage the required DNS records in. Returns `other` when the provider has not been detected or is not recognized.
     * 
     *
     * @var string|null
     */
    protected $vendor;
    /**
     * Domain ownership verification, proven by the DKIM record. Readiness to
     * send or track is reported separately per capability under
     * `capabilities.*.status`.
     * 
     * - `pending`: the DKIM record has not been published yet.
     * - `verified`: the DKIM record is in place; ownership is confirmed.
     * - `failed`: a DKIM record exists but does not match the expected
     *   value (for example a stale record from an earlier setup), or a
     *   previously verified record was removed. Correct the record to
     *   recover.
     * - `temporary_failure`: DNS resolution failed transiently, such as from a
     *   timeout or unreachable nameserver. Verification retries automatically;
     *   do not change the DNS records unless they are incorrect.
     * - `rejected`: the domain was refused for policy reasons and cannot be
     *   used for sending. Contact support if you believe this is an error.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Per-domain behavior toggles. Changes apply immediately to new sends.
     * 
     *
     * @var DomainSettings|null
     */
    protected $settings;
    /**
     * What to do next about this domain, given the state it is in. Each entry names one action and says
     * why it is worth taking, so you can act on this response without working out the order
     * yourself. Present on reads that compute it: an empty list means there is nothing to do,
     * and the field is absent entirely on responses that do not report next actions.
     * 
     * This answers whether you own the domain, which is what `status` reports. What each
     * capability still needs before it can send or receive is reported separately under
     * `capabilities`, so an empty list here does not on its own mean the domain is ready.
     * 
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * Active DKIM signing configuration for the domain.
     *
     * @var DomainDKIM|null
     */
    protected $dkim;
    /**
     * @var DomainCapabilities|null
     */
    protected $capabilities;
    /**
     * The domain's DNS records and their individual verification state, returned in full on both the list and single-domain responses. This is the complete set to publish across DKIM, return-path, DMARC, tracking, and inbound; records for a staged change carry `state: pending`. Inbound MX records are always included as a regional reference, even while receiving is off and `capabilities.inbound.status` is `not_configured`. Their presence alone does not mean receiving is enabled; see `DomainUpdate.inbound`.
     * 
     *
     * @var list<DNSRecord>|null
     */
    protected $dnsRecords;
    /**
     * When we last checked this domain's DNS records, whether or not the outcome changed. Updated on every verification: your manual refresh and the periodic automatic re-checks alike. `null` if the domain has never been checked.
     * 
     *
     * @var \DateTime|null
     */
    protected $lastCheckedAt;
    /**
     * When the domain's ownership was confirmed: the moment `status` became `verified` via the DKIM record. Unchanged by later re-checks while it stays verified. `null` if the domain has never been verified.
     * 
     *
     * @var \DateTime|null
     */
    protected $verifiedAt;
    /**
     * When the domain was added.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the domain's configuration was last changed (such as a settings or return-path change). Verification re-checks do not change this; see `last_checked_at` and `verified_at` for verification timing.
     * 
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }
    /**
     * @param string|null $workspaceId
     *
     * @return self
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;
        return $this;
    }
    /**
     * The sending domain name. Set at creation and immutable.
     *
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }
    /**
     * The sending domain name. Set at creation and immutable.
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
     * The DNS provider hosting this domain's nameservers, so you know which provider's dashboard to manage the required DNS records in. Returns `other` when the provider has not been detected or is not recognized.
     * 
     *
     * @return string|null
     */
    public function getVendor(): ?string
    {
        return $this->vendor;
    }
    /**
     * The DNS provider hosting this domain's nameservers, so you know which provider's dashboard to manage the required DNS records in. Returns `other` when the provider has not been detected or is not recognized.
     *
     * @param string|null $vendor
     *
     * @return self
     */
    public function setVendor(?string $vendor): self
    {
        $this->initialized['vendor'] = true;
        $this->vendor = $vendor;
        return $this;
    }
    /**
     * Domain ownership verification, proven by the DKIM record. Readiness to
     * send or track is reported separately per capability under
     * `capabilities.*.status`.
     * 
     * - `pending`: the DKIM record has not been published yet.
     * - `verified`: the DKIM record is in place; ownership is confirmed.
     * - `failed`: a DKIM record exists but does not match the expected
     *   value (for example a stale record from an earlier setup), or a
     *   previously verified record was removed. Correct the record to
     *   recover.
     * - `temporary_failure`: DNS resolution failed transiently, such as from a
     *   timeout or unreachable nameserver. Verification retries automatically;
     *   do not change the DNS records unless they are incorrect.
     * - `rejected`: the domain was refused for policy reasons and cannot be
     *   used for sending. Contact support if you believe this is an error.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Domain ownership verification, proven by the DKIM record. Readiness to
    send or track is reported separately per capability under
    `capabilities.*.status`.
    
    - `pending`: the DKIM record has not been published yet.
    - `verified`: the DKIM record is in place; ownership is confirmed.
    - `failed`: a DKIM record exists but does not match the expected
     value (for example a stale record from an earlier setup), or a
     previously verified record was removed. Correct the record to
     recover.
    - `temporary_failure`: DNS resolution failed transiently, such as from a
     timeout or unreachable nameserver. Verification retries automatically;
     do not change the DNS records unless they are incorrect.
    - `rejected`: the domain was refused for policy reasons and cannot be
     used for sending. Contact support if you believe this is an error.
    
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
     * Per-domain behavior toggles. Changes apply immediately to new sends.
     * 
     *
     * @return DomainSettings|null
     */
    public function getSettings(): ?DomainSettings
    {
        return $this->settings;
    }
    /**
     * Per-domain behavior toggles. Changes apply immediately to new sends.
     *
     * @param DomainSettings|null $settings
     *
     * @return self
     */
    public function setSettings(?DomainSettings $settings): self
    {
        $this->initialized['settings'] = true;
        $this->settings = $settings;
        return $this;
    }
    /**
     * What to do next about this domain, given the state it is in. Each entry names one action and says
     * why it is worth taking, so you can act on this response without working out the order
     * yourself. Present on reads that compute it: an empty list means there is nothing to do,
     * and the field is absent entirely on responses that do not report next actions.
     * 
     * This answers whether you own the domain, which is what `status` reports. What each
     * capability still needs before it can send or receive is reported separately under
     * `capabilities`, so an empty list here does not on its own mean the domain is ready.
     * 
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
    * What to do next about this domain, given the state it is in. Each entry names one action and says
    why it is worth taking, so you can act on this response without working out the order
    yourself. Present on reads that compute it: an empty list means there is nothing to do,
    and the field is absent entirely on responses that do not report next actions.
    
    This answers whether you own the domain, which is what `status` reports. What each
    capability still needs before it can send or receive is reported separately under
    `capabilities`, so an empty list here does not on its own mean the domain is ready.
    
    *
    * @param list<NextAction>|null $next
    *
    * @return self
    */
    public function setNext(?array $next): self
    {
        $this->initialized['next'] = true;
        $this->next = $next;
        return $this;
    }
    /**
     * Active DKIM signing configuration for the domain.
     *
     * @return DomainDKIM|null
     */
    public function getDkim(): ?DomainDKIM
    {
        return $this->dkim;
    }
    /**
     * Active DKIM signing configuration for the domain.
     *
     * @param DomainDKIM|null $dkim
     *
     * @return self
     */
    public function setDkim(?DomainDKIM $dkim): self
    {
        $this->initialized['dkim'] = true;
        $this->dkim = $dkim;
        return $this;
    }
    /**
     * @return DomainCapabilities|null
     */
    public function getCapabilities(): ?DomainCapabilities
    {
        return $this->capabilities;
    }
    /**
     * @param DomainCapabilities|null $capabilities
     *
     * @return self
     */
    public function setCapabilities(?DomainCapabilities $capabilities): self
    {
        $this->initialized['capabilities'] = true;
        $this->capabilities = $capabilities;
        return $this;
    }
    /**
     * The domain's DNS records and their individual verification state, returned in full on both the list and single-domain responses. This is the complete set to publish across DKIM, return-path, DMARC, tracking, and inbound; records for a staged change carry `state: pending`. Inbound MX records are always included as a regional reference, even while receiving is off and `capabilities.inbound.status` is `not_configured`. Their presence alone does not mean receiving is enabled; see `DomainUpdate.inbound`.
     * 
     *
     * @return list<DNSRecord>|null
     */
    public function getDnsRecords(): ?array
    {
        return $this->dnsRecords;
    }
    /**
     * The domain's DNS records and their individual verification state, returned in full on both the list and single-domain responses. This is the complete set to publish across DKIM, return-path, DMARC, tracking, and inbound; records for a staged change carry `state: pending`. Inbound MX records are always included as a regional reference, even while receiving is off and `capabilities.inbound.status` is `not_configured`. Their presence alone does not mean receiving is enabled; see `DomainUpdate.inbound`.
     *
     * @param list<DNSRecord>|null $dnsRecords
     *
     * @return self
     */
    public function setDnsRecords(?array $dnsRecords): self
    {
        $this->initialized['dnsRecords'] = true;
        $this->dnsRecords = $dnsRecords;
        return $this;
    }
    /**
     * When we last checked this domain's DNS records, whether or not the outcome changed. Updated on every verification: your manual refresh and the periodic automatic re-checks alike. `null` if the domain has never been checked.
     * 
     *
     * @return \DateTime|null
     */
    public function getLastCheckedAt(): ?\DateTime
    {
        return $this->lastCheckedAt;
    }
    /**
     * When we last checked this domain's DNS records, whether or not the outcome changed. Updated on every verification: your manual refresh and the periodic automatic re-checks alike. `null` if the domain has never been checked.
     *
     * @param \DateTime|null $lastCheckedAt
     *
     * @return self
     */
    public function setLastCheckedAt(?\DateTime $lastCheckedAt): self
    {
        $this->initialized['lastCheckedAt'] = true;
        $this->lastCheckedAt = $lastCheckedAt;
        return $this;
    }
    /**
     * When the domain's ownership was confirmed: the moment `status` became `verified` via the DKIM record. Unchanged by later re-checks while it stays verified. `null` if the domain has never been verified.
     * 
     *
     * @return \DateTime|null
     */
    public function getVerifiedAt(): ?\DateTime
    {
        return $this->verifiedAt;
    }
    /**
     * When the domain's ownership was confirmed: the moment `status` became `verified` via the DKIM record. Unchanged by later re-checks while it stays verified. `null` if the domain has never been verified.
     *
     * @param \DateTime|null $verifiedAt
     *
     * @return self
     */
    public function setVerifiedAt(?\DateTime $verifiedAt): self
    {
        $this->initialized['verifiedAt'] = true;
        $this->verifiedAt = $verifiedAt;
        return $this;
    }
    /**
     * When the domain was added.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the domain was added.
     *
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * When the domain's configuration was last changed (such as a settings or return-path change). Verification re-checks do not change this; see `last_checked_at` and `verified_at` for verification timing.
     * 
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When the domain's configuration was last changed (such as a settings or return-path change). Verification re-checks do not change this; see `last_checked_at` and `verified_at` for verification timing.
     *
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
