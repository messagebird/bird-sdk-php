<?php

namespace MessageBird\Wire\Model;

class EmailTemplateRollback
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
     * The draft revision you last read (from the template's `revision` field). A stale value returns a conflict so you can reload and retry.
     * 
     *
     * @var int|null
     */
    protected $revision;
    /**
     * The draft revision you last read (from the template's `revision` field). A stale value returns a conflict so you can reload and retry.
     * 
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * The draft revision you last read (from the template's `revision` field). A stale value returns a conflict so you can reload and retry.
     *
     * @param int|null $revision
     *
     * @return self
     */
    public function setRevision(?int $revision): self
    {
        $this->initialized['revision'] = true;
        $this->revision = $revision;
        return $this;
    }
}
