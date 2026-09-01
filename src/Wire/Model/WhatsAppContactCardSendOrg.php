<?php

namespace MessageBird\Wire\Model;

class WhatsAppContactCardSendOrg extends \ArrayObject
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
     * @var string|null
     */
    protected $company;
    /**
     * @var string|null
     */
    protected $department;
    /**
     * @var string|null
     */
    protected $title;
    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }
    /**
     * @param string|null $company
     *
     * @return self
     */
    public function setCompany(?string $company): self
    {
        $this->initialized['company'] = true;
        $this->company = $company;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getDepartment(): ?string
    {
        return $this->department;
    }
    /**
     * @param string|null $department
     *
     * @return self
     */
    public function setDepartment(?string $department): self
    {
        $this->initialized['department'] = true;
        $this->department = $department;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * @param string|null $title
     *
     * @return self
     */
    public function setTitle(?string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;
        return $this;
    }
}
