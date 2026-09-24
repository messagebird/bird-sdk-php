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
class EmailStatsQueryIPPoolFilterNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailStatsQueryIPPoolFilter::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailStatsQueryIPPoolFilter::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailStatsQueryIPPoolFilter();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('include', $data) && $data['include'] !== null) {
            $values = [];
            foreach ($data['include'] as $value) {
                $values[] = $value;
            }
            $object->setInclude($values);
        }
        elseif (\array_key_exists('include', $data) && $data['include'] === null) {
            $object->setInclude(null);
        }
        if (\array_key_exists('exclude', $data) && $data['exclude'] !== null) {
            $values_1 = [];
            foreach ($data['exclude'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setExclude($values_1);
        }
        elseif (\array_key_exists('exclude', $data) && $data['exclude'] === null) {
            $object->setExclude(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('include') && null !== $data->getInclude()) {
            $values = [];
            foreach ($data->getInclude() as $value) {
                $values[] = $value;
            }
            $dataArray['include'] = $values;
        }
        if ($data->isInitialized('exclude') && null !== $data->getExclude()) {
            $values_1 = [];
            foreach ($data->getExclude() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['exclude'] = $values_1;
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailStatsQueryIPPoolFilter::class => false];
    }
}
