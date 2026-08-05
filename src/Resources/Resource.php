<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;
use MessageBird\Core\Page;
use MessageBird\RequestOptions;

/**
 * Base of every resource facade. Holds the client and exposes the request
 * helpers the generated `*.gen.php` methods call, so retries and the
 * once-and-reuse idempotency key stay in the core and never in a resource.
 */
abstract class Resource
{
    public function __construct(protected readonly Bird $client)
    {
    }

    /**
     * @template T of object
     *
     * @param class-string<T> $responseClass
     * @param object|array<mixed>|null $body a wire model, or a list of them for a batch body
     * @param array<string, mixed>|null $query
     *
     * @return T
     */
    protected function single(
        string $method,
        string $path,
        string $responseClass,
        object|array|null $body = null,
        ?array $query = null,
        ?RequestOptions $options = null,
    ): object {
        return $this->client->dispatch($method, $path, $responseClass, $body, $query, $options);
    }

    /**
     * A request whose response body is discarded (a delete or a 204 write).
     *
     * @param object|array<mixed>|null $body a wire model, or a list of them for a batch body
     * @param array<string, mixed>|null $query
     */
    protected function none(
        string $method,
        string $path,
        object|array|null $body = null,
        ?array $query = null,
        ?RequestOptions $options = null,
    ): void {
        $this->client->dispatchVoid($method, $path, $body, $query, $options);
    }

    /**
     * @template T of object
     *
     * @param class-string<T> $itemClass
     * @param \Closure(?string): object $fetchPage
     * @param \Closure(object): iterable<mixed> $items
     * @param \Closure(object): ?string $nextCursor
     *
     * @return Page<T>
     */
    protected function paginate(string $itemClass, \Closure $fetchPage, \Closure $items, \Closure $nextCursor): Page
    {
        return new Page($itemClass, $fetchPage, $items, $nextCursor);
    }
}
