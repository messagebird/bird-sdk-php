<?php

namespace MessageBird\Wire\Model;

class EmailMessageSendRequestTemplate extends \ArrayObject
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
     * The template to send, by its slug handle. A workspace template (for example `welcome-email`) or a built-in `system` template (for example `bird_welcome`).
     *
     * @var string|null
     */
    protected $slug;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $language;
    /**
     * Values for the template's variables, keyed by the variable name. A variable name is a single word.
     * 
     * Every variable the template's `variables` lists needs a value here. A send that leaves one out is rejected rather than delivered with a blank in it. Send values for everything in that list rather than only what you expect the language you are sending to use, because languages do not have to use the same variables and a value no language uses is simply ignored.
     * 
     * `bird` is reserved for the values we fill in ourselves, so a send that sets it is rejected. `parameters` is capped at 16 KB once serialized.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $parameters;
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
     * The template to send, by its slug handle. A workspace template (for example `welcome-email`) or a built-in `system` template (for example `bird_welcome`).
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The template to send, by its slug handle. A workspace template (for example `welcome-email`) or a built-in `system` template (for example `bird_welcome`).
     *
     * @param string|null $slug
     *
     * @return self
     */
    public function setSlug(?string $slug): self
    {
        $this->initialized['slug'] = true;
        $this->slug = $slug;
        return $this;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
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
     * Values for the template's variables, keyed by the variable name. A variable name is a single word.
     * 
     * Every variable the template's `variables` lists needs a value here. A send that leaves one out is rejected rather than delivered with a blank in it. Send values for everything in that list rather than only what you expect the language you are sending to use, because languages do not have to use the same variables and a value no language uses is simply ignored.
     * 
     * `bird` is reserved for the values we fill in ourselves, so a send that sets it is rejected. `parameters` is capped at 16 KB once serialized.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getParameters(): ?iterable
    {
        return $this->parameters;
    }
    /**
    * Values for the template's variables, keyed by the variable name. A variable name is a single word.
    
    Every variable the template's `variables` lists needs a value here. A send that leaves one out is rejected rather than delivered with a blank in it. Send values for everything in that list rather than only what you expect the language you are sending to use, because languages do not have to use the same variables and a value no language uses is simply ignored.
    
    `bird` is reserved for the values we fill in ourselves, so a send that sets it is rejected. `parameters` is capped at 16 KB once serialized.
    
    *
    * @param array<string, mixed>|null $parameters
    *
    * @return self
    */
    public function setParameters(?iterable $parameters): self
    {
        $this->initialized['parameters'] = true;
        $this->parameters = $parameters;
        return $this;
    }
}
