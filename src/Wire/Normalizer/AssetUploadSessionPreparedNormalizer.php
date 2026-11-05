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
class AssetUploadSessionPreparedNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AssetUploadSessionPrepared::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AssetUploadSessionPrepared::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AssetUploadSessionPrepared();
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
        if (\array_key_exists('state', $data) && $data['state'] !== null) {
            $object->setState($data['state']);
            unset($data['state']);
        }
        elseif (\array_key_exists('state', $data) && $data['state'] === null) {
            $object->setState(null);
        }
        if (\array_key_exists('expires_at', $data) && $data['expires_at'] !== null) {
            $object->setExpiresAt(new \DateTime($data['expires_at']));
            unset($data['expires_at']);
        }
        elseif (\array_key_exists('expires_at', $data) && $data['expires_at'] === null) {
            $object->setExpiresAt(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
            unset($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('alt_text', $data) && $data['alt_text'] !== null) {
            $object->setAltText($data['alt_text']);
            unset($data['alt_text']);
        }
        elseif (\array_key_exists('alt_text', $data) && $data['alt_text'] === null) {
            $object->setAltText(null);
        }
        if (\array_key_exists('folder_id', $data) && $data['folder_id'] !== null) {
            $object->setFolderId($data['folder_id']);
            unset($data['folder_id']);
        }
        elseif (\array_key_exists('folder_id', $data) && $data['folder_id'] === null) {
            $object->setFolderId(null);
        }
        if (\array_key_exists('file', $data) && $data['file'] !== null) {
            $object->setFile($this->denormalizer->denormalize($data['file'], \MessageBird\Wire\Model\AssetUploadFile::class, 'json', $context));
            unset($data['file']);
        }
        elseif (\array_key_exists('file', $data) && $data['file'] === null) {
            $object->setFile(null);
        }
        if (\array_key_exists('result', $data) && $data['result'] !== null) {
            $object->setResult($this->denormalizer->denormalize($data['result'], \MessageBird\Wire\Model\AssetUploadSessionResult::class, 'json', $context));
            unset($data['result']);
        }
        elseif (\array_key_exists('result', $data) && $data['result'] === null) {
            $object->setResult(null);
        }
        if (\array_key_exists('last_error', $data) && $data['last_error'] !== null) {
            $object->setLastError($this->denormalizer->denormalize($data['last_error'], \MessageBird\Wire\Model\AssetUploadSessionLastError::class, 'json', $context));
            unset($data['last_error']);
        }
        elseif (\array_key_exists('last_error', $data) && $data['last_error'] === null) {
            $object->setLastError(null);
        }
        if (\array_key_exists('next', $data) && $data['next'] !== null) {
            $values = [];
            foreach ($data['next'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\NextAction::class, 'json', $context);
            }
            $object->setNext($values);
            unset($data['next']);
        }
        elseif (\array_key_exists('next', $data) && $data['next'] === null) {
            $object->setNext(null);
        }
        if (\array_key_exists('upload', $data) && $data['upload'] !== null) {
            $object->setUpload($this->denormalizer->denormalize($data['upload'], \MessageBird\Wire\Model\AssetUploadSessionPreparedUpload::class, 'json', $context));
            unset($data['upload']);
        }
        elseif (\array_key_exists('upload', $data) && $data['upload'] === null) {
            $object->setUpload(null);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('id')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadSessionPrepared.id missing');
        }
        $dataArray['id'] = $data->getId();
        if (!$data->isInitialized('state')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadSessionPrepared.state missing');
        }
        $dataArray['state'] = $data->getState();
        if (!$data->isInitialized('expiresAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadSessionPrepared.expires_at missing');
        }
        $dataArray['expires_at'] = $data->getExpiresAt()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('name')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadSessionPrepared.name missing');
        }
        $dataArray['name'] = $data->getName();
        if (!$data->isInitialized('altText')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadSessionPrepared.alt_text missing');
        }
        $dataArray['alt_text'] = $data->getAltText();
        if (!$data->isInitialized('folderId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadSessionPrepared.folder_id missing');
        }
        $dataArray['folder_id'] = $data->getFolderId();
        if (!$data->isInitialized('file')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadSessionPrepared.file missing');
        }
        $dataArray['file'] = $this->normalizer->normalize($data->getFile(), 'json', $context);
        if (!$data->isInitialized('result')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadSessionPrepared.result missing');
        }
        $dataArray['result'] = $this->normalizer->normalize($data->getResult(), 'json', $context);
        if (!$data->isInitialized('lastError')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadSessionPrepared.last_error missing');
        }
        $dataArray['last_error'] = $this->normalizer->normalize($data->getLastError(), 'json', $context);
        if (!$data->isInitialized('next')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadSessionPrepared.next missing');
        }
        $values = [];
        foreach ($data->getNext() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $dataArray['next'] = $values;
        if (!$data->isInitialized('upload')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadSessionPrepared.upload missing');
        }
        $dataArray['upload'] = $this->normalizer->normalize($data->getUpload(), 'json', $context);
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AssetUploadSessionPrepared::class => false];
    }
}
