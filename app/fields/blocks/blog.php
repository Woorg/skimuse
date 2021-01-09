<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$blog = new FieldsBuilder('Blog');

$blog
    ->setLocation('block', '==', 'acf/blog');

$blog
    ->addText('title', ['label' => 'Title']);

    // ->addRepeater('slider', [
    //     'label'        => 'Slider',
    //     'min'          => 1,
    //     'layout'       => 'table',
    //     'button_label' => 'Add slide',
    //     ])

    //     ->addTextarea('slide_title', [
    //         'label' => 'Title',
    //         'required' => 0,

    //         'default_value' => '',
    //         'placeholder' => '',
    //         'maxlength' => '',
    //         'rows' => '2',
    //         'new_lines' => '', // Possible values are 'wpautop', 'br', or ''.
    //     ])

    //     ->addImage('image', [
    //         'label' => 'Image',
    //         'instructions' => '',
    //         'required' => 0,
    //         'return_format' => 'id',
    //         'preview_size' => 'thumbnail',
    //         'library' => 'all',
    //     ])

    //     ->addPageLink('link', [
    //         'label' => 'Link',
    //         'type' => 'page_link',
    //         'post_type' => [],
    //         'taxonomy' => [],
    //         'allow_null' => 0,
    //         'allow_archives' => 1,
    //         'multiple' => 0,
    //     ])

    //     ->endRepeater();


return $blog;