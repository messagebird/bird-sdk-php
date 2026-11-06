<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use MessageBird\Core\Serializer;
use MessageBird\Wire\Model\WhatsAppTemplateLanguageUpsert;
use MessageBird\Wire\Model\WhatsAppTemplateLanguageUpsertParameterBindings;
use PHPUnit\Framework\TestCase;

final class EmptyMapTest extends TestCase
{
    // An empty map nested in a model must reach the wire as `{}`: PHP's empty
    // array encodes as `[]`, which the API reads as the wrong type.
    public function testNestedEmptyMapEncodesAsAnObject(): void
    {
        $upsert = (new WhatsAppTemplateLanguageUpsert())
            ->setParameterBindings(new WhatsAppTemplateLanguageUpsertParameterBindings());

        self::assertSame('{"parameter_bindings":{}}', (new Serializer())->encode($upsert));
    }

    public function testNestedMapKeepsItsEntries(): void
    {
        $upsert = (new WhatsAppTemplateLanguageUpsert())
            ->setParameterBindings(new WhatsAppTemplateLanguageUpsertParameterBindings(['full_name' => '{{ first_name }}']));

        self::assertSame('{"parameter_bindings":{"full_name":"{{ first_name }}"}}', (new Serializer())->encode($upsert));
    }
}
