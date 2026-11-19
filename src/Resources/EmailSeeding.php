<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * Automatic email seeding, reached as `$bird->email->seeding`. It has no
 * operations of its own; the generated children carry them.
 */
final class EmailSeeding extends Resource
{
    public readonly EmailSeedingSettings $settings;
    public readonly EmailSeedingAddress $address;
    public readonly EmailSeedingRuns $runs;
    public readonly EmailSeedingSources $sources;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->settings = new EmailSeedingSettings($client);
        $this->address = new EmailSeedingAddress($client);
        $this->runs = new EmailSeedingRuns($client);
        $this->sources = new EmailSeedingSources($client);
    }
}
