<?php

namespace MessageBird\Wire\Model;

class WhatsAppGroupOperation
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
     * What was asked.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Where it got to. `pending` is what a client shows as in-progress, and what refuses the next change.
     *
     * @var string|null
     */
    protected $status;
    /**
     * When Bird accepted the request.
     *
     * @var \DateTime|null
     */
    protected $requestedAt;
    /**
     * When WhatsApp reported the outcome. Null while `pending`.
     *
     * @var \DateTime|null
     */
    protected $settledAt;
    /**
     * Per-field outcomes, on a `settings_update` that has settled. One entry per field the update carried, so a client can put a refusal next to the input it came from. Absent on every other operation type, which change one thing and report it on `status`.
     * 
     *
     * @var list<WhatsAppGroupOperationResult>|null
     */
    protected $results;
    /**
     * Why a change to a group did not take effect. Meta documents no code vocabulary for a group refusal, since every sample payload carries an undocumented `code` beside its message, so this relays what it said rather than classifying it, the way a template submission failure does.
     * 
     *
     * @var WhatsAppGroupError|null
     */
    protected $lastError;
    /**
     * What was asked.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * What was asked.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * Where it got to. `pending` is what a client shows as in-progress, and what refuses the next change.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Where it got to. `pending` is what a client shows as in-progress, and what refuses the next change.
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
     * When Bird accepted the request.
     *
     * @return \DateTime|null
     */
    public function getRequestedAt(): ?\DateTime
    {
        return $this->requestedAt;
    }
    /**
     * When Bird accepted the request.
     *
     * @param \DateTime|null $requestedAt
     *
     * @return self
     */
    public function setRequestedAt(?\DateTime $requestedAt): self
    {
        $this->initialized['requestedAt'] = true;
        $this->requestedAt = $requestedAt;
        return $this;
    }
    /**
     * When WhatsApp reported the outcome. Null while `pending`.
     *
     * @return \DateTime|null
     */
    public function getSettledAt(): ?\DateTime
    {
        return $this->settledAt;
    }
    /**
     * When WhatsApp reported the outcome. Null while `pending`.
     *
     * @param \DateTime|null $settledAt
     *
     * @return self
     */
    public function setSettledAt(?\DateTime $settledAt): self
    {
        $this->initialized['settledAt'] = true;
        $this->settledAt = $settledAt;
        return $this;
    }
    /**
     * Per-field outcomes, on a `settings_update` that has settled. One entry per field the update carried, so a client can put a refusal next to the input it came from. Absent on every other operation type, which change one thing and report it on `status`.
     * 
     *
     * @return list<WhatsAppGroupOperationResult>|null
     */
    public function getResults(): ?array
    {
        return $this->results;
    }
    /**
     * Per-field outcomes, on a `settings_update` that has settled. One entry per field the update carried, so a client can put a refusal next to the input it came from. Absent on every other operation type, which change one thing and report it on `status`.
     *
     * @param list<WhatsAppGroupOperationResult>|null $results
     *
     * @return self
     */
    public function setResults(?array $results): self
    {
        $this->initialized['results'] = true;
        $this->results = $results;
        return $this;
    }
    /**
     * Why a change to a group did not take effect. Meta documents no code vocabulary for a group refusal, since every sample payload carries an undocumented `code` beside its message, so this relays what it said rather than classifying it, the way a template submission failure does.
     * 
     *
     * @return WhatsAppGroupError|null
     */
    public function getLastError(): ?WhatsAppGroupError
    {
        return $this->lastError;
    }
    /**
     * Why a change to a group did not take effect. Meta documents no code vocabulary for a group refusal, since every sample payload carries an undocumented `code` beside its message, so this relays what it said rather than classifying it, the way a template submission failure does.
     *
     * @param WhatsAppGroupError|null $lastError
     *
     * @return self
     */
    public function setLastError(?WhatsAppGroupError $lastError): self
    {
        $this->initialized['lastError'] = true;
        $this->lastError = $lastError;
        return $this;
    }
}
