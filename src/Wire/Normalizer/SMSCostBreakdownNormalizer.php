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
class SMSCostBreakdownNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\SMSCostBreakdown::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\SMSCostBreakdown::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\SMSCostBreakdown();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('per_segment', $data) && $data['per_segment'] !== null) {
            $object->setPerSegment($data['per_segment']);
        }
        elseif (\array_key_exists('per_segment', $data) && $data['per_segment'] === null) {
            $object->setPerSegment(null);
        }
        if (\array_key_exists('segments', $data) && $data['segments'] !== null) {
            $object->setSegments($data['segments']);
        }
        elseif (\array_key_exists('segments', $data) && $data['segments'] === null) {
            $object->setSegments(null);
        }
        if (\array_key_exists('country_code', $data) && $data['country_code'] !== null) {
            $object->setCountryCode($data['country_code']);
        }
        elseif (\array_key_exists('country_code', $data) && $data['country_code'] === null) {
            $object->setCountryCode(null);
        }
        if (\array_key_exists('carrier_surcharge', $data) && $data['carrier_surcharge'] !== null) {
            $object->setCarrierSurcharge($data['carrier_surcharge']);
        }
        elseif (\array_key_exists('carrier_surcharge', $data) && $data['carrier_surcharge'] === null) {
            $object->setCarrierSurcharge(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['per_segment'] = $data->getPerSegment();
        $dataArray['segments'] = $data->getSegments();
        $dataArray['country_code'] = $data->getCountryCode();
        $dataArray['carrier_surcharge'] = $data->getCarrierSurcharge();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\SMSCostBreakdown::class => false];
    }
}
