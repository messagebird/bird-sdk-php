<?php

namespace MessageBird\Wire\Model;

/**
 * An Android app that receives the passcode from a `one_tap` or `zero_tap` button. Both fields may be empty on a draft and are required before submission.
 */
class WhatsAppTemplateSupportedAppWrite
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
     * The app's Android application ID. It needs at least two segments separated by dots, each starting with a letter, and uses only letters, digits and underscores.
     * 
     *
     * @var string|null
     */
    protected $packageName;
    /**
     * The 11-character hash of the app's signing key, from letters, digits, `+`, `/` and `=`.
     * 
     *
     * @var string|null
     */
    protected $signatureHash;
    /**
     * The app's Android application ID. It needs at least two segments separated by dots, each starting with a letter, and uses only letters, digits and underscores.
     * 
     *
     * @return string|null
     */
    public function getPackageName(): ?string
    {
        return $this->packageName;
    }
    /**
     * The app's Android application ID. It needs at least two segments separated by dots, each starting with a letter, and uses only letters, digits and underscores.
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
     * The 11-character hash of the app's signing key, from letters, digits, `+`, `/` and `=`.
     * 
     *
     * @return string|null
     */
    public function getSignatureHash(): ?string
    {
        return $this->signatureHash;
    }
    /**
     * The 11-character hash of the app's signing key, from letters, digits, `+`, `/` and `=`.
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
