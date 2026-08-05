<?php

namespace MessageBird\Wire\Model;

class SMSMessageBatchResponse
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
     * @var list<SMSMessage>|null
     */
    protected $data;
    /**
     * Aggregate result for an SMS batch.
     *
     * @var SMSBatchSummary|null
     */
    protected $summary;
    /**
     * One entry per message in the batch, in submission order.
     *
     * @return list<SMSMessage>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * One entry per message in the batch, in submission order.
     *
     * @param list<SMSMessage>|null $data
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
     * Aggregate result for an SMS batch.
     *
     * @return SMSBatchSummary|null
     */
    public function getSummary(): ?SMSBatchSummary
    {
        return $this->summary;
    }
    /**
     * Aggregate result for an SMS batch.
     *
     * @param SMSBatchSummary|null $summary
     *
     * @return self
     */
    public function setSummary(?SMSBatchSummary $summary): self
    {
        $this->initialized['summary'] = true;
        $this->summary = $summary;
        return $this;
    }
}
