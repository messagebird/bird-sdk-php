<?php

namespace MessageBird\Wire\Model;

class ContactUpsertRequest
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
     * Contacts to create or update, matched automatically against every identifier an entry supplies. Existing contacts are updated with the fields each entry supplies; omitted fields keep their stored values, so an entry can set fields but never clear them. Unmatched entries create contacts.
     *
     * @var list<ContactCreateRequest>|null
     */
    protected $contacts;
    /**
     * Audiences every contact in this request is added to. Contacts that are already members are left in place. Every listed audience must exist, or the whole request fails with a validation error and nothing is written.
     *
     * @var list<string>|null
     */
    protected $audienceIds;
    /**
     * A contact identifier a batch entry can be matched on.
     *
     * @var string|null
     */
    protected $matchOn;
    /**
     * How a supplied `data` object is applied to an existing contact. The default `merge` mode adds the supplied keys to the contact's stored custom values. A key with a `null` value deletes that key. The `replace` mode overwrites the whole stored `data` map with the supplied map. In both modes a contact that omits `data` keeps its stored values unchanged, so an import that touches one attribute never wipes the others.
     * 
     *
     * @var string|null
     */
    protected $dataMode = 'merge';
    /**
     * Contacts to create or update, matched automatically against every identifier an entry supplies. Existing contacts are updated with the fields each entry supplies; omitted fields keep their stored values, so an entry can set fields but never clear them. Unmatched entries create contacts.
     *
     * @return list<ContactCreateRequest>|null
     */
    public function getContacts(): ?array
    {
        return $this->contacts;
    }
    /**
     * Contacts to create or update, matched automatically against every identifier an entry supplies. Existing contacts are updated with the fields each entry supplies; omitted fields keep their stored values, so an entry can set fields but never clear them. Unmatched entries create contacts.
     *
     * @param list<ContactCreateRequest>|null $contacts
     *
     * @return self
     */
    public function setContacts(?array $contacts): self
    {
        $this->initialized['contacts'] = true;
        $this->contacts = $contacts;
        return $this;
    }
    /**
     * Audiences every contact in this request is added to. Contacts that are already members are left in place. Every listed audience must exist, or the whole request fails with a validation error and nothing is written.
     *
     * @return list<string>|null
     */
    public function getAudienceIds(): ?array
    {
        return $this->audienceIds;
    }
    /**
     * Audiences every contact in this request is added to. Contacts that are already members are left in place. Every listed audience must exist, or the whole request fails with a validation error and nothing is written.
     *
     * @param list<string>|null $audienceIds
     *
     * @return self
     */
    public function setAudienceIds(?array $audienceIds): self
    {
        $this->initialized['audienceIds'] = true;
        $this->audienceIds = $audienceIds;
        return $this;
    }
    /**
     * A contact identifier a batch entry can be matched on.
     *
     * @return string|null
     */
    public function getMatchOn(): ?string
    {
        return $this->matchOn;
    }
    /**
     * A contact identifier a batch entry can be matched on.
     *
     * @param string|null $matchOn
     *
     * @return self
     */
    public function setMatchOn(?string $matchOn): self
    {
        $this->initialized['matchOn'] = true;
        $this->matchOn = $matchOn;
        return $this;
    }
    /**
     * How a supplied `data` object is applied to an existing contact. The default `merge` mode adds the supplied keys to the contact's stored custom values. A key with a `null` value deletes that key. The `replace` mode overwrites the whole stored `data` map with the supplied map. In both modes a contact that omits `data` keeps its stored values unchanged, so an import that touches one attribute never wipes the others.
     * 
     *
     * @return string|null
     */
    public function getDataMode(): ?string
    {
        return $this->dataMode;
    }
    /**
     * How a supplied `data` object is applied to an existing contact. The default `merge` mode adds the supplied keys to the contact's stored custom values. A key with a `null` value deletes that key. The `replace` mode overwrites the whole stored `data` map with the supplied map. In both modes a contact that omits `data` keeps its stored values unchanged, so an import that touches one attribute never wipes the others.
     *
     * @param string|null $dataMode
     *
     * @return self
     */
    public function setDataMode(?string $dataMode): self
    {
        $this->initialized['dataMode'] = true;
        $this->dataMode = $dataMode;
        return $this;
    }
}
