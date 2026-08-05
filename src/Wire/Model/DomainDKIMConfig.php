<?php

namespace MessageBird\Wire\Model;

class DomainDKIMConfig
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
     * How the DKIM public key is published in your DNS.
     * - `txt` — you publish the DKIM public key as a TXT record. Key
     *   rotation requires updating the record.
     * - `delegated` — preview, currently unavailable; supplying it returns
     *   `422`. When available, you publish a single CNAME and Bird hosts
     *   and rotates the key with no further DNS changes on your side.
     * 
     *
     * @var string|null
     */
    protected $mode = 'txt';
    /**
     * How the DKIM public key is published in your DNS.
     * - `txt` — you publish the DKIM public key as a TXT record. Key
     *   rotation requires updating the record.
     * - `delegated` — preview, currently unavailable; supplying it returns
     *   `422`. When available, you publish a single CNAME and Bird hosts
     *   and rotates the key with no further DNS changes on your side.
     * 
     *
     * @return string|null
     */
    public function getMode(): ?string
    {
        return $this->mode;
    }
    /**
    * How the DKIM public key is published in your DNS.
    - `txt` — you publish the DKIM public key as a TXT record. Key
     rotation requires updating the record.
    - `delegated` — preview, currently unavailable; supplying it returns
     `422`. When available, you publish a single CNAME and Bird hosts
     and rotates the key with no further DNS changes on your side.
    
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
}
