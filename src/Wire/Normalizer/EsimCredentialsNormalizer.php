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
class EsimCredentialsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EsimCredentials::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EsimCredentials::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EsimCredentials();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('data_roaming_required', $data) && \is_int($data['data_roaming_required'])) {
            $data['data_roaming_required'] = (bool) $data['data_roaming_required'];
        }
        if (\array_key_exists('esim_id', $data) && $data['esim_id'] !== null) {
            $object->setEsimId($data['esim_id']);
        }
        elseif (\array_key_exists('esim_id', $data) && $data['esim_id'] === null) {
            $object->setEsimId(null);
        }
        if (\array_key_exists('ios_install_url', $data) && $data['ios_install_url'] !== null) {
            $object->setIosInstallUrl($data['ios_install_url']);
        }
        elseif (\array_key_exists('ios_install_url', $data) && $data['ios_install_url'] === null) {
            $object->setIosInstallUrl(null);
        }
        if (\array_key_exists('android_install_url', $data) && $data['android_install_url'] !== null) {
            $object->setAndroidInstallUrl($data['android_install_url']);
        }
        elseif (\array_key_exists('android_install_url', $data) && $data['android_install_url'] === null) {
            $object->setAndroidInstallUrl(null);
        }
        if (\array_key_exists('qr_code_url', $data) && $data['qr_code_url'] !== null) {
            $object->setQrCodeUrl($data['qr_code_url']);
        }
        elseif (\array_key_exists('qr_code_url', $data) && $data['qr_code_url'] === null) {
            $object->setQrCodeUrl(null);
        }
        if (\array_key_exists('activation_code', $data) && $data['activation_code'] !== null) {
            $object->setActivationCode($data['activation_code']);
        }
        elseif (\array_key_exists('activation_code', $data) && $data['activation_code'] === null) {
            $object->setActivationCode(null);
        }
        if (\array_key_exists('smdp_address', $data) && $data['smdp_address'] !== null) {
            $object->setSmdpAddress($data['smdp_address']);
        }
        elseif (\array_key_exists('smdp_address', $data) && $data['smdp_address'] === null) {
            $object->setSmdpAddress(null);
        }
        if (\array_key_exists('matching_id', $data) && $data['matching_id'] !== null) {
            $object->setMatchingId($data['matching_id']);
        }
        elseif (\array_key_exists('matching_id', $data) && $data['matching_id'] === null) {
            $object->setMatchingId(null);
        }
        if (\array_key_exists('confirmation_code', $data) && $data['confirmation_code'] !== null) {
            $object->setConfirmationCode($data['confirmation_code']);
        }
        elseif (\array_key_exists('confirmation_code', $data) && $data['confirmation_code'] === null) {
            $object->setConfirmationCode(null);
        }
        if (\array_key_exists('apn', $data) && $data['apn'] !== null) {
            $object->setApn($data['apn']);
        }
        elseif (\array_key_exists('apn', $data) && $data['apn'] === null) {
            $object->setApn(null);
        }
        if (\array_key_exists('data_roaming_required', $data) && $data['data_roaming_required'] !== null) {
            $object->setDataRoamingRequired($data['data_roaming_required']);
        }
        elseif (\array_key_exists('data_roaming_required', $data) && $data['data_roaming_required'] === null) {
            $object->setDataRoamingRequired(null);
        }
        if (\array_key_exists('instructions', $data) && $data['instructions'] !== null) {
            $object->setInstructions($this->denormalizer->denormalize($data['instructions'], \MessageBird\Wire\Model\EsimCredentialsInstructions::class, 'json', $context));
        }
        elseif (\array_key_exists('instructions', $data) && $data['instructions'] === null) {
            $object->setInstructions(null);
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
        return [\MessageBird\Wire\Model\EsimCredentials::class => false];
    }
}
