<?php

declare(strict_types=1);

namespace MessageBird\Core;

/**
 * A lazily auto-paginating view over a cursor-paginated list. Iterating a Page
 * yields every item across pages, fetching the next page (via the forward
 * cursor) only when the current one is exhausted.
 *
 * @template T of object
 *
 * @implements \IteratorAggregate<int, T>
 */
final class Page implements \IteratorAggregate
{
    /**
     * @param class-string<T> $itemClass the element type each page yields
     * @param \Closure(?string): object $fetchPage fetch one envelope for a cursor (null = first page)
     * @param \Closure(object): iterable<mixed> $items a page's items
     * @param \Closure(object): ?string $nextCursor the forward cursor, or null on the last page
     */
    public function __construct(
        private readonly string $itemClass,
        private readonly \Closure $fetchPage,
        private readonly \Closure $items,
        private readonly \Closure $nextCursor,
    ) {
    }

    /**
     * @return \Generator<int, T>
     */
    public function getIterator(): \Generator
    {
        $cursor = null;
        do {
            $page = ($this->fetchPage)($cursor);
            foreach (($this->items)($page) as $item) {
                \assert($item instanceof $this->itemClass);
                yield $item;
            }
            $cursor = ($this->nextCursor)($page);
        } while ($cursor !== null && $cursor !== '');
    }

    /**
     * Fetch a single page — the given cursor, or the first when $cursor is null —
     * and return its items plus the forward cursor. Use this for manual
     * pagination (read one page, then pass the returned cursor back to fetch the
     * next); iterating the Page auto-paginates across every page instead.
     *
     * @return CursorPage<T>
     *
     * @example Read one page and advance manually
     * $page = $bird->email->list(['status' => 'delivered'])->fetch();
     * foreach ($page->data as $message) {
     *     echo $message->getId(), "\n";
     * }
     * $next = $page->nextCursor; // null on the last page
     */
    public function fetch(?string $cursor = null): CursorPage
    {
        // An empty cursor means the first page, the same way getIterator treats an
        // empty forward cursor as exhausted — so fetch('') == fetch(null), and a
        // caller can never send a stray `starting_after=`.
        $cursor = $cursor === '' ? null : $cursor;
        $env = ($this->fetchPage)($cursor);
        $items = [];
        foreach (($this->items)($env) as $item) {
            \assert($item instanceof $this->itemClass);
            $items[] = $item;
        }
        $next = ($this->nextCursor)($env);

        return new CursorPage($items, $next === '' ? null : $next);
    }
}
