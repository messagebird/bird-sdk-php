<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Core\Serializer;
use MessageBird\Tests\Support\RecordingClient;
use MessageBird\Wire\Model\EmailTemplateParameters;
use PHPUnit\Framework\TestCase;

/**
 * The conformance corpus only proves the populated discovery body decodes. A
 * jane normalizer keeps no extras, so a property it failed to map is gone;
 * re-encoding the decoded model and comparing it with the served body is what
 * proves every record survived.
 */
final class EmailTemplateParametersTest extends TestCase
{
    private const TEMPLATE = 'emt_01krdgeqcxet5s7t44vh8rt9mg';

    /**
     * The populated body of the email.templates.parameters conformance vector.
     *
     * @return array<string, mixed>
     */
    private static function populated(): array
    {
        return [
            'template_id' => self::TEMPLATE,
            'observed_version_id' => 'emv_01krdgeqcxet5s7t44vh8rt9mh',
            'requested_language' => 'en',
            'effective_language' => 'en',
            'requirements_fingerprint' => 'sha256:98603c0e927a4aac43b86f6bac4d2d3f72d6b79260aa1d3da33d18e0fea82522',
            'parameters' => [
                [
                    'name' => 'items', 'type' => 'text', 'value_domain' => 'scalar', 'required' => true, 'sensitive' => false,
                    'use_constraints' => [['kind' => 'iterable', 'site' => 'html', 'path' => 'items', 'operation' => 'for']],
                ],
                [
                    'name' => 'offer', 'type' => 'text', 'value_domain' => 'scalar', 'required' => true, 'sensitive' => false,
                    'use_constraints' => [
                        ['kind' => 'value', 'site' => 'subject', 'path' => 'offer', 'operation' => 'output'],
                        ['kind' => 'value', 'site' => 'html', 'path' => 'offer', 'operation' => 'if'],
                    ],
                ],
                [
                    'name' => 'order_total', 'type' => 'amount', 'value_domain' => 'scalar', 'required' => false, 'sensitive' => false,
                    'use_constraints' => [['kind' => 'value', 'site' => 'text', 'path' => 'order_total', 'operation' => 'output']],
                ],
            ],
            'variables' => [
                [
                    'path' => 'bird.contact.first_name', 'source' => 'contact', 'source_type' => 'string',
                    'use_constraints' => [['kind' => 'value', 'site' => 'subject', 'path' => 'bird.contact.first_name', 'operation' => 'output']],
                ],
                [
                    'path' => 'bird.unsubscribe_url', 'source' => 'bird',
                    'use_constraints' => [['kind' => 'value', 'site' => 'html', 'path' => 'bird.unsubscribe_url', 'operation' => 'output']],
                ],
            ],
        ];
    }

    /**
     * @param array<string, mixed> $body
     * @param array<string, string>|null $query
     *
     * @return array{EmailTemplateParameters, RecordingClient}
     */
    private function fetch(array $body, ?array $query = null): array
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $response = $responseFactory->createResponse(200)
            ->withHeader('Content-Type', 'application/json')
            ->withBody($streamFactory->createStream(json_encode($body, JSON_THROW_ON_ERROR)));
        $recording = new RecordingClient($response);
        $bird = new Bird('bk_test', 'https://api.example.test', $recording);

        return [$bird->email->templates->parameters(self::TEMPLATE, $query), $recording];
    }

    /**
     * @return array<string, mixed>
     */
    private static function reencoded(EmailTemplateParameters $result): array
    {
        return json_decode((new Serializer())->encode($result), true, 512, JSON_THROW_ON_ERROR);
    }

    public function testPopulatedResultKeepsEveryRecord(): void
    {
        [$result, $recording] = $this->fetch(self::populated(), ['language' => 'en']);

        self::assertSame('/v1/email/templates/' . self::TEMPLATE . '/parameters', $recording->lastRequest?->getUri()->getPath());
        self::assertSame('language=en', $recording->lastRequest?->getUri()->getQuery());
        self::assertEquals(self::populated(), self::reencoded($result));

        [$items, $offer, $total] = $result->getParameters() ?? [];
        self::assertSame('iterable', ($items->getUseConstraints() ?? [])[0]->getKind());
        self::assertSame(['subject', 'html'], array_map(static fn ($use) => $use->getSite(), $offer->getUseConstraints() ?? []));
        self::assertSame('if', ($offer->getUseConstraints() ?? [])[1]->getOperation());
        self::assertSame('amount', $total->getType());
        self::assertSame('scalar', $total->getValueDomain());
        self::assertFalse($total->getRequired());
        self::assertFalse($total->getSensitive());

        [$contact, $unsubscribe] = $result->getVariables() ?? [];
        self::assertSame('contact', $contact->getSource());
        self::assertSame('string', $contact->getSourceType());
        self::assertSame('bird', $unsubscribe->getSource());
        self::assertFalse($unsubscribe->isInitialized('sourceType'));
        self::assertSame('html', ($unsubscribe->getUseConstraints() ?? [])[0]->getSite());
    }

    public function testUnknownEnumValuesPassThroughUnchanged(): void
    {
        $body = self::populated();
        unset($body['requested_language']);
        $body['parameters'] = [[
            'name' => 'link', 'type' => 'url', 'value_domain' => 'list', 'required' => true, 'sensitive' => false,
            'use_constraints' => [['kind' => 'partial', 'site' => 'amp', 'path' => 'link']],
        ]];
        $body['variables'] = [['path' => 'bird.workspace.name', 'source' => 'workspace']];

        [$result, $recording] = $this->fetch($body);

        self::assertSame('', $recording->lastRequest?->getUri()->getQuery());
        $parameter = ($result->getParameters() ?? [])[0];
        $use = ($parameter->getUseConstraints() ?? [])[0];
        self::assertSame(
            ['url', 'list', 'partial', 'amp', 'workspace'],
            [$parameter->getType(), $parameter->getValueDomain(), $use->getKind(), $use->getSite(), ($result->getVariables() ?? [])[0]->getSource()],
        );
        self::assertEquals($body, self::reencoded($result));
    }
}
