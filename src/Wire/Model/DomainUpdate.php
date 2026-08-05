<?php

namespace MessageBird\Wire\Model;

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
     * Per-domain behavior toggles. Changes apply immediately to new sends.
     * 
     *
     * @var DomainSettings|null
     */
    protected $settings;
    /**
     * Return-path (bounce) domain configuration. The return-path domain receives bounce and complaint notifications for mail sent from this domain and is what mailbox providers check for SPF. Provide only the name part; Bird adds the sending domain automatically.
     * 
     *
     * @var DomainReturnPathConfig|null
     */
    protected $returnPath;
    /**
     * Set or change the tracking name part, or remove tracking by passing null. Removal requires `click_tracking` and `open_tracking` to be disabled first, and returns `409` otherwise. After removal, links in previously sent email keep resolving while the tracking records are reported as `deprecated`.
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
     * Inbound (receiving) configuration. Enable inbound to receive email addressed to this domain: Bird returns MX records to publish, and once they verify, mail to any local-part at this domain is delivered as an inbound message and the `email.received` webhook fires. The capability is enabled on the domain's own registration, so use a dedicated subdomain (e.g. `inbound.acme.com`), never your apex — apex MX would capture your corporate mail.
     * 
     *
     * @var DomainInboundConfig|null
     */
    protected $inbound;
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
     * Return-path (bounce) domain configuration. The return-path domain receives bounce and complaint notifications for mail sent from this domain and is what mailbox providers check for SPF. Provide only the name part; Bird adds the sending domain automatically.
     * 
     *
     * @return DomainReturnPathConfig|null
     */
    public function getReturnPath(): ?DomainReturnPathConfig
    {
        return $this->returnPath;
    }
    /**
     * Return-path (bounce) domain configuration. The return-path domain receives bounce and complaint notifications for mail sent from this domain and is what mailbox providers check for SPF. Provide only the name part; Bird adds the sending domain automatically.
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
     * Set or change the tracking name part, or remove tracking by passing null. Removal requires `click_tracking` and `open_tracking` to be disabled first, and returns `409` otherwise. After removal, links in previously sent email keep resolving while the tracking records are reported as `deprecated`.
     * 
     *
     * @return DomainUpdateTracking|null
     */
    public function getTracking(): ?DomainUpdateTracking
    {
        return $this->tracking;
    }
    /**
     * Set or change the tracking name part, or remove tracking by passing null. Removal requires `click_tracking` and `open_tracking` to be disabled first, and returns `409` otherwise. After removal, links in previously sent email keep resolving while the tracking records are reported as `deprecated`.
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
     * Inbound (receiving) configuration. Enable inbound to receive email addressed to this domain: Bird returns MX records to publish, and once they verify, mail to any local-part at this domain is delivered as an inbound message and the `email.received` webhook fires. The capability is enabled on the domain's own registration, so use a dedicated subdomain (e.g. `inbound.acme.com`), never your apex — apex MX would capture your corporate mail.
     * 
     *
     * @return DomainInboundConfig|null
     */
    public function getInbound(): ?DomainInboundConfig
    {
        return $this->inbound;
    }
    /**
     * Inbound (receiving) configuration. Enable inbound to receive email addressed to this domain: Bird returns MX records to publish, and once they verify, mail to any local-part at this domain is delivered as an inbound message and the `email.received` webhook fires. The capability is enabled on the domain's own registration, so use a dedicated subdomain (e.g. `inbound.acme.com`), never your apex — apex MX would capture your corporate mail.
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
