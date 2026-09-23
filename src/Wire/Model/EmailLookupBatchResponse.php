<?php

namespace MessageBird\Wire\Model;

class EmailLookupBatchResponse
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
     * One assessment per submitted address, in submission order, including duplicates.
     *
     * @var list<EmailLookupBatchItem>|null
     */
    protected $data;
    /**
     * One assessment per submitted address, in submission order, including duplicates.
     *
     * @return list<EmailLookupBatchItem>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * One assessment per submitted address, in submission order, including duplicates.
     *
     * @param list<EmailLookupBatchItem>|null $data
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
