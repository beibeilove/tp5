<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\wamp\www\tp5\public/../application/admin\view\user\show.html";i:1550667463;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/tp5/public/static/css/base.css" />
    <link rel="stylesheet" type="text/css" href="/tp5/public/static/css/index.css" />
    <link rel="stylesheet" type="text/css" href="/tp5/public/static/css/bootstrap.min.css" />
</head>
<body>
<div class="page table-responsive">
    <table class="table table-striped">
        <tr>
            <th>id</th>
            <th>用户名</th>
            <th>密码</th>
            <th>角色</th>
            <th>终端</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['username']; ?></td>
            <td><?php echo $value['password']; ?></td>
            <td><?php if($value['user_account'] == 1): ?>超级管理员<?php elseif($value['user_account'] == 2): ?>管理员<?php elseif($value['user_account'] == 3): ?>普通用户<?php elseif($value['user_account'] == 4): ?>会员<?php endif; ?></td>
            <td><?php if($value['terminal'] == 0): ?>前端<?php elseif($value['terminal'] == 1): ?>后台<?php endif; ?></td>
            <td>
                <a class="btn btn-success marginRight" href="<?php echo url('User/selectUser'); ?>?id=<?php echo $value['id']; ?>">查看</a>
                <?php if($value['user_account'] != 1): ?>
                <a class="btn btn-danger" href="<?php echo url('User/delete'); ?>?id=<?php echo $value['id']; ?>">删除</a>
                <?php else: ?>
                <a class="btn btn-danger" href="javascript:void(0);" disabled>删除</a><?php endif; ?></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>
</body>
</html>