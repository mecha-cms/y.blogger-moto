<?php

if (isset($state->x->view)) {
    echo self::widget('page', [
        'sort' => [-1, 'view'],
        'title' => $title ?? i('Popular %s', 'Posts')
    ]);
}