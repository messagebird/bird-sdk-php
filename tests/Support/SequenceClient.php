<?php

declare(strict_types=1);

namespace MessageBird\Tests\Support;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * A PSR-18 client that returns queued responses (or throws queued exceptions)
 * in order and records every request, so a test can drive the retry loop
 * through a sequence of outcomes and assert what was actually sent.
 */
final class SequenceClient implements ClientInterface
{
    /** @var list<ResponseInterface|\Throwable> */
    private array $queue;

    /** @var list<RequestInterface> */
    public array $requests = [];

    public function __construct(ResponseInterface|\Throwable ...$outcomes)
    {
        $this->queue = array_values($outcomes);
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->requests[] = $request;
        $next = array_shift($this->queue);
        if ($next === null) {
            throw new \LogicException('SequenceClient ran out of queued outcomes');
        }
        if ($next instanceof \Throwable) {
            throw $next;
        }

        return $next;
    }
}
