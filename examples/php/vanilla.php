<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use MessageBird\Bird;
use MessageBird\Exception\ApiException;
use MessageBird\Exception\ConnectionException;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$body = json_decode(file_get_contents('php://input') ?: '', true);
$email = is_array($body) && isset($body['email']) && is_string($body['email']) ? $body['email'] : '';

header('Content-Type: application/json');

try {
    $message = $bird->email->send(
        from: 'Bird <onboarding@messagebird.dev>',
        to: [$email],
        subject: 'Welcome to Bird',
        html: '<p>You are in.</p>',
    );
    echo json_encode(['sent' => true, 'id' => $message->getId()], JSON_THROW_ON_ERROR);
} catch (ApiException $e) {
    http_response_code($e->status);
    echo json_encode(['error' => $e->getMessage()], JSON_THROW_ON_ERROR);
} catch (ConnectionException $e) {
    http_response_code(502);
    echo json_encode(['error' => $e->getMessage()], JSON_THROW_ON_ERROR);
}
