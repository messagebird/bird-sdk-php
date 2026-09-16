<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveBrandMatch
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
    protected $brandId;
    /**
     * The brand's name.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The domains this brand's figures would describe. Always one domain today, chosen as the one the panel sees the most of its mail from.
     * 
     *
     * @var list<string>|null
     */
    protected $sendingDomains;
    /**
     * @return string|null
     */
    public function getBrandId(): ?string
    {
        return $this->brandId;
    }
    /**
     * @param string|null $brandId
     *
     * @return self
     */
    public function setBrandId(?string $brandId): self
    {
        $this->initialized['brandId'] = true;
        $this->brandId = $brandId;
        return $this;
    }
    /**
     * The brand's name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The brand's name.
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
     * The domains this brand's figures would describe. Always one domain today, chosen as the one the panel sees the most of its mail from.
     * 
     *
     * @return list<string>|null
     */
    public function getSendingDomains(): ?array
    {
        return $this->sendingDomains;
    }
    /**
     * The domains this brand's figures would describe. Always one domain today, chosen as the one the panel sees the most of its mail from.
     *
     * @param list<string>|null $sendingDomains
     *
     * @return self
     */
    public function setSendingDomains(?array $sendingDomains): self
    {
        $this->initialized['sendingDomains'] = true;
        $this->sendingDomains = $sendingDomains;
        return $this;
    }
}
