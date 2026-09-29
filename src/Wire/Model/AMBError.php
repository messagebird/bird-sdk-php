<?php

namespace MessageBird\Wire\Model;

class AMBError
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
     * Machine-readable reason a send failed, in one of two namespaces: `bird:` for a reason Bird's own pipeline assigned (for example `bird:business_not_registered`), or `apple:` followed by the HTTP status Apple's API returned for the send attempt (for example `apple:404`). This is an open, growing set in both namespaces; accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $code;
    /**
     * The failure in words. Free-form, so branch on `code` and show this to a human.
     *
     * @var string|null
     */
    protected $description;
    /**
     * When the failure occurred.
     *
     * @var \DateTime|null
     */
    protected $occurredAt;
    /**
     * Machine-readable reason a send failed, in one of two namespaces: `bird:` for a reason Bird's own pipeline assigned (for example `bird:business_not_registered`), or `apple:` followed by the HTTP status Apple's API returned for the send attempt (for example `apple:404`). This is an open, growing set in both namespaces; accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
     * Machine-readable reason a send failed, in one of two namespaces: `bird:` for a reason Bird's own pipeline assigned (for example `bird:business_not_registered`), or `apple:` followed by the HTTP status Apple's API returned for the send attempt (for example `apple:404`). This is an open, growing set in both namespaces; accept unrecognized values.
     *
     * @param string|null $code
     *
     * @return self
     */
    public function setCode(?string $code): self
    {
        $this->initialized['code'] = true;
        $this->code = $code;
        return $this;
    }
    /**
     * The failure in words. Free-form, so branch on `code` and show this to a human.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * The failure in words. Free-form, so branch on `code` and show this to a human.
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
     * When the failure occurred.
     *
     * @return \DateTime|null
     */
    public function getOccurredAt(): ?\DateTime
    {
        return $this->occurredAt;
    }
    /**
     * When the failure occurred.
     *
     * @param \DateTime|null $occurredAt
     *
     * @return self
     */
    public function setOccurredAt(?\DateTime $occurredAt): self
    {
        $this->initialized['occurredAt'] = true;
        $this->occurredAt = $occurredAt;
        return $this;
    }
}
