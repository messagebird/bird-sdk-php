<?php

namespace MessageBird\Wire\Model;

class EmailTemplateLanguageUpdate
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
     * A new email subject line for this language.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * A new line for the inbox to show after the subject in the message list. Send null to clear it, and the inbox shows the opening words of the body instead.
     * 
     *
     * @var string|null
     */
    protected $previewText;
    /**
     * A new HTML body for this language.
     *
     * @var string|null
     */
    protected $html;
    /**
     * A new plain-text body for this language. Send null to clear it, and a plain-text alternative is derived from the HTML when you submit.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * The revision you last read for this language, to detect a concurrent edit. The edit is rejected with a conflict if the language moved on since. Omit it to apply the edit unconditionally.
     * 
     *
     * @var int|null
     */
    protected $revision;
    /**
     * A new email subject line for this language.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * A new email subject line for this language.
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
     * A new line for the inbox to show after the subject in the message list. Send null to clear it, and the inbox shows the opening words of the body instead.
     * 
     *
     * @return string|null
     */
    public function getPreviewText(): ?string
    {
        return $this->previewText;
    }
    /**
     * A new line for the inbox to show after the subject in the message list. Send null to clear it, and the inbox shows the opening words of the body instead.
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
     * A new HTML body for this language.
     *
     * @return string|null
     */
    public function getHtml(): ?string
    {
        return $this->html;
    }
    /**
     * A new HTML body for this language.
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
     * A new plain-text body for this language. Send null to clear it, and a plain-text alternative is derived from the HTML when you submit.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * A new plain-text body for this language. Send null to clear it, and a plain-text alternative is derived from the HTML when you submit.
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
     * The revision you last read for this language, to detect a concurrent edit. The edit is rejected with a conflict if the language moved on since. Omit it to apply the edit unconditionally.
     * 
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * The revision you last read for this language, to detect a concurrent edit. The edit is rejected with a conflict if the language moved on since. Omit it to apply the edit unconditionally.
     *
     * @param int|null $revision
     *
     * @return self
     */
    public function setRevision(?int $revision): self
    {
        $this->initialized['revision'] = true;
        $this->revision = $revision;
        return $this;
    }
}
