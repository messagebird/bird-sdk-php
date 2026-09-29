<?php

namespace MessageBird\Wire\Model;

class AMBChannelSettings
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
     * The entry points customers can use to open a conversation with this business, each matched against the group and intent an inbound message reports.
     *
     * @var list<AMBEntryPoint>|null
     */
    protected $entryPoints;
    /**
     * The locale used for this business when a conversation reports none of its own, in canonical BCP-47 form. Null until you set one or after you clear it. Bird converts a configured default to Apple's locale form when sending a message without a conversation locale.
     *
     * @var string|null
     */
    protected $defaultLocale;
    /**
     * The brand name shown on the Bird-hosted landing page customers use to connect this business.
     *
     * @var string|null
     */
    protected $brandName;
    /**
     * The business's logo, as an asset in your media library. Null until one is set, either from Apple's own redirect or from a later change here.
     *
     * @var string|null
     */
    protected $logoAssetId;
    /**
     * The entry points customers can use to open a conversation with this business, each matched against the group and intent an inbound message reports.
     *
     * @return list<AMBEntryPoint>|null
     */
    public function getEntryPoints(): ?array
    {
        return $this->entryPoints;
    }
    /**
     * The entry points customers can use to open a conversation with this business, each matched against the group and intent an inbound message reports.
     *
     * @param list<AMBEntryPoint>|null $entryPoints
     *
     * @return self
     */
    public function setEntryPoints(?array $entryPoints): self
    {
        $this->initialized['entryPoints'] = true;
        $this->entryPoints = $entryPoints;
        return $this;
    }
    /**
     * The locale used for this business when a conversation reports none of its own, in canonical BCP-47 form. Null until you set one or after you clear it. Bird converts a configured default to Apple's locale form when sending a message without a conversation locale.
     *
     * @return string|null
     */
    public function getDefaultLocale(): ?string
    {
        return $this->defaultLocale;
    }
    /**
     * The locale used for this business when a conversation reports none of its own, in canonical BCP-47 form. Null until you set one or after you clear it. Bird converts a configured default to Apple's locale form when sending a message without a conversation locale.
     *
     * @param string|null $defaultLocale
     *
     * @return self
     */
    public function setDefaultLocale(?string $defaultLocale): self
    {
        $this->initialized['defaultLocale'] = true;
        $this->defaultLocale = $defaultLocale;
        return $this;
    }
    /**
     * The brand name shown on the Bird-hosted landing page customers use to connect this business.
     *
     * @return string|null
     */
    public function getBrandName(): ?string
    {
        return $this->brandName;
    }
    /**
     * The brand name shown on the Bird-hosted landing page customers use to connect this business.
     *
     * @param string|null $brandName
     *
     * @return self
     */
    public function setBrandName(?string $brandName): self
    {
        $this->initialized['brandName'] = true;
        $this->brandName = $brandName;
        return $this;
    }
    /**
     * The business's logo, as an asset in your media library. Null until one is set, either from Apple's own redirect or from a later change here.
     *
     * @return string|null
     */
    public function getLogoAssetId(): ?string
    {
        return $this->logoAssetId;
    }
    /**
     * The business's logo, as an asset in your media library. Null until one is set, either from Apple's own redirect or from a later change here.
     *
     * @param string|null $logoAssetId
     *
     * @return self
     */
    public function setLogoAssetId(?string $logoAssetId): self
    {
        $this->initialized['logoAssetId'] = true;
        $this->logoAssetId = $logoAssetId;
        return $this;
    }
}
