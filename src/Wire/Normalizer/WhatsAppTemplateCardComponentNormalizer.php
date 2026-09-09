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
class WhatsAppTemplateCardComponentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppTemplateCardComponent::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppTemplateCardComponent::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppTemplateCardComponent();
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
        if (\array_key_exists('format', $data) && $data['format'] !== null) {
            $object->setFormat($data['format']);
        }
        elseif (\array_key_exists('format', $data) && $data['format'] === null) {
            $object->setFormat(null);
        }
        if (\array_key_exists('text', $data) && $data['text'] !== null) {
            $object->setText($data['text']);
        }
        elseif (\array_key_exists('text', $data) && $data['text'] === null) {
            $object->setText(null);
        }
        if (\array_key_exists('example_parameters', $data) && $data['example_parameters'] !== null) {
            $values = [];
            foreach ($data['example_parameters'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\WhatsAppTemplateExampleParameter::class, 'json', $context);
            }
            $object->setExampleParameters($values);
        }
        elseif (\array_key_exists('example_parameters', $data) && $data['example_parameters'] === null) {
            $object->setExampleParameters(null);
        }
        if (\array_key_exists('buttons', $data) && $data['buttons'] !== null) {
            $values_1 = [];
            foreach ($data['buttons'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\WhatsAppTemplateButton::class, 'json', $context);
            }
            $object->setButtons($values_1);
        }
        elseif (\array_key_exists('buttons', $data) && $data['buttons'] === null) {
            $object->setButtons(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppTemplateCardComponent::class => false];
    }
}
