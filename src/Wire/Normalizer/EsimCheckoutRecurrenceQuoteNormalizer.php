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
class EsimCheckoutRecurrenceQuoteNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EsimCheckoutRecurrenceQuote::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EsimCheckoutRecurrenceQuote::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EsimCheckoutRecurrenceQuote();
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
            unset($data['delivery_mode']);
        }
        elseif (\array_key_exists('delivery_mode', $data) && $data['delivery_mode'] === null) {
            $object->setDeliveryMode(null);
        }
        if (\array_key_exists('offer_revision', $data) && $data['offer_revision'] !== null) {
            $object->setOfferRevision($data['offer_revision']);
            unset($data['offer_revision']);
        }
        elseif (\array_key_exists('offer_revision', $data) && $data['offer_revision'] === null) {
            $object->setOfferRevision(null);
        }
        if (\array_key_exists('recurrence_revision', $data) && $data['recurrence_revision'] !== null) {
            $object->setRecurrenceRevision($data['recurrence_revision']);
            unset($data['recurrence_revision']);
        }
        elseif (\array_key_exists('recurrence_revision', $data) && $data['recurrence_revision'] === null) {
            $object->setRecurrenceRevision(null);
        }
        if (\array_key_exists('price', $data) && $data['price'] !== null) {
            $object->setPrice($this->denormalizer->denormalize($data['price'], \MessageBird\Wire\Model\Money::class, 'json', $context));
            unset($data['price']);
        }
        elseif (\array_key_exists('price', $data) && $data['price'] === null) {
            $object->setPrice(null);
        }
        if (\array_key_exists('model', $data) && $data['model'] !== null) {
            $object->setModel($data['model']);
            unset($data['model']);
        }
        elseif (\array_key_exists('model', $data) && $data['model'] === null) {
            $object->setModel(null);
        }
        if (\array_key_exists('interval_count', $data) && $data['interval_count'] !== null) {
            $object->setIntervalCount($data['interval_count']);
            unset($data['interval_count']);
        }
        elseif (\array_key_exists('interval_count', $data) && $data['interval_count'] === null) {
            $object->setIntervalCount(null);
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
        $dataArray['delivery_mode'] = $data->getDeliveryMode();
        $dataArray['offer_revision'] = $data->getOfferRevision();
        $dataArray['recurrence_revision'] = $data->getRecurrenceRevision();
        $dataArray['price'] = $this->normalizer->normalize($data->getPrice(), 'json', $context);
        $dataArray['model'] = $data->getModel();
        $dataArray['interval_count'] = $data->getIntervalCount();
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EsimCheckoutRecurrenceQuote::class => false];
    }
}
