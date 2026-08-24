<?php

// Look up a phone number and an email address. Set BIRD_API_KEY in your
// environment, then run:
//   php examples/quickstart-lookup.php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use MessageBird\Bird;
use MessageBird\Wire\Model\EmailLookupRequest;
use MessageBird\Wire\Model\PhoneNumberLookupRequest;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

// What is this number? The base lookup always answers the country, the serving
// network and a coarse line type, and it always bills once.
$number = $bird->lookup->phoneNumber(
    (new PhoneNumberLookupRequest())
        ->setPhoneNumber('+31612345678')
        ->setType(['porting', 'score']),
);

echo $number->getCountryCode(), ' ', $number->getLineType(), "\n";

// Each requested property is billed only when it is delivered, so read the
// status before the value. Anything other than 'ok' means 'not answered'.
if ($number->getScore()?->getStatus() === 'ok') {
    echo 'credibility ', $number->getScore()->getValue(), "\n";
}
if ($number->getPorting()?->getStatus() === 'ok') {
    echo 'ported ', var_export($number->getPorting()->getPorted(), true), "\n";
}

// Is this address worth sending to? The result is the field to decide on;
// delivery confidence is always present and comparable, which is what makes it
// safe to fall back on when a new verdict is added.
$address = $bird->lookup->email(
    (new EmailLookupRequest())->setEmail('aisha.khan@example.com'),
);

echo $address->getResult(), ' ', $address->getDeliveryConfidence(), "\n";

if ($address->getResult() === 'typo') {
    echo 'did you mean ', $address->getDidYouMean(), "\n";
}
