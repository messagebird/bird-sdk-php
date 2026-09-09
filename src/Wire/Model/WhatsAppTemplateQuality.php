<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateQuality
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
     * Meta's quality rating for one language of a template, derived from how recipients respond to messages sent from it. The `red` score is the leading indicator of a pause. Reaching Meta's lowest rating pauses sending from that language for three hours; a second time pauses it for six, and a third disables it. The `unknown` score is a value Meta reports. When Meta has not rated the language, the rating object is absent. This is an open enum. Accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $currentScore;
    /**
     * Meta's quality rating for one language of a template, derived from how recipients respond to messages sent from it. The `red` score is the leading indicator of a pause. Reaching Meta's lowest rating pauses sending from that language for three hours; a second time pauses it for six, and a third disables it. The `unknown` score is a value Meta reports. When Meta has not rated the language, the rating object is absent. This is an open enum. Accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $previousScore;
    /**
     * When the rating last changed. A re-evaluation that lands on the same rating does not move it, so this answers how long the language has held its current rating.
     * 
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Meta's quality rating for one language of a template, derived from how recipients respond to messages sent from it. The `red` score is the leading indicator of a pause. Reaching Meta's lowest rating pauses sending from that language for three hours; a second time pauses it for six, and a third disables it. The `unknown` score is a value Meta reports. When Meta has not rated the language, the rating object is absent. This is an open enum. Accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getCurrentScore(): ?string
    {
        return $this->currentScore;
    }
    /**
     * Meta's quality rating for one language of a template, derived from how recipients respond to messages sent from it. The `red` score is the leading indicator of a pause. Reaching Meta's lowest rating pauses sending from that language for three hours; a second time pauses it for six, and a third disables it. The `unknown` score is a value Meta reports. When Meta has not rated the language, the rating object is absent. This is an open enum. Accept unrecognized values.
     *
     * @param string|null $currentScore
     *
     * @return self
     */
    public function setCurrentScore(?string $currentScore): self
    {
        $this->initialized['currentScore'] = true;
        $this->currentScore = $currentScore;
        return $this;
    }
    /**
     * Meta's quality rating for one language of a template, derived from how recipients respond to messages sent from it. The `red` score is the leading indicator of a pause. Reaching Meta's lowest rating pauses sending from that language for three hours; a second time pauses it for six, and a third disables it. The `unknown` score is a value Meta reports. When Meta has not rated the language, the rating object is absent. This is an open enum. Accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getPreviousScore(): ?string
    {
        return $this->previousScore;
    }
    /**
     * Meta's quality rating for one language of a template, derived from how recipients respond to messages sent from it. The `red` score is the leading indicator of a pause. Reaching Meta's lowest rating pauses sending from that language for three hours; a second time pauses it for six, and a third disables it. The `unknown` score is a value Meta reports. When Meta has not rated the language, the rating object is absent. This is an open enum. Accept unrecognized values.
     *
     * @param string|null $previousScore
     *
     * @return self
     */
    public function setPreviousScore(?string $previousScore): self
    {
        $this->initialized['previousScore'] = true;
        $this->previousScore = $previousScore;
        return $this;
    }
    /**
     * When the rating last changed. A re-evaluation that lands on the same rating does not move it, so this answers how long the language has held its current rating.
     * 
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When the rating last changed. A re-evaluation that lands on the same rating does not move it, so this answers how long the language has held its current rating.
     *
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
