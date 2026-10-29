<?php

namespace MessageBird\Wire\Model;

class AMBNativeInboundImage
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
     * Identifier used by the received message.
     *
     * @var string|null
     */
    protected $identifier;
    /**
     * Accessibility description supplied by Apple.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Relative Bird API URL for downloading the image with the same authentication and workspace as the message.
     *
     * @var string|null
     */
    protected $downloadUrl;
    /**
     * Identifier used by the received message.
     *
     * @return string|null
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }
    /**
     * Identifier used by the received message.
     *
     * @param string|null $identifier
     *
     * @return self
     */
    public function setIdentifier(?string $identifier): self
    {
        $this->initialized['identifier'] = true;
        $this->identifier = $identifier;
        return $this;
    }
    /**
     * Accessibility description supplied by Apple.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Accessibility description supplied by Apple.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * Relative Bird API URL for downloading the image with the same authentication and workspace as the message.
     *
     * @return string|null
     */
    public function getDownloadUrl(): ?string
    {
        return $this->downloadUrl;
    }
    /**
     * Relative Bird API URL for downloading the image with the same authentication and workspace as the message.
     *
     * @param string|null $downloadUrl
     *
     * @return self
     */
    public function setDownloadUrl(?string $downloadUrl): self
    {
        $this->initialized['downloadUrl'] = true;
        $this->downloadUrl = $downloadUrl;
        return $this;
    }
}
