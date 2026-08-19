<?php

namespace MessageBird\Wire\Model;

class AudienceMemberList extends \ArrayObject
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
     * Page of audience members, each a contact paired with the time it joined the audience.
     *
     * @var list<AudienceMember>|null
     */
    protected $data;
    /**
     * Cursor for the next page. Pass back as `starting_after` to advance forward. `null` when no next page exists.
     *
     * @var string|null
     */
    protected $nextCursor;
    /**
     * Cursor for the previous page. Pass back as `ending_before` to step backward. `null` when no previous page exists.
     *
     * @var string|null
     */
    protected $prevCursor;
    /**
     * Refresh anchor. Pass back as `ending_before` later to fetch items that have appeared since this response. Non-`null` whenever `data` is non-empty; `null` only on an empty page. Distinct from `prev_cursor`.
     *
     * @var string|null
     */
    protected $refreshCursor;
    /**
     * Page of audience members, each a contact paired with the time it joined the audience.
     *
     * @return list<AudienceMember>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Page of audience members, each a contact paired with the time it joined the audience.
     *
     * @param list<AudienceMember>|null $data
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
     * Cursor for the next page. Pass back as `starting_after` to advance forward. `null` when no next page exists.
     *
     * @return string|null
     */
    public function getNextCursor(): ?string
    {
        return $this->nextCursor;
    }
    /**
     * Cursor for the next page. Pass back as `starting_after` to advance forward. `null` when no next page exists.
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
     * Cursor for the previous page. Pass back as `ending_before` to step backward. `null` when no previous page exists.
     *
     * @return string|null
     */
    public function getPrevCursor(): ?string
    {
        return $this->prevCursor;
    }
    /**
     * Cursor for the previous page. Pass back as `ending_before` to step backward. `null` when no previous page exists.
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
     * Refresh anchor. Pass back as `ending_before` later to fetch items that have appeared since this response. Non-`null` whenever `data` is non-empty; `null` only on an empty page. Distinct from `prev_cursor`.
     *
     * @return string|null
     */
    public function getRefreshCursor(): ?string
    {
        return $this->refreshCursor;
    }
    /**
     * Refresh anchor. Pass back as `ending_before` later to fetch items that have appeared since this response. Non-`null` whenever `data` is non-empty; `null` only on an empty page. Distinct from `prev_cursor`.
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
}
