<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateExampleParameter
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
     * The kind of value this parameter accepts.
     *
     * @var string|null
     */
    protected $type;
    /**
     * An example value for a text parameter. Present when `type` is `text`.
     *
     * @var string|null
     */
    protected $text;
    /**
     * The address of the file a media header shows, as it was given when the header was authored rather than WhatsApp's copy of it. Present when `type` is `image`, `video`, `gif` or `document`.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * The named placeholder this example fills. Present whenever the template declares named parameters, which is what a send must name; absent only for a positional template, whose values go in `{{n}}` order.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * The kind of value this parameter accepts.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The kind of value this parameter accepts.
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
     * An example value for a text parameter. Present when `type` is `text`.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * An example value for a text parameter. Present when `type` is `text`.
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
     * The address of the file a media header shows, as it was given when the header was authored rather than WhatsApp's copy of it. Present when `type` is `image`, `video`, `gif` or `document`.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * The address of the file a media header shows, as it was given when the header was authored rather than WhatsApp's copy of it. Present when `type` is `image`, `video`, `gif` or `document`.
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
     * The named placeholder this example fills. Present whenever the template declares named parameters, which is what a send must name; absent only for a positional template, whose values go in `{{n}}` order.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The named placeholder this example fills. Present whenever the template declares named parameters, which is what a send must name; absent only for a positional template, whose values go in `{{n}}` order.
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
