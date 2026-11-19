<?php

namespace MessageBird\Wire\Model;

/**
 * Options for a sign-in request. Omit the body to send the business's sign-in message.
 */
class AMBAuthenticationCreate
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
     * The sign-in message template to send in place of the business's sign-in message. The template must be a published sign-in message.
     * 
     *
     * @var AMBAuthenticationCreateTemplate|null
     */
    protected $template;
    /**
     * The sign-in message template to send in place of the business's sign-in message. The template must be a published sign-in message.
     * 
     *
     * @return AMBAuthenticationCreateTemplate|null
     */
    public function getTemplate(): ?AMBAuthenticationCreateTemplate
    {
        return $this->template;
    }
    /**
     * The sign-in message template to send in place of the business's sign-in message. The template must be a published sign-in message.
     *
     * @param AMBAuthenticationCreateTemplate|AMBAuthenticationTemplate|array|null $template
     *
     * @return self
     */
    public function setTemplate($template): self
    {
        $this->initialized['template'] = true;
        $this->template = \MessageBird\Core\ModelWrapper::normalize($template, AMBAuthenticationCreateTemplate::class);
        return $this;
    }
}
