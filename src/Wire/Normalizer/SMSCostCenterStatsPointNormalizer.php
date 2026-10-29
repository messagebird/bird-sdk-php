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
class SMSCostCenterStatsPointNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\SMSCostCenterStatsPoint::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\SMSCostCenterStatsPoint::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\SMSCostCenterStatsPoint();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('cost_center', $data) && $data['cost_center'] !== null) {
            $object->setCostCenter($data['cost_center']);
        }
        elseif (\array_key_exists('cost_center', $data) && $data['cost_center'] === null) {
            $object->setCostCenter(null);
        }
        if (\array_key_exists('delivery', $data) && $data['delivery'] !== null) {
            $object->setDelivery($this->denormalizer->denormalize($data['delivery'], \MessageBird\Wire\Model\SMSCostCenterStatsPointDelivery::class, 'json', $context));
        }
        elseif (\array_key_exists('delivery', $data) && $data['delivery'] === null) {
            $object->setDelivery(null);
        }
        if (\array_key_exists('latency', $data) && $data['latency'] !== null) {
            $object->setLatency($this->denormalizer->denormalize($data['latency'], \MessageBird\Wire\Model\SMSCostCenterStatsPointLatency::class, 'json', $context));
        }
        elseif (\array_key_exists('latency', $data) && $data['latency'] === null) {
            $object->setLatency(null);
        }
        if (\array_key_exists('trend', $data) && $data['trend'] !== null) {
            $values = [];
            foreach ($data['trend'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\SMSStatsPoint::class, 'json', $context);
            }
            $object->setTrend($values);
        }
        elseif (\array_key_exists('trend', $data) && $data['trend'] === null) {
            $object->setTrend(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['cost_center'] = $data->getCostCenter();
        $dataArray['delivery'] = $this->normalizer->normalize($data->getDelivery(), 'json', $context);
        $dataArray['latency'] = $this->normalizer->normalize($data->getLatency(), 'json', $context);
        if ($data->isInitialized('trend') && null !== $data->getTrend()) {
            $values = [];
            foreach ($data->getTrend() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['trend'] = $values;
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\SMSCostCenterStatsPoint::class => false];
    }
}
