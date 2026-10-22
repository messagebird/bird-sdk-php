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
class WhatsAppConversationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppConversation::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppConversation::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppConversation();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('business_phone_number', $data) && $data['business_phone_number'] !== null) {
            $object->setBusinessPhoneNumber($data['business_phone_number']);
        }
        elseif (\array_key_exists('business_phone_number', $data) && $data['business_phone_number'] === null) {
            $object->setBusinessPhoneNumber(null);
        }
        if (\array_key_exists('recipient', $data) && $data['recipient'] !== null) {
            $object->setRecipient($this->denormalizer->denormalize($data['recipient'], \MessageBird\Wire\Model\WhatsAppConversationRecipientWrapper::class, 'json', $context));
        }
        elseif (\array_key_exists('recipient', $data) && $data['recipient'] === null) {
            $object->setRecipient(null);
        }
        if (\array_key_exists('inbox_status', $data) && $data['inbox_status'] !== null) {
            $object->setInboxStatus($data['inbox_status']);
        }
        elseif (\array_key_exists('inbox_status', $data) && $data['inbox_status'] === null) {
            $object->setInboxStatus(null);
        }
        if (\array_key_exists('control', $data) && $data['control'] !== null) {
            $object->setControl($data['control']);
        }
        elseif (\array_key_exists('control', $data) && $data['control'] === null) {
            $object->setControl(null);
        }
        if (\array_key_exists('assigned_to', $data) && $data['assigned_to'] !== null) {
            $object->setAssignedTo($data['assigned_to']);
        }
        elseif (\array_key_exists('assigned_to', $data) && $data['assigned_to'] === null) {
            $object->setAssignedTo(null);
        }
        if (\array_key_exists('service_window', $data) && $data['service_window'] !== null) {
            $object->setServiceWindow($this->denormalizer->denormalize($data['service_window'], \MessageBird\Wire\Model\WhatsAppConversationServiceWindow::class, 'json', $context));
        }
        elseif (\array_key_exists('service_window', $data) && $data['service_window'] === null) {
            $object->setServiceWindow(null);
        }
        if (\array_key_exists('last_message', $data) && $data['last_message'] !== null) {
            $object->setLastMessage($this->denormalizer->denormalize($data['last_message'], \MessageBird\Wire\Model\WhatsAppConversationLastMessage::class, 'json', $context));
        }
        elseif (\array_key_exists('last_message', $data) && $data['last_message'] === null) {
            $object->setLastMessage(null);
        }
        if (\array_key_exists('unread_count', $data) && $data['unread_count'] !== null) {
            $object->setUnreadCount($data['unread_count']);
        }
        elseif (\array_key_exists('unread_count', $data) && $data['unread_count'] === null) {
            $object->setUnreadCount(null);
        }
        if (\array_key_exists('labels', $data) && $data['labels'] !== null) {
            $values = [];
            foreach ($data['labels'] as $value) {
                $values[] = $value;
            }
            $object->setLabels($values);
        }
        elseif (\array_key_exists('labels', $data) && $data['labels'] === null) {
            $object->setLabels(null);
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
        $dataArray['id'] = $data->getId();
        $dataArray['business_phone_number'] = $data->getBusinessPhoneNumber();
        $dataArray['recipient'] = $this->normalizer->normalize($data->getRecipient(), 'json', $context);
        $dataArray['inbox_status'] = $data->getInboxStatus();
        $dataArray['control'] = $data->getControl();
        $dataArray['assigned_to'] = $data->getAssignedTo();
        $dataArray['service_window'] = $this->normalizer->normalize($data->getServiceWindow(), 'json', $context);
        $dataArray['last_message'] = $this->normalizer->normalize($data->getLastMessage(), 'json', $context);
        $dataArray['unread_count'] = $data->getUnreadCount();
        $values = [];
        foreach ($data->getLabels() as $value) {
            $values[] = $value;
        }
        $dataArray['labels'] = $values;
        $dataArray['created_at'] = $data->getCreatedAt()->format('Y-m-d\TH:i:sP');
        $dataArray['updated_at'] = $data->getUpdatedAt()->format('Y-m-d\TH:i:sP');
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppConversation::class => false];
    }
}
