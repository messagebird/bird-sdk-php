<?php

namespace MessageBird\Wire\Model;

/**
 * A parameter the published content uses that the broadcast supplies in `template.parameters`, with what the template declares about it.
 */
class EmailTemplateParameter
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
     * The parameter name to use as a key in `template.parameters`.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The value type the template declares for a parameter. A broadcast can still supply any scalar value; see `value_domain`.
     * 
     * - `text`: any value. A parameter the template uses without declaring it is reported as a required `text` parameter.
     * - `code`: 4 to 8 digits.
     * - `ttl`: a whole number from 1 to 999.
     * - `count`: a whole number from 1 to 999.
     * - `ref`: up to 16 uppercase letters, digits or hyphens.
     * - `date`: an ISO 8601 date (YYYY-MM-DD). A date and time is also accepted and shows as its date.
     * - `date_time`: an ISO 8601 date and time, with an optional offset.
     * - `amount`: a decimal amount in major units, with up to 4 decimal places.
     * - `currency`: a known ISO 4217 currency code of 3 uppercase letters.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * The shape of value a broadcast may supply for a parameter, independent of the declared `type`.
     * 
     * - `scalar`: a string, number, boolean or null, used as given.
     * 
     *
     * @var string|null
     */
    protected $valueDomain;
    /**
     * Whether the template declares the parameter required.
     *
     * @var bool|null
     */
    protected $required;
    /**
     * Whether the template marks the parameter sensitive. A broadcast cannot supply a sensitive parameter that its content uses.
     *
     * @var bool|null
     */
    protected $sensitive;
    /**
     * Each place the content uses the parameter.
     *
     * @var list<EmailTemplateUseConstraint>|null
     */
    protected $useConstraints;
    /**
     * The parameter name to use as a key in `template.parameters`.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The parameter name to use as a key in `template.parameters`.
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
     * The value type the template declares for a parameter. A broadcast can still supply any scalar value; see `value_domain`.
     * 
     * - `text`: any value. A parameter the template uses without declaring it is reported as a required `text` parameter.
     * - `code`: 4 to 8 digits.
     * - `ttl`: a whole number from 1 to 999.
     * - `count`: a whole number from 1 to 999.
     * - `ref`: up to 16 uppercase letters, digits or hyphens.
     * - `date`: an ISO 8601 date (YYYY-MM-DD). A date and time is also accepted and shows as its date.
     * - `date_time`: an ISO 8601 date and time, with an optional offset.
     * - `amount`: a decimal amount in major units, with up to 4 decimal places.
     * - `currency`: a known ISO 4217 currency code of 3 uppercase letters.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
    * The value type the template declares for a parameter. A broadcast can still supply any scalar value; see `value_domain`.
    
    - `text`: any value. A parameter the template uses without declaring it is reported as a required `text` parameter.
    - `code`: 4 to 8 digits.
    - `ttl`: a whole number from 1 to 999.
    - `count`: a whole number from 1 to 999.
    - `ref`: up to 16 uppercase letters, digits or hyphens.
    - `date`: an ISO 8601 date (YYYY-MM-DD). A date and time is also accepted and shows as its date.
    - `date_time`: an ISO 8601 date and time, with an optional offset.
    - `amount`: a decimal amount in major units, with up to 4 decimal places.
    - `currency`: a known ISO 4217 currency code of 3 uppercase letters.
    
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
     * The shape of value a broadcast may supply for a parameter, independent of the declared `type`.
     * 
     * - `scalar`: a string, number, boolean or null, used as given.
     * 
     *
     * @return string|null
     */
    public function getValueDomain(): ?string
    {
        return $this->valueDomain;
    }
    /**
    * The shape of value a broadcast may supply for a parameter, independent of the declared `type`.
    
    - `scalar`: a string, number, boolean or null, used as given.
    
    *
    * @param string|null $valueDomain
    *
    * @return self
    */
    public function setValueDomain(?string $valueDomain): self
    {
        $this->initialized['valueDomain'] = true;
        $this->valueDomain = $valueDomain;
        return $this;
    }
    /**
     * Whether the template declares the parameter required.
     *
     * @return bool|null
     */
    public function getRequired(): ?bool
    {
        return $this->required;
    }
    /**
     * Whether the template declares the parameter required.
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
     * Whether the template marks the parameter sensitive. A broadcast cannot supply a sensitive parameter that its content uses.
     *
     * @return bool|null
     */
    public function getSensitive(): ?bool
    {
        return $this->sensitive;
    }
    /**
     * Whether the template marks the parameter sensitive. A broadcast cannot supply a sensitive parameter that its content uses.
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
    /**
     * Each place the content uses the parameter.
     *
     * @return list<EmailTemplateUseConstraint>|null
     */
    public function getUseConstraints(): ?array
    {
        return $this->useConstraints;
    }
    /**
     * Each place the content uses the parameter.
     *
     * @param list<EmailTemplateUseConstraint>|null $useConstraints
     *
     * @return self
     */
    public function setUseConstraints(?array $useConstraints): self
    {
        $this->initialized['useConstraints'] = true;
        $this->useConstraints = $useConstraints;
        return $this;
    }
}
