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
class EmailMessageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailMessage::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailMessage::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailMessage();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('track_opens', $data) && \is_int($data['track_opens'])) {
            $data['track_opens'] = (bool) $data['track_opens'];
        }
        if (\array_key_exists('track_clicks', $data) && \is_int($data['track_clicks'])) {
            $data['track_clicks'] = (bool) $data['track_clicks'];
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('from', $data) && $data['from'] !== null) {
            $object->setFrom($this->denormalizer->denormalize($data['from'], \MessageBird\Wire\Model\EmailAddress::class, 'json', $context));
        }
        elseif (\array_key_exists('from', $data) && $data['from'] === null) {
            $object->setFrom(null);
        }
        if (\array_key_exists('to', $data) && $data['to'] !== null) {
            $values = [];
            foreach ($data['to'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\EmailAddress::class, 'json', $context);
            }
            $object->setTo($values);
        }
        elseif (\array_key_exists('to', $data) && $data['to'] === null) {
            $object->setTo(null);
        }
        if (\array_key_exists('cc', $data) && $data['cc'] !== null) {
            $values_1 = [];
            foreach ($data['cc'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\EmailAddress::class, 'json', $context);
            }
            $object->setCc($values_1);
        }
        elseif (\array_key_exists('cc', $data) && $data['cc'] === null) {
            $object->setCc(null);
        }
        if (\array_key_exists('bcc', $data) && $data['bcc'] !== null) {
            $values_2 = [];
            foreach ($data['bcc'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \MessageBird\Wire\Model\EmailAddress::class, 'json', $context);
            }
            $object->setBcc($values_2);
        }
        elseif (\array_key_exists('bcc', $data) && $data['bcc'] === null) {
            $object->setBcc(null);
        }
        if (\array_key_exists('subject', $data) && $data['subject'] !== null) {
            $object->setSubject($data['subject']);
        }
        elseif (\array_key_exists('subject', $data) && $data['subject'] === null) {
            $object->setSubject(null);
        }
        if (\array_key_exists('category', $data) && $data['category'] !== null) {
            $object->setCategory($data['category']);
        }
        elseif (\array_key_exists('category', $data) && $data['category'] === null) {
            $object->setCategory(null);
        }
        if (\array_key_exists('reply_to', $data) && $data['reply_to'] !== null) {
            $values_3 = [];
            foreach ($data['reply_to'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, \MessageBird\Wire\Model\EmailAddress::class, 'json', $context);
            }
            $object->setReplyTo($values_3);
        }
        elseif (\array_key_exists('reply_to', $data) && $data['reply_to'] === null) {
            $object->setReplyTo(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('accepted_count', $data) && $data['accepted_count'] !== null) {
            $object->setAcceptedCount($data['accepted_count']);
        }
        elseif (\array_key_exists('accepted_count', $data) && $data['accepted_count'] === null) {
            $object->setAcceptedCount(null);
        }
        if (\array_key_exists('processed_count', $data) && $data['processed_count'] !== null) {
            $object->setProcessedCount($data['processed_count']);
        }
        elseif (\array_key_exists('processed_count', $data) && $data['processed_count'] === null) {
            $object->setProcessedCount(null);
        }
        if (\array_key_exists('delivered_count', $data) && $data['delivered_count'] !== null) {
            $object->setDeliveredCount($data['delivered_count']);
        }
        elseif (\array_key_exists('delivered_count', $data) && $data['delivered_count'] === null) {
            $object->setDeliveredCount(null);
        }
        if (\array_key_exists('bounced_count', $data) && $data['bounced_count'] !== null) {
            $object->setBouncedCount($data['bounced_count']);
        }
        elseif (\array_key_exists('bounced_count', $data) && $data['bounced_count'] === null) {
            $object->setBouncedCount(null);
        }
        if (\array_key_exists('complained_count', $data) && $data['complained_count'] !== null) {
            $object->setComplainedCount($data['complained_count']);
        }
        elseif (\array_key_exists('complained_count', $data) && $data['complained_count'] === null) {
            $object->setComplainedCount(null);
        }
        if (\array_key_exists('deferred_count', $data) && $data['deferred_count'] !== null) {
            $object->setDeferredCount($data['deferred_count']);
        }
        elseif (\array_key_exists('deferred_count', $data) && $data['deferred_count'] === null) {
            $object->setDeferredCount(null);
        }
        if (\array_key_exists('rejected_count', $data) && $data['rejected_count'] !== null) {
            $object->setRejectedCount($data['rejected_count']);
        }
        elseif (\array_key_exists('rejected_count', $data) && $data['rejected_count'] === null) {
            $object->setRejectedCount(null);
        }
        if (\array_key_exists('processing_latency_ms', $data) && $data['processing_latency_ms'] !== null) {
            $object->setProcessingLatencyMs($data['processing_latency_ms']);
        }
        elseif (\array_key_exists('processing_latency_ms', $data) && $data['processing_latency_ms'] === null) {
            $object->setProcessingLatencyMs(null);
        }
        if (\array_key_exists('delivery_latency_ms', $data) && $data['delivery_latency_ms'] !== null) {
            $object->setDeliveryLatencyMs($data['delivery_latency_ms']);
        }
        elseif (\array_key_exists('delivery_latency_ms', $data) && $data['delivery_latency_ms'] === null) {
            $object->setDeliveryLatencyMs(null);
        }
        if (\array_key_exists('total_latency_ms', $data) && $data['total_latency_ms'] !== null) {
            $object->setTotalLatencyMs($data['total_latency_ms']);
        }
        elseif (\array_key_exists('total_latency_ms', $data) && $data['total_latency_ms'] === null) {
            $object->setTotalLatencyMs(null);
        }
        if (\array_key_exists('open_count', $data) && $data['open_count'] !== null) {
            $object->setOpenCount($data['open_count']);
        }
        elseif (\array_key_exists('open_count', $data) && $data['open_count'] === null) {
            $object->setOpenCount(null);
        }
        if (\array_key_exists('click_count', $data) && $data['click_count'] !== null) {
            $object->setClickCount($data['click_count']);
        }
        elseif (\array_key_exists('click_count', $data) && $data['click_count'] === null) {
            $object->setClickCount(null);
        }
        if (\array_key_exists('requested_language', $data) && $data['requested_language'] !== null) {
            $object->setRequestedLanguage($data['requested_language']);
        }
        elseif (\array_key_exists('requested_language', $data) && $data['requested_language'] === null) {
            $object->setRequestedLanguage(null);
        }
        if (\array_key_exists('resolved_language', $data) && $data['resolved_language'] !== null) {
            $object->setResolvedLanguage($data['resolved_language']);
        }
        elseif (\array_key_exists('resolved_language', $data) && $data['resolved_language'] === null) {
            $object->setResolvedLanguage(null);
        }
        if (\array_key_exists('template_id', $data) && $data['template_id'] !== null) {
            $object->setTemplateId($data['template_id']);
        }
        elseif (\array_key_exists('template_id', $data) && $data['template_id'] === null) {
            $object->setTemplateId(null);
        }
        if (\array_key_exists('template_version_id', $data) && $data['template_version_id'] !== null) {
            $object->setTemplateVersionId($data['template_version_id']);
        }
        elseif (\array_key_exists('template_version_id', $data) && $data['template_version_id'] === null) {
            $object->setTemplateVersionId(null);
        }
        if (\array_key_exists('tags', $data) && $data['tags'] !== null) {
            $values_4 = [];
            foreach ($data['tags'] as $value_4) {
                $values_4[] = $this->denormalizer->denormalize($value_4, \MessageBird\Wire\Model\Tag::class, 'json', $context);
            }
            $object->setTags($values_4);
        }
        elseif (\array_key_exists('tags', $data) && $data['tags'] === null) {
            $object->setTags(null);
        }
        if (\array_key_exists('metadata', $data) && $data['metadata'] !== null) {
            $values_5 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['metadata'] as $key => $value_5) {
                $values_5[$key] = $value_5;
            }
            $object->setMetadata($values_5);
        }
        elseif (\array_key_exists('metadata', $data) && $data['metadata'] === null) {
            $object->setMetadata(null);
        }
        if (\array_key_exists('parameters', $data) && $data['parameters'] !== null) {
            $values_6 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['parameters'] as $key_1 => $value_6) {
                $values_6[$key_1] = $value_6;
            }
            $object->setParameters($values_6);
        }
        elseif (\array_key_exists('parameters', $data) && $data['parameters'] === null) {
            $object->setParameters(null);
        }
        if (\array_key_exists('attachments', $data) && $data['attachments'] !== null) {
            $values_7 = [];
            foreach ($data['attachments'] as $value_7) {
                $values_7[] = $this->denormalizer->denormalize($value_7, \MessageBird\Wire\Model\EmailAttachmentRef::class, 'json', $context);
            }
            $object->setAttachments($values_7);
        }
        elseif (\array_key_exists('attachments', $data) && $data['attachments'] === null) {
            $object->setAttachments(null);
        }
        if (\array_key_exists('track_opens', $data) && $data['track_opens'] !== null) {
            $object->setTrackOpens($data['track_opens']);
        }
        elseif (\array_key_exists('track_opens', $data) && $data['track_opens'] === null) {
            $object->setTrackOpens(null);
        }
        if (\array_key_exists('track_clicks', $data) && $data['track_clicks'] !== null) {
            $object->setTrackClicks($data['track_clicks']);
        }
        elseif (\array_key_exists('track_clicks', $data) && $data['track_clicks'] === null) {
            $object->setTrackClicks(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('thread_id', $data) && $data['thread_id'] !== null) {
            $object->setThreadId($data['thread_id']);
        }
        elseif (\array_key_exists('thread_id', $data) && $data['thread_id'] === null) {
            $object->setThreadId(null);
        }
        if (\array_key_exists('in_reply_to_message_id', $data) && $data['in_reply_to_message_id'] !== null) {
            $object->setInReplyToMessageId($data['in_reply_to_message_id']);
        }
        elseif (\array_key_exists('in_reply_to_message_id', $data) && $data['in_reply_to_message_id'] === null) {
            $object->setInReplyToMessageId(null);
        }
        if (\array_key_exists('delivered_at', $data) && $data['delivered_at'] !== null) {
            $object->setDeliveredAt(new \DateTime($data['delivered_at']));
        }
        elseif (\array_key_exists('delivered_at', $data) && $data['delivered_at'] === null) {
            $object->setDeliveredAt(null);
        }
        if (\array_key_exists('scheduled_at', $data) && $data['scheduled_at'] !== null) {
            $object->setScheduledAt(new \DateTime($data['scheduled_at']));
        }
        elseif (\array_key_exists('scheduled_at', $data) && $data['scheduled_at'] === null) {
            $object->setScheduledAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['from'] = $this->normalizer->normalize($data->getFrom(), 'json', $context);
        $values = [];
        foreach ($data->getTo() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $dataArray['to'] = $values;
        if ($data->isInitialized('cc') && null !== $data->getCc()) {
            $values_1 = [];
            foreach ($data->getCc() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $dataArray['cc'] = $values_1;
        }
        if ($data->isInitialized('bcc') && null !== $data->getBcc()) {
            $values_2 = [];
            foreach ($data->getBcc() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $dataArray['bcc'] = $values_2;
        }
        $dataArray['subject'] = $data->getSubject();
        $dataArray['category'] = $data->getCategory();
        if ($data->isInitialized('replyTo')) {
            $values_3 = [];
            foreach ($data->getReplyTo() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $dataArray['reply_to'] = $values_3;
        }
        if ($data->isInitialized('tags') && null !== $data->getTags()) {
            $values_4 = [];
            foreach ($data->getTags() as $value_4) {
                $values_4[] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $dataArray['tags'] = $values_4;
        }
        if ($data->isInitialized('metadata') && null !== $data->getMetadata()) {
            $values_5 = [];
            foreach ($data->getMetadata() as $key => $value_5) {
                $values_5[$key] = $value_5;
            }
            $dataArray['metadata'] = $values_5;
        }
        if ($data->isInitialized('attachments') && null !== $data->getAttachments()) {
            $values_6 = [];
            foreach ($data->getAttachments() as $value_6) {
                $values_6[] = $this->normalizer->normalize($value_6, 'json', $context);
            }
            $dataArray['attachments'] = $values_6;
        }
        $dataArray['track_opens'] = $data->getTrackOpens();
        $dataArray['track_clicks'] = $data->getTrackClicks();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailMessage::class => false];
    }
}
