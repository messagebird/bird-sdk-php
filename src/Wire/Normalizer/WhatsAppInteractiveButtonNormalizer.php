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
class WhatsAppInteractiveButtonNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppInteractiveButton::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppInteractiveButton::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppInteractiveButton();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('type', $data) && $data['type'] !== null) {
            $object->setType($data['type']);
        }
        elseif (\array_key_exists('type', $data) && $data['type'] === null) {
            $object->setType(null);
        }
        if (\array_key_exists('quick_reply', $data) && $data['quick_reply'] !== null) {
            $object->setQuickReply($this->denormalizer->denormalize($data['quick_reply'], \MessageBird\Wire\Model\WhatsAppInteractiveButtonQuickReply::class, 'json', $context));
        }
        elseif (\array_key_exists('quick_reply', $data) && $data['quick_reply'] === null) {
            $object->setQuickReply(null);
        }
        if (\array_key_exists('cta_url', $data) && $data['cta_url'] !== null) {
            $object->setCtaUrl($this->denormalizer->denormalize($data['cta_url'], \MessageBird\Wire\Model\WhatsAppInteractiveButtonCtaUrl::class, 'json', $context));
        }
        elseif (\array_key_exists('cta_url', $data) && $data['cta_url'] === null) {
            $object->setCtaUrl(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['type'] = $data->getType();
        if ($data->isInitialized('quickReply') && null !== $data->getQuickReply()) {
            $dataArray['quick_reply'] = $this->normalizer->normalize($data->getQuickReply(), 'json', $context);
        }
        if ($data->isInitialized('ctaUrl') && null !== $data->getCtaUrl()) {
            $dataArray['cta_url'] = $this->normalizer->normalize($data->getCtaUrl(), 'json', $context);
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppInteractiveButton::class => false];
    }
}
