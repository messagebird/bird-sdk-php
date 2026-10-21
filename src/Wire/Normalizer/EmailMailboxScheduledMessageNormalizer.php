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
class EmailMailboxScheduledMessageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailMailboxScheduledMessage::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailMailboxScheduledMessage::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailMailboxScheduledMessage();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('cancel_on_reply', $data) && \is_int($data['cancel_on_reply'])) {
            $data['cancel_on_reply'] = (bool) $data['cancel_on_reply'];
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
            unset($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('mailbox_id', $data) && $data['mailbox_id'] !== null) {
            $object->setMailboxId($data['mailbox_id']);
            unset($data['mailbox_id']);
        }
        elseif (\array_key_exists('mailbox_id', $data) && $data['mailbox_id'] === null) {
            $object->setMailboxId(null);
        }
        if (\array_key_exists('thread_id', $data) && $data['thread_id'] !== null) {
            $object->setThreadId($data['thread_id']);
            unset($data['thread_id']);
        }
        elseif (\array_key_exists('thread_id', $data) && $data['thread_id'] === null) {
            $object->setThreadId(null);
        }
        if (\array_key_exists('message_id', $data) && $data['message_id'] !== null) {
            $object->setMessageId($data['message_id']);
            unset($data['message_id']);
        }
        elseif (\array_key_exists('message_id', $data) && $data['message_id'] === null) {
            $object->setMessageId(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
            unset($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('scheduled_at', $data) && $data['scheduled_at'] !== null) {
            $object->setScheduledAt(new \DateTime($data['scheduled_at']));
            unset($data['scheduled_at']);
        }
        elseif (\array_key_exists('scheduled_at', $data) && $data['scheduled_at'] === null) {
            $object->setScheduledAt(null);
        }
        if (\array_key_exists('cancel_on_reply', $data) && $data['cancel_on_reply'] !== null) {
            $object->setCancelOnReply($data['cancel_on_reply']);
            unset($data['cancel_on_reply']);
        }
        elseif (\array_key_exists('cancel_on_reply', $data) && $data['cancel_on_reply'] === null) {
            $object->setCancelOnReply(null);
        }
        if (\array_key_exists('failure_reason', $data) && $data['failure_reason'] !== null) {
            $object->setFailureReason($data['failure_reason']);
            unset($data['failure_reason']);
        }
        elseif (\array_key_exists('failure_reason', $data) && $data['failure_reason'] === null) {
            $object->setFailureReason(null);
        }
        if (\array_key_exists('cancellation_reason', $data) && $data['cancellation_reason'] !== null) {
            $object->setCancellationReason($data['cancellation_reason']);
            unset($data['cancellation_reason']);
        }
        elseif (\array_key_exists('cancellation_reason', $data) && $data['cancellation_reason'] === null) {
            $object->setCancellationReason(null);
        }
        if (\array_key_exists('subject', $data) && $data['subject'] !== null) {
            $object->setSubject($data['subject']);
            unset($data['subject']);
        }
        elseif (\array_key_exists('subject', $data) && $data['subject'] === null) {
            $object->setSubject(null);
        }
        if (\array_key_exists('snippet', $data) && $data['snippet'] !== null) {
            $object->setSnippet($data['snippet']);
            unset($data['snippet']);
        }
        elseif (\array_key_exists('snippet', $data) && $data['snippet'] === null) {
            $object->setSnippet(null);
        }
        if (\array_key_exists('recipients', $data) && $data['recipients'] !== null) {
            $values = [];
            foreach ($data['recipients'] as $value) {
                $values[] = $value;
            }
            $object->setRecipients($values);
            unset($data['recipients']);
        }
        elseif (\array_key_exists('recipients', $data) && $data['recipients'] === null) {
            $object->setRecipients(null);
        }
        if (\array_key_exists('created_by', $data) && $data['created_by'] !== null) {
            $object->setCreatedBy($this->denormalizer->denormalize($data['created_by'], \MessageBird\Wire\Model\Actor::class, 'json', $context));
            unset($data['created_by']);
        }
        elseif (\array_key_exists('created_by', $data) && $data['created_by'] === null) {
            $object->setCreatedBy(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
            unset($data['created_at']);
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
            unset($data['updated_at']);
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['mailbox_id'] = $data->getMailboxId();
        $dataArray['thread_id'] = $data->getThreadId();
        if ($data->isInitialized('messageId') && null !== $data->getMessageId()) {
            $dataArray['message_id'] = $data->getMessageId();
        }
        $dataArray['status'] = $data->getStatus();
        $dataArray['scheduled_at'] = $data->getScheduledAt()->format('Y-m-d\TH:i:sP');
        $dataArray['cancel_on_reply'] = $data->getCancelOnReply();
        if ($data->isInitialized('failureReason') && null !== $data->getFailureReason()) {
            $dataArray['failure_reason'] = $data->getFailureReason();
        }
        if ($data->isInitialized('cancellationReason') && null !== $data->getCancellationReason()) {
            $dataArray['cancellation_reason'] = $data->getCancellationReason();
        }
        $dataArray['subject'] = $data->getSubject();
        $dataArray['snippet'] = $data->getSnippet();
        $values = [];
        foreach ($data->getRecipients() as $value) {
            $values[] = $value;
        }
        $dataArray['recipients'] = $values;
        $dataArray['created_by'] = $this->normalizer->normalize($data->getCreatedBy(), 'json', $context);
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailMailboxScheduledMessage::class => false];
    }
}
