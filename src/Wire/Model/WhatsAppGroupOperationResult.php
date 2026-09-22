<?php

namespace MessageBird\Wire\Model;

class WhatsAppGroupOperationResult
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
     * The setting this result reports on.
     *
     * @var string|null
     */
    protected $field;
    /**
     * Whether WhatsApp applied this field. False when it refused this one, whatever it did with the others.
     *
     * @var bool|null
     */
    protected $applied;
    /**
     * Why a change to a group did not take effect. Meta documents no code vocabulary for a group refusal, since every sample payload carries an undocumented `code` beside its message, so this relays what it said rather than classifying it, the way a template submission failure does.
     * 
     *
     * @var WhatsAppGroupError|null
     */
    protected $error;
    /**
     * The setting this result reports on.
     *
     * @return string|null
     */
    public function getField(): ?string
    {
        return $this->field;
    }
    /**
     * The setting this result reports on.
     *
     * @param string|null $field
     *
     * @return self
     */
    public function setField(?string $field): self
    {
        $this->initialized['field'] = true;
        $this->field = $field;
        return $this;
    }
    /**
     * Whether WhatsApp applied this field. False when it refused this one, whatever it did with the others.
     *
     * @return bool|null
     */
    public function getApplied(): ?bool
    {
        return $this->applied;
    }
    /**
     * Whether WhatsApp applied this field. False when it refused this one, whatever it did with the others.
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
     * Why a change to a group did not take effect. Meta documents no code vocabulary for a group refusal, since every sample payload carries an undocumented `code` beside its message, so this relays what it said rather than classifying it, the way a template submission failure does.
     * 
     *
     * @return WhatsAppGroupError|null
     */
    public function getError(): ?WhatsAppGroupError
    {
        return $this->error;
    }
    /**
     * Why a change to a group did not take effect. Meta documents no code vocabulary for a group refusal, since every sample payload carries an undocumented `code` beside its message, so this relays what it said rather than classifying it, the way a template submission failure does.
     *
     * @param WhatsAppGroupError|null $error
     *
     * @return self
     */
    public function setError(?WhatsAppGroupError $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;
        return $this;
    }
}
