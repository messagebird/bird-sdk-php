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
     * Watchable matches returned for this query. A capped search or an unresolved sending domain can omit a brand; an empty result does not establish that the panel has never observed it.
     * 
     *
     * @var list<EmailCompetitiveBrandMatch>|null
     */
    protected $data;
    /**
     * Watchable matches returned for this query. A capped search or an unresolved sending domain can omit a brand; an empty result does not establish that the panel has never observed it.
     * 
     *
     * @return list<EmailCompetitiveBrandMatch>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Watchable matches returned for this query. A capped search or an unresolved sending domain can omit a brand; an empty result does not establish that the panel has never observed it.
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
