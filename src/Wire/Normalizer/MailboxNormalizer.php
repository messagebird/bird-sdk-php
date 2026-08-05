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
class MailboxNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\Mailbox::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\Mailbox::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\Mailbox();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('local_part_generated', $data) && \is_int($data['local_part_generated'])) {
            $data['local_part_generated'] = (bool) $data['local_part_generated'];
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('address', $data) && $data['address'] !== null) {
            $object->setAddress($data['address']);
        }
        elseif (\array_key_exists('address', $data) && $data['address'] === null) {
            $object->setAddress(null);
        }
        if (\array_key_exists('display_name', $data) && $data['display_name'] !== null) {
            $object->setDisplayName($data['display_name']);
        }
        elseif (\array_key_exists('display_name', $data) && $data['display_name'] === null) {
            $object->setDisplayName(null);
        }
        if (\array_key_exists('default_reply_to', $data) && $data['default_reply_to'] !== null) {
            $object->setDefaultReplyTo($data['default_reply_to']);
        }
        elseif (\array_key_exists('default_reply_to', $data) && $data['default_reply_to'] === null) {
            $object->setDefaultReplyTo(null);
        }
        if (\array_key_exists('receive_policy', $data) && $data['receive_policy'] !== null) {
            $object->setReceivePolicy($data['receive_policy']);
        }
        elseif (\array_key_exists('receive_policy', $data) && $data['receive_policy'] === null) {
            $object->setReceivePolicy(null);
        }
        if (\array_key_exists('state', $data) && $data['state'] !== null) {
            $object->setState($data['state']);
        }
        elseif (\array_key_exists('state', $data) && $data['state'] === null) {
            $object->setState(null);
        }
        if (\array_key_exists('channel', $data) && $data['channel'] !== null) {
            $object->setChannel($data['channel']);
        }
        elseif (\array_key_exists('channel', $data) && $data['channel'] === null) {
            $object->setChannel(null);
        }
        if (\array_key_exists('owner', $data) && $data['owner'] !== null) {
            $object->setOwner($this->denormalizer->denormalize($data['owner'], \MessageBird\Wire\Model\MailboxOwner::class, 'json', $context));
        }
        elseif (\array_key_exists('owner', $data) && $data['owner'] === null) {
            $object->setOwner(null);
        }
        if (\array_key_exists('inbound_address_id', $data) && $data['inbound_address_id'] !== null) {
            $object->setInboundAddressId($data['inbound_address_id']);
        }
        elseif (\array_key_exists('inbound_address_id', $data) && $data['inbound_address_id'] === null) {
            $object->setInboundAddressId(null);
        }
        if (\array_key_exists('retention_tier', $data) && $data['retention_tier'] !== null) {
            $object->setRetentionTier($data['retention_tier']);
        }
        elseif (\array_key_exists('retention_tier', $data) && $data['retention_tier'] === null) {
            $object->setRetentionTier(null);
        }
        if (\array_key_exists('message_count', $data) && $data['message_count'] !== null) {
            $object->setMessageCount($data['message_count']);
        }
        elseif (\array_key_exists('message_count', $data) && $data['message_count'] === null) {
            $object->setMessageCount(null);
        }
        if (\array_key_exists('thread_count', $data) && $data['thread_count'] !== null) {
            $object->setThreadCount($data['thread_count']);
        }
        elseif (\array_key_exists('thread_count', $data) && $data['thread_count'] === null) {
            $object->setThreadCount(null);
        }
        if (\array_key_exists('unread_thread_count', $data) && $data['unread_thread_count'] !== null) {
            $object->setUnreadThreadCount($data['unread_thread_count']);
        }
        elseif (\array_key_exists('unread_thread_count', $data) && $data['unread_thread_count'] === null) {
            $object->setUnreadThreadCount(null);
        }
        if (\array_key_exists('metadata', $data) && $data['metadata'] !== null) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['metadata'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setMetadata($values);
        }
        elseif (\array_key_exists('metadata', $data) && $data['metadata'] === null) {
            $object->setMetadata(null);
        }
        if (\array_key_exists('local_part_generated', $data) && $data['local_part_generated'] !== null) {
            $object->setLocalPartGenerated($data['local_part_generated']);
        }
        elseif (\array_key_exists('local_part_generated', $data) && $data['local_part_generated'] === null) {
            $object->setLocalPartGenerated(null);
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
        if (\array_key_exists('deleted_at', $data) && $data['deleted_at'] !== null) {
            $object->setDeletedAt(new \DateTime($data['deleted_at']));
        }
        elseif (\array_key_exists('deleted_at', $data) && $data['deleted_at'] === null) {
            $object->setDeletedAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['display_name'] = $data->getDisplayName();
        $dataArray['default_reply_to'] = $data->getDefaultReplyTo();
        $dataArray['receive_policy'] = $data->getReceivePolicy();
        $dataArray['owner'] = $this->normalizer->normalize($data->getOwner(), 'json', $context);
        $dataArray['inbound_address_id'] = $data->getInboundAddressId();
        $dataArray['retention_tier'] = $data->getRetentionTier();
        $values = [];
        foreach ($data->getMetadata() as $key => $value) {
            $values[$key] = $value;
        }
        $dataArray['metadata'] = $values;
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\Mailbox::class => false];
    }
}
