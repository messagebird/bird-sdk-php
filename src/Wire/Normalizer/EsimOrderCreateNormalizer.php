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
class EsimOrderCreateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EsimOrderCreate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EsimOrderCreate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EsimOrderCreate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('acknowledge_shortened_validity', $data) && \is_int($data['acknowledge_shortened_validity'])) {
            $data['acknowledge_shortened_validity'] = (bool) $data['acknowledge_shortened_validity'];
        }
        if (\array_key_exists('offer_id', $data) && $data['offer_id'] !== null) {
            $object->setOfferId($data['offer_id']);
        }
        elseif (\array_key_exists('offer_id', $data) && $data['offer_id'] === null) {
            $object->setOfferId(null);
        }
        if (\array_key_exists('esim_id', $data) && $data['esim_id'] !== null) {
            $object->setEsimId($data['esim_id']);
        }
        elseif (\array_key_exists('esim_id', $data) && $data['esim_id'] === null) {
            $object->setEsimId(null);
        }
        if (\array_key_exists('subscriber_id', $data) && $data['subscriber_id'] !== null) {
            $object->setSubscriberId($data['subscriber_id']);
        }
        elseif (\array_key_exists('subscriber_id', $data) && $data['subscriber_id'] === null) {
            $object->setSubscriberId(null);
        }
        if (\array_key_exists('offer_revision', $data) && $data['offer_revision'] !== null) {
            $object->setOfferRevision($data['offer_revision']);
        }
        elseif (\array_key_exists('offer_revision', $data) && $data['offer_revision'] === null) {
            $object->setOfferRevision(null);
        }
        if (\array_key_exists('recurrence', $data) && $data['recurrence'] !== null) {
            $object->setRecurrence($this->denormalizer->denormalize($data['recurrence'], \MessageBird\Wire\Model\EsimOrderRecurrence::class, 'json', $context));
        }
        elseif (\array_key_exists('recurrence', $data) && $data['recurrence'] === null) {
            $object->setRecurrence(null);
        }
        if (\array_key_exists('expected_price', $data) && $data['expected_price'] !== null) {
            $object->setExpectedPrice($this->denormalizer->denormalize($data['expected_price'], \MessageBird\Wire\Model\EsimOrderCreateExpectedPrice::class, 'json', $context));
        }
        elseif (\array_key_exists('expected_price', $data) && $data['expected_price'] === null) {
            $object->setExpectedPrice(null);
        }
        if (\array_key_exists('display_name', $data) && $data['display_name'] !== null) {
            $object->setDisplayName($data['display_name']);
        }
        elseif (\array_key_exists('display_name', $data) && $data['display_name'] === null) {
            $object->setDisplayName(null);
        }
        if (\array_key_exists('tags', $data) && $data['tags'] !== null) {
            $values = [];
            foreach ($data['tags'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\Tag::class, 'json', $context);
            }
            $object->setTags($values);
        }
        elseif (\array_key_exists('tags', $data) && $data['tags'] === null) {
            $object->setTags(null);
        }
        if (\array_key_exists('metadata', $data) && $data['metadata'] !== null) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['metadata'] as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $object->setMetadata($values_1);
        }
        elseif (\array_key_exists('metadata', $data) && $data['metadata'] === null) {
            $object->setMetadata(null);
        }
        if (\array_key_exists('acknowledge_shortened_validity', $data) && $data['acknowledge_shortened_validity'] !== null) {
            $object->setAcknowledgeShortenedValidity($data['acknowledge_shortened_validity']);
        }
        elseif (\array_key_exists('acknowledge_shortened_validity', $data) && $data['acknowledge_shortened_validity'] === null) {
            $object->setAcknowledgeShortenedValidity(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['offer_id'] = $data->getOfferId();
        if ($data->isInitialized('esimId') && null !== $data->getEsimId()) {
            $dataArray['esim_id'] = $data->getEsimId();
        }
        if ($data->isInitialized('subscriberId') && null !== $data->getSubscriberId()) {
            $dataArray['subscriber_id'] = $data->getSubscriberId();
        }
        if ($data->isInitialized('offerRevision') && null !== $data->getOfferRevision()) {
            $dataArray['offer_revision'] = $data->getOfferRevision();
        }
        if ($data->isInitialized('recurrence') && null !== $data->getRecurrence()) {
            $dataArray['recurrence'] = $this->normalizer->normalize($data->getRecurrence(), 'json', $context);
        }
        if ($data->isInitialized('expectedPrice') && null !== $data->getExpectedPrice()) {
            $dataArray['expected_price'] = $this->normalizer->normalize($data->getExpectedPrice(), 'json', $context);
        }
        if ($data->isInitialized('displayName') && null !== $data->getDisplayName()) {
            $dataArray['display_name'] = $data->getDisplayName();
        }
        if ($data->isInitialized('tags') && null !== $data->getTags()) {
            $values = [];
            foreach ($data->getTags() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['tags'] = $values;
        }
        if ($data->isInitialized('metadata') && null !== $data->getMetadata()) {
            $values_1 = [];
            foreach ($data->getMetadata() as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $dataArray['metadata'] = (object) $values_1;
        }
        if ($data->isInitialized('acknowledgeShortenedValidity') && null !== $data->getAcknowledgeShortenedValidity()) {
            $dataArray['acknowledge_shortened_validity'] = $data->getAcknowledgeShortenedValidity();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EsimOrderCreate::class => false];
    }
}
