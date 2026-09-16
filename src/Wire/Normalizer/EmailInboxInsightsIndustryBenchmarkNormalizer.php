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
class EmailInboxInsightsIndustryBenchmarkNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsIndustryBenchmark::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsIndustryBenchmark::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsIndustryBenchmark();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('median_inbox_rate_percent', $data) && \is_int($data['median_inbox_rate_percent'])) {
            $data['median_inbox_rate_percent'] = (float) $data['median_inbox_rate_percent'];
        }
        if (\array_key_exists('resource', $data) && $data['resource'] !== null) {
            $object->setResource($data['resource']);
            unset($data['resource']);
        }
        elseif (\array_key_exists('resource', $data) && $data['resource'] === null) {
            $object->setResource(null);
        }
        if (\array_key_exists('domain', $data) && $data['domain'] !== null) {
            $object->setDomain($data['domain']);
            unset($data['domain']);
        }
        elseif (\array_key_exists('domain', $data) && $data['domain'] === null) {
            $object->setDomain(null);
        }
        if (\array_key_exists('measurement', $data) && $data['measurement'] !== null) {
            $object->setMeasurement($this->denormalizer->denormalize($data['measurement'], \MessageBird\Wire\Model\EmailInboxInsightsMeasurement::class, 'json', $context));
            unset($data['measurement']);
        }
        elseif (\array_key_exists('measurement', $data) && $data['measurement'] === null) {
            $object->setMeasurement(null);
        }
        if (\array_key_exists('generated_at', $data) && $data['generated_at'] !== null) {
            $object->setGeneratedAt(new \DateTime($data['generated_at']));
            unset($data['generated_at']);
        }
        elseif (\array_key_exists('generated_at', $data) && $data['generated_at'] === null) {
            $object->setGeneratedAt(null);
        }
        if (\array_key_exists('freshness', $data) && $data['freshness'] !== null) {
            $object->setFreshness($this->denormalizer->denormalize($data['freshness'], \MessageBird\Wire\Model\EmailInboxInsightsFreshness::class, 'json', $context));
            unset($data['freshness']);
        }
        elseif (\array_key_exists('freshness', $data) && $data['freshness'] === null) {
            $object->setFreshness(null);
        }
        if (\array_key_exists('cached_at', $data) && $data['cached_at'] !== null) {
            $object->setCachedAt(new \DateTime($data['cached_at']));
            unset($data['cached_at']);
        }
        elseif (\array_key_exists('cached_at', $data) && $data['cached_at'] === null) {
            $object->setCachedAt(null);
        }
        if (\array_key_exists('industry', $data) && $data['industry'] !== null) {
            $object->setIndustry($this->denormalizer->denormalize($data['industry'], \MessageBird\Wire\Model\EmailInboxInsightsIndustryBenchmarkIndustry::class, 'json', $context));
            unset($data['industry']);
        }
        elseif (\array_key_exists('industry', $data) && $data['industry'] === null) {
            $object->setIndustry(null);
        }
        if (\array_key_exists('median_inbox_rate_percent', $data) && $data['median_inbox_rate_percent'] !== null) {
            $object->setMedianInboxRatePercent($data['median_inbox_rate_percent']);
            unset($data['median_inbox_rate_percent']);
        }
        elseif (\array_key_exists('median_inbox_rate_percent', $data) && $data['median_inbox_rate_percent'] === null) {
            $object->setMedianInboxRatePercent(null);
        }
        if (\array_key_exists('window_days', $data) && $data['window_days'] !== null) {
            $object->setWindowDays($data['window_days']);
            unset($data['window_days']);
        }
        elseif (\array_key_exists('window_days', $data) && $data['window_days'] === null) {
            $object->setWindowDays(null);
        }
        if (\array_key_exists('cohort_size', $data) && $data['cohort_size'] !== null) {
            $object->setCohortSize($data['cohort_size']);
            unset($data['cohort_size']);
        }
        elseif (\array_key_exists('cohort_size', $data) && $data['cohort_size'] === null) {
            $object->setCohortSize(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
            unset($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
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
        if ($data->isInitialized('measurement') && null !== $data->getMeasurement()) {
            $dataArray['measurement'] = $this->normalizer->normalize($data->getMeasurement(), 'json', $context);
        }
        $dataArray['freshness'] = $this->normalizer->normalize($data->getFreshness(), 'json', $context);
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
        return [\MessageBird\Wire\Model\EmailInboxInsightsIndustryBenchmark::class => false];
    }
}
