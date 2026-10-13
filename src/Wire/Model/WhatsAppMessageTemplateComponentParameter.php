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
     * The kind of value this parameter carries, which decides which of the fields below to send.
     *
     * @var string|null
     */
    protected $type;
    /**
     * The value substituted into the placeholder, as a plain string. Send it on a `text` parameter.
     *
     * @var string|null
     */
    protected $text;
    /**
     * Public `https` URL of the file a media header shows, fetched by WhatsApp at send time. Send it on an `image`, `video`, `gif` or `document` parameter.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * The point on the map a location header opens. Send it on a `location` parameter.
     *
     * @var WhatsAppMessageTemplateComponentParameterLocation|null
     */
    protected $location;
    /**
     * The placeholder this value fills, for a template with named parameters (for example `first_name`); name every parameter then. Omit it for a positional template, which takes values in `{{n}}` order.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * The kind of value this parameter carries, which decides which of the fields below to send.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The kind of value this parameter carries, which decides which of the fields below to send.
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
     * The value substituted into the placeholder, as a plain string. Send it on a `text` parameter.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The value substituted into the placeholder, as a plain string. Send it on a `text` parameter.
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
     * Public `https` URL of the file a media header shows, fetched by WhatsApp at send time. Send it on an `image`, `video`, `gif` or `document` parameter.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public `https` URL of the file a media header shows, fetched by WhatsApp at send time. Send it on an `image`, `video`, `gif` or `document` parameter.
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
     * The point on the map a location header opens. Send it on a `location` parameter.
     *
     * @return WhatsAppMessageTemplateComponentParameterLocation|null
     */
    public function getLocation(): ?WhatsAppMessageTemplateComponentParameterLocation
    {
        return $this->location;
    }
    /**
     * The point on the map a location header opens. Send it on a `location` parameter.
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
     * The placeholder this value fills, for a template with named parameters (for example `first_name`); name every parameter then. Omit it for a positional template, which takes values in `{{n}}` order.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The placeholder this value fills, for a template with named parameters (for example `first_name`); name every parameter then. Omit it for a positional template, which takes values in `{{n}}` order.
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
