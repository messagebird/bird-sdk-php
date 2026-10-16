<?php

namespace MessageBird\Wire\Model;

/**
 * Changes to the endpoint's connector, nested as on creation. A field the endpoint's URL is built from moves the URL with it. New deliveries are prepared with the current config. Queued deliveries keep their prepared body, but every send attempt, including retries, uses the current destination URL and credentials.
 */
class WebhookDestinationUpdateConnector extends WebhookConnectorSetupUpdate
{
}
