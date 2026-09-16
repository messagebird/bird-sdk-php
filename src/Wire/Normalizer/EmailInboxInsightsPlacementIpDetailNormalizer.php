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
class EmailInboxInsightsPlacementIpDetailNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsPlacementIpDetail::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsPlacementIpDetail::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsPlacementIpDetail();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('inbox_rate_percent', $data) && \is_int($data['inbox_rate_percent'])) {
            $data['inbox_rate_percent'] = (float) $data['inbox_rate_percent'];
        }
        if (\array_key_exists('spf_pass_rate_percent', $data) && \is_int($data['spf_pass_rate_percent'])) {
            $data['spf_pass_rate_percent'] = (float) $data['spf_pass_rate_percent'];
        }
        if (\array_key_exists('dkim_pass_rate_percent', $data) && \is_int($data['dkim_pass_rate_percent'])) {
            $data['dkim_pass_rate_percent'] = (float) $data['dkim_pass_rate_percent'];
        }
        if (\array_key_exists('ip', $data) && $data['ip'] !== null) {
            $object->setIp($data['ip']);
        }
        elseif (\array_key_exists('ip', $data) && $data['ip'] === null) {
            $object->setIp(null);
        }
        if (\array_key_exists('inbox_rate_percent', $data) && $data['inbox_rate_percent'] !== null) {
            $object->setInboxRatePercent($data['inbox_rate_percent']);
        }
        elseif (\array_key_exists('inbox_rate_percent', $data) && $data['inbox_rate_percent'] === null) {
            $object->setInboxRatePercent(null);
        }
        if (\array_key_exists('raw_counts', $data) && $data['raw_counts'] !== null) {
            $object->setRawCounts($this->denormalizer->denormalize($data['raw_counts'], \MessageBird\Wire\Model\EmailInboxInsightsPlacementCounts::class, 'json', $context));
        }
        elseif (\array_key_exists('raw_counts', $data) && $data['raw_counts'] === null) {
            $object->setRawCounts(null);
        }
        if (\array_key_exists('spf_pass_rate_percent', $data) && $data['spf_pass_rate_percent'] !== null) {
            $object->setSpfPassRatePercent($data['spf_pass_rate_percent']);
        }
        elseif (\array_key_exists('spf_pass_rate_percent', $data) && $data['spf_pass_rate_percent'] === null) {
            $object->setSpfPassRatePercent(null);
        }
        if (\array_key_exists('dkim_pass_rate_percent', $data) && $data['dkim_pass_rate_percent'] !== null) {
            $object->setDkimPassRatePercent($data['dkim_pass_rate_percent']);
        }
        elseif (\array_key_exists('dkim_pass_rate_percent', $data) && $data['dkim_pass_rate_percent'] === null) {
            $object->setDkimPassRatePercent(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['raw_counts'] = $this->normalizer->normalize($data->getRawCounts(), 'json', $context);
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailInboxInsightsPlacementIpDetail::class => false];
    }
}
