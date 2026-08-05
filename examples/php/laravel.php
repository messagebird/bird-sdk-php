<?php

declare(strict_types=1);

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use MessageBird\Bird;
use MessageBird\Exception\ApiException;
use MessageBird\Exception\ConnectionException;

final class WelcomeController
{
    public function __construct(private readonly Bird $bird)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $message = $this->bird->email->send(
                from: 'Bird <onboarding@messagebird.dev>',
                to: [(string) $request->string('email')],
                subject: 'Welcome to Bird',
                html: '<p>You are in.</p>',
            );

            return new JsonResponse(['sent' => true, 'id' => $message->getId()]);
        } catch (ApiException $e) {
            return new JsonResponse(['error' => $e->getMessage()], $e->status);
        } catch (ConnectionException $e) {
            return new JsonResponse(['error' => $e->getMessage()], 502);
        }
    }
}
