<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateLanguageList
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
     * Every language this version holds, without content.
     *
     * @var list<WhatsAppTemplateLanguageSummary>|null
     */
    protected $data;
    /**
     * Every language this version holds, without content.
     *
     * @return list<WhatsAppTemplateLanguageSummary>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Every language this version holds, without content.
     *
     * @param list<WhatsAppTemplateLanguageSummary>|null $data
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
