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
}
