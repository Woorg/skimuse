<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$faq = new FieldsBuilder('Faq');

$faq
    ->setLocation('block', '==', 'acf/faq');

$faq
    ->addText('name', ['label' => 'Заголовок'])

    ->addRepeater('list', [
        'label' => 'Список',
        'min' => 1,
        'layout' => 'block',
        'button_label' => 'Добавить ответ/вопрос'
        ])
        ->addTextarea('guestion', [
            'label' => 'Вопрос *',
            'default_value' => '',
            'placeholder' => 'Частый вопрос',
            'rows' => 2,
            'new_lines' => 'br'
        ])
        ->addWysiwyg('answer', [
            'label' => 'Ответ',
            // 'tabs' => 'all',
            // 'toolbar' => 'basic',
            'media_upload' => 1,
            'delay' => 1
        ])

        ->endRepeater();


return $faq;