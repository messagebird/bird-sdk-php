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
class WebhookTestResponseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WebhookTestResponse::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WebhookTestResponse::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WebhookTestResponse();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('response_status_code', $data) && $data['response_status_code'] !== null) {
            $object->setResponseStatusCode($data['response_status_code']);
        }
        elseif (\array_key_exists('response_status_code', $data) && $data['response_status_code'] === null) {
            $object->setResponseStatusCode(null);
        }
        if (\array_key_exists('response_body', $data) && $data['response_body'] !== null) {
            $object->setResponseBody($data['response_body']);
        }
        elseif (\array_key_exists('response_body', $data) && $data['response_body'] === null) {
            $object->setResponseBody(null);
        }
        if (\array_key_exists('response_duration_ms', $data) && $data['response_duration_ms'] !== null) {
            $object->setResponseDurationMs($data['response_duration_ms']);
        }
        elseif (\array_key_exists('response_duration_ms', $data) && $data['response_duration_ms'] === null) {
            $object->setResponseDurationMs(null);
        }
        if (\array_key_exists('event_payload', $data) && $data['event_payload'] !== null) {
            $object->setEventPayload($data['event_payload']);
        }
        elseif (\array_key_exists('event_payload', $data) && $data['event_payload'] === null) {
            $object->setEventPayload(null);
        }
        if (\array_key_exists('error', $data) && $data['error'] !== null) {
            $object->setError($data['error']);
        }
        elseif (\array_key_exists('error', $data) && $data['error'] === null) {
            $object->setError(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['status'] = $data->getStatus();
        $dataArray['response_status_code'] = $data->getResponseStatusCode();
        if ($data->isInitialized('responseBody') && null !== $data->getResponseBody()) {
            $dataArray['response_body'] = $data->getResponseBody();
        }
        $dataArray['response_duration_ms'] = $data->getResponseDurationMs();
        if ($data->isInitialized('eventPayload') && null !== $data->getEventPayload()) {
            $dataArray['event_payload'] = $data->getEventPayload();
        }
        if ($data->isInitialized('error') && null !== $data->getError()) {
            $dataArray['error'] = $data->getError();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WebhookTestResponse::class => false];
    }
}
