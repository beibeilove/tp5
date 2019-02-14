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
        'act' => 'article',
        'name' => '电影管理',
        'children' => [
            ['act' => 'article', 'op' => 'add', 'name' => '新增电影'],
            ['act' => 'article', 'op' => 'show', 'name' => '查看电影']
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
//        'act' => 'musicType',
//        'name' => '音乐类型管理',
//        'children' => [
//            ['act' => 'musicType', 'op' => 'add', 'name' => '新增音乐类型'],
//            ['act' => 'musicType', 'op' => 'show', 'name' => '查看音乐类型']
//        ]
//    ]

];
return $menulist;
?>