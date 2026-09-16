<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveBrandSearchResults
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
     * Matching brands. Empty when nothing matched, which for an unusual brand name means the panel does not track it rather than that the search failed.
     * 
     *
     * @var list<EmailCompetitiveBrandMatch>|null
     */
    protected $data;
    /**
     * Matching brands. Empty when nothing matched, which for an unusual brand name means the panel does not track it rather than that the search failed.
     * 
     *
     * @return list<EmailCompetitiveBrandMatch>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Matching brands. Empty when nothing matched, which for an unusual brand name means the panel does not track it rather than that the search failed.
     *
     * @param list<EmailCompetitiveBrandMatch>|null $data
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
