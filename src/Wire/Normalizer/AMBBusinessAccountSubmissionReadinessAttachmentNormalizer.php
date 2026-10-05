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
class AMBBusinessAccountSubmissionReadinessAttachmentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBBusinessAccountSubmissionReadinessAttachment::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBBusinessAccountSubmissionReadinessAttachment::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBBusinessAccountSubmissionReadinessAttachment();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
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
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
            unset($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('filename', $data) && $data['filename'] !== null) {
            $object->setFilename($data['filename']);
            unset($data['filename']);
        }
        elseif (\array_key_exists('filename', $data) && $data['filename'] === null) {
            $object->setFilename(null);
        }
        if (\array_key_exists('content_type', $data) && $data['content_type'] !== null) {
            $object->setContentType($data['content_type']);
            unset($data['content_type']);
        }
        elseif (\array_key_exists('content_type', $data) && $data['content_type'] === null) {
            $object->setContentType(null);
        }
        if (\array_key_exists('size_bytes', $data) && $data['size_bytes'] !== null) {
            $object->setSizeBytes($data['size_bytes']);
            unset($data['size_bytes']);
        }
        elseif (\array_key_exists('size_bytes', $data) && $data['size_bytes'] === null) {
            $object->setSizeBytes(null);
        }
        if (\array_key_exists('description', $data) && $data['description'] !== null) {
            $object->setDescription($data['description']);
            unset($data['description']);
        }
        elseif (\array_key_exists('description', $data) && $data['description'] === null) {
            $object->setDescription(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
            unset($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('download_url', $data) && $data['download_url'] !== null) {
            $object->setDownloadUrl($data['download_url']);
            unset($data['download_url']);
        }
        elseif (\array_key_exists('download_url', $data) && $data['download_url'] === null) {
            $object->setDownloadUrl(null);
        }
        if (\array_key_exists('preview_url', $data) && $data['preview_url'] !== null) {
            $object->setPreviewUrl($data['preview_url']);
            unset($data['preview_url']);
        }
        elseif (\array_key_exists('preview_url', $data) && $data['preview_url'] === null) {
            $object->setPreviewUrl(null);
        }
        if (\array_key_exists('download_url_expires_at', $data) && $data['download_url_expires_at'] !== null) {
            $object->setDownloadUrlExpiresAt(new \DateTime($data['download_url_expires_at']));
            unset($data['download_url_expires_at']);
        }
        elseif (\array_key_exists('download_url_expires_at', $data) && $data['download_url_expires_at'] === null) {
            $object->setDownloadUrlExpiresAt(null);
        }
        if (\array_key_exists('expires_at', $data) && $data['expires_at'] !== null) {
            $object->setExpiresAt(new \DateTime($data['expires_at']));
            unset($data['expires_at']);
        }
        elseif (\array_key_exists('expires_at', $data) && $data['expires_at'] === null) {
            $object->setExpiresAt(null);
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
        $dataArray['id'] = $data->getId();
        $dataArray['status'] = $data->getStatus();
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBBusinessAccountSubmissionReadinessAttachment::class => false];
    }
}
