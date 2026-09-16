<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsGmailTabCategory
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
     * A Gmail tab, as the measurement identifies it. A lowercase identifier rather than a
     * display name, so pick your own label for it, and treat the set as open: these are
     * Gmail's own tabs, and the measurement reports whichever one it saw.
     * 
     * `none` is a value rather than an absence: Gmail delivered the mail under no tab at all,
     * which is an ordinary outcome and not a gap in the measurement.
     * 
     *
     * @var string|null
     */
    protected $category;
    /**
     * Share of the domain's Gmail-placed mail that landed under this tab, as a percentage.
     *
     * @var float|null
     */
    protected $overallPercent;
    /**
     * Share of this tab's mail that placed in the inbox, as a percentage.
     *
     * @var float|null
     */
    protected $inboxPercent;
    /**
     * Share of this tab's mail that placed in spam, as a percentage.
     *
     * @var float|null
     */
    protected $spamPercent;
    /**
     * A Gmail tab, as the measurement identifies it. A lowercase identifier rather than a
     * display name, so pick your own label for it, and treat the set as open: these are
     * Gmail's own tabs, and the measurement reports whichever one it saw.
     * 
     * `none` is a value rather than an absence: Gmail delivered the mail under no tab at all,
     * which is an ordinary outcome and not a gap in the measurement.
     * 
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
    * A Gmail tab, as the measurement identifies it. A lowercase identifier rather than a
    display name, so pick your own label for it, and treat the set as open: these are
    Gmail's own tabs, and the measurement reports whichever one it saw.
    
    `none` is a value rather than an absence: Gmail delivered the mail under no tab at all,
    which is an ordinary outcome and not a gap in the measurement.
    
    *
    * @param string|null $category
    *
    * @return self
    */
    public function setCategory(?string $category): self
    {
        $this->initialized['category'] = true;
        $this->category = $category;
        return $this;
    }
    /**
     * Share of the domain's Gmail-placed mail that landed under this tab, as a percentage.
     *
     * @return float|null
     */
    public function getOverallPercent(): ?float
    {
        return $this->overallPercent;
    }
    /**
     * Share of the domain's Gmail-placed mail that landed under this tab, as a percentage.
     *
     * @param float|null $overallPercent
     *
     * @return self
     */
    public function setOverallPercent(?float $overallPercent): self
    {
        $this->initialized['overallPercent'] = true;
        $this->overallPercent = $overallPercent;
        return $this;
    }
    /**
     * Share of this tab's mail that placed in the inbox, as a percentage.
     *
     * @return float|null
     */
    public function getInboxPercent(): ?float
    {
        return $this->inboxPercent;
    }
    /**
     * Share of this tab's mail that placed in the inbox, as a percentage.
     *
     * @param float|null $inboxPercent
     *
     * @return self
     */
    public function setInboxPercent(?float $inboxPercent): self
    {
        $this->initialized['inboxPercent'] = true;
        $this->inboxPercent = $inboxPercent;
        return $this;
    }
    /**
     * Share of this tab's mail that placed in spam, as a percentage.
     *
     * @return float|null
     */
    public function getSpamPercent(): ?float
    {
        return $this->spamPercent;
    }
    /**
     * Share of this tab's mail that placed in spam, as a percentage.
     *
     * @param float|null $spamPercent
     *
     * @return self
     */
    public function setSpamPercent(?float $spamPercent): self
    {
        $this->initialized['spamPercent'] = true;
        $this->spamPercent = $spamPercent;
        return $this;
    }
}
