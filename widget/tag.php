<?php

if (isset($state->x->tag)) {
    $deep = 0;
    $folder = LOT . D . 'page' . ($route ?? $state->routeBlog ?? '/article');
    if ($file = exist([
        $folder . '.archive',
        $folder . '.page'
    ], 1)) {
        $page = new Page($file);
        $deep = $page->deep ?? 0;
    }
    $pages = [];
    $tags = [];
    foreach (Pages::from($folder, 'page', $deep) as $page) {
        $tags = array_merge($tags, (array) $page->kind);
    }
    if (count($tags) > 0) {
        $current = $site->is('tags') && isset($tag) ? $tag->name : "";
        foreach (array_count_values($tags) as $k => $v) {
            if (!$k = To::tag($k)) {
                continue;
            }
            $tag = new Tag(LOT  . D . 'tag' . D . $k . '.page', ['parent' => $file ?: null]);
            if (!$tag->exist) {
                continue;
            }
            $pages[strip_tags($tag->title . '@' . $tag->name)] = [$current === $k, $tag->link, $tag->title, $v];
        }
    }
    $content = "";
    if (count($pages) > 0) {
        ksort($pages);
        $content .= '<ul>';
        foreach ($pages as $k => $v) {
            $content .= '<li>';
            $content .= '<a' . ($v[0] ? ' aria-current="page"' : "") . ' href="' . eat($v[1]) . '" rel="tag">' . $v[2] . ' <span aria-label="' . eat(i('%d post' . (1 === $v[3] ? "" : 's'), [$v[3]])) . '" role="status">' . $v[3] . '</span></a>';
            $content .= '</li>';
        }
        $content .= '</ul>';
    } else {
        $content .= '<p>' . i('No %s yet.', 'tags') . '</p>';
    }
    echo self::widget([
        'content' => $content,
        'title' => $title ?? i('Tags')
    ]);
}