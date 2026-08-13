<?php

namespace MessageBird\Wire\Model;

class PhoneNumberLookupRoaming extends \ArrayObject
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
    protected $status;
    /**
     * Whether the number is currently roaming outside its home network. Present only when `status` is `ok`.
     *
     * @var bool|null
     */
    protected $isRoaming;
    /**
     * The mobile country code of the visited network. Absent when the number is not roaming or the visited network is not reported.
     *
     * @var string|null
     */
    protected $mcc;
    /**
     * The mobile network code of the visited network. Absent when the number is not roaming or the visited network is not reported.
     *
     * @var string|null
     */
    protected $mnc;
    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
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
    /**
     * Whether the number is currently roaming outside its home network. Present only when `status` is `ok`.
     *
     * @return bool|null
     */
    public function getIsRoaming(): ?bool
    {
        return $this->isRoaming;
    }
    /**
     * Whether the number is currently roaming outside its home network. Present only when `status` is `ok`.
     *
     * @param bool|null $isRoaming
     *
     * @return self
     */
    public function setIsRoaming(?bool $isRoaming): self
    {
        $this->initialized['isRoaming'] = true;
        $this->isRoaming = $isRoaming;
        return $this;
    }
    /**
     * The mobile country code of the visited network. Absent when the number is not roaming or the visited network is not reported.
     *
     * @return string|null
     */
    public function getMcc(): ?string
    {
        return $this->mcc;
    }
    /**
     * The mobile country code of the visited network. Absent when the number is not roaming or the visited network is not reported.
     *
     * @param string|null $mcc
     *
     * @return self
     */
    public function setMcc(?string $mcc): self
    {
        $this->initialized['mcc'] = true;
        $this->mcc = $mcc;
        return $this;
    }
    /**
     * The mobile network code of the visited network. Absent when the number is not roaming or the visited network is not reported.
     *
     * @return string|null
     */
    public function getMnc(): ?string
    {
        return $this->mnc;
    }
    /**
     * The mobile network code of the visited network. Absent when the number is not roaming or the visited network is not reported.
     *
     * @param string|null $mnc
     *
     * @return self
     */
    public function setMnc(?string $mnc): self
    {
        $this->initialized['mnc'] = true;
        $this->mnc = $mnc;
        return $this;
    }
}
