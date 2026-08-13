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
     * The variable's name, the key you use for it in `parameters` when you send.
     *
     * @var string|null
     */
    protected $key;
    /**
     * The value type this variable accepts. We can add new types to this list over time, so treat a value you do not recognize as a new type rather than as an error. SMS templates use the typed values, such as `code` and `amount`. Email templates only use `text`.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * Whether a value has to be supplied when sending. A send that leaves a required variable unset is rejected.
     * 
     *
     * @var bool|null
     */
    protected $required;
    /**
     * A plain-language description of what values this variable accepts.
     *
     * @var string|null
     */
    protected $constraint;
    /**
     * Whether this variable's value gets redacted before it is stored. When it does, the rendered value never appears in message content you read back through the API: a placeholder is stored in its place instead.
     * 
     *
     * @var bool|null
     */
    protected $sensitive = false;
    /**
     * The variable's name, the key you use for it in `parameters` when you send.
     *
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }
    /**
     * The variable's name, the key you use for it in `parameters` when you send.
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
     * The value type this variable accepts. We can add new types to this list over time, so treat a value you do not recognize as a new type rather than as an error. SMS templates use the typed values, such as `code` and `amount`. Email templates only use `text`.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The value type this variable accepts. We can add new types to this list over time, so treat a value you do not recognize as a new type rather than as an error. SMS templates use the typed values, such as `code` and `amount`. Email templates only use `text`.
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
     * Whether a value has to be supplied when sending. A send that leaves a required variable unset is rejected.
     * 
     *
     * @return bool|null
     */
    public function getRequired(): ?bool
    {
        return $this->required;
    }
    /**
     * Whether a value has to be supplied when sending. A send that leaves a required variable unset is rejected.
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
     * A plain-language description of what values this variable accepts.
     *
     * @return string|null
     */
    public function getConstraint(): ?string
    {
        return $this->constraint;
    }
    /**
     * A plain-language description of what values this variable accepts.
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
     * Whether this variable's value gets redacted before it is stored. When it does, the rendered value never appears in message content you read back through the API: a placeholder is stored in its place instead.
     * 
     *
     * @return bool|null
     */
    public function getSensitive(): ?bool
    {
        return $this->sensitive;
    }
    /**
     * Whether this variable's value gets redacted before it is stored. When it does, the rendered value never appears in message content you read back through the API: a placeholder is stored in its place instead.
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
