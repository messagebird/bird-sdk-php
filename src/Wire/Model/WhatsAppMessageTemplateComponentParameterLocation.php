<?php

namespace MessageBird\Wire\Model;

/**
 * A free-form location to send: a point on the map the recipient can open in their maps app. Deliverable only inside an open 24-hour customer service window; outside one, send a template instead.
 */
class WhatsAppMessageTemplateComponentParameterLocation extends WhatsAppLocationSend
{
}
