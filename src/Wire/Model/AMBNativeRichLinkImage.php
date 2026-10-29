<?php

namespace MessageBird\Wire\Model;

class AMBNativeRichLinkImage
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
     * HTTPS URL of a PNG preview image up to 200 kB. Bird fetches and encodes it when sending. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
     *
     * @var string|null
     */
    protected $sourceUrl;
    /**
     * PNG media type required by Apple. Defaults to image/png.
     *
     * @var string|null
     */
    protected $mimeType = 'image/png';
    /**
     * HTTPS URL of a PNG preview image up to 200 kB. Bird fetches and encodes it when sending. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
     *
     * @return string|null
     */
    public function getSourceUrl(): ?string
    {
        return $this->sourceUrl;
    }
    /**
     * HTTPS URL of a PNG preview image up to 200 kB. Bird fetches and encodes it when sending. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
     *
     * @param string|null $sourceUrl
     *
     * @return self
     */
    public function setSourceUrl(?string $sourceUrl): self
    {
        $this->initialized['sourceUrl'] = true;
        $this->sourceUrl = $sourceUrl;
        return $this;
    }
    /**
     * PNG media type required by Apple. Defaults to image/png.
     *
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }
    /**
     * PNG media type required by Apple. Defaults to image/png.
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
