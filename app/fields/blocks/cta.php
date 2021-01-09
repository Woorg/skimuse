<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$cta = new FieldsBuilder('Cta');

$cta
    ->setLocation('block', '==', 'acf/cta');

$cta
    ->addText('title', [ 'label' => 'Заголовок' ])
    ->addText('button_text', [ 'label' => 'Текст кнопки' ]);

return $cta;