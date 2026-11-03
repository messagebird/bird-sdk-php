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
class AssetUploadSessionPreparedUploadNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AssetUploadSessionPreparedUpload::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AssetUploadSessionPreparedUpload::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AssetUploadSessionPreparedUpload();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('method', $data) && $data['method'] !== null) {
            $object->setMethod($data['method']);
        }
        elseif (\array_key_exists('method', $data) && $data['method'] === null) {
            $object->setMethod(null);
        }
        if (\array_key_exists('url', $data) && $data['url'] !== null) {
            $object->setUrl($data['url']);
        }
        elseif (\array_key_exists('url', $data) && $data['url'] === null) {
            $object->setUrl(null);
        }
        if (\array_key_exists('required_headers', $data) && $data['required_headers'] !== null) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['required_headers'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setRequiredHeaders($values);
        }
        elseif (\array_key_exists('required_headers', $data) && $data['required_headers'] === null) {
            $object->setRequiredHeaders(null);
        }
        if (\array_key_exists('content_length', $data) && $data['content_length'] !== null) {
            $object->setContentLength($data['content_length']);
        }
        elseif (\array_key_exists('content_length', $data) && $data['content_length'] === null) {
            $object->setContentLength(null);
        }
        if (\array_key_exists('expires_at', $data) && $data['expires_at'] !== null) {
            $object->setExpiresAt(new \DateTime($data['expires_at']));
        }
        elseif (\array_key_exists('expires_at', $data) && $data['expires_at'] === null) {
            $object->setExpiresAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['method'] = $data->getMethod();
        $dataArray['url'] = $data->getUrl();
        $values = [];
        foreach ($data->getRequiredHeaders() as $key => $value) {
            $values[$key] = $value;
        }
        $dataArray['required_headers'] = (object) $values;
        $dataArray['content_length'] = $data->getContentLength();
        $dataArray['expires_at'] = $data->getExpiresAt()->format('Y-m-d\TH:i:sP');
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AssetUploadSessionPreparedUpload::class => false];
    }
}
