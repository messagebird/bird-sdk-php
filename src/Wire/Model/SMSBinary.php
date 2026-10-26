<?php

namespace MessageBird\Wire\Model;

/**
 * An 8-bit binary SMS payload, sent as one segment. `udh` plus `data` must fit 140 octets.
 */
class SMSBinary
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
     * User data header as hexadecimal, 1-16 octets. Required on a send: a binary send without it returns `422`. Its first octet must count the octets after it, every information element must fit inside it, and concatenation elements (`00`, `08`) are refused because the message is one segment.
     * 
     *
     * @var string|null
     */
    protected $udh;
    /**
     * The payload after the header, as hexadecimal.
     *
     * @var string|null
     */
    protected $data;
    /**
     * User data header as hexadecimal, 1-16 octets. Required on a send: a binary send without it returns `422`. Its first octet must count the octets after it, every information element must fit inside it, and concatenation elements (`00`, `08`) are refused because the message is one segment.
     * 
     *
     * @return string|null
     */
    public function getUdh(): ?string
    {
        return $this->udh;
    }
    /**
     * User data header as hexadecimal, 1-16 octets. Required on a send: a binary send without it returns `422`. Its first octet must count the octets after it, every information element must fit inside it, and concatenation elements (`00`, `08`) are refused because the message is one segment.
     *
     * @param string|null $udh
     *
     * @return self
     */
    public function setUdh(?string $udh): self
    {
        $this->initialized['udh'] = true;
        $this->udh = $udh;
        return $this;
    }
    /**
     * The payload after the header, as hexadecimal.
     *
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }
    /**
     * The payload after the header, as hexadecimal.
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
}
