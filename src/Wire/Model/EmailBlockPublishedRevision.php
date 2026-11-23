<?php

namespace MessageBird\Wire\Model;

/**
 * A revision that became the published content of one block language.
 */
class EmailBlockPublishedRevision
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
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $language;
    /**
     * @var string|null
     */
    protected $id;
    /**
     * Publication number within this block language.
     *
     * @var int|null
     */
    protected $versionNumber;
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
     * Publication number within this block language.
     *
     * @return int|null
     */
    public function getVersionNumber(): ?int
    {
        return $this->versionNumber;
    }
    /**
     * Publication number within this block language.
     *
     * @param int|null $versionNumber
     *
     * @return self
     */
    public function setVersionNumber(?int $versionNumber): self
    {
        $this->initialized['versionNumber'] = true;
        $this->versionNumber = $versionNumber;
        return $this;
    }
}
