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
class NumberPricingErrorNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\NumberPricingError::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\NumberPricingError::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\NumberPricingError();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('type', $data) && $data['type'] !== null) {
            $object->setType($data['type']);
            unset($data['type']);
        }
        elseif (\array_key_exists('type', $data) && $data['type'] === null) {
            $object->setType(null);
        }
        if (\array_key_exists('code', $data) && $data['code'] !== null) {
            $object->setCode($data['code']);
            unset($data['code']);
        }
        elseif (\array_key_exists('code', $data) && $data['code'] === null) {
            $object->setCode(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
            unset($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('message', $data) && $data['message'] !== null) {
            $object->setMessage($data['message']);
            unset($data['message']);
        }
        elseif (\array_key_exists('message', $data) && $data['message'] === null) {
            $object->setMessage(null);
        }
        if (\array_key_exists('param', $data) && $data['param'] !== null) {
            $object->setParam($data['param']);
            unset($data['param']);
        }
        elseif (\array_key_exists('param', $data) && $data['param'] === null) {
            $object->setParam(null);
        }
        if (\array_key_exists('doc_url', $data) && $data['doc_url'] !== null) {
            $object->setDocUrl($data['doc_url']);
            unset($data['doc_url']);
        }
        elseif (\array_key_exists('doc_url', $data) && $data['doc_url'] === null) {
            $object->setDocUrl(null);
        }
        if (\array_key_exists('request_id', $data) && $data['request_id'] !== null) {
            $object->setRequestId($data['request_id']);
            unset($data['request_id']);
        }
        elseif (\array_key_exists('request_id', $data) && $data['request_id'] === null) {
            $object->setRequestId(null);
        }
        if (\array_key_exists('vendor_code', $data) && $data['vendor_code'] !== null) {
            $object->setVendorCode($data['vendor_code']);
            unset($data['vendor_code']);
        }
        elseif (\array_key_exists('vendor_code', $data) && $data['vendor_code'] === null) {
            $object->setVendorCode(null);
        }
        if (\array_key_exists('details', $data) && $data['details'] !== null) {
            $values = [];
            foreach ($data['details'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\ErrorDetail::class, 'json', $context);
            }
            $object->setDetails($values);
            unset($data['details']);
        }
        elseif (\array_key_exists('details', $data) && $data['details'] === null) {
            $object->setDetails(null);
        }
        if (\array_key_exists('remediation', $data) && $data['remediation'] !== null) {
            $object->setRemediation($data['remediation']);
            unset($data['remediation']);
        }
        elseif (\array_key_exists('remediation', $data) && $data['remediation'] === null) {
            $object->setRemediation(null);
        }
        if (\array_key_exists('next', $data) && $data['next'] !== null) {
            $values_1 = [];
            foreach ($data['next'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\NextAction::class, 'json', $context);
            }
            $object->setNext($values_1);
            unset($data['next']);
        }
        elseif (\array_key_exists('next', $data) && $data['next'] === null) {
            $object->setNext(null);
        }
        if (\array_key_exists('rate_limit', $data) && $data['rate_limit'] !== null) {
            $object->setRateLimit($this->denormalizer->denormalize($data['rate_limit'], \MessageBird\Wire\Model\RateLimitErrorContext::class, 'json', $context));
            unset($data['rate_limit']);
        }
        elseif (\array_key_exists('rate_limit', $data) && $data['rate_limit'] === null) {
            $object->setRateLimit(null);
        }
        if (\array_key_exists('quota', $data) && $data['quota'] !== null) {
            $object->setQuota($this->denormalizer->denormalize($data['quota'], \MessageBird\Wire\Model\QuotaErrorContext::class, 'json', $context));
            unset($data['quota']);
        }
        elseif (\array_key_exists('quota', $data) && $data['quota'] === null) {
            $object->setQuota(null);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['type'] = $data->getType();
        $dataArray['code'] = $data->getCode();
        $dataArray['name'] = $data->getName();
        $dataArray['message'] = $data->getMessage();
        if ($data->isInitialized('param') && null !== $data->getParam()) {
            $dataArray['param'] = $data->getParam();
        }
        $dataArray['doc_url'] = $data->getDocUrl();
        $dataArray['request_id'] = $data->getRequestId();
        if ($data->isInitialized('vendorCode') && null !== $data->getVendorCode()) {
            $dataArray['vendor_code'] = $data->getVendorCode();
        }
        if ($data->isInitialized('details') && null !== $data->getDetails()) {
            $values = [];
            foreach ($data->getDetails() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['details'] = $values;
        }
        if ($data->isInitialized('remediation') && null !== $data->getRemediation()) {
            $dataArray['remediation'] = $data->getRemediation();
        }
        if ($data->isInitialized('next') && null !== $data->getNext()) {
            $values_1 = [];
            foreach ($data->getNext() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $dataArray['next'] = $values_1;
        }
        if ($data->isInitialized('rateLimit') && null !== $data->getRateLimit()) {
            $dataArray['rate_limit'] = $this->normalizer->normalize($data->getRateLimit(), 'json', $context);
        }
        if ($data->isInitialized('quota') && null !== $data->getQuota()) {
            $dataArray['quota'] = $this->normalizer->normalize($data->getQuota(), 'json', $context);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_2;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\NumberPricingError::class => false];
    }
}
