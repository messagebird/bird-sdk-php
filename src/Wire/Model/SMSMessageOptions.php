<?php

namespace MessageBird\Wire\Model;

class SMSMessageOptions extends \ArrayObject
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
     * Whether Bird replaced characters outside the GSM-7 alphabet in this message's body with their closest equivalent before sending it. When `true`, `text` is the body as sent and `segments` describes that body.
     * 
     *
     * @var bool|null
     */
    protected $smartEncoding;
    /**
     * Whether Bird replaced characters outside the GSM-7 alphabet in this message's body with their closest equivalent before sending it. When `true`, `text` is the body as sent and `segments` describes that body.
     * 
     *
     * @return bool|null
     */
    public function getSmartEncoding(): ?bool
    {
        return $this->smartEncoding;
    }
    /**
     * Whether Bird replaced characters outside the GSM-7 alphabet in this message's body with their closest equivalent before sending it. When `true`, `text` is the body as sent and `segments` describes that body.
     *
     * @param bool|null $smartEncoding
     *
     * @return self
     */
    public function setSmartEncoding(?bool $smartEncoding): self
    {
        $this->initialized['smartEncoding'] = true;
        $this->smartEncoding = $smartEncoding;
        return $this;
    }
}
