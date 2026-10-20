<?php

namespace MessageBird\Wire\Model;

/**
 * Registers this on behalf of a party you have not stored yet, creating it as part
 * of the submission so you do not need a separate call. Exclusive with
 * `identity_id`.
 * 
 * Each time you send this you get a new party. Single-value identity answers filed for one
 * are reused by registrations naming the same party. Documents and lists are
 * supplied separately for each registration. Send this once and use the
 * `identity_id` from the response for the countries that follow.
 */
class ComplianceSubmissionIdentity
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
     * What to call the party. Optional: left out, it takes the legal entity name you supplied. If this country's form does not ask for one, send a name here.
     *
     * @var string|null
     */
    protected $name;
    /**
     * What to call the party. Optional: left out, it takes the legal entity name you supplied. If this country's form does not ask for one, send a name here.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * What to call the party. Optional: left out, it takes the legal entity name you supplied. If this country's form does not ask for one, send a name here.
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
}
