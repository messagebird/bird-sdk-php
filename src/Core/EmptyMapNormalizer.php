<?php

declare(strict_types=1);

namespace MessageBird\Core;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * A wire map model extends \ArrayObject, and jane normalizes an empty one to an
 * empty PHP array, which encodes as `[]`. Ahead of jane in the stack, this keeps
 * it an empty \ArrayObject, which the JSON encoder writes as `{}`. Every jane
 * model extends \ArrayObject, so a map is told apart by declaring no field of
 * its own beyond jane's `initialized` tracking.
 *
 * @internal
 */
final class EmptyMapNormalizer implements NormalizerInterface
{
    /** @var array<class-string, bool> */
    private array $maps = [];

    /**
     * @return \ArrayObject<string, never>
     */
    public function normalize(mixed $data, ?string $format = null, array $context = []): \ArrayObject
    {
        return new \ArrayObject();
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof \ArrayObject && $data->count() === 0 && $this->isMap($data::class);
    }

    /**
     * @param class-string $class
     */
    private function isMap(string $class): bool
    {
        if (!isset($this->maps[$class])) {
            $fields = array_filter(
                (new \ReflectionClass($class))->getProperties(),
                static fn (\ReflectionProperty $p): bool => $p->getName() !== 'initialized',
            );
            $this->maps[$class] = $fields === [];
        }

        return $this->maps[$class];
    }

    public function getSupportedTypes(?string $format): array
    {
        return ['*' => false];
    }
}
