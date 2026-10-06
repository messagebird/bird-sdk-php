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
class EsimRecurringOfferNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EsimRecurringOffer::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EsimRecurringOffer::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EsimRecurringOffer();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('delivery_mode', $data) && $data['delivery_mode'] !== null) {
            $object->setDeliveryMode($data['delivery_mode']);
        }
        elseif (\array_key_exists('delivery_mode', $data) && $data['delivery_mode'] === null) {
            $object->setDeliveryMode(null);
        }
        if (\array_key_exists('offer_id', $data) && $data['offer_id'] !== null) {
            $object->setOfferId($data['offer_id']);
        }
        elseif (\array_key_exists('offer_id', $data) && $data['offer_id'] === null) {
            $object->setOfferId(null);
        }
        if (\array_key_exists('model', $data) && $data['model'] !== null) {
            $object->setModel($data['model']);
        }
        elseif (\array_key_exists('model', $data) && $data['model'] === null) {
            $object->setModel(null);
        }
        if (\array_key_exists('interval_count', $data) && $data['interval_count'] !== null) {
            $object->setIntervalCount($data['interval_count']);
        }
        elseif (\array_key_exists('interval_count', $data) && $data['interval_count'] === null) {
            $object->setIntervalCount(null);
        }
        if (\array_key_exists('revision', $data) && $data['revision'] !== null) {
            $object->setRevision($data['revision']);
        }
        elseif (\array_key_exists('revision', $data) && $data['revision'] === null) {
            $object->setRevision(null);
        }
        if (\array_key_exists('price', $data) && $data['price'] !== null) {
            $object->setPrice($this->denormalizer->denormalize($data['price'], \MessageBird\Wire\Model\Money::class, 'json', $context));
        }
        elseif (\array_key_exists('price', $data) && $data['price'] === null) {
            $object->setPrice(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['delivery_mode'] = $data->getDeliveryMode();
        $dataArray['offer_id'] = $data->getOfferId();
        $dataArray['model'] = $data->getModel();
        $dataArray['interval_count'] = $data->getIntervalCount();
        $dataArray['revision'] = $data->getRevision();
        $dataArray['price'] = $this->normalizer->normalize($data->getPrice(), 'json', $context);
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EsimRecurringOffer::class => false];
    }
}
