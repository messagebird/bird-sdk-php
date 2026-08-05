<?php

namespace MessageBird\Wire\Model;

class EmailThreadMessageBody
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
     * The HTML body of the message, or null when the message had no HTML part.
     *
     * @var string|null
     */
    protected $html;
    /**
     * The plain-text body of the message, or null when the message had no text part.
     *
     * @var string|null
     */
    protected $text;
    /**
     * The HTML body of the message, or null when the message had no HTML part.
     *
     * @return string|null
     */
    public function getHtml(): ?string
    {
        return $this->html;
    }
    /**
     * The HTML body of the message, or null when the message had no HTML part.
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
     * The plain-text body of the message, or null when the message had no text part.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The plain-text body of the message, or null when the message had no text part.
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
