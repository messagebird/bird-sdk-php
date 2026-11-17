<?php

namespace MessageBird\Wire\Model;

/**
 * Records one recipient's preference. For email, a granted statement with consented_at strictly later than a Brand complaint can clear that complaint. Bulk writes and imports cannot clear complaints. Other applicable opt-outs and delivery blocks still apply.
 */
class PreferenceIndividualCreate extends \ArrayObject
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
     * Who the statement is about: an email address on the email channel, a phone number in E.164 format on SMS, WhatsApp, and Apple Messages for Business.
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
     * How much traffic the statement covers. Defaults to `non_transactional`, which keeps transactional messages such as receipts and verification codes flowing. Apple Messages for Business phone invitations have no transactional exemption, so either value covers them.
     *
     * @var string|null
     */
    protected $coverage = 'non_transactional';
    /**
     * Limit the statement to one sender instead of the whole channel. On SMS this is the originator; on WhatsApp it identifies the business account; on Apple Messages for Business it is the Apple business ID used for invitations. Not supported on email, where preferences belong to the selected Brand.
     *
     * @var string|null
     */
    protected $senderScope;
    /**
     * Free-form note on where the statement came from: a form name, an import batch, a campaign. For a grant, it can describe how you collected consent. Stored verbatim and returned on the preference; Bird does not verify this note. It does not grant permission to clear a complaint.
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
     * Brand selection is in preview. Select the business for an email preference. Omitted or null selects the original business. Unsupported on other channels. An additional Brand supports non_transactional coverage only. Explicit selection returns 422 when unavailable. Existing opt-outs can be recorded for archived Brands; grants to archived Brands return 422. Consent grants for active additional Brands return 422 when unavailable. A Brand not found in this workspace returns 404.
     *
     * @var string|null
     */
    protected $brandId;
    /**
     * Who the statement is about: an email address on the email channel, a phone number in E.164 format on SMS, WhatsApp, and Apple Messages for Business.
     *
     * @return string|null
     */
    public function getHandle(): ?string
    {
        return $this->handle;
    }
    /**
     * Who the statement is about: an email address on the email channel, a phone number in E.164 format on SMS, WhatsApp, and Apple Messages for Business.
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
     * How much traffic the statement covers. Defaults to `non_transactional`, which keeps transactional messages such as receipts and verification codes flowing. Apple Messages for Business phone invitations have no transactional exemption, so either value covers them.
     *
     * @return string|null
     */
    public function getCoverage(): ?string
    {
        return $this->coverage;
    }
    /**
     * How much traffic the statement covers. Defaults to `non_transactional`, which keeps transactional messages such as receipts and verification codes flowing. Apple Messages for Business phone invitations have no transactional exemption, so either value covers them.
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
     * Limit the statement to one sender instead of the whole channel. On SMS this is the originator; on WhatsApp it identifies the business account; on Apple Messages for Business it is the Apple business ID used for invitations. Not supported on email, where preferences belong to the selected Brand.
     *
     * @return string|null
     */
    public function getSenderScope(): ?string
    {
        return $this->senderScope;
    }
    /**
     * Limit the statement to one sender instead of the whole channel. On SMS this is the originator; on WhatsApp it identifies the business account; on Apple Messages for Business it is the Apple business ID used for invitations. Not supported on email, where preferences belong to the selected Brand.
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
     * Free-form note on where the statement came from: a form name, an import batch, a campaign. For a grant, it can describe how you collected consent. Stored verbatim and returned on the preference; Bird does not verify this note. It does not grant permission to clear a complaint.
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
    /**
     * Free-form note on where the statement came from: a form name, an import batch, a campaign. For a grant, it can describe how you collected consent. Stored verbatim and returned on the preference; Bird does not verify this note. It does not grant permission to clear a complaint.
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
    /**
     * Brand selection is in preview. Select the business for an email preference. Omitted or null selects the original business. Unsupported on other channels. An additional Brand supports non_transactional coverage only. Explicit selection returns 422 when unavailable. Existing opt-outs can be recorded for archived Brands; grants to archived Brands return 422. Consent grants for active additional Brands return 422 when unavailable. A Brand not found in this workspace returns 404.
     *
     * @return string|null
     */
    public function getBrandId(): ?string
    {
        return $this->brandId;
    }
    /**
     * Brand selection is in preview. Select the business for an email preference. Omitted or null selects the original business. Unsupported on other channels. An additional Brand supports non_transactional coverage only. Explicit selection returns 422 when unavailable. Existing opt-outs can be recorded for archived Brands; grants to archived Brands return 422. Consent grants for active additional Brands return 422 when unavailable. A Brand not found in this workspace returns 404.
     *
     * @param string|null $brandId
     *
     * @return self
     */
    public function setBrandId(?string $brandId): self
    {
        $this->initialized['brandId'] = true;
        $this->brandId = $brandId;
        return $this;
    }
}
