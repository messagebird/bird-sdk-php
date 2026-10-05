<?php

namespace MessageBird\Wire\Model;

class EmailTemplatePreviewContent
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
     * The subject line, including any template expressions.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * Inbox preview text. Preview and publication fold it into the top of the HTML as a hidden preheader. Input analysis includes its references.
     * 
     *
     * @var string|null
     */
    protected $previewText;
    /**
     * The HTML body, including any template expressions.
     *
     * @var string|null
     */
    protected $html;
    /**
     * The plain-text body. When omitted, a plain-text alternative is derived from the HTML for preview, input analysis, and publication.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * The subject line, including any template expressions.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * The subject line, including any template expressions.
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
     * Inbox preview text. Preview and publication fold it into the top of the HTML as a hidden preheader. Input analysis includes its references.
     * 
     *
     * @return string|null
     */
    public function getPreviewText(): ?string
    {
        return $this->previewText;
    }
    /**
     * Inbox preview text. Preview and publication fold it into the top of the HTML as a hidden preheader. Input analysis includes its references.
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
     * The HTML body, including any template expressions.
     *
     * @return string|null
     */
    public function getHtml(): ?string
    {
        return $this->html;
    }
    /**
     * The HTML body, including any template expressions.
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
     * The plain-text body. When omitted, a plain-text alternative is derived from the HTML for preview, input analysis, and publication.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The plain-text body. When omitted, a plain-text alternative is derived from the HTML for preview, input analysis, and publication.
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
