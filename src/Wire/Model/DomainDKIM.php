<?php

namespace MessageBird\Wire\Model;

class DomainDKIM
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
     * How the DKIM public key is published in your DNS. `txt`: you publish the key as a TXT record. `delegated`: you publish a single CNAME and we host and rotate the key.
     * 
     *
     * @var string|null
     */
    protected $mode;
    /**
     * DKIM selector used to sign mail from this domain.
     *
     * @var string|null
     */
    protected $selector;
    /**
     * RSA key size in bits.
     *
     * @var int|null
     */
    protected $keySize;
    /**
     * How the DKIM public key is published in your DNS. `txt`: you publish the key as a TXT record. `delegated`: you publish a single CNAME and we host and rotate the key.
     * 
     *
     * @return string|null
     */
    public function getMode(): ?string
    {
        return $this->mode;
    }
    /**
     * How the DKIM public key is published in your DNS. `txt`: you publish the key as a TXT record. `delegated`: you publish a single CNAME and we host and rotate the key.
     *
     * @param string|null $mode
     *
     * @return self
     */
    public function setMode(?string $mode): self
    {
        $this->initialized['mode'] = true;
        $this->mode = $mode;
        return $this;
    }
    /**
     * DKIM selector used to sign mail from this domain.
     *
     * @return string|null
     */
    public function getSelector(): ?string
    {
        return $this->selector;
    }
    /**
     * DKIM selector used to sign mail from this domain.
     *
     * @param string|null $selector
     *
     * @return self
     */
    public function setSelector(?string $selector): self
    {
        $this->initialized['selector'] = true;
        $this->selector = $selector;
        return $this;
    }
    /**
     * RSA key size in bits.
     *
     * @return int|null
     */
    public function getKeySize(): ?int
    {
        return $this->keySize;
    }
    /**
     * RSA key size in bits.
     *
     * @param int|null $keySize
     *
     * @return self
     */
    public function setKeySize(?int $keySize): self
    {
        $this->initialized['keySize'] = true;
        $this->keySize = $keySize;
        return $this;
    }
}
