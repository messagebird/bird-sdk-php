<?php

namespace MessageBird\Wire\Model;

class EmailClientSupport
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
     * Which mail client a finding applies to. A finding's `message` names at most
     * Apple Mail, Gmail, Outlook, and Yahoo; its `unsupported_clients` and
     * `partial_clients` name every client affected.
     * 
     * - `gmail`: Gmail
     * - `outlook`: Outlook
     * - `yahoo`: Yahoo
     * - `apple_mail`: Apple Mail
     * - `aol`: AOL
     * - `thunderbird`: Mozilla Thunderbird
     * - `samsung_email`: Samsung Email
     * - `sfr`: SFR
     * - `orange`: Orange
     * - `protonmail`: ProtonMail
     * - `hey`: HEY
     * - `mail_ru`: Mail.ru
     * - `fastmail`: Fastmail
     * - `laposte`: LaPoste.net
     * - `gmx`: GMX
     * - `web_de`: WEB.DE
     * - `ionos_1and1`: 1&1
     * - `wp_pl`: WP.pl
     * 
     *
     * @var string|null
     */
    protected $family;
    /**
     * Which of the family's platforms this applies to, in alphabetical order.
     * 
     *
     * @var list<string>|null
     */
    protected $platforms;
    /**
     * Which mail client a finding applies to. A finding's `message` names at most
     * Apple Mail, Gmail, Outlook, and Yahoo; its `unsupported_clients` and
     * `partial_clients` name every client affected.
     * 
     * - `gmail`: Gmail
     * - `outlook`: Outlook
     * - `yahoo`: Yahoo
     * - `apple_mail`: Apple Mail
     * - `aol`: AOL
     * - `thunderbird`: Mozilla Thunderbird
     * - `samsung_email`: Samsung Email
     * - `sfr`: SFR
     * - `orange`: Orange
     * - `protonmail`: ProtonMail
     * - `hey`: HEY
     * - `mail_ru`: Mail.ru
     * - `fastmail`: Fastmail
     * - `laposte`: LaPoste.net
     * - `gmx`: GMX
     * - `web_de`: WEB.DE
     * - `ionos_1and1`: 1&1
     * - `wp_pl`: WP.pl
     * 
     *
     * @return string|null
     */
    public function getFamily(): ?string
    {
        return $this->family;
    }
    /**
    * Which mail client a finding applies to. A finding's `message` names at most
    Apple Mail, Gmail, Outlook, and Yahoo; its `unsupported_clients` and
    `partial_clients` name every client affected.
    
    - `gmail`: Gmail
    - `outlook`: Outlook
    - `yahoo`: Yahoo
    - `apple_mail`: Apple Mail
    - `aol`: AOL
    - `thunderbird`: Mozilla Thunderbird
    - `samsung_email`: Samsung Email
    - `sfr`: SFR
    - `orange`: Orange
    - `protonmail`: ProtonMail
    - `hey`: HEY
    - `mail_ru`: Mail.ru
    - `fastmail`: Fastmail
    - `laposte`: LaPoste.net
    - `gmx`: GMX
    - `web_de`: WEB.DE
    - `ionos_1and1`: 1&1
    - `wp_pl`: WP.pl
    
    *
    * @param string|null $family
    *
    * @return self
    */
    public function setFamily(?string $family): self
    {
        $this->initialized['family'] = true;
        $this->family = $family;
        return $this;
    }
    /**
     * Which of the family's platforms this applies to, in alphabetical order.
     * 
     *
     * @return list<string>|null
     */
    public function getPlatforms(): ?array
    {
        return $this->platforms;
    }
    /**
     * Which of the family's platforms this applies to, in alphabetical order.
     *
     * @param list<string>|null $platforms
     *
     * @return self
     */
    public function setPlatforms(?array $platforms): self
    {
        $this->initialized['platforms'] = true;
        $this->platforms = $platforms;
        return $this;
    }
}
