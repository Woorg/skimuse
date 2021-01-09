<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$latest_posts = new FieldsBuilder('Latest posts');

$latest_posts
    ->setLocation('block', '==', 'acf/latest-posts');

$latest_posts
    ->addText('latest_posts_title', [
        'label' => 'Заголовок недавних постов'
    ]);

return $latest_posts;
