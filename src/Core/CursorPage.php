<?php

declare(strict_types=1);

namespace MessageBird\Core;

/**
 * A single fetched page of a cursor-paginated list: its items, plus the forward
 * cursor to fetch the next page (null on the last page). Returned by
 * Page::fetch() for manual pagination; iterating a Page auto-paginates instead.
 *
 * @template T of object
 */
final class CursorPage
{
    /**
     * @param list<T> $data
     */
    public function __construct(
        public readonly array $data,
        public readonly ?string $nextCursor,
    ) {
    }
}
