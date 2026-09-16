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
class EmailInboxInsightsDmarcNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsDmarc::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsDmarc::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsDmarc();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('aligned_rate_percent', $data) && \is_int($data['aligned_rate_percent'])) {
            $data['aligned_rate_percent'] = (float) $data['aligned_rate_percent'];
        }
        if (\array_key_exists('delta_pts', $data) && \is_int($data['delta_pts'])) {
            $data['delta_pts'] = (float) $data['delta_pts'];
        }
        if (\array_key_exists('ready_for_reject', $data) && \is_int($data['ready_for_reject'])) {
            $data['ready_for_reject'] = (bool) $data['ready_for_reject'];
        }
        if (\array_key_exists('aligned_rate_percent', $data) && $data['aligned_rate_percent'] !== null) {
            $object->setAlignedRatePercent($data['aligned_rate_percent']);
        }
        elseif (\array_key_exists('aligned_rate_percent', $data) && $data['aligned_rate_percent'] === null) {
            $object->setAlignedRatePercent(null);
        }
        if (\array_key_exists('policy', $data) && $data['policy'] !== null) {
            $object->setPolicy($data['policy']);
        }
        elseif (\array_key_exists('policy', $data) && $data['policy'] === null) {
            $object->setPolicy(null);
        }
        if (\array_key_exists('ready_for_reject', $data) && $data['ready_for_reject'] !== null) {
            $object->setReadyForReject($data['ready_for_reject']);
        }
        elseif (\array_key_exists('ready_for_reject', $data) && $data['ready_for_reject'] === null) {
            $object->setReadyForReject(null);
        }
        if (\array_key_exists('readiness_reasons', $data) && $data['readiness_reasons'] !== null) {
            $values = [];
            foreach ($data['readiness_reasons'] as $value) {
                $values[] = $value;
            }
            $object->setReadinessReasons($values);
        }
        elseif (\array_key_exists('readiness_reasons', $data) && $data['readiness_reasons'] === null) {
            $object->setReadinessReasons(null);
        }
        if (\array_key_exists('delta_pts', $data) && $data['delta_pts'] !== null) {
            $object->setDeltaPts($data['delta_pts']);
        }
        elseif (\array_key_exists('delta_pts', $data) && $data['delta_pts'] === null) {
            $object->setDeltaPts(null);
        }
        if (\array_key_exists('source', $data) && $data['source'] !== null) {
            $object->setSource($data['source']);
        }
        elseif (\array_key_exists('source', $data) && $data['source'] === null) {
            $object->setSource(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['status'] = $data->getStatus();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailInboxInsightsDmarc::class => false];
    }
}
