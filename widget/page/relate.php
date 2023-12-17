<?php

echo self::widget('page', [
    'search' => explode('-', $page->name ?? ""),
    'shake' => true,
    'title' => $title ?? i('Related %s', 'Posts')
]);