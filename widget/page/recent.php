<?php

echo self::widget('page', [
    'sort' => [-1, 'time'],
    'title' => $title ?? i('Recent %s', 'Posts')
]);