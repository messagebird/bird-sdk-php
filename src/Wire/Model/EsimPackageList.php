<?php

namespace MessageBird\Wire\Model;

class EsimPackageList
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
     * Packages, newest first.
     *
     * @var list<EsimPackage>|null
     */
    protected $data;
    /**
     * Packages, newest first.
     *
     * @return list<EsimPackage>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Packages, newest first.
     *
     * @param list<EsimPackage>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}
