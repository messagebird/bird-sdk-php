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
     * 
     * - `txt` (default): you publish the DKIM public key as a TXT record. Key
     *   rotation requires updating the record.
     * - `delegated`: you publish a CNAME that points to a DKIM key we host and
     *   rotate. This mode is unavailable for new configurations; supplying it
     *   returns `422`.
     * 
     *
     * @var string|null
     */
    protected $mode = 'txt';
    /**
     * How the DKIM public key is published in your DNS.
     * 
     * - `txt` (default): you publish the DKIM public key as a TXT record. Key
     *   rotation requires updating the record.
     * - `delegated`: you publish a CNAME that points to a DKIM key we host and
     *   rotate. This mode is unavailable for new configurations; supplying it
     *   returns `422`.
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
    
    - `txt` (default): you publish the DKIM public key as a TXT record. Key
     rotation requires updating the record.
    - `delegated`: you publish a CNAME that points to a DKIM key we host and
     rotate. This mode is unavailable for new configurations; supplying it
     returns `422`.
    
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
