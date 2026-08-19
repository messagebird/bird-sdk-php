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
     * Public `https` URL of the file a media header shows. Send it on an `image`, `video`, `gif` or `document` parameter. WhatsApp fetches it at send time, so it must still be reachable then, the same way a free-form media message's `url` must.
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
     * Required when the template declares named parameters: the placeholder this value fills (for example `first_name`), matching exactly one of the names the template declares. Name every parameter in that case; order does not matter once names are supplied. Omit this field for a positional template, which takes its values in `{{n}}` order instead. Sending the wrong set of names, or leaving one out that the template requires, returns a `422` `WhatsAppTemplateParameterMismatch`.
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
     * Public `https` URL of the file a media header shows. Send it on an `image`, `video`, `gif` or `document` parameter. WhatsApp fetches it at send time, so it must still be reachable then, the same way a free-form media message's `url` must.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public `https` URL of the file a media header shows. Send it on an `image`, `video`, `gif` or `document` parameter. WhatsApp fetches it at send time, so it must still be reachable then, the same way a free-form media message's `url` must.
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
     * @param WhatsAppMessageTemplateComponentParameterLocation|null $location
     *
     * @return self
     */
    public function setLocation(?WhatsAppMessageTemplateComponentParameterLocation $location): self
    {
        $this->initialized['location'] = true;
        $this->location = $location;
        return $this;
    }
    /**
     * Required when the template declares named parameters: the placeholder this value fills (for example `first_name`), matching exactly one of the names the template declares. Name every parameter in that case; order does not matter once names are supplied. Omit this field for a positional template, which takes its values in `{{n}}` order instead. Sending the wrong set of names, or leaving one out that the template requires, returns a `422` `WhatsAppTemplateParameterMismatch`.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Required when the template declares named parameters: the placeholder this value fills (for example `first_name`), matching exactly one of the names the template declares. Name every parameter in that case; order does not matter once names are supplied. Omit this field for a positional template, which takes its values in `{{n}}` order instead. Sending the wrong set of names, or leaving one out that the template requires, returns a `422` `WhatsAppTemplateParameterMismatch`.
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
