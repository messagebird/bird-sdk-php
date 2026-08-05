<?php

namespace MessageBird\Wire\Model;

class EmailMessageBatchResponse
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
     * One entry per message in the batch, in submission order.
     *
     * @var list<EmailMessageBatchItem>|null
     */
    protected $data;
    /**
     * One entry per message in the batch, in submission order.
     *
     * @return list<EmailMessageBatchItem>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * One entry per message in the batch, in submission order.
     *
     * @param list<EmailMessageBatchItem>|null $data
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
