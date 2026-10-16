<?php

namespace MessageBird\Wire\Model;

/**
 * Who placed the leg: the API key whose credentials it used, the integration acting for the workspace, or the user who placed it from a browser or the CLI. Absent when the leg was admitted only by its source IP address, or when no actor was recorded.
 */
class VoiceLegActor extends Actor
{
}
