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
class EsimCredentialsInstructionsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EsimCredentialsInstructions::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EsimCredentialsInstructions::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EsimCredentialsInstructions();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('language', $data) && $data['language'] !== null) {
            $object->setLanguage($data['language']);
        }
        elseif (\array_key_exists('language', $data) && $data['language'] === null) {
            $object->setLanguage(null);
        }
        if (\array_key_exists('ios', $data) && $data['ios'] !== null) {
            $values = [];
            foreach ($data['ios'] as $value) {
                $values[] = $value;
            }
            $object->setIos($values);
        }
        elseif (\array_key_exists('ios', $data) && $data['ios'] === null) {
            $object->setIos(null);
        }
        if (\array_key_exists('android', $data) && $data['android'] !== null) {
            $values_1 = [];
            foreach ($data['android'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setAndroid($values_1);
        }
        elseif (\array_key_exists('android', $data) && $data['android'] === null) {
            $object->setAndroid(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['language'] = $data->getLanguage();
        $values = [];
        foreach ($data->getIos() as $value) {
            $values[] = $value;
        }
        $dataArray['ios'] = $values;
        $values_1 = [];
        foreach ($data->getAndroid() as $value_1) {
            $values_1[] = $value_1;
        }
        $dataArray['android'] = $values_1;
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EsimCredentialsInstructions::class => false];
    }
}
