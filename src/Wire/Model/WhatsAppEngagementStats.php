<?php

namespace MessageBird\Wire\Model;

/**
 * WhatsApp engagement counts and the derived read rate for the scope of the containing row (the whole requested period or a breakdown dimension). The `read` field is the number of distinct messages confirmed read by the recipient. Send time determines attribution; the instant the read receipt arrived does not. A read is counted in the period its message was accepted in, alongside that message's own delivery when one arrived. The read rate divides reads by messages delivered in the same scope and is null when its denominator is zero. Very large counts are close estimates rather than exact tallies.
 */
class WhatsAppEngagementStats
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
     * Distinct messages confirmed read by the recipient.
     *
     * @var int|null
     */
    protected $read;
    /**
     * Distinct messages read relative to messages delivered in the same scope, computed as `read / delivery.delivered`. Both counts are attributed by send time, so a read is counted alongside its own message's delivery. The rate can exceed 1 where a read receipt arrived for a message whose delivery receipt did not, or, at high volume, because the counts are close estimates. Null when `delivery.delivered` is zero.
     * 
     *
     * @var float|null
     */
    protected $readRate;
    /**
     * Distinct messages confirmed read by the recipient.
     *
     * @return int|null
     */
    public function getRead(): ?int
    {
        return $this->read;
    }
    /**
     * Distinct messages confirmed read by the recipient.
     *
     * @param int|null $read
     *
     * @return self
     */
    public function setRead(?int $read): self
    {
        $this->initialized['read'] = true;
        $this->read = $read;
        return $this;
    }
    /**
     * Distinct messages read relative to messages delivered in the same scope, computed as `read / delivery.delivered`. Both counts are attributed by send time, so a read is counted alongside its own message's delivery. The rate can exceed 1 where a read receipt arrived for a message whose delivery receipt did not, or, at high volume, because the counts are close estimates. Null when `delivery.delivered` is zero.
     * 
     *
     * @return float|null
     */
    public function getReadRate(): ?float
    {
        return $this->readRate;
    }
    /**
     * Distinct messages read relative to messages delivered in the same scope, computed as `read / delivery.delivered`. Both counts are attributed by send time, so a read is counted alongside its own message's delivery. The rate can exceed 1 where a read receipt arrived for a message whose delivery receipt did not, or, at high volume, because the counts are close estimates. Null when `delivery.delivered` is zero.
     *
     * @param float|null $readRate
     *
     * @return self
     */
    public function setReadRate(?float $readRate): self
    {
        $this->initialized['readRate'] = true;
        $this->readRate = $readRate;
        return $this;
    }
}
