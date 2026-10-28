<?php

namespace MessageBird\Wire\Model;

/**
 * One problem found while checking a version.
 */
class WhatsAppTemplateSubmitProblem
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
     * The language the problem belongs to, or null when it concerns the version as a whole. Always null in an analysis, which checks one language's unsaved content.
     * 
     *
     * @var string|null
     */
    protected $language;
    /**
     * Where the problem sits inside the language's content, as a dotted path with indexes, or null when it is not about one field. The path is rooted at the language you wrote, so `components[0].text` is the first block's text.
     * 
     *
     * @var string|null
     */
    protected $field;
    /**
     * The error code a real submit fails with. Look it up in the error catalog for what to do about it.
     * 
     *
     * @var string|null
     */
    protected $code;
    /**
     * What is wrong, in a form you can show the author.
     *
     * @var string|null
     */
    protected $message;
    /**
     * The language the problem belongs to, or null when it concerns the version as a whole. Always null in an analysis, which checks one language's unsaved content.
     * 
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * The language the problem belongs to, or null when it concerns the version as a whole. Always null in an analysis, which checks one language's unsaved content.
     *
     * @param string|null $language
     *
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->initialized['language'] = true;
        $this->language = $language;
        return $this;
    }
    /**
     * Where the problem sits inside the language's content, as a dotted path with indexes, or null when it is not about one field. The path is rooted at the language you wrote, so `components[0].text` is the first block's text.
     * 
     *
     * @return string|null
     */
    public function getField(): ?string
    {
        return $this->field;
    }
    /**
     * Where the problem sits inside the language's content, as a dotted path with indexes, or null when it is not about one field. The path is rooted at the language you wrote, so `components[0].text` is the first block's text.
     *
     * @param string|null $field
     *
     * @return self
     */
    public function setField(?string $field): self
    {
        $this->initialized['field'] = true;
        $this->field = $field;
        return $this;
    }
    /**
     * The error code a real submit fails with. Look it up in the error catalog for what to do about it.
     * 
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
     * The error code a real submit fails with. Look it up in the error catalog for what to do about it.
     *
     * @param string|null $code
     *
     * @return self
     */
    public function setCode(?string $code): self
    {
        $this->initialized['code'] = true;
        $this->code = $code;
        return $this;
    }
    /**
     * What is wrong, in a form you can show the author.
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    /**
     * What is wrong, in a form you can show the author.
     *
     * @param string|null $message
     *
     * @return self
     */
    public function setMessage(?string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
}
