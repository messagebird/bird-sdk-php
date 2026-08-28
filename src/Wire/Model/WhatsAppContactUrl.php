<?php

namespace MessageBird\Wire\Model;

class WhatsAppContactUrl
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
     * The address as the card holds it, which is often bare rather than a full URL, so it is passed through as text rather than validated.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * The label the contact's device attached, for example `Company`. Free text passed through verbatim.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * The address as the card holds it, which is often bare rather than a full URL, so it is passed through as text rather than validated.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * The address as the card holds it, which is often bare rather than a full URL, so it is passed through as text rather than validated.
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
    /**
     * The label the contact's device attached, for example `Company`. Free text passed through verbatim.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The label the contact's device attached, for example `Company`. Free text passed through verbatim.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
}
