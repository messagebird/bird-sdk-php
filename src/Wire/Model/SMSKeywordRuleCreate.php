<?php

namespace MessageBird\Wire\Model;

class SMSKeywordRuleCreate
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
     * Action taken when an inbound message matches the rule. `stop` unsubscribes the sender, `start` resubscribes them, `help` sends your support information, and `custom` sends the reply you configured. Built-in compliance rules fix the operation for `stop`, `start`, and `help`. This is an open enum. Accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $operation;
    /**
     * The country this rule applies in, as an ISO 3166-1 alpha-2 code. It matches a message two ways: one received on any of your numbers in this country, and one sent by a subscriber whose own number is in it, wherever they text you. Rules for the country a message arrives in always outrank rules for the country its sender is in; within each, your rule wins over Bird's keywords for that country. To confine a rule to one of your numbers, set `number` instead. Required for `stop`, `start` and `help`, because those replace what Bird ships for one country and a worldwide rule would replace every country's. Omit it only for `custom`, which then applies everywhere you send. Derived from `number` when you supply an E.164 number and leave this out; a short code carries no country, so a rule for one must name it.
     * 
     *
     * @var string|null
     */
    protected $country;
    /**
     * Which language this rule replaces, in countries where Bird ships keywords in more than one. Required there and rejected elsewhere. Listing the country's rules shows whether it applies and which languages are available.
     * 
     *
     * @var string|null
     */
    protected $language;
    /**
     * Narrows the rule to one number you hold, in E.164 format or as a short code. Omit to cover every number you hold in the country. The number must be one of yours and able to receive messages.
     * 
     *
     * @var string|null
     */
    protected $number;
    /**
     * Extra keywords to match, on top of the ones Bird already ships for this operation and country. Omit to keep Bird's keywords and change only the reply, including keywords Bird adds later. You cannot remove one of Bird's keywords, and a keyword Bird has bound to another operation cannot be reused here. Required for `custom`, which inherits none.
     * 
     *
     * @var list<string>|null
     */
    protected $keywords;
    /**
     * The message to send back when a keyword matches, except on a `confirm` rule, which never sends one whatever this is set to. Set it to null together with `confirmed_self_managed` to send nothing at all.
     * 
     *
     * @var string|null
     */
    protected $reply;
    /**
     * Set this with `reply: null` to confirm you send this reply from your own system, which switches Bird's auto-reply off for the rule. Required to send no reply, and rejected when a reply is given, so the two can never disagree.
     * 
     *
     * @var bool|null
     */
    protected $confirmedSelfManaged;
    /**
     * Action taken when an inbound message matches the rule. `stop` unsubscribes the sender, `start` resubscribes them, `help` sends your support information, and `custom` sends the reply you configured. Built-in compliance rules fix the operation for `stop`, `start`, and `help`. This is an open enum. Accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getOperation(): ?string
    {
        return $this->operation;
    }
    /**
     * Action taken when an inbound message matches the rule. `stop` unsubscribes the sender, `start` resubscribes them, `help` sends your support information, and `custom` sends the reply you configured. Built-in compliance rules fix the operation for `stop`, `start`, and `help`. This is an open enum. Accept unrecognized values.
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
     * The country this rule applies in, as an ISO 3166-1 alpha-2 code. It matches a message two ways: one received on any of your numbers in this country, and one sent by a subscriber whose own number is in it, wherever they text you. Rules for the country a message arrives in always outrank rules for the country its sender is in; within each, your rule wins over Bird's keywords for that country. To confine a rule to one of your numbers, set `number` instead. Required for `stop`, `start` and `help`, because those replace what Bird ships for one country and a worldwide rule would replace every country's. Omit it only for `custom`, which then applies everywhere you send. Derived from `number` when you supply an E.164 number and leave this out; a short code carries no country, so a rule for one must name it.
     * 
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }
    /**
     * The country this rule applies in, as an ISO 3166-1 alpha-2 code. It matches a message two ways: one received on any of your numbers in this country, and one sent by a subscriber whose own number is in it, wherever they text you. Rules for the country a message arrives in always outrank rules for the country its sender is in; within each, your rule wins over Bird's keywords for that country. To confine a rule to one of your numbers, set `number` instead. Required for `stop`, `start` and `help`, because those replace what Bird ships for one country and a worldwide rule would replace every country's. Omit it only for `custom`, which then applies everywhere you send. Derived from `number` when you supply an E.164 number and leave this out; a short code carries no country, so a rule for one must name it.
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
     * Which language this rule replaces, in countries where Bird ships keywords in more than one. Required there and rejected elsewhere. Listing the country's rules shows whether it applies and which languages are available.
     * 
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * Which language this rule replaces, in countries where Bird ships keywords in more than one. Required there and rejected elsewhere. Listing the country's rules shows whether it applies and which languages are available.
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
     * Narrows the rule to one number you hold, in E.164 format or as a short code. Omit to cover every number you hold in the country. The number must be one of yours and able to receive messages.
     * 
     *
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }
    /**
     * Narrows the rule to one number you hold, in E.164 format or as a short code. Omit to cover every number you hold in the country. The number must be one of yours and able to receive messages.
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
     * Extra keywords to match, on top of the ones Bird already ships for this operation and country. Omit to keep Bird's keywords and change only the reply, including keywords Bird adds later. You cannot remove one of Bird's keywords, and a keyword Bird has bound to another operation cannot be reused here. Required for `custom`, which inherits none.
     * 
     *
     * @return list<string>|null
     */
    public function getKeywords(): ?array
    {
        return $this->keywords;
    }
    /**
     * Extra keywords to match, on top of the ones Bird already ships for this operation and country. Omit to keep Bird's keywords and change only the reply, including keywords Bird adds later. You cannot remove one of Bird's keywords, and a keyword Bird has bound to another operation cannot be reused here. Required for `custom`, which inherits none.
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
     * The message to send back when a keyword matches, except on a `confirm` rule, which never sends one whatever this is set to. Set it to null together with `confirmed_self_managed` to send nothing at all.
     * 
     *
     * @return string|null
     */
    public function getReply(): ?string
    {
        return $this->reply;
    }
    /**
     * The message to send back when a keyword matches, except on a `confirm` rule, which never sends one whatever this is set to. Set it to null together with `confirmed_self_managed` to send nothing at all.
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
     * Set this with `reply: null` to confirm you send this reply from your own system, which switches Bird's auto-reply off for the rule. Required to send no reply, and rejected when a reply is given, so the two can never disagree.
     * 
     *
     * @return bool|null
     */
    public function getConfirmedSelfManaged(): ?bool
    {
        return $this->confirmedSelfManaged;
    }
    /**
     * Set this with `reply: null` to confirm you send this reply from your own system, which switches Bird's auto-reply off for the rule. Required to send no reply, and rejected when a reply is given, so the two can never disagree.
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
