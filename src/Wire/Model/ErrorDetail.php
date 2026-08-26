<?php

namespace MessageBird\Wire\Model;

class ErrorDetail
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
     * Dotted field path, such as `to[0].email`, `subject`, or `.`. When the request was rejected for a query parameter the endpoint does not declare, this carries that parameter's name instead of a field path.
     * 
     *
     * @var string|null
     */
    protected $param;
    /**
     * What is wrong with this field.
     *
     * @var string|null
     */
    protected $message;
    /**
     * Dotted field path, such as `to[0].email`, `subject`, or `.`. When the request was rejected for a query parameter the endpoint does not declare, this carries that parameter's name instead of a field path.
     * 
     *
     * @return string|null
     */
    public function getParam(): ?string
    {
        return $this->param;
    }
    /**
     * Dotted field path, such as `to[0].email`, `subject`, or `.`. When the request was rejected for a query parameter the endpoint does not declare, this carries that parameter's name instead of a field path.
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
     * What is wrong with this field.
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    /**
     * What is wrong with this field.
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
