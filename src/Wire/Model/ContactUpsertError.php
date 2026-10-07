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
     * Specific error code for this entry, from the same catalog as the top-level error `code`. `E04058` means the entry matched two contacts and requires review. `E04055` means the phone number belongs to another contact and you must retry with different data. Both are `conflict_error` errors; the code distinguishes them.
     *
     * @var string|null
     */
    protected $code;
    /**
     * Human-readable explanation of why this entry failed.
     *
     * @var string|null
     */
    protected $message;
    /**
     * The field in this entry that caused the failure, such as `data` or `email`. Omitted when the failure names no field.
     *
     * @var string|null
     */
    protected $param;
    /**
     * Per-field problems with this entry, in the same shape as the top-level error `details`. A contact property failure names the property as `data.<key>`, such as `data.plan`. Omitted when the failure has no per-field problems.
     *
     * @var list<ErrorDetail>|null
     */
    protected $details;
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
     * Specific error code for this entry, from the same catalog as the top-level error `code`. `E04058` means the entry matched two contacts and requires review. `E04055` means the phone number belongs to another contact and you must retry with different data. Both are `conflict_error` errors; the code distinguishes them.
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
     * Specific error code for this entry, from the same catalog as the top-level error `code`. `E04058` means the entry matched two contacts and requires review. `E04055` means the phone number belongs to another contact and you must retry with different data. Both are `conflict_error` errors; the code distinguishes them.
     *
     * @param string|null $code
     *
     * @return self
     */
    public function setCode(?string $code): self
    {
        $this->initialized['code'] = true;
        $this->code = $code;
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
    /**
     * The field in this entry that caused the failure, such as `data` or `email`. Omitted when the failure names no field.
     *
     * @return string|null
     */
    public function getParam(): ?string
    {
        return $this->param;
    }
    /**
     * The field in this entry that caused the failure, such as `data` or `email`. Omitted when the failure names no field.
     *
     * @param string|null $param
     *
     * @return self
     */
    public function setParam(?string $param): self
    {
        $this->initialized['param'] = true;
        $this->param = $param;
        return $this;
    }
    /**
     * Per-field problems with this entry, in the same shape as the top-level error `details`. A contact property failure names the property as `data.<key>`, such as `data.plan`. Omitted when the failure has no per-field problems.
     *
     * @return list<ErrorDetail>|null
     */
    public function getDetails(): ?array
    {
        return $this->details;
    }
    /**
     * Per-field problems with this entry, in the same shape as the top-level error `details`. A contact property failure names the property as `data.<key>`, such as `data.plan`. Omitted when the failure has no per-field problems.
     *
     * @param list<ErrorDetail>|null $details
     *
     * @return self
     */
    public function setDetails(?array $details): self
    {
        $this->initialized['details'] = true;
        $this->details = $details;
        return $this;
    }
}
