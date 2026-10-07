<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsGmailCategory
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
     * Share of the test's Gmail seeds that landed under this tab, as a percentage.
     *
     * @var float|null
     */
    protected $sharePercent;
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
     * Share of the test's Gmail seeds that landed under this tab, as a percentage.
     *
     * @return float|null
     */
    public function getSharePercent(): ?float
    {
        return $this->sharePercent;
    }
    /**
     * Share of the test's Gmail seeds that landed under this tab, as a percentage.
     *
     * @param float|null $sharePercent
     *
     * @return self
     */
    public function setSharePercent(?float $sharePercent): self
    {
        $this->initialized['sharePercent'] = true;
        $this->sharePercent = $sharePercent;
        return $this;
    }
}
