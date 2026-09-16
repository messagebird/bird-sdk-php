<?php

namespace MessageBird\Wire\Model;

class EmailHealth
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
     * The date range this response was actually computed against. Echoed back so clients can render the period without tracking it themselves and so cached responses can be keyed by what was queried.
     * 
     *
     * @var EmailStatsPeriod|null
     */
    protected $period;
    /**
     * Overall sending-health verdict for the window, taken as the worst status among the bounce-rate, complaint-rate, and delivery-rate signals. The open-rate signal, which can be `strong`, is not part of this roll-up. The overall verdict is one of `healthy`, `watching`, or `throttled`. It is `healthy` when the other three signals are each healthy or better. It is `watching` when at least one is watching, and `throttled` when at least one is throttled. This verdict describes deliverability risk. It never pauses your sending on its own.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * The per-rate signals include `delivery_rate`, `open_rate`, `bounce_rate`, and `complaint_rate`. Read a signal by matching on its `metric`. Each entry carries its current value, a reference deliverability limit (null where no limit applies), and its own verdict. Delivery rate, bounce rate, and complaint rate also carry the thresholds their verdict was classified against; open rate does not, because a high open rate is never a risk.
     * 
     *
     * @var list<EmailHealthSignal>|null
     */
    protected $signals;
    /**
     * The date range this response was actually computed against. Echoed back so clients can render the period without tracking it themselves and so cached responses can be keyed by what was queried.
     * 
     *
     * @return EmailStatsPeriod|null
     */
    public function getPeriod(): ?EmailStatsPeriod
    {
        return $this->period;
    }
    /**
     * The date range this response was actually computed against. Echoed back so clients can render the period without tracking it themselves and so cached responses can be keyed by what was queried.
     *
     * @param EmailStatsPeriod|null $period
     *
     * @return self
     */
    public function setPeriod(?EmailStatsPeriod $period): self
    {
        $this->initialized['period'] = true;
        $this->period = $period;
        return $this;
    }
    /**
     * Overall sending-health verdict for the window, taken as the worst status among the bounce-rate, complaint-rate, and delivery-rate signals. The open-rate signal, which can be `strong`, is not part of this roll-up. The overall verdict is one of `healthy`, `watching`, or `throttled`. It is `healthy` when the other three signals are each healthy or better. It is `watching` when at least one is watching, and `throttled` when at least one is throttled. This verdict describes deliverability risk. It never pauses your sending on its own.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Overall sending-health verdict for the window, taken as the worst status among the bounce-rate, complaint-rate, and delivery-rate signals. The open-rate signal, which can be `strong`, is not part of this roll-up. The overall verdict is one of `healthy`, `watching`, or `throttled`. It is `healthy` when the other three signals are each healthy or better. It is `watching` when at least one is watching, and `throttled` when at least one is throttled. This verdict describes deliverability risk. It never pauses your sending on its own.
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
     * The per-rate signals include `delivery_rate`, `open_rate`, `bounce_rate`, and `complaint_rate`. Read a signal by matching on its `metric`. Each entry carries its current value, a reference deliverability limit (null where no limit applies), and its own verdict. Delivery rate, bounce rate, and complaint rate also carry the thresholds their verdict was classified against; open rate does not, because a high open rate is never a risk.
     * 
     *
     * @return list<EmailHealthSignal>|null
     */
    public function getSignals(): ?array
    {
        return $this->signals;
    }
    /**
     * The per-rate signals include `delivery_rate`, `open_rate`, `bounce_rate`, and `complaint_rate`. Read a signal by matching on its `metric`. Each entry carries its current value, a reference deliverability limit (null where no limit applies), and its own verdict. Delivery rate, bounce rate, and complaint rate also carry the thresholds their verdict was classified against; open rate does not, because a high open rate is never a risk.
     *
     * @param list<EmailHealthSignal>|null $signals
     *
     * @return self
     */
    public function setSignals(?array $signals): self
    {
        $this->initialized['signals'] = true;
        $this->signals = $signals;
        return $this;
    }
}
