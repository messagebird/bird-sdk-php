<?php

namespace MessageBird\Wire\Model;

class SMSTemplateLanguageState
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
     * Status of one template language on channels without third-party review.
     * 
     * - `draft`: it has never been published.
     * - `live`: it is available to sends.
     * - `superseded`: a later version replaced it.
     * 
     * Treat an unknown value as not sendable.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Whether the draft has an unpublished change for this language. When true beside `live`, sends keep using the older published text until submit.
     * 
     *
     * @var bool|null
     */
    protected $draft;
    /**
     * Status of one template language on channels without third-party review.
     * 
     * - `draft`: it has never been published.
     * - `live`: it is available to sends.
     * - `superseded`: a later version replaced it.
     * 
     * Treat an unknown value as not sendable.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Status of one template language on channels without third-party review.
    
    - `draft`: it has never been published.
    - `live`: it is available to sends.
    - `superseded`: a later version replaced it.
    
    Treat an unknown value as not sendable.
    
    *
    * @param string|null $status
    *
    * @return self
    */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * Whether the draft has an unpublished change for this language. When true beside `live`, sends keep using the older published text until submit.
     * 
     *
     * @return bool|null
     */
    public function getDraft(): ?bool
    {
        return $this->draft;
    }
    /**
     * Whether the draft has an unpublished change for this language. When true beside `live`, sends keep using the older published text until submit.
     *
     * @param bool|null $draft
     *
     * @return self
     */
    public function setDraft(?bool $draft): self
    {
        $this->initialized['draft'] = true;
        $this->draft = $draft;
        return $this;
    }
}
