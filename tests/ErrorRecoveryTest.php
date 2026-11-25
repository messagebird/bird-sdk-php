<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Exception\ApiException;
use MessageBird\Wire\Model\ErrorBody;
use MessageBird\Wire\Model\ErrorDetail;
use MessageBird\Wire\Model\NextAction;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

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
        'rateLimit' => 'rateLimit',
        'quota' => 'quota',
        'param' => 'param',
        'details' => 'details',
    ];

    /**
     * Wire fields the facade does not carry yet. Shrink-only: a field here that
     * has since been surfaced fails the test, so the list cannot rot, and it
     * cannot grow without someone writing the name down. `requestId` is the one
     * worth taking next — it is what support asks a caller for.
     *
     * @var list<string>
     */
    private const NOT_YET_SURFACED = ['name', 'docUrl', 'requestId', 'vendorCode'];

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

    /** The refusing input pointer is read from the body and is absent when none was sent. */
    public function testFromResponseSurfacesRefusedParam(): void
    {
        $refused = ApiException::fromResponse(
            422,
            '{"error":{"type":"validation_error","code":"E04104","message":"parameter value cannot contain Liquid","param":"/template/parameter_overrides/fr/greeting"}}',
        );
        self::assertSame('E04104', $refused->errorCode);
        self::assertSame('/template/parameter_overrides/fr/greeting', $refused->param);

        self::assertNull(ApiException::fromResponse(422, '{"error":{"type":"validation_error","code":"E04104","message":"x"}}')->param);
        self::assertNull(ApiException::fromResponse(422, '{"error":{"type":"validation_error","code":"E04104","message":"x","param":123}}')->param);
    }

    /** The refusing quota limit is read from the body and is absent when none was sent. */
    public function testFromResponseSurfacesQuotaContext(): void
    {
        $refused = ApiException::fromResponse(422, '{"error":{"type":"validation_error","code":"E06009","message":"x","quota":{"quota_key":"webhook_subscriptions_max","scope":"workspace"}}}');
        self::assertNotNull($refused->quota);
        self::assertSame('webhook_subscriptions_max', $refused->quota->getQuotaKey());
        self::assertSame('workspace', $refused->quota->getScope());

        self::assertNull(ApiException::fromResponse(422, '{"error":{"type":"validation_error","code":"E06009","message":"x"}}')->quota);
    }

    /** E04072 history boundary details survive on ApiException so callers can retry from the returned date. */
    public function testByBrandHistoryUnavailableExposesFromBoundaryAndRetries(): void
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $responses = [
            $responseFactory->createResponse(422)->withBody($streamFactory->createStream(
                '{"error":{"type":"validation_error","code":"E04072","message":"Requested period starts before available email reporting history.","details":[{"param":"from","message":"Must be on or after 2026-09-23."}]}}',
            )),
            $responseFactory->createResponse(200)->withBody($streamFactory->createStream(
                '{"period":{"from":"2026-09-23","to":"2026-10-15","data_as_of":null},"data":[{"brand_id":"bnd_01krdgeqcxet5s7t44vh8rt9mg","delivery":{"processed":10,"delivered":10,"bounced":0,"bounces":{"hard":0,"soft":0,"admin":0,"block":0,"undetermined":0,"hard_rate":null,"soft_rate":null,"admin_rate":null,"block_rate":null,"undetermined_rate":null},"complained":0,"deferred":0,"rejected":0,"oob_bounces":0,"effective_delivered":10,"all_bounces":0,"oob_rate":0,"delivery_rate":1,"bounce_rate":0,"complaint_rate":0},"engagement":{"opens":2,"opens_non_prefetched":2,"unique_opens":2,"unique_opens_non_prefetched":2,"clicks":1,"unique_clicks":1,"unsubscribes":0,"open_rate":0.2,"click_rate":0.1,"unsubscribe_rate":0},"latency":{"processing":{"p50_ms":20,"p95_ms":40,"p99_ms":50},"delivery":{"p50_ms":null,"p95_ms":null,"p99_ms":null},"total":{"p50_ms":100,"p95_ms":150,"p99_ms":200}}}],"total":1,"next_cursor":null,"prev_cursor":null,"refresh_cursor":"ref"}',
            )),
        ];
        $requests = [];
        $http = new class ($responses, $requests) implements ClientInterface {
            /**
             * @param list<ResponseInterface> $responses
             * @param list<RequestInterface>  $requests
             */
            public function __construct(private array $responses, public array &$requests)
            {
            }

            public function sendRequest(RequestInterface $request): ResponseInterface
            {
                $this->requests[] = $request;
                $next = array_shift($this->responses);
                if (!$next instanceof ResponseInterface) {
                    throw new \RuntimeException('No queued response');
                }

                return $next;
            }
        };
        $bird = new Bird('bk_test', 'https://api.example.test', $http);

        $boundary = null;
        try {
            $bird->email->stats->byBrand(['from' => '2026-09-01', 'to' => '2026-10-15']);
            self::fail('Expected ApiException for E04072');
        } catch (ApiException $e) {
            self::assertSame('E04072', $e->errorCode);
            self::assertCount(1, $e->details);
            self::assertInstanceOf(ErrorDetail::class, $e->details[0]);
            self::assertSame('from', $e->details[0]->getParam());
            self::assertSame('Must be on or after 2026-09-23.', $e->details[0]->getMessage());
            preg_match('/\d{4}-\d{2}-\d{2}/', (string) $e->details[0]->getMessage(), $m);
            $boundary = $m[0] ?? null;
        }

        self::assertSame('2026-09-23', $boundary);
        $recovered = $bird->email->stats->byBrand(['from' => $boundary, 'to' => '2026-10-15']);
        $rows = $recovered->getData() ?? [];
        self::assertCount(1, $rows);
        self::assertSame('bnd_01krdgeqcxet5s7t44vh8rt9mg', $rows[0]->getBrandId());
        self::assertCount(2, $requests);
        self::assertSame('from=2026-09-23&to=2026-10-15', $requests[1]->getUri()->getQuery());
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

    public function testFromResponseSurfacesTheRefusingRateLimit(): void
    {
        $body = '{"error":{"type":"rate_limit_error","code":"E01003","message":"x","rate_limit":{"policy_key":"email_send","scope":"workspace","window_seconds":60,"limit":300}}}';

        $e = ApiException::fromResponse(429, $body);

        self::assertNotNull($e->rateLimit);
        self::assertSame('email_send', $e->rateLimit->getPolicyKey());
        self::assertSame('workspace', $e->rateLimit->getScope());
        self::assertSame(60, $e->rateLimit->getWindowSeconds());
        self::assertSame(300, $e->rateLimit->getLimit());
        self::assertNull(ApiException::fromResponse(429, '{"error":{"type":"rate_limit_error","code":"E01003","message":"x"}}')->rateLimit);
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
