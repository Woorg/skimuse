<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$hero = new FieldsBuilder('Hero');

$hero
    ->setLocation('block', '==', 'acf/hero');

$hero
    ->addRepeater('slider', [
        'label'        => 'Slider',
        'min'          => 1,
        'layout'       => 'block',
        'button_label' => 'Add slide',
        ])
        ->addImage('image', [
            'label' => 'Image',
            'instructions' => '',
            'required' => 0,
            'return_format' => 'id',
            'preview_size' => 'thumbnail',
            'library' => 'all',
        ])
        ->addTextarea('slider_title', [
            'label' => 'Title',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => '2',
            'new_lines' => '', // Possible values are 'wpautop', 'br', or ''.
        ])
        ->addPageLink('slider_link', [
            'label' => 'Slide Link',
            'type' => 'page_link',
            'post_type' => [],
            'taxonomy' => [],
            'allow_null' => 0,
            'allow_archives' => 1,
            'multiple' => 0,
        ])

        ->endRepeater()

        ->addTextarea('title', [
            'label' => 'Title',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => '2',
            'new_lines' => 'br', // Possible values are 'wpautop', 'br', or ''.
        ])
        ->addWysiwyg('text', [
            'label'   => 'Text',
            'tabs'    => 'text',
            'toolbar' => 'basic',
            'delay'   => 1,
        ])
        ->addText('button_text', ['label' => 'Текст кнопки'])

        ->addPageLink('button_link', [
            'label' => 'Button Link',
            'type' => 'page_link',
            'post_type' => [],
            'taxonomy' => [],
            'allow_null' => 0,
            'allow_archives' => 1,
            'multiple' => 0,
        ]);

return $hero;