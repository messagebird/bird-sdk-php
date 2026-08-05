<?php

namespace MessageBird\Wire\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use MessageBird\Wire\Runtime\Normalizer\CheckArray;
use MessageBird\Wire\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class EmailBounceCodeStatsPointBouncesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailBounceCodeStatsPointBounces::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailBounceCodeStatsPointBounces::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailBounceCodeStatsPointBounces();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('hard', $data) && $data['hard'] !== null) {
            $object->setHard($data['hard']);
            unset($data['hard']);
        }
        elseif (\array_key_exists('hard', $data) && $data['hard'] === null) {
            $object->setHard(null);
        }
        if (\array_key_exists('soft', $data) && $data['soft'] !== null) {
            $object->setSoft($data['soft']);
            unset($data['soft']);
        }
        elseif (\array_key_exists('soft', $data) && $data['soft'] === null) {
            $object->setSoft(null);
        }
        if (\array_key_exists('admin', $data) && $data['admin'] !== null) {
            $object->setAdmin($data['admin']);
            unset($data['admin']);
        }
        elseif (\array_key_exists('admin', $data) && $data['admin'] === null) {
            $object->setAdmin(null);
        }
        if (\array_key_exists('block', $data) && $data['block'] !== null) {
            $object->setBlock($data['block']);
            unset($data['block']);
        }
        elseif (\array_key_exists('block', $data) && $data['block'] === null) {
            $object->setBlock(null);
        }
        if (\array_key_exists('undetermined', $data) && $data['undetermined'] !== null) {
            $object->setUndetermined($data['undetermined']);
            unset($data['undetermined']);
        }
        elseif (\array_key_exists('undetermined', $data) && $data['undetermined'] === null) {
            $object->setUndetermined(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailBounceCodeStatsPointBounces::class => false];
    }
}
