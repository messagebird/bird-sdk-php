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
     * Where one language of a template stands, on a channel whose content Bird publishes directly. `live` is what sends serve today. `draft` is a language the draft carries that has never been published. `superseded` is a language a later version replaced. Open enum: treat an unrecognised value as not sendable.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Where one language of a template stands, on a channel whose content Bird publishes directly. `live` is what sends serve today. `draft` is a language the draft carries that has never been published. `superseded` is a language a later version replaced. Open enum: treat an unrecognised value as not sendable.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Where one language of a template stands, on a channel whose content Bird publishes directly. `live` is what sends serve today. `draft` is a language the draft carries that has never been published. `superseded` is a language a later version replaced. Open enum: treat an unrecognised value as not sendable.
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
