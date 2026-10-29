<?php

namespace MessageBird\Wire\Model;

class AMBNativeImage
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
     * Identifier referenced by a bubble, item, or event.
     *
     * @var string|null
     */
    protected $identifier;
    /**
     * HTTPS URL of a PNG image up to 200 kB. Total interactive image data must not exceed 5 MB. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
     *
     * @var string|null
     */
    protected $sourceUrl;
    /**
     * Accessibility description read by VoiceOver.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Identifier referenced by a bubble, item, or event.
     *
     * @return string|null
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }
    /**
     * Identifier referenced by a bubble, item, or event.
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
     * HTTPS URL of a PNG image up to 200 kB. Total interactive image data must not exceed 5 MB. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
     *
     * @return string|null
     */
    public function getSourceUrl(): ?string
    {
        return $this->sourceUrl;
    }
    /**
     * HTTPS URL of a PNG image up to 200 kB. Total interactive image data must not exceed 5 MB. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
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
     * Accessibility description read by VoiceOver.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Accessibility description read by VoiceOver.
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
}
