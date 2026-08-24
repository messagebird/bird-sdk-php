<?php

namespace MessageBird\Wire\Model;

class NumberOwnership extends \ArrayObject
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
     * Whether the paperwork is accepted. Read `next` for what advances it while this is false. Whether sending is currently refused is reported by `blocked_at` instead: a number bought before its country asked for anything is unsatisfied and still usable until a review says otherwise.
     * 
     *
     * @var bool|null
     */
    protected $satisfied;
    /**
     * When the number stopped being able to carry traffic, and null while it can. Always null when `satisfied` is true, but null does not imply it: a number whose country began asking after you bought it is usable with its paperwork still outstanding. A number can also arrive blocked, and one that was usable can be blocked again if its approval is withdrawn.
     * 
     *
     * @var \DateTime|null
     */
    protected $blockedAt;
    /**
     * What you do about it, in the order to do it. Empty only when `satisfied` is true, so while anything is outstanding there is always at least one step. When what you already sent is being reviewed and nothing is needed from you, that step has kind `wait` and says so. Re-read it after each call rather than caching the first list you saw.
     * 
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * Whether the paperwork is accepted. Read `next` for what advances it while this is false. Whether sending is currently refused is reported by `blocked_at` instead: a number bought before its country asked for anything is unsatisfied and still usable until a review says otherwise.
     * 
     *
     * @return bool|null
     */
    public function getSatisfied(): ?bool
    {
        return $this->satisfied;
    }
    /**
     * Whether the paperwork is accepted. Read `next` for what advances it while this is false. Whether sending is currently refused is reported by `blocked_at` instead: a number bought before its country asked for anything is unsatisfied and still usable until a review says otherwise.
     *
     * @param bool|null $satisfied
     *
     * @return self
     */
    public function setSatisfied(?bool $satisfied): self
    {
        $this->initialized['satisfied'] = true;
        $this->satisfied = $satisfied;
        return $this;
    }
    /**
     * When the number stopped being able to carry traffic, and null while it can. Always null when `satisfied` is true, but null does not imply it: a number whose country began asking after you bought it is usable with its paperwork still outstanding. A number can also arrive blocked, and one that was usable can be blocked again if its approval is withdrawn.
     * 
     *
     * @return \DateTime|null
     */
    public function getBlockedAt(): ?\DateTime
    {
        return $this->blockedAt;
    }
    /**
     * When the number stopped being able to carry traffic, and null while it can. Always null when `satisfied` is true, but null does not imply it: a number whose country began asking after you bought it is usable with its paperwork still outstanding. A number can also arrive blocked, and one that was usable can be blocked again if its approval is withdrawn.
     *
     * @param \DateTime|null $blockedAt
     *
     * @return self
     */
    public function setBlockedAt(?\DateTime $blockedAt): self
    {
        $this->initialized['blockedAt'] = true;
        $this->blockedAt = $blockedAt;
        return $this;
    }
    /**
     * What you do about it, in the order to do it. Empty only when `satisfied` is true, so while anything is outstanding there is always at least one step. When what you already sent is being reviewed and nothing is needed from you, that step has kind `wait` and says so. Re-read it after each call rather than caching the first list you saw.
     * 
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
     * What you do about it, in the order to do it. Empty only when `satisfied` is true, so while anything is outstanding there is always at least one step. When what you already sent is being reviewed and nothing is needed from you, that step has kind `wait` and says so. Re-read it after each call rather than caching the first list you saw.
     *
     * @param list<NextAction>|null $next
     *
     * @return self
     */
    public function setNext(?array $next): self
    {
        $this->initialized['next'] = true;
        $this->next = $next;
        return $this;
    }
}
