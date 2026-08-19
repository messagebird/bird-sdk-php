<?php

namespace MessageBird\Wire\Model;

class NextAction
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
     * What you do about this step.
     * 
     * - `operation`: call the operation named in `operation`, then
     *   read again.
     * - `external`: act somewhere this API does not reach, then read
     *   again.
     * - `wait`: nothing is asked of you, so read again later.
     * - `terminal`: nothing you do resolves this, so stop retrying.
     * 
     * Tolerate a value you do not recognize: show the `description` and
     * offer no action.
     * 
     *
     * @var string|null
     */
    protected $kind;
    /**
     * A short, human-readable label for the step, suitable for display.
     *
     * @var string|null
     */
    protected $description;
    /**
     * The operationId to call. Present only when `kind` is `operation`. The operation's own schema says how to call it; this says only which one, and what to address it with.
     * 
     *
     * @var string|null
     */
    protected $operation;
    /**
     * The parameters that address the operation, by name: `{"sender_id": "…"}` for an operation on `/v1/sms/senders/{sender_id}/requirements`. A parameter the operation takes in its query string is given the same way, so an operation addressed as `?subject_id=` carries `{"subject_id": "…"}`. Every parameter the call needs is here, whether its value came from the thing you were acting on or is fixed for this step, so you can make the call from this object alone. Present only when `kind` is `operation` and the operation names a subject. A request body, when the operation takes one, is described by the operation's own schema and never appears here.
     * 
     *
     * @var array<string, string>|null
     */
    protected $params;
    /**
     * A URL to open. Present only when `kind` is `external`, and only when the step has one. An external step whose `description` says to go and do something with no URL to open is normal.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * What you do about this step.
     * 
     * - `operation`: call the operation named in `operation`, then
     *   read again.
     * - `external`: act somewhere this API does not reach, then read
     *   again.
     * - `wait`: nothing is asked of you, so read again later.
     * - `terminal`: nothing you do resolves this, so stop retrying.
     * 
     * Tolerate a value you do not recognize: show the `description` and
     * offer no action.
     * 
     *
     * @return string|null
     */
    public function getKind(): ?string
    {
        return $this->kind;
    }
    /**
    * What you do about this step.
    
    - `operation`: call the operation named in `operation`, then
     read again.
    - `external`: act somewhere this API does not reach, then read
     again.
    - `wait`: nothing is asked of you, so read again later.
    - `terminal`: nothing you do resolves this, so stop retrying.
    
    Tolerate a value you do not recognize: show the `description` and
    offer no action.
    
    *
    * @param string|null $kind
    *
    * @return self
    */
    public function setKind(?string $kind): self
    {
        $this->initialized['kind'] = true;
        $this->kind = $kind;
        return $this;
    }
    /**
     * A short, human-readable label for the step, suitable for display.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * A short, human-readable label for the step, suitable for display.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * The operationId to call. Present only when `kind` is `operation`. The operation's own schema says how to call it; this says only which one, and what to address it with.
     * 
     *
     * @return string|null
     */
    public function getOperation(): ?string
    {
        return $this->operation;
    }
    /**
     * The operationId to call. Present only when `kind` is `operation`. The operation's own schema says how to call it; this says only which one, and what to address it with.
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
     * The parameters that address the operation, by name: `{"sender_id": "…"}` for an operation on `/v1/sms/senders/{sender_id}/requirements`. A parameter the operation takes in its query string is given the same way, so an operation addressed as `?subject_id=` carries `{"subject_id": "…"}`. Every parameter the call needs is here, whether its value came from the thing you were acting on or is fixed for this step, so you can make the call from this object alone. Present only when `kind` is `operation` and the operation names a subject. A request body, when the operation takes one, is described by the operation's own schema and never appears here.
     * 
     *
     * @return array<string, string>|null
     */
    public function getParams(): ?iterable
    {
        return $this->params;
    }
    /**
     * The parameters that address the operation, by name: `{"sender_id": "…"}` for an operation on `/v1/sms/senders/{sender_id}/requirements`. A parameter the operation takes in its query string is given the same way, so an operation addressed as `?subject_id=` carries `{"subject_id": "…"}`. Every parameter the call needs is here, whether its value came from the thing you were acting on or is fixed for this step, so you can make the call from this object alone. Present only when `kind` is `operation` and the operation names a subject. A request body, when the operation takes one, is described by the operation's own schema and never appears here.
     *
     * @param array<string, string>|null $params
     *
     * @return self
     */
    public function setParams(?iterable $params): self
    {
        $this->initialized['params'] = true;
        $this->params = $params;
        return $this;
    }
    /**
     * A URL to open. Present only when `kind` is `external`, and only when the step has one. An external step whose `description` says to go and do something with no URL to open is normal.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * A URL to open. Present only when `kind` is `external`, and only when the step has one. An external step whose `description` says to go and do something with no URL to open is normal.
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
}
