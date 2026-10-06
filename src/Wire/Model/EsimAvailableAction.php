<?php

namespace MessageBird\Wire\Model;

class EsimAvailableAction
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
     * @var string|null
     */
    protected $action;
    /**
     * Operation to call for this action. Consult that operation’s reference for its request and response.
     *
     * @var string|null
     */
    protected $operation;
    /**
     * Whether the action is available given your permissions and the current eSIM state. The action checks these again when submitted; a later request can be refused if conditions change.
     *
     * @var bool|null
     */
    protected $available;
    /**
     * Why the action is unavailable. Null while `available` is true.
     *
     * @var string|null
     */
    protected $reason;
    /**
     * Additional parameters required by the current state, such as `acknowledge_balance_forfeit` when releasing an eSIM with remaining data. Absent when no additional parameters apply or when permissions, network support, or profile state prevent the action.
     *
     * @var list<string>|null
     */
    protected $requires;
    /**
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }
    /**
     * @param string|null $action
     *
     * @return self
     */
    public function setAction(?string $action): self
    {
        $this->initialized['action'] = true;
        $this->action = $action;
        return $this;
    }
    /**
     * Operation to call for this action. Consult that operation’s reference for its request and response.
     *
     * @return string|null
     */
    public function getOperation(): ?string
    {
        return $this->operation;
    }
    /**
     * Operation to call for this action. Consult that operation’s reference for its request and response.
     *
     * @param string|null $operation
     *
     * @return self
     */
    public function setOperation(?string $operation): self
    {
        $this->initialized['operation'] = true;
        $this->operation = $operation;
        return $this;
    }
    /**
     * Whether the action is available given your permissions and the current eSIM state. The action checks these again when submitted; a later request can be refused if conditions change.
     *
     * @return bool|null
     */
    public function getAvailable(): ?bool
    {
        return $this->available;
    }
    /**
     * Whether the action is available given your permissions and the current eSIM state. The action checks these again when submitted; a later request can be refused if conditions change.
     *
     * @param bool|null $available
     *
     * @return self
     */
    public function setAvailable(?bool $available): self
    {
        $this->initialized['available'] = true;
        $this->available = $available;
        return $this;
    }
    /**
     * Why the action is unavailable. Null while `available` is true.
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
     * Why the action is unavailable. Null while `available` is true.
     *
     * @param string|null $reason
     *
     * @return self
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;
        return $this;
    }
    /**
     * Additional parameters required by the current state, such as `acknowledge_balance_forfeit` when releasing an eSIM with remaining data. Absent when no additional parameters apply or when permissions, network support, or profile state prevent the action.
     *
     * @return list<string>|null
     */
    public function getRequires(): ?array
    {
        return $this->requires;
    }
    /**
     * Additional parameters required by the current state, such as `acknowledge_balance_forfeit` when releasing an eSIM with remaining data. Absent when no additional parameters apply or when permissions, network support, or profile state prevent the action.
     *
     * @param list<string>|null $requires
     *
     * @return self
     */
    public function setRequires(?array $requires): self
    {
        $this->initialized['requires'] = true;
        $this->requires = $requires;
        return $this;
    }
}
