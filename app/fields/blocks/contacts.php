<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$contacts = new FieldsBuilder('Contacts');

$contacts
    ->setLocation('block', '==', 'acf/contacts');

$contacts
    ->addTab('tab_field_form', [
        'label' => 'Col 1',

    ])
    ->addText('title', ['label' => 'Title'])
    ->addWysiwyg('text', [
        'label' => 'Text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => [],
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 1,
        'delay' => 0,
    ])
    ->addText('form_shortcode', ['label' => 'Form shortcode'])
    ->addTab('tab_field_social', [
        'label' => 'Col 2',
    ])
    ->addText('slide_title', ['label' => 'Title']);


return $contacts;
