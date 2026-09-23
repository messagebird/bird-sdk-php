<?php

namespace MessageBird\Wire\Model;

class VoicePartySIPEndpoint
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
     * The address the user agent registered, as a `sip:` or `sips:` URI. It is where the endpoint asked to be reached, which is not always the address that was dialled.
     *
     * @var string|null
     */
    protected $contact;
    /**
     * The address the user agent registered, as a `sip:` or `sips:` URI. It is where the endpoint asked to be reached, which is not always the address that was dialled.
     *
     * @return string|null
     */
    public function getContact(): ?string
    {
        return $this->contact;
    }
    /**
     * The address the user agent registered, as a `sip:` or `sips:` URI. It is where the endpoint asked to be reached, which is not always the address that was dialled.
     *
     * @param string|null $contact
     *
     * @return self
     */
    public function setContact(?string $contact): self
    {
        $this->initialized['contact'] = true;
        $this->contact = $contact;
        return $this;
    }
}
