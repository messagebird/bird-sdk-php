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
class AutomaticSeedingProgressNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AutomaticSeedingProgress::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AutomaticSeedingProgress::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AutomaticSeedingProgress();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('planned', $data) && $data['planned'] !== null) {
            $object->setPlanned($data['planned']);
        }
        elseif (\array_key_exists('planned', $data) && $data['planned'] === null) {
            $object->setPlanned(null);
        }
        if (\array_key_exists('admitted', $data) && $data['admitted'] !== null) {
            $object->setAdmitted($data['admitted']);
        }
        elseif (\array_key_exists('admitted', $data) && $data['admitted'] === null) {
            $object->setAdmitted(null);
        }
        if (\array_key_exists('provider_accepted', $data) && $data['provider_accepted'] !== null) {
            $object->setProviderAccepted($data['provider_accepted']);
        }
        elseif (\array_key_exists('provider_accepted', $data) && $data['provider_accepted'] === null) {
            $object->setProviderAccepted(null);
        }
        if (\array_key_exists('delivered', $data) && $data['delivered'] !== null) {
            $object->setDelivered($data['delivered']);
        }
        elseif (\array_key_exists('delivered', $data) && $data['delivered'] === null) {
            $object->setDelivered(null);
        }
        if (\array_key_exists('failed', $data) && $data['failed'] !== null) {
            $object->setFailed($data['failed']);
        }
        elseif (\array_key_exists('failed', $data) && $data['failed'] === null) {
            $object->setFailed(null);
        }
        if (\array_key_exists('not_sent', $data) && $data['not_sent'] !== null) {
            $object->setNotSent($data['not_sent']);
        }
        elseif (\array_key_exists('not_sent', $data) && $data['not_sent'] === null) {
            $object->setNotSent(null);
        }
        if (\array_key_exists('unknown', $data) && $data['unknown'] !== null) {
            $object->setUnknown($data['unknown']);
        }
        elseif (\array_key_exists('unknown', $data) && $data['unknown'] === null) {
            $object->setUnknown(null);
        }
        if (\array_key_exists('pending', $data) && $data['pending'] !== null) {
            $object->setPending($data['pending']);
        }
        elseif (\array_key_exists('pending', $data) && $data['pending'] === null) {
            $object->setPending(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('planned')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingProgress.planned missing');
        }
        $dataArray['planned'] = $data->getPlanned();
        if (!$data->isInitialized('admitted')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingProgress.admitted missing');
        }
        $dataArray['admitted'] = $data->getAdmitted();
        if (!$data->isInitialized('providerAccepted')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingProgress.provider_accepted missing');
        }
        $dataArray['provider_accepted'] = $data->getProviderAccepted();
        if (!$data->isInitialized('delivered')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingProgress.delivered missing');
        }
        $dataArray['delivered'] = $data->getDelivered();
        if (!$data->isInitialized('failed')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingProgress.failed missing');
        }
        $dataArray['failed'] = $data->getFailed();
        if (!$data->isInitialized('notSent')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingProgress.not_sent missing');
        }
        $dataArray['not_sent'] = $data->getNotSent();
        if (!$data->isInitialized('unknown')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingProgress.unknown missing');
        }
        $dataArray['unknown'] = $data->getUnknown();
        if (!$data->isInitialized('pending')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingProgress.pending missing');
        }
        $dataArray['pending'] = $data->getPending();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AutomaticSeedingProgress::class => false];
    }
}
