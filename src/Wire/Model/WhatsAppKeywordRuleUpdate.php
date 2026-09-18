<?php

namespace MessageBird\Wire\Model;

class WhatsAppKeywordRuleUpdate
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
     * Replaces the message sent back when a keyword matches. Set it to null to send nothing. Omit to leave it unchanged.
     * 
     *
     * @var string|null
     */
    protected $reply;
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
     * Replaces the message sent back when a keyword matches. Set it to null to send nothing. Omit to leave it unchanged.
     * 
     *
     * @return string|null
     */
    public function getReply(): ?string
    {
        return $this->reply;
    }
    /**
     * Replaces the message sent back when a keyword matches. Set it to null to send nothing. Omit to leave it unchanged.
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
}
