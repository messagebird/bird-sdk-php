<?php

namespace MessageBird\Wire\Model;

class EmailTemplateSubmitProblem
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
     * The language this problem is about. Null when the problem is about the whole version rather than one language, for example an empty draft, or a default language the draft does not have.
     * 
     *
     * @var string|null
     */
    protected $language;
    /**
     * Which field within that language has the problem, such as `subject` or `html`. Null when the problem is not about one particular field.
     * 
     *
     * @var string|null
     */
    protected $field;
    /**
     * The error code a real submit would fail with. Look it up in the error catalog to see what it means and what to do about it.
     * 
     *
     * @var string|null
     */
    protected $code;
    /**
     * What is wrong, worded so you can show it directly to whoever is authoring the template.
     * 
     *
     * @var string|null
     */
    protected $message;
    /**
     * The language this problem is about. Null when the problem is about the whole version rather than one language, for example an empty draft, or a default language the draft does not have.
     * 
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * The language this problem is about. Null when the problem is about the whole version rather than one language, for example an empty draft, or a default language the draft does not have.
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
     * Which field within that language has the problem, such as `subject` or `html`. Null when the problem is not about one particular field.
     * 
     *
     * @return string|null
     */
    public function getField(): ?string
    {
        return $this->field;
    }
    /**
     * Which field within that language has the problem, such as `subject` or `html`. Null when the problem is not about one particular field.
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
     * The error code a real submit would fail with. Look it up in the error catalog to see what it means and what to do about it.
     * 
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
     * The error code a real submit would fail with. Look it up in the error catalog to see what it means and what to do about it.
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
     * What is wrong, worded so you can show it directly to whoever is authoring the template.
     * 
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    /**
     * What is wrong, worded so you can show it directly to whoever is authoring the template.
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
