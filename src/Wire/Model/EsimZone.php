<?php

namespace MessageBird\Wire\Model;

class EsimZone
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
    protected $id;
    /**
     * Human-readable zone name.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Increments whenever the country list changes.
     *
     * @var int|null
     */
    protected $revision;
    /**
     * @var string|null
     */
    protected $type;
    /**
     * Countries covered by the zone, as ISO 3166-1 alpha-2 codes.
     *
     * @var list<string>|null
     */
    protected $countries;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
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
     * Human-readable zone name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Human-readable zone name.
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
     * Increments whenever the country list changes.
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * Increments whenever the country list changes.
     *
     * @param int|null $revision
     *
     * @return self
     */
    public function setRevision(?int $revision): self
    {
        $this->initialized['revision'] = true;
        $this->revision = $revision;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
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
     * Countries covered by the zone, as ISO 3166-1 alpha-2 codes.
     *
     * @return list<string>|null
     */
    public function getCountries(): ?array
    {
        return $this->countries;
    }
    /**
     * Countries covered by the zone, as ISO 3166-1 alpha-2 codes.
     *
     * @param list<string>|null $countries
     *
     * @return self
     */
    public function setCountries(?array $countries): self
    {
        $this->initialized['countries'] = true;
        $this->countries = $countries;
        return $this;
    }
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
}
