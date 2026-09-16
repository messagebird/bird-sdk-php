<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveProviderPlacement
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
     * A mailbox provider, as the email panel identifies it. A lowercase identifier rather than a
     * display name, so pick your own label for it, and treat the set as open: the panel reports
     * whichever providers it observed, and `gmail`, `hotmail`, `yahoo`, `aol` and `comcast` are the
     * ones it returns most. Apple never appears, because the panel does not measure it, so a surface
     * offering an Apple row has no measurement behind it.
     * 
     * The panel's buckets are not the same as the ones the [mailbox-provider stats
     * breakdown](/docs/api/reference/get-email-stats-by-mailbox-provider) reports: Microsoft's
     * properties appear here as `hotmail` rather than `microsoft`, and Apple is absent, so the two
     * are not a joinable dimension.
     * 
     *
     * @var string|null
     */
    protected $mailboxProvider;
    /**
     * Share of the brand's mail this provider put in the inbox. Recomputed from what the panel observed across every domain the brand sends from, so a small subdomain cannot move it as much as the brand's main one.
     * 
     *
     * @var float|null
     */
    protected $inboxRate;
    /**
     * Share of the brand's mail this provider put in spam.
     *
     * @var float|null
     */
    protected $spamRate;
    /**
     * Your own inbox rate at this provider, null when you have not sent or the panel has no breakdown for your sending domain. It is the panel's view of your sending rather than from our own measurement of it, because a measured rate and a rate the panel estimated are not comparable, and this figure exists to be compared with the brand's.
     * 
     *
     * @var float|null
     */
    protected $workspaceInboxRate;
    /**
     * A mailbox provider, as the email panel identifies it. A lowercase identifier rather than a
     * display name, so pick your own label for it, and treat the set as open: the panel reports
     * whichever providers it observed, and `gmail`, `hotmail`, `yahoo`, `aol` and `comcast` are the
     * ones it returns most. Apple never appears, because the panel does not measure it, so a surface
     * offering an Apple row has no measurement behind it.
     * 
     * The panel's buckets are not the same as the ones the [mailbox-provider stats
     * breakdown](/docs/api/reference/get-email-stats-by-mailbox-provider) reports: Microsoft's
     * properties appear here as `hotmail` rather than `microsoft`, and Apple is absent, so the two
     * are not a joinable dimension.
     * 
     *
     * @return string|null
     */
    public function getMailboxProvider(): ?string
    {
        return $this->mailboxProvider;
    }
    /**
    * A mailbox provider, as the email panel identifies it. A lowercase identifier rather than a
    display name, so pick your own label for it, and treat the set as open: the panel reports
    whichever providers it observed, and `gmail`, `hotmail`, `yahoo`, `aol` and `comcast` are the
    ones it returns most. Apple never appears, because the panel does not measure it, so a surface
    offering an Apple row has no measurement behind it.
    
    The panel's buckets are not the same as the ones the [mailbox-provider stats
    breakdown](/docs/api/reference/get-email-stats-by-mailbox-provider) reports: Microsoft's
    properties appear here as `hotmail` rather than `microsoft`, and Apple is absent, so the two
    are not a joinable dimension.
    
    *
    * @param string|null $mailboxProvider
    *
    * @return self
    */
    public function setMailboxProvider(?string $mailboxProvider): self
    {
        $this->initialized['mailboxProvider'] = true;
        $this->mailboxProvider = $mailboxProvider;
        return $this;
    }
    /**
     * Share of the brand's mail this provider put in the inbox. Recomputed from what the panel observed across every domain the brand sends from, so a small subdomain cannot move it as much as the brand's main one.
     * 
     *
     * @return float|null
     */
    public function getInboxRate(): ?float
    {
        return $this->inboxRate;
    }
    /**
     * Share of the brand's mail this provider put in the inbox. Recomputed from what the panel observed across every domain the brand sends from, so a small subdomain cannot move it as much as the brand's main one.
     *
     * @param float|null $inboxRate
     *
     * @return self
     */
    public function setInboxRate(?float $inboxRate): self
    {
        $this->initialized['inboxRate'] = true;
        $this->inboxRate = $inboxRate;
        return $this;
    }
    /**
     * Share of the brand's mail this provider put in spam.
     *
     * @return float|null
     */
    public function getSpamRate(): ?float
    {
        return $this->spamRate;
    }
    /**
     * Share of the brand's mail this provider put in spam.
     *
     * @param float|null $spamRate
     *
     * @return self
     */
    public function setSpamRate(?float $spamRate): self
    {
        $this->initialized['spamRate'] = true;
        $this->spamRate = $spamRate;
        return $this;
    }
    /**
     * Your own inbox rate at this provider, null when you have not sent or the panel has no breakdown for your sending domain. It is the panel's view of your sending rather than from our own measurement of it, because a measured rate and a rate the panel estimated are not comparable, and this figure exists to be compared with the brand's.
     * 
     *
     * @return float|null
     */
    public function getWorkspaceInboxRate(): ?float
    {
        return $this->workspaceInboxRate;
    }
    /**
     * Your own inbox rate at this provider, null when you have not sent or the panel has no breakdown for your sending domain. It is the panel's view of your sending rather than from our own measurement of it, because a measured rate and a rate the panel estimated are not comparable, and this figure exists to be compared with the brand's.
     *
     * @param float|null $workspaceInboxRate
     *
     * @return self
     */
    public function setWorkspaceInboxRate(?float $workspaceInboxRate): self
    {
        $this->initialized['workspaceInboxRate'] = true;
        $this->workspaceInboxRate = $workspaceInboxRate;
        return $this;
    }
}
