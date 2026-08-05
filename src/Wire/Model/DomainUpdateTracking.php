<?php

namespace MessageBird\Wire\Model;

class DomainUpdateTracking extends \ArrayObject
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
     * Name part to use for branded open and click tracking URLs. For example, `links` on `mail.acme.com` becomes `links.mail.acme.com`.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * Name part to use for branded open and click tracking URLs. For example, `links` on `mail.acme.com` becomes `links.mail.acme.com`.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name part to use for branded open and click tracking URLs. For example, `links` on `mail.acme.com` becomes `links.mail.acme.com`.
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
