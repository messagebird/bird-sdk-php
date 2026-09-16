<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsAuthSource
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
     * The sending source as the reporting identifies it. Not a fixed list: unidentified senders, mostly forwarders, appear as a real category.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * A coarse classification of the source. The set can grow; treat values as labels. Null when the measurement did not classify this sender.
     * 
     *
     * @var string|null
     */
    protected $category;
    /**
     * Messages the reporting attributes to this source over the period.
     *
     * @var int|null
     */
    protected $volume;
    /**
     * Share of this source's mail that passed SPF with alignment, as a percentage.
     *
     * @var float|null
     */
    protected $spfAlignedRatePercent;
    /**
     * Share of this source's mail that passed DKIM with alignment, as a percentage.
     *
     * @var float|null
     */
    protected $dkimAlignedRatePercent;
    /**
     * Share of this source's mail that passed DMARC, as a percentage.
     *
     * @var float|null
     */
    protected $dmarcPassRatePercent;
    /**
     * How a sending source's mail authenticates against the domain's DMARC policy. `aligned` passes with both SPF and DKIM aligned; `dkim_only` and `spf_only` pass on one mechanism; `fails_policy` passes neither. The reporting decides this set and can add to it, so treat an unrecognised value as a label to show rather than a case to exhaust. A source whose verdict is new still belongs in the table.
     * 
     *
     * @var string|null
     */
    protected $verdict;
    /**
     * Whether this source counts toward the reject recommendation. A source that does not is excluded from that judgement, which is what lets this table explain a conservative recommendation instead of contradicting it.
     * 
     *
     * @var bool|null
     */
    protected $qualifiesForReadiness;
    /**
     * The sending source as the reporting identifies it. Not a fixed list: unidentified senders, mostly forwarders, appear as a real category.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The sending source as the reporting identifies it. Not a fixed list: unidentified senders, mostly forwarders, appear as a real category.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * A coarse classification of the source. The set can grow; treat values as labels. Null when the measurement did not classify this sender.
     * 
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * A coarse classification of the source. The set can grow; treat values as labels. Null when the measurement did not classify this sender.
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
     * Messages the reporting attributes to this source over the period.
     *
     * @return int|null
     */
    public function getVolume(): ?int
    {
        return $this->volume;
    }
    /**
     * Messages the reporting attributes to this source over the period.
     *
     * @param int|null $volume
     *
     * @return self
     */
    public function setVolume(?int $volume): self
    {
        $this->initialized['volume'] = true;
        $this->volume = $volume;
        return $this;
    }
    /**
     * Share of this source's mail that passed SPF with alignment, as a percentage.
     *
     * @return float|null
     */
    public function getSpfAlignedRatePercent(): ?float
    {
        return $this->spfAlignedRatePercent;
    }
    /**
     * Share of this source's mail that passed SPF with alignment, as a percentage.
     *
     * @param float|null $spfAlignedRatePercent
     *
     * @return self
     */
    public function setSpfAlignedRatePercent(?float $spfAlignedRatePercent): self
    {
        $this->initialized['spfAlignedRatePercent'] = true;
        $this->spfAlignedRatePercent = $spfAlignedRatePercent;
        return $this;
    }
    /**
     * Share of this source's mail that passed DKIM with alignment, as a percentage.
     *
     * @return float|null
     */
    public function getDkimAlignedRatePercent(): ?float
    {
        return $this->dkimAlignedRatePercent;
    }
    /**
     * Share of this source's mail that passed DKIM with alignment, as a percentage.
     *
     * @param float|null $dkimAlignedRatePercent
     *
     * @return self
     */
    public function setDkimAlignedRatePercent(?float $dkimAlignedRatePercent): self
    {
        $this->initialized['dkimAlignedRatePercent'] = true;
        $this->dkimAlignedRatePercent = $dkimAlignedRatePercent;
        return $this;
    }
    /**
     * Share of this source's mail that passed DMARC, as a percentage.
     *
     * @return float|null
     */
    public function getDmarcPassRatePercent(): ?float
    {
        return $this->dmarcPassRatePercent;
    }
    /**
     * Share of this source's mail that passed DMARC, as a percentage.
     *
     * @param float|null $dmarcPassRatePercent
     *
     * @return self
     */
    public function setDmarcPassRatePercent(?float $dmarcPassRatePercent): self
    {
        $this->initialized['dmarcPassRatePercent'] = true;
        $this->dmarcPassRatePercent = $dmarcPassRatePercent;
        return $this;
    }
    /**
     * How a sending source's mail authenticates against the domain's DMARC policy. `aligned` passes with both SPF and DKIM aligned; `dkim_only` and `spf_only` pass on one mechanism; `fails_policy` passes neither. The reporting decides this set and can add to it, so treat an unrecognised value as a label to show rather than a case to exhaust. A source whose verdict is new still belongs in the table.
     * 
     *
     * @return string|null
     */
    public function getVerdict(): ?string
    {
        return $this->verdict;
    }
    /**
     * How a sending source's mail authenticates against the domain's DMARC policy. `aligned` passes with both SPF and DKIM aligned; `dkim_only` and `spf_only` pass on one mechanism; `fails_policy` passes neither. The reporting decides this set and can add to it, so treat an unrecognised value as a label to show rather than a case to exhaust. A source whose verdict is new still belongs in the table.
     *
     * @param string|null $verdict
     *
     * @return self
     */
    public function setVerdict(?string $verdict): self
    {
        $this->initialized['verdict'] = true;
        $this->verdict = $verdict;
        return $this;
    }
    /**
     * Whether this source counts toward the reject recommendation. A source that does not is excluded from that judgement, which is what lets this table explain a conservative recommendation instead of contradicting it.
     * 
     *
     * @return bool|null
     */
    public function getQualifiesForReadiness(): ?bool
    {
        return $this->qualifiesForReadiness;
    }
    /**
     * Whether this source counts toward the reject recommendation. A source that does not is excluded from that judgement, which is what lets this table explain a conservative recommendation instead of contradicting it.
     *
     * @param bool|null $qualifiesForReadiness
     *
     * @return self
     */
    public function setQualifiesForReadiness(?bool $qualifiesForReadiness): self
    {
        $this->initialized['qualifiesForReadiness'] = true;
        $this->qualifiesForReadiness = $qualifiesForReadiness;
        return $this;
    }
}
