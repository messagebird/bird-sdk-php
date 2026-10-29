<?php

namespace MessageBird\Wire\Model;

/**
 * The custom iMessage app a customer replied from.
 */
class AMBInboundIMessageApp
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
     * Custom app identifier.
     *
     * @var string|null
     */
    protected $appId;
    /**
     * Custom app name.
     *
     * @var string|null
     */
    protected $appName;
    /**
     * Apple extension identifier.
     *
     * @var string|null
     */
    protected $bid;
    /**
     * Opaque custom app response URL.
     *
     * @var string|null
     */
    protected $url;
    /**
     * Whether the app uses live layout.
     *
     * @var bool|null
     */
    protected $useLiveLayout;
    /**
     * Relative Bird API URL for downloading the custom app icon with the same authentication and workspace as the message.
     *
     * @var string|null
     */
    protected $appIconUrl;
    /**
     * Custom app identifier.
     *
     * @return string|null
     */
    public function getAppId(): ?string
    {
        return $this->appId;
    }
    /**
     * Custom app identifier.
     *
     * @param string|null $appId
     *
     * @return self
     */
    public function setAppId(?string $appId): self
    {
        $this->initialized['appId'] = true;
        $this->appId = $appId;
        return $this;
    }
    /**
     * Custom app name.
     *
     * @return string|null
     */
    public function getAppName(): ?string
    {
        return $this->appName;
    }
    /**
     * Custom app name.
     *
     * @param string|null $appName
     *
     * @return self
     */
    public function setAppName(?string $appName): self
    {
        $this->initialized['appName'] = true;
        $this->appName = $appName;
        return $this;
    }
    /**
     * Apple extension identifier.
     *
     * @return string|null
     */
    public function getBid(): ?string
    {
        return $this->bid;
    }
    /**
     * Apple extension identifier.
     *
     * @param string|null $bid
     *
     * @return self
     */
    public function setBid(?string $bid): self
    {
        $this->initialized['bid'] = true;
        $this->bid = $bid;
        return $this;
    }
    /**
     * Opaque custom app response URL.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Opaque custom app response URL.
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
    /**
     * Whether the app uses live layout.
     *
     * @return bool|null
     */
    public function getUseLiveLayout(): ?bool
    {
        return $this->useLiveLayout;
    }
    /**
     * Whether the app uses live layout.
     *
     * @param bool|null $useLiveLayout
     *
     * @return self
     */
    public function setUseLiveLayout(?bool $useLiveLayout): self
    {
        $this->initialized['useLiveLayout'] = true;
        $this->useLiveLayout = $useLiveLayout;
        return $this;
    }
    /**
     * Relative Bird API URL for downloading the custom app icon with the same authentication and workspace as the message.
     *
     * @return string|null
     */
    public function getAppIconUrl(): ?string
    {
        return $this->appIconUrl;
    }
    /**
     * Relative Bird API URL for downloading the custom app icon with the same authentication and workspace as the message.
     *
     * @param string|null $appIconUrl
     *
     * @return self
     */
    public function setAppIconUrl(?string $appIconUrl): self
    {
        $this->initialized['appIconUrl'] = true;
        $this->appIconUrl = $appIconUrl;
        return $this;
    }
}
