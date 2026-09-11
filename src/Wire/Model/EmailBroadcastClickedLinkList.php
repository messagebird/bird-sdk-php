<?php

namespace MessageBird\Wire\Model;

class EmailBroadcastClickedLinkList
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
     * The broadcast's clicked URLs, most-clicked first, capped at 100 rows.
     *
     * @var list<EmailBroadcastClickedLink>|null
     */
    protected $data;
    /**
     * Total number of distinct URLs the broadcast's recipients clicked, regardless of the cap on `data`. When it exceeds the number of rows returned, the list was capped at the 100 most-clicked URLs.
     * 
     *
     * @var int|null
     */
    protected $total;
    /**
     * The broadcast's clicked URLs, most-clicked first, capped at 100 rows.
     *
     * @return list<EmailBroadcastClickedLink>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * The broadcast's clicked URLs, most-clicked first, capped at 100 rows.
     *
     * @param list<EmailBroadcastClickedLink>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
    /**
     * Total number of distinct URLs the broadcast's recipients clicked, regardless of the cap on `data`. When it exceeds the number of rows returned, the list was capped at the 100 most-clicked URLs.
     * 
     *
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }
    /**
     * Total number of distinct URLs the broadcast's recipients clicked, regardless of the cap on `data`. When it exceeds the number of rows returned, the list was capped at the 100 most-clicked URLs.
     *
     * @param int|null $total
     *
     * @return self
     */
    public function setTotal(?int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;
        return $this;
    }
}
