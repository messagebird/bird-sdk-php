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
class EmailTemplateLanguageSavedSharedBlocksNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailTemplateLanguageSavedSharedBlocks::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailTemplateLanguageSavedSharedBlocks::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailTemplateLanguageSavedSharedBlocks();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('version', $data) && $data['version'] !== null) {
            $object->setVersion($data['version']);
        }
        elseif (\array_key_exists('version', $data) && $data['version'] === null) {
            $object->setVersion(null);
        }
        if (\array_key_exists('bindings', $data) && $data['bindings'] !== null) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['bindings'] as $key => $value) {
                $values[$key] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\EmailTemplateSharedBlockBinding::class, 'json', $context);
            }
            $object->setBindings($values);
        }
        elseif (\array_key_exists('bindings', $data) && $data['bindings'] === null) {
            $object->setBindings(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('version')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailTemplateLanguageSavedSharedBlocks.version missing');
        }
        $dataArray['version'] = $data->getVersion();
        if (!$data->isInitialized('bindings')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailTemplateLanguageSavedSharedBlocks.bindings missing');
        }
        $values = [];
        foreach ($data->getBindings() as $key => $value) {
            $values[$key] = $this->normalizer->normalize($value, 'json', $context);
        }
        $dataArray['bindings'] = (object) $values;
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailTemplateLanguageSavedSharedBlocks::class => false];
    }
}
