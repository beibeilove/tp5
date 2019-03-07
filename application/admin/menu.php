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
        'name' => '推荐位管理',
        'children' => [
            ['act' => 'position', 'op' => 'add', 'name' => '新增推荐位'],
            ['act' => 'position', 'op' => 'show', 'name' => '查看推荐位']
        ]
    ],
//    [
//        'act' => 'schedules',
//        'name' => '影片排期管理',
//        'children' => [
//            ['act' => 'schedules', 'op' => 'add', 'name' => '新增影片排期'],
//            ['act' => 'schedules', 'op' => 'show', 'name' => '查看影片排期']
//        ]
//    ]

];
return $menulist;
?>