<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveNotableCampaign
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
     * @var string|null
     */
    protected $watchlistBrandId;
    /**
     * The brand's name.
     *
     * @var string|null
     */
    protected $brandName;
    /**
     * Why this campaign was surfaced. The set is open and grows as new signals are added.
     * 
     * Every signal describes the campaign against its own brand's history, never against the
     * other brands you watch, so several brands can carry the same signal in one period and
     * none of them is the top of anything.
     * 
     * `biggest_send` is a send far above that brand's own median: unusual for the brand, not
     * merely large. `read_rate_standout` is a campaign read unusually well for its brand.
     * `landing_in_spam` is one heavily filed as spam at a single mailbox provider, named in
     * `mailbox_provider`, which is worth seeing even when the brand's overall placement looks healthy.
     * 
     *
     * @var string|null
     */
    protected $signal;
    /**
     * The panel's own headline for this campaign, or null where it surfaced the campaign without making one. Null is the common case and is not a fault.
     * 
     *
     * @var EmailCompetitiveNotableCampaignClaim|null
     */
    protected $claim;
    /**
     * The figures behind a campaign's signal, for ordering or filtering the list yourself. Which field carries a value depends on the signal, and each is null both on the signals it does not describe and on a campaign of its own signal the panel published no figure for.
     * 
     *
     * @var EmailCompetitiveNotableEvidence|null
     */
    protected $evidence;
    /**
     * The provider a `landing_in_spam` campaign was heavily filed as spam at: spam placement is measured per provider, and this campaign's problem is at one of them. Null on every other signal.
     * 
     *
     * @var string|null
     */
    protected $mailboxProvider;
    /**
     * One campaign an email panel observed a brand sending.
     *
     * @var EmailCompetitiveCampaign|null
     */
    protected $campaign;
    /**
     * @return string|null
     */
    public function getWatchlistBrandId(): ?string
    {
        return $this->watchlistBrandId;
    }
    /**
     * @param string|null $watchlistBrandId
     *
     * @return self
     */
    public function setWatchlistBrandId(?string $watchlistBrandId): self
    {
        $this->initialized['watchlistBrandId'] = true;
        $this->watchlistBrandId = $watchlistBrandId;
        return $this;
    }
    /**
     * The brand's name.
     *
     * @return string|null
     */
    public function getBrandName(): ?string
    {
        return $this->brandName;
    }
    /**
     * The brand's name.
     *
     * @param string|null $brandName
     *
     * @return self
     */
    public function setBrandName(?string $brandName): self
    {
        $this->initialized['brandName'] = true;
        $this->brandName = $brandName;
        return $this;
    }
    /**
     * Why this campaign was surfaced. The set is open and grows as new signals are added.
     * 
     * Every signal describes the campaign against its own brand's history, never against the
     * other brands you watch, so several brands can carry the same signal in one period and
     * none of them is the top of anything.
     * 
     * `biggest_send` is a send far above that brand's own median: unusual for the brand, not
     * merely large. `read_rate_standout` is a campaign read unusually well for its brand.
     * `landing_in_spam` is one heavily filed as spam at a single mailbox provider, named in
     * `mailbox_provider`, which is worth seeing even when the brand's overall placement looks healthy.
     * 
     *
     * @return string|null
     */
    public function getSignal(): ?string
    {
        return $this->signal;
    }
    /**
    * Why this campaign was surfaced. The set is open and grows as new signals are added.
    
    Every signal describes the campaign against its own brand's history, never against the
    other brands you watch, so several brands can carry the same signal in one period and
    none of them is the top of anything.
    
    `biggest_send` is a send far above that brand's own median: unusual for the brand, not
    merely large. `read_rate_standout` is a campaign read unusually well for its brand.
    `landing_in_spam` is one heavily filed as spam at a single mailbox provider, named in
    `mailbox_provider`, which is worth seeing even when the brand's overall placement looks healthy.
    
    *
    * @param string|null $signal
    *
    * @return self
    */
    public function setSignal(?string $signal): self
    {
        $this->initialized['signal'] = true;
        $this->signal = $signal;
        return $this;
    }
    /**
     * The panel's own headline for this campaign, or null where it surfaced the campaign without making one. Null is the common case and is not a fault.
     * 
     *
     * @return EmailCompetitiveNotableCampaignClaim|null
     */
    public function getClaim(): ?EmailCompetitiveNotableCampaignClaim
    {
        return $this->claim;
    }
    /**
     * The panel's own headline for this campaign, or null where it surfaced the campaign without making one. Null is the common case and is not a fault.
     *
     * @param EmailCompetitiveNotableCampaignClaim|null $claim
     *
     * @return self
     */
    public function setClaim(?EmailCompetitiveNotableCampaignClaim $claim): self
    {
        $this->initialized['claim'] = true;
        $this->claim = $claim;
        return $this;
    }
    /**
     * The figures behind a campaign's signal, for ordering or filtering the list yourself. Which field carries a value depends on the signal, and each is null both on the signals it does not describe and on a campaign of its own signal the panel published no figure for.
     * 
     *
     * @return EmailCompetitiveNotableEvidence|null
     */
    public function getEvidence(): ?EmailCompetitiveNotableEvidence
    {
        return $this->evidence;
    }
    /**
     * The figures behind a campaign's signal, for ordering or filtering the list yourself. Which field carries a value depends on the signal, and each is null both on the signals it does not describe and on a campaign of its own signal the panel published no figure for.
     *
     * @param EmailCompetitiveNotableEvidence|null $evidence
     *
     * @return self
     */
    public function setEvidence(?EmailCompetitiveNotableEvidence $evidence): self
    {
        $this->initialized['evidence'] = true;
        $this->evidence = $evidence;
        return $this;
    }
    /**
     * The provider a `landing_in_spam` campaign was heavily filed as spam at: spam placement is measured per provider, and this campaign's problem is at one of them. Null on every other signal.
     * 
     *
     * @return string|null
     */
    public function getMailboxProvider(): ?string
    {
        return $this->mailboxProvider;
    }
    /**
     * The provider a `landing_in_spam` campaign was heavily filed as spam at: spam placement is measured per provider, and this campaign's problem is at one of them. Null on every other signal.
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
     * One campaign an email panel observed a brand sending.
     *
     * @return EmailCompetitiveCampaign|null
     */
    public function getCampaign(): ?EmailCompetitiveCampaign
    {
        return $this->campaign;
    }
    /**
     * One campaign an email panel observed a brand sending.
     *
     * @param EmailCompetitiveCampaign|null $campaign
     *
     * @return self
     */
    public function setCampaign(?EmailCompetitiveCampaign $campaign): self
    {
        $this->initialized['campaign'] = true;
        $this->campaign = $campaign;
        return $this;
    }
}
