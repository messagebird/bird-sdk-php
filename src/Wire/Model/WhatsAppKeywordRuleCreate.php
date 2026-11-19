<?php

namespace MessageBird\Wire\Model;

class WhatsAppKeywordRuleCreate
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
     * Closed on the write side: an operation Bird does not answer is rejected here rather than
     * stored as a rule that never fires. The read side is open, because Bird can gain an operation
     * without a new API version.
     * 
     *
     * @var string|null
     */
    protected $operation;
    /**
     * The country this rule applies in, as an ISO 3166-1 alpha-2 code. It matches the country of the person who messaged you, worked out from their phone number. Omit it to cover everyone, which is what Bird's own rules do.
     * 
     *
     * @var string|null
     */
    protected $country;
    /**
     * Limit the rule to one WhatsApp Business Account, identified by its WhatsApp-issued account ID or by the `waa_` ID Bird gives it. Either form resolves to the same account, and the rule stores and returns the WhatsApp-issued one. Omit it to cover every account in your workspace. The account must be one of yours.
     * 
     *
     * @var string|null
     */
    protected $waba;
    /**
     * Extra keywords to match, on top of the ones Bird already ships for this operation. Omit to keep Bird's keywords and change only the reply, including keywords Bird adds later. Use `excluded_keywords` to remove one of Bird's. A keyword Bird has bound to the other operation cannot be reused here.
     * 
     *
     * @var list<string>|null
     */
    protected $keywords;
    /**
     * Bird's keywords to remove for the people this rule covers. Rules are tried most specific first: a more specific rule of yours answers before this one, and with neither `country` nor `waba` so does Bird's rule for the sender's country. When this rule answers a message that is exactly an excluded keyword, no one is opted in or out, no reply is sent, and no less specific rule acts on it, so you must honour opt-outs it carries yourself. Without a `country`, the rule inherits Bird's keywords for each sender's country, so an exclusion covers only senders whose set has that keyword. Exclude every one of Bird's keywords to switch them off where this rule answers; a keyword Bird adds later still matches unless it is already excluded. It changes none of your other rules. A keyword cannot be both added and excluded.
     * 
     *
     * @var list<string>|null
     */
    protected $excludedKeywords;
    /**
     * The message to send back when a keyword matches. Omit it to send nothing.
     * 
     *
     * @var string|null
     */
    protected $reply;
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
     * Closed on the write side: an operation Bird does not answer is rejected here rather than
     * stored as a rule that never fires. The read side is open, because Bird can gain an operation
     * without a new API version.
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
    
    Closed on the write side: an operation Bird does not answer is rejected here rather than
    stored as a rule that never fires. The read side is open, because Bird can gain an operation
    without a new API version.
    
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
     * The country this rule applies in, as an ISO 3166-1 alpha-2 code. It matches the country of the person who messaged you, worked out from their phone number. Omit it to cover everyone, which is what Bird's own rules do.
     * 
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }
    /**
     * The country this rule applies in, as an ISO 3166-1 alpha-2 code. It matches the country of the person who messaged you, worked out from their phone number. Omit it to cover everyone, which is what Bird's own rules do.
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
     * Limit the rule to one WhatsApp Business Account, identified by its WhatsApp-issued account ID or by the `waa_` ID Bird gives it. Either form resolves to the same account, and the rule stores and returns the WhatsApp-issued one. Omit it to cover every account in your workspace. The account must be one of yours.
     * 
     *
     * @return string|null
     */
    public function getWaba(): ?string
    {
        return $this->waba;
    }
    /**
     * Limit the rule to one WhatsApp Business Account, identified by its WhatsApp-issued account ID or by the `waa_` ID Bird gives it. Either form resolves to the same account, and the rule stores and returns the WhatsApp-issued one. Omit it to cover every account in your workspace. The account must be one of yours.
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
     * Extra keywords to match, on top of the ones Bird already ships for this operation. Omit to keep Bird's keywords and change only the reply, including keywords Bird adds later. Use `excluded_keywords` to remove one of Bird's. A keyword Bird has bound to the other operation cannot be reused here.
     * 
     *
     * @return list<string>|null
     */
    public function getKeywords(): ?array
    {
        return $this->keywords;
    }
    /**
     * Extra keywords to match, on top of the ones Bird already ships for this operation. Omit to keep Bird's keywords and change only the reply, including keywords Bird adds later. Use `excluded_keywords` to remove one of Bird's. A keyword Bird has bound to the other operation cannot be reused here.
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
     * Bird's keywords to remove for the people this rule covers. Rules are tried most specific first: a more specific rule of yours answers before this one, and with neither `country` nor `waba` so does Bird's rule for the sender's country. When this rule answers a message that is exactly an excluded keyword, no one is opted in or out, no reply is sent, and no less specific rule acts on it, so you must honour opt-outs it carries yourself. Without a `country`, the rule inherits Bird's keywords for each sender's country, so an exclusion covers only senders whose set has that keyword. Exclude every one of Bird's keywords to switch them off where this rule answers; a keyword Bird adds later still matches unless it is already excluded. It changes none of your other rules. A keyword cannot be both added and excluded.
     * 
     *
     * @return list<string>|null
     */
    public function getExcludedKeywords(): ?array
    {
        return $this->excludedKeywords;
    }
    /**
     * Bird's keywords to remove for the people this rule covers. Rules are tried most specific first: a more specific rule of yours answers before this one, and with neither `country` nor `waba` so does Bird's rule for the sender's country. When this rule answers a message that is exactly an excluded keyword, no one is opted in or out, no reply is sent, and no less specific rule acts on it, so you must honour opt-outs it carries yourself. Without a `country`, the rule inherits Bird's keywords for each sender's country, so an exclusion covers only senders whose set has that keyword. Exclude every one of Bird's keywords to switch them off where this rule answers; a keyword Bird adds later still matches unless it is already excluded. It changes none of your other rules. A keyword cannot be both added and excluded.
     *
     * @param list<string>|null $excludedKeywords
     *
     * @return self
     */
    public function setExcludedKeywords(?array $excludedKeywords): self
    {
        $this->initialized['excludedKeywords'] = true;
        $this->excludedKeywords = $excludedKeywords;
        return $this;
    }
    /**
     * The message to send back when a keyword matches. Omit it to send nothing.
     * 
     *
     * @return string|null
     */
    public function getReply(): ?string
    {
        return $this->reply;
    }
    /**
     * The message to send back when a keyword matches. Omit it to send nothing.
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
