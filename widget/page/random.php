<?php

echo self::widget('page', [
    'shake' => true,
    'title' => $title ?? i('Random %s', 'Posts')
]);