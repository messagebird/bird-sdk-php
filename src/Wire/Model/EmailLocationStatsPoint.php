<?php

namespace MessageBird\Wire\Model;

class EmailLocationStatsPoint
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
     * The country this row aggregates, as a two-letter country code (ISO 3166-1 alpha-2) resolved from the open or click event. Always present.
     *
     * @var string|null
     */
    protected $country;
    /**
     * The region (state or province) within the country. Populated when `group_by` is `region` or `city`; null at coarser groupings.
     *
     * @var string|null
     */
    protected $region;
    /**
     * The city within the region. Populated when `group_by` is `city`; null at coarser groupings.
     *
     * @var string|null
     */
    protected $city;
    /**
     * @var EmailLocationStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * The country this row aggregates, as a two-letter country code (ISO 3166-1 alpha-2) resolved from the open or click event. Always present.
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }
    /**
     * The country this row aggregates, as a two-letter country code (ISO 3166-1 alpha-2) resolved from the open or click event. Always present.
     *
     * @param string|null $country
     *
     * @return self
     */
    public function setCountry(?string $country): self
    {
        $this->initialized['country'] = true;
        $this->country = $country;
        return $this;
    }
    /**
     * The region (state or province) within the country. Populated when `group_by` is `region` or `city`; null at coarser groupings.
     *
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }
    /**
     * The region (state or province) within the country. Populated when `group_by` is `region` or `city`; null at coarser groupings.
     *
     * @param string|null $region
     *
     * @return self
     */
    public function setRegion(?string $region): self
    {
        $this->initialized['region'] = true;
        $this->region = $region;
        return $this;
    }
    /**
     * The city within the region. Populated when `group_by` is `city`; null at coarser groupings.
     *
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }
    /**
     * The city within the region. Populated when `group_by` is `city`; null at coarser groupings.
     *
     * @param string|null $city
     *
     * @return self
     */
    public function setCity(?string $city): self
    {
        $this->initialized['city'] = true;
        $this->city = $city;
        return $this;
    }
    /**
     * @return EmailLocationStatsPointEngagement|null
     */
    public function getEngagement(): ?EmailLocationStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param EmailLocationStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?EmailLocationStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
}
