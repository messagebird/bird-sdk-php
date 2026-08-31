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
class WhatsAppInteractiveCardNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppInteractiveCard::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppInteractiveCard::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppInteractiveCard();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('header', $data) && $data['header'] !== null) {
            $object->setHeader($this->denormalizer->denormalize($data['header'], \MessageBird\Wire\Model\WhatsAppInteractiveCardHeader::class, 'json', $context));
        }
        elseif (\array_key_exists('header', $data) && $data['header'] === null) {
            $object->setHeader(null);
        }
        if (\array_key_exists('body_text', $data) && $data['body_text'] !== null) {
            $object->setBodyText($data['body_text']);
        }
        elseif (\array_key_exists('body_text', $data) && $data['body_text'] === null) {
            $object->setBodyText(null);
        }
        if (\array_key_exists('buttons', $data) && $data['buttons'] !== null) {
            $values = [];
            foreach ($data['buttons'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\WhatsAppInteractiveButton::class, 'json', $context);
            }
            $object->setButtons($values);
        }
        elseif (\array_key_exists('buttons', $data) && $data['buttons'] === null) {
            $object->setButtons(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['header'] = $this->normalizer->normalize($data->getHeader(), 'json', $context);
        if ($data->isInitialized('bodyText') && null !== $data->getBodyText()) {
            $dataArray['body_text'] = $data->getBodyText();
        }
        $values = [];
        foreach ($data->getButtons() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $dataArray['buttons'] = $values;
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppInteractiveCard::class => false];
    }
}
