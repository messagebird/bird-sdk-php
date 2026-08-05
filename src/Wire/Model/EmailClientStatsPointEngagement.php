<?php

namespace MessageBird\Wire\Model;

class EmailClientStatsPointEngagement extends \ArrayObject
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
     * Distinct open events excluding those auto-fetched by inbox privacy features. Same event-counting semantics as `opens`, with prefetched opens removed.
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
     * Distinct recipients who opened at least once, excluding opens auto-fetched by inbox privacy features.
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
     * Distinct open events excluding those auto-fetched by inbox privacy features. Same event-counting semantics as `opens`, with prefetched opens removed.
     * 
     *
     * @return int|null
     */
    public function getOpensNonPrefetched(): ?int
    {
        return $this->opensNonPrefetched;
    }
    /**
     * Distinct open events excluding those auto-fetched by inbox privacy features. Same event-counting semantics as `opens`, with prefetched opens removed.
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
     * Distinct recipients who opened at least once, excluding opens auto-fetched by inbox privacy features.
     *
     * @return int|null
     */
    public function getUniqueOpensNonPrefetched(): ?int
    {
        return $this->uniqueOpensNonPrefetched;
    }
    /**
     * Distinct recipients who opened at least once, excluding opens auto-fetched by inbox privacy features.
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
}
