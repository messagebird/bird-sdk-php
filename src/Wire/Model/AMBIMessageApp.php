<?php

namespace MessageBird\Wire\Model;

/**
 * A custom iMessage app interaction. It also requires both `received_message` and `reply_message`.
 */
class AMBIMessageApp
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
     * App Store identifier of the iMessage app.
     *
     * @var string|null
     */
    protected $appId;
    /**
     * Name of the iMessage app.
     *
     * @var string|null
     */
    protected $appName;
    /**
     * Identifier of the iMessage extension, in Apple's `com.apple.messages.MSMessageExtensionBalloonPlugin:team-id:extension-id` format.
     *
     * @var string|null
     */
    protected $bid;
    /**
     * Opaque URL string that Messages passes to the iMessage app.
     *
     * @var string|null
     */
    protected $url;
    /**
     * Publicly accessible HTTPS URL of the app's PNG icon. The icon must be smaller than 15 kB. We fetch and include it in the request to Apple. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
     *
     * @var string|null
     */
    protected $appIconSourceUrl;
    /**
     * Whether Messages renders the received and reply bubbles using Live Layout.
     *
     * @var bool|null
     */
    protected $useLiveLayout;
    /**
     * App Store identifier of the iMessage app.
     *
     * @return string|null
     */
    public function getAppId(): ?string
    {
        return $this->appId;
    }
    /**
     * App Store identifier of the iMessage app.
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
     * Name of the iMessage app.
     *
     * @return string|null
     */
    public function getAppName(): ?string
    {
        return $this->appName;
    }
    /**
     * Name of the iMessage app.
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
     * Identifier of the iMessage extension, in Apple's `com.apple.messages.MSMessageExtensionBalloonPlugin:team-id:extension-id` format.
     *
     * @return string|null
     */
    public function getBid(): ?string
    {
        return $this->bid;
    }
    /**
     * Identifier of the iMessage extension, in Apple's `com.apple.messages.MSMessageExtensionBalloonPlugin:team-id:extension-id` format.
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
     * Opaque URL string that Messages passes to the iMessage app.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Opaque URL string that Messages passes to the iMessage app.
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
     * Publicly accessible HTTPS URL of the app's PNG icon. The icon must be smaller than 15 kB. We fetch and include it in the request to Apple. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
     *
     * @return string|null
     */
    public function getAppIconSourceUrl(): ?string
    {
        return $this->appIconSourceUrl;
    }
    /**
     * Publicly accessible HTTPS URL of the app's PNG icon. The icon must be smaller than 15 kB. We fetch and include it in the request to Apple. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
     *
     * @param string|null $appIconSourceUrl
     *
     * @return self
     */
    public function setAppIconSourceUrl(?string $appIconSourceUrl): self
    {
        $this->initialized['appIconSourceUrl'] = true;
        $this->appIconSourceUrl = $appIconSourceUrl;
        return $this;
    }
    /**
     * Whether Messages renders the received and reply bubbles using Live Layout.
     *
     * @return bool|null
     */
    public function getUseLiveLayout(): ?bool
    {
        return $this->useLiveLayout;
    }
    /**
     * Whether Messages renders the received and reply bubbles using Live Layout.
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
}
