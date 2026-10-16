<?php

namespace MessageBird\Wire\Model;

/**
 * One website on a shared contact card.
 */
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
     * The label attached to this value, for example `CELL`, `Home` or `iPhone`. Free text: WhatsApp defines no vocabulary. A label on a received card is lowercased; one this workspace sent reads back exactly as sent.
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
     * The label attached to this value, for example `CELL`, `Home` or `iPhone`. Free text: WhatsApp defines no vocabulary. A label on a received card is lowercased; one this workspace sent reads back exactly as sent.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The label attached to this value, for example `CELL`, `Home` or `iPhone`. Free text: WhatsApp defines no vocabulary. A label on a received card is lowercased; one this workspace sent reads back exactly as sent.
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
