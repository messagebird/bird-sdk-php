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
class AutomaticSeedingSourceObservationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AutomaticSeedingSourceObservation::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AutomaticSeedingSourceObservation::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AutomaticSeedingSourceObservation();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('source', $data) && $data['source'] !== null) {
            $object->setSource($data['source']);
            unset($data['source']);
        }
        elseif (\array_key_exists('source', $data) && $data['source'] === null) {
            $object->setSource(null);
        }
        if (\array_key_exists('source_created_at', $data) && $data['source_created_at'] !== null) {
            $object->setSourceCreatedAt(new \DateTime($data['source_created_at']));
            unset($data['source_created_at']);
        }
        elseif (\array_key_exists('source_created_at', $data) && $data['source_created_at'] === null) {
            $object->setSourceCreatedAt(null);
        }
        if (\array_key_exists('retain_until', $data) && $data['retain_until'] !== null) {
            $object->setRetainUntil(new \DateTime($data['retain_until']));
            unset($data['retain_until']);
        }
        elseif (\array_key_exists('retain_until', $data) && $data['retain_until'] === null) {
            $object->setRetainUntil(null);
        }
        if (\array_key_exists('state', $data) && $data['state'] !== null) {
            $object->setState($data['state']);
            unset($data['state']);
        }
        elseif (\array_key_exists('state', $data) && $data['state'] === null) {
            $object->setState(null);
        }
        if (\array_key_exists('reason', $data) && $data['reason'] !== null) {
            $object->setReason($data['reason']);
            unset($data['reason']);
        }
        elseif (\array_key_exists('reason', $data) && $data['reason'] === null) {
            $object->setReason(null);
        }
        if (\array_key_exists('run_id', $data) && $data['run_id'] !== null) {
            $object->setRunId($data['run_id']);
            unset($data['run_id']);
        }
        elseif (\array_key_exists('run_id', $data) && $data['run_id'] === null) {
            $object->setRunId(null);
        }
        if (\array_key_exists('label', $data) && $data['label'] !== null) {
            $object->setLabel($data['label']);
            unset($data['label']);
        }
        elseif (\array_key_exists('label', $data) && $data['label'] === null) {
            $object->setLabel(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
            unset($data['created_at']);
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
            unset($data['updated_at']);
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
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
        if (!$data->isInitialized('source')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingSourceObservation.source missing');
        }
        $dataArray['source'] = $data->getSource();
        if (!$data->isInitialized('sourceCreatedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingSourceObservation.source_created_at missing');
        }
        $dataArray['source_created_at'] = $data->getSourceCreatedAt()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('retainUntil')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingSourceObservation.retain_until missing');
        }
        $dataArray['retain_until'] = $data->getRetainUntil()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('state')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingSourceObservation.state missing');
        }
        $dataArray['state'] = $data->getState();
        if ($data->isInitialized('reason') && null !== $data->getReason()) {
            $dataArray['reason'] = $data->getReason();
        }
        if ($data->isInitialized('runId') && null !== $data->getRunId()) {
            $dataArray['run_id'] = $data->getRunId();
        }
        if ($data->isInitialized('label') && null !== $data->getLabel()) {
            $dataArray['label'] = $data->getLabel();
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AutomaticSeedingSourceObservation::class => false];
    }
}
