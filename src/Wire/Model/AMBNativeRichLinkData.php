<?php

namespace MessageBird\Wire\Model;

class AMBNativeRichLinkData
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
     * HTTPS URL opened by the preview. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
     *
     * @var string|null
     */
    protected $url;
    /**
     * Preview title.
     *
     * @var string|null
     */
    protected $title;
    /**
     * @var AMBNativeRichLinkAssets|null
     */
    protected $assets;
    /**
     * HTTPS URL opened by the preview. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * HTTPS URL opened by the preview. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
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
     * Preview title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * Preview title.
     *
     * @param string|null $title
     *
     * @return self
     */
    public function setTitle(?string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;
        return $this;
    }
    /**
     * @return AMBNativeRichLinkAssets|null
     */
    public function getAssets(): ?AMBNativeRichLinkAssets
    {
        return $this->assets;
    }
    /**
     * @param AMBNativeRichLinkAssets|null $assets
     *
     * @return self
     */
    public function setAssets(?AMBNativeRichLinkAssets $assets): self
    {
        $this->initialized['assets'] = true;
        $this->assets = $assets;
        return $this;
    }
}
