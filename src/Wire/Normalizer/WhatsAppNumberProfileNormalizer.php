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
class WhatsAppNumberProfileNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppNumberProfile::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppNumberProfile::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppNumberProfile();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('display_name', $data) && $data['display_name'] !== null) {
            $object->setDisplayName($data['display_name']);
        }
        elseif (\array_key_exists('display_name', $data) && $data['display_name'] === null) {
            $object->setDisplayName(null);
        }
        if (\array_key_exists('display_name_status', $data) && $data['display_name_status'] !== null) {
            $object->setDisplayNameStatus($data['display_name_status']);
        }
        elseif (\array_key_exists('display_name_status', $data) && $data['display_name_status'] === null) {
            $object->setDisplayNameStatus(null);
        }
        if (\array_key_exists('new_display_name', $data) && $data['new_display_name'] !== null) {
            $object->setNewDisplayName($data['new_display_name']);
        }
        elseif (\array_key_exists('new_display_name', $data) && $data['new_display_name'] === null) {
            $object->setNewDisplayName(null);
        }
        if (\array_key_exists('new_display_name_status', $data) && $data['new_display_name_status'] !== null) {
            $object->setNewDisplayNameStatus($data['new_display_name_status']);
        }
        elseif (\array_key_exists('new_display_name_status', $data) && $data['new_display_name_status'] === null) {
            $object->setNewDisplayNameStatus(null);
        }
        if (\array_key_exists('username', $data) && $data['username'] !== null) {
            $object->setUsername($data['username']);
        }
        elseif (\array_key_exists('username', $data) && $data['username'] === null) {
            $object->setUsername(null);
        }
        if (\array_key_exists('username_status', $data) && $data['username_status'] !== null) {
            $object->setUsernameStatus($data['username_status']);
        }
        elseif (\array_key_exists('username_status', $data) && $data['username_status'] === null) {
            $object->setUsernameStatus(null);
        }
        if (\array_key_exists('about', $data) && $data['about'] !== null) {
            $object->setAbout($data['about']);
        }
        elseif (\array_key_exists('about', $data) && $data['about'] === null) {
            $object->setAbout(null);
        }
        if (\array_key_exists('address', $data) && $data['address'] !== null) {
            $object->setAddress($data['address']);
        }
        elseif (\array_key_exists('address', $data) && $data['address'] === null) {
            $object->setAddress(null);
        }
        if (\array_key_exists('description', $data) && $data['description'] !== null) {
            $object->setDescription($data['description']);
        }
        elseif (\array_key_exists('description', $data) && $data['description'] === null) {
            $object->setDescription(null);
        }
        if (\array_key_exists('email', $data) && $data['email'] !== null) {
            $object->setEmail($data['email']);
        }
        elseif (\array_key_exists('email', $data) && $data['email'] === null) {
            $object->setEmail(null);
        }
        if (\array_key_exists('vertical', $data) && $data['vertical'] !== null) {
            $object->setVertical($data['vertical']);
        }
        elseif (\array_key_exists('vertical', $data) && $data['vertical'] === null) {
            $object->setVertical(null);
        }
        if (\array_key_exists('websites', $data) && $data['websites'] !== null) {
            $values = [];
            foreach ($data['websites'] as $value) {
                $values[] = $value;
            }
            $object->setWebsites($values);
        }
        elseif (\array_key_exists('websites', $data) && $data['websites'] === null) {
            $object->setWebsites(null);
        }
        if (\array_key_exists('profile_picture_url', $data) && $data['profile_picture_url'] !== null) {
            $object->setProfilePictureUrl($data['profile_picture_url']);
        }
        elseif (\array_key_exists('profile_picture_url', $data) && $data['profile_picture_url'] === null) {
            $object->setProfilePictureUrl(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('about') && null !== $data->getAbout()) {
            $dataArray['about'] = $data->getAbout();
        }
        if ($data->isInitialized('address') && null !== $data->getAddress()) {
            $dataArray['address'] = $data->getAddress();
        }
        if ($data->isInitialized('description') && null !== $data->getDescription()) {
            $dataArray['description'] = $data->getDescription();
        }
        if ($data->isInitialized('email') && null !== $data->getEmail()) {
            $dataArray['email'] = $data->getEmail();
        }
        if ($data->isInitialized('vertical') && null !== $data->getVertical()) {
            $dataArray['vertical'] = $data->getVertical();
        }
        if ($data->isInitialized('websites') && null !== $data->getWebsites()) {
            $values = [];
            foreach ($data->getWebsites() as $value) {
                $values[] = $value;
            }
            $dataArray['websites'] = $values;
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppNumberProfile::class => false];
    }
}
