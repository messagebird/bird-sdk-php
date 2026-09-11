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
class EmailBroadcastNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailBroadcast::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailBroadcast::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailBroadcast();
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
        if (\array_key_exists('audience_id', $data) && $data['audience_id'] !== null) {
            $object->setAudienceId($data['audience_id']);
        }
        elseif (\array_key_exists('audience_id', $data) && $data['audience_id'] === null) {
            $object->setAudienceId(null);
        }
        if (\array_key_exists('template', $data) && $data['template'] !== null) {
            $object->setTemplate($this->denormalizer->denormalize($data['template'], \MessageBird\Wire\Model\EmailBroadcastTemplate::class, 'json', $context));
        }
        elseif (\array_key_exists('template', $data) && $data['template'] === null) {
            $object->setTemplate(null);
        }
        if (\array_key_exists('html_bytes', $data) && $data['html_bytes'] !== null) {
            $object->setHtmlBytes($data['html_bytes']);
        }
        elseif (\array_key_exists('html_bytes', $data) && $data['html_bytes'] === null) {
            $object->setHtmlBytes(null);
        }
        if (\array_key_exists('text_bytes', $data) && $data['text_bytes'] !== null) {
            $object->setTextBytes($data['text_bytes']);
        }
        elseif (\array_key_exists('text_bytes', $data) && $data['text_bytes'] === null) {
            $object->setTextBytes(null);
        }
        if (\array_key_exists('category', $data) && $data['category'] !== null) {
            $object->setCategory($data['category']);
        }
        elseif (\array_key_exists('category', $data) && $data['category'] === null) {
            $object->setCategory(null);
        }
        if (\array_key_exists('ip_pool_id', $data) && $data['ip_pool_id'] !== null) {
            $object->setIpPoolId($data['ip_pool_id']);
        }
        elseif (\array_key_exists('ip_pool_id', $data) && $data['ip_pool_id'] === null) {
            $object->setIpPoolId(null);
        }
        if (\array_key_exists('reply_to', $data) && $data['reply_to'] !== null) {
            $values = [];
            foreach ($data['reply_to'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\EmailAddress::class, 'json', $context);
            }
            $object->setReplyTo($values);
        }
        elseif (\array_key_exists('reply_to', $data) && $data['reply_to'] === null) {
            $object->setReplyTo(null);
        }
        if (\array_key_exists('headers', $data) && $data['headers'] !== null) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['headers'] as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $object->setHeaders($values_1);
        }
        elseif (\array_key_exists('headers', $data) && $data['headers'] === null) {
            $object->setHeaders(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('next', $data) && $data['next'] !== null) {
            $values_2 = [];
            foreach ($data['next'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \MessageBird\Wire\Model\NextAction::class, 'json', $context);
            }
            $object->setNext($values_2);
        }
        elseif (\array_key_exists('next', $data) && $data['next'] === null) {
            $object->setNext(null);
        }
        if (\array_key_exists('failure_reason', $data) && $data['failure_reason'] !== null) {
            $object->setFailureReason($data['failure_reason']);
        }
        elseif (\array_key_exists('failure_reason', $data) && $data['failure_reason'] === null) {
            $object->setFailureReason(null);
        }
        if (\array_key_exists('failure_detail', $data) && $data['failure_detail'] !== null) {
            $object->setFailureDetail($data['failure_detail']);
        }
        elseif (\array_key_exists('failure_detail', $data) && $data['failure_detail'] === null) {
            $object->setFailureDetail(null);
        }
        if (\array_key_exists('recipient_count', $data) && $data['recipient_count'] !== null) {
            $object->setRecipientCount($data['recipient_count']);
        }
        elseif (\array_key_exists('recipient_count', $data) && $data['recipient_count'] === null) {
            $object->setRecipientCount(null);
        }
        if (\array_key_exists('sent_count', $data) && $data['sent_count'] !== null) {
            $object->setSentCount($data['sent_count']);
        }
        elseif (\array_key_exists('sent_count', $data) && $data['sent_count'] === null) {
            $object->setSentCount(null);
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
        if (\array_key_exists('sending_ips', $data) && $data['sending_ips'] !== null) {
            $values_3 = [];
            foreach ($data['sending_ips'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setSendingIps($values_3);
        }
        elseif (\array_key_exists('sending_ips', $data) && $data['sending_ips'] === null) {
            $object->setSendingIps(null);
        }
        if (\array_key_exists('unique_opens_non_prefetched', $data) && $data['unique_opens_non_prefetched'] !== null) {
            $object->setUniqueOpensNonPrefetched($data['unique_opens_non_prefetched']);
        }
        elseif (\array_key_exists('unique_opens_non_prefetched', $data) && $data['unique_opens_non_prefetched'] === null) {
            $object->setUniqueOpensNonPrefetched(null);
        }
        if (\array_key_exists('unique_clicks', $data) && $data['unique_clicks'] !== null) {
            $object->setUniqueClicks($data['unique_clicks']);
        }
        elseif (\array_key_exists('unique_clicks', $data) && $data['unique_clicks'] === null) {
            $object->setUniqueClicks(null);
        }
        if (\array_key_exists('out_of_band_bounces', $data) && $data['out_of_band_bounces'] !== null) {
            $object->setOutOfBandBounces($data['out_of_band_bounces']);
        }
        elseif (\array_key_exists('out_of_band_bounces', $data) && $data['out_of_band_bounces'] === null) {
            $object->setOutOfBandBounces(null);
        }
        if (\array_key_exists('delivered_recipients', $data) && $data['delivered_recipients'] !== null) {
            $object->setDeliveredRecipients($data['delivered_recipients']);
        }
        elseif (\array_key_exists('delivered_recipients', $data) && $data['delivered_recipients'] === null) {
            $object->setDeliveredRecipients(null);
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
            foreach ($data['metadata'] as $key_1 => $value_5) {
                $values_5[$key_1] = $value_5;
            }
            $object->setMetadata($values_5);
        }
        elseif (\array_key_exists('metadata', $data) && $data['metadata'] === null) {
            $object->setMetadata(null);
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
        if (\array_key_exists('scheduled_at', $data) && $data['scheduled_at'] !== null) {
            $object->setScheduledAt(new \DateTime($data['scheduled_at']));
        }
        elseif (\array_key_exists('scheduled_at', $data) && $data['scheduled_at'] === null) {
            $object->setScheduledAt(null);
        }
        if (\array_key_exists('started_at', $data) && $data['started_at'] !== null) {
            $object->setStartedAt(new \DateTime($data['started_at']));
        }
        elseif (\array_key_exists('started_at', $data) && $data['started_at'] === null) {
            $object->setStartedAt(null);
        }
        if (\array_key_exists('sent_at', $data) && $data['sent_at'] !== null) {
            $object->setSentAt(new \DateTime($data['sent_at']));
        }
        elseif (\array_key_exists('sent_at', $data) && $data['sent_at'] === null) {
            $object->setSentAt(null);
        }
        if (\array_key_exists('canceled_at', $data) && $data['canceled_at'] !== null) {
            $object->setCanceledAt(new \DateTime($data['canceled_at']));
        }
        elseif (\array_key_exists('canceled_at', $data) && $data['canceled_at'] === null) {
            $object->setCanceledAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('from') && null !== $data->getFrom()) {
            $dataArray['from'] = $this->normalizer->normalize($data->getFrom(), 'json', $context);
        }
        if ($data->isInitialized('audienceId') && null !== $data->getAudienceId()) {
            $dataArray['audience_id'] = $data->getAudienceId();
        }
        if ($data->isInitialized('template')) {
            $dataArray['template'] = $this->normalizer->normalize($data->getTemplate(), 'json', $context);
        }
        $dataArray['category'] = $data->getCategory();
        if ($data->isInitialized('ipPoolId') && null !== $data->getIpPoolId()) {
            $dataArray['ip_pool_id'] = $data->getIpPoolId();
        }
        if ($data->isInitialized('replyTo') && null !== $data->getReplyTo()) {
            $values = [];
            foreach ($data->getReplyTo() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['reply_to'] = $values;
        }
        if ($data->isInitialized('headers') && null !== $data->getHeaders()) {
            $values_1 = [];
            foreach ($data->getHeaders() as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $dataArray['headers'] = (object) $values_1;
        }
        if ($data->isInitialized('tags') && null !== $data->getTags()) {
            $values_2 = [];
            foreach ($data->getTags() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $dataArray['tags'] = $values_2;
        }
        if ($data->isInitialized('metadata') && null !== $data->getMetadata()) {
            $values_3 = [];
            foreach ($data->getMetadata() as $key_1 => $value_3) {
                $values_3[$key_1] = $value_3;
            }
            $dataArray['metadata'] = (object) $values_3;
        }
        $dataArray['track_opens'] = $data->getTrackOpens();
        $dataArray['track_clicks'] = $data->getTrackClicks();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailBroadcast::class => false];
    }
}
