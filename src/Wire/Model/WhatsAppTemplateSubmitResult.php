<?php

namespace MessageBird\Wire\Model;

/**
 * The outcome of a submit. The shape is the same whether the submit was a check or a real one: read `valid` and `version` to see what happened.
 */
class WhatsAppTemplateSubmitResult
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
     * Whether the version passed every check.
     *
     * @var bool|null
     */
    protected $valid;
    /**
     * Every problem found across every language. One round trip identifies all problems. Empty when `valid` is true.
     * 
     *
     * @var list<WhatsAppTemplateSubmitProblem>|null
     */
    protected $errors;
    /**
     * The version this submit froze, or null when nothing was frozen: a check run, or a submit that found problems.
     * 
     *
     * @var WhatsAppTemplateSubmitResultVersion|null
     */
    protected $version;
    /**
     * What to do next with this outcome. Present on reads that compute it: an empty list
     * means there is nothing to do, and the field is absent entirely on responses that do
     * not report next actions.
     * 
     * A failed check routes back to the languages that need an edit; a clean one routes to
     * the real submit, and then to polling the template for WhatsApp's verdicts.
     * 
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * Whether the version passed every check.
     *
     * @return bool|null
     */
    public function getValid(): ?bool
    {
        return $this->valid;
    }
    /**
     * Whether the version passed every check.
     *
     * @param bool|null $valid
     *
     * @return self
     */
    public function setValid(?bool $valid): self
    {
        $this->initialized['valid'] = true;
        $this->valid = $valid;
        return $this;
    }
    /**
     * Every problem found across every language. One round trip identifies all problems. Empty when `valid` is true.
     * 
     *
     * @return list<WhatsAppTemplateSubmitProblem>|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }
    /**
     * Every problem found across every language. One round trip identifies all problems. Empty when `valid` is true.
     *
     * @param list<WhatsAppTemplateSubmitProblem>|null $errors
     *
     * @return self
     */
    public function setErrors(?array $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;
        return $this;
    }
    /**
     * The version this submit froze, or null when nothing was frozen: a check run, or a submit that found problems.
     * 
     *
     * @return WhatsAppTemplateSubmitResultVersion|null
     */
    public function getVersion(): ?WhatsAppTemplateSubmitResultVersion
    {
        return $this->version;
    }
    /**
     * The version this submit froze, or null when nothing was frozen: a check run, or a submit that found problems.
     *
     * @param WhatsAppTemplateSubmitResultVersion|null $version
     *
     * @return self
     */
    public function setVersion(?WhatsAppTemplateSubmitResultVersion $version): self
    {
        $this->initialized['version'] = true;
        $this->version = $version;
        return $this;
    }
    /**
     * What to do next with this outcome. Present on reads that compute it: an empty list
     * means there is nothing to do, and the field is absent entirely on responses that do
     * not report next actions.
     * 
     * A failed check routes back to the languages that need an edit; a clean one routes to
     * the real submit, and then to polling the template for WhatsApp's verdicts.
     * 
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
    * What to do next with this outcome. Present on reads that compute it: an empty list
    means there is nothing to do, and the field is absent entirely on responses that do
    not report next actions.
    
    A failed check routes back to the languages that need an edit; a clean one routes to
    the real submit, and then to polling the template for WhatsApp's verdicts.
    
    *
    * @param list<NextAction>|null $next
    *
    * @return self
    */
    public function setNext(?array $next): self
    {
        $this->initialized['next'] = true;
        $this->next = $next;
        return $this;
    }
}
