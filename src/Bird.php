<?php

declare(strict_types=1);

namespace MessageBird;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use MessageBird\Core\Serializer;
use MessageBird\Exception\ApiException;
use MessageBird\Exception\ConnectionException;
use MessageBird\Resources\Audiences;
use MessageBird\Resources\ContactProperties;
use MessageBird\Resources\Contacts;
use MessageBird\Resources\Domains;
use MessageBird\Resources\Email;
use MessageBird\Resources\Realtime;
use MessageBird\Resources\Sms;
use MessageBird\Resources\SmsTemplates;
use MessageBird\Resources\Verify;
use MessageBird\Resources\Whatsapp;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * The Bird API client.
 *
 * The hand-written request core: builds and sends a request, stamps
 * auth/idempotency, guards that the path stays on the configured origin,
 * retries transient failures with jittered backoff honoring `Retry-After`, and
 * (de)serializes through the generated wire layer. A per-attempt timeout is the
 * injected PSR-18 client's responsibility: PSR-18 has no portable per-request
 * timeout, so it is configured on the transport, not here.
 */
final class Bird
{
    private const DEFAULT_MAX_RETRIES = 2;
    private const INITIAL_RETRY_DELAY = 0.5;
    private const MAX_RETRY_DELAY = 8.0;

    private readonly ClientInterface $httpClient;
    private readonly RequestFactoryInterface $requestFactory;
    private readonly StreamFactoryInterface $streamFactory;
    private readonly Serializer $serializer;
    /** @var array<string, array{0: string, 1: ?string, 2: string}> */
    private array $credentials = [];
    private readonly string $baseUrl;
    public readonly ?EmailDefaults $emailDefaults;
    private readonly int $maxRetries;

    public readonly Contacts $contacts;
    public readonly ContactProperties $contactProperties;
    public readonly Audiences $audiences;
    public readonly Domains $domains;
    public readonly Email $email;
    public readonly Sms $sms;
    public readonly SmsTemplates $smsTemplates;
    public readonly Whatsapp $whatsapp;
    public readonly Verify $verify;
    public readonly Webhooks $webhooks;
    public readonly Realtime $realtime;

    /**
     * $region resolves the endpoint when $baseUrl is not given; it sits after
     * $httpClient so the transport-injection seam the conformance driver binds
     * to keeps its position. A key without a `bk_{region}_` prefix needs an
     * explicit $region or $baseUrl. $email carries channel-level send defaults;
     * $webhookSecret is the signing secret `$bird->webhooks->unwrap()` verifies with.
     */
    public function __construct(
        #[\SensitiveParameter] private readonly string $apiKey,
        ?string $baseUrl = null,
        ?ClientInterface $httpClient = null,
        ?string $region = null,
        ?EmailDefaults $email = null,
        int $maxRetries = self::DEFAULT_MAX_RETRIES,
        #[\SensitiveParameter] ?string $webhookSecret = null,
        ?RealtimeOptions $realtime = null,
    ) {
        $this->emailDefaults = $email;
        $this->webhooks = new Webhooks($webhookSecret);
        $this->baseUrl = rtrim(self::resolveBaseUrl($apiKey, $baseUrl, $region), '/');
        $this->maxRetries = $maxRetries;
        $this->httpClient = $httpClient ?? Psr18ClientDiscovery::find();
        $this->requestFactory = Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $this->serializer = new Serializer();

        $this->contacts = new Contacts($this);
        $this->contactProperties = new ContactProperties($this);
        $this->audiences = new Audiences($this);
        $this->domains = new Domains($this);
        $this->email = new Email($this);
        $this->sms = new Sms($this);
        $this->smsTemplates = new SmsTemplates($this);
        $this->whatsapp = new Whatsapp($this);
        $this->verify = new Verify($this);
        // Extra credentials some operations require, keyed by the security scheme that
        // names them: [header, value, how-to-supply]. A generated method names its
        // schemes; this client resolves them.
        $this->credentials = [
            'RealtimeKey' => ['X-Realtime-Key', $realtime?->key, 'pass realtime: new RealtimeOptions(key: ..., secret: ...) to the Bird constructor'],
            'RealtimeSecret' => ['X-Realtime-Secret', $realtime?->secret, 'pass realtime: new RealtimeOptions(key: ..., secret: ...) to the Bird constructor'],
        ];
        $this->realtime = new Realtime($this);
    }

