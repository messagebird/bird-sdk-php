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
class AvailableNumberPricingNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AvailableNumberPricing::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AvailableNumberPricing::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AvailableNumberPricing();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('setup_price', $data) && $data['setup_price'] !== null) {
            $object->setSetupPrice($this->denormalizer->denormalize($data['setup_price'], \MessageBird\Wire\Model\AvailableNumberPricingSetupPrice::class, 'json', $context));
        }
        elseif (\array_key_exists('setup_price', $data) && $data['setup_price'] === null) {
            $object->setSetupPrice(null);
        }
        if (\array_key_exists('recurring_price', $data) && $data['recurring_price'] !== null) {
            $object->setRecurringPrice($this->denormalizer->denormalize($data['recurring_price'], \MessageBird\Wire\Model\AvailableNumberPricingRecurringPrice::class, 'json', $context));
        }
        elseif (\array_key_exists('recurring_price', $data) && $data['recurring_price'] === null) {
            $object->setRecurringPrice(null);
        }
        if (\array_key_exists('recurring_period', $data) && $data['recurring_period'] !== null) {
            $object->setRecurringPeriod($this->denormalizer->denormalize($data['recurring_period'], \MessageBird\Wire\Model\AvailableNumberPricingRecurringPeriod::class, 'json', $context));
        }
        elseif (\array_key_exists('recurring_period', $data) && $data['recurring_period'] === null) {
            $object->setRecurringPeriod(null);
        }
        if (\array_key_exists('intervals_per_charge', $data) && $data['intervals_per_charge'] !== null) {
            $object->setIntervalsPerCharge($data['intervals_per_charge']);
        }
        elseif (\array_key_exists('intervals_per_charge', $data) && $data['intervals_per_charge'] === null) {
            $object->setIntervalsPerCharge(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['setup_price'] = $this->normalizer->normalize($data->getSetupPrice(), 'json', $context);
        $dataArray['recurring_price'] = $this->normalizer->normalize($data->getRecurringPrice(), 'json', $context);
        $dataArray['recurring_period'] = $this->normalizer->normalize($data->getRecurringPeriod(), 'json', $context);
        $dataArray['intervals_per_charge'] = $data->getIntervalsPerCharge();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AvailableNumberPricing::class => false];
    }
}
