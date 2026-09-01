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
class WhatsAppContactCardSendNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppContactCardSend::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppContactCardSend::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppContactCardSend();
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
            $object->setName($this->denormalizer->denormalize($data['name'], \MessageBird\Wire\Model\WhatsAppContactCardSendName::class, 'json', $context));
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('org', $data) && $data['org'] !== null) {
            $object->setOrg($this->denormalizer->denormalize($data['org'], \MessageBird\Wire\Model\WhatsAppContactCardSendOrg::class, 'json', $context));
        }
        elseif (\array_key_exists('org', $data) && $data['org'] === null) {
            $object->setOrg(null);
        }
        if (\array_key_exists('birthday', $data) && $data['birthday'] !== null) {
            $object->setBirthday($data['birthday']);
        }
        elseif (\array_key_exists('birthday', $data) && $data['birthday'] === null) {
            $object->setBirthday(null);
        }
        if (\array_key_exists('phone_numbers', $data) && $data['phone_numbers'] !== null) {
            $values = [];
            foreach ($data['phone_numbers'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\WhatsAppContactPhoneSend::class, 'json', $context);
            }
            $object->setPhoneNumbers($values);
        }
        elseif (\array_key_exists('phone_numbers', $data) && $data['phone_numbers'] === null) {
            $object->setPhoneNumbers(null);
        }
        if (\array_key_exists('emails', $data) && $data['emails'] !== null) {
            $values_1 = [];
            foreach ($data['emails'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\WhatsAppContactEmailSend::class, 'json', $context);
            }
            $object->setEmails($values_1);
        }
        elseif (\array_key_exists('emails', $data) && $data['emails'] === null) {
            $object->setEmails(null);
        }
        if (\array_key_exists('urls', $data) && $data['urls'] !== null) {
            $values_2 = [];
            foreach ($data['urls'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \MessageBird\Wire\Model\WhatsAppContactUrlSend::class, 'json', $context);
            }
            $object->setUrls($values_2);
        }
        elseif (\array_key_exists('urls', $data) && $data['urls'] === null) {
            $object->setUrls(null);
        }
        if (\array_key_exists('addresses', $data) && $data['addresses'] !== null) {
            $values_3 = [];
            foreach ($data['addresses'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, \MessageBird\Wire\Model\WhatsAppContactAddressSend::class, 'json', $context);
            }
            $object->setAddresses($values_3);
        }
        elseif (\array_key_exists('addresses', $data) && $data['addresses'] === null) {
            $object->setAddresses(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['name'] = $this->normalizer->normalize($data->getName(), 'json', $context);
        if ($data->isInitialized('org') && null !== $data->getOrg()) {
            $dataArray['org'] = $this->normalizer->normalize($data->getOrg(), 'json', $context);
        }
        if ($data->isInitialized('birthday') && null !== $data->getBirthday()) {
            $dataArray['birthday'] = $data->getBirthday();
        }
        if ($data->isInitialized('phoneNumbers') && null !== $data->getPhoneNumbers()) {
            $values = [];
            foreach ($data->getPhoneNumbers() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['phone_numbers'] = $values;
        }
        if ($data->isInitialized('emails') && null !== $data->getEmails()) {
            $values_1 = [];
            foreach ($data->getEmails() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $dataArray['emails'] = $values_1;
        }
        if ($data->isInitialized('urls') && null !== $data->getUrls()) {
            $values_2 = [];
            foreach ($data->getUrls() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $dataArray['urls'] = $values_2;
        }
        if ($data->isInitialized('addresses') && null !== $data->getAddresses()) {
            $values_3 = [];
            foreach ($data->getAddresses() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $dataArray['addresses'] = $values_3;
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppContactCardSend::class => false];
    }
}
