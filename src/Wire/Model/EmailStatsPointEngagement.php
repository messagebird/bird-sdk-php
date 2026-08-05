<?php

namespace MessageBird\Wire\Model;

class EmailStatsPointEngagement extends \ArrayObject
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
     * Distinct open events, counting repeat opens from the same recipient and opens auto-fetched by inbox privacy features (such as Apple Mail Privacy Protection and the Gmail image proxy).
     * 
     *
     * @var int|null
     */
    protected $opens;
    /**
     * Distinct open events excluding those auto-fetched by inbox privacy features. Same event-counting semantics as `opens` (repeat opens from the same recipient count separately), with prefetched opens removed.
     * 
     *
     * @var int|null
     */
    protected $opensNonPrefetched;
    /**
     * Distinct recipients who opened at least once, including opens auto-fetched by inbox privacy features.
     *
     * @var int|null
     */
    protected $uniqueOpens;
    /**
     * Distinct recipients who opened at least once, excluding opens auto-fetched by inbox privacy features. This is the numerator used for open rate, so iOS-heavy audiences (Apple Mail Privacy Protection and similar) do not inflate it.
     * 
     *
     * @var int|null
     */
    protected $uniqueOpensNonPrefetched;
    /**
     * Distinct click events, counting repeat clicks from the same recipient.
     *
     * @var int|null
     */
    protected $clicks;
    /**
     * Distinct recipients who clicked at least once.
     *
     * @var int|null
     */
    protected $uniqueClicks;
    /**
     * Distinct unsubscribe events, recorded via the list-unsubscribe header or the footer link.
     *
     * @var int|null
     */
    protected $unsubscribes;
    /**
     * Distinct non-prefetched openers relative to effectively delivered recipients in the same scope, computed as `unique_opens_non_prefetched / delivery.effective_delivered`; on rows without an `effective_delivered` field (the mailbox-provider breakdowns) the denominator equals `delivery.delivered`. The numerator excludes opens auto-fetched by inbox privacy features. Opens are attributed by event time, so engagement earned by earlier deliveries can push the rate above 1. Null when the denominator is zero.
     * 
     *
     * @var float|null
     */
    protected $openRate;
    /**
     * Distinct clickers relative to effectively delivered recipients in the same scope, computed as `unique_clicks / delivery.effective_delivered` (`delivery.delivered` on rows without an `effective_delivered` field). Clicks are attributed by event time, so engagement earned by earlier deliveries can push the rate above 1. Null when the denominator is zero.
     * 
     *
     * @var float|null
     */
    protected $clickRate;
    /**
     * Unsubscribe events relative to effectively delivered recipients in the same scope, computed as `unsubscribes / delivery.effective_delivered` (`delivery.delivered` on rows without an `effective_delivered` field). Unsubscribes are attributed by event time, so the rate can exceed 1. Null when the denominator is zero.
     * 
     *
     * @var float|null
     */
    protected $unsubscribeRate;
    /**
     * Distinct open events, counting repeat opens from the same recipient and opens auto-fetched by inbox privacy features (such as Apple Mail Privacy Protection and the Gmail image proxy).
     * 
     *
     * @return int|null
     */
    public function getOpens(): ?int
    {
        return $this->opens;
    }
    /**
     * Distinct open events, counting repeat opens from the same recipient and opens auto-fetched by inbox privacy features (such as Apple Mail Privacy Protection and the Gmail image proxy).
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
     * Distinct open events excluding those auto-fetched by inbox privacy features. Same event-counting semantics as `opens` (repeat opens from the same recipient count separately), with prefetched opens removed.
     * 
     *
     * @return int|null
     */
    public function getOpensNonPrefetched(): ?int
    {
        return $this->opensNonPrefetched;
    }
    /**
     * Distinct open events excluding those auto-fetched by inbox privacy features. Same event-counting semantics as `opens` (repeat opens from the same recipient count separately), with prefetched opens removed.
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
     * Distinct recipients who opened at least once, including opens auto-fetched by inbox privacy features.
     *
     * @return int|null
     */
    public function getUniqueOpens(): ?int
    {
        return $this->uniqueOpens;
    }
    /**
     * Distinct recipients who opened at least once, including opens auto-fetched by inbox privacy features.
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
     * Distinct recipients who opened at least once, excluding opens auto-fetched by inbox privacy features. This is the numerator used for open rate, so iOS-heavy audiences (Apple Mail Privacy Protection and similar) do not inflate it.
     * 
     *
     * @return int|null
     */
    public function getUniqueOpensNonPrefetched(): ?int
    {
        return $this->uniqueOpensNonPrefetched;
    }
    /**
     * Distinct recipients who opened at least once, excluding opens auto-fetched by inbox privacy features. This is the numerator used for open rate, so iOS-heavy audiences (Apple Mail Privacy Protection and similar) do not inflate it.
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
     * Distinct click events, counting repeat clicks from the same recipient.
     *
     * @return int|null
     */
    public function getClicks(): ?int
    {
        return $this->clicks;
    }
    /**
     * Distinct click events, counting repeat clicks from the same recipient.
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
     * Distinct recipients who clicked at least once.
     *
     * @return int|null
     */
    public function getUniqueClicks(): ?int
    {
        return $this->uniqueClicks;
    }
    /**
     * Distinct recipients who clicked at least once.
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
     * Distinct unsubscribe events, recorded via the list-unsubscribe header or the footer link.
     *
     * @return int|null
     */
    public function getUnsubscribes(): ?int
    {
        return $this->unsubscribes;
    }
    /**
     * Distinct unsubscribe events, recorded via the list-unsubscribe header or the footer link.
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
     * Distinct non-prefetched openers relative to effectively delivered recipients in the same scope, computed as `unique_opens_non_prefetched / delivery.effective_delivered`; on rows without an `effective_delivered` field (the mailbox-provider breakdowns) the denominator equals `delivery.delivered`. The numerator excludes opens auto-fetched by inbox privacy features. Opens are attributed by event time, so engagement earned by earlier deliveries can push the rate above 1. Null when the denominator is zero.
     * 
     *
     * @return float|null
     */
    public function getOpenRate(): ?float
    {
        return $this->openRate;
    }
    /**
     * Distinct non-prefetched openers relative to effectively delivered recipients in the same scope, computed as `unique_opens_non_prefetched / delivery.effective_delivered`; on rows without an `effective_delivered` field (the mailbox-provider breakdowns) the denominator equals `delivery.delivered`. The numerator excludes opens auto-fetched by inbox privacy features. Opens are attributed by event time, so engagement earned by earlier deliveries can push the rate above 1. Null when the denominator is zero.
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
     * Distinct clickers relative to effectively delivered recipients in the same scope, computed as `unique_clicks / delivery.effective_delivered` (`delivery.delivered` on rows without an `effective_delivered` field). Clicks are attributed by event time, so engagement earned by earlier deliveries can push the rate above 1. Null when the denominator is zero.
     * 
     *
     * @return float|null
     */
    public function getClickRate(): ?float
    {
        return $this->clickRate;
    }
    /**
     * Distinct clickers relative to effectively delivered recipients in the same scope, computed as `unique_clicks / delivery.effective_delivered` (`delivery.delivered` on rows without an `effective_delivered` field). Clicks are attributed by event time, so engagement earned by earlier deliveries can push the rate above 1. Null when the denominator is zero.
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
     * Unsubscribe events relative to effectively delivered recipients in the same scope, computed as `unsubscribes / delivery.effective_delivered` (`delivery.delivered` on rows without an `effective_delivered` field). Unsubscribes are attributed by event time, so the rate can exceed 1. Null when the denominator is zero.
     * 
     *
     * @return float|null
     */
    public function getUnsubscribeRate(): ?float
    {
        return $this->unsubscribeRate;
    }
    /**
     * Unsubscribe events relative to effectively delivered recipients in the same scope, computed as `unsubscribes / delivery.effective_delivered` (`delivery.delivered` on rows without an `effective_delivered` field). Unsubscribes are attributed by event time, so the rate can exceed 1. Null when the denominator is zero.
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
}
