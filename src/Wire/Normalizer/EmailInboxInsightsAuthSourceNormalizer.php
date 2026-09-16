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
class EmailInboxInsightsAuthSourceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsAuthSource::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsAuthSource::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsAuthSource();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('spf_aligned_rate_percent', $data) && \is_int($data['spf_aligned_rate_percent'])) {
            $data['spf_aligned_rate_percent'] = (float) $data['spf_aligned_rate_percent'];
        }
        if (\array_key_exists('dkim_aligned_rate_percent', $data) && \is_int($data['dkim_aligned_rate_percent'])) {
            $data['dkim_aligned_rate_percent'] = (float) $data['dkim_aligned_rate_percent'];
        }
        if (\array_key_exists('dmarc_pass_rate_percent', $data) && \is_int($data['dmarc_pass_rate_percent'])) {
            $data['dmarc_pass_rate_percent'] = (float) $data['dmarc_pass_rate_percent'];
        }
        if (\array_key_exists('qualifies_for_readiness', $data) && \is_int($data['qualifies_for_readiness'])) {
            $data['qualifies_for_readiness'] = (bool) $data['qualifies_for_readiness'];
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('category', $data) && $data['category'] !== null) {
            $object->setCategory($data['category']);
        }
        elseif (\array_key_exists('category', $data) && $data['category'] === null) {
            $object->setCategory(null);
        }
        if (\array_key_exists('volume', $data) && $data['volume'] !== null) {
            $object->setVolume($data['volume']);
        }
        elseif (\array_key_exists('volume', $data) && $data['volume'] === null) {
            $object->setVolume(null);
        }
        if (\array_key_exists('spf_aligned_rate_percent', $data) && $data['spf_aligned_rate_percent'] !== null) {
            $object->setSpfAlignedRatePercent($data['spf_aligned_rate_percent']);
        }
        elseif (\array_key_exists('spf_aligned_rate_percent', $data) && $data['spf_aligned_rate_percent'] === null) {
            $object->setSpfAlignedRatePercent(null);
        }
        if (\array_key_exists('dkim_aligned_rate_percent', $data) && $data['dkim_aligned_rate_percent'] !== null) {
            $object->setDkimAlignedRatePercent($data['dkim_aligned_rate_percent']);
        }
        elseif (\array_key_exists('dkim_aligned_rate_percent', $data) && $data['dkim_aligned_rate_percent'] === null) {
            $object->setDkimAlignedRatePercent(null);
        }
        if (\array_key_exists('dmarc_pass_rate_percent', $data) && $data['dmarc_pass_rate_percent'] !== null) {
            $object->setDmarcPassRatePercent($data['dmarc_pass_rate_percent']);
        }
        elseif (\array_key_exists('dmarc_pass_rate_percent', $data) && $data['dmarc_pass_rate_percent'] === null) {
            $object->setDmarcPassRatePercent(null);
        }
        if (\array_key_exists('verdict', $data) && $data['verdict'] !== null) {
            $object->setVerdict($data['verdict']);
        }
        elseif (\array_key_exists('verdict', $data) && $data['verdict'] === null) {
            $object->setVerdict(null);
        }
        if (\array_key_exists('qualifies_for_readiness', $data) && $data['qualifies_for_readiness'] !== null) {
            $object->setQualifiesForReadiness($data['qualifies_for_readiness']);
        }
        elseif (\array_key_exists('qualifies_for_readiness', $data) && $data['qualifies_for_readiness'] === null) {
            $object->setQualifiesForReadiness(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['verdict'] = $data->getVerdict();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailInboxInsightsAuthSource::class => false];
    }
}
