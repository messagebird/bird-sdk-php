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
class WhatsAppNumberNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppNumber::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppNumber::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppNumber();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('is_official_business_account', $data) && \is_int($data['is_official_business_account'])) {
            $data['is_official_business_account'] = (bool) $data['is_official_business_account'];
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('waba', $data) && $data['waba'] !== null) {
            $object->setWaba($data['waba']);
        }
        elseif (\array_key_exists('waba', $data) && $data['waba'] === null) {
            $object->setWaba(null);
        }
        if (\array_key_exists('phone_number', $data) && $data['phone_number'] !== null) {
            $object->setPhoneNumber($data['phone_number']);
        }
        elseif (\array_key_exists('phone_number', $data) && $data['phone_number'] === null) {
            $object->setPhoneNumber(null);
        }
        if (\array_key_exists('number_id', $data) && $data['number_id'] !== null) {
            $object->setNumberId($data['number_id']);
        }
        elseif (\array_key_exists('number_id', $data) && $data['number_id'] === null) {
            $object->setNumberId(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('scope', $data) && $data['scope'] !== null) {
            $object->setScope($data['scope']);
        }
        elseif (\array_key_exists('scope', $data) && $data['scope'] === null) {
            $object->setScope(null);
        }
        if (\array_key_exists('data_localization_region', $data) && $data['data_localization_region'] !== null) {
            $object->setDataLocalizationRegion($data['data_localization_region']);
        }
        elseif (\array_key_exists('data_localization_region', $data) && $data['data_localization_region'] === null) {
            $object->setDataLocalizationRegion(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('next', $data) && $data['next'] !== null) {
            $values = [];
            foreach ($data['next'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\NextAction::class, 'json', $context);
            }
            $object->setNext($values);
        }
        elseif (\array_key_exists('next', $data) && $data['next'] === null) {
            $object->setNext(null);
        }
        if (\array_key_exists('error', $data) && $data['error'] !== null) {
            $object->setError($this->denormalizer->denormalize($data['error'], \MessageBird\Wire\Model\WhatsAppNumberError::class, 'json', $context));
        }
        elseif (\array_key_exists('error', $data) && $data['error'] === null) {
            $object->setError(null);
        }
        if (\array_key_exists('finish_setup_url', $data) && $data['finish_setup_url'] !== null) {
            $object->setFinishSetupUrl($data['finish_setup_url']);
        }
        elseif (\array_key_exists('finish_setup_url', $data) && $data['finish_setup_url'] === null) {
            $object->setFinishSetupUrl(null);
        }
        if (\array_key_exists('quality_rating', $data) && $data['quality_rating'] !== null) {
            $object->setQualityRating($data['quality_rating']);
        }
        elseif (\array_key_exists('quality_rating', $data) && $data['quality_rating'] === null) {
            $object->setQualityRating(null);
        }
        if (\array_key_exists('messaging_limit', $data) && $data['messaging_limit'] !== null) {
            $object->setMessagingLimit($data['messaging_limit']);
        }
        elseif (\array_key_exists('messaging_limit', $data) && $data['messaging_limit'] === null) {
            $object->setMessagingLimit(null);
        }
        if (\array_key_exists('throughput_level', $data) && $data['throughput_level'] !== null) {
            $object->setThroughputLevel($data['throughput_level']);
        }
        elseif (\array_key_exists('throughput_level', $data) && $data['throughput_level'] === null) {
            $object->setThroughputLevel(null);
        }
        if (\array_key_exists('is_official_business_account', $data) && $data['is_official_business_account'] !== null) {
            $object->setIsOfficialBusinessAccount($data['is_official_business_account']);
        }
        elseif (\array_key_exists('is_official_business_account', $data) && $data['is_official_business_account'] === null) {
            $object->setIsOfficialBusinessAccount(null);
        }
        if (\array_key_exists('meta_synced_at', $data) && $data['meta_synced_at'] !== null) {
            $object->setMetaSyncedAt(new \DateTime($data['meta_synced_at']));
        }
        elseif (\array_key_exists('meta_synced_at', $data) && $data['meta_synced_at'] === null) {
            $object->setMetaSyncedAt(null);
        }
        if (\array_key_exists('pre_verification_requested_at', $data) && $data['pre_verification_requested_at'] !== null) {
            $object->setPreVerificationRequestedAt(new \DateTime($data['pre_verification_requested_at']));
        }
        elseif (\array_key_exists('pre_verification_requested_at', $data) && $data['pre_verification_requested_at'] === null) {
            $object->setPreVerificationRequestedAt(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppNumber::class => false];
    }
}
