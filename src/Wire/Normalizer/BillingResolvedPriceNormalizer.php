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
class BillingResolvedPriceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\BillingResolvedPrice::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\BillingResolvedPrice::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\BillingResolvedPrice();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('is_priced', $data) && \is_int($data['is_priced'])) {
            $data['is_priced'] = (bool) $data['is_priced'];
        }
        if (\array_key_exists('is_priced', $data) && $data['is_priced'] !== null) {
            $object->setIsPriced($data['is_priced']);
        }
        elseif (\array_key_exists('is_priced', $data) && $data['is_priced'] === null) {
            $object->setIsPriced(null);
        }
        if (\array_key_exists('unit_price', $data) && $data['unit_price'] !== null) {
            $object->setUnitPrice($this->denormalizer->denormalize($data['unit_price'], \MessageBird\Wire\Model\Money::class, 'json', $context));
        }
        elseif (\array_key_exists('unit_price', $data) && $data['unit_price'] === null) {
            $object->setUnitPrice(null);
        }
        if (\array_key_exists('tax_rate', $data) && $data['tax_rate'] !== null) {
            $object->setTaxRate($data['tax_rate']);
        }
        elseif (\array_key_exists('tax_rate', $data) && $data['tax_rate'] === null) {
            $object->setTaxRate(null);
        }
        if (\array_key_exists('tax_amount', $data) && $data['tax_amount'] !== null) {
            $object->setTaxAmount($this->denormalizer->denormalize($data['tax_amount'], \MessageBird\Wire\Model\Money::class, 'json', $context));
        }
        elseif (\array_key_exists('tax_amount', $data) && $data['tax_amount'] === null) {
            $object->setTaxAmount(null);
        }
        if (\array_key_exists('gross_price', $data) && $data['gross_price'] !== null) {
            $object->setGrossPrice($this->denormalizer->denormalize($data['gross_price'], \MessageBird\Wire\Model\Money::class, 'json', $context));
        }
        elseif (\array_key_exists('gross_price', $data) && $data['gross_price'] === null) {
            $object->setGrossPrice(null);
        }
        if (\array_key_exists('billing_unit_size', $data) && $data['billing_unit_size'] !== null) {
            $object->setBillingUnitSize($data['billing_unit_size']);
        }
        elseif (\array_key_exists('billing_unit_size', $data) && $data['billing_unit_size'] === null) {
            $object->setBillingUnitSize(null);
        }
        if (\array_key_exists('increment', $data) && $data['increment'] !== null) {
            $object->setIncrement($data['increment']);
        }
        elseif (\array_key_exists('increment', $data) && $data['increment'] === null) {
            $object->setIncrement(null);
        }
        if (\array_key_exists('dimensions', $data) && $data['dimensions'] !== null) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['dimensions'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setDimensions($values);
        }
        elseif (\array_key_exists('dimensions', $data) && $data['dimensions'] === null) {
            $object->setDimensions(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('external_description', $data) && $data['external_description'] !== null) {
            $object->setExternalDescription($data['external_description']);
        }
        elseif (\array_key_exists('external_description', $data) && $data['external_description'] === null) {
            $object->setExternalDescription(null);
        }
        if (\array_key_exists('pricing_model', $data) && $data['pricing_model'] !== null) {
            $object->setPricingModel($data['pricing_model']);
        }
        elseif (\array_key_exists('pricing_model', $data) && $data['pricing_model'] === null) {
            $object->setPricingModel(null);
        }
        if (\array_key_exists('billing_interval', $data) && $data['billing_interval'] !== null) {
            $object->setBillingInterval($data['billing_interval']);
        }
        elseif (\array_key_exists('billing_interval', $data) && $data['billing_interval'] === null) {
            $object->setBillingInterval(null);
        }
        if (\array_key_exists('billing_interval_count', $data) && $data['billing_interval_count'] !== null) {
            $object->setBillingIntervalCount($data['billing_interval_count']);
        }
        elseif (\array_key_exists('billing_interval_count', $data) && $data['billing_interval_count'] === null) {
            $object->setBillingIntervalCount(null);
        }
        if (\array_key_exists('pricing_interval', $data) && $data['pricing_interval'] !== null) {
            $object->setPricingInterval($this->denormalizer->denormalize($data['pricing_interval'], \MessageBird\Wire\Model\BillingPricingInterval::class, 'json', $context));
        }
        elseif (\array_key_exists('pricing_interval', $data) && $data['pricing_interval'] === null) {
            $object->setPricingInterval(null);
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
        $dataArray['is_priced'] = $data->getIsPriced();
        $dataArray['unit_price'] = $this->normalizer->normalize($data->getUnitPrice(), 'json', $context);
        $dataArray['tax_rate'] = $data->getTaxRate();
        $dataArray['tax_amount'] = $this->normalizer->normalize($data->getTaxAmount(), 'json', $context);
        $dataArray['gross_price'] = $this->normalizer->normalize($data->getGrossPrice(), 'json', $context);
        $dataArray['billing_unit_size'] = $data->getBillingUnitSize();
        if ($data->isInitialized('increment')) {
            $dataArray['increment'] = $data->getIncrement();
        }
        $values = [];
        foreach ($data->getDimensions() as $key => $value) {
            $values[$key] = $value;
        }
        $dataArray['dimensions'] = (object) $values;
        $dataArray['name'] = $data->getName();
        $dataArray['pricing_model'] = $data->getPricingModel();
        if ($data->isInitialized('billingInterval') && null !== $data->getBillingInterval()) {
            $dataArray['billing_interval'] = $data->getBillingInterval();
        }
        if ($data->isInitialized('pricingInterval') && null !== $data->getPricingInterval()) {
            $dataArray['pricing_interval'] = $this->normalizer->normalize($data->getPricingInterval(), 'json', $context);
        }
        if ($data->isInitialized('intervalsPerCharge') && null !== $data->getIntervalsPerCharge()) {
            $dataArray['intervals_per_charge'] = $data->getIntervalsPerCharge();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\BillingResolvedPrice::class => false];
    }
}
