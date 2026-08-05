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
class EmailLocationStatsPointEngagementNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailLocationStatsPointEngagement::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailLocationStatsPointEngagement::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailLocationStatsPointEngagement();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('opens', $data) && $data['opens'] !== null) {
            $object->setOpens($data['opens']);
            unset($data['opens']);
        }
        elseif (\array_key_exists('opens', $data) && $data['opens'] === null) {
            $object->setOpens(null);
        }
        if (\array_key_exists('opens_non_prefetched', $data) && $data['opens_non_prefetched'] !== null) {
            $object->setOpensNonPrefetched($data['opens_non_prefetched']);
            unset($data['opens_non_prefetched']);
        }
        elseif (\array_key_exists('opens_non_prefetched', $data) && $data['opens_non_prefetched'] === null) {
            $object->setOpensNonPrefetched(null);
        }
        if (\array_key_exists('unique_opens', $data) && $data['unique_opens'] !== null) {
            $object->setUniqueOpens($data['unique_opens']);
            unset($data['unique_opens']);
        }
        elseif (\array_key_exists('unique_opens', $data) && $data['unique_opens'] === null) {
            $object->setUniqueOpens(null);
        }
        if (\array_key_exists('unique_opens_non_prefetched', $data) && $data['unique_opens_non_prefetched'] !== null) {
            $object->setUniqueOpensNonPrefetched($data['unique_opens_non_prefetched']);
            unset($data['unique_opens_non_prefetched']);
        }
        elseif (\array_key_exists('unique_opens_non_prefetched', $data) && $data['unique_opens_non_prefetched'] === null) {
            $object->setUniqueOpensNonPrefetched(null);
        }
        if (\array_key_exists('clicks', $data) && $data['clicks'] !== null) {
            $object->setClicks($data['clicks']);
            unset($data['clicks']);
        }
        elseif (\array_key_exists('clicks', $data) && $data['clicks'] === null) {
            $object->setClicks(null);
        }
        if (\array_key_exists('unique_clicks', $data) && $data['unique_clicks'] !== null) {
            $object->setUniqueClicks($data['unique_clicks']);
            unset($data['unique_clicks']);
        }
        elseif (\array_key_exists('unique_clicks', $data) && $data['unique_clicks'] === null) {
            $object->setUniqueClicks(null);
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
        return [\MessageBird\Wire\Model\EmailLocationStatsPointEngagement::class => false];
    }
}
