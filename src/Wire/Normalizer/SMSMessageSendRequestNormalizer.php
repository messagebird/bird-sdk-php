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
class SMSMessageSendRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\SMSMessageSendRequest::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\SMSMessageSendRequest::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\SMSMessageSendRequest();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('to', $data) && $data['to'] !== null) {
            $object->setTo($data['to']);
        }
        elseif (\array_key_exists('to', $data) && $data['to'] === null) {
            $object->setTo(null);
        }
        if (\array_key_exists('from', $data) && $data['from'] !== null) {
            $object->setFrom($data['from']);
        }
        elseif (\array_key_exists('from', $data) && $data['from'] === null) {
            $object->setFrom(null);
        }
        if (\array_key_exists('text', $data) && $data['text'] !== null) {
            $object->setText($data['text']);
        }
        elseif (\array_key_exists('text', $data) && $data['text'] === null) {
            $object->setText(null);
        }
        if (\array_key_exists('category', $data) && $data['category'] !== null) {
            $object->setCategory($data['category']);
        }
        elseif (\array_key_exists('category', $data) && $data['category'] === null) {
            $object->setCategory(null);
        }
        if (\array_key_exists('validity_period', $data) && $data['validity_period'] !== null) {
            $object->setValidityPeriod($data['validity_period']);
        }
        elseif (\array_key_exists('validity_period', $data) && $data['validity_period'] === null) {
            $object->setValidityPeriod(null);
        }
        if (\array_key_exists('tags', $data) && $data['tags'] !== null) {
            $values = [];
            foreach ($data['tags'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\Tag::class, 'json', $context);
            }
            $object->setTags($values);
        }
        elseif (\array_key_exists('tags', $data) && $data['tags'] === null) {
            $object->setTags(null);
        }
        if (\array_key_exists('metadata', $data) && $data['metadata'] !== null) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['metadata'] as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $object->setMetadata($values_1);
        }
        elseif (\array_key_exists('metadata', $data) && $data['metadata'] === null) {
            $object->setMetadata(null);
        }
        if (\array_key_exists('options', $data) && $data['options'] !== null) {
            $object->setOptions($this->denormalizer->denormalize($data['options'], \MessageBird\Wire\Model\SMSMessageSendRequestOptions::class, 'json', $context));
        }
        elseif (\array_key_exists('options', $data) && $data['options'] === null) {
            $object->setOptions(null);
        }
        if (\array_key_exists('media_urls', $data) && $data['media_urls'] !== null) {
            $values_2 = [];
            foreach ($data['media_urls'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setMediaUrls($values_2);
        }
        elseif (\array_key_exists('media_urls', $data) && $data['media_urls'] === null) {
            $object->setMediaUrls(null);
        }
        if (\array_key_exists('messaging_profile_id', $data) && $data['messaging_profile_id'] !== null) {
            $object->setMessagingProfileId($data['messaging_profile_id']);
        }
        elseif (\array_key_exists('messaging_profile_id', $data) && $data['messaging_profile_id'] === null) {
            $object->setMessagingProfileId(null);
        }
        if (\array_key_exists('scheduled_at', $data) && $data['scheduled_at'] !== null) {
            $object->setScheduledAt(new \DateTime($data['scheduled_at']));
        }
        elseif (\array_key_exists('scheduled_at', $data) && $data['scheduled_at'] === null) {
            $object->setScheduledAt(null);
        }
        if (\array_key_exists('template', $data) && $data['template'] !== null) {
            $object->setTemplate($this->denormalizer->denormalize($data['template'], \MessageBird\Wire\Model\SMSMessageSendRequestTemplate::class, 'json', $context));
        }
        elseif (\array_key_exists('template', $data) && $data['template'] === null) {
            $object->setTemplate(null);
        }
        if (\array_key_exists('broadcast_id', $data) && $data['broadcast_id'] !== null) {
            $object->setBroadcastId($data['broadcast_id']);
        }
        elseif (\array_key_exists('broadcast_id', $data) && $data['broadcast_id'] === null) {
            $object->setBroadcastId(null);
        }
        if (\array_key_exists('campaign_id', $data) && $data['campaign_id'] !== null) {
            $object->setCampaignId($data['campaign_id']);
        }
        elseif (\array_key_exists('campaign_id', $data) && $data['campaign_id'] === null) {
            $object->setCampaignId(null);
        }
        if (\array_key_exists('audience_id', $data) && $data['audience_id'] !== null) {
            $object->setAudienceId($data['audience_id']);
        }
        elseif (\array_key_exists('audience_id', $data) && $data['audience_id'] === null) {
            $object->setAudienceId(null);
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
        if (\array_key_exists('personalization', $data) && $data['personalization'] !== null) {
            $values_3 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['personalization'] as $key_1 => $value_3) {
                $values_3[$key_1] = $value_3;
            }
            $object->setPersonalization($values_3);
        }
        elseif (\array_key_exists('personalization', $data) && $data['personalization'] === null) {
            $object->setPersonalization(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['to'] = $data->getTo();
        if ($data->isInitialized('from') && null !== $data->getFrom()) {
            $dataArray['from'] = $data->getFrom();
        }
        if ($data->isInitialized('text') && null !== $data->getText()) {
            $dataArray['text'] = $data->getText();
        }
        if ($data->isInitialized('category') && null !== $data->getCategory()) {
            $dataArray['category'] = $data->getCategory();
        }
        if ($data->isInitialized('validityPeriod') && null !== $data->getValidityPeriod()) {
            $dataArray['validity_period'] = $data->getValidityPeriod();
        }
        if ($data->isInitialized('tags') && null !== $data->getTags()) {
            $values = [];
            foreach ($data->getTags() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['tags'] = $values;
        }
        if ($data->isInitialized('metadata') && null !== $data->getMetadata()) {
            $values_1 = [];
            foreach ($data->getMetadata() as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $dataArray['metadata'] = $values_1;
        }
        if ($data->isInitialized('options') && null !== $data->getOptions()) {
            $dataArray['options'] = $this->normalizer->normalize($data->getOptions(), 'json', $context);
        }
        if ($data->isInitialized('mediaUrls') && null !== $data->getMediaUrls()) {
            $values_2 = [];
            foreach ($data->getMediaUrls() as $value_2) {
                $values_2[] = $value_2;
            }
            $dataArray['media_urls'] = $values_2;
        }
        if ($data->isInitialized('messagingProfileId') && null !== $data->getMessagingProfileId()) {
            $dataArray['messaging_profile_id'] = $data->getMessagingProfileId();
        }
        if ($data->isInitialized('scheduledAt') && null !== $data->getScheduledAt()) {
            $dataArray['scheduled_at'] = $data->getScheduledAt()->format('Y-m-d\TH:i:sP');
        }
        if ($data->isInitialized('template') && null !== $data->getTemplate()) {
            $dataArray['template'] = $this->normalizer->normalize($data->getTemplate(), 'json', $context);
        }
        if ($data->isInitialized('broadcastId') && null !== $data->getBroadcastId()) {
            $dataArray['broadcast_id'] = $data->getBroadcastId();
        }
        if ($data->isInitialized('campaignId') && null !== $data->getCampaignId()) {
            $dataArray['campaign_id'] = $data->getCampaignId();
        }
        if ($data->isInitialized('audienceId') && null !== $data->getAudienceId()) {
            $dataArray['audience_id'] = $data->getAudienceId();
        }
        if ($data->isInitialized('contactId') && null !== $data->getContactId()) {
            $dataArray['contact_id'] = $data->getContactId();
        }
        if ($data->isInitialized('topicId') && null !== $data->getTopicId()) {
            $dataArray['topic_id'] = $data->getTopicId();
        }
        if ($data->isInitialized('personalization') && null !== $data->getPersonalization()) {
            $values_3 = [];
            foreach ($data->getPersonalization() as $key_1 => $value_3) {
                $values_3[$key_1] = $value_3;
            }
            $dataArray['personalization'] = $values_3;
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\SMSMessageSendRequest::class => false];
    }
}
