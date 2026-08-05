<?php

namespace MessageBird\Wire\Model;

class SMSSegments
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
     * Number of segments the body is split into. Each segment is a billable unit.
     *
     * @var int|null
     */
    protected $count;
    /**
     * Encoding used for the body. `GSM_7BIT` fits 160 characters in a single segment (153 per part when multi-segment); `UCS2` is used when the body contains any character outside the GSM 03.38 alphabet (emoji, CJK, some accented characters) and fits 70 characters in a single segment (67 per part when multi-segment).
     * 
     *
     * @var string|null
     */
    protected $encoding;
    /**
     * Character count of the body under the selected encoding.
     *
     * @var int|null
     */
    protected $characters;
    /**
     * Number of segments the body is split into. Each segment is a billable unit.
     *
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->count;
    }
    /**
     * Number of segments the body is split into. Each segment is a billable unit.
     *
     * @param int|null $count
     *
     * @return self
     */
    public function setCount(?int $count): self
    {
        $this->initialized['count'] = true;
        $this->count = $count;
        return $this;
    }
    /**
     * Encoding used for the body. `GSM_7BIT` fits 160 characters in a single segment (153 per part when multi-segment); `UCS2` is used when the body contains any character outside the GSM 03.38 alphabet (emoji, CJK, some accented characters) and fits 70 characters in a single segment (67 per part when multi-segment).
     * 
     *
     * @return string|null
     */
    public function getEncoding(): ?string
    {
        return $this->encoding;
    }
    /**
     * Encoding used for the body. `GSM_7BIT` fits 160 characters in a single segment (153 per part when multi-segment); `UCS2` is used when the body contains any character outside the GSM 03.38 alphabet (emoji, CJK, some accented characters) and fits 70 characters in a single segment (67 per part when multi-segment).
     *
     * @param string|null $encoding
     *
     * @return self
     */
    public function setEncoding(?string $encoding): self
    {
        $this->initialized['encoding'] = true;
        $this->encoding = $encoding;
        return $this;
    }
    /**
     * Character count of the body under the selected encoding.
     *
     * @return int|null
     */
    public function getCharacters(): ?int
    {
        return $this->characters;
    }
    /**
     * Character count of the body under the selected encoding.
     *
     * @param int|null $characters
     *
     * @return self
     */
    public function setCharacters(?int $characters): self
    {
        $this->initialized['characters'] = true;
        $this->characters = $characters;
        return $this;
    }
}
