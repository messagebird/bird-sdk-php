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
class EmailBroadcastCreateRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailBroadcastCreateRequest::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailBroadcastCreateRequest::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailBroadcastCreateRequest();
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
        if (\array_key_exists('send', $data) && \is_int($data['send'])) {
            $data['send'] = (bool) $data['send'];
        }
        if (\array_key_exists('from', $data) && $data['from'] !== null) {
            $object->setFrom($data['from']);
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
            $object->setTemplate($this->denormalizer->denormalize($data['template'], \MessageBird\Wire\Model\EmailBroadcastTemplateCreate::class, 'json', $context));
        }
        elseif (\array_key_exists('template', $data) && $data['template'] === null) {
            $object->setTemplate(null);
        }
        if (\array_key_exists('reply_to', $data) && $data['reply_to'] !== null) {
            $values = [];
            foreach ($data['reply_to'] as $value) {
                $values[] = $value;
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
        if (\array_key_exists('tags', $data) && $data['tags'] !== null) {
            $values_2 = [];
            foreach ($data['tags'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \MessageBird\Wire\Model\Tag::class, 'json', $context);
            }
            $object->setTags($values_2);
        }
        elseif (\array_key_exists('tags', $data) && $data['tags'] === null) {
            $object->setTags(null);
        }
        if (\array_key_exists('metadata', $data) && $data['metadata'] !== null) {
            $values_3 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['metadata'] as $key_1 => $value_3) {
                $values_3[$key_1] = $value_3;
            }
            $object->setMetadata($values_3);
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
        if (\array_key_exists('send', $data) && $data['send'] !== null) {
            $object->setSend($data['send']);
        }
        elseif (\array_key_exists('send', $data) && $data['send'] === null) {
            $object->setSend(null);
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
        if ($data->isInitialized('from') && null !== $data->getFrom()) {
            $dataArray['from'] = $data->getFrom();
        }
        if ($data->isInitialized('audienceId') && null !== $data->getAudienceId()) {
            $dataArray['audience_id'] = $data->getAudienceId();
        }
        if ($data->isInitialized('template') && null !== $data->getTemplate()) {
            $dataArray['template'] = $this->normalizer->normalize($data->getTemplate(), 'json', $context);
        }
        if ($data->isInitialized('replyTo') && null !== $data->getReplyTo()) {
            $values = [];
            foreach ($data->getReplyTo() as $value) {
                $values[] = $value;
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
        if ($data->isInitialized('send') && null !== $data->getSend()) {
            $dataArray['send'] = $data->getSend();
        }
        if ($data->isInitialized('scheduledAt') && null !== $data->getScheduledAt()) {
            $dataArray['scheduled_at'] = $data->getScheduledAt()->format('Y-m-d\TH:i:sP');
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailBroadcastCreateRequest::class => false];
    }
}
