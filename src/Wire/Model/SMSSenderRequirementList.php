<?php

namespace MessageBird\Wire\Model;

class SMSSenderRequirementList
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
     * One entry per destination country this sender can reach, which is the level the decision to carry your message is made at. Ask this list whether you can send somewhere, and what it takes first. A country missing from it is one this sender has no route to at all, so no registration would open it.
     * 
     *
     * @var list<SMSSenderRequirement>|null
     */
    protected $data;
    /**
     * The same countries seen as the registrations they belong to, one entry per registration, with the countries each one covers. Ask this list what to do next: an entry whose status is `registration_required` is a registration you still have to make, and its countries are the ones it would open. Every other entry is a registration you have already made, so this list is the whole picture rather than only the part you have finished.
     * 
     *
     * @var list<SMSSenderProgram>|null
     */
    protected $programs;
    /**
     * One entry per destination country this sender can reach, which is the level the decision to carry your message is made at. Ask this list whether you can send somewhere, and what it takes first. A country missing from it is one this sender has no route to at all, so no registration would open it.
     * 
     *
     * @return list<SMSSenderRequirement>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * One entry per destination country this sender can reach, which is the level the decision to carry your message is made at. Ask this list whether you can send somewhere, and what it takes first. A country missing from it is one this sender has no route to at all, so no registration would open it.
     *
     * @param list<SMSSenderRequirement>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
    /**
     * The same countries seen as the registrations they belong to, one entry per registration, with the countries each one covers. Ask this list what to do next: an entry whose status is `registration_required` is a registration you still have to make, and its countries are the ones it would open. Every other entry is a registration you have already made, so this list is the whole picture rather than only the part you have finished.
     * 
     *
     * @return list<SMSSenderProgram>|null
     */
    public function getPrograms(): ?array
    {
        return $this->programs;
    }
    /**
     * The same countries seen as the registrations they belong to, one entry per registration, with the countries each one covers. Ask this list what to do next: an entry whose status is `registration_required` is a registration you still have to make, and its countries are the ones it would open. Every other entry is a registration you have already made, so this list is the whole picture rather than only the part you have finished.
     *
     * @param list<SMSSenderProgram>|null $programs
     *
     * @return self
     */
    public function setPrograms(?array $programs): self
    {
        $this->initialized['programs'] = true;
        $this->programs = $programs;
        return $this;
    }
}
