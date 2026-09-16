<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveWatchlistBrand extends \ArrayObject
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
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $brandId;
    /**
     * The brand's name when it was added. It is kept as it was so the row still reads correctly if the brand is later renamed or stops being tracked.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * The brand's industry when it was added, or null when the brand is not classified.
     *
     * @var string|null
     */
    protected $industry;
    /**
     * The domains this brand's figures describe. Always one domain today, chosen as the one the panel sees the most of its mail from.
     * 
     *
     * @var list<string>|null
     */
    protected $sendingDomains;
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
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
     * The brand's name when it was added. It is kept as it was so the row still reads correctly if the brand is later renamed or stops being tracked.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The brand's name when it was added. It is kept as it was so the row still reads correctly if the brand is later renamed or stops being tracked.
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
     * The brand's industry when it was added, or null when the brand is not classified.
     *
     * @return string|null
     */
    public function getIndustry(): ?string
    {
        return $this->industry;
    }
    /**
     * The brand's industry when it was added, or null when the brand is not classified.
     *
     * @param string|null $industry
     *
     * @return self
     */
    public function setIndustry(?string $industry): self
    {
        $this->initialized['industry'] = true;
        $this->industry = $industry;
        return $this;
    }
    /**
     * The domains this brand's figures describe. Always one domain today, chosen as the one the panel sees the most of its mail from.
     * 
     *
     * @return list<string>|null
     */
    public function getSendingDomains(): ?array
    {
        return $this->sendingDomains;
    }
    /**
     * The domains this brand's figures describe. Always one domain today, chosen as the one the panel sees the most of its mail from.
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
