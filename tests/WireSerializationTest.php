<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use MessageBird\Bird;
use MessageBird\Core\Serializer as CoreSerializer;
use MessageBird\Wire\Model\ContactUpdateRequest;
use MessageBird\Wire\Model\EmailAddress;
use MessageBird\Wire\Model\EmailMessageSendRequest;
use PHPUnit\Framework\Attributes\DataProvider;
use MessageBird\Wire\Normalizer\ContactUpdateRequestNormalizer;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

final class WireSerializationTest extends TestCase
{
    /**
     * The API stamps timestamps with fractional seconds
     * ("2026-08-04T07:58:52.99886Z"). jane generates
     * createFromFormat('Y-m-d\\TH:i:sP', ...) for a date-time, which returns FALSE
     * on those, and FALSE then hits a ?DateTime setter and fatals — so before
     * scripts/generate.sh rewrote the parse, the SDK could not deserialize a
     * single real response while every gate stayed green: the corpus used only
     * whole seconds, which the rigid format parses fine. The sms.get vector now
     * carries fractional seconds too, so the shared corpus covers this for every
     * SDK; this test keeps the boundary itself pinned per-form.
     */
    #[DataProvider('realWorldTimestamps')]
    public function testDeserializesTimestampsTheApiActuallySends(string $sent, string $expected): void
    {
        $message = (new CoreSerializer())->decode(
            json_encode(['id' => 'em_test', 'created_at' => $sent]),
            \MessageBird\Wire\Model\EmailMessage::class,
        );

        self::assertInstanceOf(\DateTime::class, $message->getCreatedAt());
        self::assertSame($expected, $message->getCreatedAt()->format('Y-m-d\TH:i:s.u'));
    }

    /**
     * @return iterable<string, array{string, string}>
     */
    public static function realWorldTimestamps(): iterable
    {
        yield 'fractional seconds (what the API sends)' => ['2026-08-04T07:58:52.99886Z', '2026-08-04T07:58:52.998860'];
        yield 'whole seconds (still valid RFC 3339)' => ['2026-07-08T12:00:00Z', '2026-07-08T12:00:00.000000'];
        yield 'numeric offset instead of Z' => ['2026-08-04T07:58:52+00:00', '2026-08-04T07:58:52.000000'];
    }

    /**
     * The generated normalizer must preserve missing != null != present:
     * a set value is emitted, an explicit null is emitted as a clear, and an
     * untouched field is omitted. This is the property the cross-surface
     * conformance corpus mutation-tests.
     */
    public function testNullableThreeWaySemantics(): void
    {
        $model = (new ContactUpdateRequest())
            ->setEmail('new@example.com')
            ->setFirstName(null);

        $serializer = new Serializer([new ContactUpdateRequestNormalizer()], [new JsonEncoder()]);
        $decoded = json_decode($serializer->serialize($model, 'json'), true);

        self::assertSame('new@example.com', $decoded['email']);
        self::assertArrayHasKey('first_name', $decoded);
        self::assertNull($decoded['first_name']);
        self::assertArrayNotHasKey('last_name', $decoded);
        self::assertArrayNotHasKey('external_id', $decoded);
    }

    /**
     * The core serializer encodes a top-level array of wire models as a JSON
     * list (each element normalized) — the shape a list-valued model field
     * (a batch envelope's messages) relies on.
     */
    public function testEncodesArrayBodyAsJsonList(): void
    {
        $batch = [
            (new ContactUpdateRequest())->setEmail('a@example.com'),
            (new ContactUpdateRequest())->setEmail('b@example.com'),
        ];

        $decoded = json_decode((new CoreSerializer())->encode($batch), true);

        self::assertCount(2, $decoded);
        self::assertSame('a@example.com', $decoded[0]['email']);
        self::assertSame('b@example.com', $decoded[1]['email']);
    }

    /**
     * A union body field (email from/to accepts a string or an address object)
     * is left unnormalized by jane, so the core serializer completes it: a string,
     * an ["email" => ..., "name" => ...] array, AND an EmailAddress model all
     * serialize to the same nested object. Before the fix the model form encoded
     * empty. Covers every form the email @example may use.
     *
     * @param mixed $from
     * @param mixed $to
     */
    #[DataProvider('addressForms')]
    public function testSerializesUnionAddressFieldForEveryForm($from, $to): void
    {
        $req = (new EmailMessageSendRequest())->setFrom($from)->setTo([$to]);

        $decoded = json_decode((new CoreSerializer())->encode($req), true);

        self::assertSame('onboarding@bird.com', $decoded['from']['email']);
        self::assertSame('Bird', $decoded['from']['name']);
        self::assertSame('jane@example.com', $decoded['to'][0]['email']);
    }

    /**
     * @return iterable<string, array{mixed, mixed}>
     */
    public static function addressForms(): iterable
    {
        yield 'array' => [
            ['email' => 'onboarding@bird.com', 'name' => 'Bird'],
            ['email' => 'jane@example.com'],
        ];
        yield 'model' => [
            (new EmailAddress())->setEmail('onboarding@bird.com')->setName('Bird'),
            (new EmailAddress())->setEmail('jane@example.com'),
        ];
    }

    public function testClientResolvesRegionAndDiscoversHttpClient(): void
    {
        $bird = new Bird('bk_eu1_test');

        self::assertSame('https://eu1.platform.bird.com', $bird->baseUrl());
        self::assertSame(Bird::class, $bird::class);
    }
}
