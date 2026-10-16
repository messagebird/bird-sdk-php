<?php

namespace MessageBird\Wire\Model;

/**
 * Matched search fragments for a thread, one array per field the query matched, with the matched terms wrapped in `**`. A field is present only when the query matched it, so the keys that are present tell you which fields produced the hit. Returned only on thread search results.
 */
class EmailThreadHighlights
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
     * Matched fragments from the conversation's subject.
     *
     * @var list<string>|null
     */
    protected $subject;
    /**
     * Matched fragments from a message's body text.
     *
     * @var list<string>|null
     */
    protected $text;
    /**
     * Matched fragments from the conversation's subject.
     *
     * @return list<string>|null
     */
    public function getSubject(): ?array
    {
        return $this->subject;
    }
    /**
     * Matched fragments from the conversation's subject.
     *
     * @param list<string>|null $subject
     *
     * @return self
     */
    public function setSubject(?array $subject): self
    {
        $this->initialized['subject'] = true;
        $this->subject = $subject;
        return $this;
    }
    /**
     * Matched fragments from a message's body text.
     *
     * @return list<string>|null
     */
    public function getText(): ?array
    {
        return $this->text;
    }
    /**
     * Matched fragments from a message's body text.
     *
     * @param list<string>|null $text
     *
     * @return self
     */
    public function setText(?array $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
}
