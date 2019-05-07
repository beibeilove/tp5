<?php
$menulist = [
    [
        'act' => 'user',
        'name' => '用户管理',
        'children' => [
            ['act' => 'user', 'op' => 'add', 'name' => '新增用户'],
            ['act' => 'user', 'op' => 'show', 'name' => '查看用户']
        ]
    ],
    [
        'act' => 'movies',
        'name' => '电影管理',
        'children' => [
            ['act' => 'movies', 'op' => 'add', 'name' => '新增电影'],
            ['act' => 'movies', 'op' => 'show', 'name' => '查看电影']
        ]
    ],
    [
        'act' => 'position',
        'name' => '类别管理',
        'children' => [
            ['act' => 'position', 'op' => 'add', 'name' => '新增类别'],
            ['act' => 'position', 'op' => 'show', 'name' => '查看类别']
        ]
    ],
    [
        'act' => 'order',
        'name' => '订单管理',
        'children' => [
            ['act' => 'order', 'op' => 'show', 'name' => '查看订单管理']
        ]
    ]

];
return $menulist;
?>