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
class WhatsAppMetaHealthEntityNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppMetaHealthEntity::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppMetaHealthEntity::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppMetaHealthEntity();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('entity_type', $data) && $data['entity_type'] !== null) {
            $object->setEntityType($data['entity_type']);
        }
        elseif (\array_key_exists('entity_type', $data) && $data['entity_type'] === null) {
            $object->setEntityType(null);
        }
        if (\array_key_exists('meta_id', $data) && $data['meta_id'] !== null) {
            $object->setMetaId($data['meta_id']);
        }
        elseif (\array_key_exists('meta_id', $data) && $data['meta_id'] === null) {
            $object->setMetaId(null);
        }
        if (\array_key_exists('can_send_message', $data) && $data['can_send_message'] !== null) {
            $object->setCanSendMessage($data['can_send_message']);
        }
        elseif (\array_key_exists('can_send_message', $data) && $data['can_send_message'] === null) {
            $object->setCanSendMessage(null);
        }
        if (\array_key_exists('can_receive_call_sip', $data) && $data['can_receive_call_sip'] !== null) {
            $object->setCanReceiveCallSip($data['can_receive_call_sip']);
        }
        elseif (\array_key_exists('can_receive_call_sip', $data) && $data['can_receive_call_sip'] === null) {
            $object->setCanReceiveCallSip(null);
        }
        if (\array_key_exists('additional_info', $data) && $data['additional_info'] !== null) {
            $values = [];
            foreach ($data['additional_info'] as $value) {
                $values[] = $value;
            }
            $object->setAdditionalInfo($values);
        }
        elseif (\array_key_exists('additional_info', $data) && $data['additional_info'] === null) {
            $object->setAdditionalInfo(null);
        }
        if (\array_key_exists('errors', $data) && $data['errors'] !== null) {
            $values_1 = [];
            foreach ($data['errors'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\WhatsAppMetaHealthError::class, 'json', $context);
            }
            $object->setErrors($values_1);
        }
        elseif (\array_key_exists('errors', $data) && $data['errors'] === null) {
            $object->setErrors(null);
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
        return [\MessageBird\Wire\Model\WhatsAppMetaHealthEntity::class => false];
    }
}
