<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use MessageBird\Exception\ApiException;
use MessageBird\Wire\Model\ErrorBody;
use MessageBird\Wire\Model\NextAction;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class ErrorRecoveryTest extends TestCase
{
    /**
     * Each ErrorBody wire field → the ApiException property that surfaces it.
     *
     * @var array<string, string>
     */
    private const WIRE_TO_PROPERTY = [
        'type' => 'type',
        'code' => 'errorCode',
        'message' => 'message',
        'remediation' => 'remediation',
        'next' => 'next',
    ];

    /**
     * Wire fields the facade does not carry yet. Shrink-only: a field here that
     * has since been surfaced fails the test, so the list cannot rot, and it
     * cannot grow without someone writing the name down. `requestId` is the one
     * worth taking next — it is what support asks a caller for.
     *
     * @var list<string>
     */
    private const NOT_YET_SURFACED = ['name', 'param', 'docUrl', 'requestId', 'vendorCode', 'details'];

    /**
     * The guard that would have caught `next` never reaching a PHP caller at all:
     * the wire model is generated and complete, the facade is hand-written, and
     * nothing compared the two. The other SDKs each carry this same guard.
     */
    public function testEveryErrorBodyFieldIsSurfacedOrListed(): void
    {
        $facade = array_map(
            static fn (\ReflectionProperty $p): string => $p->getName(),
            (new \ReflectionClass(ApiException::class))->getProperties(),
        );

        foreach ($this->wireFields() as $field) {
            if (in_array($field, self::NOT_YET_SURFACED, true)) {
                self::assertArrayNotHasKey(
                    $field,
                    self::WIRE_TO_PROPERTY,
                    "wire field '{$field}' is both mapped and listed as unsurfaced — drop it from NOT_YET_SURFACED",
                );
                continue;
            }

            self::assertArrayHasKey(
                $field,
                self::WIRE_TO_PROPERTY,
                "ErrorBody wire field '{$field}' is unmapped in ApiException — surface it, or name it in NOT_YET_SURFACED",
            );
            self::assertContains(
                self::WIRE_TO_PROPERTY[$field],
                $facade,
                "ApiException is missing the property '" . self::WIRE_TO_PROPERTY[$field] . "' that surfaces '{$field}'",
            );
        }
    }

    /** A field named as unsurfaced must actually be a wire field, or the list is stale. */
    public function testUnsurfacedListNamesOnlyRealWireFields(): void
    {
        $wire = $this->wireFields();
        foreach (self::NOT_YET_SURFACED as $field) {
            self::assertContains($field, $wire, "'{$field}' is not an ErrorBody field — drop it from NOT_YET_SURFACED");
        }
    }

    public function testFromResponseSurfacesRecoverySteps(): void
    {
        $body = json_encode([
            'error' => [
                'type' => 'precondition_error',
                'code' => 'E01028',
                'message' => 'domain not verified',
                'remediation' => 'Publish the DKIM record, then verify the domain.',
                'next' => [
                    [
                        'kind' => 'operation',
                        'description' => 'Verify the domain',
                        'operation' => 'verifyDomain',
                        'params' => ['domain_id' => 'dom_123'],
                    ],
                    [
                        'kind' => 'external',
                        'description' => 'Publish the DKIM record at your DNS provider',
                        'url' => 'https://example.test/dns',
                    ],
                ],
            ],
        ], JSON_THROW_ON_ERROR);

        $e = ApiException::fromResponse(412, $body);

        self::assertSame('Publish the DKIM record, then verify the domain.', $e->remediation);
        self::assertCount(2, $e->next);

        [$op, $external] = $e->next;
        self::assertInstanceOf(NextAction::class, $op);
        self::assertSame('operation', $op->getKind());
        self::assertSame('verifyDomain', $op->getOperation());
        self::assertSame('dom_123', ($op->getParams() ?? new \ArrayObject())['domain_id'] ?? null);

        // A step that is not an operation carries none: the facade must not invent one.
        self::assertSame('external', $external->getKind());
        self::assertSame('https://example.test/dns', $external->getUrl());
        self::assertNull($external->getOperation());
    }

    /**
     * An unrecognised kind is display-only, not an error: it arrives verbatim with
     * its description so a caller can show it and offer no action.
     */
    public function testUnknownKindArrivesVerbatim(): void
    {
        $body = '{"error":{"type":"conflict_error","code":"E01028","message":"x","next":[{"kind":"teleport","description":"Something new"}]}}';

        $e = ApiException::fromResponse(409, $body);

        self::assertCount(1, $e->next);
        self::assertSame('teleport', $e->next[0]->getKind());
        self::assertSame('Something new', $e->next[0]->getDescription());
    }

    /**
     * @return list<array{string}>
     */
    public static function malformedRecoveryProvider(): array
    {
        return [
            'next null' => ['{"error":{"message":"x","next":null}}'],
            'next absent' => ['{"error":{"message":"x"}}'],
            'next not a list' => ['{"error":{"message":"x","next":"nope"}}'],
            'step not an object' => ['{"error":{"message":"x","next":["nope",7]}}'],
            'body not json' => ['<html>502 Bad Gateway</html>'],
        ];
    }

    /**
     * An error response must always arrive as its own error. A recovery payload the
     * server should never send must not turn a 409 into a parse failure.
     */
    #[DataProvider('malformedRecoveryProvider')]
    public function testMalformedRecoveryDegradesToEmpty(string $body): void
    {
        $e = ApiException::fromResponse(409, $body);

        self::assertSame([], $e->next);
    }

    /**
     * @return list<string>
     */
    private function wireFields(): array
    {
        return array_values(array_filter(array_map(
            static fn (\ReflectionProperty $p): string => $p->getName(),
            (new \ReflectionClass(ErrorBody::class))->getProperties(),
        ), static fn (string $name): bool => $name !== 'initialized'));
    }
}
