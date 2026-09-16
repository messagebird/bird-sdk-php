<?php

namespace MessageBird\Wire\Model;

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
