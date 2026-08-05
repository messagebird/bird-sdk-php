<?php

namespace MessageBird\Wire\Model;

class ContactUpsertResult
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
     * One entry per contact in the request, in submission order.
     *
     * @var list<ContactUpsertResultItem>|null
     */
    protected $data;
    /**
     * One entry per contact in the request, in submission order.
     *
     * @return list<ContactUpsertResultItem>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * One entry per contact in the request, in submission order.
     *
     * @param list<ContactUpsertResultItem>|null $data
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
