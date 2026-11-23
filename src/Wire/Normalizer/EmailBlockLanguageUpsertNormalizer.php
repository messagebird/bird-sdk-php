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
class EmailBlockLanguageUpsertNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailBlockLanguageUpsert::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailBlockLanguageUpsert::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailBlockLanguageUpsert();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('revision', $data) && $data['revision'] !== null) {
            $object->setRevision($data['revision']);
        }
        elseif (\array_key_exists('revision', $data) && $data['revision'] === null) {
            $object->setRevision(null);
        }
        if (\array_key_exists('fragment', $data) && $data['fragment'] !== null) {
            $object->setFragment($this->denormalizer->denormalize($data['fragment'], \MessageBird\Wire\Model\EmailBlockFragment::class, 'json', $context));
        }
        elseif (\array_key_exists('fragment', $data) && $data['fragment'] === null) {
            $object->setFragment(null);
        }
        if (\array_key_exists('source_revision_id', $data) && $data['source_revision_id'] !== null) {
            $object->setSourceRevisionId($data['source_revision_id']);
        }
        elseif (\array_key_exists('source_revision_id', $data) && $data['source_revision_id'] === null) {
            $object->setSourceRevisionId(null);
        }
        if (\array_key_exists('from_revision_id', $data) && $data['from_revision_id'] !== null) {
            $object->setFromRevisionId($data['from_revision_id']);
        }
        elseif (\array_key_exists('from_revision_id', $data) && $data['from_revision_id'] === null) {
            $object->setFromRevisionId(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('revision')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockLanguageUpsert.revision missing');
        }
        $dataArray['revision'] = $data->getRevision();
        if ($data->isInitialized('fragment') && null !== $data->getFragment()) {
            $dataArray['fragment'] = $this->normalizer->normalize($data->getFragment(), 'json', $context);
        }
        if ($data->isInitialized('sourceRevisionId') && null !== $data->getSourceRevisionId()) {
            $dataArray['source_revision_id'] = $data->getSourceRevisionId();
        }
        if ($data->isInitialized('fromRevisionId') && null !== $data->getFromRevisionId()) {
            $dataArray['from_revision_id'] = $data->getFromRevisionId();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailBlockLanguageUpsert::class => false];
    }
}
