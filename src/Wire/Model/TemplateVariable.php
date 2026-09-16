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
     * The key this slot is filled by. On email and SMS it is the key you set in the send's `parameters` object. On WhatsApp it is the `name` you repeat on the matching parameter inside `components`, or, for a template whose placeholders are positional, the position itself as `1`, `2` and so on.
     * 
     *
     * @var string|null
     */
    protected $key;
    /**
     * The value type this slot accepts. Built-in SMS templates use typed slots (`code`, `amount` and the rest), each of which rejects a value that does not match its `constraint`. Email, WhatsApp and workspace SMS templates use `text`. Workspace SMS parameters must be scalar values. Open enum: treat an unrecognized value as a future type rather than an error.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * Whether the send must supply this variable. Omitting a required value returns `422` on email, SMS, and WhatsApp sends.
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
     * Whether this slot's value is redacted from stored message content. A placeholder replaces the sensitive value in message history; transport queues can still carry the text needed for delivery.
     * 
     *
     * @var bool|null
     */
    protected $sensitive = false;
    /**
     * The key this slot is filled by. On email and SMS it is the key you set in the send's `parameters` object. On WhatsApp it is the `name` you repeat on the matching parameter inside `components`, or, for a template whose placeholders are positional, the position itself as `1`, `2` and so on.
     * 
     *
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }
    /**
     * The key this slot is filled by. On email and SMS it is the key you set in the send's `parameters` object. On WhatsApp it is the `name` you repeat on the matching parameter inside `components`, or, for a template whose placeholders are positional, the position itself as `1`, `2` and so on.
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
     * The value type this slot accepts. Built-in SMS templates use typed slots (`code`, `amount` and the rest), each of which rejects a value that does not match its `constraint`. Email, WhatsApp and workspace SMS templates use `text`. Workspace SMS parameters must be scalar values. Open enum: treat an unrecognized value as a future type rather than an error.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The value type this slot accepts. Built-in SMS templates use typed slots (`code`, `amount` and the rest), each of which rejects a value that does not match its `constraint`. Email, WhatsApp and workspace SMS templates use `text`. Workspace SMS parameters must be scalar values. Open enum: treat an unrecognized value as a future type rather than an error.
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
     * Whether the send must supply this variable. Omitting a required value returns `422` on email, SMS, and WhatsApp sends.
     * 
     *
     * @return bool|null
     */
    public function getRequired(): ?bool
    {
        return $this->required;
    }
    /**
     * Whether the send must supply this variable. Omitting a required value returns `422` on email, SMS, and WhatsApp sends.
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
     * Whether this slot's value is redacted from stored message content. A placeholder replaces the sensitive value in message history; transport queues can still carry the text needed for delivery.
     * 
     *
     * @return bool|null
     */
    public function getSensitive(): ?bool
    {
        return $this->sensitive;
    }
    /**
     * Whether this slot's value is redacted from stored message content. A placeholder replaces the sensitive value in message history; transport queues can still carry the text needed for delivery.
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
