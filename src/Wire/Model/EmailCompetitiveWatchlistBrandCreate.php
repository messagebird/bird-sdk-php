<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveWatchlistBrandCreate
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
     * Identifier of the brand in the panel's catalog, used to add it to the watchlist. It is a string for the same reason a campaign id is: the values are wide enough that a client storing every number as a floating point value would round them, and a rounded identifier matches no brand at all.
     * 
     *
     * @var string|null
     */
    protected $brandId;
    /**
     * Identifier of the brand in the panel's catalog, used to add it to the watchlist. It is a string for the same reason a campaign id is: the values are wide enough that a client storing every number as a floating point value would round them, and a rounded identifier matches no brand at all.
     * 
     *
     * @return string|null
     */
    public function getBrandId(): ?string
    {
        return $this->brandId;
    }
    /**
     * Identifier of the brand in the panel's catalog, used to add it to the watchlist. It is a string for the same reason a campaign id is: the values are wide enough that a client storing every number as a floating point value would round them, and a rounded identifier matches no brand at all.
     *
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
}
