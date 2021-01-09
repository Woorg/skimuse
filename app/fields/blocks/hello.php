<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$hello = new FieldsBuilder('Hello');

$hello
    ->setLocation('block', '==', 'acf/hello');

$hello
    ->addText('title', [ 'label' => 'Заголовок' ]);


return $hello;