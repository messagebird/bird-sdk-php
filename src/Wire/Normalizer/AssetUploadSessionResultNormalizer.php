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
class AssetUploadSessionResultNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AssetUploadSessionResult::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AssetUploadSessionResult::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AssetUploadSessionResult();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('reused_existing', $data) && \is_int($data['reused_existing'])) {
            $data['reused_existing'] = (bool) $data['reused_existing'];
        }
        if (\array_key_exists('asset_id', $data) && $data['asset_id'] !== null) {
            $object->setAssetId($data['asset_id']);
            unset($data['asset_id']);
        }
        elseif (\array_key_exists('asset_id', $data) && $data['asset_id'] === null) {
            $object->setAssetId(null);
        }
        if (\array_key_exists('reused_existing', $data) && $data['reused_existing'] !== null) {
            $object->setReusedExisting($data['reused_existing']);
            unset($data['reused_existing']);
        }
        elseif (\array_key_exists('reused_existing', $data) && $data['reused_existing'] === null) {
            $object->setReusedExisting(null);
        }
        if (\array_key_exists('completed_at', $data) && $data['completed_at'] !== null) {
            $object->setCompletedAt(new \DateTime($data['completed_at']));
            unset($data['completed_at']);
        }
        elseif (\array_key_exists('completed_at', $data) && $data['completed_at'] === null) {
            $object->setCompletedAt(null);
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
        if (!$data->isInitialized('assetId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadSessionResult.asset_id missing');
        }
        $dataArray['asset_id'] = $data->getAssetId();
        if (!$data->isInitialized('reusedExisting')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadSessionResult.reused_existing missing');
        }
        $dataArray['reused_existing'] = $data->getReusedExisting();
        if (!$data->isInitialized('completedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadSessionResult.completed_at missing');
        }
        $dataArray['completed_at'] = $data->getCompletedAt()->format('Y-m-d\TH:i:sP');
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AssetUploadSessionResult::class => false];
    }
}
