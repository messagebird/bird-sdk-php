<?php

namespace MessageBird\Wire\Model;

/**
 * Parameters for rolling a template back to an earlier published version. Rolling back also replaces the draft with that version's content, so you have to pass `revision`, the revision number of the draft you last read. If the draft has changed since you read it, that revision number is now stale, and the rollback fails with a conflict instead of overwriting the newer draft. Read the draft again to get its current revision, and try the rollback again.
 */
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
