<?php

namespace MessageBird\Wire\Model;

class SMSKeywordRule
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
     * Identifier of a keyword rule. An `sks_` id is one of Bird's defaults, which you can read but not change; an `skw_` id is a rule your workspace created.
     * 
     *
     * @var string|null
     */
    protected $id;
    /**
     * Whether the rule is one of Bird's defaults (`system`) or one your workspace created (`workspace`). A `workspace` rule takes precedence over Bird's default for the same country, so it is how you replace a reply without losing the keywords Bird ships.
     * 
     *
     * @var string|null
     */
    protected $scope;
    /**
     * What Bird does when an inbound message matches the rule.
     * 
     * - `stop` unsubscribes the sender from further messages.
     * - `start` resubscribes them.
     * - `help` replies with your support information.
     * - `info` replies with your program information. It behaves exactly as `help` does and is
     *   separate so a country whose INFO answer must differ from its HELP answer can carry both.
     *   Where Bird ships no `info` rule for a country, INFO is one of that country's `help`
     *   keywords and answers with the `help` reply.
     * - `confirm` marks a double opt-in reply. It sends nothing today, so answer it from your own
     *   handler.
     * - `custom` replies with the text you configured and has no other effect.
     * 
     * Bird's built-in rules fix the operation for `stop`, `start` and `help`; you can change their
     * reply but not what they do. The same holds for `info` in any country where Bird ships an
     * `info` rule. This is an open enum. Accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $operation;
    /**
     * The country the rule applies in, as an ISO 3166-1 alpha-2 code. A rule for `NL` covers messages received on your Dutch numbers, and messages from a subscriber whose own number is Dutch whichever of your numbers they text. Rules for the country a message arrives in always outrank rules for the country its sender is in; within each, your rule wins over Bird's keywords for that country. `number` confines a rule to one number. Null means the rule applies worldwide, which is allowed for `custom` operations only.
     * 
     *
     * @var string|null
     */
    protected $country;
    /**
     * The language this rule covers, in countries where Bird ships keywords in more than one. Canada has separate English and French rules, so a Canadian rule names which one it replaces and the other keeps Bird's reply. Null in countries with a single set.
     * 
     *
     * @var string|null
     */
    protected $language;
    /**
     * Narrows the rule to one of your numbers in E.164 format, instead of every number you hold in the country. Null means it applies to all of them.
     * 
     *
     * @var string|null
     */
    protected $number;
    /**
     * The keywords this rule adds. For one of Bird's defaults this is the full set Bird ships. For a rule you created it is only what you added on top. It never restates or removes Bird's keywords, so `effective_keywords` is what actually matches.
     * 
     *
     * @var list<string>|null
     */
    protected $keywords;
    /**
     * Every keyword that matches this rule: Bird's keywords for the same operation, country and language, plus the ones you added. This is what an inbound message is compared against. Keywords Bird adds later join it without you changing anything.
     * 
     *
     * @var list<string>|null
     */
    protected $effectiveKeywords;
    /**
     * The message sent back when one of the keywords matches, except on a `confirm` rule, which never sends one. Null when the auto-reply is switched off, which `reply_disabled_at` distinguishes from a rule that has not been given one.
     * 
     *
     * @var string|null
     */
    protected $reply;
    /**
     * Text appended to your reply that you cannot change: the rates and opt-out wording carriers require on a help response. Your reply is sent in front of it, and both count against the length a single message allows. Null when the operation carries none.
     * 
     *
     * @var string|null
     */
    protected $replySuffix;
    /**
     * When the auto-reply for this rule was switched off, or null if it is on. Switching it off records that you send this reply from your own system, which is what Bird points to if a carrier asks why no reply went out.
     * 
     *
     * @var \DateTime|null
     */
    protected $replyDisabledAt;
    /**
     * Whether what this operation does is fixed. When true you can change the reply but not the behavior. An opt-out keyword always unsubscribes the sender, whichever rule matched it, because carriers and regulators require it.
     * 
     *
     * @var bool|null
     */
    protected $mandatory;
    /**
     * When the rule was created.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the rule was last changed. On one of Bird's defaults this is when Bird last changed the keywords or the reply for that country.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Identifier of a keyword rule. An `sks_` id is one of Bird's defaults, which you can read but not change; an `skw_` id is a rule your workspace created.
     * 
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Identifier of a keyword rule. An `sks_` id is one of Bird's defaults, which you can read but not change; an `skw_` id is a rule your workspace created.
     *
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * Whether the rule is one of Bird's defaults (`system`) or one your workspace created (`workspace`). A `workspace` rule takes precedence over Bird's default for the same country, so it is how you replace a reply without losing the keywords Bird ships.
     * 
     *
     * @return string|null
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }
    /**
     * Whether the rule is one of Bird's defaults (`system`) or one your workspace created (`workspace`). A `workspace` rule takes precedence over Bird's default for the same country, so it is how you replace a reply without losing the keywords Bird ships.
     *
     * @param string|null $scope
     *
     * @return self
     */
    public function setScope(?string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
    /**
     * What Bird does when an inbound message matches the rule.
     * 
     * - `stop` unsubscribes the sender from further messages.
     * - `start` resubscribes them.
     * - `help` replies with your support information.
     * - `info` replies with your program information. It behaves exactly as `help` does and is
     *   separate so a country whose INFO answer must differ from its HELP answer can carry both.
     *   Where Bird ships no `info` rule for a country, INFO is one of that country's `help`
     *   keywords and answers with the `help` reply.
     * - `confirm` marks a double opt-in reply. It sends nothing today, so answer it from your own
     *   handler.
     * - `custom` replies with the text you configured and has no other effect.
     * 
     * Bird's built-in rules fix the operation for `stop`, `start` and `help`; you can change their
     * reply but not what they do. The same holds for `info` in any country where Bird ships an
     * `info` rule. This is an open enum. Accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getOperation(): ?string
    {
        return $this->operation;
    }
    /**
    * What Bird does when an inbound message matches the rule.
    
    - `stop` unsubscribes the sender from further messages.
    - `start` resubscribes them.
    - `help` replies with your support information.
    - `info` replies with your program information. It behaves exactly as `help` does and is
     separate so a country whose INFO answer must differ from its HELP answer can carry both.
     Where Bird ships no `info` rule for a country, INFO is one of that country's `help`
     keywords and answers with the `help` reply.
    - `confirm` marks a double opt-in reply. It sends nothing today, so answer it from your own
     handler.
    - `custom` replies with the text you configured and has no other effect.
    
    Bird's built-in rules fix the operation for `stop`, `start` and `help`; you can change their
    reply but not what they do. The same holds for `info` in any country where Bird ships an
    `info` rule. This is an open enum. Accept unrecognized values.
    
    *
    * @param string|null $operation
    *
    * @return self
    */
    public function setOperation(?string $operation): self
    {
        $this->initialized['operation'] = true;
        $this->operation = $operation;
        return $this;
    }
    /**
     * The country the rule applies in, as an ISO 3166-1 alpha-2 code. A rule for `NL` covers messages received on your Dutch numbers, and messages from a subscriber whose own number is Dutch whichever of your numbers they text. Rules for the country a message arrives in always outrank rules for the country its sender is in; within each, your rule wins over Bird's keywords for that country. `number` confines a rule to one number. Null means the rule applies worldwide, which is allowed for `custom` operations only.
     * 
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }
    /**
     * The country the rule applies in, as an ISO 3166-1 alpha-2 code. A rule for `NL` covers messages received on your Dutch numbers, and messages from a subscriber whose own number is Dutch whichever of your numbers they text. Rules for the country a message arrives in always outrank rules for the country its sender is in; within each, your rule wins over Bird's keywords for that country. `number` confines a rule to one number. Null means the rule applies worldwide, which is allowed for `custom` operations only.
     *
     * @param string|null $country
     *
     * @return self
     */
    public function setCountry(?string $country): self
    {
        $this->initialized['country'] = true;
        $this->country = $country;
        return $this;
    }
    /**
     * The language this rule covers, in countries where Bird ships keywords in more than one. Canada has separate English and French rules, so a Canadian rule names which one it replaces and the other keeps Bird's reply. Null in countries with a single set.
     * 
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * The language this rule covers, in countries where Bird ships keywords in more than one. Canada has separate English and French rules, so a Canadian rule names which one it replaces and the other keeps Bird's reply. Null in countries with a single set.
     *
     * @param string|null $language
     *
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->initialized['language'] = true;
        $this->language = $language;
        return $this;
    }
    /**
     * Narrows the rule to one of your numbers in E.164 format, instead of every number you hold in the country. Null means it applies to all of them.
     * 
     *
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }
    /**
     * Narrows the rule to one of your numbers in E.164 format, instead of every number you hold in the country. Null means it applies to all of them.
     *
     * @param string|null $number
     *
     * @return self
     */
    public function setNumber(?string $number): self
    {
        $this->initialized['number'] = true;
        $this->number = $number;
        return $this;
    }
    /**
     * The keywords this rule adds. For one of Bird's defaults this is the full set Bird ships. For a rule you created it is only what you added on top. It never restates or removes Bird's keywords, so `effective_keywords` is what actually matches.
     * 
     *
     * @return list<string>|null
     */
    public function getKeywords(): ?array
    {
        return $this->keywords;
    }
    /**
     * The keywords this rule adds. For one of Bird's defaults this is the full set Bird ships. For a rule you created it is only what you added on top. It never restates or removes Bird's keywords, so `effective_keywords` is what actually matches.
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
     * Every keyword that matches this rule: Bird's keywords for the same operation, country and language, plus the ones you added. This is what an inbound message is compared against. Keywords Bird adds later join it without you changing anything.
     * 
     *
     * @return list<string>|null
     */
    public function getEffectiveKeywords(): ?array
    {
        return $this->effectiveKeywords;
    }
    /**
     * Every keyword that matches this rule: Bird's keywords for the same operation, country and language, plus the ones you added. This is what an inbound message is compared against. Keywords Bird adds later join it without you changing anything.
     *
     * @param list<string>|null $effectiveKeywords
     *
     * @return self
     */
    public function setEffectiveKeywords(?array $effectiveKeywords): self
    {
        $this->initialized['effectiveKeywords'] = true;
        $this->effectiveKeywords = $effectiveKeywords;
        return $this;
    }
    /**
     * The message sent back when one of the keywords matches, except on a `confirm` rule, which never sends one. Null when the auto-reply is switched off, which `reply_disabled_at` distinguishes from a rule that has not been given one.
     * 
     *
     * @return string|null
     */
    public function getReply(): ?string
    {
        return $this->reply;
    }
    /**
     * The message sent back when one of the keywords matches, except on a `confirm` rule, which never sends one. Null when the auto-reply is switched off, which `reply_disabled_at` distinguishes from a rule that has not been given one.
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
     * Text appended to your reply that you cannot change: the rates and opt-out wording carriers require on a help response. Your reply is sent in front of it, and both count against the length a single message allows. Null when the operation carries none.
     * 
     *
     * @return string|null
     */
    public function getReplySuffix(): ?string
    {
        return $this->replySuffix;
    }
    /**
     * Text appended to your reply that you cannot change: the rates and opt-out wording carriers require on a help response. Your reply is sent in front of it, and both count against the length a single message allows. Null when the operation carries none.
     *
     * @param string|null $replySuffix
     *
     * @return self
     */
    public function setReplySuffix(?string $replySuffix): self
    {
        $this->initialized['replySuffix'] = true;
        $this->replySuffix = $replySuffix;
        return $this;
    }
    /**
     * When the auto-reply for this rule was switched off, or null if it is on. Switching it off records that you send this reply from your own system, which is what Bird points to if a carrier asks why no reply went out.
     * 
     *
     * @return \DateTime|null
     */
    public function getReplyDisabledAt(): ?\DateTime
    {
        return $this->replyDisabledAt;
    }
    /**
     * When the auto-reply for this rule was switched off, or null if it is on. Switching it off records that you send this reply from your own system, which is what Bird points to if a carrier asks why no reply went out.
     *
     * @param \DateTime|null $replyDisabledAt
     *
     * @return self
     */
    public function setReplyDisabledAt(?\DateTime $replyDisabledAt): self
    {
        $this->initialized['replyDisabledAt'] = true;
        $this->replyDisabledAt = $replyDisabledAt;
        return $this;
    }
    /**
     * Whether what this operation does is fixed. When true you can change the reply but not the behavior. An opt-out keyword always unsubscribes the sender, whichever rule matched it, because carriers and regulators require it.
     * 
     *
     * @return bool|null
     */
    public function getMandatory(): ?bool
    {
        return $this->mandatory;
    }
    /**
     * Whether what this operation does is fixed. When true you can change the reply but not the behavior. An opt-out keyword always unsubscribes the sender, whichever rule matched it, because carriers and regulators require it.
     *
     * @param bool|null $mandatory
     *
     * @return self
     */
    public function setMandatory(?bool $mandatory): self
    {
        $this->initialized['mandatory'] = true;
        $this->mandatory = $mandatory;
        return $this;
    }
    /**
     * When the rule was created.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the rule was created.
     *
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * When the rule was last changed. On one of Bird's defaults this is when Bird last changed the keywords or the reply for that country.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When the rule was last changed. On one of Bird's defaults this is when Bird last changed the keywords or the reply for that country.
     *
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
