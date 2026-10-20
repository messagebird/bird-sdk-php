<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class WorkspaceResource extends WorkspaceResourceBase
{
    public readonly WorkspaceQuotas $quotas;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->quotas = new WorkspaceQuotas($client);
    }
}
