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
class PhoneNumberLookupNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\PhoneNumberLookup::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\PhoneNumberLookup::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\PhoneNumberLookup();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('phone_number', $data) && $data['phone_number'] !== null) {
            $object->setPhoneNumber($data['phone_number']);
        }
        elseif (\array_key_exists('phone_number', $data) && $data['phone_number'] === null) {
            $object->setPhoneNumber(null);
        }
        if (\array_key_exists('country_code', $data) && $data['country_code'] !== null) {
            $object->setCountryCode($data['country_code']);
        }
        elseif (\array_key_exists('country_code', $data) && $data['country_code'] === null) {
            $object->setCountryCode(null);
        }
        if (\array_key_exists('network_info', $data) && $data['network_info'] !== null) {
            $object->setNetworkInfo($this->denormalizer->denormalize($data['network_info'], \MessageBird\Wire\Model\PhoneNumberLookupNetworkInfo::class, 'json', $context));
        }
        elseif (\array_key_exists('network_info', $data) && $data['network_info'] === null) {
            $object->setNetworkInfo(null);
        }
        if (\array_key_exists('original_network_info', $data) && $data['original_network_info'] !== null) {
            $object->setOriginalNetworkInfo($this->denormalizer->denormalize($data['original_network_info'], \MessageBird\Wire\Model\PhoneNumberLookupOriginalNetworkInfo::class, 'json', $context));
        }
        elseif (\array_key_exists('original_network_info', $data) && $data['original_network_info'] === null) {
            $object->setOriginalNetworkInfo(null);
        }
        if (\array_key_exists('flags', $data) && $data['flags'] !== null) {
            $values = [];
            foreach ($data['flags'] as $value) {
                $values[] = $value;
            }
            $object->setFlags($values);
        }
        elseif (\array_key_exists('flags', $data) && $data['flags'] === null) {
            $object->setFlags(null);
        }
        if (\array_key_exists('line_type', $data) && $data['line_type'] !== null) {
            $object->setLineType($data['line_type']);
        }
        elseif (\array_key_exists('line_type', $data) && $data['line_type'] === null) {
            $object->setLineType(null);
        }
        if (\array_key_exists('classification', $data) && $data['classification'] !== null) {
            $object->setClassification($this->denormalizer->denormalize($data['classification'], \MessageBird\Wire\Model\PhoneNumberLookupClassification::class, 'json', $context));
        }
        elseif (\array_key_exists('classification', $data) && $data['classification'] === null) {
            $object->setClassification(null);
        }
        if (\array_key_exists('presence', $data) && $data['presence'] !== null) {
            $object->setPresence($this->denormalizer->denormalize($data['presence'], \MessageBird\Wire\Model\PhoneNumberLookupPresence::class, 'json', $context));
        }
        elseif (\array_key_exists('presence', $data) && $data['presence'] === null) {
            $object->setPresence(null);
        }
        if (\array_key_exists('roaming', $data) && $data['roaming'] !== null) {
            $object->setRoaming($this->denormalizer->denormalize($data['roaming'], \MessageBird\Wire\Model\PhoneNumberLookupRoaming::class, 'json', $context));
        }
        elseif (\array_key_exists('roaming', $data) && $data['roaming'] === null) {
            $object->setRoaming(null);
        }
        if (\array_key_exists('sim_swap', $data) && $data['sim_swap'] !== null) {
            $object->setSimSwap($this->denormalizer->denormalize($data['sim_swap'], \MessageBird\Wire\Model\PhoneNumberLookupSimSwap::class, 'json', $context));
        }
        elseif (\array_key_exists('sim_swap', $data) && $data['sim_swap'] === null) {
            $object->setSimSwap(null);
        }
        if (\array_key_exists('porting', $data) && $data['porting'] !== null) {
            $object->setPorting($this->denormalizer->denormalize($data['porting'], \MessageBird\Wire\Model\PhoneNumberLookupPorting::class, 'json', $context));
        }
        elseif (\array_key_exists('porting', $data) && $data['porting'] === null) {
            $object->setPorting(null);
        }
        if (\array_key_exists('score', $data) && $data['score'] !== null) {
            $object->setScore($this->denormalizer->denormalize($data['score'], \MessageBird\Wire\Model\PhoneNumberLookupScore::class, 'json', $context));
        }
        elseif (\array_key_exists('score', $data) && $data['score'] === null) {
            $object->setScore(null);
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
        return [\MessageBird\Wire\Model\PhoneNumberLookup::class => false];
    }
}
