<?php

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\LabelCreate;
use MessageBird\Wire\Model\LabelUpdate;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$labels = $bird->labels->list();
foreach ($labels->getData() ?? [] as $label) {
    echo $label->getId(), ' ', $label->getName(), "\n";
}

$label = $bird->labels->get('lbl_01krdgeqcxet5s7t44vh8rt9mg');
echo $label->getName(), ' ', $label->getDescription();

$label = $bird->labels->create(
    (new LabelCreate())
        ->setName('refund-request')
        ->setColor('#E5484D')
        ->setDescription('The customer asks for their money back.'),
);
echo $label->getId();

$label = $bird->labels->update(
    'lbl_01krdgeqcxet5s7t44vh8rt9mg',
    (new LabelUpdate())->setName('refund')->setColor(null),
);
echo $label->getName();

$bird->labels->delete('lbl_01krdgeqcxet5s7t44vh8rt9mg');
