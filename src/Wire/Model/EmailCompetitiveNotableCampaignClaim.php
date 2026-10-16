<?php

namespace MessageBird\Wire\Model;

/**
 * What the panel itself asserts about a campaign, in its own words. Present only on the campaigns the panel chose to make a claim about, which is a minority of them: a campaign can be surfaced as notable without the panel putting a headline on it, and that is an ordinary outcome rather than missing data.
 */
class EmailCompetitiveNotableCampaignClaim extends \ArrayObject
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
     * The panel's own phrasing, which may name the window the claim was measured over ("Biggest send in 7 days") or not ("Best-read campaign"). Show it as written rather than rebuilding it from the signal, and do not parse a window out of it.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * The panel's own phrasing, which may name the window the claim was measured over ("Biggest send in 7 days") or not ("Best-read campaign"). Show it as written rather than rebuilding it from the signal, and do not parse a window out of it.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The panel's own phrasing, which may name the window the claim was measured over ("Biggest send in 7 days") or not ("Best-read campaign"). Show it as written rather than rebuilding it from the signal, and do not parse a window out of it.
     *
     * @param string|null $text
     *
     * @return self
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
}
