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
class ErrorBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\ErrorBody::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\ErrorBody::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\ErrorBody();
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
        }
        elseif (\array_key_exists('type', $data) && $data['type'] === null) {
            $object->setType(null);
        }
        if (\array_key_exists('code', $data) && $data['code'] !== null) {
            $object->setCode($data['code']);
        }
        elseif (\array_key_exists('code', $data) && $data['code'] === null) {
            $object->setCode(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('message', $data) && $data['message'] !== null) {
            $object->setMessage($data['message']);
        }
        elseif (\array_key_exists('message', $data) && $data['message'] === null) {
            $object->setMessage(null);
        }
        if (\array_key_exists('param', $data) && $data['param'] !== null) {
            $object->setParam($data['param']);
        }
        elseif (\array_key_exists('param', $data) && $data['param'] === null) {
            $object->setParam(null);
        }
        if (\array_key_exists('doc_url', $data) && $data['doc_url'] !== null) {
            $object->setDocUrl($data['doc_url']);
        }
        elseif (\array_key_exists('doc_url', $data) && $data['doc_url'] === null) {
            $object->setDocUrl(null);
        }
        if (\array_key_exists('request_id', $data) && $data['request_id'] !== null) {
            $object->setRequestId($data['request_id']);
        }
        elseif (\array_key_exists('request_id', $data) && $data['request_id'] === null) {
            $object->setRequestId(null);
        }
        if (\array_key_exists('vendor_code', $data) && $data['vendor_code'] !== null) {
            $object->setVendorCode($data['vendor_code']);
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
        }
        elseif (\array_key_exists('details', $data) && $data['details'] === null) {
            $object->setDetails(null);
        }
        if (\array_key_exists('remediation', $data) && $data['remediation'] !== null) {
            $object->setRemediation($data['remediation']);
        }
        elseif (\array_key_exists('remediation', $data) && $data['remediation'] === null) {
            $object->setRemediation(null);
        }
        if (\array_key_exists('next', $data) && $data['next'] !== null) {
            $values_1 = [];
            foreach ($data['next'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\ErrorNextAction::class, 'json', $context);
            }
            $object->setNext($values_1);
        }
        elseif (\array_key_exists('next', $data) && $data['next'] === null) {
            $object->setNext(null);
        }
        if (\array_key_exists('unmet_gates', $data) && $data['unmet_gates'] !== null) {
            $values_2 = [];
            foreach ($data['unmet_gates'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \MessageBird\Wire\Model\UnmetGate::class, 'json', $context);
            }
            $object->setUnmetGates($values_2);
        }
        elseif (\array_key_exists('unmet_gates', $data) && $data['unmet_gates'] === null) {
            $object->setUnmetGates(null);
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
        if ($data->isInitialized('unmetGates') && null !== $data->getUnmetGates()) {
            $values_2 = [];
            foreach ($data->getUnmetGates() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $dataArray['unmet_gates'] = $values_2;
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\ErrorBody::class => false];
    }
}
