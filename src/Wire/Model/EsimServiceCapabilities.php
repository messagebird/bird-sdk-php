<?php

namespace MessageBird\Wire\Model;

class EsimServiceCapabilities
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
     * Whether a service is supported. `yes` confirms support, `no` confirms it is not supported, and `unknown` means support has not been established.
     * 
     *
     * @var string|null
     */
    protected $data;
    /**
     * Whether a service is supported. `yes` confirms support, `no` confirms it is not supported, and `unknown` means support has not been established.
     * 
     *
     * @var string|null
     */
    protected $smsInbound;
    /**
     * Whether a service is supported. `yes` confirms support, `no` confirms it is not supported, and `unknown` means support has not been established.
     * 
     *
     * @var string|null
     */
    protected $smsOutbound;
    /**
     * Whether a service is supported. `yes` confirms support, `no` confirms it is not supported, and `unknown` means support has not been established.
     * 
     *
     * @var string|null
     */
    protected $voiceInbound;
    /**
     * Whether a service is supported. `yes` confirms support, `no` confirms it is not supported, and `unknown` means support has not been established.
     * 
     *
     * @var string|null
     */
    protected $voiceOutbound;
    /**
     * Whether a service is supported. `yes` confirms support, `no` confirms it is not supported, and `unknown` means support has not been established.
     * 
     *
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }
    /**
     * Whether a service is supported. `yes` confirms support, `no` confirms it is not supported, and `unknown` means support has not been established.
     *
     * @param string|null $data
     *
     * @return self
     */
    public function setData(?string $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
    /**
     * Whether a service is supported. `yes` confirms support, `no` confirms it is not supported, and `unknown` means support has not been established.
     * 
     *
     * @return string|null
     */
    public function getSmsInbound(): ?string
    {
        return $this->smsInbound;
    }
    /**
     * Whether a service is supported. `yes` confirms support, `no` confirms it is not supported, and `unknown` means support has not been established.
     *
     * @param string|null $smsInbound
     *
     * @return self
     */
    public function setSmsInbound(?string $smsInbound): self
    {
        $this->initialized['smsInbound'] = true;
        $this->smsInbound = $smsInbound;
        return $this;
    }
    /**
     * Whether a service is supported. `yes` confirms support, `no` confirms it is not supported, and `unknown` means support has not been established.
     * 
     *
     * @return string|null
     */
    public function getSmsOutbound(): ?string
    {
        return $this->smsOutbound;
    }
    /**
     * Whether a service is supported. `yes` confirms support, `no` confirms it is not supported, and `unknown` means support has not been established.
     *
     * @param string|null $smsOutbound
     *
     * @return self
     */
    public function setSmsOutbound(?string $smsOutbound): self
    {
        $this->initialized['smsOutbound'] = true;
        $this->smsOutbound = $smsOutbound;
        return $this;
    }
    /**
     * Whether a service is supported. `yes` confirms support, `no` confirms it is not supported, and `unknown` means support has not been established.
     * 
     *
     * @return string|null
     */
    public function getVoiceInbound(): ?string
    {
        return $this->voiceInbound;
    }
    /**
     * Whether a service is supported. `yes` confirms support, `no` confirms it is not supported, and `unknown` means support has not been established.
     *
     * @param string|null $voiceInbound
     *
     * @return self
     */
    public function setVoiceInbound(?string $voiceInbound): self
    {
        $this->initialized['voiceInbound'] = true;
        $this->voiceInbound = $voiceInbound;
        return $this;
    }
    /**
     * Whether a service is supported. `yes` confirms support, `no` confirms it is not supported, and `unknown` means support has not been established.
     * 
     *
     * @return string|null
     */
    public function getVoiceOutbound(): ?string
    {
        return $this->voiceOutbound;
    }
    /**
     * Whether a service is supported. `yes` confirms support, `no` confirms it is not supported, and `unknown` means support has not been established.
     *
     * @param string|null $voiceOutbound
     *
     * @return self
     */
    public function setVoiceOutbound(?string $voiceOutbound): self
    {
        $this->initialized['voiceOutbound'] = true;
        $this->voiceOutbound = $voiceOutbound;
        return $this;
    }
}