    public function baseUrl(): string
    {
        return $this->baseUrl;
    }

    public function version(): string
    {
        return Version::VERSION;
    }

    /**
     * Escape hatch — GET an arbitrary Bird API path not on the typed facade.
     *
     * The long tail of endpoints. $path is an absolute path on the configured
     * origin (a single leading slash); a path that would move the request, and
     * its bearer token, off-origin is rejected before the key is attached. Pass
     * $responseClass to decode into a wire model, or leave it null for the
     * decoded JSON.
     *
     * @template T of object
     *
     * @param class-string<T>|null      $responseClass
     * @param array<string, mixed>|null $query
     *
     * @return ($responseClass is null ? mixed : T)
     */
    public function get(string $path, ?string $responseClass = null, ?array $query = null, ?RequestOptions $options = null): mixed
    {
        return $this->escape('GET', $path, null, $responseClass, $query, $options);
    }

    /**
     * Escape hatch — POST an arbitrary Bird API path. See {@see get()}.
     *
     * @template T of object
     *
     * @param object|array<mixed>|null  $body
     * @param class-string<T>|null      $responseClass
     * @param array<string, mixed>|null $query
     *
     * @return ($responseClass is null ? mixed : T)
     */
    public function post(string $path, object|array|null $body = null, ?string $responseClass = null, ?array $query = null, ?RequestOptions $options = null): mixed
    {
        return $this->escape('POST', $path, $body, $responseClass, $query, $options);
    }

    /**
     * Escape hatch — PUT an arbitrary Bird API path. See {@see get()}.
     *
     * @template T of object
     *
     * @param object|array<mixed>|null  $body
     * @param class-string<T>|null      $responseClass
     * @param array<string, mixed>|null $query
     *
     * @return ($responseClass is null ? mixed : T)
     */
    public function put(string $path, object|array|null $body = null, ?string $responseClass = null, ?array $query = null, ?RequestOptions $options = null): mixed
    {
        return $this->escape('PUT', $path, $body, $responseClass, $query, $options);
    }

    /**
     * Escape hatch — PATCH an arbitrary Bird API path. See {@see get()}.
     *
     * @template T of object
     *
     * @param object|array<mixed>|null  $body
     * @param class-string<T>|null      $responseClass
     * @param array<string, mixed>|null $query
     *
     * @return ($responseClass is null ? mixed : T)
     */
    public function patch(string $path, object|array|null $body = null, ?string $responseClass = null, ?array $query = null, ?RequestOptions $options = null): mixed
    {
        return $this->escape('PATCH', $path, $body, $responseClass, $query, $options);
    }

    /**
     * Escape hatch — DELETE an arbitrary Bird API path. See {@see get()}.
     *
     * @template T of object
     *
     * @param class-string<T>|null      $responseClass
     * @param array<string, mixed>|null $query
     *
     * @return ($responseClass is null ? mixed : T)
     */
    public function delete(string $path, ?string $responseClass = null, ?array $query = null, ?RequestOptions $options = null): mixed
    {
        return $this->escape('DELETE', $path, null, $responseClass, $query, $options);
    }

    /**
     * @template T of object
     *
     * @param object|array<mixed>|null  $body
     * @param class-string<T>|null      $responseClass
     * @param array<string, mixed>|null $query
     *
     * @return ($responseClass is null ? mixed : T)
     */
    private function escape(string $method, string $path, object|array|null $body, ?string $responseClass, ?array $query, ?RequestOptions $options): mixed
    {
        $response = $this->send($method, $path, $body, $query, $options);
        if ($responseClass !== null) {
            return $this->serializer->decode((string) $response->getBody(), $responseClass);
        }
        $raw = (string) $response->getBody();

        return $raw === '' ? null : json_decode($raw, true);
    }

