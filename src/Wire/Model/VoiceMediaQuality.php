<?php

namespace MessageBird\Wire\Model;

class VoiceMediaQuality
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
     * Mean opinion score, the single number for how the call sounded, from 1 (unintelligible) to 5 (as good as being in the same room). Anything at or above 4.0 is what most people would call a clear line, and below 3.5 is where callers start asking each other to repeat themselves. The three other fields are the impairments that move it.
     * 
     *
     * @var float|null
     */
    protected $mos;
    /**
     * Variation in the arrival time of the audio packets, in milliseconds. Audio arriving unevenly is heard as choppiness even when no packets are lost at all.
     *
     * @var int|null
     */
    protected $jitterMs;
    /**
     * Percentage of audio packets that never arrived. Heard as brief gaps or clipped words, and the impairment that degrades a call fastest.
     *
     * @var float|null
     */
    protected $packetLossPct;
    /**
     * Round-trip time between the two ends, in milliseconds. It does not distort the audio. Above roughly 300 ms, the two parties start talking over each other.
     *
     * @var int|null
     */
    protected $roundTripTimeMs;
    /**
     * Mean opinion score, the single number for how the call sounded, from 1 (unintelligible) to 5 (as good as being in the same room). Anything at or above 4.0 is what most people would call a clear line, and below 3.5 is where callers start asking each other to repeat themselves. The three other fields are the impairments that move it.
     * 
     *
     * @return float|null
     */
    public function getMos(): ?float
    {
        return $this->mos;
    }
    /**
     * Mean opinion score, the single number for how the call sounded, from 1 (unintelligible) to 5 (as good as being in the same room). Anything at or above 4.0 is what most people would call a clear line, and below 3.5 is where callers start asking each other to repeat themselves. The three other fields are the impairments that move it.
     *
     * @param float|null $mos
     *
     * @return self
     */
    public function setMos(?float $mos): self
    {
        $this->initialized['mos'] = true;
        $this->mos = $mos;
        return $this;
    }
    /**
     * Variation in the arrival time of the audio packets, in milliseconds. Audio arriving unevenly is heard as choppiness even when no packets are lost at all.
     *
     * @return int|null
     */
    public function getJitterMs(): ?int
    {
        return $this->jitterMs;
    }
    /**
     * Variation in the arrival time of the audio packets, in milliseconds. Audio arriving unevenly is heard as choppiness even when no packets are lost at all.
     *
     * @param int|null $jitterMs
     *
     * @return self
     */
    public function setJitterMs(?int $jitterMs): self
    {
        $this->initialized['jitterMs'] = true;
        $this->jitterMs = $jitterMs;
        return $this;
    }
    /**
     * Percentage of audio packets that never arrived. Heard as brief gaps or clipped words, and the impairment that degrades a call fastest.
     *
     * @return float|null
     */
    public function getPacketLossPct(): ?float
    {
        return $this->packetLossPct;
    }
    /**
     * Percentage of audio packets that never arrived. Heard as brief gaps or clipped words, and the impairment that degrades a call fastest.
     *
     * @param float|null $packetLossPct
     *
     * @return self
     */
    public function setPacketLossPct(?float $packetLossPct): self
    {
        $this->initialized['packetLossPct'] = true;
        $this->packetLossPct = $packetLossPct;
        return $this;
    }
    /**
     * Round-trip time between the two ends, in milliseconds. It does not distort the audio. Above roughly 300 ms, the two parties start talking over each other.
     *
     * @return int|null
     */
    public function getRoundTripTimeMs(): ?int
    {
        return $this->roundTripTimeMs;
    }
    /**
     * Round-trip time between the two ends, in milliseconds. It does not distort the audio. Above roughly 300 ms, the two parties start talking over each other.
     *
     * @param int|null $roundTripTimeMs
     *
     * @return self
     */
    public function setRoundTripTimeMs(?int $roundTripTimeMs): self
    {
        $this->initialized['roundTripTimeMs'] = true;
        $this->roundTripTimeMs = $roundTripTimeMs;
        return $this;
    }
}
