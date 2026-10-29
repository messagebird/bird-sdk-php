<?php

namespace MessageBird\Wire\Model;

class AMBNativeRichLinkVideo
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
     * HTTPS video URL fetched by Apple. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
     *
     * @var string|null
     */
    protected $url;
    /**
     * Media type of the video. Defaults to video/mp4; supply the actual type for other formats.
     *
     * @var string|null
     */
    protected $mimeType = 'video/mp4';
    /**
     * HTTPS video URL fetched by Apple. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * HTTPS video URL fetched by Apple. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
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
     * Media type of the video. Defaults to video/mp4; supply the actual type for other formats.
     *
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }
    /**
     * Media type of the video. Defaults to video/mp4; supply the actual type for other formats.
     *
     * @param string|null $mimeType
     *
     * @return self
     */
    public function setMimeType(?string $mimeType): self
    {
        $this->initialized['mimeType'] = true;
        $this->mimeType = $mimeType;
        return $this;
    }
}
