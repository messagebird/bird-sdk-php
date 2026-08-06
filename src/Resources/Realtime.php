<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * Publish events to a realtime app and inspect its channels. Reached as
 * `$bird->realtime`; channel and member reads hang off `->channels` and
 * `->members`. Every call takes the app id (`rap_…`) first.
 *
 * The app's own key and secret authenticate every call on top of the workspace
 * key. Configure them once on the client (`new Bird(..., realtime: new
 * RealtimeOptions(key: ..., secret: ...))`), or override them for one call with a
 * RealtimeOptions on the request options.
 */
final class Realtime extends RealtimeBase
{
    public readonly RealtimeChannels $channels;
    public readonly RealtimeMembers $members;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->channels = new RealtimeChannels($client);
        $this->members = new RealtimeMembers($client);
    }
}
