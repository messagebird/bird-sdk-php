<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use MessageBird\Core\Serializer;
use MessageBird\Wire\Model\AMBBusinessAccountSubmission;
use MessageBird\Wire\Model\AMBBusinessAccountSubmissionReadinessAttachment;
use MessageBird\Wire\Model\AMBBusinessAccountSubmissionUseCasesAttachment;
use MessageBird\Wire\Model\AMBBusinessAccountSubmissionVideoAttachment;
use MessageBird\Wire\Model\Attachment;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class SubmissionAttachmentsTest extends TestCase
{
    /**
     * @param class-string $wrapperClass
     */
    #[DataProvider('attachmentForms')]
    public function testAcceptedInputsPreserveValuesAndWireJson(string $field, string $wrapperClass, string $form): void
    {
        $serializer = new Serializer();
        $wire = [
            'id' => 'att_test',
            'filename' => 'evidence.pdf',
            'content_type' => 'application/pdf',
            'size_bytes' => 128,
            'status' => 'attached',
            'download_url' => 'https://example.com/evidence.pdf',
            'download_url_expires_at' => '2026-10-02T10:30:00Z',
            'expires_at' => null,
            'created_at' => '2026-10-01T10:30:00.123456Z',
            'updated_at' => '2026-10-01T10:30:00.123456Z',
        ];
        $value = match ($form) {
            'wrapper' => $serializer->denormalize($wire, $wrapperClass),
            'base' => $serializer->denormalize($wire, Attachment::class),
            'array' => $wire,
            'null' => null,
        };
        $suffix = str_replace(' ', '', ucwords(str_replace('_', ' ', $field)));
        $submission = (new AMBBusinessAccountSubmission())->setStatusReason('approved');
        $submission->{'set' . $suffix}($value);
        $attachment = $submission->{'get' . $suffix}();

        self::assertTrue($submission->isInitialized(lcfirst($suffix)));
        self::assertSame('{}', $serializer->encode($submission));
        $resumed = $serializer->denormalize([$field => $wire], AMBBusinessAccountSubmission::class);
        self::assertInstanceOf($wrapperClass, $resumed->{'get' . $suffix}());
        self::assertInstanceOf(Attachment::class, $resumed->{'get' . $suffix}());
        if ($form === 'null') {
            self::assertNull($attachment);
            $resumed = $serializer->denormalize([$field => null], AMBBusinessAccountSubmission::class);
            self::assertNull($resumed->{'get' . $suffix}());
            return;
        }

        self::assertInstanceOf($wrapperClass, $attachment);
        self::assertInstanceOf(Attachment::class, $attachment);
        $expected = $serializer->denormalize($wire, $wrapperClass);
        foreach ((new \ReflectionClass($expected))->getProperties() as $property) {
            $name = $property->getName();
            if ($name === 'initialized') {
                continue;
            }
            self::assertSame($expected->isInitialized($name), $attachment->isInitialized($name), $name);
            if ($expected->isInitialized($name)) {
                $getter = 'get' . ucfirst($name);
                self::assertEquals($expected->$getter(), $attachment->$getter(), $name);
                self::assertEquals($attachment->$getter(), $resumed->{'get' . $suffix}()->$getter(), $name);
            }
        }
        if ($form === 'wrapper') {
            self::assertSame($value, $attachment);
        }
    }

    /**
     * @return iterable<string, array{string, class-string, string}>
     */
    public static function attachmentForms(): iterable
    {
        $fields = [
            'readiness_attachment' => AMBBusinessAccountSubmissionReadinessAttachment::class,
            'use_cases_attachment' => AMBBusinessAccountSubmissionUseCasesAttachment::class,
            'video_attachment' => AMBBusinessAccountSubmissionVideoAttachment::class,
        ];
        foreach ($fields as $field => $class) {
            foreach (['wrapper', 'base', 'array', 'null'] as $form) {
                yield $field . ' ' . $form => [$field, $class, $form];
            }
        }
    }
}
