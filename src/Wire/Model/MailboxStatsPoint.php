<?php

namespace MessageBird\Wire\Model;

class MailboxStatsPoint
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
     * The day (`YYYY-MM-DD`) or instant (RFC 3339, on the bucket boundary) this point covers, matching the period's grain.
     *
     * @var string|null
     */
    protected $bucket;
    /**
     * Distinct email messages the mailbox sent that were accepted in this bucket, counted at the message level (one per accepted send regardless of how many recipients it addresses). Every other sent-mail metric in `delivery` and `engagement` is recipient-level or event-level.
     * 
     *
     * @var int|null
     */
    protected $sendsAccepted;
    /**
     * @var MailboxStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var MailboxStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * @var MailboxStatsPointLatency|null
     */
    protected $latency;
    /**
     * Distinct emails the mailbox received in this bucket.
     *
     * @var int|null
     */
    protected $received;
    /**
     * The day (`YYYY-MM-DD`) or instant (RFC 3339, on the bucket boundary) this point covers, matching the period's grain.
     *
     * @return string|null
     */
    public function getBucket(): ?string
    {
        return $this->bucket;
    }
    /**
     * The day (`YYYY-MM-DD`) or instant (RFC 3339, on the bucket boundary) this point covers, matching the period's grain.
     *
     * @param string|null $bucket
     *
     * @return self
     */
    public function setBucket(?string $bucket): self
    {
        $this->initialized['bucket'] = true;
        $this->bucket = $bucket;
        return $this;
    }
    /**
     * Distinct email messages the mailbox sent that were accepted in this bucket, counted at the message level (one per accepted send regardless of how many recipients it addresses). Every other sent-mail metric in `delivery` and `engagement` is recipient-level or event-level.
     * 
     *
     * @return int|null
     */
    public function getSendsAccepted(): ?int
    {
        return $this->sendsAccepted;
    }
    /**
     * Distinct email messages the mailbox sent that were accepted in this bucket, counted at the message level (one per accepted send regardless of how many recipients it addresses). Every other sent-mail metric in `delivery` and `engagement` is recipient-level or event-level.
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
     * @return MailboxStatsPointDelivery|null
     */
    public function getDelivery(): ?MailboxStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param MailboxStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?MailboxStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return MailboxStatsPointEngagement|null
     */
    public function getEngagement(): ?MailboxStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param MailboxStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?MailboxStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return MailboxStatsPointLatency|null
     */
    public function getLatency(): ?MailboxStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param MailboxStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?MailboxStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Distinct emails the mailbox received in this bucket.
     *
     * @return int|null
     */
    public function getReceived(): ?int
    {
        return $this->received;
    }
    /**
     * Distinct emails the mailbox received in this bucket.
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
