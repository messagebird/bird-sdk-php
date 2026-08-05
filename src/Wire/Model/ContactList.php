<?php

namespace MessageBird\Wire\Model;

class ContactList extends \ArrayObject
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
     * Page of contact objects.
     *
     * @var list<Contact>|null
     */
    protected $data;
    /**
     * Cursor for the next page. Pass back as `starting_after` to advance forward. Null when no next page exists.
     *
     * @var string|null
     */
    protected $nextCursor;
    /**
     * Cursor for the previous page. Pass back as `ending_before` to step backward. Null when no previous page exists.
     *
     * @var string|null
     */
    protected $prevCursor;
    /**
     * Refresh anchor. Pass back as `ending_before` later to fetch items that have appeared since this response. Non-null whenever `data` is non-empty; null only on an empty page. Distinct from `prev_cursor`.
     *
     * @var string|null
     */
    protected $refreshCursor;
    /**
     * Total number of items matching the request's filters across all pages. Present only when `include_total=true` was passed; otherwise null.
     *
     * @var int|null
     */
    protected $total;
    /**
     * Page of contact objects.
     *
     * @return list<Contact>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Page of contact objects.
     *
     * @param list<Contact>|null $data
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
     * Cursor for the next page. Pass back as `starting_after` to advance forward. Null when no next page exists.
     *
     * @return string|null
     */
    public function getNextCursor(): ?string
    {
        return $this->nextCursor;
    }
    /**
     * Cursor for the next page. Pass back as `starting_after` to advance forward. Null when no next page exists.
     *
     * @param string|null $nextCursor
     *
     * @return self
     */
    public function setNextCursor(?string $nextCursor): self
    {
        $this->initialized['nextCursor'] = true;
        $this->nextCursor = $nextCursor;
        return $this;
    }
    /**
     * Cursor for the previous page. Pass back as `ending_before` to step backward. Null when no previous page exists.
     *
     * @return string|null
     */
    public function getPrevCursor(): ?string
    {
        return $this->prevCursor;
    }
    /**
     * Cursor for the previous page. Pass back as `ending_before` to step backward. Null when no previous page exists.
     *
     * @param string|null $prevCursor
     *
     * @return self
     */
    public function setPrevCursor(?string $prevCursor): self
    {
        $this->initialized['prevCursor'] = true;
        $this->prevCursor = $prevCursor;
        return $this;
    }
    /**
     * Refresh anchor. Pass back as `ending_before` later to fetch items that have appeared since this response. Non-null whenever `data` is non-empty; null only on an empty page. Distinct from `prev_cursor`.
     *
     * @return string|null
     */
    public function getRefreshCursor(): ?string
    {
        return $this->refreshCursor;
    }
    /**
     * Refresh anchor. Pass back as `ending_before` later to fetch items that have appeared since this response. Non-null whenever `data` is non-empty; null only on an empty page. Distinct from `prev_cursor`.
     *
     * @param string|null $refreshCursor
     *
     * @return self
     */
    public function setRefreshCursor(?string $refreshCursor): self
    {
        $this->initialized['refreshCursor'] = true;
        $this->refreshCursor = $refreshCursor;
        return $this;
    }
    /**
     * Total number of items matching the request's filters across all pages. Present only when `include_total=true` was passed; otherwise null.
     *
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }
    /**
     * Total number of items matching the request's filters across all pages. Present only when `include_total=true` was passed; otherwise null.
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
