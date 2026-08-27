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
     * Comma-joins the query keys the spec declares `explode: false`, whose
     * elements travel as one value rather than a repeated key. Named per
     * operation rather than applied to every array: the two forms sit side by
     * side on the wire, so joining wholesale would break a repeated filter.
     *
     * @param array<string, mixed>|null $query
     * @param list<string> $keys
     *
     * @return array<string, mixed>|null
     */
    protected static function joinCsv(?array $query, array $keys): ?array
    {
        if ($query === null) {
            return null;
        }
        foreach ($keys as $key) {
            if (!isset($query[$key]) || !\is_array($query[$key])) {
                continue;
            }
            // An empty array drops the key. Imploding it yields "", and a filter
            // present-but-empty is a different request from an absent one — the
            // repeated encoding this replaces emitted no key at all for it.
            if ($query[$key] === []) {
                unset($query[$key]);

                continue;
            }
            $query[$key] = implode(',', $query[$key]);
        }

        return $query;
    }

    /**
     * @template T of object
     *
     * @param class-string<T> $responseClass
     * @param object|array<mixed>|null $body a wire model, or a list of them for a batch body
     * @param array<string, mixed>|null $query
     *
     * @return T
     * @param list<string>|null $schemes security schemes whose credentials this operation requires
     */
    protected function single(
        string $method,
        string $path,
        string $responseClass,
        object|array|null $body = null,
        ?array $query = null,
        ?RequestOptions $options = null,
        ?array $schemes = null,
    ): object {
        return $this->client->dispatch($method, $path, $responseClass, $body, $query, $options, $schemes);
    }

    /**
     * Denormalize an already-decoded array into a wire model, for a hand
     * override that must retype a field the generated normalizer left as a
     * raw array instead of the nested model it actually holds.
     *
     * @template T of object
     *
     * @param array<mixed> $data
     * @param class-string<T> $class
     *
     * @return T
     */
    protected function denormalize(array $data, string $class): object
    {
        return $this->client->denormalize($data, $class);
    }

    /**
     * A request whose response body is discarded (a delete or a 204 write).
     *
     * @param object|array<mixed>|null $body a wire model, or a list of them for a batch body
     * @param array<string, mixed>|null $query
     * @param list<string>|null $schemes security schemes whose credentials this operation requires
     */
    protected function none(
        string $method,
        string $path,
        object|array|null $body = null,
        ?array $query = null,
        ?RequestOptions $options = null,
        ?array $schemes = null,
    ): void {
        $this->client->dispatchVoid($method, $path, $body, $query, $options, $schemes);
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
