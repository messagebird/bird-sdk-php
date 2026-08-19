<?php

namespace MessageBird\Wire\Model;

class SMSStatusStatsPoint
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
     * The lifecycle status this row counts. These are successive lifecycle stages. The `accepted` status was admitted for sending, `sent` was handed to the carrier, and `delivered` was confirmed by the carrier. The `undelivered`, `failed`, and `expired` statuses are failure outcomes. The `rejected` status was refused before a send attempt. Counted outcomes are a subset of the full message status vocabulary. The pre-send `scheduled`, cancellation `canceled`, and inbound-only `received` statuses are not send outcomes, so they never appear here.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Distinct messages that reached this lifecycle status in the period, attributed to the message's send time rather than the event's own.
     *
     * @var int|null
     */
    protected $count;
    /**
     * The lifecycle status this row counts. These are successive lifecycle stages. The `accepted` status was admitted for sending, `sent` was handed to the carrier, and `delivered` was confirmed by the carrier. The `undelivered`, `failed`, and `expired` statuses are failure outcomes. The `rejected` status was refused before a send attempt. Counted outcomes are a subset of the full message status vocabulary. The pre-send `scheduled`, cancellation `canceled`, and inbound-only `received` statuses are not send outcomes, so they never appear here.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * The lifecycle status this row counts. These are successive lifecycle stages. The `accepted` status was admitted for sending, `sent` was handed to the carrier, and `delivered` was confirmed by the carrier. The `undelivered`, `failed`, and `expired` statuses are failure outcomes. The `rejected` status was refused before a send attempt. Counted outcomes are a subset of the full message status vocabulary. The pre-send `scheduled`, cancellation `canceled`, and inbound-only `received` statuses are not send outcomes, so they never appear here.
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * Distinct messages that reached this lifecycle status in the period, attributed to the message's send time rather than the event's own.
     *
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->count;
    }
    /**
     * Distinct messages that reached this lifecycle status in the period, attributed to the message's send time rather than the event's own.
     *
     * @param int|null $count
     *
     * @return self
     */
    public function setCount(?int $count): self
    {
        $this->initialized['count'] = true;
        $this->count = $count;
        return $this;
    }
}
