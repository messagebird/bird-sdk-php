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
class EmailAttachmentRefNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailAttachmentRef::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailAttachmentRef::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailAttachmentRef();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('inline', $data) && \is_int($data['inline'])) {
            $data['inline'] = (bool) $data['inline'];
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('filename', $data) && $data['filename'] !== null) {
            $object->setFilename($data['filename']);
        }
        elseif (\array_key_exists('filename', $data) && $data['filename'] === null) {
            $object->setFilename(null);
        }
        if (\array_key_exists('content_type', $data) && $data['content_type'] !== null) {
            $object->setContentType($data['content_type']);
        }
        elseif (\array_key_exists('content_type', $data) && $data['content_type'] === null) {
            $object->setContentType(null);
        }
        if (\array_key_exists('size', $data) && $data['size'] !== null) {
            $object->setSize($data['size']);
        }
        elseif (\array_key_exists('size', $data) && $data['size'] === null) {
            $object->setSize(null);
        }
        if (\array_key_exists('inline', $data) && $data['inline'] !== null) {
            $object->setInline($data['inline']);
        }
        elseif (\array_key_exists('inline', $data) && $data['inline'] === null) {
            $object->setInline(null);
        }
        if (\array_key_exists('content_id', $data) && $data['content_id'] !== null) {
            $object->setContentId($data['content_id']);
        }
        elseif (\array_key_exists('content_id', $data) && $data['content_id'] === null) {
            $object->setContentId(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('id') && null !== $data->getId()) {
            $dataArray['id'] = $data->getId();
        }
        $dataArray['filename'] = $data->getFilename();
        if ($data->isInitialized('contentType') && null !== $data->getContentType()) {
            $dataArray['content_type'] = $data->getContentType();
        }
        $dataArray['size'] = $data->getSize();
        if ($data->isInitialized('inline') && null !== $data->getInline()) {
            $dataArray['inline'] = $data->getInline();
        }
        if ($data->isInitialized('contentId')) {
            $dataArray['content_id'] = $data->getContentId();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailAttachmentRef::class => false];
    }
}
