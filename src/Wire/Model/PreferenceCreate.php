<?php

namespace MessageBird\Wire\Model;

class PreferenceCreate extends \ArrayObject
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
     * Who the statement is about: an email address on the email channel, a phone number in E.164 format on SMS and WhatsApp.
     *
     * @var string|null
     */
    protected $handle;
    /**
     * The channel a preference statement applies to. A preference addresses one channel: the handle that identifies the person differs per channel, so opting out of one channel says nothing about the others. New channels can be added over time, so a value outside this list can be returned.
     *
     * @var string|null
     */
    protected $channel;
    /**
     * What the statement says: `granted` records consent to receive messages, `revoked` records an opt-out. There is no third state: a person who never stated anything simply has no preference on record.
     *
     * @var string|null
     */
    protected $status;
    /**
     * How much traffic the statement covers. Defaults to `non_transactional`, which keeps transactional messages such as receipts and verification codes flowing.
     *
     * @var string|null
     */
    protected $coverage = 'non_transactional';
    /**
     * Limit the statement to one sender instead of the whole channel. On SMS this is the originator; on WhatsApp it identifies the business account. Not supported on email, where preferences are always channel-wide.
     *
     * @var string|null
     */
    protected $senderScope;
    /**
     * Free-form note on where the statement came from: a form name, an import batch, a campaign. Stored verbatim and returned on the preference.
     *
     * @var string|null
     */
    protected $source;
    /**
     * When the person consented, on a `granted` statement. Required evidence when granting over a stored opt-out: the grant applies only if this is later than the opt-out it reverses. May not be in the future.
     *
     * @var \DateTime|null
     */
    protected $consentedAt;
    /**
     * Who the statement is about: an email address on the email channel, a phone number in E.164 format on SMS and WhatsApp.
     *
     * @return string|null
     */
    public function getHandle(): ?string
    {
        return $this->handle;
    }
    /**
     * Who the statement is about: an email address on the email channel, a phone number in E.164 format on SMS and WhatsApp.
     *
     * @param string|null $handle
     *
     * @return self
     */
    public function setHandle(?string $handle): self
    {
        $this->initialized['handle'] = true;
        $this->handle = $handle;
        return $this;
    }
    /**
     * The channel a preference statement applies to. A preference addresses one channel: the handle that identifies the person differs per channel, so opting out of one channel says nothing about the others. New channels can be added over time, so a value outside this list can be returned.
     *
     * @return string|null
     */
    public function getChannel(): ?string
    {
        return $this->channel;
    }
    /**
     * The channel a preference statement applies to. A preference addresses one channel: the handle that identifies the person differs per channel, so opting out of one channel says nothing about the others. New channels can be added over time, so a value outside this list can be returned.
     *
     * @param string|null $channel
     *
     * @return self
     */
    public function setChannel(?string $channel): self
    {
        $this->initialized['channel'] = true;
        $this->channel = $channel;
        return $this;
    }
    /**
     * What the statement says: `granted` records consent to receive messages, `revoked` records an opt-out. There is no third state: a person who never stated anything simply has no preference on record.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * What the statement says: `granted` records consent to receive messages, `revoked` records an opt-out. There is no third state: a person who never stated anything simply has no preference on record.
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * How much traffic the statement covers. Defaults to `non_transactional`, which keeps transactional messages such as receipts and verification codes flowing.
     *
     * @return string|null
     */
    public function getCoverage(): ?string
    {
        return $this->coverage;
    }
    /**
     * How much traffic the statement covers. Defaults to `non_transactional`, which keeps transactional messages such as receipts and verification codes flowing.
     *
     * @param string|null $coverage
     *
     * @return self
     */
    public function setCoverage(?string $coverage): self
    {
        $this->initialized['coverage'] = true;
        $this->coverage = $coverage;
        return $this;
    }
    /**
     * Limit the statement to one sender instead of the whole channel. On SMS this is the originator; on WhatsApp it identifies the business account. Not supported on email, where preferences are always channel-wide.
     *
     * @return string|null
     */
    public function getSenderScope(): ?string
    {
        return $this->senderScope;
    }
    /**
     * Limit the statement to one sender instead of the whole channel. On SMS this is the originator; on WhatsApp it identifies the business account. Not supported on email, where preferences are always channel-wide.
     *
     * @param string|null $senderScope
     *
     * @return self
     */
    public function setSenderScope(?string $senderScope): self
    {
        $this->initialized['senderScope'] = true;
        $this->senderScope = $senderScope;
        return $this;
    }
    /**
     * Free-form note on where the statement came from: a form name, an import batch, a campaign. Stored verbatim and returned on the preference.
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
    /**
     * Free-form note on where the statement came from: a form name, an import batch, a campaign. Stored verbatim and returned on the preference.
     *
     * @param string|null $source
     *
     * @return self
     */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;
        return $this;
    }
    /**
     * When the person consented, on a `granted` statement. Required evidence when granting over a stored opt-out: the grant applies only if this is later than the opt-out it reverses. May not be in the future.
     *
     * @return \DateTime|null
     */
    public function getConsentedAt(): ?\DateTime
    {
        return $this->consentedAt;
    }
    /**
     * When the person consented, on a `granted` statement. Required evidence when granting over a stored opt-out: the grant applies only if this is later than the opt-out it reverses. May not be in the future.
     *
     * @param \DateTime|null $consentedAt
     *
     * @return self
     */
    public function setConsentedAt(?\DateTime $consentedAt): self
    {
        $this->initialized['consentedAt'] = true;
        $this->consentedAt = $consentedAt;
        return $this;
    }
}
