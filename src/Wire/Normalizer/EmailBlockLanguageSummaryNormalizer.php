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
class EmailBlockLanguageSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailBlockLanguageSummary::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailBlockLanguageSummary::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailBlockLanguageSummary();
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
            unset($data['language']);
        }
        elseif (\array_key_exists('language', $data) && $data['language'] === null) {
            $object->setLanguage(null);
        }
        if (\array_key_exists('revision', $data) && $data['revision'] !== null) {
            $object->setRevision($data['revision']);
            unset($data['revision']);
        }
        elseif (\array_key_exists('revision', $data) && $data['revision'] === null) {
            $object->setRevision(null);
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
        if (\array_key_exists('published_revision_id', $data) && $data['published_revision_id'] !== null) {
            $object->setPublishedRevisionId($data['published_revision_id']);
            unset($data['published_revision_id']);
        }
        elseif (\array_key_exists('published_revision_id', $data) && $data['published_revision_id'] === null) {
            $object->setPublishedRevisionId(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
            unset($data['created_at']);
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
            unset($data['updated_at']);
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
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
        if (!$data->isInitialized('language')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockLanguageSummary.language missing');
        }
        $dataArray['language'] = $data->getLanguage();
        if (!$data->isInitialized('revision')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockLanguageSummary.revision missing');
        }
        $dataArray['revision'] = $data->getRevision();
        if ($data->isInitialized('sourceRevisionId') && null !== $data->getSourceRevisionId()) {
            $dataArray['source_revision_id'] = $data->getSourceRevisionId();
        }
        if ($data->isInitialized('publishedRevisionId') && null !== $data->getPublishedRevisionId()) {
            $dataArray['published_revision_id'] = $data->getPublishedRevisionId();
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailBlockLanguageSummary::class => false];
    }
}
