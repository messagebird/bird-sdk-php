<?php

namespace MessageBird\Wire\Model;

/**
 * Partial update. `settings` changes apply immediately. Changes to `return_path`, `tracking`, or `dkim` on a verified capability are staged. The current configuration keeps serving until the new DNS records verify. The change is then promoted automatically and the old records are marked `deprecated`. The staged value is visible under `capabilities.*.pending` and can be replaced by submitting another change.
 */
class DomainUpdate
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
     * Default IP pool for this domain in this workspace. Used only when a send omits `ip_pool_id`; an explicit send option takes precedence. The pool must belong to the same organization. Set to `null` to use normal organization routing.
     * 
     *
     * @var string|null
     */
    protected $defaultIpPoolId;
    /**
     * Per-domain behavior toggles. Changes apply immediately to new sends.
     * 
     *
     * @var DomainSettings|null
     */
    protected $settings;
    /**
     * Return-path (bounce) domain configuration. The return-path domain receives bounce and complaint notifications for mail sent from this domain and is what mailbox providers check for SPF. Provide only the name part; we add the sending domain automatically.
     * 
     *
     * @var DomainReturnPathConfig|null
     */
    protected $returnPath;
    /**
     * Set or change the tracking name part, or remove tracking by passing `null`. Removal requires `click_tracking` and `open_tracking` to be disabled first, and returns `409` otherwise. After removal, links in previously sent email keep resolving while the tracking records are reported as `deprecated`.
     * 
     *
     * @var DomainUpdateTracking|null
     */
    protected $tracking;
    /**
     * DKIM signing configuration.
     *
     * @var DomainDKIMConfig|null
     */
    protected $dkim;
    /**
     * Inbound (receiving) configuration. Enable inbound to receive email addressed to this domain. We return MX records to publish. After they verify, mail to any local-part at this domain is delivered as an inbound message and triggers the `email.received` webhook. Use a dedicated subdomain, such as `inbound.acme.com`, because using your apex domain would capture your corporate mail.
     * 
     *
     * @var DomainInboundConfig|null
     */
    protected $inbound;
    /**
     * Default IP pool for this domain in this workspace. Used only when a send omits `ip_pool_id`; an explicit send option takes precedence. The pool must belong to the same organization. Set to `null` to use normal organization routing.
     * 
     *
     * @return string|null
     */
    public function getDefaultIpPoolId(): ?string
    {
        return $this->defaultIpPoolId;
    }
    /**
     * Default IP pool for this domain in this workspace. Used only when a send omits `ip_pool_id`; an explicit send option takes precedence. The pool must belong to the same organization. Set to `null` to use normal organization routing.
     *
     * @param string|null $defaultIpPoolId
     *
     * @return self
     */
    public function setDefaultIpPoolId(?string $defaultIpPoolId): self
    {
        $this->initialized['defaultIpPoolId'] = true;
        $this->defaultIpPoolId = $defaultIpPoolId;
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
     * Return-path (bounce) domain configuration. The return-path domain receives bounce and complaint notifications for mail sent from this domain and is what mailbox providers check for SPF. Provide only the name part; we add the sending domain automatically.
     * 
     *
     * @return DomainReturnPathConfig|null
     */
    public function getReturnPath(): ?DomainReturnPathConfig
    {
        return $this->returnPath;
    }
    /**
     * Return-path (bounce) domain configuration. The return-path domain receives bounce and complaint notifications for mail sent from this domain and is what mailbox providers check for SPF. Provide only the name part; we add the sending domain automatically.
     *
     * @param DomainReturnPathConfig|null $returnPath
     *
     * @return self
     */
    public function setReturnPath(?DomainReturnPathConfig $returnPath): self
    {
        $this->initialized['returnPath'] = true;
        $this->returnPath = $returnPath;
        return $this;
    }
    /**
     * Set or change the tracking name part, or remove tracking by passing `null`. Removal requires `click_tracking` and `open_tracking` to be disabled first, and returns `409` otherwise. After removal, links in previously sent email keep resolving while the tracking records are reported as `deprecated`.
     * 
     *
     * @return DomainUpdateTracking|null
     */
    public function getTracking(): ?DomainUpdateTracking
    {
        return $this->tracking;
    }
    /**
     * Set or change the tracking name part, or remove tracking by passing `null`. Removal requires `click_tracking` and `open_tracking` to be disabled first, and returns `409` otherwise. After removal, links in previously sent email keep resolving while the tracking records are reported as `deprecated`.
     *
     * @param DomainUpdateTracking|null $tracking
     *
     * @return self
     */
    public function setTracking(?DomainUpdateTracking $tracking): self
    {
        $this->initialized['tracking'] = true;
        $this->tracking = $tracking;
        return $this;
    }
    /**
     * DKIM signing configuration.
     *
     * @return DomainDKIMConfig|null
     */
    public function getDkim(): ?DomainDKIMConfig
    {
        return $this->dkim;
    }
    /**
     * DKIM signing configuration.
     *
     * @param DomainDKIMConfig|null $dkim
     *
     * @return self
     */
    public function setDkim(?DomainDKIMConfig $dkim): self
    {
        $this->initialized['dkim'] = true;
        $this->dkim = $dkim;
        return $this;
    }
    /**
     * Inbound (receiving) configuration. Enable inbound to receive email addressed to this domain. We return MX records to publish. After they verify, mail to any local-part at this domain is delivered as an inbound message and triggers the `email.received` webhook. Use a dedicated subdomain, such as `inbound.acme.com`, because using your apex domain would capture your corporate mail.
     * 
     *
     * @return DomainInboundConfig|null
     */
    public function getInbound(): ?DomainInboundConfig
    {
        return $this->inbound;
    }
    /**
     * Inbound (receiving) configuration. Enable inbound to receive email addressed to this domain. We return MX records to publish. After they verify, mail to any local-part at this domain is delivered as an inbound message and triggers the `email.received` webhook. Use a dedicated subdomain, such as `inbound.acme.com`, because using your apex domain would capture your corporate mail.
     *
     * @param DomainInboundConfig|null $inbound
     *
     * @return self
     */
    public function setInbound(?DomainInboundConfig $inbound): self
    {
        $this->initialized['inbound'] = true;
        $this->inbound = $inbound;
        return $this;
    }
}
