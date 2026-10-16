<?php

namespace MessageBird\Wire\Model;

/**
 * A `bird.` variable the published content uses, which Bird fills in for each recipient. The broadcast does not supply it, and no contact value is returned.
 */
class EmailTemplateVariable
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
     * The variable as the template writes it, such as `bird.contact.first_name`.
     *
     * @var string|null
     */
    protected $path;
    /**
     * Where Bird takes the value of a `bird.` variable from.
     * 
     * - `contact`: a property of the recipient contact, read from `bird.contact.`.
     * - `bird`: another value Bird fills in when it sends, such as `bird.unsubscribe_url`.
     * 
     *
     * @var string|null
     */
    protected $source;
    /**
     * The type of the contact property, from this workspace's current contact property definitions, such as `string`. Absent when the variable is not a defined contact property.
     *
     * @var string|null
     */
    protected $sourceType;
    /**
     * Each place the content uses the variable.
     *
     * @var list<EmailTemplateUseConstraint>|null
     */
    protected $useConstraints;
    /**
     * The variable as the template writes it, such as `bird.contact.first_name`.
     *
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }
    /**
     * The variable as the template writes it, such as `bird.contact.first_name`.
     *
     * @param string|null $path
     *
     * @return self
     */
    public function setPath(?string $path): self
    {
        $this->initialized['path'] = true;
        $this->path = $path;
        return $this;
    }
    /**
     * Where Bird takes the value of a `bird.` variable from.
     * 
     * - `contact`: a property of the recipient contact, read from `bird.contact.`.
     * - `bird`: another value Bird fills in when it sends, such as `bird.unsubscribe_url`.
     * 
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
    /**
    * Where Bird takes the value of a `bird.` variable from.
    
    - `contact`: a property of the recipient contact, read from `bird.contact.`.
    - `bird`: another value Bird fills in when it sends, such as `bird.unsubscribe_url`.
    
    *
    * @param string|null $source
    *
    * @return self
    */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;
        return $this;
    }
    /**
     * The type of the contact property, from this workspace's current contact property definitions, such as `string`. Absent when the variable is not a defined contact property.
     *
     * @return string|null
     */
    public function getSourceType(): ?string
    {
        return $this->sourceType;
    }
    /**
     * The type of the contact property, from this workspace's current contact property definitions, such as `string`. Absent when the variable is not a defined contact property.
     *
     * @param string|null $sourceType
     *
     * @return self
     */
    public function setSourceType(?string $sourceType): self
    {
        $this->initialized['sourceType'] = true;
        $this->sourceType = $sourceType;
        return $this;
    }
    /**
     * Each place the content uses the variable.
     *
     * @return list<EmailTemplateUseConstraint>|null
     */
    public function getUseConstraints(): ?array
    {
        return $this->useConstraints;
    }
    /**
     * Each place the content uses the variable.
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
