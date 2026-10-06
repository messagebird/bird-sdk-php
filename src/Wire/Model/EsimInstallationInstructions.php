<?php

namespace MessageBird\Wire\Model;

class EsimInstallationInstructions
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
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $language;
    /**
     * Ordered steps for iOS devices.
     *
     * @var list<string>|null
     */
    protected $ios;
    /**
     * Ordered steps for Android devices.
     *
     * @var list<string>|null
     */
    protected $android;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @param string|null $language
     *
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->initialized['language'] = true;
        $this->language = $language;
        return $this;
    }
    /**
     * Ordered steps for iOS devices.
     *
     * @return list<string>|null
     */
    public function getIos(): ?array
    {
        return $this->ios;
    }
    /**
     * Ordered steps for iOS devices.
     *
     * @param list<string>|null $ios
     *
     * @return self
     */
    public function setIos(?array $ios): self
    {
        $this->initialized['ios'] = true;
        $this->ios = $ios;
        return $this;
    }
    /**
     * Ordered steps for Android devices.
     *
     * @return list<string>|null
     */
    public function getAndroid(): ?array
    {
        return $this->android;
    }
    /**
     * Ordered steps for Android devices.
     *
     * @param list<string>|null $android
     *
     * @return self
     */
    public function setAndroid(?array $android): self
    {
        $this->initialized['android'] = true;
        $this->android = $android;
        return $this;
    }
}
