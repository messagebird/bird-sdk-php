<?php

namespace MessageBird\Wire\Model;

class AMBChannelSettingsUpdate
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
     * The entry points customers can use to open a conversation with this business. Sending this replaces the entire set; there is no way to add or remove a single entry point without resending the rest.
     *
     * @var list<AMBEntryPoint>|null
     */
    protected $entryPoints;
    /**
     * The locale used for this business when a conversation reports none of its own, in BCP-47 form. Omit this field to keep the current default, or send null to clear it. Bird converts a configured default to Apple's locale form when sending a message without a conversation locale.
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
     * The business's logo, as an asset in your media library. Send null to clear it.
     *
     * @var string|null
     */
    protected $logoAssetId;
    /**
     * The entry points customers can use to open a conversation with this business. Sending this replaces the entire set; there is no way to add or remove a single entry point without resending the rest.
     *
     * @return list<AMBEntryPoint>|null
     */
    public function getEntryPoints(): ?array
    {
        return $this->entryPoints;
    }
    /**
     * The entry points customers can use to open a conversation with this business. Sending this replaces the entire set; there is no way to add or remove a single entry point without resending the rest.
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
     * The locale used for this business when a conversation reports none of its own, in BCP-47 form. Omit this field to keep the current default, or send null to clear it. Bird converts a configured default to Apple's locale form when sending a message without a conversation locale.
     *
     * @return string|null
     */
    public function getDefaultLocale(): ?string
    {
        return $this->defaultLocale;
    }
    /**
     * The locale used for this business when a conversation reports none of its own, in BCP-47 form. Omit this field to keep the current default, or send null to clear it. Bird converts a configured default to Apple's locale form when sending a message without a conversation locale.
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
     * The business's logo, as an asset in your media library. Send null to clear it.
     *
     * @return string|null
     */
    public function getLogoAssetId(): ?string
    {
        return $this->logoAssetId;
    }
    /**
     * The business's logo, as an asset in your media library. Send null to clear it.
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
