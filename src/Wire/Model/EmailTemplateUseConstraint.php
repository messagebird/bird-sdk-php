<?php

namespace MessageBird\Wire\Model;

/**
 * One place in the published content that uses a parameter or variable, and how it is used there.
 */
class EmailTemplateUseConstraint
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
     * How the template uses a parameter or variable at one place in its content.
     * 
     * - `value`: the template outputs or compares the value.
     * - `iterable`: the template loops over the value.
     * 
     *
     * @var string|null
     */
    protected $kind;
    /**
     * The part of the published content where a parameter or variable is used.
     * 
     * - `subject`: the subject line.
     * - `html`: the HTML body, including its inbox preview text.
     * - `text`: the plain-text body.
     * 
     *
     * @var string|null
     */
    protected $site;
    /**
     * The parameter or variable path the template reads at this place, such as `offer` or `bird.contact.first_name`.
     *
     * @var string|null
     */
    protected $path;
    /**
     * How the template uses the parameter or variable here, passed through from the template. `output` means it writes the value; other values name the Liquid tag that reads it, such as `if`, `case`, `for` or `assign`.
     *
     * @var string|null
     */
    protected $operation;
    /**
     * How the template uses a parameter or variable at one place in its content.
     * 
     * - `value`: the template outputs or compares the value.
     * - `iterable`: the template loops over the value.
     * 
     *
     * @return string|null
     */
    public function getKind(): ?string
    {
        return $this->kind;
    }
    /**
    * How the template uses a parameter or variable at one place in its content.
    
    - `value`: the template outputs or compares the value.
    - `iterable`: the template loops over the value.
    
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
     * The part of the published content where a parameter or variable is used.
     * 
     * - `subject`: the subject line.
     * - `html`: the HTML body, including its inbox preview text.
     * - `text`: the plain-text body.
     * 
     *
     * @return string|null
     */
    public function getSite(): ?string
    {
        return $this->site;
    }
    /**
    * The part of the published content where a parameter or variable is used.
    
    - `subject`: the subject line.
    - `html`: the HTML body, including its inbox preview text.
    - `text`: the plain-text body.
    
    *
    * @param string|null $site
    *
    * @return self
    */
    public function setSite(?string $site): self
    {
        $this->initialized['site'] = true;
        $this->site = $site;
        return $this;
    }
    /**
     * The parameter or variable path the template reads at this place, such as `offer` or `bird.contact.first_name`.
     *
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }
    /**
     * The parameter or variable path the template reads at this place, such as `offer` or `bird.contact.first_name`.
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
     * How the template uses the parameter or variable here, passed through from the template. `output` means it writes the value; other values name the Liquid tag that reads it, such as `if`, `case`, `for` or `assign`.
     *
     * @return string|null
     */
    public function getOperation(): ?string
    {
        return $this->operation;
    }
    /**
     * How the template uses the parameter or variable here, passed through from the template. `output` means it writes the value; other values name the Liquid tag that reads it, such as `if`, `case`, `for` or `assign`.
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
}
