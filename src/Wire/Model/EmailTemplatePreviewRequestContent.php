<?php

namespace MessageBird\Wire\Model;

class EmailTemplatePreviewRequestContent extends \ArrayObject
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
     * The subject line to render.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * The preview text to render. It is folded into the top of the HTML the same way publishing folds it, so the rendered body carries the hidden preheader a recipient's inbox would read.
     * 
     *
     * @var string|null
     */
    protected $previewText;
    /**
     * The HTML body to render.
     *
     * @var string|null
     */
    protected $html;
    /**
     * The plain-text body to render. Omit it and a plain-text alternative is derived from the HTML, the same way it is derived when you publish.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * The subject line to render.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * The subject line to render.
     *
     * @param string|null $subject
     *
     * @return self
     */
    public function setSubject(?string $subject): self
    {
        $this->initialized['subject'] = true;
        $this->subject = $subject;
        return $this;
    }
    /**
     * The preview text to render. It is folded into the top of the HTML the same way publishing folds it, so the rendered body carries the hidden preheader a recipient's inbox would read.
     * 
     *
     * @return string|null
     */
    public function getPreviewText(): ?string
    {
        return $this->previewText;
    }
    /**
     * The preview text to render. It is folded into the top of the HTML the same way publishing folds it, so the rendered body carries the hidden preheader a recipient's inbox would read.
     *
     * @param string|null $previewText
     *
     * @return self
     */
    public function setPreviewText(?string $previewText): self
    {
        $this->initialized['previewText'] = true;
        $this->previewText = $previewText;
        return $this;
    }
    /**
     * The HTML body to render.
     *
     * @return string|null
     */
    public function getHtml(): ?string
    {
        return $this->html;
    }
    /**
     * The HTML body to render.
     *
     * @param string|null $html
     *
     * @return self
     */
    public function setHtml(?string $html): self
    {
        $this->initialized['html'] = true;
        $this->html = $html;
        return $this;
    }
    /**
     * The plain-text body to render. Omit it and a plain-text alternative is derived from the HTML, the same way it is derived when you publish.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The plain-text body to render. Omit it and a plain-text alternative is derived from the HTML, the same way it is derived when you publish.
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
}
