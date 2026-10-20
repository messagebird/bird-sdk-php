<?php

namespace MessageBird\Wire\Model;

class SMSSenderProgram
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
     * The program this registration runs. Null for the countries that asked for no registration at all, which are grouped together because the only thing they have in common is that you registered nothing for them.
     * 
     *
     * @var string|null
     */
    protected $program;
    /**
     * The resource this registration produced, which `program` tells you how to read: a toll-free verification for `tfn`, or a campaign number link for `10dlc`. The link connects this number to its campaign. Get the campaign from `GET /v1/sms/10dlc/campaign-number-links/{link_id}`. Null for a program that issues none, and for one you have not registered yet. Follow it when the status is under_review, because only that resource distinguishes a carrier still reviewing from one waiting on more information from you.
     * 
     *
     * @var string|null
     */
    protected $programRef;
    /**
     * Every country this one registration covers. Some programs open several at once, so a single toll-free verification or campaign registration can be what permits four destinations.
     * 
     *
     * @var list<string>|null
     */
    protected $countries;
    /**
     * Where this registration stands, for all of the countries it covers. `registration_required` means you have not made it yet and every country listed is waiting on it. Null in the one case where the countries have diverged and no single answer is true: read those countries individually.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * The program this registration runs. Null for the countries that asked for no registration at all, which are grouped together because the only thing they have in common is that you registered nothing for them.
     * 
     *
     * @return string|null
     */
    public function getProgram(): ?string
    {
        return $this->program;
    }
    /**
     * The program this registration runs. Null for the countries that asked for no registration at all, which are grouped together because the only thing they have in common is that you registered nothing for them.
     *
     * @param string|null $program
     *
     * @return self
     */
    public function setProgram(?string $program): self
    {
        $this->initialized['program'] = true;
        $this->program = $program;
        return $this;
    }
    /**
     * The resource this registration produced, which `program` tells you how to read: a toll-free verification for `tfn`, or a campaign number link for `10dlc`. The link connects this number to its campaign. Get the campaign from `GET /v1/sms/10dlc/campaign-number-links/{link_id}`. Null for a program that issues none, and for one you have not registered yet. Follow it when the status is under_review, because only that resource distinguishes a carrier still reviewing from one waiting on more information from you.
     * 
     *
     * @return string|null
     */
    public function getProgramRef(): ?string
    {
        return $this->programRef;
    }
    /**
     * The resource this registration produced, which `program` tells you how to read: a toll-free verification for `tfn`, or a campaign number link for `10dlc`. The link connects this number to its campaign. Get the campaign from `GET /v1/sms/10dlc/campaign-number-links/{link_id}`. Null for a program that issues none, and for one you have not registered yet. Follow it when the status is under_review, because only that resource distinguishes a carrier still reviewing from one waiting on more information from you.
     *
     * @param string|null $programRef
     *
     * @return self
     */
    public function setProgramRef(?string $programRef): self
    {
        $this->initialized['programRef'] = true;
        $this->programRef = $programRef;
        return $this;
    }
    /**
     * Every country this one registration covers. Some programs open several at once, so a single toll-free verification or campaign registration can be what permits four destinations.
     * 
     *
     * @return list<string>|null
     */
    public function getCountries(): ?array
    {
        return $this->countries;
    }
    /**
     * Every country this one registration covers. Some programs open several at once, so a single toll-free verification or campaign registration can be what permits four destinations.
     *
     * @param list<string>|null $countries
     *
     * @return self
     */
    public function setCountries(?array $countries): self
    {
        $this->initialized['countries'] = true;
        $this->countries = $countries;
        return $this;
    }
    /**
     * Where this registration stands, for all of the countries it covers. `registration_required` means you have not made it yet and every country listed is waiting on it. Null in the one case where the countries have diverged and no single answer is true: read those countries individually.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Where this registration stands, for all of the countries it covers. `registration_required` means you have not made it yet and every country listed is waiting on it. Null in the one case where the countries have diverged and no single answer is true: read those countries individually.
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
}
