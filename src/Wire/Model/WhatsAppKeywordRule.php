<?php

namespace MessageBird\Wire\Model;

class WhatsAppKeywordRule
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
     * @var string|null
     */
    protected $id;
    /**
     * Whether the rule is one Bird ships (`system`) or one your workspace created (`workspace`). Both kinds carry a `wkr_` ID and can be read; only a `workspace` rule can be changed or deleted. A `workspace` rule takes precedence over Bird's at the same grain, so it is how you replace a reply without losing the keywords Bird ships.
     * 
     *
     * @var string|null
     */
    protected $scope;
    /**
     * What Bird does when an inbound message matches the rule.
     * 
     * - `opt_out` records that the sender no longer consents to receive any messages from your
     *   WhatsApp Business Account, including transactional ones. Typing the word is the person's
     *   own statement, so it covers everything, unlike WhatsApp's built-in marketing opt-out
     *   control, which stops marketing alone.
     * - `opt_in` records that they consent again.
     * 
     * A rule's operation is fixed once created, and a keyword belongs to exactly one operation, so
     * a keyword Bird ships for `opt_out` cannot be reused for `opt_in`.
     * 
     * This is an open enum. Accept unrecognized values: SMS already answers `help`, `info`, `confirm`
     * and `custom`, and WhatsApp gains an operation without a new API version. Sending one Bird does
     * not answer yet is refused with `E15082`.
     * 
     *
     * @var string|null
     */
    protected $operation;
    /**
     * The country the rule applies in, as an ISO 3166-1 alpha-2 code. It is the country of the person who messaged you, worked out from their phone number, not the country of the account they messaged. Null means the rule applies worldwide, which is what Bird's own rules do. A rule for a country outranks a worldwide rule for the people it covers.
     * 
     *
     * @var string|null
     */
    protected $country;
    /**
     * The WhatsApp Business Account the rule is limited to, identified by its WhatsApp-issued account ID, or null when it covers every account in your workspace. Bird's own rules are always null.
     * 
     *
     * @var string|null
     */
    protected $waba;
    /**
     * The keywords this rule adds. For one of Bird's own rules this is the full set Bird ships. For a rule you created it is only what you added on top: it never restates or removes Bird's keywords, so `effective_keywords` is what actually matches.
     * 
     *
     * @var list<string>|null
     */
    protected $keywords;
    /**
     * Every keyword that matches this rule: Bird's keywords for the same operation and country, plus the ones you added. This is what an inbound message is compared against, and the whole message has to equal one of them. Keywords Bird adds later join it without you changing anything.
     * For a rule of **yours** with no `country`, this list is not the whole set it matches: such a rule compares against Bird's keywords for the sender's country, which the list cannot show because it does not know who is writing, so it shows Bird's worldwide keywords instead. Which rule answers decides whether that matters. Yours with no `country` and no `waba` sits below Bird's own country rule, so a sender in a country Bird ships a rule for is answered by that rule and your reply is not used. Yours with a `waba` and no `country` sits above it, so those senders match that country's keywords and get your reply, which is more keywords than this list names. Set a `country` on your own rule to see and extend exactly the set those senders match. A `system` rule is unaffected: each matches only its own keywords, and the ladder checks Bird's country rules separately from its worldwide one.
     * 
     *
     * @var list<string>|null
     */
    protected $effectiveKeywords;
    /**
     * The message sent back when one of the keywords matches, or null when no reply is sent. The reply goes out on the conversation the inbound message opened.
     * 
     *
     * @var string|null
     */
    protected $reply;
    /**
     * When the rule was created. On one of Bird's own rules this is when Bird last shipped a change to it.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the rule was last changed. On one of Bird's own rules this is when Bird last shipped a change to it.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
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
     * Whether the rule is one Bird ships (`system`) or one your workspace created (`workspace`). Both kinds carry a `wkr_` ID and can be read; only a `workspace` rule can be changed or deleted. A `workspace` rule takes precedence over Bird's at the same grain, so it is how you replace a reply without losing the keywords Bird ships.
     * 
     *
     * @return string|null
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }
    /**
     * Whether the rule is one Bird ships (`system`) or one your workspace created (`workspace`). Both kinds carry a `wkr_` ID and can be read; only a `workspace` rule can be changed or deleted. A `workspace` rule takes precedence over Bird's at the same grain, so it is how you replace a reply without losing the keywords Bird ships.
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
     * - `opt_out` records that the sender no longer consents to receive any messages from your
     *   WhatsApp Business Account, including transactional ones. Typing the word is the person's
     *   own statement, so it covers everything, unlike WhatsApp's built-in marketing opt-out
     *   control, which stops marketing alone.
     * - `opt_in` records that they consent again.
     * 
     * A rule's operation is fixed once created, and a keyword belongs to exactly one operation, so
     * a keyword Bird ships for `opt_out` cannot be reused for `opt_in`.
     * 
     * This is an open enum. Accept unrecognized values: SMS already answers `help`, `info`, `confirm`
     * and `custom`, and WhatsApp gains an operation without a new API version. Sending one Bird does
     * not answer yet is refused with `E15082`.
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
    
    - `opt_out` records that the sender no longer consents to receive any messages from your
     WhatsApp Business Account, including transactional ones. Typing the word is the person's
     own statement, so it covers everything, unlike WhatsApp's built-in marketing opt-out
     control, which stops marketing alone.
    - `opt_in` records that they consent again.
    
    A rule's operation is fixed once created, and a keyword belongs to exactly one operation, so
    a keyword Bird ships for `opt_out` cannot be reused for `opt_in`.
    
    This is an open enum. Accept unrecognized values: SMS already answers `help`, `info`, `confirm`
    and `custom`, and WhatsApp gains an operation without a new API version. Sending one Bird does
    not answer yet is refused with `E15082`.
    
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
     * The country the rule applies in, as an ISO 3166-1 alpha-2 code. It is the country of the person who messaged you, worked out from their phone number, not the country of the account they messaged. Null means the rule applies worldwide, which is what Bird's own rules do. A rule for a country outranks a worldwide rule for the people it covers.
     * 
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }
    /**
     * The country the rule applies in, as an ISO 3166-1 alpha-2 code. It is the country of the person who messaged you, worked out from their phone number, not the country of the account they messaged. Null means the rule applies worldwide, which is what Bird's own rules do. A rule for a country outranks a worldwide rule for the people it covers.
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
     * The WhatsApp Business Account the rule is limited to, identified by its WhatsApp-issued account ID, or null when it covers every account in your workspace. Bird's own rules are always null.
     * 
     *
     * @return string|null
     */
    public function getWaba(): ?string
    {
        return $this->waba;
    }
    /**
     * The WhatsApp Business Account the rule is limited to, identified by its WhatsApp-issued account ID, or null when it covers every account in your workspace. Bird's own rules are always null.
     *
     * @param string|null $waba
     *
     * @return self
     */
    public function setWaba(?string $waba): self
    {
        $this->initialized['waba'] = true;
        $this->waba = $waba;
        return $this;
    }
    /**
     * The keywords this rule adds. For one of Bird's own rules this is the full set Bird ships. For a rule you created it is only what you added on top: it never restates or removes Bird's keywords, so `effective_keywords` is what actually matches.
     * 
     *
     * @return list<string>|null
     */
    public function getKeywords(): ?array
    {
        return $this->keywords;
    }
    /**
     * The keywords this rule adds. For one of Bird's own rules this is the full set Bird ships. For a rule you created it is only what you added on top: it never restates or removes Bird's keywords, so `effective_keywords` is what actually matches.
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
     * Every keyword that matches this rule: Bird's keywords for the same operation and country, plus the ones you added. This is what an inbound message is compared against, and the whole message has to equal one of them. Keywords Bird adds later join it without you changing anything.
     * For a rule of **yours** with no `country`, this list is not the whole set it matches: such a rule compares against Bird's keywords for the sender's country, which the list cannot show because it does not know who is writing, so it shows Bird's worldwide keywords instead. Which rule answers decides whether that matters. Yours with no `country` and no `waba` sits below Bird's own country rule, so a sender in a country Bird ships a rule for is answered by that rule and your reply is not used. Yours with a `waba` and no `country` sits above it, so those senders match that country's keywords and get your reply, which is more keywords than this list names. Set a `country` on your own rule to see and extend exactly the set those senders match. A `system` rule is unaffected: each matches only its own keywords, and the ladder checks Bird's country rules separately from its worldwide one.
     * 
     *
     * @return list<string>|null
     */
    public function getEffectiveKeywords(): ?array
    {
        return $this->effectiveKeywords;
    }
    /**
    * Every keyword that matches this rule: Bird's keywords for the same operation and country, plus the ones you added. This is what an inbound message is compared against, and the whole message has to equal one of them. Keywords Bird adds later join it without you changing anything.
    For a rule of **yours** with no `country`, this list is not the whole set it matches: such a rule compares against Bird's keywords for the sender's country, which the list cannot show because it does not know who is writing, so it shows Bird's worldwide keywords instead. Which rule answers decides whether that matters. Yours with no `country` and no `waba` sits below Bird's own country rule, so a sender in a country Bird ships a rule for is answered by that rule and your reply is not used. Yours with a `waba` and no `country` sits above it, so those senders match that country's keywords and get your reply, which is more keywords than this list names. Set a `country` on your own rule to see and extend exactly the set those senders match. A `system` rule is unaffected: each matches only its own keywords, and the ladder checks Bird's country rules separately from its worldwide one.
    
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
     * The message sent back when one of the keywords matches, or null when no reply is sent. The reply goes out on the conversation the inbound message opened.
     * 
     *
     * @return string|null
     */
    public function getReply(): ?string
    {
        return $this->reply;
    }
    /**
     * The message sent back when one of the keywords matches, or null when no reply is sent. The reply goes out on the conversation the inbound message opened.
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
     * When the rule was created. On one of Bird's own rules this is when Bird last shipped a change to it.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the rule was created. On one of Bird's own rules this is when Bird last shipped a change to it.
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
     * When the rule was last changed. On one of Bird's own rules this is when Bird last shipped a change to it.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When the rule was last changed. On one of Bird's own rules this is when Bird last shipped a change to it.
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
