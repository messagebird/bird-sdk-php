<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class Organization extends Resource
{
    public readonly OrganizationWorkspaces $workspaces;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->workspaces = new OrganizationWorkspaces($client);
    }
}
