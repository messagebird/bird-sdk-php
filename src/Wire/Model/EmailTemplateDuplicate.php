<?php

namespace MessageBird\Wire\Model;

class EmailTemplateDuplicate
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
     * The copy's workspace-unique handle, and the stable alternative to the template ID when sending by template. It can contain lowercase letters, numbers, hyphens, and underscores. Omit it to derive one from the source (for example, `welcome-email-copy`), with a numeric suffix if that slug is already taken. Two prefixes are rejected: `bird_`, reserved for our built-in templates, and `emt_`, the template ID format, which a slug could never be distinguished from. If you supply a slug that is already in use in the workspace, the request returns a conflict.
     * 
     *
     * @var string|null
     */
    protected $slug;
    /**
     * The copy's workspace-unique handle, and the stable alternative to the template ID when sending by template. It can contain lowercase letters, numbers, hyphens, and underscores. Omit it to derive one from the source (for example, `welcome-email-copy`), with a numeric suffix if that slug is already taken. Two prefixes are rejected: `bird_`, reserved for our built-in templates, and `emt_`, the template ID format, which a slug could never be distinguished from. If you supply a slug that is already in use in the workspace, the request returns a conflict.
     * 
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The copy's workspace-unique handle, and the stable alternative to the template ID when sending by template. It can contain lowercase letters, numbers, hyphens, and underscores. Omit it to derive one from the source (for example, `welcome-email-copy`), with a numeric suffix if that slug is already taken. Two prefixes are rejected: `bird_`, reserved for our built-in templates, and `emt_`, the template ID format, which a slug could never be distinguished from. If you supply a slug that is already in use in the workspace, the request returns a conflict.
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
}
