<?php

declare(strict_types=1);

namespace MessageBird\Tests\Support;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * A PSR-18 client that reads each request body at its current cursor — without
 * rewinding — so a core that fails to seek the body home before a retry is
 * caught as an empty second read.
 */
final class BodyRecordingClient implements ClientInterface
{
    /** @var list<string> */
    public array $bodies = [];

    /** @var list<ResponseInterface> */
    private array $queue;

    public function __construct(ResponseInterface ...$responses)
    {
        $this->queue = array_values($responses);
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->bodies[] = $request->getBody()->getContents();
        $next = array_shift($this->queue);
        if ($next === null) {
            throw new \LogicException('BodyRecordingClient ran out of queued responses');
        }

        return $next;
    }
}
