<?php

namespace MessageBird\Wire\Model;

class EmailTemplateSend
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
     * Values for caller parameters, keyed by name. A parameter name is a single word.
     * 
     * Caller parameters have `system` set to false or absent in the template's
     * `variables` list. Supply each required caller parameter used by the
     * resolved send language; omitting one returns `422`. A version's list
     * covers all its languages, and values unused by the resolved language are
     * ignored.
     * 
     * The `bird` namespace is reserved for values filled by Bird, so a send that
     * sets it is rejected. `parameters` is capped at 16 KB once serialized.
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
     * Values for caller parameters, keyed by name. A parameter name is a single word.
     * 
     * Caller parameters have `system` set to false or absent in the template's
     * `variables` list. Supply each required caller parameter used by the
     * resolved send language; omitting one returns `422`. A version's list
     * covers all its languages, and values unused by the resolved language are
     * ignored.
     * 
     * The `bird` namespace is reserved for values filled by Bird, so a send that
     * sets it is rejected. `parameters` is capped at 16 KB once serialized.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getParameters(): ?iterable
    {
        return $this->parameters;
    }
    /**
    * Values for caller parameters, keyed by name. A parameter name is a single word.
    
    Caller parameters have `system` set to false or absent in the template's
    `variables` list. Supply each required caller parameter used by the
    resolved send language; omitting one returns `422`. A version's list
    covers all its languages, and values unused by the resolved language are
    ignored.
    
    The `bird` namespace is reserved for values filled by Bird, so a send that
    sets it is rejected. `parameters` is capped at 16 KB once serialized.
    
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
