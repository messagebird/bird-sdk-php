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
class AMBConversationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBConversation::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBConversation::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBConversation();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('inbox_status', $data) && $data['inbox_status'] !== null) {
            $object->setInboxStatus($data['inbox_status']);
        }
        elseif (\array_key_exists('inbox_status', $data) && $data['inbox_status'] === null) {
            $object->setInboxStatus(null);
        }
        if (\array_key_exists('recipient', $data) && $data['recipient'] !== null) {
            $object->setRecipient($this->denormalizer->denormalize($data['recipient'], \MessageBird\Wire\Model\AMBConversationRecipient::class, 'json', $context));
        }
        elseif (\array_key_exists('recipient', $data) && $data['recipient'] === null) {
            $object->setRecipient(null);
        }
        if (\array_key_exists('routing', $data) && $data['routing'] !== null) {
            $object->setRouting($this->denormalizer->denormalize($data['routing'], \MessageBird\Wire\Model\AMBConversationRouting::class, 'json', $context));
        }
        elseif (\array_key_exists('routing', $data) && $data['routing'] === null) {
            $object->setRouting(null);
        }
        if (\array_key_exists('last_message', $data) && $data['last_message'] !== null) {
            $object->setLastMessage($this->denormalizer->denormalize($data['last_message'], \MessageBird\Wire\Model\AMBConversationLastMessage::class, 'json', $context));
        }
        elseif (\array_key_exists('last_message', $data) && $data['last_message'] === null) {
            $object->setLastMessage(null);
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('business_account_id', $data) && $data['business_account_id'] !== null) {
            $object->setBusinessAccountId($data['business_account_id']);
        }
        elseif (\array_key_exists('business_account_id', $data) && $data['business_account_id'] === null) {
            $object->setBusinessAccountId(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('origin', $data) && $data['origin'] !== null) {
            $object->setOrigin($data['origin']);
        }
        elseif (\array_key_exists('origin', $data) && $data['origin'] === null) {
            $object->setOrigin(null);
        }
        if (\array_key_exists('device_capabilities', $data) && $data['device_capabilities'] !== null) {
            $values = [];
            foreach ($data['device_capabilities'] as $value) {
                $values[] = $value;
            }
            $object->setDeviceCapabilities($values);
        }
        elseif (\array_key_exists('device_capabilities', $data) && $data['device_capabilities'] === null) {
            $object->setDeviceCapabilities(null);
        }
        if (\array_key_exists('supported_content_kinds', $data) && $data['supported_content_kinds'] !== null) {
            $values_1 = [];
            foreach ($data['supported_content_kinds'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setSupportedContentKinds($values_1);
        }
        elseif (\array_key_exists('supported_content_kinds', $data) && $data['supported_content_kinds'] === null) {
            $object->setSupportedContentKinds(null);
        }
        if (\array_key_exists('locale', $data) && $data['locale'] !== null) {
            $object->setLocale($data['locale']);
        }
        elseif (\array_key_exists('locale', $data) && $data['locale'] === null) {
            $object->setLocale(null);
        }
        if (\array_key_exists('unread_count', $data) && $data['unread_count'] !== null) {
            $object->setUnreadCount($data['unread_count']);
        }
        elseif (\array_key_exists('unread_count', $data) && $data['unread_count'] === null) {
            $object->setUnreadCount(null);
        }
        if (\array_key_exists('assigned_to', $data) && $data['assigned_to'] !== null) {
            $object->setAssignedTo($data['assigned_to']);
        }
        elseif (\array_key_exists('assigned_to', $data) && $data['assigned_to'] === null) {
            $object->setAssignedTo(null);
        }
        if (\array_key_exists('labels', $data) && $data['labels'] !== null) {
            $values_2 = [];
            foreach ($data['labels'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setLabels($values_2);
        }
        elseif (\array_key_exists('labels', $data) && $data['labels'] === null) {
            $object->setLabels(null);
        }
        if (\array_key_exists('closed_at', $data) && $data['closed_at'] !== null) {
            $object->setClosedAt(new \DateTime($data['closed_at']));
        }
        elseif (\array_key_exists('closed_at', $data) && $data['closed_at'] === null) {
            $object->setClosedAt(null);
        }
        if (\array_key_exists('closed_reason', $data) && $data['closed_reason'] !== null) {
            $object->setClosedReason($data['closed_reason']);
        }
        elseif (\array_key_exists('closed_reason', $data) && $data['closed_reason'] === null) {
            $object->setClosedReason(null);
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
        $dataArray['inbox_status'] = $data->getInboxStatus();
        $dataArray['last_message'] = $this->normalizer->normalize($data->getLastMessage(), 'json', $context);
        $dataArray['id'] = $data->getId();
        $dataArray['business_account_id'] = $data->getBusinessAccountId();
        $dataArray['status'] = $data->getStatus();
        $dataArray['origin'] = $data->getOrigin();
        $dataArray['assigned_to'] = $data->getAssignedTo();
        $values = [];
        foreach ($data->getLabels() as $value) {
            $values[] = $value;
        }
        $dataArray['labels'] = $values;
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBConversation::class => false];
    }
}
