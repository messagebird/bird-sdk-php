<?php

namespace MessageBird\Wire\Model;

class EmailStatsQueryMetrics
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
     * Distinct sends accepted by Bird, counted by email identity.
     *
     * @var int|null
     */
    protected $sendsAccepted;
    /**
     * Distinct message recipients accepted by Bird.
     *
     * @var int|null
     */
    protected $accepted;
    /**
     * Distinct message recipients processed for delivery.
     *
     * @var int|null
     */
    protected $processed;
    /**
     * Distinct message recipients with a delivery event.
     *
     * @var int|null
     */
    protected $delivered;
    /**
     * Distinct message recipients with bounced events.
     *
     * @var int|null
     */
    protected $bounced;
    /**
     * Distinct message recipients with hard bounced events.
     *
     * @var int|null
     */
    protected $hardBounced;
    /**
     * Distinct message recipients with soft bounced events.
     *
     * @var int|null
     */
    protected $softBounced;
    /**
     * Distinct message recipients with admin bounced events.
     *
     * @var int|null
     */
    protected $adminBounced;
    /**
     * Distinct message recipients with block bounced events.
     *
     * @var int|null
     */
    protected $blockBounced;
    /**
     * Distinct message recipients with undetermined bounced events.
     *
     * @var int|null
     */
    protected $undeterminedBounced;
    /**
     * Distinct message recipients with complained events.
     *
     * @var int|null
     */
    protected $complained;
    /**
     * Distinct message recipients with a deferral event.
     *
     * @var int|null
     */
    protected $deferred;
    /**
     * Distinct message recipients rejected before provider delivery.
     *
     * @var int|null
     */
    protected $rejected;
    /**
     * Distinct out-of-band bounce events.
     *
     * @var int|null
     */
    protected $oobBounces;
    /**
     * Distinct open events, including prefetched opens.
     *
     * @var int|null
     */
    protected $opens;
    /**
     * Distinct open events excluding prefetched opens. An absent prefetch flag counts as false.
     *
     * @var int|null
     */
    protected $opensNonPrefetched;
    /**
     * Distinct click events.
     *
     * @var int|null
     */
    protected $clicks;
    /**
     * Distinct unsubscribe events.
     *
     * @var int|null
     */
    protected $unsubscribes;
    /**
     * Distinct message recipients with an open event.
     *
     * @var int|null
     */
    protected $uniqueOpens;
    /**
     * Distinct message recipients with a non-prefetched open event.
     *
     * @var int|null
     */
    protected $uniqueOpensNonPrefetched;
    /**
     * Distinct message recipients with a click event.
     *
     * @var int|null
     */
    protected $uniqueClicks;
    /**
     * Distinct message recipients with an open or click event, deduplicated across both.
     *
     * @var int|null
     */
    protected $confirmedUniqueOpens;
    /**
     * Distinct message recipients with a non-prefetched open or click event, deduplicated across both.
     *
     * @var int|null
     */
    protected $confirmedUniqueOpensNonPrefetched;
    /**
     * Delivered recipients less out-of-band bounce events, calculated as `max(delivered - oob_bounces, 0)`.
     *
     * @var int|null
     */
    protected $effectiveDelivered;
    /**
     * In-band bounced recipients plus out-of-band bounce events, calculated as `bounced + oob_bounces`.
     *
     * @var int|null
     */
    protected $allBounces;
    /**
     * Ratio of `effective_delivered / (delivered + bounced)`, from 0 to 1. Null when `delivered + bounced` is zero.
     *
     * @var float|null
     */
    protected $deliveryRate;
    /**
     * Ratio of `all_bounces / (delivered + bounced)`, capped at 1. Null when `delivered + bounced` is zero.
     *
     * @var float|null
     */
    protected $bounceRate;
    /**
     * Ratio of `complained / effective_delivered`. Uncapped and can exceed 1 when complaints and deliveries fall in different windows. Null when `effective_delivered` is zero.
     *
     * @var float|null
     */
    protected $complaintRate;
    /**
     * Ratio of `deferred / (delivered + bounced)`, capped at 1. Null when `delivered + bounced` is zero.
     *
     * @var float|null
     */
    protected $deferralRate;
    /**
     * Ratio of `unique_opens_non_prefetched / effective_delivered`. Uncapped and can exceed 1 when opens and deliveries fall in different windows. Null when `effective_delivered` is zero.
     *
     * @var float|null
     */
    protected $openRate;
    /**
     * Ratio of `unique_clicks / effective_delivered`. Uncapped and can exceed 1 when clicks and deliveries fall in different windows. Null when `effective_delivered` is zero.
     *
     * @var float|null
     */
    protected $clickRate;
    /**
     * Ratio of `unsubscribes / effective_delivered`, using distinct unsubscribe events as the numerator. Uncapped and can exceed 1. Null when `effective_delivered` is zero.
     *
     * @var float|null
     */
    protected $unsubscribeRate;
    /**
     * Ratio of `oob_bounces / (delivered + bounced)`, using distinct out-of-band bounce events as the numerator. Uncapped and can exceed 1. Null when `delivered + bounced` is zero.
     *
     * @var float|null
     */
    protected $oobRate;
    /**
     * Processing latency at the 50th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @var int|null
     */
    protected $processingP50Ms;
    /**
     * Processing latency at the 95th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @var int|null
     */
    protected $processingP95Ms;
    /**
     * Processing latency at the 99th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @var int|null
     */
    protected $processingP99Ms;
    /**
     * Delivery latency at the 50th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @var int|null
     */
    protected $totalP50Ms;
    /**
     * Delivery latency at the 95th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @var int|null
     */
    protected $totalP95Ms;
    /**
     * Delivery latency at the 99th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @var int|null
     */
    protected $totalP99Ms;
    /**
     * Distinct sends accepted by Bird, counted by email identity.
     *
     * @return int|null
     */
    public function getSendsAccepted(): ?int
    {
        return $this->sendsAccepted;
    }
    /**
     * Distinct sends accepted by Bird, counted by email identity.
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
     * Distinct message recipients accepted by Bird.
     *
     * @return int|null
     */
    public function getAccepted(): ?int
    {
        return $this->accepted;
    }
    /**
     * Distinct message recipients accepted by Bird.
     *
     * @param int|null $accepted
     *
     * @return self
     */
    public function setAccepted(?int $accepted): self
    {
        $this->initialized['accepted'] = true;
        $this->accepted = $accepted;
        return $this;
    }
    /**
     * Distinct message recipients processed for delivery.
     *
     * @return int|null
     */
    public function getProcessed(): ?int
    {
        return $this->processed;
    }
    /**
     * Distinct message recipients processed for delivery.
     *
     * @param int|null $processed
     *
     * @return self
     */
    public function setProcessed(?int $processed): self
    {
        $this->initialized['processed'] = true;
        $this->processed = $processed;
        return $this;
    }
    /**
     * Distinct message recipients with a delivery event.
     *
     * @return int|null
     */
    public function getDelivered(): ?int
    {
        return $this->delivered;
    }
    /**
     * Distinct message recipients with a delivery event.
     *
     * @param int|null $delivered
     *
     * @return self
     */
    public function setDelivered(?int $delivered): self
    {
        $this->initialized['delivered'] = true;
        $this->delivered = $delivered;
        return $this;
    }
    /**
     * Distinct message recipients with bounced events.
     *
     * @return int|null
     */
    public function getBounced(): ?int
    {
        return $this->bounced;
    }
    /**
     * Distinct message recipients with bounced events.
     *
     * @param int|null $bounced
     *
     * @return self
     */
    public function setBounced(?int $bounced): self
    {
        $this->initialized['bounced'] = true;
        $this->bounced = $bounced;
        return $this;
    }
    /**
     * Distinct message recipients with hard bounced events.
     *
     * @return int|null
     */
    public function getHardBounced(): ?int
    {
        return $this->hardBounced;
    }
    /**
     * Distinct message recipients with hard bounced events.
     *
     * @param int|null $hardBounced
     *
     * @return self
     */
    public function setHardBounced(?int $hardBounced): self
    {
        $this->initialized['hardBounced'] = true;
        $this->hardBounced = $hardBounced;
        return $this;
    }
    /**
     * Distinct message recipients with soft bounced events.
     *
     * @return int|null
     */
    public function getSoftBounced(): ?int
    {
        return $this->softBounced;
    }
    /**
     * Distinct message recipients with soft bounced events.
     *
     * @param int|null $softBounced
     *
     * @return self
     */
    public function setSoftBounced(?int $softBounced): self
    {
        $this->initialized['softBounced'] = true;
        $this->softBounced = $softBounced;
        return $this;
    }
    /**
     * Distinct message recipients with admin bounced events.
     *
     * @return int|null
     */
    public function getAdminBounced(): ?int
    {
        return $this->adminBounced;
    }
    /**
     * Distinct message recipients with admin bounced events.
     *
     * @param int|null $adminBounced
     *
     * @return self
     */
    public function setAdminBounced(?int $adminBounced): self
    {
        $this->initialized['adminBounced'] = true;
        $this->adminBounced = $adminBounced;
        return $this;
    }
    /**
     * Distinct message recipients with block bounced events.
     *
     * @return int|null
     */
    public function getBlockBounced(): ?int
    {
        return $this->blockBounced;
    }
    /**
     * Distinct message recipients with block bounced events.
     *
     * @param int|null $blockBounced
     *
     * @return self
     */
    public function setBlockBounced(?int $blockBounced): self
    {
        $this->initialized['blockBounced'] = true;
        $this->blockBounced = $blockBounced;
        return $this;
    }
    /**
     * Distinct message recipients with undetermined bounced events.
     *
     * @return int|null
     */
    public function getUndeterminedBounced(): ?int
    {
        return $this->undeterminedBounced;
    }
    /**
     * Distinct message recipients with undetermined bounced events.
     *
     * @param int|null $undeterminedBounced
     *
     * @return self
     */
    public function setUndeterminedBounced(?int $undeterminedBounced): self
    {
        $this->initialized['undeterminedBounced'] = true;
        $this->undeterminedBounced = $undeterminedBounced;
        return $this;
    }
    /**
     * Distinct message recipients with complained events.
     *
     * @return int|null
     */
    public function getComplained(): ?int
    {
        return $this->complained;
    }
    /**
     * Distinct message recipients with complained events.
     *
     * @param int|null $complained
     *
     * @return self
     */
    public function setComplained(?int $complained): self
    {
        $this->initialized['complained'] = true;
        $this->complained = $complained;
        return $this;
    }
    /**
     * Distinct message recipients with a deferral event.
     *
     * @return int|null
     */
    public function getDeferred(): ?int
    {
        return $this->deferred;
    }
    /**
     * Distinct message recipients with a deferral event.
     *
     * @param int|null $deferred
     *
     * @return self
     */
    public function setDeferred(?int $deferred): self
    {
        $this->initialized['deferred'] = true;
        $this->deferred = $deferred;
        return $this;
    }
    /**
     * Distinct message recipients rejected before provider delivery.
     *
     * @return int|null
     */
    public function getRejected(): ?int
    {
        return $this->rejected;
    }
    /**
     * Distinct message recipients rejected before provider delivery.
     *
     * @param int|null $rejected
     *
     * @return self
     */
    public function setRejected(?int $rejected): self
    {
        $this->initialized['rejected'] = true;
        $this->rejected = $rejected;
        return $this;
    }
    /**
     * Distinct out-of-band bounce events.
     *
     * @return int|null
     */
    public function getOobBounces(): ?int
    {
        return $this->oobBounces;
    }
    /**
     * Distinct out-of-band bounce events.
     *
     * @param int|null $oobBounces
     *
     * @return self
     */
    public function setOobBounces(?int $oobBounces): self
    {
        $this->initialized['oobBounces'] = true;
        $this->oobBounces = $oobBounces;
        return $this;
    }
    /**
     * Distinct open events, including prefetched opens.
     *
     * @return int|null
     */
    public function getOpens(): ?int
    {
        return $this->opens;
    }
    /**
     * Distinct open events, including prefetched opens.
     *
     * @param int|null $opens
     *
     * @return self
     */
    public function setOpens(?int $opens): self
    {
        $this->initialized['opens'] = true;
        $this->opens = $opens;
        return $this;
    }
    /**
     * Distinct open events excluding prefetched opens. An absent prefetch flag counts as false.
     *
     * @return int|null
     */
    public function getOpensNonPrefetched(): ?int
    {
        return $this->opensNonPrefetched;
    }
    /**
     * Distinct open events excluding prefetched opens. An absent prefetch flag counts as false.
     *
     * @param int|null $opensNonPrefetched
     *
     * @return self
     */
    public function setOpensNonPrefetched(?int $opensNonPrefetched): self
    {
        $this->initialized['opensNonPrefetched'] = true;
        $this->opensNonPrefetched = $opensNonPrefetched;
        return $this;
    }
    /**
     * Distinct click events.
     *
     * @return int|null
     */
    public function getClicks(): ?int
    {
        return $this->clicks;
    }
    /**
     * Distinct click events.
     *
     * @param int|null $clicks
     *
     * @return self
     */
    public function setClicks(?int $clicks): self
    {
        $this->initialized['clicks'] = true;
        $this->clicks = $clicks;
        return $this;
    }
    /**
     * Distinct unsubscribe events.
     *
     * @return int|null
     */
    public function getUnsubscribes(): ?int
    {
        return $this->unsubscribes;
    }
    /**
     * Distinct unsubscribe events.
     *
     * @param int|null $unsubscribes
     *
     * @return self
     */
    public function setUnsubscribes(?int $unsubscribes): self
    {
        $this->initialized['unsubscribes'] = true;
        $this->unsubscribes = $unsubscribes;
        return $this;
    }
    /**
     * Distinct message recipients with an open event.
     *
     * @return int|null
     */
    public function getUniqueOpens(): ?int
    {
        return $this->uniqueOpens;
    }
    /**
     * Distinct message recipients with an open event.
     *
     * @param int|null $uniqueOpens
     *
     * @return self
     */
    public function setUniqueOpens(?int $uniqueOpens): self
    {
        $this->initialized['uniqueOpens'] = true;
        $this->uniqueOpens = $uniqueOpens;
        return $this;
    }
    /**
     * Distinct message recipients with a non-prefetched open event.
     *
     * @return int|null
     */
    public function getUniqueOpensNonPrefetched(): ?int
    {
        return $this->uniqueOpensNonPrefetched;
    }
    /**
     * Distinct message recipients with a non-prefetched open event.
     *
     * @param int|null $uniqueOpensNonPrefetched
     *
     * @return self
     */
    public function setUniqueOpensNonPrefetched(?int $uniqueOpensNonPrefetched): self
    {
        $this->initialized['uniqueOpensNonPrefetched'] = true;
        $this->uniqueOpensNonPrefetched = $uniqueOpensNonPrefetched;
        return $this;
    }
    /**
     * Distinct message recipients with a click event.
     *
     * @return int|null
     */
    public function getUniqueClicks(): ?int
    {
        return $this->uniqueClicks;
    }
    /**
     * Distinct message recipients with a click event.
     *
     * @param int|null $uniqueClicks
     *
     * @return self
     */
    public function setUniqueClicks(?int $uniqueClicks): self
    {
        $this->initialized['uniqueClicks'] = true;
        $this->uniqueClicks = $uniqueClicks;
        return $this;
    }
    /**
     * Distinct message recipients with an open or click event, deduplicated across both.
     *
     * @return int|null
     */
    public function getConfirmedUniqueOpens(): ?int
    {
        return $this->confirmedUniqueOpens;
    }
    /**
     * Distinct message recipients with an open or click event, deduplicated across both.
     *
     * @param int|null $confirmedUniqueOpens
     *
     * @return self
     */
    public function setConfirmedUniqueOpens(?int $confirmedUniqueOpens): self
    {
        $this->initialized['confirmedUniqueOpens'] = true;
        $this->confirmedUniqueOpens = $confirmedUniqueOpens;
        return $this;
    }
    /**
     * Distinct message recipients with a non-prefetched open or click event, deduplicated across both.
     *
     * @return int|null
     */
    public function getConfirmedUniqueOpensNonPrefetched(): ?int
    {
        return $this->confirmedUniqueOpensNonPrefetched;
    }
    /**
     * Distinct message recipients with a non-prefetched open or click event, deduplicated across both.
     *
     * @param int|null $confirmedUniqueOpensNonPrefetched
     *
     * @return self
     */
    public function setConfirmedUniqueOpensNonPrefetched(?int $confirmedUniqueOpensNonPrefetched): self
    {
        $this->initialized['confirmedUniqueOpensNonPrefetched'] = true;
        $this->confirmedUniqueOpensNonPrefetched = $confirmedUniqueOpensNonPrefetched;
        return $this;
    }
    /**
     * Delivered recipients less out-of-band bounce events, calculated as `max(delivered - oob_bounces, 0)`.
     *
     * @return int|null
     */
    public function getEffectiveDelivered(): ?int
    {
        return $this->effectiveDelivered;
    }
    /**
     * Delivered recipients less out-of-band bounce events, calculated as `max(delivered - oob_bounces, 0)`.
     *
     * @param int|null $effectiveDelivered
     *
     * @return self
     */
    public function setEffectiveDelivered(?int $effectiveDelivered): self
    {
        $this->initialized['effectiveDelivered'] = true;
        $this->effectiveDelivered = $effectiveDelivered;
        return $this;
    }
    /**
     * In-band bounced recipients plus out-of-band bounce events, calculated as `bounced + oob_bounces`.
     *
     * @return int|null
     */
    public function getAllBounces(): ?int
    {
        return $this->allBounces;
    }
    /**
     * In-band bounced recipients plus out-of-band bounce events, calculated as `bounced + oob_bounces`.
     *
     * @param int|null $allBounces
     *
     * @return self
     */
    public function setAllBounces(?int $allBounces): self
    {
        $this->initialized['allBounces'] = true;
        $this->allBounces = $allBounces;
        return $this;
    }
    /**
     * Ratio of `effective_delivered / (delivered + bounced)`, from 0 to 1. Null when `delivered + bounced` is zero.
     *
     * @return float|null
     */
    public function getDeliveryRate(): ?float
    {
        return $this->deliveryRate;
    }
    /**
     * Ratio of `effective_delivered / (delivered + bounced)`, from 0 to 1. Null when `delivered + bounced` is zero.
     *
     * @param float|null $deliveryRate
     *
     * @return self
     */
    public function setDeliveryRate(?float $deliveryRate): self
    {
        $this->initialized['deliveryRate'] = true;
        $this->deliveryRate = $deliveryRate;
        return $this;
    }
    /**
     * Ratio of `all_bounces / (delivered + bounced)`, capped at 1. Null when `delivered + bounced` is zero.
     *
     * @return float|null
     */
    public function getBounceRate(): ?float
    {
        return $this->bounceRate;
    }
    /**
     * Ratio of `all_bounces / (delivered + bounced)`, capped at 1. Null when `delivered + bounced` is zero.
     *
     * @param float|null $bounceRate
     *
     * @return self
     */
    public function setBounceRate(?float $bounceRate): self
    {
        $this->initialized['bounceRate'] = true;
        $this->bounceRate = $bounceRate;
        return $this;
    }
    /**
     * Ratio of `complained / effective_delivered`. Uncapped and can exceed 1 when complaints and deliveries fall in different windows. Null when `effective_delivered` is zero.
     *
     * @return float|null
     */
    public function getComplaintRate(): ?float
    {
        return $this->complaintRate;
    }
    /**
     * Ratio of `complained / effective_delivered`. Uncapped and can exceed 1 when complaints and deliveries fall in different windows. Null when `effective_delivered` is zero.
     *
     * @param float|null $complaintRate
     *
     * @return self
     */
    public function setComplaintRate(?float $complaintRate): self
    {
        $this->initialized['complaintRate'] = true;
        $this->complaintRate = $complaintRate;
        return $this;
    }
    /**
     * Ratio of `deferred / (delivered + bounced)`, capped at 1. Null when `delivered + bounced` is zero.
     *
     * @return float|null
     */
    public function getDeferralRate(): ?float
    {
        return $this->deferralRate;
    }
    /**
     * Ratio of `deferred / (delivered + bounced)`, capped at 1. Null when `delivered + bounced` is zero.
     *
     * @param float|null $deferralRate
     *
     * @return self
     */
    public function setDeferralRate(?float $deferralRate): self
    {
        $this->initialized['deferralRate'] = true;
        $this->deferralRate = $deferralRate;
        return $this;
    }
    /**
     * Ratio of `unique_opens_non_prefetched / effective_delivered`. Uncapped and can exceed 1 when opens and deliveries fall in different windows. Null when `effective_delivered` is zero.
     *
     * @return float|null
     */
    public function getOpenRate(): ?float
    {
        return $this->openRate;
    }
    /**
     * Ratio of `unique_opens_non_prefetched / effective_delivered`. Uncapped and can exceed 1 when opens and deliveries fall in different windows. Null when `effective_delivered` is zero.
     *
     * @param float|null $openRate
     *
     * @return self
     */
    public function setOpenRate(?float $openRate): self
    {
        $this->initialized['openRate'] = true;
        $this->openRate = $openRate;
        return $this;
    }
    /**
     * Ratio of `unique_clicks / effective_delivered`. Uncapped and can exceed 1 when clicks and deliveries fall in different windows. Null when `effective_delivered` is zero.
     *
     * @return float|null
     */
    public function getClickRate(): ?float
    {
        return $this->clickRate;
    }
    /**
     * Ratio of `unique_clicks / effective_delivered`. Uncapped and can exceed 1 when clicks and deliveries fall in different windows. Null when `effective_delivered` is zero.
     *
     * @param float|null $clickRate
     *
     * @return self
     */
    public function setClickRate(?float $clickRate): self
    {
        $this->initialized['clickRate'] = true;
        $this->clickRate = $clickRate;
        return $this;
    }
    /**
     * Ratio of `unsubscribes / effective_delivered`, using distinct unsubscribe events as the numerator. Uncapped and can exceed 1. Null when `effective_delivered` is zero.
     *
     * @return float|null
     */
    public function getUnsubscribeRate(): ?float
    {
        return $this->unsubscribeRate;
    }
    /**
     * Ratio of `unsubscribes / effective_delivered`, using distinct unsubscribe events as the numerator. Uncapped and can exceed 1. Null when `effective_delivered` is zero.
     *
     * @param float|null $unsubscribeRate
     *
     * @return self
     */
    public function setUnsubscribeRate(?float $unsubscribeRate): self
    {
        $this->initialized['unsubscribeRate'] = true;
        $this->unsubscribeRate = $unsubscribeRate;
        return $this;
    }
    /**
     * Ratio of `oob_bounces / (delivered + bounced)`, using distinct out-of-band bounce events as the numerator. Uncapped and can exceed 1. Null when `delivered + bounced` is zero.
     *
     * @return float|null
     */
    public function getOobRate(): ?float
    {
        return $this->oobRate;
    }
    /**
     * Ratio of `oob_bounces / (delivered + bounced)`, using distinct out-of-band bounce events as the numerator. Uncapped and can exceed 1. Null when `delivered + bounced` is zero.
     *
     * @param float|null $oobRate
     *
     * @return self
     */
    public function setOobRate(?float $oobRate): self
    {
        $this->initialized['oobRate'] = true;
        $this->oobRate = $oobRate;
        return $this;
    }
    /**
     * Processing latency at the 50th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @return int|null
     */
    public function getProcessingP50Ms(): ?int
    {
        return $this->processingP50Ms;
    }
    /**
     * Processing latency at the 50th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @param int|null $processingP50Ms
     *
     * @return self
     */
    public function setProcessingP50Ms(?int $processingP50Ms): self
    {
        $this->initialized['processingP50Ms'] = true;
        $this->processingP50Ms = $processingP50Ms;
        return $this;
    }
    /**
     * Processing latency at the 95th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @return int|null
     */
    public function getProcessingP95Ms(): ?int
    {
        return $this->processingP95Ms;
    }
    /**
     * Processing latency at the 95th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @param int|null $processingP95Ms
     *
     * @return self
     */
    public function setProcessingP95Ms(?int $processingP95Ms): self
    {
        $this->initialized['processingP95Ms'] = true;
        $this->processingP95Ms = $processingP95Ms;
        return $this;
    }
    /**
     * Processing latency at the 99th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @return int|null
     */
    public function getProcessingP99Ms(): ?int
    {
        return $this->processingP99Ms;
    }
    /**
     * Processing latency at the 99th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @param int|null $processingP99Ms
     *
     * @return self
     */
    public function setProcessingP99Ms(?int $processingP99Ms): self
    {
        $this->initialized['processingP99Ms'] = true;
        $this->processingP99Ms = $processingP99Ms;
        return $this;
    }
    /**
     * Delivery latency at the 50th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @return int|null
     */
    public function getTotalP50Ms(): ?int
    {
        return $this->totalP50Ms;
    }
    /**
     * Delivery latency at the 50th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @param int|null $totalP50Ms
     *
     * @return self
     */
    public function setTotalP50Ms(?int $totalP50Ms): self
    {
        $this->initialized['totalP50Ms'] = true;
        $this->totalP50Ms = $totalP50Ms;
        return $this;
    }
    /**
     * Delivery latency at the 95th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @return int|null
     */
    public function getTotalP95Ms(): ?int
    {
        return $this->totalP95Ms;
    }
    /**
     * Delivery latency at the 95th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @param int|null $totalP95Ms
     *
     * @return self
     */
    public function setTotalP95Ms(?int $totalP95Ms): self
    {
        $this->initialized['totalP95Ms'] = true;
        $this->totalP95Ms = $totalP95Ms;
        return $this;
    }
    /**
     * Delivery latency at the 99th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @return int|null
     */
    public function getTotalP99Ms(): ?int
    {
        return $this->totalP99Ms;
    }
    /**
     * Delivery latency at the 99th percentile, in integer milliseconds from Bird acceptance. One sample per logical event; null when no eligible sample exists.
     *
     * @param int|null $totalP99Ms
     *
     * @return self
     */
    public function setTotalP99Ms(?int $totalP99Ms): self
    {
        $this->initialized['totalP99Ms'] = true;
        $this->totalP99Ms = $totalP99Ms;
        return $this;
    }
}
