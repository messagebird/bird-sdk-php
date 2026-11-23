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
class EmailBlockRevisionSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailBlockRevisionSummary::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailBlockRevisionSummary::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailBlockRevisionSummary();
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
            unset($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('version_number', $data) && $data['version_number'] !== null) {
            $object->setVersionNumber($data['version_number']);
            unset($data['version_number']);
        }
        elseif (\array_key_exists('version_number', $data) && $data['version_number'] === null) {
            $object->setVersionNumber(null);
        }
        if (\array_key_exists('serializer_version', $data) && $data['serializer_version'] !== null) {
            $object->setSerializerVersion($data['serializer_version']);
            unset($data['serializer_version']);
        }
        elseif (\array_key_exists('serializer_version', $data) && $data['serializer_version'] === null) {
            $object->setSerializerVersion(null);
        }
        if (\array_key_exists('authoring_mode', $data) && $data['authoring_mode'] !== null) {
            $object->setAuthoringMode($data['authoring_mode']);
            unset($data['authoring_mode']);
        }
        elseif (\array_key_exists('authoring_mode', $data) && $data['authoring_mode'] === null) {
            $object->setAuthoringMode(null);
        }
        if (\array_key_exists('source_revision_id', $data) && $data['source_revision_id'] !== null) {
            $object->setSourceRevisionId($data['source_revision_id']);
            unset($data['source_revision_id']);
        }
        elseif (\array_key_exists('source_revision_id', $data) && $data['source_revision_id'] === null) {
            $object->setSourceRevisionId(null);
        }
        if (\array_key_exists('published_by', $data) && $data['published_by'] !== null) {
            $object->setPublishedBy($this->denormalizer->denormalize($data['published_by'], \MessageBird\Wire\Model\Actor::class, 'json', $context));
            unset($data['published_by']);
        }
        elseif (\array_key_exists('published_by', $data) && $data['published_by'] === null) {
            $object->setPublishedBy(null);
        }
        if (\array_key_exists('published_at', $data) && $data['published_at'] !== null) {
            $object->setPublishedAt(new \DateTime($data['published_at']));
            unset($data['published_at']);
        }
        elseif (\array_key_exists('published_at', $data) && $data['published_at'] === null) {
            $object->setPublishedAt(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
            unset($data['created_at']);
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('id')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockRevisionSummary.id missing');
        }
        $dataArray['id'] = $data->getId();
        if (!$data->isInitialized('versionNumber')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockRevisionSummary.version_number missing');
        }
        $dataArray['version_number'] = $data->getVersionNumber();
        if (!$data->isInitialized('serializerVersion')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockRevisionSummary.serializer_version missing');
        }
        $dataArray['serializer_version'] = $data->getSerializerVersion();
        if ($data->isInitialized('sourceRevisionId') && null !== $data->getSourceRevisionId()) {
            $dataArray['source_revision_id'] = $data->getSourceRevisionId();
        }
        if (!$data->isInitialized('publishedBy')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockRevisionSummary.published_by missing');
        }
        $dataArray['published_by'] = $this->normalizer->normalize($data->getPublishedBy(), 'json', $context);
        if (!$data->isInitialized('publishedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockRevisionSummary.published_at missing');
        }
        $dataArray['published_at'] = $data->getPublishedAt()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('createdAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockRevisionSummary.created_at missing');
        }
        $dataArray['created_at'] = $data->getCreatedAt()->format('Y-m-d\TH:i:sP');
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailBlockRevisionSummary::class => false];
    }
}
