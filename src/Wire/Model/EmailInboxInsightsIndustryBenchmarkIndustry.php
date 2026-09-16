<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsIndustryBenchmarkIndustry extends \ArrayObject
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
     * The measurement's own identifier for this industry, carried through so a client can tell two cohorts apart without comparing labels. No operation accepts it.
     * 
     *
     * @var string|null
     */
    protected $id;
    /**
     * Display name of the industry. The classification is broad, so bind this label rather than assuming a finer category exists.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * The measurement's own identifier for this industry, carried through so a client can tell two cohorts apart without comparing labels. No operation accepts it.
     * 
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The measurement's own identifier for this industry, carried through so a client can tell two cohorts apart without comparing labels. No operation accepts it.
     *
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
     * Display name of the industry. The classification is broad, so bind this label rather than assuming a finer category exists.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Display name of the industry. The classification is broad, so bind this label rather than assuming a finer category exists.
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
}
