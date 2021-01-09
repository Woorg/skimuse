<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$services = new FieldsBuilder('Services');

$services
    ->setLocation('block', '==', 'acf/services');

$services
    ->addText('services_title', ['label' => 'Заголовок'])

    ->addRepeater('services_list', [
        'label' => '',
        'min' => 1,
        'layout' => 'block',
        'button_label' => 'Добавить услугу'
        ])
        ->addText('services_service', ['label' => 'Заголовок'])
        ->addTextarea('services_service_text', [
            'label' => 'Краткое описание',
            'new_lines' => ''
        ])
        ->addImage('services_service_icon', ['label' => 'Иконка'])
        ->endRepeater();


return $services;