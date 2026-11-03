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
class AssetUploadSessionCreateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AssetUploadSessionCreate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AssetUploadSessionCreate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AssetUploadSessionCreate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('client_reference', $data) && $data['client_reference'] !== null) {
            $object->setClientReference($data['client_reference']);
        }
        elseif (\array_key_exists('client_reference', $data) && $data['client_reference'] === null) {
            $object->setClientReference(null);
        }
        if (\array_key_exists('file', $data) && $data['file'] !== null) {
            $object->setFile($this->denormalizer->denormalize($data['file'], \MessageBird\Wire\Model\AssetUploadFile::class, 'json', $context));
        }
        elseif (\array_key_exists('file', $data) && $data['file'] === null) {
            $object->setFile(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('alt_text', $data) && $data['alt_text'] !== null) {
            $object->setAltText($data['alt_text']);
        }
        elseif (\array_key_exists('alt_text', $data) && $data['alt_text'] === null) {
            $object->setAltText(null);
        }
        if (\array_key_exists('folder_id', $data) && $data['folder_id'] !== null) {
            $object->setFolderId($data['folder_id']);
        }
        elseif (\array_key_exists('folder_id', $data) && $data['folder_id'] === null) {
            $object->setFolderId(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['client_reference'] = $data->getClientReference();
        $dataArray['file'] = $this->normalizer->normalize($data->getFile(), 'json', $context);
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['name'] = $data->getName();
        }
        if ($data->isInitialized('altText') && null !== $data->getAltText()) {
            $dataArray['alt_text'] = $data->getAltText();
        }
        if ($data->isInitialized('folderId') && null !== $data->getFolderId()) {
            $dataArray['folder_id'] = $data->getFolderId();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AssetUploadSessionCreate::class => false];
    }
}
