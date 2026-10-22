<?php

namespace MessageBird\Wire\Model;

/**
 * Parameters for discarding one language's draft edits. Pass `revision` to guard against overwriting an edit you haven't seen.
 */
class WhatsAppTemplateLanguageDiscard
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
     * The revision you last read for this language, making the discard a compare-and-set: a mismatch is refused with a conflict, leaving an edit you have not seen in place. Omit it for last-write-wins, which is what a single writer wants. Supplying it for a language the draft no longer holds is also refused with a conflict rather than recreating the language.
     * 
     *
     * @var int|null
     */
    protected $revision;
    /**
     * The revision you last read for this language, making the discard a compare-and-set: a mismatch is refused with a conflict, leaving an edit you have not seen in place. Omit it for last-write-wins, which is what a single writer wants. Supplying it for a language the draft no longer holds is also refused with a conflict rather than recreating the language.
     * 
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * The revision you last read for this language, making the discard a compare-and-set: a mismatch is refused with a conflict, leaving an edit you have not seen in place. Omit it for last-write-wins, which is what a single writer wants. Supplying it for a language the draft no longer holds is also refused with a conflict rather than recreating the language.
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
