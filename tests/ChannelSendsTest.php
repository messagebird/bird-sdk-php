<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\EmailDefaults;
use MessageBird\Tests\Support\RecordingClient;
use MessageBird\Wire\Model\EmailMessageSendRequest;
use MessageBird\Wire\Model\SMSMessageSendRequest;
use PHPUnit\Framework\TestCase;

/**
 * The hand-written flagship sends across channels build the right wire request:
 * flat args land in the body, a template handle sugars into the nested template
 * object, and a batch is a bare array of built models with email defaults merged
 * per message.
 */
final class ChannelSendsTest extends TestCase
{
    private function bird(RecordingClient $recording, ?EmailDefaults $email = null): Bird
    {
        return new Bird('bk_test', 'https://api.example.test', $recording, email: $email);
    }

    private function recording(string $body = '{"id":"x"}'): RecordingClient
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();

        return new RecordingClient(
            $responseFactory->createResponse(200)->withBody($streamFactory->createStream($body)),
        );
    }

    /**
     * @return array<string, mixed>
     */
    private function sentBody(RecordingClient $recording): array
    {
        $request = $recording->lastRequest;
        self::assertNotNull($request);

        return json_decode((string) $request->getBody(), true);
    }

    public function testSmsSendBuildsFlatBody(): void
    {
        $recording = $this->recording();
        $this->bird($recording)->sms->send(to: '+15551234567', text: 'Hi', category: 'marketing');

        $request = $recording->lastRequest;
        self::assertNotNull($request);
        self::assertSame('POST', $request->getMethod());
        self::assertSame('/v1/sms/messages', $request->getUri()->getPath());
        $body = $this->sentBody($recording);
        self::assertSame('+15551234567', $body['to']);
        self::assertSame('Hi', $body['text']);
        self::assertSame('marketing', $body['category']);
        self::assertArrayNotHasKey('from', $body);
    }

    public function testSmsSendFoldsTemplateIdAndSlug(): void
    {
        $recording = $this->recording();
        $this->bird($recording)->sms->send(to: '+15551234567', template: 'smt_abc', language: 'en');
        self::assertSame(['id' => 'smt_abc', 'language' => 'en'], $this->sentBody($recording)['template']);

        $recording2 = $this->recording();
        $this->bird($recording2)->sms->send(to: '+15551234567', template: 'welcome');
        self::assertSame(['slug' => 'welcome'], $this->sentBody($recording2)['template']);
    }

    public function testSmsSendBatchIsBareArray(): void
    {
        $recording = $this->recording();
        $messages = [
            (new SMSMessageSendRequest())->setTo('+15551111111')->setText('Hi')->setCategory('marketing'),
        ];
        $this->bird($recording)->sms->sendBatch($messages);

        $request = $recording->lastRequest;
        self::assertNotNull($request);
        self::assertSame('/v1/sms/batches', $request->getUri()->getPath());
        $body = json_decode((string) $request->getBody(), true);
        self::assertSame([['to' => '+15551111111', 'text' => 'Hi', 'category' => 'marketing']], $body);
    }

    public function testWhatsappSendSugarsTemplate(): void
    {
        $recording = $this->recording();
        $this->bird($recording)->whatsapp->send(to: '+15551234567', template: 'bird_otp', language: 'pt_BR');

        $request = $recording->lastRequest;
        self::assertNotNull($request);
        self::assertSame('/v1/whatsapp/messages', $request->getUri()->getPath());
        $body = $this->sentBody($recording);
        self::assertSame('+15551234567', $body['to']);
        self::assertSame(['slug' => 'bird_otp', 'language' => 'pt_BR'], $body['template']);
    }

    public function testWhatsappSendAddressesTemplateById(): void
    {
        $recording = $this->recording();
        $this->bird($recording)->whatsapp->send(to: '+15551234567', template: 'wat_01krdgeqcxet5s7t44vh8rt9mg');

        $body = $this->sentBody($recording);
        self::assertSame(['id' => 'wat_01krdgeqcxet5s7t44vh8rt9mg'], $body['template']);
    }

    public function testWhatsappSendCarriesFreeFormTextAndSender(): void
    {
        $recording = $this->recording();
        $text = (new \MessageBird\Wire\Model\WhatsAppMessageSendRequestText())
            ->setBody('Your driver is 2 minutes away.');
        $this->bird($recording)->whatsapp->send(to: '+14155552671', from: '+14155552672', text: $text);

        $body = $this->sentBody($recording);
        self::assertSame('+14155552672', $body['from']);
        self::assertSame(['body' => 'Your driver is 2 minutes away.'], $body['text']);
        self::assertArrayNotHasKey('template', $body);
    }

    public function testWhatsappSendCarriesDocumentWithFilename(): void
    {
        $recording = $this->recording();
        $document = (new \MessageBird\Wire\Model\WhatsAppMessageSendRequestDocument())
            ->setUrl('https://cdn.example.com/invoices/a1b2c3.pdf')
            ->setFilename('invoice-a1b2c3.pdf');
        $this->bird($recording)->whatsapp->send(to: '+14155552671', from: '+14155552672', document: $document);

        $body = $this->sentBody($recording);
        self::assertSame('invoice-a1b2c3.pdf', $body['document']['filename']);
        self::assertArrayNotHasKey('image', $body);
    }

    public function testEmailSendBatchMergesDefaultsPerMessage(): void
    {
        $recording = $this->recording('{"data":[]}');
        $bird = $this->bird($recording, new EmailDefaults(from: 'default@bird.com', category: 'transactional'));

        $messages = [
            (new EmailMessageSendRequest())->setTo(['a@b.com'])->setSubject('One'),
            (new EmailMessageSendRequest())->setFrom('override@bird.com')->setTo(['c@d.com'])->setSubject('Two'),
        ];
        $bird->email->sendBatch($messages);

        $request = $recording->lastRequest;
        self::assertNotNull($request);
        self::assertSame('/v1/email/batches', $request->getUri()->getPath());
        $body = json_decode((string) $request->getBody(), true);
        // First message had no from: default fills it. Second set its own: it wins.
        self::assertSame('default@bird.com', $body[0]['from']);
        self::assertSame('transactional', $body[0]['category']);
        self::assertSame('override@bird.com', $body[1]['from']);
    }
}
