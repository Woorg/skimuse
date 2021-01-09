<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$works = new FieldsBuilder('Works');

$works
    ->setLocation('block', '==', 'acf/recent-works');

$works
    ->addText('recent-works_title', ['label' => 'Заголовок'])
    ->addRepeater('tabs', [
        'label' => '',
        'min' => 1,
        'layout' => 'block',
        'button_label' => 'Добавить таб'
        ])
        ->addText('tab_title', ['label' => 'Заголовок'])
        ->addRepeater('tab_works', [
            'label' => 'Работы',
            'min' => 1,
            'layout' => 'block',
            'button_label' => 'Добавить таб'
            ])
            ->addPostObject('tab_work', [
                'label' => 'Работа',
                'post_type' => [],
                'taxonomy' => ['case'],
                'return_format' => 'object',
                'ui' => 1,
                ])
            ->endRepeater()
        ->endRepeater()

    ->addTextarea('recent-works_text', [
        'label' => 'Текст',
        'new_lines' => 'wpautop'
    ])

    ->addText('recent-works_button', ['label' => 'Текст кнопки'])

    ->addColorPicker('work_image_color', [
        'label' => 'work_image_color',
    ]);

return $works;