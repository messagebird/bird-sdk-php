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
class VoiceSettingsDailySpendLimitNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceSettingsDailySpendLimit::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceSettingsDailySpendLimit::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceSettingsDailySpendLimit();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('currency_code', $data) && $data['currency_code'] !== null) {
            $object->setCurrencyCode($data['currency_code']);
            unset($data['currency_code']);
        }
        elseif (\array_key_exists('currency_code', $data) && $data['currency_code'] === null) {
            $object->setCurrencyCode(null);
        }
        if (\array_key_exists('limit', $data) && $data['limit'] !== null) {
            $object->setLimit($this->denormalizer->denormalize($data['limit'], \MessageBird\Wire\Model\VoiceDailySpendLimitLimit::class, 'json', $context));
            unset($data['limit']);
        }
        elseif (\array_key_exists('limit', $data) && $data['limit'] === null) {
            $object->setLimit(null);
        }
        if (\array_key_exists('used', $data) && $data['used'] !== null) {
            $object->setUsed($this->denormalizer->denormalize($data['used'], \MessageBird\Wire\Model\VoiceDailySpendLimitUsed::class, 'json', $context));
            unset($data['used']);
        }
        elseif (\array_key_exists('used', $data) && $data['used'] === null) {
            $object->setUsed(null);
        }
        if (\array_key_exists('remaining', $data) && $data['remaining'] !== null) {
            $object->setRemaining($this->denormalizer->denormalize($data['remaining'], \MessageBird\Wire\Model\VoiceDailySpendLimitRemaining::class, 'json', $context));
            unset($data['remaining']);
        }
        elseif (\array_key_exists('remaining', $data) && $data['remaining'] === null) {
            $object->setRemaining(null);
        }
        if (\array_key_exists('resets_at', $data) && $data['resets_at'] !== null) {
            $object->setResetsAt(new \DateTime($data['resets_at']));
            unset($data['resets_at']);
        }
        elseif (\array_key_exists('resets_at', $data) && $data['resets_at'] === null) {
            $object->setResetsAt(null);
        }
        if (\array_key_exists('default_limit', $data) && $data['default_limit'] !== null) {
            $object->setDefaultLimit($this->denormalizer->denormalize($data['default_limit'], \MessageBird\Wire\Model\VoiceDailySpendLimitDefaultLimit::class, 'json', $context));
            unset($data['default_limit']);
        }
        elseif (\array_key_exists('default_limit', $data) && $data['default_limit'] === null) {
            $object->setDefaultLimit(null);
        }
        if (\array_key_exists('max_limit', $data) && $data['max_limit'] !== null) {
            $object->setMaxLimit($this->denormalizer->denormalize($data['max_limit'], \MessageBird\Wire\Model\VoiceDailySpendLimitMaxLimit::class, 'json', $context));
            unset($data['max_limit']);
        }
        elseif (\array_key_exists('max_limit', $data) && $data['max_limit'] === null) {
            $object->setMaxLimit(null);
        }
        if (\array_key_exists('workspace_limit', $data) && $data['workspace_limit'] !== null) {
            $object->setWorkspaceLimit($this->denormalizer->denormalize($data['workspace_limit'], \MessageBird\Wire\Model\VoiceDailySpendLimitWorkspaceLimit::class, 'json', $context));
            unset($data['workspace_limit']);
        }
        elseif (\array_key_exists('workspace_limit', $data) && $data['workspace_limit'] === null) {
            $object->setWorkspaceLimit(null);
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
        if (!$data->isInitialized('currencyCode')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceSettingsDailySpendLimit.currency_code missing');
        }
        $dataArray['currency_code'] = $data->getCurrencyCode();
        if (!$data->isInitialized('limit')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceSettingsDailySpendLimit.limit missing');
        }
        $dataArray['limit'] = $this->normalizer->normalize($data->getLimit(), 'json', $context);
        if (!$data->isInitialized('used')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceSettingsDailySpendLimit.used missing');
        }
        $dataArray['used'] = $this->normalizer->normalize($data->getUsed(), 'json', $context);
        if (!$data->isInitialized('remaining')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceSettingsDailySpendLimit.remaining missing');
        }
        $dataArray['remaining'] = $this->normalizer->normalize($data->getRemaining(), 'json', $context);
        if (!$data->isInitialized('resetsAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceSettingsDailySpendLimit.resets_at missing');
        }
        $dataArray['resets_at'] = $data->getResetsAt()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('defaultLimit')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceSettingsDailySpendLimit.default_limit missing');
        }
        $dataArray['default_limit'] = $this->normalizer->normalize($data->getDefaultLimit(), 'json', $context);
        if (!$data->isInitialized('maxLimit')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceSettingsDailySpendLimit.max_limit missing');
        }
        $dataArray['max_limit'] = $this->normalizer->normalize($data->getMaxLimit(), 'json', $context);
        if (!$data->isInitialized('workspaceLimit')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceSettingsDailySpendLimit.workspace_limit missing');
        }
        $dataArray['workspace_limit'] = $this->normalizer->normalize($data->getWorkspaceLimit(), 'json', $context);
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceSettingsDailySpendLimit::class => false];
    }
}