    /**
     * Send one request and deserialize the response into $responseClass.
     *
     * @internal called by the resource facade, not part of the public surface
     *
     * @template T of object
     *
     * @param class-string<T> $responseClass
     * @param object|array<mixed>|null $body a wire model, or a list of them for a batch body
     * @param array<string, mixed>|null $query
     *
     * @return T
     * @param list<string>|null $schemes security schemes whose credentials this operation requires
     */
    public function dispatch(
        string $method,
        string $path,
        string $responseClass,
        object|array|null $body = null,
        ?array $query = null,
        ?RequestOptions $options = null,
        ?array $schemes = null,
    ): object {
        $response = $this->send($method, $path, $body, $query, $options, $schemes);

        return $this->serializer->decode((string) $response->getBody(), $responseClass);
    }

    /**
     * Send a request whose response body is discarded (a delete or a 204 write).
     *
     * @internal called by the resource facade, not part of the public surface
     *
     * @param object|array<mixed>|null $body a wire model, or a list of them for a batch body
     * @param array<string, mixed>|null $query
     * @param list<string>|null $schemes security schemes whose credentials this operation requires
     */
    public function dispatchVoid(
        string $method,
        string $path,
        object|array|null $body = null,
        ?array $query = null,
        ?RequestOptions $options = null,
        ?array $schemes = null,
    ): void {
        $this->send($method, $path, $body, $query, $options, $schemes);
    }

    /**
     * @param object|array<mixed>|null $body a wire model, or a list of them for a batch body
     * @param array<string, mixed>|null $query
     * @param list<string>|null $schemes security schemes whose credentials this operation requires
     */
    private function send(
        string $method,
        string $path,
        object|array|null $body,
        ?array $query,
        ?RequestOptions $options,
        ?array $schemes = null,
    ): ResponseInterface {
        $options ??= new RequestOptions();
        $this->validateRequestPath($path);

        // Built once so the idempotency key and body are byte-identical across
        // every attempt: a retried mutation never double-applies.
        $request = $this->buildRequest($method, $path, $body, $query, $options, $schemes);
        $retriesLeft = $options->maxRetries ?? $this->maxRetries;
        $attempt = 0;

        while (true) {
            $response = null;
            try {
                // PSR-18 does not require the client to rewind a consumed body,
                // so seek it home first or a retry re-sends an empty stream and
                // breaks the byte-identical-body invariant the key relies on.
                $requestBody = $request->getBody();
                if ($requestBody->isSeekable()) {
                    $requestBody->rewind();
                }
                $response = $this->httpClient->sendRequest($request);
            } catch (ClientExceptionInterface $e) {
                if ($retriesLeft <= 0) {
                    throw new ConnectionException('request transport failed: ' . $e->getMessage(), 0, $e);
                }
            }

            if ($response !== null) {
                $status = $response->getStatusCode();
                if ($status < 400) {
                    return $response;
                }
                if ($retriesLeft <= 0 || !self::isRetryable($status)) {
                    throw ApiException::fromResponse($status, (string) $response->getBody());
                }
                // Release the abandoned body before backing off: a streaming
                // client otherwise keeps the connection busy across the sleep.
                $response->getBody()->close();
            }

            usleep((int) (self::retryDelay($attempt, $response) * 1_000_000));
            --$retriesLeft;
            ++$attempt;
        }
    }

    /**
     * @param object|array<mixed>|null $body a wire model, or a list of them for a batch body
     * @param array<string, mixed>|null $query
     */
    /**
     * Resolve the credential headers an operation's security schemes require. Throws
     * before the request when one is unconfigured, so the failure names the fix
     * rather than surfacing as an opaque 401. A per-call RealtimeOptions in
     * $options overrides the client config, so one client can address several apps.
     *
     * @param list<string>|null $schemes security schemes whose credentials this operation requires
     *
     * @return array<string, string>
     */
    private function credentialHeaders(?array $schemes, RequestOptions $options): array
    {
        if ($schemes === null || $schemes === []) {
            return [];
        }
        $override = [
            'RealtimeKey' => $options->realtime?->key,
            'RealtimeSecret' => $options->realtime?->secret,
        ];
        $out = [];
        foreach ($schemes as $scheme) {
            if (!isset($this->credentials[$scheme])) {
                throw new \InvalidArgumentException(sprintf('Unknown credential scheme "%s".', $scheme));
            }
            [$header, $value, $how] = $this->credentials[$scheme];
            $resolved = $override[$scheme] ?? $value;
            if ($resolved === null || $resolved === '') {
                throw new \InvalidArgumentException(sprintf('%s is required for this operation: %s.', $header, $how));
            }
            $out[$header] = $resolved;
        }

        return $out;
    }

