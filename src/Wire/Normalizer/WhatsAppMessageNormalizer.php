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
class WhatsAppMessageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppMessage::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppMessage::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppMessage();
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
        if (\array_key_exists('direction', $data) && $data['direction'] !== null) {
            $object->setDirection($data['direction']);
        }
        elseif (\array_key_exists('direction', $data) && $data['direction'] === null) {
            $object->setDirection(null);
        }
        if (\array_key_exists('from', $data) && $data['from'] !== null) {
            $object->setFrom($this->denormalizer->denormalize($data['from'], \MessageBird\Wire\Model\WhatsAppMessageFrom::class, 'json', $context));
        }
        elseif (\array_key_exists('from', $data) && $data['from'] === null) {
            $object->setFrom(null);
        }
        if (\array_key_exists('to', $data) && $data['to'] !== null) {
            $object->setTo($this->denormalizer->denormalize($data['to'], \MessageBird\Wire\Model\WhatsAppMessageTo::class, 'json', $context));
        }
        elseif (\array_key_exists('to', $data) && $data['to'] === null) {
            $object->setTo(null);
        }
        if (\array_key_exists('template', $data) && $data['template'] !== null) {
            $object->setTemplate($this->denormalizer->denormalize($data['template'], \MessageBird\Wire\Model\WhatsAppMessageTemplate::class, 'json', $context));
        }
        elseif (\array_key_exists('template', $data) && $data['template'] === null) {
            $object->setTemplate(null);
        }
        if (\array_key_exists('text', $data) && $data['text'] !== null) {
            $object->setText($this->denormalizer->denormalize($data['text'], \MessageBird\Wire\Model\WhatsAppMessageText::class, 'json', $context));
        }
        elseif (\array_key_exists('text', $data) && $data['text'] === null) {
            $object->setText(null);
        }
        if (\array_key_exists('image', $data) && $data['image'] !== null) {
            $object->setImage($this->denormalizer->denormalize($data['image'], \MessageBird\Wire\Model\WhatsAppMessageImage::class, 'json', $context));
        }
        elseif (\array_key_exists('image', $data) && $data['image'] === null) {
            $object->setImage(null);
        }
        if (\array_key_exists('video', $data) && $data['video'] !== null) {
            $object->setVideo($this->denormalizer->denormalize($data['video'], \MessageBird\Wire\Model\WhatsAppMessageVideo::class, 'json', $context));
        }
        elseif (\array_key_exists('video', $data) && $data['video'] === null) {
            $object->setVideo(null);
        }
        if (\array_key_exists('audio', $data) && $data['audio'] !== null) {
            $object->setAudio($this->denormalizer->denormalize($data['audio'], \MessageBird\Wire\Model\WhatsAppMessageAudio::class, 'json', $context));
        }
        elseif (\array_key_exists('audio', $data) && $data['audio'] === null) {
            $object->setAudio(null);
        }
        if (\array_key_exists('sticker', $data) && $data['sticker'] !== null) {
            $object->setSticker($this->denormalizer->denormalize($data['sticker'], \MessageBird\Wire\Model\WhatsAppMessageSticker::class, 'json', $context));
        }
        elseif (\array_key_exists('sticker', $data) && $data['sticker'] === null) {
            $object->setSticker(null);
        }
        if (\array_key_exists('document', $data) && $data['document'] !== null) {
            $object->setDocument($this->denormalizer->denormalize($data['document'], \MessageBird\Wire\Model\WhatsAppMessageDocument::class, 'json', $context));
        }
        elseif (\array_key_exists('document', $data) && $data['document'] === null) {
            $object->setDocument(null);
        }
        if (\array_key_exists('location', $data) && $data['location'] !== null) {
            $object->setLocation($this->denormalizer->denormalize($data['location'], \MessageBird\Wire\Model\WhatsAppMessageLocation::class, 'json', $context));
        }
        elseif (\array_key_exists('location', $data) && $data['location'] === null) {
            $object->setLocation(null);
        }
        if (\array_key_exists('unsupported', $data) && $data['unsupported'] !== null) {
            $object->setUnsupported($this->denormalizer->denormalize($data['unsupported'], \MessageBird\Wire\Model\WhatsAppMessageUnsupported::class, 'json', $context));
        }
        elseif (\array_key_exists('unsupported', $data) && $data['unsupported'] === null) {
            $object->setUnsupported(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('last_error', $data) && $data['last_error'] !== null) {
            $object->setLastError($this->denormalizer->denormalize($data['last_error'], \MessageBird\Wire\Model\WhatsAppError::class, 'json', $context));
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
        if (\array_key_exists('delivered_at', $data) && $data['delivered_at'] !== null) {
            $object->setDeliveredAt(new \DateTime($data['delivered_at']));
        }
        elseif (\array_key_exists('delivered_at', $data) && $data['delivered_at'] === null) {
            $object->setDeliveredAt(null);
        }
        if (\array_key_exists('read_at', $data) && $data['read_at'] !== null) {
            $object->setReadAt(new \DateTime($data['read_at']));
        }
        elseif (\array_key_exists('read_at', $data) && $data['read_at'] === null) {
            $object->setReadAt(null);
        }
        if (\array_key_exists('cost', $data) && $data['cost'] !== null) {
            $object->setCost($this->denormalizer->denormalize($data['cost'], \MessageBird\Wire\Model\MessageCost::class, 'json', $context));
        }
        elseif (\array_key_exists('cost', $data) && $data['cost'] === null) {
            $object->setCost(null);
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
        $dataArray['id'] = $data->getId();
        if ($data->isInitialized('cost')) {
            $dataArray['cost'] = $this->normalizer->normalize($data->getCost(), 'json', $context);
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
        return [\MessageBird\Wire\Model\WhatsAppMessage::class => false];
    }
}
