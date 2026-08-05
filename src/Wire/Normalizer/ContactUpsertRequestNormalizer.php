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
class ContactUpsertRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\ContactUpsertRequest::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\ContactUpsertRequest::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\ContactUpsertRequest();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('contacts', $data) && $data['contacts'] !== null) {
            $values = [];
            foreach ($data['contacts'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\ContactCreateRequest::class, 'json', $context);
            }
            $object->setContacts($values);
        }
        elseif (\array_key_exists('contacts', $data) && $data['contacts'] === null) {
            $object->setContacts(null);
        }
        if (\array_key_exists('audience_ids', $data) && $data['audience_ids'] !== null) {
            $values_1 = [];
            foreach ($data['audience_ids'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setAudienceIds($values_1);
        }
        elseif (\array_key_exists('audience_ids', $data) && $data['audience_ids'] === null) {
            $object->setAudienceIds(null);
        }
        if (\array_key_exists('data_mode', $data) && $data['data_mode'] !== null) {
            $object->setDataMode($data['data_mode']);
        }
        elseif (\array_key_exists('data_mode', $data) && $data['data_mode'] === null) {
            $object->setDataMode(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $values = [];
        foreach ($data->getContacts() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $dataArray['contacts'] = $values;
        if ($data->isInitialized('audienceIds') && null !== $data->getAudienceIds()) {
            $values_1 = [];
            foreach ($data->getAudienceIds() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['audience_ids'] = $values_1;
        }
        if ($data->isInitialized('dataMode') && null !== $data->getDataMode()) {
            $dataArray['data_mode'] = $data->getDataMode();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\ContactUpsertRequest::class => false];
    }
}
