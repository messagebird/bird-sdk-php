<?php

namespace MessageBird\Wire\Model;

class EmailTemplateLanguageList
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
     * Every language the version holds, ordered by language tag, without their content. Read a single language to get its content.
     * 
     *
     * @var list<EmailTemplateLanguageSummary>|null
     */
    protected $data;
    /**
     * Every language the version holds, ordered by language tag, without their content. Read a single language to get its content.
     * 
     *
     * @return list<EmailTemplateLanguageSummary>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Every language the version holds, ordered by language tag, without their content. Read a single language to get its content.
     *
     * @param list<EmailTemplateLanguageSummary>|null $data
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
