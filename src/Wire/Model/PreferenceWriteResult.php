<?php

namespace MessageBird\Wire\Model;

/**
 * The outcome of one preference write or delete. `applied: true` means the request took effect, including an identical repeat. `applied: false` means it was refused because a newer statement or protected complaint survives; `preference` carries the statement that survived, and `transition_id` identifies the operation on the key's record.
 */
class PreferenceWriteResult
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
     * Whether the request took effect. False when causal ordering or protected complaint rules refuse the request; the surviving statement is returned in `preference`. A grant returns false when a newer opt-out or deletion survives, even if its consent history is retained.
     *
     * @var bool|null
     */
    protected $applied;
    /**
     * Identifies this write on the key's record, for applied and refused requests alike. Null when the write was a repeat of the current statement and recorded nothing new.
     *
     * @var string|null
     */
    protected $transitionId;
    /**
     * The key's surviving statement. Null after an applied delete, when the key is back to having no record. It is also null after a refused grant when a later deletion remains in force.
     *
     * @var mixed|null
     */
    protected $preference;
    /**
     * Whether the request took effect. False when causal ordering or protected complaint rules refuse the request; the surviving statement is returned in `preference`. A grant returns false when a newer opt-out or deletion survives, even if its consent history is retained.
     *
     * @return bool|null
     */
    public function getApplied(): ?bool
    {
        return $this->applied;
    }
    /**
     * Whether the request took effect. False when causal ordering or protected complaint rules refuse the request; the surviving statement is returned in `preference`. A grant returns false when a newer opt-out or deletion survives, even if its consent history is retained.
     *
     * @param bool|null $applied
     *
     * @return self
     */
    public function setApplied(?bool $applied): self
    {
        $this->initialized['applied'] = true;
        $this->applied = $applied;
        return $this;
    }
    /**
     * Identifies this write on the key's record, for applied and refused requests alike. Null when the write was a repeat of the current statement and recorded nothing new.
     *
     * @return string|null
     */
    public function getTransitionId(): ?string
    {
        return $this->transitionId;
    }
    /**
     * Identifies this write on the key's record, for applied and refused requests alike. Null when the write was a repeat of the current statement and recorded nothing new.
     *
     * @param string|null $transitionId
     *
     * @return self
     */
    public function setTransitionId(?string $transitionId): self
    {
        $this->initialized['transitionId'] = true;
        $this->transitionId = $transitionId;
        return $this;
    }
    /**
     * The key's surviving statement. Null after an applied delete, when the key is back to having no record. It is also null after a refused grant when a later deletion remains in force.
     *
     * @return mixed
     */
    public function getPreference()
    {
        return $this->preference;
    }
    /**
     * The key's surviving statement. Null after an applied delete, when the key is back to having no record. It is also null after a refused grant when a later deletion remains in force.
     *
     * @param mixed $preference
     *
     * @return self
     */
    public function setPreference($preference): self
    {
        $this->initialized['preference'] = true;
        $this->preference = $preference;
        return $this;
    }
}
