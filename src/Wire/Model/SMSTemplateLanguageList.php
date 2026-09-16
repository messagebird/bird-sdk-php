<?php

namespace MessageBird\Wire\Model;

class SMSTemplateLanguageList
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
     * The version's languages ordered by canonical tag, without text.
     *
     * @var list<SMSTemplateLanguageSummary>|null
     */
    protected $data;
    /**
     * The version's languages ordered by canonical tag, without text.
     *
     * @return list<SMSTemplateLanguageSummary>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * The version's languages ordered by canonical tag, without text.
     *
     * @param list<SMSTemplateLanguageSummary>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}
