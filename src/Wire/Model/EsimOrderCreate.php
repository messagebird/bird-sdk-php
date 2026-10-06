<?php

namespace MessageBird\Wire\Model;

class EsimOrderCreate
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
     * Offer to purchase.
     *
     * @var string|null
     */
    protected $offerId;
    /**
     * Existing eSIM to add the package to. Omit to provision a new eSIM.
     *
     * @var string|null
     */
    protected $esimId;
    /**
     * Person to assign the new eSIM to when delivery completes. Must be a subscriber in this workspace. Omit to leave it unassigned. Supplying it with esim_id returns 422; top-ups retain the existing assignment. An unknown subscriber or one outside this workspace returns 404 before charging. Identification guidance does not gate purchase.
     *
     * @var string|null
     */
    protected $subscriberId;
    /**
     * The offer revision you are quoting from. When set and the offer has since moved to a newer revision, the order is refused with a conflict instead of charging a price you did not see. Omitted, the current revision is used.
     *
     * @var int|null
     */
    protected $offerRevision;
    /**
     * Buy the first package and enable automatic renewal in one purchase. Requires subscriber_id, offer_revision and Idempotency-Key. Omit esim_id and expected_price.
     * 
     *
     * @var EsimOrderRecurrence|null
     */
    protected $recurrence;
    /**
     * The price you displayed to the buyer. When set and the workspace's current resolved price differs, the order is refused with a conflict instead of charging a different amount. Catches billing-rate changes, which move independently of the offer revision.
     *
     * @var EsimOrderCreateExpectedPrice|null
     */
    protected $expectedPrice;
    /**
     * Free-text label for the new eSIM, for your own reference. Ignored when esim_id is set.
     *
     * @var string|null
     */
    protected $displayName;
    /**
     * Tags for the new eSIM, echoed on its lifecycle webhook events. Ignored when esim_id is set.
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Your own key-value data for the new eSIM, echoed on its lifecycle webhook events. Maximum 2 KB serialized. Ignored when esim_id is set.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * Set to true to accept a validity cut short by the eSIM's service period. Without it, an order whose package would expire early is refused with a conflict that states the effective validity.
     *
     * @var bool|null
     */
    protected $acknowledgeShortenedValidity;
    /**
     * Offer to purchase.
     *
     * @return string|null
     */
    public function getOfferId(): ?string
    {
        return $this->offerId;
    }
    /**
     * Offer to purchase.
     *
     * @param string|null $offerId
     *
     * @return self
     */
    public function setOfferId(?string $offerId): self
    {
        $this->initialized['offerId'] = true;
        $this->offerId = $offerId;
        return $this;
    }
    /**
     * Existing eSIM to add the package to. Omit to provision a new eSIM.
     *
     * @return string|null
     */
    public function getEsimId(): ?string
    {
        return $this->esimId;
    }
    /**
     * Existing eSIM to add the package to. Omit to provision a new eSIM.
     *
     * @param string|null $esimId
     *
     * @return self
     */
    public function setEsimId(?string $esimId): self
    {
        $this->initialized['esimId'] = true;
        $this->esimId = $esimId;
        return $this;
    }
    /**
     * Person to assign the new eSIM to when delivery completes. Must be a subscriber in this workspace. Omit to leave it unassigned. Supplying it with esim_id returns 422; top-ups retain the existing assignment. An unknown subscriber or one outside this workspace returns 404 before charging. Identification guidance does not gate purchase.
     *
     * @return string|null
     */
    public function getSubscriberId(): ?string
    {
        return $this->subscriberId;
    }
    /**
     * Person to assign the new eSIM to when delivery completes. Must be a subscriber in this workspace. Omit to leave it unassigned. Supplying it with esim_id returns 422; top-ups retain the existing assignment. An unknown subscriber or one outside this workspace returns 404 before charging. Identification guidance does not gate purchase.
     *
     * @param string|null $subscriberId
     *
     * @return self
     */
    public function setSubscriberId(?string $subscriberId): self
    {
        $this->initialized['subscriberId'] = true;
        $this->subscriberId = $subscriberId;
        return $this;
    }
    /**
     * The offer revision you are quoting from. When set and the offer has since moved to a newer revision, the order is refused with a conflict instead of charging a price you did not see. Omitted, the current revision is used.
     *
     * @return int|null
     */
    public function getOfferRevision(): ?int
    {
        return $this->offerRevision;
    }
    /**
     * The offer revision you are quoting from. When set and the offer has since moved to a newer revision, the order is refused with a conflict instead of charging a price you did not see. Omitted, the current revision is used.
     *
     * @param int|null $offerRevision
     *
     * @return self
     */
    public function setOfferRevision(?int $offerRevision): self
    {
        $this->initialized['offerRevision'] = true;
        $this->offerRevision = $offerRevision;
        return $this;
    }
    /**
     * Buy the first package and enable automatic renewal in one purchase. Requires subscriber_id, offer_revision and Idempotency-Key. Omit esim_id and expected_price.
     * 
     *
     * @return EsimOrderRecurrence|null
     */
    public function getRecurrence(): ?EsimOrderRecurrence
    {
        return $this->recurrence;
    }
    /**
     * Buy the first package and enable automatic renewal in one purchase. Requires subscriber_id, offer_revision and Idempotency-Key. Omit esim_id and expected_price.
     *
     * @param EsimOrderRecurrence|null $recurrence
     *
     * @return self
     */
    public function setRecurrence(?EsimOrderRecurrence $recurrence): self
    {
        $this->initialized['recurrence'] = true;
        $this->recurrence = $recurrence;
        return $this;
    }
    /**
     * The price you displayed to the buyer. When set and the workspace's current resolved price differs, the order is refused with a conflict instead of charging a different amount. Catches billing-rate changes, which move independently of the offer revision.
     *
     * @return EsimOrderCreateExpectedPrice|null
     */
    public function getExpectedPrice(): ?EsimOrderCreateExpectedPrice
    {
        return $this->expectedPrice;
    }
    /**
     * The price you displayed to the buyer. When set and the workspace's current resolved price differs, the order is refused with a conflict instead of charging a different amount. Catches billing-rate changes, which move independently of the offer revision.
     *
     * @param EsimOrderCreateExpectedPrice|Money|array|null $expectedPrice
     *
     * @return self
     */
    public function setExpectedPrice($expectedPrice): self
    {
        $this->initialized['expectedPrice'] = true;
        $this->expectedPrice = \MessageBird\Core\ModelWrapper::normalize($expectedPrice, EsimOrderCreateExpectedPrice::class);
        return $this;
    }
    /**
     * Free-text label for the new eSIM, for your own reference. Ignored when esim_id is set.
     *
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * Free-text label for the new eSIM, for your own reference. Ignored when esim_id is set.
     *
     * @param string|null $displayName
     *
     * @return self
     */
    public function setDisplayName(?string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * Tags for the new eSIM, echoed on its lifecycle webhook events. Ignored when esim_id is set.
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Tags for the new eSIM, echoed on its lifecycle webhook events. Ignored when esim_id is set.
     *
     * @param list<Tag>|null $tags
     *
     * @return self
     */
    public function setTags(?array $tags): self
    {
        $this->initialized['tags'] = true;
        $this->tags = $tags;
        return $this;
    }
    /**
     * Your own key-value data for the new eSIM, echoed on its lifecycle webhook events. Maximum 2 KB serialized. Ignored when esim_id is set.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Your own key-value data for the new eSIM, echoed on its lifecycle webhook events. Maximum 2 KB serialized. Ignored when esim_id is set.
     *
     * @param array<string, mixed>|null $metadata
     *
     * @return self
     */
    public function setMetadata(?iterable $metadata): self
    {
        $this->initialized['metadata'] = true;
        $this->metadata = $metadata;
        return $this;
    }
    /**
     * Set to true to accept a validity cut short by the eSIM's service period. Without it, an order whose package would expire early is refused with a conflict that states the effective validity.
     *
     * @return bool|null
     */
    public function getAcknowledgeShortenedValidity(): ?bool
    {
        return $this->acknowledgeShortenedValidity;
    }
    /**
     * Set to true to accept a validity cut short by the eSIM's service period. Without it, an order whose package would expire early is refused with a conflict that states the effective validity.
     *
     * @param bool|null $acknowledgeShortenedValidity
     *
     * @return self
     */
    public function setAcknowledgeShortenedValidity(?bool $acknowledgeShortenedValidity): self
    {
        $this->initialized['acknowledgeShortenedValidity'] = true;
        $this->acknowledgeShortenedValidity = $acknowledgeShortenedValidity;
        return $this;
    }
}