    /**
     * @param object|array<mixed>|null $body a wire model, or a list of them for a batch body
     * @param array<string, mixed>|null $query
     * @param list<string>|null $schemes security schemes whose credentials this operation requires
     */
    private function buildRequest(
        string $method,
        string $path,
        object|array|null $body,
        ?array $query,
        RequestOptions $options,
        ?array $schemes = null,
    ): RequestInterface {
        $url = $this->baseUrl . $path;
        if ($query !== null && $query !== []) {
            $queryString = self::encodeQuery($query);
            if ($queryString !== '') {
                $url .= '?' . $queryString;
            }
        }

        $request = $this->requestFactory->createRequest($method, $url);

        // Caller headers first, skipping reserved names: the SDK-owned headers
        // below are applied after, so they always win and a caller can never
        // move the bearer token or a telemetry label.
        foreach ($options->headers as $name => $value) {
            if (self::isReservedHeader($name)) {
                continue;
            }
            $request = $request->withHeader($name, $value);
        }

        $request = $request
            ->withHeader('Authorization', 'Bearer ' . $this->apiKey)
            ->withHeader('User-Agent', 'bird-sdk-php/' . Version::VERSION)
            ->withHeader('Bird-Surface', 'sdk-php')
            ->withHeader('Bird-Version', Version::VERSION)
            ->withHeader('Bird-Lang', 'php')
            ->withHeader('Accept', 'application/json');

        // The extra credentials this operation declares, on top of the bearer token.
        // Stamped here (not from the caller-header loop above, which skips them as
        // reserved) so they're authoritative, and resolved per operation so a
        // credential never rides on a request that does not require it.
        foreach ($this->credentialHeaders($schemes, $options) as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        // A mutation (including DELETE) carries one idempotency key so a retry
        // never double-applies.
        if (self::isMutation($method)) {
            $request = $request->withHeader(
                'Idempotency-Key',
                $options->idempotencyKey ?? self::newIdempotencyKey(),
            );
        }

        if ($body !== null) {
            $request = $request
                ->withHeader('Content-Type', 'application/json')
                ->withBody($this->streamFactory->createStream($this->serializer->encode($body)));
        }

        return $request;
    }

    /**
     * Reject a caller path that would move the request, and the bearer token,
     * off the configured origin: require a single leading slash and assert the
     * resolved scheme/host/port/userinfo equal the base URL's origin. Every
     * request joins base + path, so the check lives here rather than only on
     * the verb methods. See ../AGENTS.md.
     */
    private function validateRequestPath(string $path): void
    {
        if (!str_starts_with($path, '/') || str_starts_with($path, '//')) {
            throw new \InvalidArgumentException(
                sprintf('request path must be an absolute path starting with a single "/": got "%s"', $path),
            );
        }

        $base = parse_url($this->baseUrl);
        $full = parse_url($this->baseUrl . $path);
        if (!is_array($base) || !is_array($full)
            || ($full['scheme'] ?? null) !== ($base['scheme'] ?? null)
            || ($full['host'] ?? null) !== ($base['host'] ?? null)
            || ($full['port'] ?? null) !== ($base['port'] ?? null)
            || ($full['user'] ?? null) !== ($base['user'] ?? null)) {
            throw new \InvalidArgumentException(
                sprintf('request path "%s" must stay on the configured Bird API origin', $path),
            );
        }
    }

    /**
     * Encode query params, emitting an array value as a repeated key
     * (status=a&status=b) — the form the API reads. PHP's http_build_query would
     * emit status[0]=a, which the API does not recognise, so an array filter
     * would be silently dropped. A bool renders as true/false; null is omitted.
     *
     * @param array<string, mixed> $query
     */
    private static function encodeQuery(array $query): string
    {
        $pairs = [];
        foreach ($query as $key => $value) {
            foreach (is_array($value) ? $value : [$value] as $item) {
                if ($item === null) {
                    continue;
                }
                $scalar = is_bool($item) ? ($item ? 'true' : 'false') : $item;
                if (!is_scalar($scalar)) {
                    continue;
                }
                $pairs[] = rawurlencode((string) $key) . '=' . rawurlencode((string) $scalar);
            }
        }

        return implode('&', $pairs);
    }

    private static function isMutation(string $method): bool
    {
        return in_array(strtoupper($method), ['POST', 'PUT', 'PATCH', 'DELETE'], true);
    }

    private static function isRetryable(int $status): bool
    {
        // 409 is a semantic conflict a retry cannot resolve; 501 is not implemented.
        return $status === 429 || ($status >= 500 && $status < 600 && $status !== 501);
    }

    private static function retryDelay(int $attempt, ?ResponseInterface $response): float
    {
        if ($response !== null) {
            $advised = self::parseRetryAfter($response);
            if ($advised !== null) {
                return min($advised, self::MAX_RETRY_DELAY);
            }
        }

        $delay = min(self::INITIAL_RETRY_DELAY * (2 ** $attempt), self::MAX_RETRY_DELAY);

        return $delay * (1.0 + (mt_rand() / mt_getrandmax()) * 0.25);
    }

    /**
     * A `Retry-After` value as seconds — delta-seconds or an HTTP-date. A
     * negative or unparseable value returns null: a negative wait is meaningless.
     */
    private static function parseRetryAfter(ResponseInterface $response): ?float
    {
        $value = $response->getHeaderLine('Retry-After');
        if ($value === '') {
            return null;
        }
        if (preg_match('/^-?\d+$/', $value) === 1) {
            $seconds = (float) $value;
        } else {
            $when = strtotime($value);
            if ($when === false) {
                return null;
            }
            $seconds = (float) ($when - time());
        }

        // One non-negative rule for both forms, so a date whose delta is exactly
        // zero is honored like the delta-seconds `0` it means, and the two shapes
        // cannot drift apart again.
        return $seconds >= 0 ? $seconds : null;
    }

    private static function isReservedHeader(string $name): bool
    {
        static $reserved = [
            'authorization', 'user-agent', 'x-bird-api-version', 'idempotency-key',
            'bird-surface', 'bird-version', 'bird-lang', 'bird-os', 'bird-arch', 'bird-caller',
            'x-realtime-key', 'x-realtime-secret',
        ];

        return in_array(strtolower($name), $reserved, true);
    }

    private static function newIdempotencyKey(): string
    {
        $bytes = random_bytes(16);
        $bytes[6] = chr((ord($bytes[6]) & 0x0f) | 0x40);
        $bytes[8] = chr((ord($bytes[8]) & 0x3f) | 0x80);

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($bytes), 4));
    }

    private static function resolveBaseUrl(string $apiKey, ?string $baseUrl, ?string $region): string
    {
        if ($baseUrl !== null && $baseUrl !== '') {
            return $baseUrl;
        }

        if ($region === null || $region === '') {
            $region = self::regionFromApiKey($apiKey);
        }
        if ($region === null) {
            throw new \InvalidArgumentException(
                'cannot determine region: pass $region or $baseUrl, or use a bk_{region}_{token} API key',
            );
        }

        return 'https://' . $region . '.platform.bird.com';
    }

    /**
     * Extract the region from a `bk_{region}_{token}` key, where region is two
     * letters followed by digits (e.g. `eu1`); null for any other key shape.
     */
    private static function regionFromApiKey(string $apiKey): ?string
    {
        return preg_match('/^bk_([a-z]{2}[0-9]+)_/', $apiKey, $matches) === 1 ? $matches[1] : null;
    }
}
