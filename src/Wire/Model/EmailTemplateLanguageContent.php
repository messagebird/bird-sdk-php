<?php

namespace MessageBird\Wire\Model;

/**
 * One language's content for an email template. Each language carries its own subject, preview text and bodies, so a translation can differ in wording and length from every other language without affecting them.
 */
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
     * Whether this language links reusable blocks. On ordinary reads, the HTML shows each linked block's current published content and changes when a linked block is published; copying it to a new template creates independent content. Read the language with `authoring=true` for its HTML with block markers and its `shared_blocks`.
     * 
     *
     * @var bool|null
     */
    protected $hasSharedBlocks;
    /**
     * The language's block links. Returned only by `authoring=true` reads.
     *
     * @var EmailTemplateLanguageContentSharedBlocks|null
     */
    protected $sharedBlocks;
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
     * Whether this language links reusable blocks. On ordinary reads, the HTML shows each linked block's current published content and changes when a linked block is published; copying it to a new template creates independent content. Read the language with `authoring=true` for its HTML with block markers and its `shared_blocks`.
     * 
     *
     * @return bool|null
     */
    public function getHasSharedBlocks(): ?bool
    {
        return $this->hasSharedBlocks;
    }
    /**
     * Whether this language links reusable blocks. On ordinary reads, the HTML shows each linked block's current published content and changes when a linked block is published; copying it to a new template creates independent content. Read the language with `authoring=true` for its HTML with block markers and its `shared_blocks`.
     *
     * @param bool|null $hasSharedBlocks
     *
     * @return self
     */
    public function setHasSharedBlocks(?bool $hasSharedBlocks): self
    {
        $this->initialized['hasSharedBlocks'] = true;
        $this->hasSharedBlocks = $hasSharedBlocks;
        return $this;
    }
    /**
     * The language's block links. Returned only by `authoring=true` reads.
     *
     * @return EmailTemplateLanguageContentSharedBlocks|null
     */
    public function getSharedBlocks(): ?EmailTemplateLanguageContentSharedBlocks
    {
        return $this->sharedBlocks;
    }
    /**
     * The language's block links. Returned only by `authoring=true` reads.
     *
     * @param EmailTemplateLanguageContentSharedBlocks|EmailTemplateSharedBlocks|array|null $sharedBlocks
     *
     * @return self
     */
    public function setSharedBlocks($sharedBlocks): self
    {
        $this->initialized['sharedBlocks'] = true;
        $this->sharedBlocks = \MessageBird\Core\ModelWrapper::normalize($sharedBlocks, EmailTemplateLanguageContentSharedBlocks::class);
        return $this;
    }
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
