<?php

namespace MessageBird\Wire\Model;

class EmailLookupBatchRequest
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
     * Addresses to assess in submission order. Surrounding whitespace is trimmed and case is preserved. Malformed addresses receive individual assessments. Duplicates are assessed and billed at each position. The request must also fit within the 128 KiB request-body limit.
     *
     * @var list<string>|null
     */
    protected $emails;
    /**
     * Addresses to assess in submission order. Surrounding whitespace is trimmed and case is preserved. Malformed addresses receive individual assessments. Duplicates are assessed and billed at each position. The request must also fit within the 128 KiB request-body limit.
     *
     * @return list<string>|null
     */
    public function getEmails(): ?array
    {
        return $this->emails;
    }
    /**
     * Addresses to assess in submission order. Surrounding whitespace is trimmed and case is preserved. Malformed addresses receive individual assessments. Duplicates are assessed and billed at each position. The request must also fit within the 128 KiB request-body limit.
     *
     * @param list<string>|null $emails
     *
     * @return self
     */
    public function setEmails(?array $emails): self
    {
        $this->initialized['emails'] = true;
        $this->emails = $emails;
        return $this;
    }
}
