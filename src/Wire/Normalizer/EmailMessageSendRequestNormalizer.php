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
class EmailMessageSendRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailMessageSendRequest::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailMessageSendRequest::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailMessageSendRequest();
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
        if (\array_key_exists('from', $data) && $data['from'] !== null) {
            $object->setFrom($data['from']);
        }
        elseif (\array_key_exists('from', $data) && $data['from'] === null) {
            $object->setFrom(null);
        }
        if (\array_key_exists('to', $data) && $data['to'] !== null) {
            $values = [];
            foreach ($data['to'] as $value) {
                $values[] = $value;
            }
            $object->setTo($values);
        }
        elseif (\array_key_exists('to', $data) && $data['to'] === null) {
            $object->setTo(null);
        }
        if (\array_key_exists('cc', $data) && $data['cc'] !== null) {
            $values_1 = [];
            foreach ($data['cc'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setCc($values_1);
        }
        elseif (\array_key_exists('cc', $data) && $data['cc'] === null) {
            $object->setCc(null);
        }
        if (\array_key_exists('bcc', $data) && $data['bcc'] !== null) {
            $values_2 = [];
            foreach ($data['bcc'] as $value_2) {
                $values_2[] = $value_2;
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
        if (\array_key_exists('html', $data) && $data['html'] !== null) {
            $object->setHtml($data['html']);
        }
        elseif (\array_key_exists('html', $data) && $data['html'] === null) {
            $object->setHtml(null);
        }
        if (\array_key_exists('text', $data) && $data['text'] !== null) {
            $object->setText($data['text']);
        }
        elseif (\array_key_exists('text', $data) && $data['text'] === null) {
            $object->setText(null);
        }
        if (\array_key_exists('reply_to', $data) && $data['reply_to'] !== null) {
            $values_3 = [];
            foreach ($data['reply_to'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setReplyTo($values_3);
        }
        elseif (\array_key_exists('reply_to', $data) && $data['reply_to'] === null) {
            $object->setReplyTo(null);
        }
        if (\array_key_exists('headers', $data) && $data['headers'] !== null) {
            $values_4 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['headers'] as $key => $value_4) {
                $values_4[$key] = $value_4;
            }
            $object->setHeaders($values_4);
        }
        elseif (\array_key_exists('headers', $data) && $data['headers'] === null) {
            $object->setHeaders(null);
        }
        if (\array_key_exists('tags', $data) && $data['tags'] !== null) {
            $values_5 = [];
            foreach ($data['tags'] as $value_5) {
                $values_5[] = $this->denormalizer->denormalize($value_5, \MessageBird\Wire\Model\Tag::class, 'json', $context);
            }
            $object->setTags($values_5);
        }
        elseif (\array_key_exists('tags', $data) && $data['tags'] === null) {
            $object->setTags(null);
        }
        if (\array_key_exists('metadata', $data) && $data['metadata'] !== null) {
            $values_6 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['metadata'] as $key_1 => $value_6) {
                $values_6[$key_1] = $value_6;
            }
            $object->setMetadata($values_6);
        }
        elseif (\array_key_exists('metadata', $data) && $data['metadata'] === null) {
            $object->setMetadata(null);
        }
        if (\array_key_exists('parameters', $data) && $data['parameters'] !== null) {
            $values_7 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['parameters'] as $key_2 => $value_7) {
                $values_7[$key_2] = $value_7;
            }
            $object->setParameters($values_7);
        }
        elseif (\array_key_exists('parameters', $data) && $data['parameters'] === null) {
            $object->setParameters(null);
        }
        if (\array_key_exists('template', $data) && $data['template'] !== null) {
            $object->setTemplate($this->denormalizer->denormalize($data['template'], \MessageBird\Wire\Model\EmailMessageSendRequestTemplate::class, 'json', $context));
        }
        elseif (\array_key_exists('template', $data) && $data['template'] === null) {
            $object->setTemplate(null);
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
        if (\array_key_exists('ip_pool_id', $data) && $data['ip_pool_id'] !== null) {
            $object->setIpPoolId($data['ip_pool_id']);
        }
        elseif (\array_key_exists('ip_pool_id', $data) && $data['ip_pool_id'] === null) {
            $object->setIpPoolId(null);
        }
        if (\array_key_exists('category', $data) && $data['category'] !== null) {
            $object->setCategory($data['category']);
        }
        elseif (\array_key_exists('category', $data) && $data['category'] === null) {
            $object->setCategory(null);
        }
        if (\array_key_exists('in_reply_to_message_id', $data) && $data['in_reply_to_message_id'] !== null) {
            $object->setInReplyToMessageId($data['in_reply_to_message_id']);
        }
        elseif (\array_key_exists('in_reply_to_message_id', $data) && $data['in_reply_to_message_id'] === null) {
            $object->setInReplyToMessageId(null);
        }
        if (\array_key_exists('attachments', $data) && $data['attachments'] !== null) {
            $values_8 = [];
            foreach ($data['attachments'] as $value_8) {
                $values_8[] = $this->denormalizer->denormalize($value_8, \MessageBird\Wire\Model\EmailAttachment::class, 'json', $context);
            }
            $object->setAttachments($values_8);
        }
        elseif (\array_key_exists('attachments', $data) && $data['attachments'] === null) {
            $object->setAttachments(null);
        }
        if (\array_key_exists('scheduled_at', $data) && $data['scheduled_at'] !== null) {
            $object->setScheduledAt(new \DateTime($data['scheduled_at']));
        }
        elseif (\array_key_exists('scheduled_at', $data) && $data['scheduled_at'] === null) {
            $object->setScheduledAt(null);
        }
        if (\array_key_exists('contact_id', $data) && $data['contact_id'] !== null) {
            $object->setContactId($data['contact_id']);
        }
        elseif (\array_key_exists('contact_id', $data) && $data['contact_id'] === null) {
            $object->setContactId(null);
        }
        if (\array_key_exists('topic_id', $data) && $data['topic_id'] !== null) {
            $object->setTopicId($data['topic_id']);
        }
        elseif (\array_key_exists('topic_id', $data) && $data['topic_id'] === null) {
            $object->setTopicId(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['from'] = $data->getFrom();
        $values = [];
        foreach ($data->getTo() as $value) {
            $values[] = $value;
        }
        $dataArray['to'] = $values;
        if ($data->isInitialized('cc') && null !== $data->getCc()) {
            $values_1 = [];
            foreach ($data->getCc() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['cc'] = $values_1;
        }
        if ($data->isInitialized('bcc') && null !== $data->getBcc()) {
            $values_2 = [];
            foreach ($data->getBcc() as $value_2) {
                $values_2[] = $value_2;
            }
            $dataArray['bcc'] = $values_2;
        }
        if ($data->isInitialized('subject') && null !== $data->getSubject()) {
            $dataArray['subject'] = $data->getSubject();
        }
        if ($data->isInitialized('html') && null !== $data->getHtml()) {
            $dataArray['html'] = $data->getHtml();
        }
        if ($data->isInitialized('text') && null !== $data->getText()) {
            $dataArray['text'] = $data->getText();
        }
        if ($data->isInitialized('replyTo') && null !== $data->getReplyTo()) {
            $values_3 = [];
            foreach ($data->getReplyTo() as $value_3) {
                $values_3[] = $value_3;
            }
            $dataArray['reply_to'] = $values_3;
        }
        if ($data->isInitialized('headers') && null !== $data->getHeaders()) {
            $values_4 = [];
            foreach ($data->getHeaders() as $key => $value_4) {
                $values_4[$key] = $value_4;
            }
            $dataArray['headers'] = $values_4;
        }
        if ($data->isInitialized('tags') && null !== $data->getTags()) {
            $values_5 = [];
            foreach ($data->getTags() as $value_5) {
                $values_5[] = $this->normalizer->normalize($value_5, 'json', $context);
            }
            $dataArray['tags'] = $values_5;
        }
        if ($data->isInitialized('metadata') && null !== $data->getMetadata()) {
            $values_6 = [];
            foreach ($data->getMetadata() as $key_1 => $value_6) {
                $values_6[$key_1] = $value_6;
            }
            $dataArray['metadata'] = $values_6;
        }
        if ($data->isInitialized('parameters') && null !== $data->getParameters()) {
            $values_7 = [];
            foreach ($data->getParameters() as $key_2 => $value_7) {
                $values_7[$key_2] = $value_7;
            }
            $dataArray['parameters'] = $values_7;
        }
        if ($data->isInitialized('template') && null !== $data->getTemplate()) {
            $dataArray['template'] = $this->normalizer->normalize($data->getTemplate(), 'json', $context);
        }
        if ($data->isInitialized('trackOpens') && null !== $data->getTrackOpens()) {
            $dataArray['track_opens'] = $data->getTrackOpens();
        }
        if ($data->isInitialized('trackClicks') && null !== $data->getTrackClicks()) {
            $dataArray['track_clicks'] = $data->getTrackClicks();
        }
        if ($data->isInitialized('ipPoolId') && null !== $data->getIpPoolId()) {
            $dataArray['ip_pool_id'] = $data->getIpPoolId();
        }
        if ($data->isInitialized('category') && null !== $data->getCategory()) {
            $dataArray['category'] = $data->getCategory();
        }
        if ($data->isInitialized('inReplyToMessageId') && null !== $data->getInReplyToMessageId()) {
            $dataArray['in_reply_to_message_id'] = $data->getInReplyToMessageId();
        }
        if ($data->isInitialized('attachments') && null !== $data->getAttachments()) {
            $values_8 = [];
            foreach ($data->getAttachments() as $value_8) {
                $values_8[] = $this->normalizer->normalize($value_8, 'json', $context);
            }
            $dataArray['attachments'] = $values_8;
        }
        if ($data->isInitialized('scheduledAt') && null !== $data->getScheduledAt()) {
            $dataArray['scheduled_at'] = $data->getScheduledAt()->format('Y-m-d\TH:i:sP');
        }
        if ($data->isInitialized('contactId') && null !== $data->getContactId()) {
            $dataArray['contact_id'] = $data->getContactId();
        }
        if ($data->isInitialized('topicId') && null !== $data->getTopicId()) {
            $dataArray['topic_id'] = $data->getTopicId();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailMessageSendRequest::class => false];
    }
}
