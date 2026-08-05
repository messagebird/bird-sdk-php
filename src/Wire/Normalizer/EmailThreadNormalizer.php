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
class EmailThreadNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailThread::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailThread::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailThread();
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
        if (\array_key_exists('mailbox_id', $data) && $data['mailbox_id'] !== null) {
            $object->setMailboxId($data['mailbox_id']);
        }
        elseif (\array_key_exists('mailbox_id', $data) && $data['mailbox_id'] === null) {
            $object->setMailboxId(null);
        }
        if (\array_key_exists('channel', $data) && $data['channel'] !== null) {
            $object->setChannel($data['channel']);
        }
        elseif (\array_key_exists('channel', $data) && $data['channel'] === null) {
            $object->setChannel(null);
        }
        if (\array_key_exists('contact_id', $data) && $data['contact_id'] !== null) {
            $object->setContactId($data['contact_id']);
        }
        elseif (\array_key_exists('contact_id', $data) && $data['contact_id'] === null) {
            $object->setContactId(null);
        }
        if (\array_key_exists('subject', $data) && $data['subject'] !== null) {
            $object->setSubject($data['subject']);
        }
        elseif (\array_key_exists('subject', $data) && $data['subject'] === null) {
            $object->setSubject(null);
        }
        if (\array_key_exists('participants', $data) && $data['participants'] !== null) {
            $values = [];
            foreach ($data['participants'] as $value) {
                $values[] = $value;
            }
            $object->setParticipants($values);
        }
        elseif (\array_key_exists('participants', $data) && $data['participants'] === null) {
            $object->setParticipants(null);
        }
        if (\array_key_exists('message_count', $data) && $data['message_count'] !== null) {
            $object->setMessageCount($data['message_count']);
        }
        elseif (\array_key_exists('message_count', $data) && $data['message_count'] === null) {
            $object->setMessageCount(null);
        }
        if (\array_key_exists('unread_count', $data) && $data['unread_count'] !== null) {
            $object->setUnreadCount($data['unread_count']);
        }
        elseif (\array_key_exists('unread_count', $data) && $data['unread_count'] === null) {
            $object->setUnreadCount(null);
        }
        if (\array_key_exists('last_message_at', $data) && $data['last_message_at'] !== null) {
            $object->setLastMessageAt(new \DateTime($data['last_message_at']));
        }
        elseif (\array_key_exists('last_message_at', $data) && $data['last_message_at'] === null) {
            $object->setLastMessageAt(null);
        }
        if (\array_key_exists('last_direction', $data) && $data['last_direction'] !== null) {
            $object->setLastDirection($data['last_direction']);
        }
        elseif (\array_key_exists('last_direction', $data) && $data['last_direction'] === null) {
            $object->setLastDirection(null);
        }
        if (\array_key_exists('labels', $data) && $data['labels'] !== null) {
            $values_1 = [];
            foreach ($data['labels'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setLabels($values_1);
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
        if (\array_key_exists('highlights', $data) && $data['highlights'] !== null) {
            $object->setHighlights($this->denormalizer->denormalize($data['highlights'], \MessageBird\Wire\Model\EmailThreadHighlights::class, 'json', $context));
        }
        elseif (\array_key_exists('highlights', $data) && $data['highlights'] === null) {
            $object->setHighlights(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['mailbox_id'] = $data->getMailboxId();
        $dataArray['contact_id'] = $data->getContactId();
        $values = [];
        foreach ($data->getLabels() as $value) {
            $values[] = $value;
        }
        $dataArray['labels'] = $values;
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailThread::class => false];
    }
}
