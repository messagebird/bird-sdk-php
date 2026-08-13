<?php

namespace MessageBird\Wire\Model;

class EmailBounceCodeStatsPointBounces extends \ArrayObject
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
     * Distinct recipients with a permanent delivery failure (invalid address or non-existent domain). The address is automatically added to the suppression list.
     * 
     *
     * @var int|null
     */
    protected $hard;
    /**
     * Distinct recipients with a transient delivery failure (mailbox full or server temporarily unavailable). Delivery was retried.
     * 
     *
     * @var int|null
     */
    protected $soft;
    /**
     * Distinct recipients refused by a policy at the receiving end, such as relaying denied or a blocklisted domain. Fixing these usually means changing your content or your sender configuration, not cleaning up the recipient list.
     * 
     *
     * @var int|null
     */
    protected $admin;
    /**
     * Distinct recipients bounced because the receiving mail server blocked the sending IP for reputation reasons (mail block, spam block, spam content). Triage usually focuses on IP reputation and sending volume.
     * 
     *
     * @var int|null
     */
    protected $block;
    /**
     * Distinct recipients bounced where the receiving server's response did not allow precise classification.
     * 
     *
     * @var int|null
     */
    protected $undetermined;
    /**
     * Distinct recipients with a permanent delivery failure (invalid address or non-existent domain). The address is automatically added to the suppression list.
     * 
     *
     * @return int|null
     */
    public function getHard(): ?int
    {
        return $this->hard;
    }
    /**
     * Distinct recipients with a permanent delivery failure (invalid address or non-existent domain). The address is automatically added to the suppression list.
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
     * Distinct recipients with a transient delivery failure (mailbox full or server temporarily unavailable). Delivery was retried.
     * 
     *
     * @return int|null
     */
    public function getSoft(): ?int
    {
        return $this->soft;
    }
    /**
     * Distinct recipients with a transient delivery failure (mailbox full or server temporarily unavailable). Delivery was retried.
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
     * Distinct recipients refused by a policy at the receiving end, such as relaying denied or a blocklisted domain. Fixing these usually means changing your content or your sender configuration, not cleaning up the recipient list.
     * 
     *
     * @return int|null
     */
    public function getAdmin(): ?int
    {
        return $this->admin;
    }
    /**
     * Distinct recipients refused by a policy at the receiving end, such as relaying denied or a blocklisted domain. Fixing these usually means changing your content or your sender configuration, not cleaning up the recipient list.
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
     * Distinct recipients bounced because the receiving mail server blocked the sending IP for reputation reasons (mail block, spam block, spam content). Triage usually focuses on IP reputation and sending volume.
     * 
     *
     * @return int|null
     */
    public function getBlock(): ?int
    {
        return $this->block;
    }
    /**
     * Distinct recipients bounced because the receiving mail server blocked the sending IP for reputation reasons (mail block, spam block, spam content). Triage usually focuses on IP reputation and sending volume.
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
}
