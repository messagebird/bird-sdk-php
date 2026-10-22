<?php

namespace MessageBird\Wire\Model;

/**
 * One example value for one variable, as written to a draft.
 */
class WhatsAppTemplateExampleParameterWrite
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
     * The kind of value a template parameter accepts. `text` is an example filling a `{{n}}` placeholder. The other four are the sample file a media header shows, and each matches its header's `format`. Any other value is rejected.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * The example value. Send it when `type` is `text`. May be empty on a draft; required before submission.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * The address of the file a media header shows. Send it when `type` is `image`, `video`, `gif` or `document`. We fetch the file when the language is submitted and hand Meta our own copy, so the address only has to be reachable at submission. WhatsApp reviews the template with this file, and the message each recipient receives carries the file named on the send. May be empty on a draft, for a file not yet chosen; a reachable address is required before submission.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * The named placeholder this example fills. Send it only for a template written against named parameters rather than positional `{{n}}` ones. May be empty on a draft; required before submission.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * The kind of value a template parameter accepts. `text` is an example filling a `{{n}}` placeholder. The other four are the sample file a media header shows, and each matches its header's `format`. Any other value is rejected.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The kind of value a template parameter accepts. `text` is an example filling a `{{n}}` placeholder. The other four are the sample file a media header shows, and each matches its header's `format`. Any other value is rejected.
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
     * The example value. Send it when `type` is `text`. May be empty on a draft; required before submission.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The example value. Send it when `type` is `text`. May be empty on a draft; required before submission.
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
     * The address of the file a media header shows. Send it when `type` is `image`, `video`, `gif` or `document`. We fetch the file when the language is submitted and hand Meta our own copy, so the address only has to be reachable at submission. WhatsApp reviews the template with this file, and the message each recipient receives carries the file named on the send. May be empty on a draft, for a file not yet chosen; a reachable address is required before submission.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * The address of the file a media header shows. Send it when `type` is `image`, `video`, `gif` or `document`. We fetch the file when the language is submitted and hand Meta our own copy, so the address only has to be reachable at submission. WhatsApp reviews the template with this file, and the message each recipient receives carries the file named on the send. May be empty on a draft, for a file not yet chosen; a reachable address is required before submission.
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
     * The named placeholder this example fills. Send it only for a template written against named parameters rather than positional `{{n}}` ones. May be empty on a draft; required before submission.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The named placeholder this example fills. Send it only for a template written against named parameters rather than positional `{{n}}` ones. May be empty on a draft; required before submission.
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
