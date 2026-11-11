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
class OrganizationWorkspaceWhatsAppNumberCreateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\OrganizationWorkspaceWhatsAppNumberCreate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\OrganizationWorkspaceWhatsAppNumberCreate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\OrganizationWorkspaceWhatsAppNumberCreate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('waba', $data) && $data['waba'] !== null) {
            $object->setWaba($data['waba']);
        }
        elseif (\array_key_exists('waba', $data) && $data['waba'] === null) {
            $object->setWaba(null);
        }
        if (\array_key_exists('meta_phone_number_id', $data) && $data['meta_phone_number_id'] !== null) {
            $object->setMetaPhoneNumberId($data['meta_phone_number_id']);
        }
        elseif (\array_key_exists('meta_phone_number_id', $data) && $data['meta_phone_number_id'] === null) {
            $object->setMetaPhoneNumberId(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('data_localization_region', $data) && $data['data_localization_region'] !== null) {
            $object->setDataLocalizationRegion($data['data_localization_region']);
        }
        elseif (\array_key_exists('data_localization_region', $data) && $data['data_localization_region'] === null) {
            $object->setDataLocalizationRegion(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('waba')) {
            throw new \MessageBird\Exception\RequestValidationException('required field OrganizationWorkspaceWhatsAppNumberCreate.waba missing');
        }
        $dataArray['waba'] = $data->getWaba();
        if (!$data->isInitialized('metaPhoneNumberId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field OrganizationWorkspaceWhatsAppNumberCreate.meta_phone_number_id missing');
        }
        $dataArray['meta_phone_number_id'] = $data->getMetaPhoneNumberId();
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['name'] = $data->getName();
        }
        if ($data->isInitialized('dataLocalizationRegion') && null !== $data->getDataLocalizationRegion()) {
            $dataArray['data_localization_region'] = $data->getDataLocalizationRegion();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\OrganizationWorkspaceWhatsAppNumberCreate::class => false];
    }
}
