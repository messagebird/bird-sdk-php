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
        if (\array_key_exists('read', $data) && \is_int($data['read'])) {
            $data['read'] = (bool) $data['read'];
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
        if (\array_key_exists('participant_names', $data) && $data['participant_names'] !== null) {
            $values_1 = [];
            foreach ($data['participant_names'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\EmailThreadParticipantName::class, 'json', $context);
            }
            $object->setParticipantNames($values_1);
        }
        elseif (\array_key_exists('participant_names', $data) && $data['participant_names'] === null) {
            $object->setParticipantNames(null);
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
        if (\array_key_exists('folder', $data) && $data['folder'] !== null) {
            $object->setFolder($data['folder']);
        }
        elseif (\array_key_exists('folder', $data) && $data['folder'] === null) {
            $object->setFolder(null);
        }
        if (\array_key_exists('read', $data) && $data['read'] !== null) {
            $object->setRead($data['read']);
        }
        elseif (\array_key_exists('read', $data) && $data['read'] === null) {
            $object->setRead(null);
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
        if (\array_key_exists('scheduled_count', $data) && $data['scheduled_count'] !== null) {
            $object->setScheduledCount($data['scheduled_count']);
        }
        elseif (\array_key_exists('scheduled_count', $data) && $data['scheduled_count'] === null) {
            $object->setScheduledCount(null);
        }
        if (\array_key_exists('next_scheduled_at', $data) && $data['next_scheduled_at'] !== null) {
            $object->setNextScheduledAt(new \DateTime($data['next_scheduled_at']));
        }
        elseif (\array_key_exists('next_scheduled_at', $data) && $data['next_scheduled_at'] === null) {
            $object->setNextScheduledAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('id')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailThread.id missing');
        }
        $dataArray['id'] = $data->getId();
        if (!$data->isInitialized('mailboxId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailThread.mailbox_id missing');
        }
        $dataArray['mailbox_id'] = $data->getMailboxId();
        if (!$data->isInitialized('channel')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailThread.channel missing');
        }
        $dataArray['channel'] = $data->getChannel();
        if (!$data->isInitialized('contactId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailThread.contact_id missing');
        }
        $dataArray['contact_id'] = $data->getContactId();
        if (!$data->isInitialized('subject')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailThread.subject missing');
        }
        $dataArray['subject'] = $data->getSubject();
        if (!$data->isInitialized('participants')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailThread.participants missing');
        }
        $values = [];
        foreach ($data->getParticipants() as $value) {
            $values[] = $value;
        }
        $dataArray['participants'] = $values;
        if (!$data->isInitialized('participantNames')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailThread.participant_names missing');
        }
        $values_1 = [];
        foreach ($data->getParticipantNames() as $value_1) {
            $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
        }
        $dataArray['participant_names'] = $values_1;
        if (!$data->isInitialized('messageCount')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailThread.message_count missing');
        }
        $dataArray['message_count'] = $data->getMessageCount();
        if (!$data->isInitialized('unreadCount')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailThread.unread_count missing');
        }
        $dataArray['unread_count'] = $data->getUnreadCount();
        if (!$data->isInitialized('lastMessageAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailThread.last_message_at missing');
        }
        $dataArray['last_message_at'] = $data->getLastMessageAt()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('lastDirection')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailThread.last_direction missing');
        }
        $dataArray['last_direction'] = $data->getLastDirection();
        if (!$data->isInitialized('folder')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailThread.folder missing');
        }
        $dataArray['folder'] = $data->getFolder();
        if (!$data->isInitialized('read')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailThread.read missing');
        }
        $dataArray['read'] = $data->getRead();
        if (!$data->isInitialized('labels')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailThread.labels missing');
        }
        $values_2 = [];
        foreach ($data->getLabels() as $value_2) {
            $values_2[] = $value_2;
        }
        $dataArray['labels'] = $values_2;
        if (!$data->isInitialized('createdAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailThread.created_at missing');
        }
        $dataArray['created_at'] = $data->getCreatedAt()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('updatedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailThread.updated_at missing');
        }
        $dataArray['updated_at'] = $data->getUpdatedAt()->format('Y-m-d\TH:i:sP');
        if ($data->isInitialized('scheduledCount') && null !== $data->getScheduledCount()) {
            $dataArray['scheduled_count'] = $data->getScheduledCount();
        }
        if ($data->isInitialized('nextScheduledAt') && null !== $data->getNextScheduledAt()) {
            $dataArray['next_scheduled_at'] = $data->getNextScheduledAt()->format('Y-m-d\TH:i:sP');
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailThread::class => false];
    }
}
