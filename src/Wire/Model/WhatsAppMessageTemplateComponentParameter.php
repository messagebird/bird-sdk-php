<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageTemplateComponentParameter
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
     * Value kind; determines which field to supply.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Placeholder value for a `text` parameter.
     *
     * @var string|null
     */
    protected $text;
    /**
     * Public HTTPS media-header URL, fetched at send time. For `image`, `video`, `gif`, or `document` parameters.
     *
     * @var string|null
     */
    protected $url;
    /**
     * Document name with extension; rejected on other parameter types.
     *
     * @var string|null
     */
    protected $filename;
    /**
     * Map point for a `location` header parameter.
     *
     * @var WhatsAppMessageTemplateComponentParameterLocation|null
     */
    protected $location;
    /**
     * Placeholder name, such as `first_name`; required on every named parameter. Omit for positional templates and supply values in `{{n}}` order.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Value kind; determines which field to supply.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Value kind; determines which field to supply.
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
    /**
     * Placeholder value for a `text` parameter.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * Placeholder value for a `text` parameter.
     *
     * @param string|null $text
     *
     * @return self
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
    /**
     * Public HTTPS media-header URL, fetched at send time. For `image`, `video`, `gif`, or `document` parameters.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public HTTPS media-header URL, fetched at send time. For `image`, `video`, `gif`, or `document` parameters.
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
     * Document name with extension; rejected on other parameter types.
     *
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }
    /**
     * Document name with extension; rejected on other parameter types.
     *
     * @param string|null $filename
     *
     * @return self
     */
    public function setFilename(?string $filename): self
    {
        $this->initialized['filename'] = true;
        $this->filename = $filename;
        return $this;
    }
    /**
     * Map point for a `location` header parameter.
     *
     * @return WhatsAppMessageTemplateComponentParameterLocation|null
     */
    public function getLocation(): ?WhatsAppMessageTemplateComponentParameterLocation
    {
        return $this->location;
    }
    /**
     * Map point for a `location` header parameter.
     *
     * @param WhatsAppMessageTemplateComponentParameterLocation|WhatsAppLocationSend|array|null $location
     *
     * @return self
     */
    public function setLocation($location): self
    {
        $this->initialized['location'] = true;
        $this->location = \MessageBird\Core\ModelWrapper::normalize($location, WhatsAppMessageTemplateComponentParameterLocation::class);
        return $this;
    }
    /**
     * Placeholder name, such as `first_name`; required on every named parameter. Omit for positional templates and supply values in `{{n}}` order.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Placeholder name, such as `first_name`; required on every named parameter. Omit for positional templates and supply values in `{{n}}` order.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
}
