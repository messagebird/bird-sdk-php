<?php

namespace MessageBird\Wire\Model;

class ContactPropertyUpdateRequest
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
     * Default used when a contact has no value for this property and the template does not supply an inline fallback. A string, number, boolean, or RFC 3339 datetime matching the declared type (strings up to `500` characters); a value of another type returns a validation error. Set to `null` to remove the fallback.
     *
     * @var mixed|null
     */
    protected $fallbackValue;
    /**
     * Default used when a contact has no value for this property and the template does not supply an inline fallback. A string, number, boolean, or RFC 3339 datetime matching the declared type (strings up to `500` characters); a value of another type returns a validation error. Set to `null` to remove the fallback.
     *
     * @return mixed
     */
    public function getFallbackValue()
    {
        return $this->fallbackValue;
    }
    /**
     * Default used when a contact has no value for this property and the template does not supply an inline fallback. A string, number, boolean, or RFC 3339 datetime matching the declared type (strings up to `500` characters); a value of another type returns a validation error. Set to `null` to remove the fallback.
     *
     * @param mixed $fallbackValue
     *
     * @return self
     */
    public function setFallbackValue($fallbackValue): self
    {
        $this->initialized['fallbackValue'] = true;
        $this->fallbackValue = $fallbackValue;
        return $this;
    }
}
