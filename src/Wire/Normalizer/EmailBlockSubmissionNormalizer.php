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
class EmailBlockSubmissionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailBlockSubmission::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailBlockSubmission::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailBlockSubmission();
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
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('block_id', $data) && $data['block_id'] !== null) {
            $object->setBlockId($data['block_id']);
        }
        elseif (\array_key_exists('block_id', $data) && $data['block_id'] === null) {
            $object->setBlockId(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('languages', $data) && $data['languages'] !== null) {
            $values = [];
            foreach ($data['languages'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\EmailBlockSubmissionLanguage::class, 'json', $context);
            }
            $object->setLanguages($values);
        }
        elseif (\array_key_exists('languages', $data) && $data['languages'] === null) {
            $object->setLanguages(null);
        }
        if (\array_key_exists('published_revisions', $data) && $data['published_revisions'] !== null) {
            $values_1 = [];
            foreach ($data['published_revisions'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\EmailBlockPublishedRevision::class, 'json', $context);
            }
            $object->setPublishedRevisions($values_1);
        }
        elseif (\array_key_exists('published_revisions', $data) && $data['published_revisions'] === null) {
            $object->setPublishedRevisions(null);
        }
        if (\array_key_exists('published_at', $data) && $data['published_at'] !== null) {
            $object->setPublishedAt(new \DateTime($data['published_at']));
        }
        elseif (\array_key_exists('published_at', $data) && $data['published_at'] === null) {
            $object->setPublishedAt(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('id')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockSubmission.id missing');
        }
        $dataArray['id'] = $data->getId();
        if (!$data->isInitialized('blockId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockSubmission.block_id missing');
        }
        $dataArray['block_id'] = $data->getBlockId();
        if (!$data->isInitialized('status')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockSubmission.status missing');
        }
        $dataArray['status'] = $data->getStatus();
        if (!$data->isInitialized('languages')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockSubmission.languages missing');
        }
        $values = [];
        foreach ($data->getLanguages() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $dataArray['languages'] = $values;
        if (!$data->isInitialized('publishedRevisions')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockSubmission.published_revisions missing');
        }
        $values_1 = [];
        foreach ($data->getPublishedRevisions() as $value_1) {
            $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
        }
        $dataArray['published_revisions'] = $values_1;
        if (!$data->isInitialized('publishedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockSubmission.published_at missing');
        }
        $dataArray['published_at'] = $data->getPublishedAt()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('createdAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockSubmission.created_at missing');
        }
        $dataArray['created_at'] = $data->getCreatedAt()->format('Y-m-d\TH:i:sP');
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailBlockSubmission::class => false];
    }
}
