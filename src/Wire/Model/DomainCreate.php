<?php

namespace MessageBird\Wire\Model;

class DomainCreate
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
     * The domain you will send from — the domain of your `from` addresses. Use a dedicated subdomain (e.g. `mail.acme.com`) rather than your registered domain so sending reputation stays separate from other services on the domain.
     * 
     *
     * @var string|null
     */
    protected $domain;
    /**
     * Return-path (bounce) domain configuration. The return-path domain receives bounce and complaint notifications for mail sent from this domain and is what mailbox providers check for SPF. Provide only the name part; Bird adds the sending domain automatically.
     * 
     *
     * @var DomainReturnPathConfig|null
     */
    protected $returnPath;
    /**
     * Tracking domain configuration for branded open and click tracking URLs. Provide only the name part; Bird adds the sending domain automatically. A domain created with no tracking configuration defaults to the name `links`. Tracked links are served over HTTPS once the tracking record verifies.
     * 
     *
     * @var DomainTrackingConfig|null
     */
    protected $tracking;
    /**
     * DKIM signing configuration.
     *
     * @var DomainDKIMConfig|null
     */
    protected $dkim;
    /**
     * Per-domain behavior toggles. Changes apply immediately to new sends.
     * 
     *
     * @var DomainSettings|null
     */
    protected $settings;
    /**
     * The domain you will send from — the domain of your `from` addresses. Use a dedicated subdomain (e.g. `mail.acme.com`) rather than your registered domain so sending reputation stays separate from other services on the domain.
     * 
     *
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }
    /**
     * The domain you will send from — the domain of your `from` addresses. Use a dedicated subdomain (e.g. `mail.acme.com`) rather than your registered domain so sending reputation stays separate from other services on the domain.
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
     * Tracking domain configuration for branded open and click tracking URLs. Provide only the name part; Bird adds the sending domain automatically. A domain created with no tracking configuration defaults to the name `links`. Tracked links are served over HTTPS once the tracking record verifies.
     * 
     *
     * @return DomainTrackingConfig|null
     */
    public function getTracking(): ?DomainTrackingConfig
    {
        return $this->tracking;
    }
    /**
     * Tracking domain configuration for branded open and click tracking URLs. Provide only the name part; Bird adds the sending domain automatically. A domain created with no tracking configuration defaults to the name `links`. Tracked links are served over HTTPS once the tracking record verifies.
     *
     * @param DomainTrackingConfig|null $tracking
     *
     * @return self
     */
    public function setTracking(?DomainTrackingConfig $tracking): self
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
}
