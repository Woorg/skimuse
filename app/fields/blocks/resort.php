<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$resort = new FieldsBuilder('Resort');

$resort
    ->setLocation('post_type', '==', 'ski-resorts');


$resort
    ->addSelect('resort_stars', [
        'label' => 'Star Rating',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => [],
        'choices' => [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
        ],
        'default_value' => [],
        'allow_null' => 0,
        'multiple' => 0,
        'ui' => 0,
        'ajax' => 0,
        'return_format' => 'value',
        'placeholder' => '',
    ])
    ->addSelect('resort_cost', [
        'label' => 'Cost',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => [],
        'choices' => [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
        ],
        'default_value' => [],
        'allow_null' => 0,
        'multiple' => 0,
        'ui' => 0,
        'ajax' => 0,
        'return_format' => 'value',
        'placeholder' => '',
    ])
    ->addTrueFalse('resort_status', [
        'label' => 'Open/Closed',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => [],
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'message' => '',
        'default_value' => 0,
        'ui' => 1,
        'ui_on_text' => 'Open',
        'ui_off_text' => 'Closed',
    ])
    ->addText('resort_lift', [
        'label' => 'Lift status',
        'instructions' => '',
        'required' => 0,
    ])
    ->addText('resort_skiable_area', [
        'label' => 'Skiable area',
        'instructions' => '',
        'required' => 0,
    ])
    ->addRepeater('resort_pistes', [
        'label' => 'Pistes',
        'min' => 1,
        'layout' => 'table',
        'button_label' => 'Add'
    ])
    ->addText('resort_pistes_item', [
        'label' => 'Item',
        'instructions' => '',
        'required' => 0,
    ])
    ->endRepeater()
    ->addCheckbox('resort_best_for', [
        'label' => 'Best know for',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => [],

        'choices' => [
            'expert' => 'expert',
            'beginner-friendly' => 'beginner-friendly',
            'powder' => 'powder',
            'freeride' => 'freeride',
            'slalom' => 'slalom',
            'race' => 'race',
            'budget' => 'budget',
            'luxury' => 'luxury',
            'family-oriented' => 'family-oriented',
            'youth' => 'youth',
            'spa' => 'spa',
            'nightlife' => 'nightlife',
            'skipark' => 'skipark',


        ],
        'allow_custom' => 0,
        'save_custom' => 0,
        'default_value' => [],
        'layout' => 'vertical',
        'toggle' => 0,
        'return_format' => 'value',
    ])
    ->addText('resort_altitude', [
        'label' => 'Altitude',
        'instructions' => '',
        'required' => 0,
    ])
    ->addRepeater('resort_get', [
        'label' => 'How to get',
        'min' => 1,
        'layout' => 'table',
        'button_label' => 'Add'
    ])
    ->addText('resort_get_city', [
        'label' => 'City',
        'instructions' => '',
        'required' => 0,
    ])
    ->addText('resort_get_distance', [
        'label' => 'Distance',
        'instructions' => '',
        'required' => 0,
    ])
    ->endRepeater()
    ->addRepeater('resort_skipass', [
        'label' => 'Ski-pass',
        'min' => 1,
        'layout' => 'table',
        'button_label' => 'Add'
    ])
    ->addText('resort_skipass_day', [
        'label' => 'Day',
        'instructions' => '',
        'required' => 0,
    ])
    ->addText('resort_skipass_price', [
        'label' => 'Price',
        'instructions' => '',
        'required' => 0,
    ])
    ->endRepeater()
    ->addGallery('resort_gallery', [
        'label' => 'Resort Gallery',
        'required' => 0,
        'conditional_logic' => [],
        'return_format' => 'id',
        'insert' => 'append',
        'library' => 'all',
    ]);

return $resort;
