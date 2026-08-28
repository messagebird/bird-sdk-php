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
     * Encoding used for the body. The `GSM_7BIT` encoding fits 160 septets
     * (seven-bit units) in one segment, or 153 per part in a multi-segment
     * message. The `UCS2` encoding applies when the body contains a character
     * outside the GSM 03.38 alphabet, including emoji, CJK, and some accented
     * characters. It fits 70 UTF-16 code units in one segment, or 67 per part.
     * 
     * Neither limit counts characters, and both alphabets have characters that
     * cost two units. Under `GSM_7BIT` there are ten such entries, and they are
     * the whole set: `^`, `{`, `}`, `\`, `[`, `]`, `~`, `|`, `€`, and the form
     * feed control. Eighty of those fill a single segment. Under `UCS2` an emoji
     * outside the Basic Multilingual Plane is a surrogate pair costing two code
     * units, so 35 of those fill a single segment.
     * 
     *
     * @var string|null
     */
    protected $encoding;
    /**
     * Character count of the body, counted in Unicode code points under either encoding. This is not the segment measure: a `GSM_7BIT` extended-table character counts once here but costs two septets, and a `UCS2` emoji outside the Basic Multilingual Plane counts once here but costs two of the segment's 70 code units.
     * 
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
     * Encoding used for the body. The `GSM_7BIT` encoding fits 160 septets
     * (seven-bit units) in one segment, or 153 per part in a multi-segment
     * message. The `UCS2` encoding applies when the body contains a character
     * outside the GSM 03.38 alphabet, including emoji, CJK, and some accented
     * characters. It fits 70 UTF-16 code units in one segment, or 67 per part.
     * 
     * Neither limit counts characters, and both alphabets have characters that
     * cost two units. Under `GSM_7BIT` there are ten such entries, and they are
     * the whole set: `^`, `{`, `}`, `\`, `[`, `]`, `~`, `|`, `€`, and the form
     * feed control. Eighty of those fill a single segment. Under `UCS2` an emoji
     * outside the Basic Multilingual Plane is a surrogate pair costing two code
     * units, so 35 of those fill a single segment.
     * 
     *
     * @return string|null
     */
    public function getEncoding(): ?string
    {
        return $this->encoding;
    }
    /**
    * Encoding used for the body. The `GSM_7BIT` encoding fits 160 septets
    (seven-bit units) in one segment, or 153 per part in a multi-segment
    message. The `UCS2` encoding applies when the body contains a character
    outside the GSM 03.38 alphabet, including emoji, CJK, and some accented
    characters. It fits 70 UTF-16 code units in one segment, or 67 per part.
    
    Neither limit counts characters, and both alphabets have characters that
    cost two units. Under `GSM_7BIT` there are ten such entries, and they are
    the whole set: `^`, `{`, `}`, `\`, `[`, `]`, `~`, `|`, `€`, and the form
    feed control. Eighty of those fill a single segment. Under `UCS2` an emoji
    outside the Basic Multilingual Plane is a surrogate pair costing two code
    units, so 35 of those fill a single segment.
    
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
     * Character count of the body, counted in Unicode code points under either encoding. This is not the segment measure: a `GSM_7BIT` extended-table character counts once here but costs two septets, and a `UCS2` emoji outside the Basic Multilingual Plane counts once here but costs two of the segment's 70 code units.
     * 
     *
     * @return int|null
     */
    public function getCharacters(): ?int
    {
        return $this->characters;
    }
    /**
     * Character count of the body, counted in Unicode code points under either encoding. This is not the segment measure: a `GSM_7BIT` extended-table character counts once here but costs two septets, and a `UCS2` emoji outside the Basic Multilingual Plane counts once here but costs two of the segment's 70 code units.
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
