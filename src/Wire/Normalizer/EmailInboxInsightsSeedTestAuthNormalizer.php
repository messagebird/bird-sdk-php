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
class EmailInboxInsightsSeedTestAuthNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsSeedTestAuth::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsSeedTestAuth::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsSeedTestAuth();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('spf_pass_rate_percent', $data) && \is_int($data['spf_pass_rate_percent'])) {
            $data['spf_pass_rate_percent'] = (float) $data['spf_pass_rate_percent'];
        }
        if (\array_key_exists('dkim_pass_rate_percent', $data) && \is_int($data['dkim_pass_rate_percent'])) {
            $data['dkim_pass_rate_percent'] = (float) $data['dkim_pass_rate_percent'];
        }
        if (\array_key_exists('dmarc_aligned_rate_percent', $data) && \is_int($data['dmarc_aligned_rate_percent'])) {
            $data['dmarc_aligned_rate_percent'] = (float) $data['dmarc_aligned_rate_percent'];
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
        if (\array_key_exists('dmarc_aligned_rate_percent', $data) && $data['dmarc_aligned_rate_percent'] !== null) {
            $object->setDmarcAlignedRatePercent($data['dmarc_aligned_rate_percent']);
        }
        elseif (\array_key_exists('dmarc_aligned_rate_percent', $data) && $data['dmarc_aligned_rate_percent'] === null) {
            $object->setDmarcAlignedRatePercent(null);
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
        return [\MessageBird\Wire\Model\EmailInboxInsightsSeedTestAuth::class => false];
    }
}
