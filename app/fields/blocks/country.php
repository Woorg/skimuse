<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$country = new FieldsBuilder('Country');

$country
    ->setLocation('block', '==', 'acf/country');

$country
    ->addText('title', ['label' => 'Title']);

    // ->addRepeater('slider', [
    //     'label'        => 'Slider',
    //     'min'          => 1,
    //     'layout'       => 'table',
    //     'button_label' => 'Add slide',
    //     ])

    //     ->addText('country', ['label' => 'Country'])

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


return $country;