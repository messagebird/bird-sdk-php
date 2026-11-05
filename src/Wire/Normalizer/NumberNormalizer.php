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
class NumberNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\Number::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\Number::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\Number();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('reference', $data) && $data['reference'] !== null) {
            $object->setReference($data['reference']);
        }
        elseif (\array_key_exists('reference', $data) && $data['reference'] === null) {
            $object->setReference(null);
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('kind', $data) && $data['kind'] !== null) {
            $object->setKind($data['kind']);
        }
        elseif (\array_key_exists('kind', $data) && $data['kind'] === null) {
            $object->setKind(null);
        }
        if (\array_key_exists('number', $data) && $data['number'] !== null) {
            $object->setNumber($data['number']);
        }
        elseif (\array_key_exists('number', $data) && $data['number'] === null) {
            $object->setNumber(null);
        }
        if (\array_key_exists('country_code', $data) && $data['country_code'] !== null) {
            $object->setCountryCode($data['country_code']);
        }
        elseif (\array_key_exists('country_code', $data) && $data['country_code'] === null) {
            $object->setCountryCode(null);
        }
        if (\array_key_exists('number_type', $data) && $data['number_type'] !== null) {
            $object->setNumberType($data['number_type']);
        }
        elseif (\array_key_exists('number_type', $data) && $data['number_type'] === null) {
            $object->setNumberType(null);
        }
        if (\array_key_exists('capabilities', $data) && $data['capabilities'] !== null) {
            $values = [];
            foreach ($data['capabilities'] as $value) {
                $values[] = $value;
            }
            $object->setCapabilities($values);
        }
        elseif (\array_key_exists('capabilities', $data) && $data['capabilities'] === null) {
            $object->setCapabilities(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('allocated_at', $data) && $data['allocated_at'] !== null) {
            $object->setAllocatedAt(new \DateTime($data['allocated_at']));
        }
        elseif (\array_key_exists('allocated_at', $data) && $data['allocated_at'] === null) {
            $object->setAllocatedAt(null);
        }
        if (\array_key_exists('releases_at', $data) && $data['releases_at'] !== null) {
            $object->setReleasesAt(new \DateTime($data['releases_at']));
        }
        elseif (\array_key_exists('releases_at', $data) && $data['releases_at'] === null) {
            $object->setReleasesAt(null);
        }
        if (\array_key_exists('released_at', $data) && $data['released_at'] !== null) {
            $object->setReleasedAt(new \DateTime($data['released_at']));
        }
        elseif (\array_key_exists('released_at', $data) && $data['released_at'] === null) {
            $object->setReleasedAt(null);
        }
        if (\array_key_exists('ownership', $data) && $data['ownership'] !== null) {
            $object->setOwnership($this->denormalizer->denormalize($data['ownership'], \MessageBird\Wire\Model\NumberOwnership::class, 'json', $context));
        }
        elseif (\array_key_exists('ownership', $data) && $data['ownership'] === null) {
            $object->setOwnership(null);
        }
        if (\array_key_exists('pricing', $data) && $data['pricing'] !== null) {
            $object->setPricing($this->denormalizer->denormalize($data['pricing'], \MessageBird\Wire\Model\NumberPricing::class, 'json', $context));
        }
        elseif (\array_key_exists('pricing', $data) && $data['pricing'] === null) {
            $object->setPricing(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('name')) {
            throw new \MessageBird\Exception\RequestValidationException('required field Number.name missing');
        }
        $dataArray['name'] = $data->getName();
        if (!$data->isInitialized('reference')) {
            throw new \MessageBird\Exception\RequestValidationException('required field Number.reference missing');
        }
        $dataArray['reference'] = $data->getReference();
        if (!$data->isInitialized('id')) {
            throw new \MessageBird\Exception\RequestValidationException('required field Number.id missing');
        }
        $dataArray['id'] = $data->getId();
        if (!$data->isInitialized('kind')) {
            throw new \MessageBird\Exception\RequestValidationException('required field Number.kind missing');
        }
        $dataArray['kind'] = $data->getKind();
        if (!$data->isInitialized('number')) {
            throw new \MessageBird\Exception\RequestValidationException('required field Number.number missing');
        }
        $dataArray['number'] = $data->getNumber();
        if (!$data->isInitialized('countryCode')) {
            throw new \MessageBird\Exception\RequestValidationException('required field Number.country_code missing');
        }
        $dataArray['country_code'] = $data->getCountryCode();
        if (!$data->isInitialized('numberType')) {
            throw new \MessageBird\Exception\RequestValidationException('required field Number.number_type missing');
        }
        $dataArray['number_type'] = $data->getNumberType();
        if (!$data->isInitialized('capabilities')) {
            throw new \MessageBird\Exception\RequestValidationException('required field Number.capabilities missing');
        }
        $values = [];
        foreach ($data->getCapabilities() as $value) {
            $values[] = $value;
        }
        $dataArray['capabilities'] = $values;
        if (!$data->isInitialized('status')) {
            throw new \MessageBird\Exception\RequestValidationException('required field Number.status missing');
        }
        $dataArray['status'] = $data->getStatus();
        if (!$data->isInitialized('allocatedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field Number.allocated_at missing');
        }
        $dataArray['allocated_at'] = $data->getAllocatedAt()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('releasesAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field Number.releases_at missing');
        }
        $dataArray['releases_at'] = $data->getReleasesAt()?->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('releasedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field Number.released_at missing');
        }
        $dataArray['released_at'] = $data->getReleasedAt()?->format('Y-m-d\TH:i:sP');
        if ($data->isInitialized('ownership')) {
            $dataArray['ownership'] = $this->normalizer->normalize($data->getOwnership(), 'json', $context);
        }
        if (!$data->isInitialized('pricing')) {
            throw new \MessageBird\Exception\RequestValidationException('required field Number.pricing missing');
        }
        $dataArray['pricing'] = $this->normalizer->normalize($data->getPricing(), 'json', $context);
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\Number::class => false];
    }
}
