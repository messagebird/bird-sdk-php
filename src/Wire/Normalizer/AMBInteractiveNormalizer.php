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
class AMBInteractiveNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBInteractive::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBInteractive::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBInteractive();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('received_message', $data) && $data['received_message'] !== null) {
            $object->setReceivedMessage($this->denormalizer->denormalize($data['received_message'], \MessageBird\Wire\Model\AMBMessageBubble::class, 'json', $context));
        }
        elseif (\array_key_exists('received_message', $data) && $data['received_message'] === null) {
            $object->setReceivedMessage(null);
        }
        if (\array_key_exists('reply_message', $data) && $data['reply_message'] !== null) {
            $object->setReplyMessage($this->denormalizer->denormalize($data['reply_message'], \MessageBird\Wire\Model\AMBMessageBubble::class, 'json', $context));
        }
        elseif (\array_key_exists('reply_message', $data) && $data['reply_message'] === null) {
            $object->setReplyMessage(null);
        }
        if (\array_key_exists('session_identifier', $data) && $data['session_identifier'] !== null) {
            $object->setSessionIdentifier($data['session_identifier']);
        }
        elseif (\array_key_exists('session_identifier', $data) && $data['session_identifier'] === null) {
            $object->setSessionIdentifier(null);
        }
        if (\array_key_exists('request_identifier', $data) && $data['request_identifier'] !== null) {
            $object->setRequestIdentifier($data['request_identifier']);
        }
        elseif (\array_key_exists('request_identifier', $data) && $data['request_identifier'] === null) {
            $object->setRequestIdentifier(null);
        }
        if (\array_key_exists('images', $data) && $data['images'] !== null) {
            $values = [];
            foreach ($data['images'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\AMBNativeImage::class, 'json', $context);
            }
            $object->setImages($values);
        }
        elseif (\array_key_exists('images', $data) && $data['images'] === null) {
            $object->setImages(null);
        }
        if (\array_key_exists('quick_reply', $data) && $data['quick_reply'] !== null) {
            $object->setQuickReply($this->denormalizer->denormalize($data['quick_reply'], \MessageBird\Wire\Model\AMBNativeQuickReply::class, 'json', $context));
        }
        elseif (\array_key_exists('quick_reply', $data) && $data['quick_reply'] === null) {
            $object->setQuickReply(null);
        }
        if (\array_key_exists('list_picker', $data) && $data['list_picker'] !== null) {
            $object->setListPicker($this->denormalizer->denormalize($data['list_picker'], \MessageBird\Wire\Model\AMBNativeListPicker::class, 'json', $context));
        }
        elseif (\array_key_exists('list_picker', $data) && $data['list_picker'] === null) {
            $object->setListPicker(null);
        }
        if (\array_key_exists('event', $data) && $data['event'] !== null) {
            $object->setEvent($this->denormalizer->denormalize($data['event'], \MessageBird\Wire\Model\AMBNativeEvent::class, 'json', $context));
        }
        elseif (\array_key_exists('event', $data) && $data['event'] === null) {
            $object->setEvent(null);
        }
        if (\array_key_exists('dynamic', $data) && $data['dynamic'] !== null) {
            $object->setDynamic($this->denormalizer->denormalize($data['dynamic'], \MessageBird\Wire\Model\AMBNativeDynamic::class, 'json', $context));
        }
        elseif (\array_key_exists('dynamic', $data) && $data['dynamic'] === null) {
            $object->setDynamic(null);
        }
        if (\array_key_exists('imessage_app', $data) && $data['imessage_app'] !== null) {
            $object->setImessageApp($this->denormalizer->denormalize($data['imessage_app'], \MessageBird\Wire\Model\AMBIMessageApp::class, 'json', $context));
        }
        elseif (\array_key_exists('imessage_app', $data) && $data['imessage_app'] === null) {
            $object->setImessageApp(null);
        }
        if (\array_key_exists('payment', $data) && $data['payment'] !== null) {
            $object->setPayment($this->denormalizer->denormalize($data['payment'], \MessageBird\Wire\Model\AMBNativePayment::class, 'json', $context));
        }
        elseif (\array_key_exists('payment', $data) && $data['payment'] === null) {
            $object->setPayment(null);
        }
        if (\array_key_exists('authenticate', $data) && $data['authenticate'] !== null) {
            $object->setAuthenticate($this->denormalizer->denormalize($data['authenticate'], \MessageBird\Wire\Model\AMBNativeAuthentication::class, 'json', $context));
        }
        elseif (\array_key_exists('authenticate', $data) && $data['authenticate'] === null) {
            $object->setAuthenticate(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('receivedMessage') && null !== $data->getReceivedMessage()) {
            $dataArray['received_message'] = $this->normalizer->normalize($data->getReceivedMessage(), 'json', $context);
        }
        if ($data->isInitialized('replyMessage') && null !== $data->getReplyMessage()) {
            $dataArray['reply_message'] = $this->normalizer->normalize($data->getReplyMessage(), 'json', $context);
        }
        if ($data->isInitialized('sessionIdentifier') && null !== $data->getSessionIdentifier()) {
            $dataArray['session_identifier'] = $data->getSessionIdentifier();
        }
        if ($data->isInitialized('requestIdentifier') && null !== $data->getRequestIdentifier()) {
            $dataArray['request_identifier'] = $data->getRequestIdentifier();
        }
        if ($data->isInitialized('images') && null !== $data->getImages()) {
            $values = [];
            foreach ($data->getImages() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['images'] = $values;
        }
        if ($data->isInitialized('quickReply') && null !== $data->getQuickReply()) {
            $dataArray['quick_reply'] = $this->normalizer->normalize($data->getQuickReply(), 'json', $context);
        }
        if ($data->isInitialized('listPicker') && null !== $data->getListPicker()) {
            $dataArray['list_picker'] = $this->normalizer->normalize($data->getListPicker(), 'json', $context);
        }
        if ($data->isInitialized('event') && null !== $data->getEvent()) {
            $dataArray['event'] = $this->normalizer->normalize($data->getEvent(), 'json', $context);
        }
        if ($data->isInitialized('dynamic') && null !== $data->getDynamic()) {
            $dataArray['dynamic'] = $this->normalizer->normalize($data->getDynamic(), 'json', $context);
        }
        if ($data->isInitialized('imessageApp') && null !== $data->getImessageApp()) {
            $dataArray['imessage_app'] = $this->normalizer->normalize($data->getImessageApp(), 'json', $context);
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBInteractive::class => false];
    }
}
