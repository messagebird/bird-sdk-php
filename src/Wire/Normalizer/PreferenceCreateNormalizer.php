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
class PreferenceCreateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\PreferenceCreate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\PreferenceCreate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\PreferenceCreate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('handle', $data) && $data['handle'] !== null) {
            $object->setHandle($data['handle']);
            unset($data['handle']);
        }
        elseif (\array_key_exists('handle', $data) && $data['handle'] === null) {
            $object->setHandle(null);
        }
        if (\array_key_exists('channel', $data) && $data['channel'] !== null) {
            $object->setChannel($data['channel']);
            unset($data['channel']);
        }
        elseif (\array_key_exists('channel', $data) && $data['channel'] === null) {
            $object->setChannel(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
            unset($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('coverage', $data) && $data['coverage'] !== null) {
            $object->setCoverage($data['coverage']);
            unset($data['coverage']);
        }
        elseif (\array_key_exists('coverage', $data) && $data['coverage'] === null) {
            $object->setCoverage(null);
        }
        if (\array_key_exists('sender_scope', $data) && $data['sender_scope'] !== null) {
            $object->setSenderScope($data['sender_scope']);
            unset($data['sender_scope']);
        }
        elseif (\array_key_exists('sender_scope', $data) && $data['sender_scope'] === null) {
            $object->setSenderScope(null);
        }
        if (\array_key_exists('source', $data) && $data['source'] !== null) {
            $object->setSource($data['source']);
            unset($data['source']);
        }
        elseif (\array_key_exists('source', $data) && $data['source'] === null) {
            $object->setSource(null);
        }
        if (\array_key_exists('consented_at', $data) && $data['consented_at'] !== null) {
            $object->setConsentedAt(new \DateTime($data['consented_at']));
            unset($data['consented_at']);
        }
        elseif (\array_key_exists('consented_at', $data) && $data['consented_at'] === null) {
            $object->setConsentedAt(null);
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
        $dataArray['handle'] = $data->getHandle();
        $dataArray['channel'] = $data->getChannel();
        $dataArray['status'] = $data->getStatus();
        if ($data->isInitialized('coverage') && null !== $data->getCoverage()) {
            $dataArray['coverage'] = $data->getCoverage();
        }
        if ($data->isInitialized('senderScope') && null !== $data->getSenderScope()) {
            $dataArray['sender_scope'] = $data->getSenderScope();
        }
        if ($data->isInitialized('source') && null !== $data->getSource()) {
            $dataArray['source'] = $data->getSource();
        }
        if ($data->isInitialized('consentedAt') && null !== $data->getConsentedAt()) {
            $dataArray['consented_at'] = $data->getConsentedAt()->format('Y-m-d\TH:i:sP');
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
        return [\MessageBird\Wire\Model\PreferenceCreate::class => false];
    }
}
