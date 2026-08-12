<?php

namespace MessageBird\Wire\Model;

class TemplateVariable
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
     * The parameter key this slot is filled with.
     *
     * @var string|null
     */
    protected $key;
    /**
     * The value type this slot accepts. Open enum — treat any unrecognized value as a future type rather than an error. SMS templates use the typed slots (`code`, `amount`, …); email templates use `text`.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * Whether the slot must be supplied when sending. A send that leaves a required slot unset is rejected.
     * 
     *
     * @var bool|null
     */
    protected $required;
    /**
     * A human-readable description of the accepted values.
     *
     * @var string|null
     */
    protected $constraint;
    /**
     * Whether this slot's value is redacted before it reaches storage. A sensitive slot's rendered value never appears in message content read back through the API: a stand-in placeholder is stored instead.
     * 
     *
     * @var bool|null
     */
    protected $sensitive = false;
    /**
     * The parameter key this slot is filled with.
     *
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }
    /**
     * The parameter key this slot is filled with.
     *
     * @param string|null $key
     *
     * @return self
     */
    public function setKey(?string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * The value type this slot accepts. Open enum — treat any unrecognized value as a future type rather than an error. SMS templates use the typed slots (`code`, `amount`, …); email templates use `text`.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The value type this slot accepts. Open enum — treat any unrecognized value as a future type rather than an error. SMS templates use the typed slots (`code`, `amount`, …); email templates use `text`.
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
     * Whether the slot must be supplied when sending. A send that leaves a required slot unset is rejected.
     * 
     *
     * @return bool|null
     */
    public function getRequired(): ?bool
    {
        return $this->required;
    }
    /**
     * Whether the slot must be supplied when sending. A send that leaves a required slot unset is rejected.
     *
     * @param bool|null $required
     *
     * @return self
     */
    public function setRequired(?bool $required): self
    {
        $this->initialized['required'] = true;
        $this->required = $required;
        return $this;
    }
    /**
     * A human-readable description of the accepted values.
     *
     * @return string|null
     */
    public function getConstraint(): ?string
    {
        return $this->constraint;
    }
    /**
     * A human-readable description of the accepted values.
     *
     * @param string|null $constraint
     *
     * @return self
     */
    public function setConstraint(?string $constraint): self
    {
        $this->initialized['constraint'] = true;
        $this->constraint = $constraint;
        return $this;
    }
    /**
     * Whether this slot's value is redacted before it reaches storage. A sensitive slot's rendered value never appears in message content read back through the API: a stand-in placeholder is stored instead.
     * 
     *
     * @return bool|null
     */
    public function getSensitive(): ?bool
    {
        return $this->sensitive;
    }
    /**
     * Whether this slot's value is redacted before it reaches storage. A sensitive slot's rendered value never appears in message content read back through the API: a stand-in placeholder is stored instead.
     *
     * @param bool|null $sensitive
     *
     * @return self
     */
    public function setSensitive(?bool $sensitive): self
    {
        $this->initialized['sensitive'] = true;
        $this->sensitive = $sensitive;
        return $this;
    }
}
