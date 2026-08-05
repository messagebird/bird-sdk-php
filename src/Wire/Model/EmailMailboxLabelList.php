<?php

namespace MessageBird\Wire\Model;

class EmailMailboxLabelList
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
     * @var list<EmailMailboxLabel>|null
     */
    protected $data;
    /**
     * @return list<EmailMailboxLabel>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * @param list<EmailMailboxLabel>|null $data
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
