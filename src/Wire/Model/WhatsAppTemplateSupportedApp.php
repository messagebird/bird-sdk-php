<?php

namespace MessageBird\Wire\Model;

/**
 * An Android app that receives the passcode from a `one_tap` or `zero_tap` button.
 */
class WhatsAppTemplateSupportedApp
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
     * The app's Android application ID.
     *
     * @var string|null
     */
    protected $packageName;
    /**
     * The 11-character hash of the app's signing key.
     *
     * @var string|null
     */
    protected $signatureHash;
    /**
     * The app's Android application ID.
     *
     * @return string|null
     */
    public function getPackageName(): ?string
    {
        return $this->packageName;
    }
    /**
     * The app's Android application ID.
     *
     * @param string|null $packageName
     *
     * @return self
     */
    public function setPackageName(?string $packageName): self
    {
        $this->initialized['packageName'] = true;
        $this->packageName = $packageName;
        return $this;
    }
    /**
     * The 11-character hash of the app's signing key.
     *
     * @return string|null
     */
    public function getSignatureHash(): ?string
    {
        return $this->signatureHash;
    }
    /**
     * The 11-character hash of the app's signing key.
     *
     * @param string|null $signatureHash
     *
     * @return self
     */
    public function setSignatureHash(?string $signatureHash): self
    {
        $this->initialized['signatureHash'] = true;
        $this->signatureHash = $signatureHash;
        return $this;
    }
}
