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
class WhatsAppMessageSendRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppMessageSendRequest::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppMessageSendRequest::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppMessageSendRequest();
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
        if (\array_key_exists('template', $data) && $data['template'] !== null) {
            $object->setTemplate($this->denormalizer->denormalize($data['template'], \MessageBird\Wire\Model\WhatsAppMessageSendRequestTemplate::class, 'json', $context));
        }
        elseif (\array_key_exists('template', $data) && $data['template'] === null) {
            $object->setTemplate(null);
        }
        if (\array_key_exists('text', $data) && $data['text'] !== null) {
            $object->setText($this->denormalizer->denormalize($data['text'], \MessageBird\Wire\Model\WhatsAppMessageSendRequestText::class, 'json', $context));
        }
        elseif (\array_key_exists('text', $data) && $data['text'] === null) {
            $object->setText(null);
        }
        if (\array_key_exists('image', $data) && $data['image'] !== null) {
            $object->setImage($this->denormalizer->denormalize($data['image'], \MessageBird\Wire\Model\WhatsAppMessageSendRequestImage::class, 'json', $context));
        }
        elseif (\array_key_exists('image', $data) && $data['image'] === null) {
            $object->setImage(null);
        }
        if (\array_key_exists('video', $data) && $data['video'] !== null) {
            $object->setVideo($this->denormalizer->denormalize($data['video'], \MessageBird\Wire\Model\WhatsAppMessageSendRequestVideo::class, 'json', $context));
        }
        elseif (\array_key_exists('video', $data) && $data['video'] === null) {
            $object->setVideo(null);
        }
        if (\array_key_exists('audio', $data) && $data['audio'] !== null) {
            $object->setAudio($this->denormalizer->denormalize($data['audio'], \MessageBird\Wire\Model\WhatsAppMessageSendRequestAudio::class, 'json', $context));
        }
        elseif (\array_key_exists('audio', $data) && $data['audio'] === null) {
            $object->setAudio(null);
        }
        if (\array_key_exists('sticker', $data) && $data['sticker'] !== null) {
            $object->setSticker($this->denormalizer->denormalize($data['sticker'], \MessageBird\Wire\Model\WhatsAppMessageSendRequestSticker::class, 'json', $context));
        }
        elseif (\array_key_exists('sticker', $data) && $data['sticker'] === null) {
            $object->setSticker(null);
        }
        if (\array_key_exists('document', $data) && $data['document'] !== null) {
            $object->setDocument($this->denormalizer->denormalize($data['document'], \MessageBird\Wire\Model\WhatsAppMessageSendRequestDocument::class, 'json', $context));
        }
        elseif (\array_key_exists('document', $data) && $data['document'] === null) {
            $object->setDocument(null);
        }
        if (\array_key_exists('location', $data) && $data['location'] !== null) {
            $object->setLocation($this->denormalizer->denormalize($data['location'], \MessageBird\Wire\Model\WhatsAppMessageSendRequestLocation::class, 'json', $context));
        }
        elseif (\array_key_exists('location', $data) && $data['location'] === null) {
            $object->setLocation(null);
        }
        if (\array_key_exists('interactive', $data) && $data['interactive'] !== null) {
            $object->setInteractive($this->denormalizer->denormalize($data['interactive'], \MessageBird\Wire\Model\WhatsAppMessageSendRequestInteractive::class, 'json', $context));
        }
        elseif (\array_key_exists('interactive', $data) && $data['interactive'] === null) {
            $object->setInteractive(null);
        }
        if (\array_key_exists('in_reply_to_message_id', $data) && $data['in_reply_to_message_id'] !== null) {
            $object->setInReplyToMessageId($data['in_reply_to_message_id']);
        }
        elseif (\array_key_exists('in_reply_to_message_id', $data) && $data['in_reply_to_message_id'] === null) {
            $object->setInReplyToMessageId(null);
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
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['to'] = $data->getTo();
        if ($data->isInitialized('from') && null !== $data->getFrom()) {
            $dataArray['from'] = $data->getFrom();
        }
        if ($data->isInitialized('template') && null !== $data->getTemplate()) {
            $dataArray['template'] = $this->normalizer->normalize($data->getTemplate(), 'json', $context);
        }
        if ($data->isInitialized('text') && null !== $data->getText()) {
            $dataArray['text'] = $this->normalizer->normalize($data->getText(), 'json', $context);
        }
        if ($data->isInitialized('image') && null !== $data->getImage()) {
            $dataArray['image'] = $this->normalizer->normalize($data->getImage(), 'json', $context);
        }
        if ($data->isInitialized('video') && null !== $data->getVideo()) {
            $dataArray['video'] = $this->normalizer->normalize($data->getVideo(), 'json', $context);
        }
        if ($data->isInitialized('audio') && null !== $data->getAudio()) {
            $dataArray['audio'] = $this->normalizer->normalize($data->getAudio(), 'json', $context);
        }
        if ($data->isInitialized('sticker') && null !== $data->getSticker()) {
            $dataArray['sticker'] = $this->normalizer->normalize($data->getSticker(), 'json', $context);
        }
        if ($data->isInitialized('document') && null !== $data->getDocument()) {
            $dataArray['document'] = $this->normalizer->normalize($data->getDocument(), 'json', $context);
        }
        if ($data->isInitialized('location') && null !== $data->getLocation()) {
            $dataArray['location'] = $this->normalizer->normalize($data->getLocation(), 'json', $context);
        }
        if ($data->isInitialized('interactive') && null !== $data->getInteractive()) {
            $dataArray['interactive'] = $this->normalizer->normalize($data->getInteractive(), 'json', $context);
        }
        if ($data->isInitialized('inReplyToMessageId') && null !== $data->getInReplyToMessageId()) {
            $dataArray['in_reply_to_message_id'] = $data->getInReplyToMessageId();
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
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppMessageSendRequest::class => false];
    }
}
