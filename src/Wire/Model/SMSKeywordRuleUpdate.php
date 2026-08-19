<?php

namespace MessageBird\Wire\Model;

class SMSKeywordRuleUpdate
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
     * Replaces the extra keywords this rule matches, on top of the ones Bird ships. Send an empty array to keep Bird's keywords only. Omit to leave the current ones unchanged.
     * 
     *
     * @var list<string>|null
     */
    protected $keywords;
    /**
     * Replaces the message sent back when a keyword matches, except on a `confirm` rule, which never sends one whatever this is set to. Set it to null together with `confirmed_self_managed` to switch the auto-reply off. Omit to leave it unchanged.
     * 
     *
     * @var string|null
     */
    protected $reply;
    /**
     * Set this with `reply: null` to confirm you send this reply from your own system. Required to switch the auto-reply off, and rejected when a reply is given.
     * 
     *
     * @var bool|null
     */
    protected $confirmedSelfManaged;
    /**
     * Replaces the extra keywords this rule matches, on top of the ones Bird ships. Send an empty array to keep Bird's keywords only. Omit to leave the current ones unchanged.
     * 
     *
     * @return list<string>|null
     */
    public function getKeywords(): ?array
    {
        return $this->keywords;
    }
    /**
     * Replaces the extra keywords this rule matches, on top of the ones Bird ships. Send an empty array to keep Bird's keywords only. Omit to leave the current ones unchanged.
     *
     * @param list<string>|null $keywords
     *
     * @return self
     */
    public function setKeywords(?array $keywords): self
    {
        $this->initialized['keywords'] = true;
        $this->keywords = $keywords;
        return $this;
    }
    /**
     * Replaces the message sent back when a keyword matches, except on a `confirm` rule, which never sends one whatever this is set to. Set it to null together with `confirmed_self_managed` to switch the auto-reply off. Omit to leave it unchanged.
     * 
     *
     * @return string|null
     */
    public function getReply(): ?string
    {
        return $this->reply;
    }
    /**
     * Replaces the message sent back when a keyword matches, except on a `confirm` rule, which never sends one whatever this is set to. Set it to null together with `confirmed_self_managed` to switch the auto-reply off. Omit to leave it unchanged.
     *
     * @param string|null $reply
     *
     * @return self
     */
    public function setReply(?string $reply): self
    {
        $this->initialized['reply'] = true;
        $this->reply = $reply;
        return $this;
    }
    /**
     * Set this with `reply: null` to confirm you send this reply from your own system. Required to switch the auto-reply off, and rejected when a reply is given.
     * 
     *
     * @return bool|null
     */
    public function getConfirmedSelfManaged(): ?bool
    {
        return $this->confirmedSelfManaged;
    }
    /**
     * Set this with `reply: null` to confirm you send this reply from your own system. Required to switch the auto-reply off, and rejected when a reply is given.
     *
     * @param bool|null $confirmedSelfManaged
     *
     * @return self
     */
    public function setConfirmedSelfManaged(?bool $confirmedSelfManaged): self
    {
        $this->initialized['confirmedSelfManaged'] = true;
        $this->confirmedSelfManaged = $confirmedSelfManaged;
        return $this;
    }
}
