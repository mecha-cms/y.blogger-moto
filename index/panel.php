<?php

Hook::set('_', function ($_) use ($state, $url) {
    if ('.state' === $_['path']) {
        $lot = [];
        foreach (Pages::from(LOT . D . 'page', 'archive,page')->sort([1, 'title']) as $v) {
            $lot[strtr($v->url, [
                $url . '/' => '/'
            ])] = $v->title;
        }
        $_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['blog']['lot']['fields'] = [
            'lot' => [],
            'type' => 'fields'
        ];
        $_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['blog']['lot']['fields']['lot']['route-blog'] = [
            'description' => 'Choose default page for the blog route.',
            'lot' => $lot,
            'name' => 'state[route-blog]',
            'stack' => 20,
            'title' => 'Route',
            'type' => 'option',
            'value' => $state->routeBlog
        ];
        $_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['blog']['lot']['fields']['lot']['skin'] = [
            'lot' => [
                'mr' => 'Mr. Moto',
                'ms' => 'Ms. Moto',
                'so' => 'Son of Moto'
            ],
            'name' => 'state[y][blogger-moto][skin][name]',
            'stack' => 30,
            'title' => 'Skin',
            'type' => 'item',
            'value' => $state->y->{'blogger-moto'}->skin->name ?? 'mr'
        ];
    }
    return $_;
}, 0);