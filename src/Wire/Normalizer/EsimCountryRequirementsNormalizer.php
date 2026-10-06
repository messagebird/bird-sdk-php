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
class EsimCountryRequirementsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EsimCountryRequirements::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EsimCountryRequirements::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EsimCountryRequirements();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('country_code', $data) && $data['country_code'] !== null) {
            $object->setCountryCode($data['country_code']);
        }
        elseif (\array_key_exists('country_code', $data) && $data['country_code'] === null) {
            $object->setCountryCode(null);
        }
        if (\array_key_exists('schema_revision', $data) && $data['schema_revision'] !== null) {
            $object->setSchemaRevision($data['schema_revision']);
        }
        elseif (\array_key_exists('schema_revision', $data) && $data['schema_revision'] === null) {
            $object->setSchemaRevision(null);
        }
        if (\array_key_exists('schema', $data) && $data['schema'] !== null) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['schema'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setSchema($values);
        }
        elseif (\array_key_exists('schema', $data) && $data['schema'] === null) {
            $object->setSchema(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['country_code'] = $data->getCountryCode();
        $dataArray['schema_revision'] = $data->getSchemaRevision();
        $values = [];
        foreach ($data->getSchema() as $key => $value) {
            $values[$key] = $value;
        }
        $dataArray['schema'] = (object) $values;
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EsimCountryRequirements::class => false];
    }
}
