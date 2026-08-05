<?php

namespace MessageBird\Wire\Model;

class MailboxStatsSummary
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
     * Distinct email messages the mailbox sent that were accepted, counted at the message level and summed per bucket across the period.
     *
     * @var int|null
     */
    protected $sendsAccepted;
    /**
     * @var MailboxStatsSummaryDelivery|null
     */
    protected $delivery;
    /**
     * @var MailboxStatsSummaryEngagement|null
     */
    protected $engagement;
    /**
     * @var MailboxStatsSummaryLatency|null
     */
    protected $latency;
    /**
     * Distinct emails the mailbox received, summed per bucket across the period.
     *
     * @var int|null
     */
    protected $received;
    /**
     * Distinct email messages the mailbox sent that were accepted, counted at the message level and summed per bucket across the period.
     *
     * @return int|null
     */
    public function getSendsAccepted(): ?int
    {
        return $this->sendsAccepted;
    }
    /**
     * Distinct email messages the mailbox sent that were accepted, counted at the message level and summed per bucket across the period.
     *
     * @param int|null $sendsAccepted
     *
     * @return self
     */
    public function setSendsAccepted(?int $sendsAccepted): self
    {
        $this->initialized['sendsAccepted'] = true;
        $this->sendsAccepted = $sendsAccepted;
        return $this;
    }
    /**
     * @return MailboxStatsSummaryDelivery|null
     */
    public function getDelivery(): ?MailboxStatsSummaryDelivery
    {
        return $this->delivery;
    }
    /**
     * @param MailboxStatsSummaryDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?MailboxStatsSummaryDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return MailboxStatsSummaryEngagement|null
     */
    public function getEngagement(): ?MailboxStatsSummaryEngagement
    {
        return $this->engagement;
    }
    /**
     * @param MailboxStatsSummaryEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?MailboxStatsSummaryEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return MailboxStatsSummaryLatency|null
     */
    public function getLatency(): ?MailboxStatsSummaryLatency
    {
        return $this->latency;
    }
    /**
     * @param MailboxStatsSummaryLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?MailboxStatsSummaryLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Distinct emails the mailbox received, summed per bucket across the period.
     *
     * @return int|null
     */
    public function getReceived(): ?int
    {
        return $this->received;
    }
    /**
     * Distinct emails the mailbox received, summed per bucket across the period.
     *
     * @param int|null $received
     *
     * @return self
     */
    public function setReceived(?int $received): self
    {
        $this->initialized['received'] = true;
        $this->received = $received;
        return $this;
    }
}
