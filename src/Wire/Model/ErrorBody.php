<?php

namespace MessageBird\Wire\Model;

class ErrorBody
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
     * Broad category for coarse client branching.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Opaque, stable, unique error identifier. Never reused.
     *
     * @var string|null
     */
    protected $code;
    /**
     * Human-readable slug for log readability. Paired with code, never replaces it.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Human-readable description. Not stable; clients must not parse it.
     *
     * @var string|null
     */
    protected $message;
    /**
     * Identifies the offending field. Omitted when not applicable.
     *
     * @var string|null
     */
    protected $param;
    /**
     * Stable link to the docs page for this error code.
     *
     * @var string|null
     */
    protected $docUrl;
    /**
     * Request correlation ID. Also returned as the X-Request-Id response header.
     *
     * @var string|null
     */
    protected $requestId;
    /**
     * Verbatim error code returned by a downstream system (for example, an SMTP response code from a recipient's mail server, or a payment-provider decline code). Present only when Bird is surfacing a code from an external system that the caller may want to act on directly.
     * 
     *
     * @var string|null
     */
    protected $vendorCode;
    /**
     * Per-field validation errors. Present only on validation_error responses.
     *
     * @var list<ErrorDetail>|null
     */
    protected $details;
    /**
     * A human-readable next step to resolve this error. Present when a recovery is known.
     *
     * @var string|null
     */
    protected $remediation;
    /**
     * The steps that resolve this error. Perform them in order, re-reading after each; a `wait` or `terminal` step is always last. Present for errors with a well-defined recovery, such as unmet preconditions and conflicts.
     * 
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * The verification requirements blocking this action, each with the flow that resolves it. Present only when an action is blocked pending verification.
     *
     * @var list<UnmetGate>|null
     */
    protected $unmetGates;
    /**
     * Broad category for coarse client branching.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Broad category for coarse client branching.
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
     * Opaque, stable, unique error identifier. Never reused.
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
     * Opaque, stable, unique error identifier. Never reused.
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
     * Human-readable slug for log readability. Paired with code, never replaces it.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Human-readable slug for log readability. Paired with code, never replaces it.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Human-readable description. Not stable; clients must not parse it.
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    /**
     * Human-readable description. Not stable; clients must not parse it.
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
     * Identifies the offending field. Omitted when not applicable.
     *
     * @return string|null
     */
    public function getParam(): ?string
    {
        return $this->param;
    }
    /**
     * Identifies the offending field. Omitted when not applicable.
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
     * Stable link to the docs page for this error code.
     *
     * @return string|null
     */
    public function getDocUrl(): ?string
    {
        return $this->docUrl;
    }
    /**
     * Stable link to the docs page for this error code.
     *
     * @param string|null $docUrl
     *
     * @return self
     */
    public function setDocUrl(?string $docUrl): self
    {
        $this->initialized['docUrl'] = true;
        $this->docUrl = $docUrl;
        return $this;
    }
    /**
     * Request correlation ID. Also returned as the X-Request-Id response header.
     *
     * @return string|null
     */
    public function getRequestId(): ?string
    {
        return $this->requestId;
    }
    /**
     * Request correlation ID. Also returned as the X-Request-Id response header.
     *
     * @param string|null $requestId
     *
     * @return self
     */
    public function setRequestId(?string $requestId): self
    {
        $this->initialized['requestId'] = true;
        $this->requestId = $requestId;
        return $this;
    }
    /**
     * Verbatim error code returned by a downstream system (for example, an SMTP response code from a recipient's mail server, or a payment-provider decline code). Present only when Bird is surfacing a code from an external system that the caller may want to act on directly.
     * 
     *
     * @return string|null
     */
    public function getVendorCode(): ?string
    {
        return $this->vendorCode;
    }
    /**
     * Verbatim error code returned by a downstream system (for example, an SMTP response code from a recipient's mail server, or a payment-provider decline code). Present only when Bird is surfacing a code from an external system that the caller may want to act on directly.
     *
     * @param string|null $vendorCode
     *
     * @return self
     */
    public function setVendorCode(?string $vendorCode): self
    {
        $this->initialized['vendorCode'] = true;
        $this->vendorCode = $vendorCode;
        return $this;
    }
    /**
     * Per-field validation errors. Present only on validation_error responses.
     *
     * @return list<ErrorDetail>|null
     */
    public function getDetails(): ?array
    {
        return $this->details;
    }
    /**
     * Per-field validation errors. Present only on validation_error responses.
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
    /**
     * A human-readable next step to resolve this error. Present when a recovery is known.
     *
     * @return string|null
     */
    public function getRemediation(): ?string
    {
        return $this->remediation;
    }
    /**
     * A human-readable next step to resolve this error. Present when a recovery is known.
     *
     * @param string|null $remediation
     *
     * @return self
     */
    public function setRemediation(?string $remediation): self
    {
        $this->initialized['remediation'] = true;
        $this->remediation = $remediation;
        return $this;
    }
    /**
     * The steps that resolve this error. Perform them in order, re-reading after each; a `wait` or `terminal` step is always last. Present for errors with a well-defined recovery, such as unmet preconditions and conflicts.
     * 
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
     * The steps that resolve this error. Perform them in order, re-reading after each; a `wait` or `terminal` step is always last. Present for errors with a well-defined recovery, such as unmet preconditions and conflicts.
     *
     * @param list<NextAction>|null $next
     *
     * @return self
     */
    public function setNext(?array $next): self
    {
        $this->initialized['next'] = true;
        $this->next = $next;
        return $this;
    }
    /**
     * The verification requirements blocking this action, each with the flow that resolves it. Present only when an action is blocked pending verification.
     *
     * @return list<UnmetGate>|null
     */
    public function getUnmetGates(): ?array
    {
        return $this->unmetGates;
    }
    /**
     * The verification requirements blocking this action, each with the flow that resolves it. Present only when an action is blocked pending verification.
     *
     * @param list<UnmetGate>|null $unmetGates
     *
     * @return self
     */
    public function setUnmetGates(?array $unmetGates): self
    {
        $this->initialized['unmetGates'] = true;
        $this->unmetGates = $unmetGates;
        return $this;
    }
}
