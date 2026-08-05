<?php

namespace MessageBird\Wire\Model;

class ReceiveRuleCreate
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
     * What the rule does when it matches. Block rules always win. To flip an entry's action, delete the existing rule and re-create it.
     *
     * @var string|null
     */
    protected $action;
    /**
     * The sender address (`alice@example.com`) or domain (`example.com`) to match. Domains also match their subdomains. Stored lowercase.
     *
     * @var string|null
     */
    protected $entry;
    /**
     * Your own note about why the rule exists.
     *
     * @var string|null
     */
    protected $note;
    /**
     * What the rule does when it matches. Block rules always win. To flip an entry's action, delete the existing rule and re-create it.
     *
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }
    /**
     * What the rule does when it matches. Block rules always win. To flip an entry's action, delete the existing rule and re-create it.
     *
     * @param string|null $action
     *
     * @return self
     */
    public function setAction(?string $action): self
    {
        $this->initialized['action'] = true;
        $this->action = $action;
        return $this;
    }
    /**
     * The sender address (`alice@example.com`) or domain (`example.com`) to match. Domains also match their subdomains. Stored lowercase.
     *
     * @return string|null
     */
    public function getEntry(): ?string
    {
        return $this->entry;
    }
    /**
     * The sender address (`alice@example.com`) or domain (`example.com`) to match. Domains also match their subdomains. Stored lowercase.
     *
     * @param string|null $entry
     *
     * @return self
     */
    public function setEntry(?string $entry): self
    {
        $this->initialized['entry'] = true;
        $this->entry = $entry;
        return $this;
    }
    /**
     * Your own note about why the rule exists.
     *
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }
    /**
     * Your own note about why the rule exists.
     *
     * @param string|null $note
     *
     * @return self
     */
    public function setNote(?string $note): self
    {
        $this->initialized['note'] = true;
        $this->note = $note;
        return $this;
    }
}
