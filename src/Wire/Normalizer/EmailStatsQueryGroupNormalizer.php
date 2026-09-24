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
class EmailStatsQueryGroupNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailStatsQueryGroup::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailStatsQueryGroup::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailStatsQueryGroup();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('dimensions', $data) && $data['dimensions'] !== null) {
            $object->setDimensions($this->denormalizer->denormalize($data['dimensions'], \MessageBird\Wire\Model\EmailStatsQueryDimensions::class, 'json', $context));
        }
        elseif (\array_key_exists('dimensions', $data) && $data['dimensions'] === null) {
            $object->setDimensions(null);
        }
        if (\array_key_exists('metrics', $data) && $data['metrics'] !== null) {
            $object->setMetrics($this->denormalizer->denormalize($data['metrics'], \MessageBird\Wire\Model\EmailStatsQueryMetrics::class, 'json', $context));
        }
        elseif (\array_key_exists('metrics', $data) && $data['metrics'] === null) {
            $object->setMetrics(null);
        }
        if (\array_key_exists('series', $data) && $data['series'] !== null) {
            $values = [];
            foreach ($data['series'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\EmailStatsQueryPoint::class, 'json', $context);
            }
            $object->setSeries($values);
        }
        elseif (\array_key_exists('series', $data) && $data['series'] === null) {
            $object->setSeries(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('series') && null !== $data->getSeries()) {
            $values = [];
            foreach ($data->getSeries() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['series'] = $values;
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailStatsQueryGroup::class => false];
    }
}
