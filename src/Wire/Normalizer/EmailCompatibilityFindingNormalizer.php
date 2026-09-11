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
class EmailCompatibilityFindingNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailCompatibilityFinding::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailCompatibilityFinding::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailCompatibilityFinding();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('rule_id', $data) && $data['rule_id'] !== null) {
            $object->setRuleId($data['rule_id']);
        }
        elseif (\array_key_exists('rule_id', $data) && $data['rule_id'] === null) {
            $object->setRuleId(null);
        }
        if (\array_key_exists('severity', $data) && $data['severity'] !== null) {
            $object->setSeverity($data['severity']);
        }
        elseif (\array_key_exists('severity', $data) && $data['severity'] === null) {
            $object->setSeverity(null);
        }
        if (\array_key_exists('language', $data) && $data['language'] !== null) {
            $object->setLanguage($data['language']);
        }
        elseif (\array_key_exists('language', $data) && $data['language'] === null) {
            $object->setLanguage(null);
        }
        if (\array_key_exists('field', $data) && $data['field'] !== null) {
            $object->setField($data['field']);
        }
        elseif (\array_key_exists('field', $data) && $data['field'] === null) {
            $object->setField(null);
        }
        if (\array_key_exists('message', $data) && $data['message'] !== null) {
            $object->setMessage($data['message']);
        }
        elseif (\array_key_exists('message', $data) && $data['message'] === null) {
            $object->setMessage(null);
        }
        if (\array_key_exists('fix', $data) && $data['fix'] !== null) {
            $object->setFix($data['fix']);
        }
        elseif (\array_key_exists('fix', $data) && $data['fix'] === null) {
            $object->setFix(null);
        }
        if (\array_key_exists('partial', $data) && $data['partial'] !== null) {
            $object->setPartial($data['partial']);
        }
        elseif (\array_key_exists('partial', $data) && $data['partial'] === null) {
            $object->setPartial(null);
        }
        if (\array_key_exists('line', $data) && $data['line'] !== null) {
            $object->setLine($data['line']);
        }
        elseif (\array_key_exists('line', $data) && $data['line'] === null) {
            $object->setLine(null);
        }
        if (\array_key_exists('column', $data) && $data['column'] !== null) {
            $object->setColumn($data['column']);
        }
        elseif (\array_key_exists('column', $data) && $data['column'] === null) {
            $object->setColumn(null);
        }
        if (\array_key_exists('match', $data) && $data['match'] !== null) {
            $object->setMatch($data['match']);
        }
        elseif (\array_key_exists('match', $data) && $data['match'] === null) {
            $object->setMatch(null);
        }
        if (\array_key_exists('unsupported_clients', $data) && $data['unsupported_clients'] !== null) {
            $values = [];
            foreach ($data['unsupported_clients'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\EmailClientSupport::class, 'json', $context);
            }
            $object->setUnsupportedClients($values);
        }
        elseif (\array_key_exists('unsupported_clients', $data) && $data['unsupported_clients'] === null) {
            $object->setUnsupportedClients(null);
        }
        if (\array_key_exists('partial_clients', $data) && $data['partial_clients'] !== null) {
            $values_1 = [];
            foreach ($data['partial_clients'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\EmailClientSupport::class, 'json', $context);
            }
            $object->setPartialClients($values_1);
        }
        elseif (\array_key_exists('partial_clients', $data) && $data['partial_clients'] === null) {
            $object->setPartialClients(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailCompatibilityFinding::class => false];
    }
}
