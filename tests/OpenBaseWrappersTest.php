<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use MessageBird\Core\Serializer;
use MessageBird\Wire\Model\WhatsAppDocument;
use MessageBird\Wire\Model\WhatsAppImage;
use MessageBird\Wire\Model\WhatsAppMessage;
use MessageBird\Wire\Model\WhatsAppMessageDocument;
use MessageBird\Wire\Model\WhatsAppMessageImage;
use MessageBird\Wire\Model\WhatsAppMessageSticker;
use MessageBird\Wire\Model\WhatsAppSticker;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class OpenBaseWrappersTest extends TestCase
{
    /**
     * @param class-string $baseClass
     * @param class-string $wrapperClass
     * @param array<string, mixed> $fields
     */
    #[DataProvider('mediaForms')]
    public function testGeneratedOpenBaseFieldsAndExtraPropertiesRoundTrip(string $field, string $baseClass, string $wrapperClass, array $fields, string $form): void
    {
        $serializer = new Serializer();
        $wire = [
            'url' => 'https://example.com/media',
            'mime_type' => null,
            ...$fields,
            'extra_metadata' => ['nested' => ['retained' => true], 'empty' => null],
            'extra_null' => null,
        ];
        $base = $serializer->denormalize($wire, $baseClass);
        $value = match ($form) {
            'wrapper' => $serializer->denormalize($wire, $wrapperClass),
            'base' => $base,
            'array' => $wire,
        };
        $suffix = ucfirst($field);
        $message = new WhatsAppMessage();
        $message->{'set' . $suffix}($value);
        $wrapper = $message->{'get' . $suffix}();

        self::assertInstanceOf($wrapperClass, $wrapper);
        self::assertInstanceOf($baseClass, $wrapper);
        self::assertInstanceOf(\ArrayObject::class, $wrapper);
        self::assertTrue($message->isInitialized($field));
        self::assertFalse($wrapper->isInitialized('id'));
        foreach (['url' => 'url', 'mime_type' => 'mimeType', 'caption' => 'caption', 'filename' => 'filename', 'animated' => 'animated'] as $key => $property) {
            if (!array_key_exists($key, $wire)) {
                self::assertFalse($wrapper->isInitialized($property), $property);
                continue;
            }
            self::assertTrue($wrapper->isInitialized($property), $property);
            self::assertSame($wire[$key], $wrapper->{'get' . ucfirst($property)}(), $property);
        }
        self::assertSame($wire['extra_metadata'], $wrapper['extra_metadata']);
        self::assertArrayHasKey('extra_null', $wrapper->getArrayCopy());
        self::assertNull($wrapper['extra_null']);
        self::assertSame($base->getArrayCopy(), $wrapper->getArrayCopy());
        if ($form === 'wrapper') {
            self::assertSame($value, $wrapper);
        }

        $encoded = $serializer->encode($wrapper);
        self::assertJsonStringEqualsJsonString(json_encode($wire, JSON_THROW_ON_ERROR), $encoded);
        self::assertSame($serializer->encode($base), $encoded);
        $decoded = $serializer->decode($encoded, $wrapperClass);
        self::assertSame($encoded, $serializer->encode($decoded));
        self::assertTrue($decoded->isInitialized('mimeType'));
        self::assertNull($decoded->getMimeType());
        self::assertFalse($decoded->isInitialized('id'));
        self::assertSame($wrapper->getArrayCopy(), $decoded->getArrayCopy());

        $message->{'set' . $suffix}(null);
        self::assertTrue($message->isInitialized($field));
        self::assertNull($message->{'get' . $suffix}());
    }

    /**
     * @return iterable<string, array{string, class-string, class-string, array<string, mixed>, string}>
     */
    public static function mediaForms(): iterable
    {
        $models = [
            'document' => [WhatsAppDocument::class, WhatsAppMessageDocument::class, ['caption' => null, 'filename' => 'invoice.pdf']],
            'image' => [WhatsAppImage::class, WhatsAppMessageImage::class, ['caption' => null]],
            'sticker' => [WhatsAppSticker::class, WhatsAppMessageSticker::class, ['animated' => false]],
        ];
        foreach ($models as $field => [$base, $wrapper, $fields]) {
            foreach (['wrapper', 'base', 'array'] as $form) {
                yield $field . ' ' . $form => [$field, $base, $wrapper, $fields, $form];
            }
        }
    }
}
