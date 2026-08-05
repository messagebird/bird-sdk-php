<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use MessageBird\Core\Page;
use PHPUnit\Framework\TestCase;

/**
 * Page auto-paginates when iterated, and fetch() exposes a single page plus its
 * forward cursor for manual pagination.
 */
final class PageTest extends TestCase
{
    /**
     * A two-page source keyed by cursor: page one yields two items and a forward
     * cursor, page two yields one item and no cursor.
     *
     * @return Page<\stdClass>
     */
    private function twoPages(): Page
    {
        return new Page(
            \stdClass::class,
            fn (?string $cursor): object => (object) ['cursor' => $cursor],
            fn (object $env): array => $env->cursor === null ? [new \stdClass(), new \stdClass()] : [new \stdClass()],
            fn (object $env): ?string => $env->cursor === null ? 'cur2' : null,
        );
    }

    public function testFetchReturnsFirstPageAndForwardCursor(): void
    {
        $page = $this->twoPages()->fetch();

        self::assertCount(2, $page->data);
        self::assertSame('cur2', $page->nextCursor);
    }

    public function testFetchAdvancesWithTheCursor(): void
    {
        $source = $this->twoPages();
        $second = $source->fetch($source->fetch()->nextCursor);

        self::assertCount(1, $second->data);
        self::assertNull($second->nextCursor, 'the last page has no forward cursor');
    }

    public function testFetchTreatsEmptyCursorAsFirstPage(): void
    {
        // fetch('') must behave like fetch(null) — the first page — not send a
        // stray starting_after=.
        self::assertCount(2, $this->twoPages()->fetch('')->data);
    }

    public function testIterationStillAutoPaginatesAcrossPages(): void
    {
        $all = iterator_to_array($this->twoPages());

        self::assertCount(3, $all, 'two items on page one plus one on page two');
    }
}
