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
class AssetUploadFileNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AssetUploadFile::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AssetUploadFile::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AssetUploadFile();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
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
        if (\array_key_exists('size_bytes', $data) && $data['size_bytes'] !== null) {
            $object->setSizeBytes($data['size_bytes']);
        }
        elseif (\array_key_exists('size_bytes', $data) && $data['size_bytes'] === null) {
            $object->setSizeBytes(null);
        }
        if (\array_key_exists('sha256', $data) && $data['sha256'] !== null) {
            $object->setSha256($data['sha256']);
        }
        elseif (\array_key_exists('sha256', $data) && $data['sha256'] === null) {
            $object->setSha256(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('filename')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadFile.filename missing');
        }
        $dataArray['filename'] = $data->getFilename();
        if (!$data->isInitialized('contentType')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadFile.content_type missing');
        }
        $dataArray['content_type'] = $data->getContentType();
        if (!$data->isInitialized('sizeBytes')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadFile.size_bytes missing');
        }
        $dataArray['size_bytes'] = $data->getSizeBytes();
        if (!$data->isInitialized('sha256')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadFile.sha256 missing');
        }
        $dataArray['sha256'] = $data->getSha256();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AssetUploadFile::class => false];
    }
}
