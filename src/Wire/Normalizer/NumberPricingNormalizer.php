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
class NumberPricingNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\NumberPricing::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\NumberPricing::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\NumberPricing();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('recurring_price', $data) && $data['recurring_price'] !== null) {
            $object->setRecurringPrice($this->denormalizer->denormalize($data['recurring_price'], \MessageBird\Wire\Model\NumberPricingRecurringPrice::class, 'json', $context));
            unset($data['recurring_price']);
        }
        elseif (\array_key_exists('recurring_price', $data) && $data['recurring_price'] === null) {
            $object->setRecurringPrice(null);
        }
        if (\array_key_exists('recurring_period', $data) && $data['recurring_period'] !== null) {
            $object->setRecurringPeriod($this->denormalizer->denormalize($data['recurring_period'], \MessageBird\Wire\Model\NumberPricingRecurringPeriod::class, 'json', $context));
            unset($data['recurring_period']);
        }
        elseif (\array_key_exists('recurring_period', $data) && $data['recurring_period'] === null) {
            $object->setRecurringPeriod(null);
        }
        if (\array_key_exists('intervals_per_charge', $data) && $data['intervals_per_charge'] !== null) {
            $object->setIntervalsPerCharge($data['intervals_per_charge']);
            unset($data['intervals_per_charge']);
        }
        elseif (\array_key_exists('intervals_per_charge', $data) && $data['intervals_per_charge'] === null) {
            $object->setIntervalsPerCharge(null);
        }
        if (\array_key_exists('error', $data) && $data['error'] !== null) {
            $object->setError($this->denormalizer->denormalize($data['error'], \MessageBird\Wire\Model\NumberPricingError::class, 'json', $context));
            unset($data['error']);
        }
        elseif (\array_key_exists('error', $data) && $data['error'] === null) {
            $object->setError(null);
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
        $dataArray['recurring_price'] = $this->normalizer->normalize($data->getRecurringPrice(), 'json', $context);
        $dataArray['recurring_period'] = $this->normalizer->normalize($data->getRecurringPeriod(), 'json', $context);
        $dataArray['intervals_per_charge'] = $data->getIntervalsPerCharge();
        $dataArray['error'] = $this->normalizer->normalize($data->getError(), 'json', $context);
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\NumberPricing::class => false];
    }
}
