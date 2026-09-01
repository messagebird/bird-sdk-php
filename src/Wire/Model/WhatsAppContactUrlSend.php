<?php

namespace MessageBird\Wire\Model;

class WhatsAppContactUrlSend
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
     * The address to show. Not validated as a URL, because a card commonly carries a bare domain.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * A label for the website, shown beside it. Free text, sent exactly as written.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * The address to show. Not validated as a URL, because a card commonly carries a bare domain.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * The address to show. Not validated as a URL, because a card commonly carries a bare domain.
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
     * A label for the website, shown beside it. Free text, sent exactly as written.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * A label for the website, shown beside it. Free text, sent exactly as written.
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
