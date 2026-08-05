<?php

namespace MessageBird\Wire\Model;

class EmailMailboxProviderDeliveryStatsBounces extends \ArrayObject
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
     * Distinct recipients with a permanent delivery failure (invalid address or non-existent domain).
     *
     * @var int|null
     */
    protected $hard;
    /**
     * Distinct recipients with a transient delivery failure (mailbox full or server temporarily unavailable).
     *
     * @var int|null
     */
    protected $soft;
    /**
     * Distinct recipients bounced by an upstream policy block (relaying denied, blocklisted domain).
     *
     * @var int|null
     */
    protected $admin;
    /**
     * Distinct recipients bounced because the receiving mail server blocked the sending IP for reputation reasons.
     *
     * @var int|null
     */
    protected $block;
    /**
     * Distinct recipients bounced where the receiving server's response did not allow precise classification.
     *
     * @var int|null
     */
    protected $undetermined;
    /**
     * Fraction of bounced recipients that hard bounced, computed as `hard / bounced`. Null when `bounced` is zero.
     * 
     *
     * @var float|null
     */
    protected $hardRate;
    /**
     * Fraction of bounced recipients that soft bounced, computed as `soft / bounced`. Null when `bounced` is zero.
     * 
     *
     * @var float|null
     */
    protected $softRate;
    /**
     * Fraction of bounced recipients that admin bounced, computed as `admin / bounced`. Null when `bounced` is zero.
     * 
     *
     * @var float|null
     */
    protected $adminRate;
    /**
     * Fraction of bounced recipients that block bounced, computed as `block / bounced`. Null when `bounced` is zero.
     * 
     *
     * @var float|null
     */
    protected $blockRate;
    /**
     * Fraction of bounced recipients with undetermined classification, computed as `undetermined / bounced`. Null when `bounced` is zero.
     * 
     *
     * @var float|null
     */
    protected $undeterminedRate;
    /**
     * Distinct recipients with a permanent delivery failure (invalid address or non-existent domain).
     *
     * @return int|null
     */
    public function getHard(): ?int
    {
        return $this->hard;
    }
    /**
     * Distinct recipients with a permanent delivery failure (invalid address or non-existent domain).
     *
     * @param int|null $hard
     *
     * @return self
     */
    public function setHard(?int $hard): self
    {
        $this->initialized['hard'] = true;
        $this->hard = $hard;
        return $this;
    }
    /**
     * Distinct recipients with a transient delivery failure (mailbox full or server temporarily unavailable).
     *
     * @return int|null
     */
    public function getSoft(): ?int
    {
        return $this->soft;
    }
    /**
     * Distinct recipients with a transient delivery failure (mailbox full or server temporarily unavailable).
     *
     * @param int|null $soft
     *
     * @return self
     */
    public function setSoft(?int $soft): self
    {
        $this->initialized['soft'] = true;
        $this->soft = $soft;
        return $this;
    }
    /**
     * Distinct recipients bounced by an upstream policy block (relaying denied, blocklisted domain).
     *
     * @return int|null
     */
    public function getAdmin(): ?int
    {
        return $this->admin;
    }
    /**
     * Distinct recipients bounced by an upstream policy block (relaying denied, blocklisted domain).
     *
     * @param int|null $admin
     *
     * @return self
     */
    public function setAdmin(?int $admin): self
    {
        $this->initialized['admin'] = true;
        $this->admin = $admin;
        return $this;
    }
    /**
     * Distinct recipients bounced because the receiving mail server blocked the sending IP for reputation reasons.
     *
     * @return int|null
     */
    public function getBlock(): ?int
    {
        return $this->block;
    }
    /**
     * Distinct recipients bounced because the receiving mail server blocked the sending IP for reputation reasons.
     *
     * @param int|null $block
     *
     * @return self
     */
    public function setBlock(?int $block): self
    {
        $this->initialized['block'] = true;
        $this->block = $block;
        return $this;
    }
    /**
     * Distinct recipients bounced where the receiving server's response did not allow precise classification.
     *
     * @return int|null
     */
    public function getUndetermined(): ?int
    {
        return $this->undetermined;
    }
    /**
     * Distinct recipients bounced where the receiving server's response did not allow precise classification.
     *
     * @param int|null $undetermined
     *
     * @return self
     */
    public function setUndetermined(?int $undetermined): self
    {
        $this->initialized['undetermined'] = true;
        $this->undetermined = $undetermined;
        return $this;
    }
    /**
     * Fraction of bounced recipients that hard bounced, computed as `hard / bounced`. Null when `bounced` is zero.
     * 
     *
     * @return float|null
     */
    public function getHardRate(): ?float
    {
        return $this->hardRate;
    }
    /**
     * Fraction of bounced recipients that hard bounced, computed as `hard / bounced`. Null when `bounced` is zero.
     *
     * @param float|null $hardRate
     *
     * @return self
     */
    public function setHardRate(?float $hardRate): self
    {
        $this->initialized['hardRate'] = true;
        $this->hardRate = $hardRate;
        return $this;
    }
    /**
     * Fraction of bounced recipients that soft bounced, computed as `soft / bounced`. Null when `bounced` is zero.
     * 
     *
     * @return float|null
     */
    public function getSoftRate(): ?float
    {
        return $this->softRate;
    }
    /**
     * Fraction of bounced recipients that soft bounced, computed as `soft / bounced`. Null when `bounced` is zero.
     *
     * @param float|null $softRate
     *
     * @return self
     */
    public function setSoftRate(?float $softRate): self
    {
        $this->initialized['softRate'] = true;
        $this->softRate = $softRate;
        return $this;
    }
    /**
     * Fraction of bounced recipients that admin bounced, computed as `admin / bounced`. Null when `bounced` is zero.
     * 
     *
     * @return float|null
     */
    public function getAdminRate(): ?float
    {
        return $this->adminRate;
    }
    /**
     * Fraction of bounced recipients that admin bounced, computed as `admin / bounced`. Null when `bounced` is zero.
     *
     * @param float|null $adminRate
     *
     * @return self
     */
    public function setAdminRate(?float $adminRate): self
    {
        $this->initialized['adminRate'] = true;
        $this->adminRate = $adminRate;
        return $this;
    }
    /**
     * Fraction of bounced recipients that block bounced, computed as `block / bounced`. Null when `bounced` is zero.
     * 
     *
     * @return float|null
     */
    public function getBlockRate(): ?float
    {
        return $this->blockRate;
    }
    /**
     * Fraction of bounced recipients that block bounced, computed as `block / bounced`. Null when `bounced` is zero.
     *
     * @param float|null $blockRate
     *
     * @return self
     */
    public function setBlockRate(?float $blockRate): self
    {
        $this->initialized['blockRate'] = true;
        $this->blockRate = $blockRate;
        return $this;
    }
    /**
     * Fraction of bounced recipients with undetermined classification, computed as `undetermined / bounced`. Null when `bounced` is zero.
     * 
     *
     * @return float|null
     */
    public function getUndeterminedRate(): ?float
    {
        return $this->undeterminedRate;
    }
    /**
     * Fraction of bounced recipients with undetermined classification, computed as `undetermined / bounced`. Null when `bounced` is zero.
     *
     * @param float|null $undeterminedRate
     *
     * @return self
     */
    public function setUndeterminedRate(?float $undeterminedRate): self
    {
        $this->initialized['undeterminedRate'] = true;
        $this->undeterminedRate = $undeterminedRate;
        return $this;
    }
}
