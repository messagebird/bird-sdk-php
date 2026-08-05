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
class AudienceMemberNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AudienceMember::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AudienceMember::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AudienceMember();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('contact', $data) && $data['contact'] !== null) {
            $object->setContact($this->denormalizer->denormalize($data['contact'], \MessageBird\Wire\Model\Contact::class, 'json', $context));
        }
        elseif (\array_key_exists('contact', $data) && $data['contact'] === null) {
            $object->setContact(null);
        }
        if (\array_key_exists('joined_at', $data) && $data['joined_at'] !== null) {
            $object->setJoinedAt(new \DateTime($data['joined_at']));
        }
        elseif (\array_key_exists('joined_at', $data) && $data['joined_at'] === null) {
            $object->setJoinedAt(null);
        }
        if (\array_key_exists('audiences', $data) && $data['audiences'] !== null) {
            $values = [];
            foreach ($data['audiences'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\AudienceRef::class, 'json', $context);
            }
            $object->setAudiences($values);
        }
        elseif (\array_key_exists('audiences', $data) && $data['audiences'] === null) {
            $object->setAudiences(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['contact'] = $this->normalizer->normalize($data->getContact(), 'json', $context);
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AudienceMember::class => false];
    }
}
