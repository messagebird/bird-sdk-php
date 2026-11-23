<?php

namespace MessageBird\Wire\Model;

/**
 * All block languages, ordered by language tag. A block holds at most 25 languages.
 */
class EmailBlockLanguageList
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
     * @var list<EmailBlockLanguageSummary>|null
     */
    protected $data;
    /**
     * @return list<EmailBlockLanguageSummary>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * @param list<EmailBlockLanguageSummary>|null $data
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
