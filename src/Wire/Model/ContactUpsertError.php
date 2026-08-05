<?php

namespace MessageBird\Wire\Model;

class ContactUpsertError
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
     * Machine-readable error category for this entry, such as `validation_error` or `conflict_error`, in the same vocabulary as the top-level error `type`. New categories may be added over time, so treat unrecognized values as a generic failure.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Human-readable explanation of why this entry failed.
     *
     * @var string|null
     */
    protected $message;
    /**
     * Machine-readable error category for this entry, such as `validation_error` or `conflict_error`, in the same vocabulary as the top-level error `type`. New categories may be added over time, so treat unrecognized values as a generic failure.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Machine-readable error category for this entry, such as `validation_error` or `conflict_error`, in the same vocabulary as the top-level error `type`. New categories may be added over time, so treat unrecognized values as a generic failure.
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
     * Human-readable explanation of why this entry failed.
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    /**
     * Human-readable explanation of why this entry failed.
     *
     * @param string|null $message
     *
     * @return self
     */
    public function setMessage(?string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
}
