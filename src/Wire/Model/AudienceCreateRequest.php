<?php

namespace MessageBird\Wire\Model;

class AudienceCreateRequest
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
     * Display name for the audience.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Longer description of who this audience is.
     *
     * @var string|null
     */
    protected $description;
    /**
     * How the audience's recipients are determined. `static` (the default) is an explicit member list you manage via the API. `dynamic` and `external` are preview values and currently unavailable; creating an audience with either returns a validation error.
     * 
     *
     * @var string|null
     */
    protected $type = 'static';
    /**
     * Display name for the audience.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Display name for the audience.
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
     * Longer description of who this audience is.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Longer description of who this audience is.
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
     * How the audience's recipients are determined. `static` (the default) is an explicit member list you manage via the API. `dynamic` and `external` are preview values and currently unavailable; creating an audience with either returns a validation error.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * How the audience's recipients are determined. `static` (the default) is an explicit member list you manage via the API. `dynamic` and `external` are preview values and currently unavailable; creating an audience with either returns a validation error.
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
}
