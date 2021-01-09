<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$whoi = new FieldsBuilder('Whoi');

$whoi
    ->setLocation('block', '==', 'acf/whoi');

$whoi
    ->addText('title', ['label' => 'Заголовок'])

    ->addWysiwyg('text', [
        'label'   => 'Текст',
        'tabs'    => 'visual',
        'toolbar' => 'basic',
        'delay'   => 1,
    ]);


return $whoi;