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
class AMBMessageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBMessage::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBMessage::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBMessage();
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
        if (\array_key_exists('conversation_id', $data) && $data['conversation_id'] !== null) {
            $object->setConversationId($data['conversation_id']);
        }
        elseif (\array_key_exists('conversation_id', $data) && $data['conversation_id'] === null) {
            $object->setConversationId(null);
        }
        if (\array_key_exists('business_account_id', $data) && $data['business_account_id'] !== null) {
            $object->setBusinessAccountId($data['business_account_id']);
        }
        elseif (\array_key_exists('business_account_id', $data) && $data['business_account_id'] === null) {
            $object->setBusinessAccountId(null);
        }
        if (\array_key_exists('from', $data) && $data['from'] !== null) {
            $object->setFrom($data['from']);
        }
        elseif (\array_key_exists('from', $data) && $data['from'] === null) {
            $object->setFrom(null);
        }
        if (\array_key_exists('to', $data) && $data['to'] !== null) {
            $object->setTo($data['to']);
        }
        elseif (\array_key_exists('to', $data) && $data['to'] === null) {
            $object->setTo(null);
        }
        if (\array_key_exists('direction', $data) && $data['direction'] !== null) {
            $object->setDirection($data['direction']);
        }
        elseif (\array_key_exists('direction', $data) && $data['direction'] === null) {
            $object->setDirection(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('kind', $data) && $data['kind'] !== null) {
            $object->setKind($data['kind']);
        }
        elseif (\array_key_exists('kind', $data) && $data['kind'] === null) {
            $object->setKind(null);
        }
        if (\array_key_exists('source', $data) && $data['source'] !== null) {
            $object->setSource($data['source']);
        }
        elseif (\array_key_exists('source', $data) && $data['source'] === null) {
            $object->setSource(null);
        }
        if (\array_key_exists('content', $data) && $data['content'] !== null) {
            $object->setContent($data['content']);
        }
        elseif (\array_key_exists('content', $data) && $data['content'] === null) {
            $object->setContent(null);
        }
        if (\array_key_exists('in_reply_to_message_id', $data) && $data['in_reply_to_message_id'] !== null) {
            $object->setInReplyToMessageId($data['in_reply_to_message_id']);
        }
        elseif (\array_key_exists('in_reply_to_message_id', $data) && $data['in_reply_to_message_id'] === null) {
            $object->setInReplyToMessageId(null);
        }
        if (\array_key_exists('locale', $data) && $data['locale'] !== null) {
            $object->setLocale($data['locale']);
        }
        elseif (\array_key_exists('locale', $data) && $data['locale'] === null) {
            $object->setLocale(null);
        }
        if (\array_key_exists('category', $data) && $data['category'] !== null) {
            $object->setCategory($data['category']);
        }
        elseif (\array_key_exists('category', $data) && $data['category'] === null) {
            $object->setCategory(null);
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
        if (\array_key_exists('tags', $data) && $data['tags'] !== null) {
            $values_1 = [];
            foreach ($data['tags'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\Tag::class, 'json', $context);
            }
            $object->setTags($values_1);
        }
        elseif (\array_key_exists('tags', $data) && $data['tags'] === null) {
            $object->setTags(null);
        }
        if (\array_key_exists('cost', $data) && $data['cost'] !== null) {
            $object->setCost($this->denormalizer->denormalize($data['cost'], \MessageBird\Wire\Model\MessageCost::class, 'json', $context));
        }
        elseif (\array_key_exists('cost', $data) && $data['cost'] === null) {
            $object->setCost(null);
        }
        if (\array_key_exists('last_error', $data) && $data['last_error'] !== null) {
            $object->setLastError($this->denormalizer->denormalize($data['last_error'], \MessageBird\Wire\Model\AMBError::class, 'json', $context));
        }
        elseif (\array_key_exists('last_error', $data) && $data['last_error'] === null) {
            $object->setLastError(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('sent_at', $data) && $data['sent_at'] !== null) {
            $object->setSentAt(new \DateTime($data['sent_at']));
        }
        elseif (\array_key_exists('sent_at', $data) && $data['sent_at'] === null) {
            $object->setSentAt(null);
        }
        if (\array_key_exists('data_ref', $data) && $data['data_ref'] !== null) {
            $object->setDataRef($this->denormalizer->denormalize($data['data_ref'], \MessageBird\Wire\Model\AMBRichLinkReference::class, 'json', $context));
        }
        elseif (\array_key_exists('data_ref', $data) && $data['data_ref'] === null) {
            $object->setDataRef(null);
        }
        if (\array_key_exists('group', $data) && $data['group'] !== null) {
            $object->setGroup($data['group']);
        }
        elseif (\array_key_exists('group', $data) && $data['group'] === null) {
            $object->setGroup(null);
        }
        if (\array_key_exists('intent', $data) && $data['intent'] !== null) {
            $object->setIntent($data['intent']);
        }
        elseif (\array_key_exists('intent', $data) && $data['intent'] === null) {
            $object->setIntent(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['conversation_id'] = $data->getConversationId();
        $dataArray['business_account_id'] = $data->getBusinessAccountId();
        $dataArray['direction'] = $data->getDirection();
        $dataArray['status'] = $data->getStatus();
        $dataArray['kind'] = $data->getKind();
        if ($data->isInitialized('source') && null !== $data->getSource()) {
            $dataArray['source'] = $data->getSource();
        }
        if ($data->isInitialized('inReplyToMessageId') && null !== $data->getInReplyToMessageId()) {
            $dataArray['in_reply_to_message_id'] = $data->getInReplyToMessageId();
        }
        $dataArray['cost'] = $this->normalizer->normalize($data->getCost(), 'json', $context);
        if ($data->isInitialized('dataRef') && null !== $data->getDataRef()) {
            $dataArray['data_ref'] = $this->normalizer->normalize($data->getDataRef(), 'json', $context);
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBMessage::class => false];
    }
}
