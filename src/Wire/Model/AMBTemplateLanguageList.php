<?php

namespace MessageBird\Wire\Model;

class AMBTemplateLanguageList
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
     * The version's languages ordered by canonical tag, without content.
     *
     * @var list<AMBTemplateLanguageSummary>|null
     */
    protected $data;
    /**
     * The version's languages ordered by canonical tag, without content.
     *
     * @return list<AMBTemplateLanguageSummary>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * The version's languages ordered by canonical tag, without content.
     *
     * @param list<AMBTemplateLanguageSummary>|null $data
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
