<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$resorts = new FieldsBuilder('Resorts');

$resorts
    ->setLocation('block', '==', 'acf/resorts');

$resorts
    ->addText('title', ['label' => 'Title'])
    ->addRepeater('slider', [
        'label' => 'Slider',
        'min' => 1,
        'layout' => 'table',
        'button_label' => 'Add slide',
    ])
    ->addText('slide_title', ['label' => 'Title'])
    ->addImage('image', [
        'label' => 'Image',
        'instructions' => '',
        'required' => 0,
        'return_format' => 'id',
        'preview_size' => 'thumbnail',
        'library' => 'all',
    ])
    ->addPageLink('link', [
        'label' => 'Link',
        'type' => 'page_link',
        'post_type' => ['ski-resorts'],
        'taxonomy' => [],
        'allow_null' => 0,
        'allow_archives' => 0,
        'multiple' => 0,
    ])
    ->endRepeater();


return $resorts;
