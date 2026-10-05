<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use MessageBird\Core\ModelWrapper;
use PHPUnit\Framework\TestCase;

final class ModelWrapperTest extends TestCase
{
    public function testBaseFieldsAndAdditionalPropertiesSurviveNormalization(): void
    {
        $base = new WrapperEvidenceBase(['extra' => ['nested' => true]]);
        $base->setReference(null);

        $wrapper = ModelWrapper::normalize($base, WrapperEvidence::class);

        self::assertInstanceOf(WrapperEvidence::class, $wrapper);
        self::assertSame($base->getArrayCopy(), $wrapper->getArrayCopy());
        self::assertTrue($wrapper->isInitialized('reference'));
        self::assertNull($wrapper->getReference());
        self::assertSame($wrapper, ModelWrapper::normalize($wrapper, WrapperEvidence::class));
        self::assertNull(ModelWrapper::normalize(null, WrapperEvidence::class));
    }
}

class WrapperEvidenceBase extends \ArrayObject
{
    protected array $initialized = [];
    protected ?string $reference;

    public function isInitialized(string $property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function setReference(?string $reference): self
    {
        $this->initialized['reference'] = true;
        $this->reference = $reference;
        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }
}

class WrapperEvidence extends WrapperEvidenceBase
{
}
