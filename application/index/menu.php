<?php
$menulist = [
    [
        'act' => 'movie',
        'name' => '电影信息',
        'children' => [
            ['act' => 'movie', 'op' => 'list', 'name' => '电影列表'],
            ['act' => 'movie', 'op' => 'detail', 'name' => '电影详情']
        ]
    ]
];
return $menulist;
?>