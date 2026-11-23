<?php

namespace MessageBird\Wire\Model;

/**
 * Successful section validation. Validation neither saves nor publishes content.
 */
class EmailBlockFragmentValidation
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
     * Plain text derived from this section's HTML.
     *
     * @var string|null
     */
    protected $text;
    /**
     * Plain text derived from this section's HTML.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * Plain text derived from this section's HTML.
     *
     * @param string|null $text
     *
     * @return self
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
}
