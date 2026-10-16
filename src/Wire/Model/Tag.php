<?php

namespace MessageBird\Wire\Model;

/**
 * Structured key/value label attached to a message or a call. Use tags for low-cardinality filtering dimensions (category, experiment ID, template ID); they surface in the list filter of whatever carries them.
 * 
 * On a message they also surface in the event log and in webhook payloads, and a message can carry `metadata` beside them for arbitrary per-send context that does not need to be filterable. A call has none of those three: its tags are set on the wire when the call is placed, and the call record is the one place you read them back.
 * 
 * Whatever carries the tags defines how many it may have. Tag names are unique: a send that repeats one is rejected, and on a call the first instance of a name wins.
 */
class Tag
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
     * Tag name. ASCII letters, digits, underscore, and hyphen only. Case-sensitive. Maximum 32 characters.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * Tag value. ASCII letters, digits, underscore, and hyphen only. Case-sensitive. Maximum 64 characters.
     * 
     *
     * @var string|null
     */
    protected $value;
    /**
     * Tag name. ASCII letters, digits, underscore, and hyphen only. Case-sensitive. Maximum 32 characters.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Tag name. ASCII letters, digits, underscore, and hyphen only. Case-sensitive. Maximum 32 characters.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Tag value. ASCII letters, digits, underscore, and hyphen only. Case-sensitive. Maximum 64 characters.
     * 
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
    /**
     * Tag value. ASCII letters, digits, underscore, and hyphen only. Case-sensitive. Maximum 64 characters.
     *
     * @param string|null $value
     *
     * @return self
     */
    public function setValue(?string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
}
