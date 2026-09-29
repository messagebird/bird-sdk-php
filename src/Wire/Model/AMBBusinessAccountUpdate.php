<?php

namespace MessageBird\Wire\Model;

class AMBBusinessAccountUpdate
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
     * The brand name shown for this business record inside Bird.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The Business ID Apple issued for this brand. Accepted only while the account has not yet been submitted and is connected. Updating it does not submit the business.
     *
     * @var string|null
     */
    protected $appleBusinessId;
    /**
     * The brand name shown for this business record inside Bird.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The brand name shown for this business record inside Bird.
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
     * The Business ID Apple issued for this brand. Accepted only while the account has not yet been submitted and is connected. Updating it does not submit the business.
     *
     * @return string|null
     */
    public function getAppleBusinessId(): ?string
    {
        return $this->appleBusinessId;
    }
    /**
     * The Business ID Apple issued for this brand. Accepted only while the account has not yet been submitted and is connected. Updating it does not submit the business.
     *
     * @param string|null $appleBusinessId
     *
     * @return self
     */
    public function setAppleBusinessId(?string $appleBusinessId): self
    {
        $this->initialized['appleBusinessId'] = true;
        $this->appleBusinessId = $appleBusinessId;
        return $this;
    }
}
