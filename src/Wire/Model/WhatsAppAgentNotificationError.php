<?php

namespace MessageBird\Wire\Model;

class WhatsAppAgentNotificationError extends \ArrayObject
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
     * WhatsApp's own explanation, passed through: what it said when it refused the notification, or its failure summary once it had worked on it. Show it to the person who sent the notification; never match on its text. Carries Bird's own words instead when the failure was Bird's verdict, such as no outcome arriving within a day.
     * 
     *
     * @var string|null
     */
    protected $description;
    /**
     * WhatsApp's most specific code when it refused the notification outright: its error subcode where it sent one, otherwise its top-level code. Treat it as an opaque string. Null when WhatsApp took the notification and reported the failure later, which carries no code, and when the failure was Bird's own verdict.
     * 
     *
     * @var string|null
     */
    protected $metaErrorCode;
    /**
     * WhatsApp's own explanation, passed through: what it said when it refused the notification, or its failure summary once it had worked on it. Show it to the person who sent the notification; never match on its text. Carries Bird's own words instead when the failure was Bird's verdict, such as no outcome arriving within a day.
     * 
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * WhatsApp's own explanation, passed through: what it said when it refused the notification, or its failure summary once it had worked on it. Show it to the person who sent the notification; never match on its text. Carries Bird's own words instead when the failure was Bird's verdict, such as no outcome arriving within a day.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * WhatsApp's most specific code when it refused the notification outright: its error subcode where it sent one, otherwise its top-level code. Treat it as an opaque string. Null when WhatsApp took the notification and reported the failure later, which carries no code, and when the failure was Bird's own verdict.
     * 
     *
     * @return string|null
     */
    public function getMetaErrorCode(): ?string
    {
        return $this->metaErrorCode;
    }
    /**
     * WhatsApp's most specific code when it refused the notification outright: its error subcode where it sent one, otherwise its top-level code. Treat it as an opaque string. Null when WhatsApp took the notification and reported the failure later, which carries no code, and when the failure was Bird's own verdict.
     *
     * @param string|null $metaErrorCode
     *
     * @return self
     */
    public function setMetaErrorCode(?string $metaErrorCode): self
    {
        $this->initialized['metaErrorCode'] = true;
        $this->metaErrorCode = $metaErrorCode;
        return $this;
    }
}
