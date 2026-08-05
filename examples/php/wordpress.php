<?php

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Exception\ApiException;
use MessageBird\Exception\ConnectionException;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

add_action('rest_api_init', function () use ($bird): void {
    register_rest_route('bird/v1', '/welcome', [
        'methods' => 'POST',
        'permission_callback' => '__return_true',
        'callback' => function (WP_REST_Request $request) use ($bird): WP_REST_Response {
            try {
                $message = $bird->email->send(
                    from: 'Bird <onboarding@messagebird.dev>',
                    to: [(string) $request->get_param('email')],
                    subject: 'Welcome to Bird',
                    html: '<p>You are in.</p>',
                );

                return new WP_REST_Response(['sent' => true, 'id' => $message->getId()]);
            } catch (ApiException $e) {
                return new WP_REST_Response(['error' => $e->getMessage()], $e->status);
            } catch (ConnectionException $e) {
                return new WP_REST_Response(['error' => $e->getMessage()], 502);
            }
        },
    ]);
});
