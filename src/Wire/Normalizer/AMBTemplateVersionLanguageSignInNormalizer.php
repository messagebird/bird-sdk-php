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
class AMBTemplateVersionLanguageSignInNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBTemplateVersionLanguageSignIn::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBTemplateVersionLanguageSignIn::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBTemplateVersionLanguageSignIn();
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
        if (\array_key_exists('confirmation_text', $data) && $data['confirmation_text'] !== null) {
            $object->setConfirmationText($data['confirmation_text']);
        }
        elseif (\array_key_exists('confirmation_text', $data) && $data['confirmation_text'] === null) {
            $object->setConfirmationText(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('receivedMessage')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AMBTemplateVersionLanguageSignIn.received_message missing');
        }
        $dataArray['received_message'] = $this->normalizer->normalize($data->getReceivedMessage(), 'json', $context);
        if (!$data->isInitialized('replyMessage')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AMBTemplateVersionLanguageSignIn.reply_message missing');
        }
        $dataArray['reply_message'] = $this->normalizer->normalize($data->getReplyMessage(), 'json', $context);
        if ($data->isInitialized('images') && null !== $data->getImages()) {
            $values = [];
            foreach ($data->getImages() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['images'] = $values;
        }
        if ($data->isInitialized('confirmationText') && null !== $data->getConfirmationText()) {
            $dataArray['confirmation_text'] = $data->getConfirmationText();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBTemplateVersionLanguageSignIn::class => false];
    }
}
