<?php

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Exception\ApiException;
use MessageBird\Exception\ConnectionException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class WelcomeController
{
    public function __construct(private readonly Bird $bird)
    {
    }

    #[Route('/welcome', methods: ['POST'])]
    public function welcome(Request $request): JsonResponse
    {
        try {
            $message = $this->bird->email->send(
                from: 'Bird <onboarding@messagebird.dev>',
                to: [$request->getPayload()->getString('email')],
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
