<?php

$current = $current ?? $url->current;
$folder = LOT . D . 'page' . ($route ?? $state->routeBlog ?? '/article');
if ($file = exist([
    $folder . '.archive',
    $folder . '.page'
], 1)) {
    $page = new Page($file);
    $deep = $page->deep ?? 0;
}
$pages = [];
$pages_data = Pages::from($folder, 'page', $deep ?? 0)->sort([$sort[0] ?? -1, $sort[1] ?? 'time']);
$search = array_filter((array) ($search ?? []));
if (!empty($search)) {
    $pages_data = $pages_data->is(function ($page) use ($current, $search) {
        if ($current === $page->url) {
            return false;
        }
        $name = '-' . $page->name . '-';
        foreach ($search as $v) {
            if (false !== strpos($name, '-' . $v . '-')) {
                return true;
            }
        }
        return false;
    });
}
if (!empty($shake)) {
    $pages_data->shake();
}
foreach ($pages_data->chunk($take ?? 5, 0) as $page) {
    $pages[$page->url] = $page->title;
}

$content = "";
if (count($pages) > 0) {
    $content .= '<ul>';
    foreach ($pages as $k => $v) {
        $content .= '<li>';
        $content .= '<a' . ($current === $k ? ' aria-current="page"' : "") . ' href="' . eat($k) . '">' . $v . '</a>';
        $content .= '</li>';
    }
    $content .= '</ul>';
} else {
    $content .= '<p role="status">' . i('No' . (!empty($search) ? ' related' : "") . ' %s yet.', 'posts') . '</p>';
}

echo self::widget([
    'content' => $content,
    'title' => $title ?? null
]);