<?php

namespace MessageBird\Wire\Model;

/**
 * Return-path (bounce) domain configuration. The return-path domain receives bounce and complaint notifications for mail sent from this domain and is what mailbox providers check for SPF. Provide only the name part; we add the sending domain automatically.
 */
class DomainReturnPathConfig
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
     * Name part to use for the return-path domain. For example, `send` on `mail.acme.com` becomes `send.mail.acme.com`. Defaults to `send` when omitted at creation.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * Name part to use for the return-path domain. For example, `send` on `mail.acme.com` becomes `send.mail.acme.com`. Defaults to `send` when omitted at creation.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name part to use for the return-path domain. For example, `send` on `mail.acme.com` becomes `send.mail.acme.com`. Defaults to `send` when omitted at creation.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
}
