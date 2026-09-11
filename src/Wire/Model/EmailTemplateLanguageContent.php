<?php

namespace MessageBird\Wire\Model;

class EmailTemplateLanguageContent
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
     * The email subject line for this language.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * The line an inbox shows after the subject in the message list, for this language. Leave it out and the inbox shows the opening words of the body instead. A mail client only reads it from the message body, so publishing folds it into the top of the HTML, hidden from view once the message is open; write it here rather than hiding your own copy in the body.
     * 
     *
     * @var string|null
     */
    protected $previewText;
    /**
     * The HTML body for this language.
     *
     * @var string|null
     */
    protected $html;
    /**
     * The plain-text body for this language. Omit it and a plain-text alternative is derived from the HTML when you submit.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * The email subject line for this language.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * The email subject line for this language.
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
     * The line an inbox shows after the subject in the message list, for this language. Leave it out and the inbox shows the opening words of the body instead. A mail client only reads it from the message body, so publishing folds it into the top of the HTML, hidden from view once the message is open; write it here rather than hiding your own copy in the body.
     * 
     *
     * @return string|null
     */
    public function getPreviewText(): ?string
    {
        return $this->previewText;
    }
    /**
     * The line an inbox shows after the subject in the message list, for this language. Leave it out and the inbox shows the opening words of the body instead. A mail client only reads it from the message body, so publishing folds it into the top of the HTML, hidden from view once the message is open; write it here rather than hiding your own copy in the body.
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
     * The HTML body for this language.
     *
     * @return string|null
     */
    public function getHtml(): ?string
    {
        return $this->html;
    }
    /**
     * The HTML body for this language.
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
     * The plain-text body for this language. Omit it and a plain-text alternative is derived from the HTML when you submit.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The plain-text body for this language. Omit it and a plain-text alternative is derived from the HTML when you submit.
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
