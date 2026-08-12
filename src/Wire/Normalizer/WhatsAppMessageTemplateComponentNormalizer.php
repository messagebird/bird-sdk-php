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
class WhatsAppMessageTemplateComponentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppMessageTemplateComponent::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppMessageTemplateComponent::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppMessageTemplateComponent();
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
        if (\array_key_exists('parameters', $data) && $data['parameters'] !== null) {
            $values = [];
            foreach ($data['parameters'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\WhatsAppMessageTemplateComponentParameter::class, 'json', $context);
            }
            $object->setParameters($values);
        }
        elseif (\array_key_exists('parameters', $data) && $data['parameters'] === null) {
            $object->setParameters(null);
        }
        if (\array_key_exists('cards', $data) && $data['cards'] !== null) {
            $values_1 = [];
            foreach ($data['cards'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\WhatsAppMessageTemplateCard::class, 'json', $context);
            }
            $object->setCards($values_1);
        }
        elseif (\array_key_exists('cards', $data) && $data['cards'] === null) {
            $object->setCards(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['type'] = $data->getType();
        if ($data->isInitialized('parameters') && null !== $data->getParameters()) {
            $values = [];
            foreach ($data->getParameters() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['parameters'] = $values;
        }
        if ($data->isInitialized('cards') && null !== $data->getCards()) {
            $values_1 = [];
            foreach ($data->getCards() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $dataArray['cards'] = $values_1;
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppMessageTemplateComponent::class => false];
    }
}
