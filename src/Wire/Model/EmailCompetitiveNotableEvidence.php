<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveNotableEvidence
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
     * How many times the brand's own median volume this send was. A value of 29 means the send was twenty-nine times the brand's typical volume for the period. Null on every signal other than `biggest_send`, and on a `biggest_send` campaign the panel published no ratio for.
     * 
     *
     * @var float|null
     */
    protected $ratioToMedian;
    /**
     * How many panel observations `campaign.read_rate` was measured over. A rate over thirty observations and one over a hundred and forty are not equally worth showing, and this is what separates them. Null on every signal other than `read_rate_standout`, and on a `read_rate_standout` campaign the panel published no denominator for.
     * 
     *
     * @var int|null
     */
    protected $readRateObservations;
    /**
     * Share of this campaign filed as spam at the one provider named in `mailbox_provider`, as a value between 0 and 1. A different measurement from the campaign's overall `spam_rate`, and the one this signal is about. Null on every signal other than `landing_in_spam`, and on a `landing_in_spam` campaign whose provider counts the panel did not publish, so a spam entry can arrive without the rate behind it.
     * 
     *
     * @var float|null
     */
    protected $mailboxProviderSpamRate;
    /**
     * How many observations at that provider `mailbox_provider_spam_rate` was measured over. Null on the same terms.
     * 
     *
     * @var int|null
     */
    protected $mailboxProviderObservations;
    /**
     * How many times the brand's own median volume this send was. A value of 29 means the send was twenty-nine times the brand's typical volume for the period. Null on every signal other than `biggest_send`, and on a `biggest_send` campaign the panel published no ratio for.
     * 
     *
     * @return float|null
     */
    public function getRatioToMedian(): ?float
    {
        return $this->ratioToMedian;
    }
    /**
     * How many times the brand's own median volume this send was. A value of 29 means the send was twenty-nine times the brand's typical volume for the period. Null on every signal other than `biggest_send`, and on a `biggest_send` campaign the panel published no ratio for.
     *
     * @param float|null $ratioToMedian
     *
     * @return self
     */
    public function setRatioToMedian(?float $ratioToMedian): self
    {
        $this->initialized['ratioToMedian'] = true;
        $this->ratioToMedian = $ratioToMedian;
        return $this;
    }
    /**
     * How many panel observations `campaign.read_rate` was measured over. A rate over thirty observations and one over a hundred and forty are not equally worth showing, and this is what separates them. Null on every signal other than `read_rate_standout`, and on a `read_rate_standout` campaign the panel published no denominator for.
     * 
     *
     * @return int|null
     */
    public function getReadRateObservations(): ?int
    {
        return $this->readRateObservations;
    }
    /**
     * How many panel observations `campaign.read_rate` was measured over. A rate over thirty observations and one over a hundred and forty are not equally worth showing, and this is what separates them. Null on every signal other than `read_rate_standout`, and on a `read_rate_standout` campaign the panel published no denominator for.
     *
     * @param int|null $readRateObservations
     *
     * @return self
     */
    public function setReadRateObservations(?int $readRateObservations): self
    {
        $this->initialized['readRateObservations'] = true;
        $this->readRateObservations = $readRateObservations;
        return $this;
    }
    /**
     * Share of this campaign filed as spam at the one provider named in `mailbox_provider`, as a value between 0 and 1. A different measurement from the campaign's overall `spam_rate`, and the one this signal is about. Null on every signal other than `landing_in_spam`, and on a `landing_in_spam` campaign whose provider counts the panel did not publish, so a spam entry can arrive without the rate behind it.
     * 
     *
     * @return float|null
     */
    public function getMailboxProviderSpamRate(): ?float
    {
        return $this->mailboxProviderSpamRate;
    }
    /**
     * Share of this campaign filed as spam at the one provider named in `mailbox_provider`, as a value between 0 and 1. A different measurement from the campaign's overall `spam_rate`, and the one this signal is about. Null on every signal other than `landing_in_spam`, and on a `landing_in_spam` campaign whose provider counts the panel did not publish, so a spam entry can arrive without the rate behind it.
     *
     * @param float|null $mailboxProviderSpamRate
     *
     * @return self
     */
    public function setMailboxProviderSpamRate(?float $mailboxProviderSpamRate): self
    {
        $this->initialized['mailboxProviderSpamRate'] = true;
        $this->mailboxProviderSpamRate = $mailboxProviderSpamRate;
        return $this;
    }
    /**
     * How many observations at that provider `mailbox_provider_spam_rate` was measured over. Null on the same terms.
     * 
     *
     * @return int|null
     */
    public function getMailboxProviderObservations(): ?int
    {
        return $this->mailboxProviderObservations;
    }
    /**
     * How many observations at that provider `mailbox_provider_spam_rate` was measured over. Null on the same terms.
     *
     * @param int|null $mailboxProviderObservations
     *
     * @return self
     */
    public function setMailboxProviderObservations(?int $mailboxProviderObservations): self
    {
        $this->initialized['mailboxProviderObservations'] = true;
        $this->mailboxProviderObservations = $mailboxProviderObservations;
        return $this;
    }
}
