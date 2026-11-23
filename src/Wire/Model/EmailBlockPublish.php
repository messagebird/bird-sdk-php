<?php

namespace MessageBird\Wire\Model;

/**
 * Publish the current drafts of the named languages. They go live together or not at all.
 */
class EmailBlockPublish
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
     * Languages to publish, each with the draft revision last read.
     *
     * @var list<EmailBlockPublishLanguage>|null
     */
    protected $languages;
    /**
     * Publish even though live templates that use this block will start requiring inputs this publication adds. Without it, such a publication returns 409 naming the inputs and templates.
     *
     * @var bool|null
     */
    protected $confirm = false;
    /**
     * Languages to publish, each with the draft revision last read.
     *
     * @return list<EmailBlockPublishLanguage>|null
     */
    public function getLanguages(): ?array
    {
        return $this->languages;
    }
    /**
     * Languages to publish, each with the draft revision last read.
     *
     * @param list<EmailBlockPublishLanguage>|null $languages
     *
     * @return self
     */
    public function setLanguages(?array $languages): self
    {
        $this->initialized['languages'] = true;
        $this->languages = $languages;
        return $this;
    }
    /**
     * Publish even though live templates that use this block will start requiring inputs this publication adds. Without it, such a publication returns 409 naming the inputs and templates.
     *
     * @return bool|null
     */
    public function getConfirm(): ?bool
    {
        return $this->confirm;
    }
    /**
     * Publish even though live templates that use this block will start requiring inputs this publication adds. Without it, such a publication returns 409 naming the inputs and templates.
     *
     * @param bool|null $confirm
     *
     * @return self
     */
    public function setConfirm(?bool $confirm): self
    {
        $this->initialized['confirm'] = true;
        $this->confirm = $confirm;
        return $this;
    }
}
