<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateLanguageRejection extends \ArrayObject
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
     * Why Meta refused a language's content, in Meta's own vocabulary, lowercased. Read it with `reason`, which carries Meta's human-written detail, and `recommendation`, which carries its suggested fix. This is an open enum. Accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $category;
    /**
     * Meta's detail about the refusal, passed through unmodified.
     *
     * @var string|null
     */
    protected $reason;
    /**
     * Meta's suggested fix, the only thing it says about how to make the content acceptable. Meta sends it for some refusals and not others.
     * 
     *
     * @var string|null
     */
    protected $recommendation;
    /**
     * Why Meta refused a language's content, in Meta's own vocabulary, lowercased. Read it with `reason`, which carries Meta's human-written detail, and `recommendation`, which carries its suggested fix. This is an open enum. Accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Why Meta refused a language's content, in Meta's own vocabulary, lowercased. Read it with `reason`, which carries Meta's human-written detail, and `recommendation`, which carries its suggested fix. This is an open enum. Accept unrecognized values.
     *
     * @param string|null $category
     *
     * @return self
     */
    public function setCategory(?string $category): self
    {
        $this->initialized['category'] = true;
        $this->category = $category;
        return $this;
    }
    /**
     * Meta's detail about the refusal, passed through unmodified.
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
     * Meta's detail about the refusal, passed through unmodified.
     *
     * @param string|null $reason
     *
     * @return self
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;
        return $this;
    }
    /**
     * Meta's suggested fix, the only thing it says about how to make the content acceptable. Meta sends it for some refusals and not others.
     * 
     *
     * @return string|null
     */
    public function getRecommendation(): ?string
    {
        return $this->recommendation;
    }
    /**
     * Meta's suggested fix, the only thing it says about how to make the content acceptable. Meta sends it for some refusals and not others.
     *
     * @param string|null $recommendation
     *
     * @return self
     */
    public function setRecommendation(?string $recommendation): self
    {
        $this->initialized['recommendation'] = true;
        $this->recommendation = $recommendation;
        return $this;
    }
}
