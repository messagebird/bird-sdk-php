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
class EmailInboxInsightsComplaintsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsComplaints::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsComplaints::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsComplaints();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
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
        if (\array_key_exists('window', $data) && $data['window'] !== null) {
            $object->setWindow($this->denormalizer->denormalize($data['window'], \MessageBird\Wire\Model\EmailInboxInsightsWindow::class, 'json', $context));
            unset($data['window']);
        }
        elseif (\array_key_exists('window', $data) && $data['window'] === null) {
            $object->setWindow(null);
        }
        if (\array_key_exists('compared_to', $data) && $data['compared_to'] !== null) {
            $object->setComparedTo($this->denormalizer->denormalize($data['compared_to'], \MessageBird\Wire\Model\EmailInboxInsightsComparedTo::class, 'json', $context));
            unset($data['compared_to']);
        }
        elseif (\array_key_exists('compared_to', $data) && $data['compared_to'] === null) {
            $object->setComparedTo(null);
        }
        if (\array_key_exists('rate', $data) && $data['rate'] !== null) {
            $object->setRate($this->denormalizer->denormalize($data['rate'], \MessageBird\Wire\Model\EmailInboxInsightsComplaintRate::class, 'json', $context));
            unset($data['rate']);
        }
        elseif (\array_key_exists('rate', $data) && $data['rate'] === null) {
            $object->setRate(null);
        }
        if (\array_key_exists('series', $data) && $data['series'] !== null) {
            $object->setSeries($this->denormalizer->denormalize($data['series'], \MessageBird\Wire\Model\EmailInboxInsightsComplaintSeries::class, 'json', $context));
            unset($data['series']);
        }
        elseif (\array_key_exists('series', $data) && $data['series'] === null) {
            $object->setSeries(null);
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
        $dataArray['window'] = $this->normalizer->normalize($data->getWindow(), 'json', $context);
        if ($data->isInitialized('comparedTo') && null !== $data->getComparedTo()) {
            $dataArray['compared_to'] = $this->normalizer->normalize($data->getComparedTo(), 'json', $context);
        }
        $dataArray['rate'] = $this->normalizer->normalize($data->getRate(), 'json', $context);
        $dataArray['series'] = $this->normalizer->normalize($data->getSeries(), 'json', $context);
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailInboxInsightsComplaints::class => false];
    }
}
