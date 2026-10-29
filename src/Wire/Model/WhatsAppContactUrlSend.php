<?php

namespace MessageBird\Wire\Model;

/**
 * One website to put on a contact card.
 */
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
     * Website address; bare domains accepted without URL validation.
     *
     * @var string|null
     */
    protected $url;
    /**
     * Free-text label shown beside the website, sent verbatim.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Website address; bare domains accepted without URL validation.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Website address; bare domains accepted without URL validation.
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
     * Free-text label shown beside the website, sent verbatim.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Free-text label shown beside the website, sent verbatim.
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
